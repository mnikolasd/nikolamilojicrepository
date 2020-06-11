<?php
session_start();

include "../connection.php";
$GLOBALS["conn"]= connect();

$id = $_POST["id"];

if (!empty($_POST)) {
    if (isset($_POST["btnDelR"])) {
        $query_r = "DELETE FROM regions WHERE id = $id";
        $result_r = mysqli_query($GLOBALS["conn"], $query_r);

        if(!$result_r) {
            die("Greska prilikom brisanja regiona" . mysqli_error($GLOBALS["conn"]));
            header("Location: parkingZones.php");
        }
        
        header("Location: parkingZones.php");
    } else if (isset($_POST["btnDelS"])) {
        $query_s = "DELETE FROM streets WHERE id = $id";
        $result_s = mysqli_query($GLOBALS["conn"], $query_s);

        if(!$result_s) {
            die("Greska prilikom brisanja ulice" . mysqli_error($GLOBALS["conn"]));
            header("Location: parkingZones.php");
        }
        
        header("Location: parkingZones.php");
    } else {
        $query_a = "DELETE FROM addresses WHERE id = $id";
        $result_a = mysqli_query($GLOBALS["conn"], $query_a);

        if(!$result_a) {
            die("Greska prilikom brisanja adrese" . mysqli_error($GLOBALS["conn"]));
            header("Location: parkingZones.php");
        }
        
        header("Location: parkingZones.php");
    }
}