<?php
    include("config/db_connect.php");
    function outputRecords($category, $order, $conn) {
        $sql_command = "SELECT score, car, player, system, proof, datetime_entered, date_acheived FROM $category ORDER BY score $order";
        $sql_result = mysqli_query($conn, $sql_command);
        $scores = mysqli_fetch_all($sql_result, MYSQLI_ASSOC);
    $rank = 1;
    foreach($scores as $score): ?>
        <tr>
            <td><?php echo $rank++;?></td>
            <td><?php echo $score['score']; ?></td>
            <td><?php echo $score['player']; ?></td>
            <td><?php echo $score['date_acheived']; ?></td>
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