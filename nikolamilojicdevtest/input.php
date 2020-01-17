<?php
    include("connection.php");
    $GLOBALS["conn"] = connect();
            
    $name = filter_input(INPUT_POST, "firstname");
    $surname = filter_input(INPUT_POST, "lastname");
    $address = filter_input(INPUT_POST, "streetnumber");
    $city = filter_input(INPUT_POST, "city");
    $country = filter_input(INPUT_POST, "country");
    $query = "INSERT INTO user(firstname, lastname, streetnumber, city, country) VALUES('$name', '$surname', '$address', '$city', '$country')";
    $result = mysqli_query($GLOBALS["conn"], $query);
            
    if(!$result) {
        die("Error occured while inserting" . mysqli_error($GLOBALS["conn"]));
    }
            
    header("Location: usersList.php");
?>