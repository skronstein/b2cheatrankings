<?php
    function renderForm($error= '',
                        $id = '',
                        $category = '',
                        $score = '',
                        $reverse = '',
                        $car = '',
                        $player = '',
                        $track = '',
                        $system = '',
                        $proof = '',
                        $crashToSaveTime = '',
                        $oob = '',
                        $date_acheived='')
    {
        $title='B2CR admin'; ?>
        
        <html>
            <head>
                <title><?php echo $title;?></title>
            </head>
            <body>
                <h1><?php echo $title;?></h1>
                <?php echo '<a href="logout.php">Logout</a><br>';?>
                <h2><?php
                    if($id == '') {
                        echo "Add a Record";
                    } else {
                        echo '<a href="admin.php">Add a record</a><br>';
                        echo "Edit record " . $id;
                    }?></h2>
                <?php if($error != '') {
                    echo "<div style='padding: 4px; border: 1px solid red: color:red'>Error: " . $error . "</div>";
                }?>
                <form method="post" action="admin-response.php">
                    <?php if ($id == '') { ?>
                        <input type="hidden" name="id" value="<?php echo $id?>"/>
                    <?php } ?>
                    <p>Category - choices:<br> lap trt/race bc rct air mcic</p>
                    <input type="text" name="category" value="lap">
                    <p>Score</p>
                    <input type="text" name="score" value="<?php echo $score?>">
                    <p>Reverse</p>
                    <input type="checkbox" name="reverse" <?php echo $reverse ? "checked":""?> >
                    <p>Car</p>
                    <input type="text" name="car" value="<?php echo $car?>">
                    <p>Player</p>
                    <input type="text" name="player" value="<?php echo $player?>">
                    <p>track</p>
                    <select name="track" id="track" value="Sunrise Valley Downtown"><?php
                        include('config/db_connect.php');
                        $sql_command = "SELECT id, name FROM tracks";
                        $sql_result = mysqli_query($conn, $sql_command);
                        $tracks = mysqli_fetch_all($sql_result, MYSQLI_ASSOC);
                        for($itr = 0; $itr < 15; $itr++) {
                            if($itr + 1 == $track) $selected = "selected";
                            else $selected = "";
                            echo "<option value=\"$itr\" $selected>" . $tracks[$itr]['name'] . " </option>";
                        }
                    ?></select>
                    <p>system</p>
                    <input type="text" name="system" value="<?php echo $system?>">
                    <p>proof</p>
                    <input type="text" name="proof" value="<?php echo $proof?>">
                    <p>crashToSaveTime</p>
                    <input type="text" name="crashToSaveTime" value="<?php echo $crashToSaveTime?>">
                    <p>oob</p>
                    <input type="text" name="oob" value="<?php echo $oob?>">
                    <p>date_acheived</p>
                    <input type="date" name="date_acheived" value="<?php echo $date_acheived?>">
                    <br>
                    <input type="submit">
                </form>
            </body>
        </html>
    <?php }
?>
<?php
    require("protect.php");
    if(isset($_SESSION['isLoggedIn'])) {
        include('config/db_connect.php');

        if(isset($_GET['id'])){
            //editing existing record
            $id = $_GET['id'];
            $sql_command = "SELECT * FROM best_laps WHERE id = $id";
            $sql_result = mysqli_query($conn, $sql_command);
            $row = mysqli_fetch_all($sql_result, MYSQLI_ASSOC)[0];
            if(count($row) == 0) echo "No record found with that ID";
            renderForm(
                NULL, 
                $_GET['id'],
                "lap",
                $row['score'],
                $row['reverse'],
                $row['car'],
                $row['player'],
                $row['track_id'],
                $row['system'],
                $row['proof'],
                0,//$row['crashToSaveTime'],
                0,//$row['oob'],
                $row['date_acheived'],
            );
        } else {
            //adding new record
            renderForm();
        }

    } else {
        echo "Not logged in";
    }
?>

