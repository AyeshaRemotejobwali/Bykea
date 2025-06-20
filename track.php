<?php
session_start();
require 'db.php';

if (!isset($_SESSION['user_id']) || !isset($_GET['booking_id'])) {
    echo "<script>window.location.href='login.php';</script>";
}

$booking_id = $_GET['booking_id'];
$stmt = $conn->prepare("SELECT * FROM bookings WHERE id = ? AND user_id = ?");
$stmt->execute([$booking_id, $_SESSION['user_id']]);
$booking = $stmt->fetch();

if (!$booking) {
    echo "<script>window.location.href='book_ride.php';</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Track Booking - Bykea Clone</title>
    <style>
        body {
            background: linear-gradient(135deg, #1e3c72, #2a5298);
            color: #fff;
            font-family: 'Arial', sans-serif;
            min-height: 100vh;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background: rgba(0, 0, 0, 0.7);
            border-radius: 15px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.5);
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #00ff88;
        }
        #map {
            height: 400px;
            background: #fff;
            border-radius: 10px;
            margin-bottom: 20px;
        }
        p {
            margin: 10px 0;
        }
        @media (max-width: 480px) {
            .container {
                margin: 20px;
                padding: 15px;
            }
            #map {
                height: 300px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Track Your Booking</h2>
        <p>Service: <?php echo $booking['service_type']; ?></p>
        <p>Pickup: <?php echo $booking['pickup']; ?></p>
        <p>Dropoff: <?php echo $booking['dropoff']; ?></p>
        <p>Price: <?php echo $booking['price']; ?> PKR</p>
        <p>Status: <?php echo $booking['status']; ?></p>
        <div id="map"></div>
    </div>
    <script>
        // Simulated real-time tracking (replace with actual map API in production)
        function initMap() {
            const mapDiv = document.getElementById('map');
            mapDiv.innerHTML = 'Map placeholder (Integrate Google Maps or OpenStreetMap API here)';
        }
        initMap();
        function redirect(page) {
            window.location.href = page;
        }
    </script>
</body>
</html>
