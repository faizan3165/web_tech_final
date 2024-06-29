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
            header('Location: ../../index.php');
            showAlert('success', "Successfully Registered!");
            exit;
        } else {
            showAlert('danger', "An Error has occurred, please try again.");
        }
    } else {
        showAlert("warning", "User with that email does not exist.");
    }

    mysqli_stmt_close($stmt);
}
