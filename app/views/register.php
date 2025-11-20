<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - LearnHub</title>
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
        .register-container {
            background-color: #ffffff;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.08);
            padding: 2rem;
            width: 100%;
            max-width: 400px;
            text-align: center;
        }
        .register-container h2 {
            color: #6a6aff;
            margin-bottom: 1.5rem;
            font-weight: 700;
        }
        .form-group {
            margin-bottom: 1rem;
            text-align: left;
        }
        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 600;
            color: #555;
        }
        .form-group input {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            font-size: 1rem;
            box-sizing: border-box;
        }
        .form-group input:focus {
            outline: none;
            border-color: #6a6aff;
            box-shadow: 0 0 0 2px rgba(106, 106, 255, 0.2);
        }
        .register-btn {
            background-color: #6a6aff;
            color: white;
            border: none;
            padding: 0.75rem 1.5rem;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            width: 100%;
            margin-top: 1rem;
            transition: background-color 0.3s ease;
        }
        .register-btn:hover {
            background-color: #5a5ae0;
        }
        .google-btn {
            background-color: #ffc107;
            color: #333;
            border: none;
            padding: 0.75rem 1.5rem;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            width: 100%;
            margin-top: 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background-color 0.3s ease;
        }
        .google-btn:hover {
            background-color: #e0a800;
        }
        .google-btn img {
            width: 20px;
            height: 20px;
            margin-right: 0.5rem;
        }
        .login-link {
            margin-top: 1.5rem;
            font-size: 0.9rem;
        }
        .login-link a {
            color: #6a6aff;
            text-decoration: none;
        }
        .login-link a:hover {
            text-decoration: underline;
        }
        .back-link {
            display: block;
            text-align: left;
            margin-bottom: 1rem;
            color: #6a6aff;
            text-decoration: none;
            font-weight: 600;
        }
        .back-link:hover {
            text-decoration: underline;
        }
        .role-toggle {
            display: flex;
            justify-content: center;
            margin-bottom: 2rem;
            background-color: #f8f9fa;
            border-radius: 25px;
            padding: 0.25rem;
        }
        .role-option {
            flex: 1;
            padding: 0.5rem 1rem;
            border-radius: 20px;
            cursor: pointer;
            font-weight: 600;
            color: #6a6aff;
            transition: background-color 0.3s ease, color 0.3s ease;
            text-align: center;
        }
        .role-option input {
            display: none;
        }
        .role-option.active {
            background-color: #6a6aff;
            color: white;
        }
        .role-option:hover {
            background-color: #5a5ae0;
            color: white;
        }
    </style>
</head>
<body>
    <div class="register-container">
        <a href="/" class="back-link">&larr; Back to Home</a>
        <h2>Join LearnHub</h2>
        <div class="role-toggle">
            <label class="role-option active" for="student">
                <input type="radio" id="student" name="role" value="student" checked>
                Student
            </label>
            <label class="role-option" for="instructor">
                <input type="radio" id="instructor" name="role" value="instructor">
                Instructor
            </label>
            <label class="role-option" for="admin">
                <input type="radio" id="admin" name="role" value="admin">
                Admin
            </label>
        </div>
        <script>
            document.querySelectorAll('.role-option').forEach(option => {
                option.addEventListener('click', function() {
                    document.querySelectorAll('.role-option').forEach(opt => opt.classList.remove('active'));
                    this.classList.add('active');
                    this.querySelector('input').checked = true;
                });
            });
        </script>
        <form action="/register" method="post">
            <div class="form-group">
                <label for="name">Full Name</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" class="register-btn">Register</button>
        </form>
        <form action="/auth/google_login" method="post" style="display: inline;">
            <button type="submit" class="google-btn">
                <img src="https://developers.google.com/identity/images/g-logo.png" alt="Google logo">
                Register with Google
            </button>
        </form>
        <div class="login-link">
            Already have an account? <a href="/login">Login here</a>
        </div>
    </div>
</body>
</html>
