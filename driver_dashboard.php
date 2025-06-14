<?php
session_start();
require 'db.php';

if (!isset($_SESSION['driver_id'])) {
    echo "<script>window.location.href='driver_login.php';</script>";
}

$driver_id = $_SESSION['driver_id'];
$stmt = $conn->prepare("SELECT * FROM bookings WHERE driver_id IS NULL AND status = 'pending'");
$stmt->execute();
$bookings = $stmt->fetchAll();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $booking_id = $_POST['booking_id'];
    $stmt = $conn->prepare("UPDATE bookings SET driver_id = ?, status = 'accepted' WHERE id = ?");
    if ($stmt->execute([$driver_id, $booking_id])) {
        echo "<script>alert('Booking accepted!'); window.location.href='track_driver.php?booking_id=$booking_id';</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Driver Dashboard - Bykea Clone</title>
    <style>
        body {
            background: linear-gradient(135deg, #1e3c72, #2a5298);
            color: #fff;
            font-family: 'Arial', sans-serif;
            min-height: 100vh;
        }
        .container {
            max-width: 800px;
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
        .booking {
            background: rgba(255, 255, 255, 0.1);
            padding: 15px;
            margin: 10px 0;
            border-radius: 10px;
        }
        button {
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
        <h2>Driver Dashboard</h2>
        <?php foreach ($bookings as $booking): ?>
            <div class="booking">
                <p>Service: <?php echo $booking['service_type']; ?></p>
                <p>Pickup: <?php echo $booking['pickup']; ?></p>
                <p>Dropoff: <?php echo $booking['dropoff']; ?></p>
                <p>Price: <?php echo $booking['price']; ?> PKR</p>
                <form method="POST">
                    <input type="hidden" name="booking_id" value="<?php echo $booking['id']; ?>">
                    <button type="submit">Accept</button>
                </form>
            </div>
        <?php endforeach; ?>
    </div>
    <script>
        function redirect(page) {
            window.location.href = page;
        }
    </script>
</body>
</html>
