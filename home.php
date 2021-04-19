<?php
	$title='Burnout 2 Cheat Records Site';
   require('images.php');
   require('hometext.php');
?>
<link rel="stylesheet" type="text/css" href="style.css">
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
      <div class="container">
         <div class="subcontainer"><?php echo $text_welcome; ?></div>
         <div class="subcontainer"><?php echo $text_scores; ?></div>
         <div class="subcontainer"><?php echo $internal_links; ?></div>
         <div class="subcontainer"><?php echo $external_links; ?></div>
      </div>
   </body>

</html>
