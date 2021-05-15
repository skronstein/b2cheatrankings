<?php
include("config/db_connect.php");
include('records.php');

$track=$_GET['track'];
$reverse = $_GET['reverse'];
if($reverse == 'true') $reverse = 1;
else $reverse = 0;

outputRecords("best_laps", "ASC", $conn, $track, $reverse);

exit();