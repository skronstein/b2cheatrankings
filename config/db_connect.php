<?php
   //connect to database
   $config = parse_ini_file('../config.ini');
   $conn = new mysqli('localhost', $config['username'], $config['password'], $config['db']);

   //check connection
   if(!$conn){//if connection is successful, $conn will be true
      echo 'Connection error: '.mysqli_connect_error();
   }
?>
