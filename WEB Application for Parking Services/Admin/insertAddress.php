<?php

include ("../connection.php");
$GLOBALS["conn"] = connect();

$region = $_POST["region"];
$street = $_POST["street"];
$lat = $_POST["lat"];
$lon = $_POST["lon"];
    
$query = "INSERT INTO addresses(id_street, id_region, latitude, longitude, date_added) VALUES ($street, $region, $lat, $lon, curdate())";
$result = mysqli_query($GLOBALS["conn"], $query);
    
if(!$result) {
    die("Greska priliko dodavanja regiona" . mysqli_error($GLOBALS["conn"]));
    header("Location: parkingZones.php");
}
    
header("Location: parkingZones.php");