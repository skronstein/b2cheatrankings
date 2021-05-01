<?php
   require('header.php');
?>

      <div class="container-tracks">
         <div class="subcontainer-tracks"><?php echo 'Best Lap'; ?></div>
         <div class="subcontainer-tracks"><?php echo 'Total Time'; ?></div>
         <div class="subcontainer-tracks"><?php echo 'Big Crash'; ?></div>
         <div class="subcontainer-tracks">
            <?php echo '<b>Race Crash Total</b><br>';?>
            <table>
               <?php include('rct.php'); ?>
            </table>
         </div>
         <div class="subcontainer-tracks"><?php echo 'Big Air'; ?></div>
         <div class="subcontainer-tracks"><?php echo 'Most Cars in Crash'; ?></div>
      </div>
   </body>

</html>
