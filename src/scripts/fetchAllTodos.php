<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include __DIR__ . '/../db/connection.php';

$sql = "SELECT t.id, t.author_id, t.title, t.description, t.is_completed, t.created_at, u.username AS author_name
        FROM todos t
        INNER JOIN users u ON t.author_id = u.id";

$result = mysqli_query($conn, $sql);

$todos = [];
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $todos[] = $row;
    }
} else {
    echo "Error: " . mysqli_error($conn);
}

mysqli_close($conn);
