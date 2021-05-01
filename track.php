<?php
   require('header.php');
   include('records.php');
?>

      <div class="container-tracks">
         <div class="subcontainer-tracks"><?php echo 'Best Lap'; ?></div>
         <div class="subcontainer-tracks"><?php echo 'Total Time'; ?></div>
         <div class="subcontainer-tracks"><?php echo 'Big Crash'; ?></div>
         <div class="subcontainer-tracks">
            <?php echo '<b>Race Crash Total</b><br>';?>
            <table>
               <?php outputRecords("race_crash_totals", "DESC", $conn, $sql_result); ?>
            </table>
         </div>
         <div class="subcontainer-tracks"><?php echo 'Big Air'; ?></div>
         <div class="subcontainer-tracks"><?php echo 'Most Cars in Crash'; ?></div>
      </div>
   </body>

</html>

<?php 
    mysqli_cleanup();
?>