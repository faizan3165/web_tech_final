<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include __DIR__ . '/../db/connection.php';

$sql = "
    SELECT u.id, u.username, u.email, u.isAdmin, COUNT(t.id) AS todo_count
    FROM users u
    LEFT JOIN todos t ON u.id = t.author_id
    GROUP BY u.id, u.username, u.email, u.isAdmin
";
$result = mysqli_query($conn, $sql);

$users = [];
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $users[] = $row;
    }
} else {
    echo "Error: " . mysqli_error($conn);
}

mysqli_close($conn);
