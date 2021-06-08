<?php
    include("config/db_connect.php");
    function outputRecords($category, $order, $conn, $track, $reverse) {
        if($track > 12 && $category == "best_laps") {
            echo "<tr><td>N/A</td></tr>";
            return;
        }
        $sql_command = "SELECT score, car, player, system, proof, datetime_entered, date_acheived FROM $category WHERE track_id = $track AND reverse = $reverse ORDER BY score $order LIMIT 3";
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
                    else { echo number_format($score['score'], 0,".",","); }
                ?></td>
                <td><?php echo $score['player']; ?></td>
                <td><?php
                    $unixtime = strtotime($score['date_acheived']);
                    echo date("F j, Y", $unixtime);
                ?></td>
                <td><img width=75px src="images/cars/<?php echo $score['car']; ?>.png"></td>
                <td><?php echo $score['system']; ?></td>
                <td><a href="<?php echo $score['proof']; ?>"><img src="images/logos/youtube2.png"></a></td>
            </tr>
        <?php endforeach; ?>
        <?php
        mysqli_free_result($sql_result);
    }

    function mysqli_cleanup() {
    }
?>