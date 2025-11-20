<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - LearnHub</title>
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
        .login-container {
            background-color: #ffffff;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.08);
            padding: 3rem;
            width: 100%;
            max-width: 400px;
            text-align: center;
        }
        .login-container h2 {
            color: #6a6aff;
            margin-bottom: 2rem;
            font-size: 2rem;
            font-weight: 700;
        }
        .form-group {
            margin-bottom: 1.5rem;
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
            transition: border-color 0.3s ease;
        }
        .form-group input:focus {
            outline: none;
            border-color: #6a6aff;
        }
        .login-btn {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 0.75rem 2rem;
            border-radius: 25px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            width: 100%;
            margin-bottom: 1rem;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }
        .login-btn:hover {
            background-color: #218838;
            transform: translateY(-2px);
        }
        .google-btn {
            background-color: #ffc107;
            color: #333;
            border: none;
            padding: 0.75rem 2rem;
            border-radius: 25px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }
        .google-btn:hover {
            background-color: #e0a800;
            transform: translateY(-2px);
        }
        .google-btn img {
            width: 20px;
            height: 20px;
        }
        .links {
            margin-top: 2rem;
            font-size: 0.9rem;
        }
        .links a {
            color: #6a6aff;
            text-decoration: none;
        }
        .links a:hover {
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
    <div class="login-container">
        <a href="/" class="back-link">&larr; Back to Home</a>
        <h2>Login to LearnHub</h2>
        <form action="/login" method="post">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
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
            <button type="submit" class="login-btn">Login</button>
        </form>
        <script>
            document.querySelectorAll('.role-option').forEach(option => {
                option.addEventListener('click', function() {
                    document.querySelectorAll('.role-option').forEach(opt => opt.classList.remove('active'));
                    this.classList.add('active');
                    this.querySelector('input').checked = true;
                });
            });
        </script>
        <form action="/auth/google_login" method="post" style="display: inline;">
            <button type="submit" class="google-btn">
                <img src="https://developers.google.com/identity/images/g-logo.png" alt="Google logo">
                Login with Google
            </button>
        </form>
        <div class="links">
            <p>Don't have an account? <a href="/register">Register here</a></p>
        </div>
    </div>
</body>
</html>
