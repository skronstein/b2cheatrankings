<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Records</title>
</head>
    <body>
        <h1>View Records</h1>

        <?php
            require("protect.php");
            include('config/db_connect.php');
            if ($result = $conn->query("SELECT * FROM best_laps ORDER BY id")){
                if($result->num_rows > 0)
                {
                    echo "<table border=1 cellpadding='10'>";
                    echo "<tr><th>ID</th><th>Score</th><th>Reverse</th><th>Player</th><th>Track</th><th>System</th><th>Edit</th><th>Delete</th></tr>";

                    while ($row = $result->fetch_object()){
                        echo "<tr>";
                        echo "<td>" . $row->id . "</td>";
                        echo "<td>" . $row->score . "</td>";
                        echo "<td>" . $row->reverse . "</td>";
                        echo "<td>" . $row->player . "</td>";
                        echo "<td>" . $row->track_id . "</td>";
                        echo "<td>" . $row->system . "</td>";
                        echo "<td><a href='admin.php?id=$row->id'>" . "Edit" . "</td>";
                        echo "<td><a href='delete.php?id=$row->id'>" . "Delete" . "</td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                }
                else
                {
                    echo "no records";
                }
            }
            else
            {
                echo "Error: " . $mysqli->error;
            }

            $conn->close();
        ?>
    </body>
</html>