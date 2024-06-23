<?php
include __DIR__ . '/../db/connection.php';

if (isset($_GET['id'])) {
    $todo_id = mysqli_real_escape_string($conn, $_GET['id']);

    // Prepare SQL statement to fetch todo details
    $sql = "SELECT `id`, `author_id`, `title`, `description`, `created_at`, `updated_at` FROM `todos` WHERE `id` = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 'i', $todo_id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt); // Store result for later use

    // Bind result variables
    mysqli_stmt_bind_result($stmt, $id, $author_id, $title, $description, $created_at, $updated_at);

    // Fetch todo details
    mysqli_stmt_fetch($stmt);

    // Check if a todo was found
    if (mysqli_stmt_num_rows($stmt) > 0) {
        $todo = [
            'id' => $id,
            'author_id' => $author_id,
            'title' => $title,
            'task' => $description,
            'created_at' => $created_at,
            'updated_at' => $updated_at
        ];

        // Optionally, you can echo or use $todo for further processing
        // echo json_encode($todo);

    } else {
        echo "Todo not found.";
    }

    // Close statement
    mysqli_stmt_close($stmt);

} else {
    echo "Todo ID not provided.";
}

// Close connection
mysqli_close($conn);

