<?php
	$title='Burnout 2 Cheat Records Site';
   require('images.php')
?>
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
   </body>

</html>
