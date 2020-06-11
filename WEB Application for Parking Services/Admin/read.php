<?php
include ("../connection.php");
$GLOBALS["conn"] = connect();

$id = $_POST["read"];

$query = "UPDATE messages SET readed = 1 WHERE id = $id";
$result = mysqli_query($GLOBALS["conn"], $query);
            
if(!$result) {
    die("Greska priliko dodavanja regiona" . mysqli_error($GLOBALS["conn"]));
    header("Location: messages.php");
}
    
header("Location: messages.php");