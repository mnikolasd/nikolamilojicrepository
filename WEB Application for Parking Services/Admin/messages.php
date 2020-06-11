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
                    <a href="usersList.php" class="w3-br-item w3-button w3-mobile">Korisnici</a>
                    <a href="parkingZones.php" class="w3-br-item w3-button w3-mobile">Parking zone</a>
                    <a href="messages.php" class="w3-br-item w3-button w3-mobile"><u>Poruke</u></a>
                    <a href="stats.php" class="w3-br-item w3-button w3-mobile">Statistika</a>
                </div>
            </div>
        </div>
    <center>
        <?php
            include ("../connection.php");
            $GLOBALS["conn"] = connect();
            
            $query = "SELECT * FROM messages WHERE readed = 0";
            $result = mysqli_query($GLOBALS["conn"], $query);
            
            if (!$result)
                echo"<h1 style='margin-top: 10%'><b>Nema poruka</b></h1>";
            
            while($row = mysqli_fetch_assoc($result)) {
                echo '<div class="w3-panel w3-leftbar w3-light-grey" style="margin-top: 5%">
                        <h4><b>' . $row["title"] . '</b></h4>
                        <p class="w3-xlarge"><i>"' . $row["subject"] . '"</i></p>
                        <p>' . $row["name"] . '</p>
                        <p>' . $row["email"] . '</p>
                        <form action="read.php" method="POST"><input type="hidden" name="read" value="' . $row["id"] . '"><button type="submit" class="w3-button"><span>&#9993;</span></button></form>
                    </div>';
            }
        ?>
    </center>
    </body>
</html>