<?php
   require('header.php');
   include('records.php');
   include("config/db_connect.php");
   if(isset($_GET['track'])) $track = $_GET['track'];
   else $track = 1;
   if(!is_numeric($track)) {
      echo "<br>Invalid track number";
      return;
   }
   if($track < 1 || $track > 15) {
      echo "<br>Track number must be between 1 and 15";
      return;
   }
   $reverse = 0;
?>
<br>
   <?php if(!$conn){
          echo "<h1>Could not connect to database.</h1>";
          return;
      }?>

<script>recordsFilter_base = "records-filter.php?track=<?php echo $track?>";</script>
<script src="track.js"></script>

<div class="trackinfo">
   <div>
      <img src="images/tracks-large/<?php echo $imageArray[$track-1]?>.png" alt="">
   </div>
   <div class="tracktext"><div class="external"><div class="middle"><div class="internal"><?php
      $sql_command = "SELECT name FROM tracks WHERE id = $track";
      $sql_result = mysqli_query($conn, $sql_command);
      $trackName = mysqli_fetch_all($sql_result, MYSQLI_ASSOC);
      echo $trackName[0]['name'];
   ?></div></div></div></div>
   <div class="trackfilters">
      <div class="filtergrid">
         <div><button class="btn btn-lg btn-primary" id="traffic" onClick='toggleTraffic(); updateHalf()'>Traffic: Off</button></div>
         <div><button class="btn btn-lg btn-primary" id="direction" onClick='toggleReverse(); updateAll()'>Direction: Forward</button></div>
      </div>
   </div>
</div>
      <div class="container container-tracks">
         <div class="subcontainer-tracks">
            <h3>Best Lap</h3><br>
            <table id="best_laps">
              <?php outputRecords("best_laps", "ASC", $conn, $track, $reverse, 0); ?>
            </table>
         </div>
         <div class="subcontainer-tracks">
            <h3>Total Race Time</h3><br>
            <table id="total_times">
              <?php outputRecords("total_times", "ASC", $conn, $track, $reverse, 0); ?>
            </table>
         </div>
         <div class="subcontainer-tracks">
            <h3>Big Crash</h3><br>
            <table id="big_crashes">
               <?php outputRecords("big_crashes", "DESC", $conn, $track, $reverse, 0); ?>
            </table>
         </div>
         <div class="subcontainer-tracks">
            <h3>Race Crash Total</h3><br>
            <table id="race_crash_totals">
               <?php outputRecords("race_crash_totals", "DESC", $conn, $track, $reverse, 0); ?>
            </table>
         </div>
         <div class="subcontainer-tracks">
            <h3>Big Air</h3><br>
            <table id="big_airs">
              <?php outputRecords("big_airs", "DESC", $conn, $track, $reverse, 0); ?>
            </table>
         </div>
         <div class="subcontainer-tracks">
            <h3>Most Cars in Crash</h3><br>
            <table id="most_cars_in_crashes">
              <?php outputRecords("most_cars_in_crashes", "DESC", $conn, $track, $reverse, 0); ?>
            </table>
         </div>
      </div>
	  <br><br>
	  <?php include("footer.php");?>
   </body>

</html>

<?php 
    mysqli_close($conn);
?>
