<!DOCTYPE html>
<!--
Nikola Milojic Developer Test 17.1.2020.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Developer Test</title>
    </head>
    <style type="text/css">
        @font-face {
            font-family:'Futura Md BT';
            src:url(futura_medium_bt.ttf) format('truetype');
         }
         body, input, input::placeholder, button, p, h6 {
             font-family: Futura Md BT;
         }
        .split {
            height: 100%;
            position: fixed;
            top: 0;
        }
        .left {
            left: 0;
            width: 40%;
        }
        .right {
            right: 0;
            width: 60%;
        }
        .form {
            margin: 30% 5% 30% 5%;
        }
        .input {
            margin: 2% 2% 2% 2%;
            height: 45px;
            width: 35%;
            background-color: #f2f2f2;
            border: none;
            border-radius: 5px;
        }
        .input::placeholder {
            color: darkgray;
        }
        .lower {
            width: 76%;
        }
        h6 {
            background-color: #3399ff;
            margin-top: 0px;
            min-height: 50px;
            max-height: 50px;
            font-size: 32px;
            color: white;
        }
        button {
            background-color: #3399ff;
            color: white;
            width: 77%;
            min-height: 50px;
            border: none;
            border-radius: 5px;
            margin-top: 10%;
            font-size: 20px;
        }
        body {
            font-family: Futura Md BT;
        }
        #map_canvas { 
            height: 100%;
        }
        .hide {
            display: none;
        }
        .show {
            display: block;
            margin-top: 0px;
            margin-bottom: 0px;
            color: red;
        }
        .red {
            background-color: #ff3333;
            color: white;
        }
        .red::placeholder {
            color: white;
        }
    </style>
    <body onload="initialize()">
        <div class="split left">
            <center>
                <h6>User Details</h6>
                <div class="form">
                    <form action="input.php" method="POST" onsubmit="return validate()">
                        <p class="hide" id="pname">Please enter First Name</p>
                        <p class="hide" id="plastname">Please enter Last Name</p>
                        <p class="hide" id="paddress">Please enter Street / Number</p>
                        <p class="hide" id="pcity">Please enter City</p>
                        <p class="hide" id="pcountry">Please enter country</p>
                        <input type="text" class="input" id="name" name="firstname" placeholder="First Name">
                        <input type="text" class="input" id="lastname" name="lastname" placeholder="Last Name"><br>
                        <input type="text" class="input lower" id="address" name="streetnumber" placeholder="Street / Number"><br>
                        <input type="text" class="input lower" id="city" name="city" placeholder="City"><br>
                        <input type="text" class="input lower" id="country" name="country" placeholder="Country"><br>
                        <button type="submit">Add User</button>
                    </form>
                </div>
            </center>
        </div>
        <script type="text/javascript">
            function validate() {
                var name = document.getElementById("name").value;
                var ni = document.getElementById("name");
                var pn = document.getElementById("pname");
                
                var lastname = document.getElementById("lastname").value;
                var is = document.getElementById("lastname");
                var ps = document.getElementById("plastname");
                
                var address = document.getElementById("address").value;
                var ia = document.getElementById("address");
                var pa = document.getElementById("paddress");
                
                var city = document.getElementById("city").value;
                var ic = document.getElementById("city");
                var pc = document.getElementById("pcity");
                
                var country = document.getElementById("country").value;
                var iu = document.getElementById("country");
                var pu = document.getElementById("pcountry");

                if (!name) {
                  pn.classList.add("show");
                  ni.classList.add("red");
                  return false;
                } else if (!lastname) {
                  ps.classList.add("show");
                  is.classList.add("red");
                  return false;
                } else if (!address) {
                  pa.classList.add("show");
                  ia.classList.add("red");
                  return false;
                } else if (!city) {
                  pc.classList.add("show");
                  ic.classList.add("red");
                  return false;
                } else if (!country) {
                  pu.classList.add("show");
                  iu.classList.add("red");
                  return false;
                } else {
                  return true;
                }
              }
        </script>
        <div class="split right">
            <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyAgp110dBvOenjg4D7WxHZIW3LDQxPSjmo&sensor=false"></script>
            <script type="text/javascript">
                function initialize() {
                    var optionsMap = {
                        center: new google.maps.LatLng(45.809491, 9.058696),
                        zoom: 13,
                        mapTypeId: google.maps.MapTypeId.ROADMAP
                    };
                    var map = new google.maps.Map(document.getElementById("map_canvas"), optionsMap);

                    var list_of_spots=[[45.7967, 9.0448], [45.817441, 9.064875]];

                    var i=0, li=list_of_spots.length;
                    while(i<li){
                        new google.maps.Marker({
                            position: new google.maps.LatLng(list_of_spots[i][0], list_of_spots[i][1]),
                            map: map
                        });
                        i++;
                    }
                }
            </script>
            <div id="map_canvas"></div>
        </div>
    </body>
</html>