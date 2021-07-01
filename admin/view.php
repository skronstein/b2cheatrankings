<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>B2CR Admin: View/Edit</title>
    <link rel="stylesheet" type="text/css" href="../bootstrap-darkly.min.css">
</head>
    <body>
        <h1>B2CR Admin: View/Edit Records</h1>

        <?php
            require("protect.php");
            include('config/db_connect.php');
            echo '<a href="logout.php">Logout</a><br>';
            echo '<h2><a href="admin.php">Add a record</a><br></h2>';
            if ($result = $conn->query("SELECT * FROM records ORDER BY id")){
                if($result->num_rows > 0)
                {
                    echo "<table border=1 cellpadding='10'>";
                    echo "<tr><th>ID</th><th>Score</th><th>Reverse</th><th>Player</th><th>Track</th><th>System</th><th>Category</th><th>Edit</th><th>Delete</th></tr>";

                    while ($row = $result->fetch_object()){
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row->id) . "</td>";
                        echo "<td>" . htmlspecialchars($row->score) . "</td>";
                        echo "<td>" . htmlspecialchars($row->reverse) . "</td>";
                        echo "<td>" . htmlspecialchars($row->player) . "</td>";
                        echo "<td>" . htmlspecialchars($row->track_id) . "</td>";
                        echo "<td>" . htmlspecialchars($row->system) . "</td>";
                        echo "<td>" . htmlspecialchars($row->category) . "</td>";
                        echo "<td><a href='admin.php?id=" . htmlspecialchars($row->id) . "'>" . "Edit" . "</td>";
                        echo "<td><a href='delete.php?id=" . htmlspecialchars($row->id) . "'>" . "Delete" . "</td>";
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