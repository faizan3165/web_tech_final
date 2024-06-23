<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include __DIR__ . '/../db/connection.php';


if (isset($_GET['id'])) {
    $user_id = mysqli_real_escape_string($conn, $_GET['id']);

    $sql = "DELETE FROM `users` WHERE `id` = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 'i', $user_id);

    if (mysqli_stmt_execute($stmt)) {
        if (mysqli_stmt_affected_rows($stmt) > 0) {
            $_SESSION['msg'] = "User deleted successfully!";
            $_SESSION['type'] = "success";
            header('Location: ../../views/pages/adminPanel.php');
            exit;
        } else {
            $_SESSION['msg'] = "User not found.";
            $_SESSION['type'] = "warning";
        }
    } else {
        $_SESSION['msg'] = "Error: " . mysqli_error($conn);
        $_SESSION['type'] = "danger";
    }

    mysqli_stmt_close($stmt);
} else {
    $_SESSION['msg'] = "User id not provided.";
    $_SESSION['type'] = "warning";
}

mysqli_close($conn);
