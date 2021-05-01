<?php
	$title='Burnout 2 Cheat Records Site';
   require('images.php');
   include('config/db_connect.php');
?>
<link rel="stylesheet" type="text/css" href="style.css">
<html>
   <head>
      <title><?php echo $title;?></title>
   </head>
   <body>
   	<h1><?php echo $title;?></h1>
      <?php // track icons to select track
         $arraylength = 15;
         for($itr=0 ; $itr < $arraylength ; $itr++){
            $imageName = $imageArray[$itr] . ".png";
            echo "<img src = images/" . $imageName . ">";
         }
      ?>
