<?php
    require("protect.php");
    require("renderForm.php");
    if(isset($_SESSION['isLoggedIn'])) {
        include('config/db_connect.php');

        if(isset($_GET['id'])){
            $id = $_GET['id'];
            if(!is_numeric($id) || $id < 1){
                echo "Invalid ID";
                return;
            }
            $error = '';
            //print_r($_POST);
            if(isset($_POST['submit'])){
                //editing existing record; pre-fill the fields with the info for that record
                $category = htmlentities($_POST['category'], ENT_QUOTES);
                $score = htmlentities($_POST['score'], ENT_QUOTES);
                if($score == '' || $category == '') {
                    $error = "Please complete category and score fields.";
                } else {
                    include("admin-response.php");
                }
            }
            //show the (updated) info for the record
            if($stmt = $conn->prepare("SELECT `score`, `reverse`, `car`, `player`, `system`, `proof`, `date_acheived`, `track_id` FROM best_laps WHERE id = ?")){
                $stmt->bind_param("i", $id);
                $stmt->execute();
                $stmt->bind_result($score, $reverse, $car, $player, $system, $proof, $date_acheived, $track);
                $stmt->fetch();
            }
            renderForm(
                $error, 
                $id, "best_laps", $score, $reverse, $car, $player, $track, $system, $proof, 0, 0, $date_acheived
            );
        } else {
            //adding new record; leave fields blank. $_GET['id']
            if(isset($_POST['submit'])){
                $category = htmlentities($_POST['category'], ENT_QUOTES);
                $score = htmlentities($_POST['score'], ENT_QUOTES);
                if($score == '' || $category == '') {
                    $error = "Please complete category and score fields.";
                } else {
                    echo "Adding new score.";
                    include("admin-response.php");
                }
            } else {
                renderForm();
            }
        }
        $conn->close();
    } else {
        echo "Not logged in";
    }
?>

