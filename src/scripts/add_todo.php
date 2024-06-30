<?php
if (session_status() === PHP_SESSION_NONE) {
   session_start();
}

include __DIR__ . '/../db/connection.php';

if (isset($_POST['add_todo'])) {
    $user_id = $_SESSION['user_id'];

    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $task = mysqli_real_escape_string($conn, $_POST['task']);

    $sql = "INSERT INTO `todos` (`author_id`, `title`, `description`) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 'iss', $user_id, $title, $task);

    if (mysqli_stmt_execute($stmt)) {
        $_SESSION['msg'] = "Todo added successfully.";
        $_SESSION['type'] = "success";
        exit(header('Location: ../../index.php'));
    } else {
        $_SESSION['msg'] = "Error: " . mysqli_error($conn);
        $_SESSION['type'] = "danger";
    }

    mysqli_stmt_close($stmt);
}

mysqli_close($conn);