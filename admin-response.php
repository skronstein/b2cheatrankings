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
        if($stmt = $conn->prepare("SELECT * FROM best_laps WHERE id = ?")){
            echo "reading record in admin-response.php";
            echo "<br>";
            //$stmt->bind_param("i", $id);
            //$stmt->execute();

            ///$stmt->bind_result($id, $)
            //fetch


        } else echo "Error: could not prepare SQL statement";
        
        //remove this after changing to prepared statements
        $sql_command = "UPDATE $category SET score = $score, reverse = $reverse, player = '$player', system = '$system', proof = '$proof', date_acheived = '$date_acheived', track_id = $track WHERE id = $id";
        $sql_result = mysqli_query($conn, $sql_command);
        echo $sql_command;
        echo "<br>";
        //$conn->close();
        //header('Location: view.php');
    } else {
        header("Location: view.php");
    }
} else {
    // inserting a new record
    $sql_command = "INSERT INTO `$category` (`id`, `score`, `reverse`, `car`, `player`, `system`, `proof`, `datetime_entered`, `date_acheived`, `track_id`) VALUES (NULL, '$score', $reverse, '$car', '$player', '$system', '$proof', current_timestamp(), '$date_acheived', '$track')";
    echo $sql_command;
    $sql_result = mysqli_query($conn, $sql_command);
}


if($category == '') echo "<br>Error: category is empty";
if($score == '') echo "<br>Error: score is empty";