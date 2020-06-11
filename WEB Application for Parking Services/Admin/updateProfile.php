<?php

include("../connection.php");
$GLOBALS["conn"] = connect();

$id = filter_input(INPUT_POST, 'id');
$name = filter_input(INPUT_POST, 'name');
$email = filter_input(INPUT_POST, 'email');
$username = filter_input(INPUT_POST, 'username');
$pass = filter_input(INPUT_POST, 'password');
$error = 0;

if(empty($pass)) {
    $error = 1;
}

if($error == 1) {
    $user_type = 'admin';
    $query = "UPDATE users SET name = '$name', username = '$username', email = '$email' WHERE id = $id";
    $result = mysqli_query($GLOBALS["conn"], $query);
    
    if(!$result) {
        die("Doslo je do greske prilikom azuriranja" . mysqli_error($GLOBALS["conn"]));
    }
    echo("Uspesno ste azurirali");
    
    header("Location: usersList.php");
} else {
    $pass_hash = password_hash($pass, PASSWORD_DEFAULT);
    
    $user_type = 'admin';
    $query = "UPDATE users SET name = '$name', username = '$username', email = '$email', password = '$pass_hash' WHERE id = $id";
    $result = mysqli_query($GLOBALS["conn"], $query);
    
    if(!$result) {
        die("Doslo je do greske prilikom azuriranja" . mysqli_error($GLOBALS["conn"]));
    }
    echo("Uspesno ste azurirali");
    
    header("Location: usersList.php");
}