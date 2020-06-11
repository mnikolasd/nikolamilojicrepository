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
                    <a href="negde.php" class="w3-br-item w3-button w3-mobile">Parking zone</a>
                    <a href="stats.php" class="w3-br-item w3-button w3-mobile">Statistika</a>
                </div>
            </div>
        </div>
    <center>
        <?php
            include("../connection.php");
            $GLOBALS["conn"] = connect();

            $id = $_SESSION['id'];

            $query = "SELECT * FROM users WHERE id = $id";
            $result = mysqli_query($GLOBALS['conn'], $query);

            $row = mysqli_fetch_assoc($result);

            echo '<div class="w3-container w3-padding-32" style="max-width: 30%; min-width: 30%">
                    <br>
                    <h3 class="w3-border-bottom w3-border-light-grey w3-padding-16" align="center">Moj admin profil</h3>
                    <br><br>
                    <form action="updateProfile.php" method="POST">
                        <input type="hidden" name="id" value="' . $_SESSION["id"] . '">
                        <h6><b>Moje ime</b></h6>
                        <input type="text" class="w3-input w3-section w3-border-bottom" name="name" maxlength="50" value="' . $row["name"] . '">
                        <h6><b>Moje korisnicko ime</b></h6>
                        <input type="text" class="w3-input w3-section w3-border-bottom" name="username" maxlength="50" value="' . $row["username"] . '">
                        <h6><b>Moj e-Mail</b></h6>
                        <input type="email" class="w3-input w3-section w3-border-bottom" name="email" maxlength="50" value="' . $row["email"] . '">
                        <h6><b>Moja lozinka</b></h6>
                        <input type="password" class="w3-input w3-section w3-border-bottom" name="password" maxlength="50" placeholder="Unesite novu lozinku ako zelite da je promenite">
                        <br>
                        <br>
                        <button class="w3-btn w3-green" type="submit">Izmeni</button>
                    </form>
                </div>';
        ?>
    </center>
    </body>
</html>