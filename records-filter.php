<?php
include("config/db_connect.php");
include('records.php');

$category=$_GET['category'];
if($category == 'best_laps' || $category == 'total_times') $order = "ASC";
else $order = "DESC";

$track=$_GET['track'];

$reverse = $_GET['reverse'];
if($reverse == 'true') $reverse = 1;
else $reverse = 0;

outputRecords($category, $order, $conn, $track, $reverse);

exit();
