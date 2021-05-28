<?php
    require("protect.php");
    require("renderForm.php");
    if(isset($_SESSION['isLoggedIn'])) {
        include('config/db_connect.php');

        if(isset($_GET['id'])){
            //editing existing record; pre-fill the fields with the info for that record
            $error = '';
            print_r($_POST);
            //if($_POST['score'] == ''){
            if(isset($_POST['submit'])){
                $category = htmlentities($_POST['category'], ENT_QUOTES);
                $score = htmlentities($_POST['score'], ENT_QUOTES);
                if($score == '' || $category == '') {
                    $error = "Please complete category and score fields.";
                }
            }
            $id = $_GET['id'];
            $sql_command = "SELECT * FROM best_laps WHERE id = $id";
            $sql_result = mysqli_query($conn, $sql_command);
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
                $row['date_acheived'],
            );
        } else {
            //adding new record; leave fields blank
            renderForm();
        }

    } else {
        echo "Not logged in";
    }
?>

