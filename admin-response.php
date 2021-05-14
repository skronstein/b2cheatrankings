<?php
include("config/db_connect.php");
session_start();

if($_POST['category'] == 'lap') $category = 'best_laps';

$score = $_POST['score'];
if($_POST['reverse'] == 'on') $reverse = 1;
if($_POST['reverse'] == 'off') $reverse = 0;
$car = $_POST['car'];
$player = $_POST['player'];
$track = $_POST['track'];
$system = $_POST['system'];
$proof = $_POST['proof'];
$date_acheived = $_POST['date_acheived'];

$sql_command = "INSERT INTO `$category` (`id`, `score`, `reverse`, `car`, `player`, `system`, `proof`, `datetime_entered`, `date_acheived`, `track_id`) VALUES (NULL, '$score', $reverse, '$car', '$player', '$system', '$proof', current_timestamp(), '$date_acheived', '$track')";
echo $sql_command;
$sql_result = mysqli_query($conn, $sql_command);
