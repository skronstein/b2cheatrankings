<?php
    function renderForm($error= '',
                        $id = '',
                        $category = '',
                        $score = '',
                        $reverse = '',
                        $traffic = '',
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
                        echo "Add a Record<br>";
                        echo '<a href="view.php">View/Edit records</a><br>';
                    } else {
                        echo '<a href="admin.php">Add a record</a><br>';
                        echo "Edit record " . $id;
                        if ($score == '') {
                            echo "<br>No record with that ID";
                            return;
                        }
                    }?></h2>
                <?php if($error != '') {
                    echo "<div style='padding: 4px; border: 1px solid red: color:red'>Error: " . $error . "</div>";
                }?>
                <form method="POST" action="">
                    <?php if ($id == '') { ?>
                        <input type="hidden" name="id" value="<?php echo $id?>"/>
                    <?php } ?>
                    <p>Category - choices:<br> lap trt/race bc rct air mcic</p>
                    <input type="text" name="category" value="<?php echo $category ?>">
                    <p>Score</p>
                    <input type="text" name="score" value="<?php echo $score?>">
                    <p>Reverse</p>
                    <input type="checkbox" name="reverse" <?php echo $reverse ? "checked":""?> >
                    <p>Traffic</p>
                    <input type="checkbox" name="traffic" <?php echo $traffic ? "checked":""?> >
                    <p>Car</p>
                    <input type="text" name="car" value="<?php echo $car?>">
                    <p>Player</p>
                    <input type="text" name="player" value="<?php echo $player?>">
                    <p>track</p>
                    <select name="track" id="track" value="Sunrise Valley Downtown"><?php
                        include('config/db_connect.php');
                        $sql_command = "SELECT name FROM tracks WHERE 1";
                        $sql_result = mysqli_query($conn, $sql_command);
                        $tracks = mysqli_fetch_all($sql_result, MYSQLI_ASSOC);
                        for($itr = 0; $itr < 15; $itr++) {
                            if($itr + 1 == $track) $selected = "selected";
                            else $selected = "";
                            echo "<option value=\"$itr\" $selected>" . $tracks[$itr]['name'] . " </option>";
                        }
                    ?></select>
                    <p>system</p>
                    <select name="system">
                        <option value="Dolphin">Dolphin</option>
                        <option value="Gamecube/Wii" <?php if($system == "Gamecube/Wii") echo " selected" ; ?>>Gamecube/Wii</option>
                    </select>
                    <p>proof</p>
                    <input type="text" name="proof" value="<?php echo $proof?>">
                    <p>crashToSaveTime</p>
                    <input type="text" name="crashToSaveTime" value="<?php echo $crashToSaveTime?>">
                    <p>oob</p>
                    <input type="text" name="oob" value="<?php echo $oob?>">
                    <p>date_acheived</p>
                    <input type="date" name="date_acheived" value="<?php echo $date_acheived?>">
                    <br>
                    <input type="submit" name="submit" value="submit">
                </form>
            </body>
        </html>
    <?php }
?>