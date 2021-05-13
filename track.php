<?php
   require('header.php');
   include('records.php');
   include("config/db_connect.php");
   $track = $_GET['track'];
?>
<br>
   <?php if(!$conn){
          echo "<h1>Could not connect to database.</h1>";
          return;
      }?>
<div class="trackinfo">
   <div>
      <img src="images/tracks-large/<?php echo $imageArray[$track-1]?>.png" alt="">
   </div>
   <div class="tracktext"><h1><?php
      $sql_command = "SELECT name FROM tracks WHERE id = $track";
      $sql_result = mysqli_query($conn, $sql_command);
      $trackName = mysqli_fetch_all($sql_result, MYSQLI_ASSOC);
      echo $trackName[0]['name'];
   ?></h1></div>
   <div>
      <div class="cssgrid">
         <div><button class="btn btn-lg btn-primary">Traffic</button></div>
         <div><button class="btn btn-lg btn-primary">Direction</button></div>
         <div><button class="btn btn-lg btn-primary">Out of Bounds</button></div>
         <div><button class="btn btn-lg btn-primary">Codes</button></div>
      </div>
   </div>
</div>
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