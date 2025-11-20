<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Successful - LearnHub</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f2f5;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .success-container {
            background-color: #ffffff;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.08);
            padding: 3rem 2rem;
            width: 100%;
            max-width: 500px;
            text-align: center;
        }
        .success-icon {
            font-size: 4rem;
            color: #28a745;
            margin-bottom: 1rem;
        }
        .success-container h2 {
            color: #6a6aff;
            margin-bottom: 1rem;
            font-weight: 700;
        }
        .success-container p {
            font-size: 1.1rem;
            margin-bottom: 2rem;
            color: #555;
        }
        .login-btn {
            background-color: #6a6aff;
            color: white;
            border: none;
            padding: 0.75rem 2rem;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            transition: background-color 0.3s ease;
        }
        .login-btn:hover {
            background-color: #5a5ae0;
        }
        .back-link {
            display: block;
            margin-top: 1.5rem;
            color: #6a6aff;
            text-decoration: none;
            font-weight: 600;
        }
        .back-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="success-container">
        <div class="success-icon">✓</div>
        <h2>Registration Successful!</h2>
        <p>Welcome to LearnHub, <?php echo isset($_SESSION['name']) ? htmlspecialchars($_SESSION['name']) : 'User'; ?>! Your account has been created successfully.</p>
        <a href="/login" class="login-btn">Login Now</a>
        <a href="/" class="back-link">Back to Home</a>
    </div>
</body>
</html>
