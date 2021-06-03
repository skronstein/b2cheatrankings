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

$score = htmlentities($_POST['score'], ENT_QUOTES);
if(isset($_POST['reverse']) && htmlentities($_POST['reverse'], ENT_QUOTES) == 'on') $reverse = 1;
else $reverse = 0;
$car = htmlentities($_POST['car'], ENT_QUOTES);
$player = htmlentities($_POST['player'], ENT_QUOTES);
$track = htmlentities($_POST['track'] + 1, ENT_QUOTES);
$system = htmlentities($_POST['system'], ENT_QUOTES);
$proof = htmlentities($_POST['proof'], ENT_QUOTES);
$date_acheived = htmlentities($_POST['date_acheived'], ENT_QUOTES);

if(isset($_GET['id'])) {
    // updating an existing record
    if(is_numeric($_GET['id']) && $_GET['id'] > 0){
        $id = $_GET['id'];
        echo "updating record in admin-response.php";
        if($stmt = $conn->prepare("UPDATE $category SET
                score = ?, reverse = ?,
                car = ?, player = ?,
                system = ?, proof = ?,
                date_acheived = ?, track_id = ?
                WHERE id=?")){
            // updating an existing record
            $stmt->bind_param("iisssssii", $score, $reverse, $car, $player, $system, $proof, $date_acheived, $track, $id);
            $stmt->execute();
            $stmt->close();
        } else echo "Error: could not prepare SQL statement";
    } else {
        header("Location: view.php");
    }
} else {
    // inserting a new record
    if ($stmt = $conn->prepare("INSERT INTO $category
    (`id`, `score`, `reverse`, `car`, `player`, `system`, `proof`, `datetime_entered`, `date_acheived`, `track_id`)
    VALUES (NULL, ?, ?, ?, ?, ?, ?, current_timestamp(), ?, ?)"))
    {
        $stmt->bind_param("iisssssi", $score, $reverse, $car, $player, $system, $proof, $date_acheived, $track);
        $stmt->execute();
        $stmt->close();
    } else {
        echo "<br>Error: Could not prepare SQL statement";
        echo "<br>";
        echo mysqli_error($conn);
        echo "<br>";
    }
}
