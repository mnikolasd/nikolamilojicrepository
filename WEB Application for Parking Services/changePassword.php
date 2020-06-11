<?php

include ("connection.php");
$GLOBALS["con"] = connect();

$id = $_POST['id'];
$old = $_POST['old'];
$new = $_POST['new'];

$new_hash = password_hash($new, PASSWORD_DEFAULT);

$queryVerify = "SELECT password FROM users WHERE id = $id";
$resultVerify = mysqli_query($GLOBALS["con"], $queryVerify);
$resVerify = mysqli_fetch_assoc($resultVerify);

$verify = password_verify($old, $resVerify['password']);

if($verify) {
    $query = "UPDATE users SET password = '$new_hash' WHERE id = $id";
    $result = mysqli_query($GLOBALS["con"], $query);
    
    if (!$result) {
        die("Doslo je do greske prilikom promene lozinke  " . mysqli_error($GLOBALS["conn"]));
    }
} else {
    echo 'Nije dobra lozinka!';
}

header("Location: profile.php");