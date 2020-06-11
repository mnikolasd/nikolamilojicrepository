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
    <style type="text/css">
        body, html {
            width: 100%;
            height: 100%;
            margin: 0;
        }

        .container {
            width: 70%;
            height: 100%;
            margin-bottom: 7%;
        }

        .leftpane {
            width: 35%;
            height: 100%;
            float: left;
            border-collapse: collapse;
        }

        .middlepane {
            width: 30%;
            height: 100%;
            float: left;
            border-collapse: collapse;
        }

        .rightpane {
            width: 35%;
            height: 100%;
            position: relative;
            float: right;
            border-collapse: collapse;
        }
        
        .disb{
            display: block;
        }

        .disn{
            display: none;
        }
        
        .width50 {
            width: 50%;
        }
    </style>
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
                    <a href="usersList.php" class="w3-br-item w3-button w3-mobile">Korisnici</a>
                    <a href="parkingZones.php" class="w3-br-item w3-button w3-mobile"><u>Parking zone</u></a>
                    <a href="messages.php" class="w3-br-item w3-button w3-mobile">Poruke</a>
                    <a href="stats.php" class="w3-br-item w3-button w3-mobile">Statistika</a>
                </div>
            </div>
        </div>
    <center>
        <div class="container" style="margin-top: 5%">
            <a onclick="cardReveal()" class="w3-button w3-white w3-border w3-border-black w3-round-large">Regioni</a>
            <a onclick="cardRevea2()" class="w3-button w3-white w3-border w3-border-black w3-round-large">Ulice</a>
            <a onclick="cardRevea3()" class="w3-button w3-white w3-border w3-border-black w3-round-large">Adrese</a>
            <div class="podesavanje">
                <div id="card1" class="disb">
                    <h3>Regioni</h3>
                    <table class="w3-table-all">
                        <tr>
                            <td><b>Region</b></td>
                            <td><b>Latituda</b></td>
                            <td><b>Longituda</b></td>
                            <td></td>
                        </tr>
                          <?php
                            include("../connection.php");
                            $GLOBALS["conn"] = connect();

                            $query_r = "SELECT * FROM regions ORDER BY name";
                            $result_r = mysqli_query($GLOBALS["conn"], $query_r);

                            while($row_r = mysqli_fetch_assoc($result_r)) {
                                echo '<tr><td>' . $row_r["name"] . '</td><td>' . $row_r["latitude"] . '</td><td>' . $row_r["longitude"] . '</td><td><div class="w3-right"><form action="parkingDelete.php" method="POST"><input type="hidden" name="id" value="' . $row_r["id"] . '"><input type="submit" name="btnDelR" value="Delete" class="w3-button w3-red"></form></div></td></tr>';
                            }
                          ?>
                    </table>
                    <br><hr><br>
                    <div class="width50">
                        <h3>Dodaj Region</h3>
                        <form action="insertRegion.php" method="POST">
                            <input type="text" class="w3-input w3-section w3-border-bottom" name="name" maxlength="50" placeholder="Ime regiona*" required>
                            <input type="text" class="w3-input w3-section w3-border-bottom" name="latitude" maxlength="50" placeholder="Latituda*" required>
                            <input type="text" class="w3-input w3-section w3-border-bottom" name="longitude" maxlength="50" placeholder="Longituda*" required>
                            <button type="submit" class="w3-button w3-indigo">Unesi</button>
                        </form>
                    </div>
                </div>
                <div id="card2" class="disn">
                    <h3>Ulice</h3>
                    <table class="w3-table-all">
                        <tr>
                            <td><b>Region</b></td>
                            <td><b>Ulica</b></td>
                            <td></td>
                        </tr>
                        <?php
                            $query_s = "SELECT s.id AS id, r.name AS rname, s.name AS sname FROM regions r JOIN streets s ON r.id = s.id_region ORDER BY r.name";
                            $result_s = mysqli_query($GLOBALS["conn"], $query_s);

                            while($row_s = mysqli_fetch_assoc($result_s)) {
                                echo '<tr><td>' . $row_s["rname"] . '</td><td>' . $row_s["sname"] . '</td><td><div class="w3-right"><form action="parkingDelete.php" method="POST"><input type="hidden" name="id" value="' . $row_s["id"] . '"><input type="submit" name="btnDelS" value="Delete" class="w3-button w3-red"></form></div></td></tr>';
                            }
                          ?>
                    </table>
                    <br><hr><br>
                    <h3>Dodaj ulicu</h3>
                    <div class="width50">
                        <form action="insertStreet.php" method="POST">
                            <p>Izaberi region:</p>
                            <select name="region" form="s" class="form-control selectpicker">
                                <?php
                                $query_re = "SELECT * FROM regions";
                                $result_re = mysqli_query($GLOBALS["conn"], $query_re);

                                while($row_re = mysqli_fetch_assoc($result_re)) {
                                    echo '<option value="' . $row_re["id"] . '">' . $row_re["name"] . '</option>';
                                }
                                ?>
                            </select>
                            <input type="text" class="w3-input w3-section w3-border-bottom" name="name" maxlength="50" placeholder="Ime ulice*" required>
                            <button type="submit" class="w3-button w3-indigo">Unesi</button>
                        </form>
                    </div>
                </div>
                <div id="card3" class="disn">
                    <h3>Adrese</h3>
                    <table class="w3-table-all">
                        <tr>
                            <td><b>Region</b></td>
                            <td><b>Ulica</b></td>
                            <td><b>Latituda</b></td>
                            <td><b>Longituda</b></td>
                            <td></td>
                        </tr>
                        <?php
                            $query_a = "SELECT a.id AS id, r.name AS rname, s.name AS sname, a.latitude AS lat, a.longitude AS lon FROM addresses a JOIN streets s ON a.id_street = s.id JOIN regions r ON a.id_region = r.id ORDER BY r.name, s.name";
                            $result_a = mysqli_query($GLOBALS["conn"], $query_a);

                            while($row_a = mysqli_fetch_assoc($result_a)) {
                                echo '<tr><td>' . $row_a["rname"] . '</td><td>' . $row_a["sname"] . '</td><td>' . $row_a["lat"] . '</td><td>' . $row_a["lon"] . '</td><td><div class="w3-right"><form action="parkingDelete.php" method="POST"><input type="hidden" name="id" value="' . $row_a["id"] . '"><input type="submit" name="btnDelA" value="Delete" class="w3-button w3-red"></form></div></td></tr>';
                            }
                          ?>
                    </table>
                    <br><hr><br>
                    <h3>Dodaj novu adresu</h3>
                    <div class="width50">
                        <form action="insertAddress.php" method="POST" id="a">
                            <div class="w3-left">
                            <p>Izaberi region</p>
                            <select name="region" form="a" class="form-control selectpicker">
                                <?php
                                $query_re = "SELECT * FROM regions";
                                $result_re = mysqli_query($GLOBALS["conn"], $query_re);

                                while($row_re = mysqli_fetch_assoc($result_re)) {
                                    echo '<option value="' . $row_re["id"] . '">' . $row_re["name"] . '</option>';
                                }
                                ?>
                            </select>
                            </div>
                            <div class="w3-right">
                            <p>Izaberi ulicu</p>
                            <select name="street" form="a" class="form-control selectpicker">
                                <?php
                                $query_st = "SELECT * FROM streets";
                                $result_st = mysqli_query($GLOBALS["conn"], $query_st);

                                while($row_st = mysqli_fetch_assoc($result_st)) {
                                    echo '<option value="' . $row_st["id"] . '">' . $row_st["name"] . '</option>';
                                }
                                ?>
                            </select>
                            </div>
                            <br><br>
                            <input type="text" class="w3-input w3-section w3-border-bottom" name="lat" maxlength="50" placeholder="Latituda*" required>
                            <input type="text" class="w3-input w3-section w3-border-bottom" name="lon" maxlength="50" placeholder="Longituda*" required>
                            <button type="submit" class="w3-button w3-indigo">Unesi</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </center>
    <script src="../js/revealer.js"></script>
    </body>
</html>