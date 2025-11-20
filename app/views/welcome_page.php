<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LearnHub - Your Student Learning Companion</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f2f5; /* Lighter background */
            color: #333;
            line-height: 1.6;
        }
        .header {
            background-color: #6a6aff; /* A friendly purple-blue */
            color: white;
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .header .logo {
            font-size: 1.8rem;
            font-weight: 700;
            text-decoration: none;
            color: white;
        }
        .nav-links a {
            color: white;
            text-decoration: none;
            padding: 0.5rem 1rem;
            margin-left: 1.5rem;
            font-weight: 600;
            transition: background-color 0.3s ease;
            border-radius: 5px;
        }
        .nav-links a:hover {
            background-color: rgba(255, 255, 255, 0.2);
        }
        .auth-buttons {
            display: flex;
            gap: 10px;
        }
        .auth-buttons a {
            background-color: #ffc107; /* Bright yellow for visibility */
            color: #333;
            text-decoration: none;
            display: inline-block;
            padding: 0.7rem 1.5rem;
            border-radius: 25px; /* More rounded buttons */
            cursor: pointer;
            font-size: 0.95rem;
            font-weight: 600;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }
        .auth-buttons a.login {
            background-color: #28a745; /* Green for login */
            color: white;
        }
        .auth-buttons a:hover {
            background-color: #e0a800;
            transform: translateY(-2px);
        }
        .auth-buttons a.login:hover {
            background-color: #218838;
        }
        .google-btn {
            background-color: #4285f4;
            color: white;
            border: none;
            padding: 0.7rem 1.5rem;
            border-radius: 25px;
            cursor: pointer;
            font-size: 0.95rem;
            font-weight: 600;
            transition: background-color 0.3s ease, transform 0.2s ease;
            display: flex;
            align-items: center;
            gap: 10px;
            margin: 10px 0;
        }
        .google-btn:hover {
            background-color: #3367d6;
            transform: translateY(-2px);
        }
        .google-btn img {
            width: 18px;
            height: 18px;
        }
        .hero {
            text-align: center;
            padding: 5rem 2rem;
            background: linear-gradient(135deg, #6a6aff, #8a2be2); /* Gradient background */
            color: white;
            margin-bottom: 2rem;
            position: relative;
            overflow: hidden; /* For potential background animations/shapes */
        }
        .hero::before { /* A subtle overlay for visual effect */
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0,0,0,0.1);
        }
        .hero h2 {
            font-size: 3rem;
            margin-bottom: 1rem;
            font-weight: 700;
            position: relative; /* To bring text above the overlay */
            z-index: 1;
        }
        .hero p {
            font-size: 1.3rem;
            max-width: 900px;
            margin: 0 auto 2.5rem auto;
            position: relative;
            z-index: 1;
            opacity: 0.9;
        }
        .cta-button {
            background-color: #ffc107;
            color: #333;
            text-decoration: none;
            padding: 1.2rem 2.5rem;
            border-radius: 30px;
            font-size: 1.3rem;
            font-weight: 700;
            transition: background-color 0.3s ease, transform 0.2s ease;
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
            position: relative;
            z-index: 1;
        }
        .cta-button:hover {
            background-color: #e0a800;
            transform: translateY(-3px);
        }
        .features-section {
            padding: 3rem 2rem;
            text-align: center;
        }
        .features-section h3 {
            font-size: 2.2rem;
            color: #6a6aff;
            margin-bottom: 3rem;
        }
        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            max-width: 1200px;
            margin: 0 auto;
        }
        .feature-card {
            background-color: #ffffff;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.08);
            padding: 2rem;
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border: 1px solid #e0e0e0;
        }
        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 25px rgba(0,0,0,0.15);
        }
        .feature-card .icon {
            font-size: 3rem;
            color: #8a2be2; /* Accent color */
            margin-bottom: 1rem;
        }
        .feature-card h4 {
            font-size: 1.5rem;
            color: #6a6aff;
            margin-bottom: 0.8rem;
        }
        .feature-card p {
            font-size: 1rem;
            color: #555;
        }
        .footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 2rem 0;
            margin-top: 4rem;
            font-size: 0.9rem;
        }
        /* Responsive adjustments */
        @media (max-width: 768px) {
            .header {
                flex-direction: column;
                padding: 1rem;
            }
            .nav-links {
                margin-top: 1rem;
                display: flex;
                flex-wrap: wrap;
                justify-content: center;
            }
            .nav-links a {
                margin: 0.5rem 0.8rem;
            }
            .auth-buttons {
                margin-top: 1rem;
            }
            .hero h2 {
                font-size: 2.2rem;
            }
            .hero p {
                font-size: 1rem;
            }
            .cta-button {
                padding: 1rem 2rem;
                font-size: 1.1rem;
            }
            .features-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="header">
        <a href="#" class="logo">LearnHub</a>
        <div class="nav-links">
            <a href="/">Home</a>
            <a href="/about">About</a>
            <a href="/contact">Contact</a>
            <a href="/explore-subjects">Explore Subjects</a>
            <a href="/help-support">Help & Support</a>
        </div>
        <div class="auth-buttons">
            <a href="/login" class="login">Login</a>
            <a href="/register">Register</a>
        </div>
    </div>

    <div class="hero">
        <h2>Unlock Your Potential with LearnHub!</h2>
        <p>Your one-stop platform for engaging courses, interactive lessons, and a community that supports your academic journey. Learn smart, achieve more!</p>
        <a href="/register" class="cta-button">Start Learning Now!</a>
    </div>

    <div class="features-section">
        <h3>Why Students Love LearnHub</h3>
        <div class="features-grid">
            <div class="feature-card">
                <div class="icon">📚</div>
                <h4>Diverse Subjects</h4>
                <p>From core subjects to exciting electives, find courses that spark your interest.</p>
            </div>
            <div class="feature-card">
                <div class="icon">🧑‍🏫</div>
                <h4>Engaging Lessons</h4>
                <p>Interactive videos, quizzes, and projects make learning fun and effective.</p>
            </div>
            <div class="feature-card">
                <div class="icon">🤝</div>
                <h4>Community Support</h4>
                <p>Connect with peers and instructors, ask questions, and collaborate.</p>
            </div>
            <div class="feature-card">
                <div class="icon">⏱️</div>
                <h4>Flexible Schedule</h4>
                <p>Learn at your own pace, anytime, anywhere – fit study around your life.</p>
            </div>
        </div>
    </div>

    <div class="footer">
        <p>&copy; 2023 LearnHub. Designed for students.</p>
    </div>
</body>
</html>
