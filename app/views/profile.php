<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile - LearnHub</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* Variables for Easy Color Changes */
        :root {
            --color-primary: #1F2937; /* Dark Navy/Slate for Sidebar */
            --color-secondary: #3B82F6; /* Bright Blue Accent */
            --color-text-light: #F9FAFB;
            --color-text-dark: #111827;
            --color-background: #F3F4F6;
            --color-card-bg: #FFFFFF;
            --color-positive: #10B981; /* Green */
            --color-negative: #F56565; /* Red */
            --color-warning: #F59E0B; /* Orange */
        }

        /* Base Styles */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: var(--color-background);
            color: var(--color-text-dark);
        }

        /* Dashboard Container (Grid Layout) */
        .dashboard-container {
            display: grid;
            grid-template-columns: 250px 1fr; /* Sidebar width and Main Content */
            min-height: 100vh;
        }

        /* Sidebar */
        .sidebar {
            background-color: var(--color-primary);
            color: var(--color-text-light);
            padding: 20px;
            display: flex;
            flex-direction: column;
        }

        .logo {
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 30px;
            text-align: center;
        }

        .nav-menu {
            flex-grow: 1;
            margin-bottom: 20px;
        }

        .nav-item {
            display: block;
            padding: 12px 15px;
            margin-bottom: 5px;
            color: var(--color-text-light);
            text-decoration: none;
            border-radius: 8px;
            transition: background-color 0.2s;
        }

        .nav-item:hover, .nav-item.active {
            background-color: rgba(255, 255, 255, 0.1);
        }

        .nav-item i {
            margin-right: 10px;
        }

        /* Header */
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 30px;
            background-color: var(--color-card-bg);
            border-bottom: 1px solid #E5E7EB;
        }

        .search-bar {
            background-color: #F9FAFB;
            border-radius: 8px;
            padding: 8px 15px;
            display: flex;
            align-items: center;
            width: 400px;
        }

        .search-bar i {
            color: #9CA3AF;
            margin-right: 10px;
        }

        .search-bar input {
            border: none;
            outline: none;
            background: transparent;
            width: 100%;
        }

        .user-info {
            display: flex;
            align-items: center;
        }

        .notification-icon {
            font-size: 1.2rem;
            color: #6B7280;
            margin-right: 20px;
            cursor: pointer;
        }

        /* Main Content */
        .main-content {
            padding: 30px;
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .page-header h1 {
            font-size: 2rem;
            color: var(--color-text-dark);
        }

        .save-btn {
            background-color: var(--color-secondary);
            color: white;
            border: none;
            padding: 12px 24px;
            border-radius: 8px;
            font-weight: 500;
            cursor: pointer;
            transition: background-color 0.2s;
        }

        .save-btn:hover {
            background-color: #2563EB;
        }

        /* Profile Sections */
        .profile-sections {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 30px;
        }

        .profile-section {
            background-color: var(--color-card-bg);
            border-radius: 12px;
            padding: 25px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            border: 1px solid #E5E7EB;
        }

        .section-header {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .section-title {
            font-size: 1.3rem;
            font-weight: 600;
            color: var(--color-text-dark);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .section-icon {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
        }

        .section-icon.bio {
            background-color: #3B82F6;
            color: white;
        }

        .section-icon.social {
            background-color: #10B981;
            color: white;
        }

        .section-icon.image {
            background-color: #F59E0B;
            color: white;
        }

        .section-icon.password {
            background-color: #EF4444;
            color: white;
        }

        /* Form Styles */
        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-weight: 500;
            margin-bottom: 8px;
            color: var(--color-text-dark);
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #D1D5DB;
            border-radius: 6px;
            font-size: 0.9rem;
            transition: border-color 0.2s;
        }

        .form-group input:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: var(--color-secondary);
        }

        .form-group textarea {
            resize: vertical;
            min-height: 120px;
        }

        /* Social Links */
        .social-links {
            display: grid;
            gap: 15px;
        }

        .social-link {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .social-icon {
            width: 40px;
            height: 40px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.1rem;
        }

        .social-icon.facebook {
            background-color: #1877F2;
        }

        .social-icon.linkedin {
            background-color: #0077B5;
        }

        .social-icon.twitter {
            background-color: #000000;
        }

        .social-icon.youtube {
            background-color: #FF0000;
        }

        .social-link input {
            flex-grow: 1;
        }

        /* Profile Image */
        .profile-image-section {
            text-align: center;
        }

        .current-image {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            background-color: #D1D5DB;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            color: #6B7280;
            font-size: 2rem;
        }

        .upload-btn {
            background-color: var(--color-secondary);
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 6px;
            cursor: pointer;
            font-weight: 500;
            transition: background-color 0.2s;
        }

        .upload-btn:hover {
            background-color: #2563EB;
        }

        .file-input {
            display: none;
        }

        /* Password Section */
        .password-fields {
            display: grid;
            gap: 15px;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .dashboard-container {
                grid-template-columns: 1fr;
            }

            .sidebar {
                display: none;
            }

            .profile-sections {
                grid-template-columns: 1fr;
            }

            .search-bar {
                width: 250px;
            }
        }
    </style>
</head>
<body>

    <div class="dashboard-container">
        <aside class="sidebar">
            <div class="logo">LearnHub</div>
            <nav class="nav-menu">
                <a href="/instructor-dashboard" class="nav-item"><i class="fas fa-chart-line"></i> Overview</a>
                <a href="/students-management" class="nav-item"><i class="fas fa-users"></i> Students</a>
                <a href="/course-management" class="nav-item"><i class="fas fa-book"></i> Course Management</a>
                <a href="/assessments" class="nav-item"><i class="fas fa-tasks"></i> Assessments</a>
                <a href="/discussions" class="nav-item"><i class="fas fa-comments"></i> Discussions</a>
                <a href="/reviews" class="nav-item"><i class="fas fa-star"></i> Reviews</a>
                <span class="nav-item active"><i class="fas fa-user-circle"></i> Profile</span>
                <a href="/earnings" class="nav-item"><i class="fas fa-money-bill-wave"></i> Earnings</a>
            </nav>
        </aside>

        <main class="main-content">
            <header class="header">
                <div class="search-bar">
                    <i class="fas fa-search"></i>
                    <input type="text" placeholder="Search...">
                </div>
                <div class="user-info">
                    <i class="fas fa-bell notification-icon"></i>
                    <span>Jhon Carlo Gayo</span>
                </div>
            </header>

            <div class="page-header">
                <h1>Profile</h1>
                <button class="save-btn">
                    <i class="fas fa-save"></i> Save Changes
                </button>
            </div>

            <div class="profile-sections">
                <!-- Profile Details Section -->
                <div class="profile-section">
                    <div class="section-header">
                        <div class="section-title">
                            <div class="section-icon bio">
                                <i class="fas fa-user-edit"></i>
                            </div>
                            Profile Details
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="full-name">Full Name</label>
                        <input type="text" id="full-name" value="Jhon Carlo Gayo">
                    </div>

                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" id="email" value="jhoncarlo@example.com">
                    </div>

                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="tel" id="phone" value="+1 (555) 123-4567">
                    </div>

                    <div class="form-group">
                        <label for="bio">Instructor Bio</label>
                        <textarea id="bio" placeholder="Tell students about yourself, your experience, and what they can expect from your courses...">Experienced software developer and instructor with over 10 years in web development. Passionate about teaching programming concepts and helping students build real-world applications.</textarea>
                    </div>
                </div>

                <!-- Social Links Section -->
                <div class="profile-section">
                    <div class="section-header">
                        <div class="section-title">
                            <div class="section-icon social">
                                <i class="fas fa-share-alt"></i>
                            </div>
                            Social Links
                        </div>
                    </div>

                    <div class="social-links">
                        <div class="social-link">
                            <div class="social-icon facebook">
                                <i class="fab fa-facebook-f"></i>
                            </div>
                            <input type="url" placeholder="https://facebook.com/yourprofile" value="https://facebook.com/jhoncarlo">
                        </div>

                        <div class="social-link">
                            <div class="social-icon linkedin">
                                <i class="fab fa-linkedin-in"></i>
                            </div>
                            <input type="url" placeholder="https://linkedin.com/in/yourprofile" value="https://linkedin.com/in/jhoncarlo">
                        </div>

                        <div class="social-link">
                            <div class="social-icon twitter">
                                <i class="fab fa-twitter"></i>
                            </div>
                            <input type="url" placeholder="https://twitter.com/yourhandle" value="https://twitter.com/jhoncarlo">
                        </div>

                        <div class="social-link">
                            <div class="social-icon youtube">
                                <i class="fab fa-youtube"></i>
                            </div>
                            <input type="url" placeholder="https://youtube.com/channel/yourchannel" value="https://youtube.com/channel/jhoncarlo">
                        </div>
                    </div>
                </div>

                <!-- Profile Image Section -->
                <div class="profile-section">
                    <div class="section-header">
                        <div class="section-title">
                            <div class="section-icon image">
                                <i class="fas fa-camera"></i>
                            </div>
                            Profile Picture
                        </div>
                    </div>

                    <div class="profile-image-section">
                        <div class="current-image">
                            <i class="fas fa-user"></i>
                        </div>
                        <p style="margin-bottom: 15px; color: #6B7280;">Upload a new profile picture (JPG, PNG, max 5MB)</p>
                        <input type="file" id="profile-image" class="file-input" accept="image/*">
                        <button class="upload-btn" onclick="document.getElementById('profile-image').click()">
                            <i class="fas fa-upload"></i> Choose Image
                        </button>
                    </div>
                </div>

                <!-- Change Password Section -->
                <div class="profile-section">
                    <div class="section-header">
                        <div class="section-title">
                            <div class="section-icon password">
                                <i class="fas fa-lock"></i>
                            </div>
                            Change Password
                        </div>
                    </div>

                    <div class="password-fields">
                        <div class="form-group">
                            <label for="current-password">Current Password</label>
                            <input type="password" id="current-password" placeholder="Enter current password">
                        </div>

                        <div class="form-group">
                            <label for="new-password">New Password</label>
                            <input type="password" id="new-password" placeholder="Enter new password">
                        </div>

                        <div class="form-group">
                            <label for="confirm-password">Confirm New Password</label>
                            <input type="password" id="confirm-password" placeholder="Confirm new password">
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
