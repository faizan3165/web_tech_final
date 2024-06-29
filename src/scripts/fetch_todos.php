<?php
include __DIR__ . '/../db/connection.php';

// Retrieve logged-in user's ID from session
$user_id = $_SESSION['user_id'];

// Prepare SQL statement to fetch todos for the user
// $sql = "SELECT `id`, `author_id`, `title`, `description`, `created_at`, `updated_at` FROM `todos` WHERE `author_id` = ?";
$sql = "SELECT `id`, `author_id`, `title`, `description`, `created_at`, `updated_at` FROM `todos` WHERE `author_id` = ? AND `is_completed` = 0";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, 'i', $user_id);
mysqli_stmt_execute($stmt);

// Bind result variables
mysqli_stmt_bind_result($stmt, $todo_id, $author_id, $title, $description, $created_at, $updated_at);

// Fetch todos and store them in an array
$todos = [];
while (mysqli_stmt_fetch($stmt)) {
    $todos[] = [
        'id' => $todo_id,
        'author_id' => $author_id,
        'title' => $title,
        'description' => $description,
        'created_at' => $created_at,
        'updated_at' => $updated_at
    ];
}

// Close statement
mysqli_stmt_close($stmt);

// Close connection
mysqli_close($conn);
?>