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
      <?php
         $arraylength = 15;
         for($itr=0 ; $itr < $arraylength ; $itr++){
            $imageName = $imageArray[$itr] . ".png";
            echo "<img src = images/" . $imageName . ">";
         }
      ?>
      <div class="container-tracks">
         <div class="subcontainer-tracks"><?php echo 'Best Lap'; ?></div>
         <div class="subcontainer-tracks"><?php echo 'Total Time'; ?></div>
         <div class="subcontainer-tracks"><?php echo 'Big Crash'; ?></div>
         <div class="subcontainer-tracks">
            <?php echo '<b>Race Crash Total</b><br>';?>
            <table style="width: 100%">
               <?php include('rct.php'); ?>
            </table>
         </div>
         <div class="subcontainer-tracks"><?php echo 'Big Air'; ?></div>
         <div class="subcontainer-tracks"><?php echo 'Most Cars in Crash'; ?></div>
      </div>
   </body>

</html>
