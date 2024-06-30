<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
;
include __DIR__ . '/../db/connection.php';

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM `users` WHERE `email` = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 's', $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['profile_picture'] = $user['profile_picture'];
            $_SESSION['isAdmin'] = (bool) $user['isAdmin'];

            session_start();

            $_SESSION['msg'] = "Successfully signed in!";
            $_SESSION['type'] = "success";

            header('Location: ../../index.php');
            exit;
        } else {
            $_SESSION['msg'] = "An error has occurred. Please try again.";
            $_SESSION['type'] = "success";
        }
    } else {
        $_SESSION['msg'] = "User with that email does not exist, please try again";
        $_SESSION['type'] = "success";
    }

    mysqli_stmt_close($stmt);
}
