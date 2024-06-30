<?php
// $serverName = "localhost";
// $userName = "root";
// $password = "";
// $db = "web_project";

// $conn = mysqli_connect($serverName, $userName, $password, $db);

// if (!$conn) {
//     die("Connection failed: " . mysqli_connect_error());
// }

$host = "sql12.freesqldatabase.com";
$userName = "sql12716920";
$password = "cAwaFUfCxS";
$db = "sql12716920";

$conn = mysqli_connect($host, $userName, $password, $db);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}