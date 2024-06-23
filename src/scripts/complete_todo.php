<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include __DIR__ . '/../db/connection.php';

if (isset($_GET['id'])) {
    $todo_id = mysqli_real_escape_string($conn, $_GET['id']);

    if (!isset($_SESSION['user_id'])) {
        echo "Session user ID not set.";
        exit;
    }
    $user_id = $_SESSION['user_id'];

    $sql = "UPDATE `todos` SET `is_completed` = 1 WHERE `id` = ? AND `author_id` = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 'ii', $todo_id, $user_id);

    if (mysqli_stmt_execute($stmt)) {
        if (mysqli_stmt_affected_rows($stmt) > 0) {
            $_SESSION['msg'] = "Successfully completed task!";
            $_SESSION['type'] = "success";
            header('Location: ../../index.php');
            exit;
        } else {
            $_SESSION['msg'] = "Todo not found or you do not have permission to complete it.";
            $_SESSION['type'] = "warning";
        }
    } else {
        $_SESSION['msg'] = "Error: " . mysqli_stmt_error($stmt);
        $_SESSION['type'] = "danger";
    }

    mysqli_stmt_close($stmt);
} else {
    $_SESSION['msg'] = "Todo Id not provided!";
    $_SESSION['type'] = "warning";
}

mysqli_close($conn);
