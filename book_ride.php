<?php
session_start();
require 'db.php';

if (!isset($_SESSION['user_id'])) {
    echo "<script>window.location.href='login.php';</script>";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pickup = $_POST['pickup'];
    $dropoff = $_POST['dropoff'];
    $service_type = $_POST['service_type'];
    $user_id = $_SESSION['user_id'];
    $distance = rand(1, 50); // Simulated distance in km
    $price = $distance * 10; // Price calculation: 10 per km
    $status = 'pending';
    
    $stmt = $conn->prepare("INSERT INTO bookings (user_id, pickup, dropoff, service_type, distance, price, status) VALUES (?, ?, ?, ?, ?, ?, ?)");
    if ($stmt->execute([$user_id, $pickup, $dropoff, $service_type, $distance, $price, $status])) {
        $booking_id = $conn->lastInsertId();
        echo "<script>alert('Booking successful! Price: $price PKR'); window.location.href='track.php?booking_id=$booking_id';</script>";
    } else {
        echo "<script>alert('Booking failed!');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Ride/Delivery - Bykea Clone</title>
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
        input, select {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: none;
            border-radius: 5px;
            background: rgba(255, 255, 255, 0.2);
            color: #fff;
        }
        input::placeholder {
            color: #ccc;
        }
        button {
            width: 100%;
            padding: 10px;
            background: #00ff88;
            border: none;
            border-radius: 5px;
            color: #1e3c72;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s;
        }
        button:hover {
            background: #00cc70;
        }
        @media (max-width: 480px) {
            .container {
                margin: 20px;
                padding: 15px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Book Ride or Delivery</h2>
        <form method="POST">
            <input type="text" name="pickup" placeholder="Pickup Location" required>
            <input type="text" name="dropoff" placeholder="Dropoff Location" required>
            <select name="service_type" required>
                <option value="" disabled selected>Select Service</option>
                <option value="ride">Ride</option>
                <option value="delivery">Parcel Delivery</option>
            </select>
            <button type="submit">Book Now</button>
        </form>
    </div>
    <script>
        function redirect(page) {
            window.location.href = page;
        }
    </script>
</body>
</html>
