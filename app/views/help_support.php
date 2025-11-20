<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Help & Support - LearnHub</title>
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
        .help-hero {
            text-align: center;
            padding: 5rem 2rem;
            background: linear-gradient(135deg, #6a6aff, #8a2be2);
            color: white;
            position: relative;
            overflow: hidden;
        }
        .help-hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0,0,0,0.1);
        }
        .help-hero h2 {
            font-size: 3rem;
            margin-bottom: 1rem;
            font-weight: 700;
            position: relative;
            z-index: 1;
        }
        .help-hero p {
            font-size: 1.3rem;
            max-width: 900px;
            margin: 0 auto 2.5rem auto;
            position: relative;
            z-index: 1;
            opacity: 0.9;
        }
        .help-content {
            padding: 3rem 2rem;
            max-width: 1200px;
            margin: 0 auto;
        }
        .help-sections {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            margin-bottom: 3rem;
        }
        .help-section {
            background-color: #ffffff;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.08);
            padding: 2rem;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border: 1px solid #e0e0e0;
        }
        .help-section:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 25px rgba(0,0,0,0.15);
        }
        .help-section .icon {
            font-size: 3rem;
            color: #8a2be2;
            margin-bottom: 1rem;
            text-align: center;
        }
        .help-section h4 {
            font-size: 1.5rem;
            color: #6a6aff;
            margin-bottom: 1rem;
            text-align: center;
        }
        .help-section p {
            font-size: 1rem;
            color: #555;
            margin-bottom: 1.5rem;
        }
        .help-section ul {
            list-style: none;
            padding: 0;
        }
        .help-section li {
            margin-bottom: 0.5rem;
            padding-left: 1rem;
            position: relative;
        }
        .help-section li::before {
            content: '✓';
            color: #28a745;
            font-weight: bold;
            position: absolute;
            left: 0;
        }
        .help-section button {
            background-color: #6a6aff;
            color: white;
            border: none;
            padding: 0.75rem 1.5rem;
            border-radius: 25px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
            width: 100%;
        }
        .help-section button:hover {
            background-color: #5a5ae0;
            transform: translateY(-2px);
        }
        .faq-section {
            background-color: #ffffff;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.08);
            padding: 2rem;
            margin-bottom: 3rem;
            border: 1px solid #e0e0e0;
        }
        .faq-section h3 {
            font-size: 2.2rem;
            color: #6a6aff;
            margin-bottom: 2rem;
            text-align: center;
        }
        .faq-item {
            border-bottom: 1px solid #e0e0e0;
            padding: 1rem 0;
        }
        .faq-item:last-child {
            border-bottom: none;
        }
        .faq-question {
            font-size: 1.2rem;
            font-weight: 600;
            color: #6a6aff;
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .faq-question::after {
            content: '+';
            font-size: 1.5rem;
            transition: transform 0.3s ease;
        }
        .faq-item.active .faq-question::after {
            transform: rotate(45deg);
        }
        .faq-answer {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease;
            color: #555;
            margin-top: 0.5rem;
        }
        .faq-item.active .faq-answer {
            max-height: 500px;
        }
        .contact-support {
            background-color: #ffffff;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.08);
            padding: 2rem;
            text-align: center;
            border: 1px solid #e0e0e0;
        }
        .contact-support h3 {
            font-size: 2.2rem;
            color: #6a6aff;
            margin-bottom: 1rem;
        }
        .contact-support p {
            font-size: 1.1rem;
            color: #555;
            margin-bottom: 2rem;
        }
        .contact-options {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
        }
        .contact-option {
            background-color: #f8f9fa;
            border-radius: 10px;
            padding: 1rem;
            transition: background-color 0.3s ease;
        }
        .contact-option:hover {
            background-color: #e9ecef;
        }
        .contact-option .icon {
            font-size: 2rem;
            color: #8a2be2;
            margin-bottom: 0.5rem;
        }
        .contact-option h5 {
            font-size: 1.1rem;
            color: #6a6aff;
            margin-bottom: 0.25rem;
        }
        .contact-option p {
            font-size: 0.9rem;
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
            .help-hero h2 {
                font-size: 2.2rem;
            }
            .help-hero p {
                font-size: 1rem;
            }
            .help-sections {
                grid-template-columns: 1fr;
            }
            .contact-options {
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

    <div class="help-hero">
        <h2>Help & Support</h2>
        <p>Find answers to your questions and get the help you need to succeed on LearnHub.</p>
    </div>

    <div class="help-content">
        <div class="help-sections">
            <div class="help-section">
                <div class="icon">📚</div>
                <h4>Getting Started</h4>
                <p>New to LearnHub? Get up and running quickly with these essential guides.</p>
                <ul>
                    <li>How to create an account</li>
                    <li>Navigating the dashboard</li>
                    <li>Enrolling in courses</li>
                    <li>Setting up your profile</li>
                </ul>
                <button>View Guides</button>
            </div>
            <div class="help-section">
                <div class="icon">🎓</div>
                <h4>Course Support</h4>
                <p>Get help with course content, assignments, and learning progress.</p>
                <ul>
                    <li>Accessing course materials</li>
                    <li>Submitting assignments</li>
                    <li>Tracking your progress</li>
                    <li>Certificate downloads</li>
                </ul>
                <button>Course Help</button>
            </div>
            <div class="help-section">
                <div class="icon">💳</div>
                <h4>Account & Billing</h4>
                <p>Manage your account settings, subscriptions, and billing information.</p>
                <ul>
                    <li>Updating payment methods</li>
                    <li>Managing subscriptions</li>
                    <li>Refunds and cancellations</li>
                    <li>Account security</li>
                </ul>
                <button>Account Help</button>
            </div>
            <div class="help-section">
                <div class="icon">🛠️</div>
                <h4>Technical Support</h4>
                <p>Troubleshoot technical issues and optimize your learning experience.</p>
                <ul>
                    <li>Video playback issues</li>
                    <li>Mobile app problems</li>
                    <li>Browser compatibility</li>
                    <li>System requirements</li>
                </ul>
                <button>Tech Support</button>
            </div>
        </div>

        <div class="faq-section">
            <h3>Frequently Asked Questions</h3>
            <div class="faq-item">
                <div class="faq-question">How do I reset my password?</div>
                <div class="faq-answer">
                    <p>To reset your password, click on the "Forgot Password" link on the login page. Enter your email address, and we'll send you a link to create a new password. Make sure to check your spam folder if you don't see the email in your inbox.</p>
                </div>
            </div>
            <div class="faq-item">
                <div class="faq-question">Can I download course videos for offline viewing?</div>
                <div class="faq-answer">
                    <p>Currently, offline viewing is not available for all courses. However, we're working on implementing this feature. Some courses may offer downloadable resources, but video content requires an internet connection to stream.</p>
                </div>
            </div>
            <div class="faq-item">
                <div class="faq-question">How long do I have access to a course after purchasing?</div>
                <div class="faq-answer">
                    <p>You have lifetime access to any course you purchase on LearnHub. Once enrolled, you can access the course materials, updates, and community forums indefinitely. This allows you to learn at your own pace without time constraints.</p>
                </div>
            </div>
            <div class="faq-item">
                <div class="faq-question">Do you offer refunds?</div>
                <div class="faq-answer">
                    <p>Yes, we offer a 30-day money-back guarantee on all course purchases. If you're not satisfied with your course within 30 days of purchase, contact our support team for a full refund. Please note that this policy applies to individual course purchases, not subscription plans.</p>
                </div>
            </div>
            <div class="faq-item">
                <div class="faq-question">How do I contact my instructor?</div>
                <div class="faq-answer">
                    <p>You can contact your instructor through the course discussion forums or by using the messaging feature within the course. Instructors typically respond within 24-48 hours. For urgent matters, you can also reach out to our support team, who will help facilitate communication.</p>
                </div>
            </div>
        </div>

        <div class="contact-support">
            <h3>Still Need Help?</h3>
            <p>Can't find what you're looking for? Our support team is here to help!</p>
            <div class="contact-options">
                <div class="contact-option">
                    <div class="icon">💬</div>
                    <h5>Live Chat</h5>
                    <p>Chat with our support team in real-time</p>
                </div>
                <div class="contact-option">
                    <div class="icon">📧</div>
                    <h5>Email Support</h5>
                    <p>support@learnhub.com</p>
                </div>
                <div class="contact-option">
                    <div class="icon">📞</div>
                    <h5>Phone Support</h5>
                    <p>+1 (555) 123-4567</p>
                </div>
                <div class="contact-option">
                    <div class="icon">📖</div>
                    <h5>Knowledge Base</h5>
                    <p>Browse our comprehensive help articles</p>
                </div>
            </div>
        </div>
    </div>

    <div class="footer">
        <p>&copy; 2023 LearnHub. Designed for students, powered by knowledge.</p>
    </div>

    <script>
        // FAQ accordion functionality
        document.querySelectorAll('.faq-question').forEach(question => {
            question.addEventListener('click', () => {
                const faqItem = question.parentElement;
                faqItem.classList.toggle('active');
            });
        });
    </script>
</body>
</html>
