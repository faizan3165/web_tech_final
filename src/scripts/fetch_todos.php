<?php
include __DIR__ . '/../db/connection.php';

$user_id = $_SESSION['user_id'];

$sql = "SELECT `id`, `author_id`, `title`, `description`, `created_at` FROM `todos` WHERE `author_id` = ? AND `is_completed` = 0";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, 'i', $user_id);
mysqli_stmt_execute($stmt);

mysqli_stmt_bind_result($stmt, $todo_id, $author_id, $title, $description, $created_at);

$todos = [];
while (mysqli_stmt_fetch($stmt)) {
    $todos[] = [
        'id' => $todo_id,
        'author_id' => $author_id,
        'title' => $title,
        'description' => $description,
        'created_at' => $created_at,
    ];
}

mysqli_stmt_close($stmt);

mysqli_close($conn);
