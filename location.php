



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Real-Time Location Tracking</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f4f4f4;
            height: 100vh;
        }

        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            width: 90%;
            max-width: 1200px;
        }

        .left,
        .right {
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .left {
            background-color: #0295f1;
            color: white;
            flex: 1;
            max-width: 400px;
            text-align: center;
        }

        .left h1 {
            font-size: 24px;
        }

        .right {
            background-color: white;
            flex: 2;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        #map {
            width: 100%;
            height: 400px;
            margin-top: 20px;
        }

        button {
            background-color: #0295f1;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            margin: 10px;
        }

        button:hover {
            background-color: #0066cc;
        }

        #status {
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="left">
            <h1>Real-Time Location Tracking</h1>
        </div>
        <div class="right">
            <div>
                <button onclick="startTracking()">Start Tracking</button>
                <button onclick="stopTracking()">Stop Tracking</button>
            </div>
            <p id="status"></p>
            <div id="map"></div>
        </div>
    </div>
    <script>
        let map, marker, watchId = null;

        function initMap(latitude = 0, longitude = 0) {
            map = L.map('map').setView([latitude, longitude], 12);
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);

            marker = L.marker([latitude, longitude]).addTo(map)
                .bindPopup("You are here!")
                .openPopup();
        }

        function updateMap(latitude, longitude) {
            if (!map) {
                initMap(latitude, longitude);
            } else {
                marker.setLatLng([latitude, longitude]);
                map.setView([latitude, longitude]);
            }
        }

        function startTracking() {
            if (navigator.geolocation) {
                document.getElementById("status").innerText = "Tracking your location...";
                watchId = navigator.geolocation.watchPosition(sendPosition, showError, {
                    enableHighAccuracy: true
                });
            } else {
                document.getElementById("status").innerText = "Geolocation is not supported by this browser.";
            }
            
        }

        function stopTracking() {
            if (watchId) {
                navigator.geolocation.clearWatch(watchId);
                watchId = null;
                document.getElementById("status").innerText = "Stopped tracking.";
            }
        }

        function sendPosition(position) {
            const latitude = position.coords.latitude;
            const longitude = position.coords.longitude;
            document.getElementById("status").innerText = `Latitude: ${latitude}, Longitude: ${longitude}`;
            updateMap(latitude, longitude);

            const xhr = new XMLHttpRequest();
            xhr.open("POST", "save_location.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onload = () => {
                if (xhr.status === 200) {
                    console.log("Location saved:", xhr.responseText);
                } else {
                    console.error("Error saving location.");
                }
            };
            xhr.send(`latitude=${latitude}&longitude=${longitude}`);
           // sendLocationToAnotherPage(latitude,longitude);
        }
        function sendLocationToAnotherPage(latitude,longitude){

            window.location.href=`nameOfPage.php?latitude=${latitude}&longitude=${longitude}`;


        }

        function showError(error) {
            const errorMessages = {
                1: "User denied Geolocation request.",
                2: "Location unavailable.",
                3: "Geolocation timed out."
            };
            document.getElementById("status").innerText = errorMessages[error.code] || "Unknown error.";
        }

        
        initMap(0, 0);



    </script>
</body>

</html>




