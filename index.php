<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bykea Clone - Homepage</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Arial', sans-serif;
        }
        body {
            background: linear-gradient(135deg, #1e3c72, #2a5298);
            color: #fff;
            min-height: 100vh;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            background: rgba(0, 0, 0, 0.7);
            border-radius: 10px;
        }
        header h1 {
            font-size: 2em;
            color: #00ff88;
        }
        nav a {
            color: #fff;
            text-decoration: none;
            margin: 0 15px;
            font-weight: bold;
            transition: color 0.3s;
        }
        nav a:hover {
            color: #00ff88;
        }
        .hero {
            text-align: center;
            padding: 50px 20px;
        }
        .hero h2 {
            font-size: 3em;
            margin-bottom: 20px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }
        .hero p {
            font-size: 1.2em;
            margin-bottom: 30px;
        }
        .btn {
            background: #00ff88;
            color: #1e3c72;
            padding: 15px 30px;
            border-radius: 25px;
            text-decoration: none;
            font-weight: bold;
            transition: transform 0.2s, box-shadow 0.2s;
        }
        .btn:hover {
            transform: scale(1.05);
            box-shadow: 0 5px 15px rgba(0, 255, 136, 0.4);
        }
        .services {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            padding: 50px 20px;
        }
        .service-card {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            padding: 20px;
            width: 300px;
            margin: 15px;
            text-align: center;
            transition: transform 0.3s;
        }
        .service-card:hover {
            transform: translateY(-10px);
        }
        .service-card h3 {
            margin-bottom: 15px;
            color: #00ff88;
        }
        @media (max-width: 768px) {
            header {
                flex-direction: column;
            }
            nav a {
                margin: 10px 0;
            }
            .hero h2 {
                font-size: 2em;
            }
            .service-card {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <header>
        <h1>Bykea Clone</h1>
        <nav>
            <a href="#" onclick="redirect('login.php')">Login</a>
            <a href="#" onclick="redirect('signup.php')">Signup</a>
            <a href="#" onclick="redirect('driver_signup.php')">Become a Driver</a>
        </nav>
    </header>
    <div class="container">
        <div class="hero">
            <h2>Ride or Deliver with Ease</h2>
            <p>Book a ride or send a parcel with our fast and reliable service!</p>
            <a href="#" onclick="redirect('book_ride.php')" class="btn">Book Now</a>
        </div>
        <div class="services">
            <div class="service-card">
                <h3>Ride Booking</h3>
                <p>Get to your destination quickly with our trusted drivers.</p>
            </div>
            <div class="service-card">
                <h3>Parcel Delivery</h3>
                <p>Send packages anywhere with our secure delivery service.</p>
            </div>
        </div>
    </div>
    <script>
        function redirect(page) {
            window.location.href = page;
        }
    </script>
</body>
</html>
