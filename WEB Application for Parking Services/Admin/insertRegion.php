<?php

include ("../connection.php");
$GLOBALS["conn"] = connect();

$name = $_POST["name"];
$lat = $_POST["latitude"];
$long = $_POST["longitude"];
    
$query = "INSERT INTO regions(name, latitude, longitude) VALUES ('$name', $lat, $long)";
$result = mysqli_query($GLOBALS["conn"], $query);
    
if(!$result) {
    die("Greska priliko dodavanja regiona" . mysqli_error($GLOBALS["conn"]));
    header("Location: parkingZones.php");
}
    
header("Location: parkingZones.php");