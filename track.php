<?php
   require('header.php');
   include('records.php');
   $track = $_GET['track'];
?>

      <div class="container-tracks">
         <div class="subcontainer-tracks">
            <b>Best Lap</b><br>
            <table>
              <?php outputRecords("best_laps", "ASC", $conn, $track); ?>
            </table>
         </div>
         <div class="subcontainer-tracks">
            <b>Total Race Time</b><br>
            <table>
              <?php outputRecords("total_times", "ASC", $conn, $track); ?>
            </table>
         </div>
         <div class="subcontainer-tracks">
            <b>Big Crash</b><br>
            <table>
               <?php outputRecords("big_crashes", "DESC", $conn, $track); ?>
            </table>
         </div>
         <div class="subcontainer-tracks">
            <b>Race Crash Total</b><br>
            <table>
               <?php outputRecords("race_crash_totals", "DESC", $conn, $track); ?>
            </table>
         </div>
         <div class="subcontainer-tracks">
            <b>Big Air</b><br>
            <table>
              <?php outputRecords("big_airs", "DESC", $conn, $track); ?>
            </table>
         </div>
         <div class="subcontainer-tracks">
            <b>Most Cars in Crash</b><br>
            <table>
              <?php outputRecords("most_cars_in_crashes", "DESC", $conn, $track); ?>
            </table>
         </div>
      </div>
   </body>

</html>

<?php 
    mysqli_close($conn);
?>