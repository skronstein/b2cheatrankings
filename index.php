<?php
   require('header.php');
   require('hometext.php');
?>

<!-- content -->
<div class="wrapper row2">
  <div id="container" class="clear">
    <!-- content body -->
    <section id="shout">
      <h1>Burnout 2 Cheat Records Site</h1>
      <p><?php echo $text_welcome; ?></p>
    </section>
    <!-- main content -->
    <section id="services" class="clear">
      <a href="setup.php">
	    <!-- article 1 -->
		<article class="one_third">
		  <h2>Setup</h2>
		  <img src="images/settings-3-icon.png" alt="">
		  <p>How to set up and use the cheat codes in Dolphin, the GameCube emulator.</p>
		  <footer class="more">Read More &raquo;</footer>
		</article>
      </a>
      <a href="info-driving-tips.php">
		<!-- article 2 -->
		<article class="one_third">
		  <h2>Info</h2>
		  <img src="images/info-icon.png" alt="">
		  <p>Driving tips, best cars, and explanation of Race Crash Total and Big Crash.</p>
		  <footer class="more">Read More &raquo;</footer>
		</article>
	  </a>
      <a href="rules.php">
		<!-- article 3 -->
		<article class="one_third last">
		  <h2>Contact</h2>
		  <img src="images/email-2-icon.png" alt="">
		  <p>Rules and instructions for submitting records.<br><br></p>
		  <footer class="more">Read More &raquo;</footer>
		</article>
	  </a>
    </section>
    <!-- ########################################################################################## -->
    <!-- ########################################################################################## -->
    <!-- ########################################################################################## -->
    <!-- ########################################################################################## -->
    <section class="last clear">
      <!--
      <article class="two_third">
        <h2>Credits</h2>
        <br>The Disable Speed Restriction and Super Acceleration codes are originally from arcentral.net
		<br>The motion blur removal code was created by me, sparker599.
		<br>
		<br>
        <footer class="more"><a href="#">Read More &raquo;</a></footer>
      </article>
      <article class="one_third lastbox">
        <h2>Lorum ipsum dolor</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc non diam erat. In fringilla massa ut nisi ullamcorper pellentesque. Quisque non luctus sem.</p>
        <footer class="more"><a href="#">Read More &raquo;</a></footer>
      </article>
      -->
    </section>
    <!-- / content body -->
  </div>
</div>

<?php include("footer.php");?>
</body>

</html>
