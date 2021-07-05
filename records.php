<?php
    include("config/db_connect.php");
    function outputRecords($category, $order, $conn, $track, $reverse, $traffic) {
        //for point-to-point track, show N/A for best laps because they are only 1 lap
        if($track > 12 && $category == "best_laps") {
            echo "<tr><td>N/A</td></tr>";
            return;
        }
        //for crash scores, don't check if records were done with traffic because they were all done with traffic
        if(strpos($category, 'crash') !== false) $traffic_string = "";
        else $traffic_string = "traffic = $traffic AND";
        $sql_command = "SELECT score, car, player, `system`, proof, datetime_entered, date_acheived FROM records WHERE
            track_id = $track AND
            reverse = $reverse AND
            $traffic_string
            category = '$category'
            ORDER BY score $order LIMIT 3";
        $sql_result = mysqli_query($conn, $sql_command);
        $scores = mysqli_fetch_all($sql_result, MYSQLI_ASSOC);
        $rank = 1;
        if(count($scores) == 0) echo "<tr><td>No Records</td></tr>";
        foreach($scores as $score): ?>
            <tr>
                <td><img src="images/medals/<?php echo $rank++;?>.png"></td>
                <td><?php
                    if($order == "ASC") { // we are outputting a race time
                        $seconds = $score['score'] / 1000;
                        $minutes = floor($seconds / 60);
                        $seconds = $seconds - $minutes * 60;
                        if($minutes > 0) {
                            echo $minutes . ":";
                            if($seconds < 10) echo "0";
                        }
                        echo number_format($seconds,3,".",",");
                    }
                    else { echo number_format(htmlentities($score['score']), 0,".",","); }
                ?></td>
                <td><?php echo htmlentities($score['player']); ?></td>
                <td><?php
                    $unixtime = strtotime(htmlentities($score['date_acheived']));
                    echo date("F j, Y", $unixtime);
                ?></td>
                <td><img width=75px src="images/cars/<?php echo htmlentities($score['car']); ?>.png"></td>
                <td><?php echo $score['system']; ?></td>
                <td><a href="<?php echo htmlentities($score['proof']); ?>"><img src="images/logos/youtube2.png"></a></td>
            </tr>
        <?php endforeach; ?>
        <?php
        mysqli_free_result($sql_result);
    }

    function mysqli_cleanup() {
    }
?>