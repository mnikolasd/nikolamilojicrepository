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
        <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
        <title>Parking Servis</title>
    </head>
    <style type="text/css">
        body, html {
            width: 100%;
            height: 100%;
            margin: 0;
        }

        .container {
            width: 100%;
            height: 100%;
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
                    <a href="parkingZones.php" class="w3-br-item w3-button w3-mobile">Parking zone</a>
                    <a href="messages.php" class="w3-br-item w3-button w3-mobile">Poruke</a>
                    <a href="stats.php" class="w3-br-item w3-button w3-mobile"><u>Statistika</u></a>
                </div>
            </div>
        </div>
    <center>
        <?php
            include("../connection.php");
            $GLOBALS["con"]= connect();
            
            $thisMonth = date('m');
            $lastMonth = date('m', strtotime("-1 month"));;
            
            $queryUsersLast = "SELECT COUNT(id) AS total FROM users WHERE MONTH(registered) LIKE $lastMonth";
            $resultUsersLast = mysqli_query($GLOBALS["con"], $queryUsersLast);
            $totalUsersLast = mysqli_fetch_assoc($resultUsersLast);
            
            $queryUsersThis = "SELECT COUNT(id) AS total FROM users WHERE MONTH(registered) LIKE $thisMonth";
            $resultUsersThis = mysqli_query($GLOBALS["con"], $queryUsersThis);
            $totalUsersThis = mysqli_fetch_assoc($resultUsersThis);
            
            $queryReservationsLast = "SELECT COUNT(id) AS total FROM reservations WHERE MONTH(reserved_date) LIKE $lastMonth";
            $resultReservationsLast = mysqli_query($GLOBALS["con"], $queryReservationsLast);
            $totalReservationsLast = mysqli_fetch_assoc($resultReservationsLast);
            
            $queryReservationsThis = "SELECT COUNT(id) AS total FROM reservations WHERE MONTH(reserved_date) LIKE $thisMonth";
            $resultReservationsThis = mysqli_query($GLOBALS["con"], $queryReservationsThis);
            $totalReservationsThis = mysqli_fetch_assoc($resultReservationsThis);
            
            $queryEarningsLast = "SELECT SUM(earnings) AS total FROM reservations WHERE MONTH(reserved_date) LIKE $lastMonth";
            $resultEarningsLast = mysqli_query($GLOBALS["con"], $queryEarningsLast);
            $totalEarningsLast = mysqli_fetch_assoc($resultEarningsLast);
            
            $queryEarningsThis = "SELECT SUM(earnings) AS total FROM reservations WHERE MONTH(reserved_date) LIKE $thisMonth";
            $resultEarningsThis = mysqli_query($GLOBALS["con"], $queryEarningsThis);
            $totalEarningsThis = mysqli_fetch_assoc($resultEarningsThis);
            
            $queryErrorsLast = "SELECT COUNT(id) AS total FROM messages WHERE MONTH(date_sent) LIKE $lastMonth";
            $resultErrorsLast = mysqli_query($GLOBALS["con"], $queryErrorsLast);
            $totalErrorsLast = mysqli_fetch_assoc($resultErrorsLast);
            
            $queryErrorsThis = "SELECT COUNT(id) AS total FROM messages WHERE MONTH(date_sent) LIKE $thisMonth";
            $resultErrorsThis = mysqli_query($GLOBALS["con"], $queryErrorsThis);
            $totalErrorsThis = mysqli_fetch_assoc($resultErrorsThis);
            
            $queryAddressesLast = "SELECT COUNT(id) AS total FROM addresses WHERE MONTH(date_added) LIKE $lastMonth";
            $resultAddressesLast = mysqli_query($GLOBALS["con"], $queryAddressesLast);
            $totalAddressesLast = mysqli_fetch_assoc($resultAddressesLast);
            
            $queryAddressesThis = "SELECT COUNT(id) AS total FROM addresses WHERE MONTH(date_added) LIKE $thisMonth";
            $resultAddressesThis = mysqli_query($GLOBALS["con"], $queryAddressesThis);
            $totalAddressesThis = mysqli_fetch_assoc($resultAddressesThis);
        ?>
        <script>
        window.onload = function () {

            var chart = new CanvasJS.Chart("chartContainer", {
                exportEnabled: true,
                animationEnabled: true,
                title:{
                        text: "Statistika napretka sajta"
                },
                subtitles: [{
                        text: "Kliknite legendu da otkrijete i sakrijete podatke"
                }], 
                axisX: {
                        title: "Kategorije"
                },
                axisY: {
                        title: "Prethodni mesece",
                        titleFontColor: "#4F81BC",
                        lineColor: "#4F81BC",
                        labelFontColor: "#4F81BC",
                        tickColor: "#4F81BC"
                },
                axisY2: {
                        title: "Trenutni mesec",
                        titleFontColor: "#C0504E",
                        lineColor: "#C0504E",
                        labelFontColor: "#C0504E",
                        tickColor: "#C0504E"
                },
                toolTip: {
                        shared: true
                },
                legend: {
                        cursor: "pointer",
                        itemclick: toggleDataSeries
                },
                data: [{
                        type: "column",
                        name: "Prethodni mesec",
                        showInLegend: true,      
                        yValueFormatString: "#,##0.#",
                        dataPoints: [
                                { label: "Novi Korisnici",  y: <?php echo $totalUsersLast["total"]; ?> },
                                { label: "Placene Rezervacije", y: <?php echo $totalReservationsLast["total"]; ?> },
                                { label: "Ukupna Zarada", y: <?php echo $totalEarningsLast["total"]; ?> },
                                { label: "Nove Otkrivene Greske",  y: <?php echo $totalErrorsLast["total"]; ?> },
                                { label: "Ukupno Parking Mesta",  y: <?php echo $totalAddressesLast["total"]; ?> }
                        ]
                },
                {
                        type: "column",
                        name: "Trenutni mesec",
                        axisYType: "secondary",
                        showInLegend: true,
                        yValueFormatString: "#",
                        dataPoints: [
                                { label: "Novi Korisnici", y: <?php echo $totalUsersThis["total"]; ?> },
                                { label: "Placene Rezervacije", y: <?php echo $totalReservationsThis["total"]; ?> },
                                { label: "Ukupna Zarada", y: <?php echo $totalEarningsThis["total"]; ?> },
                                { label: "Nove Otkrivene Greske", y: <?php echo $totalErrorsThis["total"]; ?> },
                                { label: "Ukupno Parking Mesta", y: <?php echo $totalAddressesThis["total"]; ?> }
                        ]
                }]
            });

            chart.render();

            function toggleDataSeries(event) {
                if (typeof (event.dataSeries.visible) === "undefined" || event.dataSeries.visible) {
                        event.dataSeries.visible = false;
                } else {
                        event.dataSeries.visible = true;
                }
                e.chart.render();
            }

        }
        </script>
        <div id="chartContainer" style="height: 370px; width: 100%; margin-top: 10%;"></div>
    </center>
    </body>
</html>