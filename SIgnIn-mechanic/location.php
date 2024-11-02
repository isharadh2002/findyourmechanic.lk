<?php


error_reporting(E_ALL);
ini_set('display_errors', 1);

if (isset($_POST["latitude"]) && isset($_POST["longitude"])) {
    $latitude = floatval($_POST["latitude"]);
    $longitude = floatval($_POST["longitude"]);

    // Store the values in a file
    $file = fopen("location_data.txt", "a");
    fwrite($file, "Latitude: " . $latitude . ", Longitude: " . $longitude . "\n");
    fclose($file);

    // Send a JSON response back to the client
    json_encode(["status" => "success", "latitude" => $latitude, "longitude" => $longitude]);
} else {
    json_encode(["status" => "error", "message" => "Invalid location data"]);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Real-Time Location Tracking</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <style>
        body {
            display: flex;




        }

        .container {
            margin: 5vh;
            display: flex;
            height: 100vh;
            flex-wrap: nowrap;
            justify-content: space-evenly;
        }

        .left {


            display: flex;
            background-color: #0295f1bd;
            justify-content: center;
            align-items: center;
            height: 100%;
            text-align: center;
            border-radius: 45px;
            color: white;



        }

        .left h1 {
            margin: 0 19vh;
            text-decoration-style: wavy;
            font-family: cursive;
            font-weight: bolder;
            font-size: 6vh;
        }

        .right {
            background-color: whitesmoke;
            border-radius: 45px;


            justify-content: center;
            align-items: center;
            height: 100%;
            display: flex;
            flex-direction: column;
            margin: 0vh 10vh;





        }

        .button {
            justify-content: space-evenly;
            align-items: center;
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            margin: 5vh 15vh;


        }


        button:hover {
            background-color: #0295f1e6;

        }

        button {
            background-color: #0295f1bd;
            align-items: center;
            color: white;
            padding: 24px 51px;
            text-decoration: none;
            margin: 7vh 1vh;
            cursor: pointer;
            border-radius: 10px;
            border: none;
            font-size: xx-large;
            font-weight: 700;
            font-family: system-ui;

        }
    </style>
</head>


<body>
    <div class="container">
        <div class="left">
            <h1>Real-Time <br>Location<br>Tracking</h1>
        </div>
        <div class="right">
            <div class="button">
                <button onclick="startTracking()">Start Tracking</button>
                <button onclick="stopTracking()">Stop Tracking</button>
            </div>
            <p id="status"></p>
            <div id="map" style="width: 600px; height: 400px;"></div>
        </div>
    </div>
    <script>
        let map;
        let marker;
        let watchId;

        function initMap(latitude, longitude) {
            map = L.map('map').setView([latitude, longitude], 12);
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);

            marker = L.marker([latitude, longitude]).addTo(map)
                .bindPopup("You are here!")
                .openPopup();
        }

        function updateMap(latitude, longitude) {
            if (marker) {
                marker.setLatLng([latitude, longitude]);
                map.setView([latitude, longitude]);
            } else {
                initMap(latitude, longitude); // Initialize map on the first update
            }
        }

        function startTracking() {
            if (navigator.geolocation) {
                document.getElementById("status").innerText = "Tracking your location...";
                watchId = navigator.geolocation.watchPosition(sendPosition, showError, {
                    enableHighAccuracy: true,
                    maximumAge: 30000,
                    timeout: 27000
                });
            } else {
                document.getElementById("status").innerText = "Geolocation is not supported by this browser.";
            }
        }

        function stopTracking() {
            if (watchId) {
                navigator.geolocation.clearWatch(watchId);
                document.getElementById("status").innerText = "Stopped tracking.";
            }
        }

        function sendPosition(position) {
            const latitude = position.coords.latitude;
            const longitude = position.coords.longitude;
            document.getElementById("status").innerText = `Latitude: ${latitude}, Longitude: ${longitude}`;
            updateMap(latitude, longitude);
            sendToServer(latitude, longitude);
        }

        function sendToServer(latitude, longitude) {
            const xhr = new XMLHttpRequest();
            xhr.open("POST", "save_location.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4) {
                    if (xhr.status === 200) {
                        console.log("Location saved:", xhr.responseText);
                    } else {
                        console.error("Failed to save location:", xhr.status, xhr.statusText);
                    }
                }
            };
            xhr.send("latitude=" + latitude + "&longitude=" + longitude);
        }

        function showError(error) {
            let message = "";
            switch (error.code) {
                case error.PERMISSION_DENIED:
                    message = "User denied the request for Geolocation.";
                    break;
                case error.POSITION_UNAVAILABLE:
                    message = "Location information is unavailable.";
                    break;
                case error.TIMEOUT:
                    message = "The request to get user location timed out.";
                    break;
                case error.UNKNOWN_ERROR:
                    message = "An unknown error occurred.";
                    break;
            }
            document.getElementById("status").innerText = message;
        }
    </script>
</body>

</html>