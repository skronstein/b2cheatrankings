<?php
    session_start();
    $title='B2CR admin';
    if(isset($_SESSION['isLoggedIn'])) {
        include('config/db_connect.php');
?>
        <html>
            <head>
                <title><?php echo $title;?></title>
            </head>
            <body>
                <h1><?php echo $title;?></h1>
                <b>Add a Record</b>
                <form method="post" action="admin-response.php">
                    <p>Category - choices:<br> lap race bc rct air mcic</p>
                    <input type="text" name="category">
                    <p>Score</p>
                    <input type="text" name="score">
                    <p>Car</p>
                    <input type="text" name="car">
                    <p>Player</p>
                    <input type="text" name="player">
                    <p>track</p>
                    <input type="number" name="track">
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

