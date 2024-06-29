<?php
include __DIR__ . '/../db/connection.php';

if (isset($_GET['id'])) {
    $todo_id = mysqli_real_escape_string($conn, $_GET['id']);

    $sql = "SELECT `id`, `author_id`, `title`, `description`, `created_at` FROM `todos` WHERE `id` = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 'i', $todo_id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);

    mysqli_stmt_bind_result($stmt, $id, $author_id, $title, $description, $created_at);

    mysqli_stmt_fetch($stmt);

    if (mysqli_stmt_num_rows($stmt) > 0) {
        $todo = [
            'id' => $id,
            'author_id' => $author_id,
            'title' => $title,
            'task' => $description,
            'created_at' => $created_at,
        ];




    } else {
        echo "Todo not found.";
    }


    mysqli_stmt_close($stmt);

} else {
    echo "Todo ID not provided.";
}


mysqli_close($conn);

