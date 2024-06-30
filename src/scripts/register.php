<?php
session_start();
include __DIR__ . '/../db/connection.php';

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $isAdmin = 0;
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $upload_dir = __DIR__ . '/../../uploads/';

    if (isset($_FILES['profile_picture']) && $_FILES['profile_picture']['error'] == 0) {
        $allowed = ['jpg', 'jpeg', 'png', 'gif'];
        $file_name = $_FILES['profile_picture']['name'];
        $file_tmp = $_FILES['profile_picture']['tmp_name'];
        $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

        if (in_array($file_ext, $allowed)) {
            $profile_picture = uniqid() . '.' . $file_ext;
            $upload_path = $upload_dir . $profile_picture;

            if (!is_dir($upload_dir)) {
                mkdir($upload_dir, 0777, true);
            }

            if (move_uploaded_file($file_tmp, $upload_path)) {
                $sql = "INSERT INTO `users` (`username`, `email`, `password`, `profile_picture`) VALUES (?, ?, ?, ?)";

                $stmt = mysqli_prepare($conn, $sql);

                mysqli_stmt_bind_param($stmt, "ssss", $username, $email, $password, $profile_picture);

                if (mysqli_stmt_execute($stmt)) {
                    $sql_select = "SELECT * FROM `users` WHERE `email` = ?";
                    $stmt_select = mysqli_prepare($conn, $sql_select);
                    mysqli_stmt_bind_param($stmt_select, "s", $email);
                    mysqli_stmt_execute($stmt_select);

                    $result = mysqli_stmt_get_result($stmt_select);
                    $user = mysqli_fetch_assoc($result);

                    if ($user) {
                        $_SESSION['user_id'] = $user['id'];
                        $_SESSION['username'] = $user['username'];
                        $_SESSION['email'] = $user['email'];
                        $_SESSION['profile_picture'] = $user['profile_picture'];
                        $isAdmin = (bool) $user['isAdmin'];

                        $_SESSION['msg'] = "Successfully registered!";
                        $_SESSION['type'] = "success";

                        header('Location: ../../index.php');
                        exit;
                    } else {
                        echo "Error: User not found after registration.";
                    }
                } else {
                    echo "Error: " . mysqli_error($conn);
                }
            } else {
                echo "Failed to upload file.";
            }
        } else {
            echo "Invalid file type. Only JPG, JPEG, PNG, and GIF files are allowed.";
        }
    } else {
        echo "No file uploaded or there was an upload error.";
    }
}
