<?php
   require('header.php');
?>
<link rel="stylesheet" type="text/css" href="style.css">

<div class="text">

<h1>Setup</h1>


<p>These are instructions on how to enable and use the Super Acceleration and Disable Speed Restriction codes for racing in Burnout 2 on Dolphin.</p>


<h2>Required steps</h2>

<p>In the Config menu in Dolphin, <b>check Enable Cheats</b>.</p>
Right click on the game in Dolphin's main window. Select Properties -> Game Config -> Editor<br>
for the NTSC version of the game, copy and paste the following codes into the text box in User Config, just below Presets:
<br>
<br>[ActionReplay_Enabled]
<br>$Super Acceleration (branden)
<br>$Disable Speed Restriction (Hold A+Y)
<br>$Motion Blur Removal
<br>[ActionReplay]
<br>$Super Acceleration (branden)
<br>4C3B1A30 01000000
<br>042241C4 43480000
<br>04224254 43480000
<br>$Disable Speed Restriction (Hold A+Y)
<br>0A3B1A30 00000900
<br>042241C4 44165D23
<br>$Motion Blur Removal
<br>00305D5C 00000000
<br><br>
<p>In Burnout 2's in-game settings, set the controller config to type B (R = gas, A = boost)</p>


<h2>Optional steps</h2>

<p>In Burnout 2's cheats menu, use Free Run if you want to disable traffic.<br>
I'd recommend this, especially while getting used to driving with Disable Speed Restriction.</p>
<p>If you want to keep motion blur enabled, right click on the game in Dolphin -> AR Codes -> uncheck Motion Blur Removal.</p>
<p>If you don't want to complete the game again to unlock all cars, you can use my <a href="https://gamefaqs.gamespot.com/gamecube/561501-burnout-2-point-of-impact/saves">save file</a>, which has everything unlocked, and has clean scoreboards.
Copy the gci file into the Card A folder before starting Dolphin.</p>


<h2>Credits</h2>
The Disable Speed Restriction and Super Acceleration codes are originally from <a href="https://web.archive.org/web/20070225032326/http://arcentral.net/Codes/NTSC/Burnout_2.php">arcentral.net</a>
<br>
The <a href="https://crashmode.forumotion.com/t57-motion-blur-removal-ar-code">motion blur removal code</a> was created by me, sparker599.
<br>
icons from iconfinder.com
<br><br>
<?php include("footer.php");?>

</div>
