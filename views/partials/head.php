<?php 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />

    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.3.2/mdb.min.css" rel="stylesheet" />

    <!-- bootstrap -->

    <!-- favicon -->
    <link rel="shortcut icon" href="https://i.pinimg.com/564x/31/14/5e/31145e7925e59e8fb344f13422435dba.jpg"
        type="image/x-icon">

    <title>Todo's App</title>
</head>

<style>
    .form {
        max-width: 500px;
        width: 500px;
    }

    .complete-btn:hover {
        color: rgb(25, 135, 84);
    }

    .edit-btn:hover {
        color: rgb(13, 110, 253);
    }

    .delete-btn:hover {
        color: rgb(220, 53, 69);
    }

    .icon {
        width: 50px;
    }
</style>

<body class="bg-dark h-100 w-100">
    <?php
    include __DIR__ . '/../layout/header.php';

    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    include __DIR__ . '/../../src/scripts/show_message.php';
    ?>