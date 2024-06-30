<?php
if (session_status() === PHP_SESSION_NONE) {
   session_start();
}
;
include __DIR__ . '/../db/connection.php';

if (isset($_POST['todo_id'])) {
    $todo_id = mysqli_real_escape_string($conn, $_POST['todo_id']);
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $task = mysqli_real_escape_string($conn, $_POST['task']);

    $sql = "UPDATE `todos` SET `title` = ?, `description` = ? WHERE `id` = ? AND `author_id` = ?";
    $stmt = mysqli_prepare($conn, $sql);
    $user_id = $_SESSION['user_id'];
    mysqli_stmt_bind_param($stmt, 'ssii', $title, $task, $todo_id, $user_id);

    if (mysqli_stmt_execute($stmt)) {
        if (mysqli_stmt_affected_rows($stmt) > 0) {
            $_SESSION['msg'] = "Successfully updated!";
            $_SESSION['type'] = "success";
            header('Location: ../../index.php');
            exit;
        } else {
            echo "Todo not found or you do not have permission to update it.";
        }
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    mysqli_stmt_close($stmt);
} else {
    echo "Todo ID not provided.";
}

mysqli_close($conn);
?>