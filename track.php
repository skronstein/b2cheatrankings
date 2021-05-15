<?php
   require('header.php');
   include('records.php');
   include("config/db_connect.php");
   $track = $_GET['track'];
   $reverse = 0;
?>
<br>
   <?php if(!$conn){
          echo "<h1>Could not connect to database.</h1>";
          return;
      }?>
<script>
   reverse = false;
   function updateHalf() {
      reverse = !reverse;
      if(reverse) {
         document.getElementById('direction').innerHTML = "Direction: Reverse";
      }
      else {
         document.getElementById('direction').innerHTML = "Direction: Forward";
      }
      var ajax = new XMLHttpRequest();
      thestring = "records-filter.php?reverse=" + reverse;
      thestring += "&track=<?php echo $track?>";
      ajax.open("GET", thestring, true);
      ajax.send();
      ajax.onreadystatechange = function() {
         if(/* this.readystate == 4 && */ this.status == 200) {
            document.getElementById('best_laps').innerHTML = this.responseText;
         }
      }
   }
</script>
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
         <div><button class="btn btn-lg btn-primary" id="direction" onClick='updateHalf()'>Direction: Forward</button></div>
         <div><button class="btn btn-lg btn-primary">Out of Bounds</button></div>
         <div><button class="btn btn-lg btn-primary">Codes</button></div>
      </div>
   </div>
</div>
      <div class="container-tracks">
         <div class="subcontainer-tracks">
            <b>Best Lap</b><br>
            <table id="best_laps">
              <?php outputRecords("best_laps", "ASC", $conn, $track, $reverse); ?>
            </table>
         </div>
         <div class="subcontainer-tracks">
            <b>Total Race Time</b><br>
            <table>
              <?php outputRecords("total_times", "ASC", $conn, $track, $reverse); ?>
            </table>
         </div>
         <div class="subcontainer-tracks">
            <b>Big Crash</b><br>
            <table>
               <?php outputRecords("big_crashes", "DESC", $conn, $track, $reverse); ?>
            </table>
         </div>
         <div class="subcontainer-tracks">
            <b>Race Crash Total</b><br>
            <table>
               <?php outputRecords("race_crash_totals", "DESC", $conn, $track, $reverse); ?>
            </table>
         </div>
         <div class="subcontainer-tracks">
            <b>Big Air</b><br>
            <table>
              <?php outputRecords("big_airs", "DESC", $conn, $track, $reverse); ?>
            </table>
         </div>
         <div class="subcontainer-tracks">
            <b>Most Cars in Crash</b><br>
            <table>
              <?php outputRecords("most_cars_in_crashes", "DESC", $conn, $track, $reverse); ?>
            </table>
         </div>
      </div>
   </body>

</html>

<?php 
    mysqli_close($conn);
?>