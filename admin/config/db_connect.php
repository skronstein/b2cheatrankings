<?php
   mysqli_report(MYSQLI_REPORT_ERROR);
   
   //connect to database
   include("../../config.php");
   $conn = new mysqli('localhost', $config['username'], $config['password'], $config['db']);

   //check connection
   if(!$conn){//if connection is successful, $conn will be true
      echo 'Connection error: '.mysqli_connect_error();
   }
?>

