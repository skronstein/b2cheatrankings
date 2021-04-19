<?php
	$title='Burnout 2 Cheat Records Site';
   require('images.php')
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
         <div class="subcontainer">1</div>
         <div class="subcontainer">2</div>
         <div class="subcontainer">3</div>
         <div class="subcontainer">4</div>
      </div>
   </body>

</html>
