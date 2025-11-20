<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About LearnHub</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f2f5;
            color: #333;
            line-height: 1.6;
        }
        .header {
            background-color: #6a6aff;
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
        .auth-buttons button {
            background-color: #ffc107;
            color: #333;
            border: none;
            padding: 0.7rem 1.5rem;
            border-radius: 25px;
            cursor: pointer;
            font-size: 0.95rem;
            font-weight: 600;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }
        .auth-buttons button.login {
            background-color: #28a745;
            color: white;
        }
        .auth-buttons button:hover {
            background-color: #e0a800;
            transform: translateY(-2px);
        }
        .auth-buttons button.login:hover {
            background-color: #218838;
        }
        .about-hero {
            text-align: center;
            padding: 5rem 2rem;
            background: linear-gradient(135deg, #6a6aff, #8a2be2);
            color: white;
            position: relative;
            overflow: hidden;
        }
        .about-hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0,0,0,0.1);
        }
        .about-hero h2 {
            font-size: 3rem;
            margin-bottom: 1rem;
            font-weight: 700;
            position: relative;
            z-index: 1;
        }
        .about-hero p {
            font-size: 1.3rem;
            max-width: 900px;
            margin: 0 auto 2.5rem auto;
            position: relative;
            z-index: 1;
            opacity: 0.9;
        }
        .about-content {
            padding: 3rem 2rem;
            max-width: 1200px;
            margin: 0 auto;
        }
        .about-section {
            margin-bottom: 3rem;
        }
        .about-section h3 {
            font-size: 2.2rem;
            color: #6a6aff;
            margin-bottom: 1.5rem;
            text-align: center;
        }
        .about-section p {
            font-size: 1.1rem;
            color: #555;
            line-height: 1.8;
            margin-bottom: 1rem;
        }
        .mission-vision {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            margin-bottom: 3rem;
        }
        .mission-card, .vision-card {
            background-color: #ffffff;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.08);
            padding: 2rem;
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border: 1px solid #e0e0e0;
        }
        .mission-card:hover, .vision-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 25px rgba(0,0,0,0.15);
        }
        .mission-card .icon, .vision-card .icon {
            font-size: 3rem;
            color: #8a2be2;
            margin-bottom: 1rem;
        }
        .mission-card h4, .vision-card h4 {
            font-size: 1.5rem;
            color: #6a6aff;
            margin-bottom: 0.8rem;
        }
        .mission-card p, .vision-card p {
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
            .about-hero h2 {
                font-size: 2.2rem;
            }
            .about-hero p {
                font-size: 1rem;
            }
            .mission-vision {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="header">
        <a href="/" class="logo">LearnHub</a>
        <div class="nav-links">
            <a href="/">Home</a>
            <a href="/about">About</a>
            <a href="/contact">Contact</a>
            <a href="/explore-subjects">Explore Subjects</a>
            <a href="/help-support">Help & Support</a>
        </div>
        <div class="auth-buttons">
            <button class="login" onclick="location.href='/login'">Login</button>
            <button onclick="location.href='/register'">Register</button>
        </div>
    </div>

    <div class="about-hero">
        <h2>About LearnHub</h2>
        <p>Empowering students worldwide with innovative learning tools and a supportive community.</p>
    </div>

    <div class="about-content">
        <div class="about-section">
            <h3>Our Story</h3>
            <p>LearnHub was founded with the vision of making quality education accessible to everyone, regardless of location or background. We believe that learning should be engaging, flexible, and community-driven. Our platform connects students with expert instructors and peers, fostering a collaborative environment where knowledge thrives.</p>
            <p>Since our inception, we've helped thousands of students achieve their academic goals through interactive courses, personalized learning paths, and real-time support. We're committed to continuously improving our platform to meet the evolving needs of modern learners.</p>
        </div>

        <div class="mission-vision">
            <div class="mission-card">
                <div class="icon">🎯</div>
                <h4>Our Mission</h4>
                <p>To democratize education by providing high-quality, affordable learning opportunities that empower individuals to reach their full potential and contribute positively to society.</p>
            </div>
            <div class="vision-card">
                <div class="icon">🔮</div>
                <h4>Our Vision</h4>
                <p>To be the leading global platform for online learning, where every student has access to personalized, engaging education that adapts to their unique learning style and pace.</p>
            </div>
        </div>

        <div class="about-section">
            <h3>What Sets Us Apart</h3>
            <p>At LearnHub, we prioritize student success above all else. Our courses are designed by industry experts and educators who understand the challenges of modern learning. We offer:</p>
            <ul>
                <li><strong>Interactive Learning:</strong> Engage with multimedia content, quizzes, and projects that make learning fun and effective.</li>
                <li><strong>Flexible Scheduling:</strong> Learn at your own pace, anytime and anywhere, with 24/7 access to course materials.</li>
                <li><strong>Community Support:</strong> Connect with fellow learners and instructors through forums, live sessions, and mentorship programs.</li>
                <li><strong>Personalized Paths:</strong> Our adaptive learning technology tailors content to your skill level and learning preferences.</li>
                <li><strong>Certification:</strong> Earn recognized certificates upon course completion to showcase your achievements.</li>
            </ul>
        </div>

        <div class="about-section">
            <h3>Join Our Community</h3>
            <p>Whether you're a student looking to advance your career, a professional seeking to upskill, or an educator wanting to share knowledge, LearnHub welcomes you. Together, we're building a brighter future through education.</p>
            <p>Ready to start your learning journey? <a href="/register" style="color: #6a6aff; font-weight: 600;">Sign up today</a> and discover the difference LearnHub can make in your educational experience.</p>
        </div>
    </div>

    <div class="footer">
        <p>&copy; 2023 LearnHub. Designed for students, powered by knowledge.</p>
    </div>
</body>
</html>
