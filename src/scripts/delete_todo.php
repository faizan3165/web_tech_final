<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include __DIR__ . '/../db/connection.php';

if (isset($_GET['id'])) {
    $todo_id = $_GET['id'];

    $sql = "DELETE FROM `todos` WHERE `id` = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 'i', $todo_id);

    if (mysqli_stmt_execute($stmt)) {
        $_SESSION['msg'] = "Todo deleted successfully.";
        $_SESSION['type'] = "success";
        exit(header('Location: ../../index.php'));
    } else {
        $_SESSION['msg'] = "Error deleting todo: " . mysqli_error($conn);
        $_SESSION['type'] = "danger";
    }

    mysqli_stmt_close($stmt);
} else {
    $_SESSION['msg'] = "Todo ID not provided.";
    $_SESSION['type'] = "warning";
}

mysqli_close($conn);
