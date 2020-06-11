<?php

include ("../connection.php");
$GLOBALS["conn"] = connect();

$region = $_POST["region"];
$name = $_POST["name"];
    
$query = "INSERT INTO streets(id_region, name) VALUES ($region, '$name')";
$result = mysqli_query($GLOBALS["conn"], $query);
    
if(!$result) {
    die("Greska priliko dodavanja regiona" . mysqli_error($GLOBALS["conn"]));
    header("Location: parkingZones.php");
}
    
header("Location: parkingZones.php");