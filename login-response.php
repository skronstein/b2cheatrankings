<?php
include("config/db_connect.php");
session_start();

$userName = trim($_POST["userName"]);
$password = $_POST["password"];
$sql_command = "SELECT username, password_hash FROM users WHERE username = \"$userName\"";
$sql_result = mysqli_query($conn, $sql_command);
$user = mysqli_fetch_all($sql_result, MYSQLI_ASSOC);

$user = $user[0];

if(md5($password) == $user['password_hash']){
    header('Location: admin.php');
} else {
    header('Location: login.php');
}