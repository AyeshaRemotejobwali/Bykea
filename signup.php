<?php
session_start();
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $vehicle_type = $_POST['vehicle_type'];
    
    $stmt = $conn->prepare("INSERT INTO drivers (name, email, password, vehicle_type) VALUES (?, ?, ?, ?)");
    if ($stmt->execute([$name, $email, $password, $vehicle_type])) {
        echo "<script>alert('Driver signup successful!'); window.location.href='driver_login.php';</script>";
    } else {
        echo "<script>alert('Driver signup failed!');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Driver Signup - Bykea Clone</title>
    <style>
        body {
            background: linear-gradient(135deg, #1e3c72, #2a5298);
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            font-family: 'Arial', sans-serif;
        }
        .form-container {
            background: rgba(0, 0, 0, 0.7);
            padding: 40px;
            border-radius: 15px;
            width: 100%;
            max-width: 400px;
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
        a {
            color: #00ff88;
            text-decoration: none;
            display: block;
            text-align: center;
            margin-top: 15px;
        }
        @media (max-width: 480px) {
            .form-container {
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Driver Signup</h2>
        <form method="POST">
            <input type="text" name="name" placeholder="Name" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <select name="vehicle_type" required>
                <option value="" disabled selected>Select Vehicle Type</option>
                <option value="Bike">Bike</option>
                <option value="Car">Car</option>
            </select>
            <button type="submit">Signup</button>
        </form>
        <a href="#" onclick="redirect('driver_login.php')">Already a driver? Login</a>
    </div>
    <script>
        function redirect(page) {
            window.location.href = page;
        }
    </script>
</body>
</html>
