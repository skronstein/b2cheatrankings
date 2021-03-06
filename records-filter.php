<?php
include("config/db_connect.php");
include('records.php');

$category = htmlentities($_GET['category']);
if($category == 'best_laps' || $category == 'total_times') $order = "ASC";
else $order = "DESC";

$track = htmlentities($_GET['track']);

$reverse = htmlentities($_GET['reverse']);
if($reverse == 'true') $reverse = 1;
else $reverse = 0;

$traffic = htmlentities($_GET['traffic']);
if($traffic == 'true') $traffic = 1;
else $traffic = 0;

outputRecords($category, $order, $conn, $track, $reverse, $traffic);

exit();
