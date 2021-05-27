<?php
include("config/db_connect.php");
require("protect.php");

if($_POST['category'] == 'lap') $category = 'best_laps';
if($_POST['category'] == 'trt') $category = 'total_times';
if($_POST['category'] == 'race') $category = 'total_times';
if($_POST['category'] == 'bc') $category = 'big_crash';
if($_POST['category'] == 'rct') $category = 'race_crash_totals';
if($_POST['category'] == 'air') $category = 'big_airs';
if($_POST['category'] == 'mcic') $category = 'most_cars_in_crashes';

$score = $_POST['score'];
if(isset($_POST['reverse']) && $_POST['reverse'] == 'on') $reverse = 1;
else $reverse = 0;
$car = $_POST['car'];
$player = $_POST['player'];
$track = $_POST['track'] + 1;
$system = $_POST['system'];
$proof = $_POST['proof'];
$date_acheived = $_POST['date_acheived'];

$sql_command = "INSERT INTO `$category` (`id`, `score`, `reverse`, `car`, `player`, `system`, `proof`, `datetime_entered`, `date_acheived`, `track_id`) VALUES (NULL, '$score', $reverse, '$car', '$player', '$system', '$proof', current_timestamp(), '$date_acheived', '$track')";
echo $sql_command;
$sql_result = mysqli_query($conn, $sql_command);
