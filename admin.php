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
            print_r($_POST);
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
            $sql_command = "SELECT * FROM best_laps WHERE id = $id";
            $sql_result = mysqli_query($conn, $sql_command);
            echo $sql_command;
            $row = mysqli_fetch_all($sql_result, MYSQLI_ASSOC)[0];
            if(count($row) == 0) echo "No record found with that ID";
            renderForm(
                $error, 
                $_GET['id'],
                "lap",
                $row['score'],
                $row['reverse'],
                $row['car'],
                $row['player'],
                $row['track_id'],
                $row['system'],
                $row['proof'],
                0,//$row['crashToSaveTime'],
                0,//$row['oob'],
                $row['date_acheived']
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

