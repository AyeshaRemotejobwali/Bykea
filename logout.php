<?php
session_start();

// Destroy the session
session_unset();
session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout - Bykea Clone</title>
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
        .container {
            background: rgba(0, 0, 0, 0.7);
            padding: 40px;
            border-radius: 15px;
            width: 100%;
            max-width: 400px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.5);
            text-align: center;
        }
        h2 {
            margin-bottom: 20px;
            color: #00ff88;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }
        p {
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
            display: inline-block;
            transition: transform 0.2s, box-shadow 0.2s;
        }
        .btn:hover {
            transform: scale(1.05);
            box-shadow: 0 5px 15px rgba(0, 255, 136, 0.4);
        }
        @media (max-width: 480px) {
            .container {
                padding: 20px;
                margin: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Logged Out</h2>
        <p>You have been successfully logged out!</p>
        <a href="#" onclick="redirect('index.php')" class="btn">Return to Homepage</a>
    </div>
    <script>
        function redirect(page) {
            window.location.href = page;
        }
    </script>
</body>
</html>
