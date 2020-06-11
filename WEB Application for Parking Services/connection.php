<?php
function connect() {
    $connection = mysqli_connect("localhost", "root", "", "parkingservis");
    if (!$connection)
        die ("Bad connection ".mysqli_connect_error());
    return $connection;
}