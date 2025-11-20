<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Explore Subjects - LearnHub</title>
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
        .explore-hero {
            text-align: center;
            padding: 5rem 2rem;
            background: linear-gradient(135deg, #6a6aff, #8a2be2);
            color: white;
            position: relative;
            overflow: hidden;
        }
        .explore-hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0,0,0,0.1);
        }
        .explore-hero h2 {
            font-size: 3rem;
            margin-bottom: 1rem;
            font-weight: 700;
            position: relative;
            z-index: 1;
        }
        .explore-hero p {
            font-size: 1.3rem;
            max-width: 900px;
            margin: 0 auto 2.5rem auto;
            position: relative;
            z-index: 1;
            opacity: 0.9;
        }
        .subjects-content {
            padding: 3rem 2rem;
            max-width: 1200px;
            margin: 0 auto;
        }
        .subjects-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            margin-bottom: 3rem;
        }
        .subject-card {
            background-color: #ffffff;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.08);
            padding: 2rem;
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border: 1px solid #e0e0e0;
        }
        .subject-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 25px rgba(0,0,0,0.15);
        }
        .subject-card .icon {
            font-size: 3rem;
            color: #8a2be2;
            margin-bottom: 1rem;
        }
        .subject-card h4 {
            font-size: 1.5rem;
            color: #6a6aff;
            margin-bottom: 0.8rem;
        }
        .subject-card p {
            font-size: 1rem;
            color: #555;
            margin-bottom: 1.5rem;
        }
        .subject-card .courses-count {
            font-size: 0.9rem;
            color: #888;
            margin-bottom: 1rem;
        }
        .subject-card button {
            background-color: #6a6aff;
            color: white;
            border: none;
            padding: 0.75rem 1.5rem;
            border-radius: 25px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }
        .subject-card button:hover {
            background-color: #5a5ae0;
            transform: translateY(-2px);
        }
        .popular-courses {
            background-color: #ffffff;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.08);
            padding: 2rem;
            margin-bottom: 3rem;
            border: 1px solid #e0e0e0;
        }
        .popular-courses h3 {
            font-size: 2.2rem;
            color: #6a6aff;
            margin-bottom: 2rem;
            text-align: center;
        }
        .courses-list {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
        }
        .course-item {
            background-color: #f8f9fa;
            border-radius: 10px;
            padding: 1.5rem;
            transition: background-color 0.3s ease;
        }
        .course-item:hover {
            background-color: #e9ecef;
        }
        .course-item h5 {
            font-size: 1.2rem;
            color: #6a6aff;
            margin-bottom: 0.5rem;
        }
        .course-item p {
            font-size: 0.9rem;
            color: #555;
            margin-bottom: 0.5rem;
        }
        .course-item .rating {
            font-size: 0.8rem;
            color: #ffc107;
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
            .explore-hero h2 {
                font-size: 2.2rem;
            }
            .explore-hero p {
                font-size: 1rem;
            }
            .subjects-grid {
                grid-template-columns: 1fr;
            }
            .courses-list {
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

    <div class="explore-hero">
        <h2>Explore Subjects</h2>
        <p>Discover a world of knowledge across diverse subjects. Find your passion and start learning today!</p>
    </div>

    <div class="subjects-content">
        <div class="subjects-grid">
            <div class="subject-card">
                <div class="icon">💻</div>
                <h4>Computer Science</h4>
                <p>Master programming, algorithms, and software development with our comprehensive courses.</p>
                <div class="courses-count">25+ Courses Available</div>
                <button>Explore Courses</button>
            </div>
            <div class="subject-card">
                <div class="icon">📊</div>
                <h4>Data Science</h4>
                <p>Learn data analysis, machine learning, and visualization techniques for the modern world.</p>
                <div class="courses-count">18+ Courses Available</div>
                <button>Explore Courses</button>
            </div>
            <div class="subject-card">
                <div class="icon">🎨</div>
                <h4>Design</h4>
                <p>Unleash your creativity with courses in graphic design, UX/UI, and digital art.</p>
                <div class="courses-count">15+ Courses Available</div>
                <button>Explore Courses</button>
            </div>
            <div class="subject-card">
                <div class="icon">📈</div>
                <h4>Business</h4>
                <p>Develop essential business skills in management, marketing, and entrepreneurship.</p>
                <div class="courses-count">22+ Courses Available</div>
                <button>Explore Courses</button>
            </div>
            <div class="subject-card">
                <div class="icon">🧪</div>
                <h4>Science</h4>
                <p>Explore physics, chemistry, biology, and environmental science through engaging content.</p>
                <div class="courses-count">20+ Courses Available</div>
                <button>Explore Courses</button>
            </div>
            <div class="subject-card">
                <div class="icon">📚</div>
                <h4>Languages</h4>
                <p>Learn new languages and cultures with our interactive language learning programs.</p>
                <div class="courses-count">12+ Courses Available</div>
                <button>Explore Courses</button>
            </div>
        </div>

        <div class="popular-courses">
            <h3>Popular Courses This Month</h3>
            <div class="courses-list">
                <div class="course-item">
                    <h5>Introduction to Python Programming</h5>
                    <p>Learn the basics of Python in this beginner-friendly course.</p>
                    <div class="rating">★★★★★ (4.8)</div>
                </div>
                <div class="course-item">
                    <h5>Web Development Fundamentals</h5>
                    <p>Build your first website with HTML, CSS, and JavaScript.</p>
                    <div class="rating">★★★★★ (4.7)</div>
                </div>
                <div class="course-item">
                    <h5>Data Analysis with Excel</h5>
                    <p>Master Excel for data analysis and visualization.</p>
                    <div class="rating">★★★★☆ (4.5)</div>
                </div>
                <div class="course-item">
                    <h5>Digital Marketing Essentials</h5>
                    <p>Learn SEO, social media, and content marketing strategies.</p>
                    <div class="rating">★★★★★ (4.6)</div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer">
        <p>&copy; 2023 LearnHub. Designed for students, powered by knowledge.</p>
    </div>
</body>
</html>
