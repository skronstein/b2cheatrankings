<?php
   require('header.php');
   include('records.php');
?>

      <div class="container-tracks">
         <div class="subcontainer-tracks">
            <b>Best Lap</b>
            <table>
              <?php outputRecords("best_laps", "ASC", $conn); ?>
            </table>
         </div>
         <div class="subcontainer-tracks">
         <b>Total Race Times</b>
            <table>
              <?php outputRecords("total_times", "ASC", $conn); ?>
            </table>
         </div>
         <div class="subcontainer-tracks"><?php echo 'Big Crash'; ?></div>
         <div class="subcontainer-tracks">
            <?php echo '<b>Race Crash Total</b><br>';?>
            <table>
               <?php outputRecords("race_crash_totals", "DESC", $conn); ?>
            </table>
         </div>
         <div class="subcontainer-tracks"><?php echo 'Big Air'; ?></div>
         <div class="subcontainer-tracks"><?php echo 'Most Cars in Crash'; ?></div>
      </div>
   </body>

</html>

<?php 
    mysqli_close($conn);
?>