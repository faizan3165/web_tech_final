<?php
session_start();
include __DIR__ . '/../db/connection.php';

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $profile_picture = $_POST['profile_picture']; // Assuming profile_picture is a URL now
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO `users` (`username`, `email`, `password`, `profile_picture`) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ssss", $username, $email, $password, $profile_picture);

    if (mysqli_stmt_execute($stmt)) {
        $last_id = mysqli_insert_id($conn);
        $sql_select = "SELECT * FROM `users` WHERE `id` = ?";
        $stmt_select = mysqli_prepare($conn, $sql_select);
        mysqli_stmt_bind_param($stmt_select, "i", $last_id);
        mysqli_stmt_execute($stmt_select);

        $result = mysqli_stmt_get_result($stmt_select);
        $user = mysqli_fetch_assoc($result);

        if ($user) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['profile_picture'] = $user['profile_picture'];
            $_SESSION['isAdmin'] = (bool) $user['isAdmin'];

            $_SESSION['msg'] = "Successfully registered!";
            $_SESSION['type'] = "success";

            header('Location: ../../index.php');
            exit;
        } else {
            $_SESSION['msg'] = "Error: User not found after registration.";
            $_SESSION['type'] = "warning";
        }
    } else {
        $_SESSION['msg'] = "Error: " . mysqli_error($conn);
        $_SESSION['type'] = "warning";
    }

    header('Location: ../../register.php');
    exit;
}
