<!DOCTYPE html>
<!--
Nikola Milojic Developer Test 16.1.2020.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Developer Test</title>
    </head>
    <style type="text/css">
        table, td, tr { 
            border: 1px solid black;
            margin-top: 20%;
        }
    </style>
    <body>
        <center>
            <table>
                <tr>
                    <td><b>ID</b></td>
                    <td><b>First Name</b></td>
                    <td><b>Last Name</b></td>
                    <td><b>Street / Number</b></td>
                    <td><b>City</b></td>
                    <td><b>Country</b></td>
                </tr>
                <?php
                    include("connection.php");
                    $GLOBALS["conn"] = connect();

                    $query = "SELECT * FROM user";
                    $result = mysqli_query($GLOBALS["conn"], $query);

                    if(!$result) {
                        die("Error occured while selecting" . mysqli_error($GLOBALS["conn"]));
                    }

                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<tr><td>' . $row["id"] . '</td><td>' . $row["firstname"] . '</td><td>' . $row["lastname"] . '</td>'
                                . '<td>' . $row["streetnumber"] . '</td><td>' . $row["city"] . '</td><td>' . $row["country"] . '</td></tr>';
                    }
                ?>
            </table>
            <a href="index.php">Return to index</a>
        </center>
    </body>
</html>