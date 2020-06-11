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
        <link rel="stylesheet" type="text/css" href="css/modal.css">
        <link rel="stylesheet" type="text/css" href="css/fonts.css">
        <title>Parking Servis</title>
    </head>
    <body>
        <div class="w3-top" style="opacity: 80%;">
            <div class="w3-bar w3-white w3-wide w3-padding w3-card">
                <?php
                    session_start();
                    if (!isset($_SESSION['id'])) {
                ?>
                <span id="btnModal" class="w3-bar-item w3-button w3-mobile">Ulogujte se</span>
                <a href="signup.php" class="w3-bar-item w3-button w3-mobile">Registrujte Se</a>
                    <?php } else { ?>
                <a href="loging.php" class="w3-br-item w3-button w3-mobile">Izlogujte Se</a>
                <a href="profile.php"><i class="fa fa-user" style="font-size:36px"></i></a>&nbsp;Zdravo <?php echo'<b>' . $_SESSION['name'] . '</b>'; ?>
                    <?php 
                    }
                    ?>
                <div class="w3-right w3-mobile">
                    <a href="index.php" class="w3-bar-item w3-button w3-mobile"><u>Pocetna</u></a>
                    <a href="park.php" class="w3-bar-item w3-button w3-mobile">Parkiraj</a>
                    <a href="contact.php" class="w3-bar-item w3-button w3-mobile">Kontakt</a>
                </div>
            </div>
        </div>
        <!--Modal Login-->
        <div id="modal" class="modal">
            <div class="modal-content">
                <span id="close" class="close">&times;</span>
                <br>
                <h3 class="w3-border-bottom w3-border-light-grey w3-padding-16" align="center">Ulogujte se</h3>
                <form action="loging.php" method="POST">
                    <input class="w3-input w3-border" type="text" placeholder="Korisniko Ime*" name="name" required>
                    <input class="w3-input w3-section w3-border" type="password" placeholder="Lozinka*" name="password" required>
                    <br><br>
                    <button class="w3-button w3-black w3-section w3-display-bottommiddle" type="submit">
                        <i class="fa fa-paper-plane"></i> Uloguj se
                    </button>
                </form>
            </div>
        </div>
        <script src="js/modal.js"></script>
        <div class="w3-display-container w3-content w3-wide" style="max-width:1500px" id="home">
            <img class="w3-image" src="Images/ParkingServisLogo.jpg" alt="SLIKA" style="width: 1500px; max-height: 1100px">
        </div>
    </body>
</html>