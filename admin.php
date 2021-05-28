<?php
    require("protect.php");
    require("renderForm.php");
    if(isset($_SESSION['isLoggedIn'])) {
        include('config/db_connect.php');

        if(isset($_GET['id'])){
            //editing existing record
            $id = $_GET['id'];
            $sql_command = "SELECT * FROM best_laps WHERE id = $id";
            $sql_result = mysqli_query($conn, $sql_command);
            $row = mysqli_fetch_all($sql_result, MYSQLI_ASSOC)[0];
            if(count($row) == 0) echo "No record found with that ID";
            renderForm(
                NULL, 
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
            //adding new record
            renderForm();
        }

    } else {
        echo "Not logged in";
    }
?>

