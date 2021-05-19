<?php
    session_start();
    $title='B2CR admin';
    if(isset($_SESSION['isLoggedIn'])) {
        include('config/db_connect.php');

        $sql_command = "SELECT id, name FROM tracks";
        $sql_result = mysqli_query($conn, $sql_command);
        $tracks = mysqli_fetch_all($sql_result, MYSQLI_ASSOC);
?>
        <html>
            <head>
                <title><?php echo $title;?></title>
            </head>
            <body>
                <h1><?php echo $title;?></h1>
                <?php echo '<a href="logout.php">Logout</a><br>';?>
                <h2>Add a Record</h2>
                <form method="post" action="admin-response.php">
                    <p>Category - choices:<br> lap race bc rct air mcic</p>
                    <input type="text" name="category">
                    <p>Score</p>
                    <input type="text" name="score">
                    <p>Reverse</p>
                    <input type="checkbox" name="reverse">
                    <p>Car</p>
                    <input type="text" name="car">
                    <p>Player</p>
                    <input type="text" name="player">
                    <p>track</p>
                    <select name="track" id="track"><?php
                        for($itr = 0; $itr < 15; $itr++) {
                            echo "<option value=\"$itr\">" . $tracks[$itr]['name'] . " </option>";
                        }
                    ?></select>
                    <p>system</p>
                    <input type="text" name="system">
                    <p>proof</p>
                    <input type="text" name="proof">
                    <p>crashToSaveTime</p>
                    <input type="text" name="crashToSaveTime">
                    <p>oob</p>
                    <input type="text" name="oob">
                    <p>date_acheived</p>
                    <input type="date" name="date_acheived">
                    <br>
                    <input type="submit">
                </form>
            </body>
        </html>
<?php
    } else {
        echo "Not logged in";
    }
?>

