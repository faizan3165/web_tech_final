<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
;

$_SESSION = array();

session_destroy();

$_SESSION["msg"] = "Successfully logged out!";
$_SESSION["type"] = "success";
header("Location: /project/views/pages/login.php");
exit;