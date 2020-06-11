<?php

include("../connection.php");
$GLOBALS["conn"] = connect();

$do = filter_input(INPUT_GET, 'do');
$id = filter_input(INPUT_GET, 'id');

if($do === 'change') {
    $query = "SELECT user FROM users WHERE id = $id";
    $user_result = mysqli_query($GLOBALS["conn"], $query);
    $user = mysqli_fetch_assoc($user_result);
    
    if($user["user"] === 'user') {
        $query_change = "UPDATE users SET user = 'admin' WHERE id = $id";
        $result = mysqli_query($GLOBALS["conn"], $query_change);
        
        if(!$result) {
            die("Doslo je do greske prilikom azuriranja" . mysqli_error($GLOBALS["conn"]));
        }
        echo("Uspesno ste azurirali");
    } else if ($user["user"] == 'admin') {
        $query_change = "UPDATE users SET user = 'user' WHERE id = $id";
        $result = mysqli_query($GLOBALS["conn"], $query_change);
        
        if(!$result) {
            die("Doslo je do greske prilikom azuriranja" . mysqli_error($GLOBALS["conn"]));
        }
        echo("Uspesno ste azurirali");
    } else {
        echo "Doslo je do greske - ne prepoznajem kveri";
    }
    
    header("Location: usersList.php");
} else if ($do === 'reset'){
    $pass = "pass1234";
    $pass_hash = password_hash($pass, PASSWORD_DEFAULT);
    
    $user_type = 'user';
    $query = "UPDATE users SET password = '$pass_hash' WHERE id = $id";
    $result = mysqli_query($GLOBALS["conn"], $query);
    
    if(!$result) {
        die("Doslo je do greske prilikom azuriranja" . mysqli_error($GLOBALS["conn"]));
    }
    echo("Uspesno ste azurirali");
    
    header("Location: usersList.php");
} else if ($do === 'delete') {
    $query = "DELETE FROM users WHERE id = $id";
    $result = mysqli_query($GLOBALS["conn"], $query);
    
    if(!$result) {
        die("Doslo je do greske prilikom azuriranja" . mysqli_error($GLOBALS["conn"]));
    }
    echo("Uspesno ste azurirali");
    
    header("Location: usersList.php");
} else {
    echo 'Doslo je do greske';
}