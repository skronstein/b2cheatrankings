<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
<title>Burnout 2 Cheat Records</title>
<meta charset="UTF-8">
<link rel="stylesheet" href="styles/layout.css" type="text/css">
<link rel="stylesheet" href="style.css" type="text/css">
<!--[if lt IE 9]><script src="scripts/html5shiv.js"></script><![endif]-->
</head>
<body>
<div class="wrapper row1">
  <header id="header" class="clear">
    <nav>
      <ul>
        <li><a href="./">Home</a></li>
        <li><a href="https://www.youtube.com/playlist?list=PLZRlKCDJDJ95yqddkgT-okO-9LD7enMSu">Videos</a></li>
      </ul>
    </nav>
  </header>
  <div class="track-selector">
	  <div class="track-selector-1">
<?php
	require('images.php');
	$arraylength = 15;
	for($itr=1 ; $itr <= $arraylength ; $itr++){
		echo "<a href = track.php?track=$itr>";
		$imageName = $imageArray[$itr-1] . ".png";
		echo "<img src = images/tracks-large/" . $imageName . ">";
		echo "</a>";
		if($itr == 8){
			echo "</div>";
			echo '<div class="track-selector-2">';
		}
	}
?>
	  </div>
  </div>
