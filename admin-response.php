<?php
include("config/db_connect.php");
session_start();

if($_POST['category'] == 'lap') $category = 'best_laps';

$score = $_POST['score'];
$car = $_POST['car'];
$player = $_POST['player'];
$system = $_POST['system'];
$proof = $_POST['proof'];
$date_acheived = $_POST['date_acheived'];

$sql_command = "INSERT INTO `$category` (`id`, `score`, `car`, `player`, `system`, `proof`, `datetime_entered`, `date_acheived`) VALUES (NULL, '$score', '$car', '$player', '$system', '$proof', current_timestamp(), '$date_acheived')";
$sql_result = mysqli_query($conn, $sql_command);
