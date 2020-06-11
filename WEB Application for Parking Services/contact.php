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
    <style type="text/css">
        .disabled {
            pointer-events: none;
            cursor: not-allowed;
        }
        .mapouter {
            position:relative;
            text-align:right;
            height:500px;
            width:600px;
        }
        .gmap_canvas {
            overflow:hidden;
            background:none!important;
            height:500px;
            width:600px;
        }
    </style>
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
                <a href="loging.php" class="w3-br-item w3-button w3-mobile">Izlogujte Se</a><a href="profile.php"><i class="fa fa-user" style="font-size:36px"></i></a>&nbsp;Zdravo <?php echo'<b>' . $_SESSION['name'] . '</b>'; ?>
                    <?php 
                    }
                    ?>
                <div class="w3-right w3-mobile">
                    <a href="index.php" class="w3-bar-item w3-button w3-mobile">Pocetna</a>
                    <a href="park.php" class="w3-bar-item w3-button w3-mobile">Parkiraj</a>
                    <a href="contact.php" class="w3-bar-item w3-button w3-mobile"><u>Kontakt</u></a>
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
        <!-- Map Section -->
<center>
            <div class="mapouter" style="margin-top: 8%;">
                <h2 align="center">Posetite nas na adresi:</h2>
                <h4 align="center">Kneza Viseslava br. 27, 11030, Beograd</h4>
                <h4 align="center">Telefon: +381 11 3035 400</h4>
                <div class="gmap_canvas">
                    <iframe width="600" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=kneza%20viseslava%2027&t=&z=15&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                    <iframe width="600" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=kneza%20viseslava%2030&t=&z=15&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                    <a href="https://www.embedgooglemap.net/blog/nordvpn-coupon-code/">nord 3 year</a>
                </div>
            </div>
</center>
<!--Contact Section-->
<center>
            <div class="w3-container w3-padding-32" style="max-width: 40%; min-width: 40%; margin-top: 5%">
                <br>
                <h3 class="w3-border-bottom w3-border-light-grey w3-padding-16" align="center">Poruka administratoru</h3>
                <p align="center">Ako imate primedbu na nas rad ili ste naisli na bilo kakvu gresku</p>
                <p align="center"> Molimo vas da nas kontaktirate i nadlezni ce to resiti u sto kracem roku</p>
                <form action="send.php" method="POST">
                    <input type="text" class="w3-input w3-section w3-border-bottom" name="title" required maxlength="50" placeholder="Naslov*">
                    <textarea type="textarea" class="w3-input w3-section w3-border-bottom" name="message" placeholder="Poruka" maxlength="6000" rows="8" cols="40"></textarea><br>
                    <br>
                    <button class="w3-button w3-block w3-black <?php if(!isset($_SESSION['id'])) { ?> disabled <?php } ?> " type="submit">
                        <i class="fa fa-paper-plane"></i><u>Posaljite poruku</u>
                    </button>
                </form>
            </div>
</center> 
    </body>
</html>