<?php
require("protect.php");
include("config/db_connect.php");
if(isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
    if($stmt = $conn->prepare("DELETE FROM records WHERE id = ? LIMIT 1")){
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
    } else {
        echo "ERROR: could not prepare SQL statement.";
    }
    $conn->close();
    header("Location: view.php");
}
else header ("Location: view.php");
?>