<?php
function connect() {
    $connection = mysqli_connect("localhost", "root", "", "developertest");
    
    if (!$connection)
        die ("Bad connection ".mysqli_connect_error());
    
    return $connection;
}