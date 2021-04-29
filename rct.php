<?php
    $sql_command = 'SELECT score, car, player, system, proof, datetime_entered, date_acheived FROM race_crash_totals ORDER BY score DESC';
    $sql_result = mysqli_query($conn, $sql_command);
    $scores = mysqli_fetch_all($sql_result, MYSQLI_ASSOC);
    mysqli_free_result($sql_result);
    mysqli_close($conn);
?>

    <?php
    $rank = 1;
    foreach($scores as $score): ?>
        <tr style="text-align: center;">
            <td><?php echo $rank++;?></td>
            <td><?php echo $score['score']; ?></td>
            <td><?php echo $score['player']; ?></td>
            <td><?php echo $score['date_acheived']; ?></td>
            <td><img width=75px src="images/cars/<?php echo $score['car']; ?>.png"></td>
            <td><?php echo $score['system']; ?></td>
            <td><a href="<?php echo $score['proof']; ?>"><img src="images/logos/youtube2.png"></a></td>
        </tr>
    <?php endforeach; ?>
