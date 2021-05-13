<?php
	$title='Burnout 2 Cheat Records Site';
   require('images.php');
   include('config/db_connect.php');
?>
<link rel="stylesheet" type="text/css" href="bootstrap-darkly.min.css">
<link rel="stylesheet" type="text/css" href="style.css">
<html>
   <head>
      <title><?php echo $title;?></title>
   </head>
   <body>
   	<h1><?php echo $title;?></h1>
      <?php // track icons to select track
         $arraylength = 15;
         for($itr=1 ; $itr <= $arraylength ; $itr++){
            echo "<a href = track.php?track=$itr>";
            $imageName = $imageArray[$itr-1] . ".png";
            echo "<img src = images/" . $imageName . ">";
            echo "</a>";
         }
      ?>
