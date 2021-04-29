<?php
    $sql_command = 'SELECT score, car, player, system, proof, datetime_entered, date_acheived FROM race_crash_totals ORDER BY score DESC';
    $sql_result = mysqli_query($conn, $sql_command);
    $scores = mysqli_fetch_all($sql_result, MYSQLI_ASSOC);
    mysqli_free_result($sql_result);
    mysqli_close($conn);
?>
<?php
    echo "<table>";
    foreach($scores as $score): ?>
        <tr>
            <td><?php echo $score['score']; ?></td>
            <td><?php echo $score['player']; ?></td>
            <td><?php echo $score['date_acheived']; ?></td>
        </tr>
    <?php endforeach; ?>
    <?php echo "</table>"; ?>