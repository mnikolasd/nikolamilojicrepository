<!DOCTYPE html>
<!--
    Design by Nikola Milojic 104/16 IT
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=BioRhyme&display=swap">
        <link rel="stylesheet" type="text/css" href="../css/fonts.css">
        <title>Parking Servis</title>
    </head>
    <body>
        <?php
            session_start();
            if(isset($_SESSION['id'])) {
                if($_SESSION['type'] !== 'admin') {
                    header("Location:../index.php");
                    exit();
                }
            } else {
                header("Location:../login.php");
                exit();
            }
        ?>
        <div class="w3-top" style="opacity: 80%;">
            <div class="w3-bar w3-white w3-wide w3-padding w3-card">
            <?php
                if (!isset($_SESSION['id'])) {
            ?>
            <?php } else { ?>
                <a href="../loging.php" class="w3-br-item w3-button w3-mobile">Izlogujte Se</a>&nbsp;<a href="profile.php"><i class="fa fa-user" style="font-size:36px"></i></a>Zdravo <?php echo'<b>' . $_SESSION['name'] . '</b>'; ?>
            <?php 
                }
            ?>
                <div class="w3-right">
                    <a href="usersList.php" class="w3-br-item w3-button w3-mobile"><u>Korisnici</u></a>
                    <a href="parkingZones.php" class="w3-br-item w3-button w3-mobile">Parking zone</a>
                    <a href="messages.php" class="w3-br-item w3-button w3-mobile">Poruke</a>
                    <a href="stats.php" class="w3-br-item w3-button w3-mobile">Statistika</a>
                </div>
            </div>
        </div>
    <center>
        <h3 align="center" style="margin-top: 5%">Spisak korisnika</h3>
            <table class="w3-table w3-striped w3-border w3-bordered" style="max-width: 30%">
                <tr>
                    <td><b>Ime</b></td>
                    <td><b>Korisnicko ime</b></td>
                    <td><b>e-Mail</b></td>
                    <td><b>Tip</b></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                    <?php
                        include("../connection.php");
                        $GLOBALS["conn"] = connect();

                        $query = "SELECT * FROM users";
                        $result = mysqli_query($GLOBALS["conn"], $query);

                        while ($row = mysqli_fetch_assoc($result)) {
                            echo    '<tr><td>' . $row["name"] . '</td><td>' . $row["username"] . '</td><td>' . $row["email"] . '</td><td>' . $row["user"] . '</td>'
                                    . '<td><a href="updateUser.php?do=change&id=' . $row["id"] . '" class="w3-button w3-green">Promeni tip</a></td>'
                                    . '<td><a href="updateUser.php?do=reset&id=' . $row["id"] . '" class="w3-button w3-yellow">Promeni sifru</a></td>'
                                    . '<td><a href="updateUser.php?do=delete&id=' . $row["id"] . '" class="w3-button w3-red">Obrisi</a></td></tr>';
                        }
                    ?>
            </table>
    </center>
    </body>
</html>