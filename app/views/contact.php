<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - LearnHub</title>
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
        .contact-hero {
            text-align: center;
            padding: 5rem 2rem;
            background: linear-gradient(135deg, #6a6aff, #8a2be2);
            color: white;
            position: relative;
            overflow: hidden;
        }
        .contact-hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0,0,0,0.1);
        }
        .contact-hero h2 {
            font-size: 3rem;
            margin-bottom: 1rem;
            font-weight: 700;
            position: relative;
            z-index: 1;
        }
        .contact-hero p {
            font-size: 1.3rem;
            max-width: 900px;
            margin: 0 auto 2.5rem auto;
            position: relative;
            z-index: 1;
            opacity: 0.9;
        }
        .contact-content {
            padding: 3rem 2rem;
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 3rem;
        }
        .contact-form {
            background-color: #ffffff;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.08);
            padding: 2rem;
            border: 1px solid #e0e0e0;
        }
        .contact-form h3 {
            font-size: 2rem;
            color: #6a6aff;
            margin-bottom: 1.5rem;
            text-align: center;
        }
        .form-group {
            margin-bottom: 1.5rem;
        }
        .form-group label {
            display: block;
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: #333;
        }
        .form-group input, .form-group textarea {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 1rem;
            font-family: 'Poppins', sans-serif;
            transition: border-color 0.3s ease;
        }
        .form-group input:focus, .form-group textarea:focus {
            outline: none;
            border-color: #6a6aff;
        }
        .form-group textarea {
            resize: vertical;
            min-height: 120px;
        }
        .submit-btn {
            background-color: #6a6aff;
            color: white;
            border: none;
            padding: 1rem 2rem;
            border-radius: 25px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
            width: 100%;
        }
        .submit-btn:hover {
            background-color: #5a5ae0;
            transform: translateY(-2px);
        }
        .contact-info {
            background-color: #ffffff;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.08);
            padding: 2rem;
            border: 1px solid #e0e0e0;
        }
        .contact-info h3 {
            font-size: 2rem;
            color: #6a6aff;
            margin-bottom: 1.5rem;
            text-align: center;
        }
        .info-item {
            display: flex;
            align-items: center;
            margin-bottom: 1.5rem;
        }
        .info-item .icon {
            font-size: 2rem;
            color: #8a2be2;
            margin-right: 1rem;
            width: 50px;
            text-align: center;
        }
        .info-item h4 {
            font-size: 1.2rem;
            color: #6a6aff;
            margin-bottom: 0.25rem;
        }
        .info-item p {
            color: #555;
            margin: 0;
        }
        .footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 2rem 0;
            margin-top: 4rem;
            font-size: 0.9rem;
            grid-column: 1 / -1;
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
            .contact-hero h2 {
                font-size: 2.2rem;
            }
            .contact-hero p {
                font-size: 1rem;
            }
            .contact-content {
                grid-template-columns: 1fr;
                gap: 2rem;
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

    <div class="contact-hero">
        <h2>Contact Us</h2>
        <p>We're here to help! Reach out to us with any questions, feedback, or support needs.</p>
    </div>

    <div class="contact-content">
        <div class="contact-form">
            <h3>Send us a Message</h3>
            <form action="#" method="post">
                <div class="form-group">
                    <label for="name">Full Name</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="subject">Subject</label>
                    <input type="text" id="subject" name="subject" required>
                </div>
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea id="message" name="message" required></textarea>
                </div>
                <button type="submit" class="submit-btn">Send Message</button>
            </form>
        </div>

        <div class="contact-info">
            <h3>Get in Touch</h3>
            <div class="info-item">
                <div class="icon">📧</div>
                <div>
                    <h4>Email</h4>
                    <p>support@learnhub.com</p>
                    <p>partnerships@learnhub.com</p>
                </div>
            </div>
            <div class="info-item">
                <div class="icon">📞</div>
                <div>
                    <h4>Phone</h4>
                    <p>+1 (555) 123-4567</p>
                    <p>Mon-Fri: 9 AM - 6 PM EST</p>
                </div>
            </div>
            <div class="info-item">
                <div class="icon">📍</div>
                <div>
                    <h4>Address</h4>
                    <p>123 Learning Street</p>
                    <p>EduCity, EC 12345</p>
                    <p>United States</p>
                </div>
            </div>
            <div class="info-item">
                <div class="icon">💬</div>
                <div>
                    <h4>Live Chat</h4>
                    <p>Available 24/7 on our website</p>
                    <p>Response time: Usually within 5 minutes</p>
                </div>
            </div>
        </div>
    </div>

    <div class="footer">
        <p>&copy; 2023 LearnHub. Designed for students, powered by knowledge.</p>
    </div>
</body>
</html>
