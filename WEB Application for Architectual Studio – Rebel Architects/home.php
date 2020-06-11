<!DOCTYPE html>
<!--
    Document   : home
    Created on : Sep 24, 2019, 8:38 PM
    Authors    : Nikola & Jovana
-->
<html>
    <head>
        <title>Rebel Architects</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/contact-buttons.css">
    </head>
    <style type="text/css">
        .margine {
            margin-left: 3%;
            margin-right: 3%;
            }
        .bigBar {
            padding: 1px;
            width: 100%;
            background: darkslategrey; 
        }
        .topnav {
            overflow: hidden;
          }

          

          .topnav .icon {
            display: none;
            color: black;
          }

          @media screen and (max-width: 600px) {
            .topnav a:not(:first-child) {display: none;}
            .topnav a.icon {
              float: right;
              display: block;
            }
          }

          @media screen and (max-width: 600px) {
            .topnav.responsive {position: relative;}
            .topnav.responsive .icon {
              position: absolute;
              right: 0;
              top: 0;
            }
            .topnav.responsive a {
              float: none;
              display: block;
              text-align: center;
            }
          }
    </style>
    <body>
        <header class="w3-top w3-border-bottom" style="opacity: 80%;">
            <div class="w3-bar w3-white w3-wide w3-padding">
                <a class="w3-hide-small" href="home.php">
                    <img src="images/pocetna.jpg" width="150" height="100" class="w3-circle float-left" alt="logo">
                </a>
<!-- Float links to the right. Hide them on small screens -->
                <div class="w3-right topnav" id="myTopnav">
                    <a href="home.php" class="w3-bar-item w3-button"><u>Home</u></a>
                    <a href="#news" class="w3-bar-item w3-button">News</a>
                    <a href="projects.php?trazi=0" class="w3-bar-item w3-button">Projects</a>
                    <a href="contact-form/formpage.html" class="w3-bar-item w3-button">Contact</a>
                    <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                        <i class="fa fa-bars"></i>
                    </a>
                </div>
            </div>
            <div class="bigBar"></div>
        </header>
        <div class="w3-display-container w3-content w3-wide" style="max-width:100%; min-width: 100%;" id="home">
            <img class="w3-image" src="images/pocetna3.jpg" alt="Rebel Architects" width="100%" height="800">
            <div class="w3-display-middle w3-margin-top w3-center">
                <h1 class="w3-xxlarge w3-text-white"><span class="w3-padding w3-black w3-opacity-min"><b>REBEL</b></span> <span class="w3-hide-small w3-text-grey">Architects</span></h1>
            </div>
        </div>
        <div class="w3-content w3-padding" style="max-width:1550px">
            <div class="w3-container w3-padding-32" id="news">
                <h3 class="w3-border-bottom w3-border-light-grey w3-padding-small">News</h3>
                <br>
                <?php
                    include "connection.php";
                    $GLOBALS['kon']=konekcija();

                    $upit="SELECT * FROM posts ORDER BY datum desc LIMIT 1";
                    $rezultat= mysqli_query($kon, $upit);

                    while ($ispis = mysqli_fetch_assoc($rezultat)) {
                        print'  <div class="w3-card w3-stretch" style="max-height: 400px; min-height: 400px;>
                                        <header class="w3-container w3-light-grey">
                                            <h2 class="w3-center">' . $ispis["naslov"] . '</h2>
                                        </header>
                                        <div class="w3-container">
                                            <p class="w3-center">' . $ispis["datum"] . '</p>
                                            <hr>
                                            <img src="images/' . $ispis["slika"] . '" alt="Avatar" class="w3-left" style="max-height: 290px; min-width: 700px; max-width: 700px; margin-right: 17px">
                                            <p class="w3-justify" style="word-wrap: break-word">' . $ispis["opis1"] . '</p>
                                                <a style="color: black" href="news.php"><u>Saznaj vise</u></a>
                                        </div>
                                        
                                </div>';
                    }
                ?>
            </div><br><br><br>
<!-- Like-->
            <script>
            // Toggle between hiding and showing blog replies/comments
                function likeFunction(x) {
                    x.style.fontWeight = "bold";
                    x.innerHTML = "✓ Liked";
                }
            </script>
 <!--Social slider-->
            <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
            <script src="js/jquery.contact-buttons.js"></script>
            <script src="js/demo.js"></script>
            <script type="text/javascript">
                var _gaq = _gaq || [];
                _gaq.push(['_setAccount', 'UA-36251023-1']);
                _gaq.push(['_setDomainName', 'jqueryscript.net']);
                _gaq.push(['_trackPageview']);
                (function() {
                    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
                    ga.src = ('https:' === document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
                    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
                })();
                
                function myFunction() {
                    var x = document.getElementById("myTopnav");
                    if (x.className === "topnav") {
                        x.className += " responsive";
                    } else {
                        x.className = "topnav";
                    }
                  }
            </script>
<!-- End page content -->
        </div>
<!-- Footer -->
        <footer class="w3-center w3-border w3-padding-64 w3-opacity w3-hover-opacity-off w3-display-container">
            <div class="w3-display-left w3-margin-left">
                <p>Copyright © Rebel Architects</p>
                <p>All Rights Reserved</P>
                <p>Design by Nikola & Jovana</p>
            </div>
            <div class="w3-display-middle">
            <a href="#home" class="w3-button w3-light-grey">
                <i class="fa fa-arrow-up w3-margin-right"></i>To the top
            </a>
            <div class="w3-xlarge w3-section w3-hide-small">
                <p>#rebelarchitects</p>
            </div>
            </div>
            <div class="w3-display-right w3-margin-right">
                <p><b>Location</b></p>
                <p>Adresa ta i ta</p>
                <p>Budva, Montenegro</p>
            </div>
        </footer>
    </body>
</html>
