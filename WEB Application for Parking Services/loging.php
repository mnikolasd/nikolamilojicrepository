<?php

session_start();

if(!isset($_SESSION['id'])) {
    include("connection.php");
    $GLOBALS["conn"] = connect();
    
    $username = filter_input(INPUT_POST, 'name');
    $password = filter_input(INPUT_POST, 'password');
    
    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($GLOBALS["conn"], $query);
    $res = mysqli_fetch_assoc($result);
    $verify=password_verify($password, $res['password']);
    
    if($verify) {
        echo'ok'; 
        $_SESSION['id'] = $res['id'];
        $_SESSION['name'] = $res['name'];
        $_SESSION['type'] = $res['user'];
        $_SESSION['email'] = $res['email'];
    } else {
        echo'Nije dobra sifra';
        header("Location:index.php");
    }
    
   if($_SESSION['type'] === 'admin') {
       header("Location:Admin/usersList.php");
   } else {
       header("Location:index.php");
   }
} else {
    session_destroy();
    header("Location:index.php");
}