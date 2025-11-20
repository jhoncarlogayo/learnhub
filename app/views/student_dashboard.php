<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

// REMOVE or update this fallback code:
# $student = $student ?? [
#     'name' => 'Alex Johnson',
#     'id' => '123456',
#     'profile_pic' => 'A',
# ];

// Make sure your controller passes the real $student data, e.g.:
# $student = [
#     'name' => 'Vincent Ramos',
#     'id' => '20231234',
#     'profile_pic' => 'V',
# ];
$courses = $courses ?? []; // Array of enrolled courses
$announcements = $announcements ?? []; // Array of announcements
$progress = $progress ?? [
    'enrolled' => count($courses),
    'completed' => array_sum(array_column($courses, 'completed')),
    'in_progress' => array_sum(array_column($courses, 'in_progress')),
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LearnHub - Student Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
            min-height: 100vh;
            color: #333;
        }

        .dashboard-container {
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar Navigation */
        .sidebar {
            width: 280px;
            background: linear-gradient(180deg, #0f1419 0%, #1a1a2e 100%);
            color: white;
            padding: 30px 0;
            position: fixed;
            height: 100vh;
            overflow-y: auto;
            box-shadow: 2px 0 10px rgba(0,0,0,0.3);
        }

        .sidebar-header {
            padding: 0 30px 30px;
            border-bottom: 1px solid rgba(255,255,255,0.1);
            text-align: center;
        }

        .sidebar-header h2 {
            color: #4facfe;
            font-size: 24px;
            margin-bottom: 10px;
        }

        .sidebar-header p {
            color: #a0aec0;
            font-size: 14px;
        }

        .sidebar-menu {
            list-style: none;
            padding: 20px 0;
        }

        .sidebar-menu li {
            margin-bottom: 5px;
        }

        .sidebar-menu a {
            display: flex;
            align-items: center;
            padding: 15px 30px;
            color: #e2e8f0;
            text-decoration: none;
            transition: all 0.3s ease;
            border-left: 4px solid transparent;
        }

        .sidebar-menu a:hover, .sidebar-menu a.active {
            background: rgba(79, 172, 254, 0.1);
            border-left-color: #4facfe;
            color: #4facfe;
        }

        .sidebar-menu i {
            margin-right: 15px;
            width: 20px;
            text-align: center;
        }

        /* Main Content */
        .main-content {
            flex: 1;
            margin-left: 280px;
            background: #f8fafc;
        }

        .header {
            background: white;
            padding: 20px 30px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header-left {
            display: flex;
            align-items: center;
        }

        .header-left h1 {
            color: #2d3748;
            margin-left: 20px;
        }

        .header-right {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .profile-info {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .profile-pic {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
        }

        .profile-details h4 {
            color: #2d3748;
            margin-bottom: 2px;
        }

        .profile-details p {
            color: #718096;
            font-size: 12px;
        }

        .content {
            padding: 30px;
        }

        /* Dashboard Sections */
        .dashboard-section {
            background: white;
            border-radius: 12px;
            padding: 25px;
            margin-bottom: 30px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.07);
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .section-header h2 {
            color: #2d3748;
            font-size: 24px;
            font-weight: 600;
        }

        .section-header .view-all {
            color: #4facfe;
            text-decoration: none;
            font-weight: 500;
        }

        /* Welcome Section */
        .welcome-card {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 30px;
            border-radius: 12px;
            margin-bottom: 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .welcome-text h1 {
            font-size: 32px;
            margin-bottom: 10px;
        }

        .welcome-text p {
            opacity: 0.9;
            font-size: 16px;
        }

        .welcome-stats {
            display: flex;
            gap: 30px;
        }

        .stat-item {
            text-align: center;
        }

        .stat-item .number {
            font-size: 28px;
            font-weight: bold;
            display: block;
        }

        .stat-item .label {
            font-size: 14px;
            opacity: 0.8;
        }

        /* Course Grid */
        .courses-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 20px;
        }

        .course-card {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0,0,0,0.07);
            transition: transform 0.3s ease;
        }

        .course-card:hover {
            transform: translateY(-5px);
        }

        .course-image {
            height: 160px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            position: relative;
        }

        .course-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .course-category {
            position: absolute;
            top: 10px;
            right: 10px;
            background: rgba(255,255,255,0.9);
            color: #2d3748;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 500;
        }

        .course-content {
            padding: 20px;
        }

        .course-title {
            font-size: 18px;
            font-weight: 600;
            color: #2d3748;
            margin-bottom: 8px;
        }

        .course-instructor {
            color: #718096;
            font-size: 14px;
            margin-bottom: 15px;
        }

        .course-progress {
            margin-bottom: 15px;
        }

        .progress-bar {
            height: 6px;
            background: #e2e8f0;
            border-radius: 3px;
            overflow: hidden;
            margin-bottom: 5px;
        }

        .progress-fill {
            height: 100%;
            background: linear-gradient(90deg, #4facfe 0%, #00f2fe 100%);
            border-radius: 3px;
        }

        .progress-text {
            font-size: 12px;
            color: #718096;
        }

        .course-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .resume-btn {
            background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 6px;
            font-weight: 500;
            cursor: pointer;
            transition: transform 0.2s ease;
        }

        .resume-btn:hover {
            transform: translateY(-2px);
        }

        .course-status {
            font-size: 12px;
            color: #48bb78;
            font-weight: 500;
        }

        /* Tabs */
        .tabs {
            display: flex;
            margin-bottom: 20px;
            border-bottom: 1px solid #e2e8f0;
        }

        .tab {
            padding: 12px 24px;
            background: transparent;
            border: none;
            color: #718096;
            font-weight: 500;
            cursor: pointer;
            border-bottom: 2px solid transparent;
            transition: all 0.3s ease;
        }

        .tab.active {
            color: #4facfe;
            border-bottom-color: #4facfe;
        }

        /* Announcements */
        .announcements {
            list-style: none;
        }

        .announcement-item {
            display: flex;
            align-items: center;
            padding: 15px 0;
            border-bottom: 1px solid #f1f5f9;
        }

        .announcement-item:last-child {
            border-bottom: none;
        }

        .announcement-icon {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            margin-right: 15px;
        }

        .announcement-content h4 {
            color: #2d3748;
            margin-bottom: 5px;
            font-size: 16px;
        }

        .announcement-content p {
            color: #718096;
            font-size: 14px;
        }

        /* Progress Overview */
        .progress-overview {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
        }

        .progress-card {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 20px;
            border-radius: 12px;
            text-align: center;
        }

        .progress-card .number {
            font-size: 36px;
            font-weight: bold;
            display: block;
            margin-bottom: 10px;
        }

        .progress-card .label {
            font-size: 14px;
            opacity: 0.8;
        }

        /* Utilities */
        .text-center {
            text-align: center;
        }

        .mb-0 {
            margin-bottom: 0;
        }

        .mt-0 {
            margin-top: 0;
        }

        .p-0 {
            padding: 0;
        }

        .px-0 {
            padding-left: 0;
            padding-right: 0;
        }

        .py-0 {
            padding-top: 0;
            padding-bottom: 0;
        }

        .rounded {
            border-radius: 0.375rem;
        }

        .shadow {
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }

        /* Media Queries */
        @media (max-width: 768px) {
            .sidebar {
                position: relative;
                width: 100%;
                height: auto;
            }

            .main-content {
                margin-left: 0;
            }

            .header {
                flex-direction: column;
                align-items: flex-start;
            }

            .header-left {
                margin-bottom: 10px;
            }

            .tabs {
                flex-direction: column;
            }

            .tab {
                padding: 10px;
                font-size: 14px;
            }

            .welcome-card {
                flex-direction: column;
                align-items: flex-start;
            }

            .welcome-text h1 {
                font-size: 28px;
            }

            .welcome-text p {
                font-size: 14px;
            }

            .courses-grid {
                grid-template-columns: 1fr;
            }

            .course-card {
                margin-bottom: 20px;
            }

            .profile-pic {
                width: 36px;
                height: 36px;
            }

            .profile-details h4 {
                font-size: 16px;
            }

            .profile-details p {
                font-size: 12px;
            }

            .section-header h2 {
                font-size: 20px;
            }

            .section-header .view-all {
                font-size: 14px;
            }

            .stat-item .number {
                font-size: 24px;
            }

            .stat-item .label {
                font-size: 12px;
            }

            .announcement-icon {
                width: 36px;
                height: 36px;
            }

            .announcement-content h4 {
                font-size: 14px;
            }

            .announcement-content p {
                font-size: 12px;
            }

            .progress-card {
                padding: 15px;
            }

            .progress-card .number {
                font-size: 28px;
            }

            .progress-card .label {
                font-size: 12px;
            }
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <!-- Sidebar Navigation -->
        <div class="sidebar">
            <div class="sidebar-header">
                <h2>LearnHub</h2>
                <p>Welcome back, Student!</p>
            </div>
            <ul class="sidebar-menu">
                <li><a href="dashboard.html" class="active"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
                <li><a href="courses.html"><i class="fas fa-book-open"></i> My Courses</a></li>
                <li><a href="progress.html"><i class="fas fa-chart-line"></i> Progress</a></li>
                <li><a href="announcements.html"><i class="fas fa-bullhorn"></i> Announcements</a></li>
                <li><a href="settings.html"><i class="fas fa-cog"></i> Settings</a></li>
                <li><a href="logout.html"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <!-- Header -->
            <div class="header">
                <div class="header-left">
                    <h1>Dashboard</h1>
                </div>
                <div class="header-right">
                    <div class="profile-info">
                        <div class="profile-details">
                            <h4><?= htmlspecialchars($student['name']) ?></h4>
                            <p>Student ID: <?= htmlspecialchars($student['id']) ?></p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content -->
            <div class="content">
                <!-- Welcome Section -->
                <div class="welcome-card">
                    <div class="welcome-text">
                        <h1>Welcome back, <?= htmlspecialchars($student['name']) ?>!</h1>
                        <p>We're glad to see you again. Ready to continue your learning journey?</p>
                    </div>
                    <div class="welcome-stats">
                        <div class="stat-item">
                            <span class="number"><?= $progress['enrolled'] ?></span>
                            <span class="label">Courses Enrolled</span>
                        </div>
                        <div class="stat-item">
                            <span class="number"><?= $progress['completed'] ?></span>
                            <span class="label">Courses Completed</span>
                        </div>
                        <div class="stat-item">
                            <span class="number"><?= $progress['in_progress'] ?></span>
                            <span class="label">In Progress</span>
                        </div>
                    </div>
                </div>

                <!-- Dashboard Sections -->
                <div class="dashboard-section">
                    <div class="section-header">
                        <h2>My Courses</h2>
                        <a href="courses.html" class="view-all">View All</a>
                    </div>
                    <div class="courses-grid">
                        <?php foreach ($courses as $course): ?>
                        <div class="course-card">
                            <div class="course-image">
                                <img src="<?= htmlspecialchars($course['image']) ?>" alt="Course Image">
                                <span class="course-category"><?= htmlspecialchars($course['category']) ?></span>
                            </div>
                            <div class="course-content">
                                <h3 class="course-title"><?= htmlspecialchars($course['title']) ?></h3>
                                <p class="course-instructor">by <?= htmlspecialchars($course['instructor']) ?></p>
                                <div class="course-progress">
                                    <div class="progress-bar">
                                        <div class="progress-fill" style="width: <?= intval($course['progress']) ?>%;"></div>
                                    </div>
                                    <p class="progress-text"><?= intval($course['progress']) ?>% Completed</p>
                                </div>
                                <div class="course-actions">
                                    <button class="resume-btn">Resume Course</button>
                                    <span class="course-status"><?= htmlspecialchars($course['status']) ?></span>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <div class="dashboard-section">
                    <div class="section-header">
                        <h2>Announcements</h2>
                        <a href="announcements.html" class="view-all">View All</a>
                    </div>
                    <ul class="announcements">
                        <?php foreach ($announcements as $announce): ?>
                        <li class="announcement-item">
                            <div class="announcement-icon">
                                <i class="fas fa-<?= htmlspecialchars($announce['icon']) ?>"></i>
                            </div>
                            <div class="announcement-content">
                                <h4><?= htmlspecialchars($announce['title']) ?></h4>
                                <p><?= htmlspecialchars($announce['message']) ?></p>
                            </div>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>

                <div class="dashboard-section">
                    <div class="section-header">
                        <h2>Progress Overview</h2>
                        <a href="progress.html" class="view-all">View All</a>
                    </div>
                    <div class="progress-overview">
                        <div class="progress-card">
                            <div class="number">85%</div>
                            <div class="label">Overall Completion</div>
                        </div>
                        <div class="progress-card">
                            <div class="number">3</div>
                            <div class="label">Courses Completed</div>
                        </div>
                        <div class="progress-card">
                            <div class="number">2</div>
                            <div class="label">Courses In Progress</div>
                        </div>
                        <div class="progress-card">
                            <div class="number">10</div>
                            <div class="label">Total Courses</div>
                        </div>
                    </div>
                </div>

                <!-- Tabs -->
                <div class="tabs">
                    <button class="tab active">All Courses</button>
                    <button class="tab">Web Development</button>
                    <button class="tab">Data Science</button>
                    <button class="tab">Graphic Design</button>
                    <button class="tab">Marketing</button>
                </div>

                <!-- Course Grid (Filtered by Tab) -->
                <div class="courses-grid">
                    <!-- All Courses (Default View) -->
                    <div class="course-card">
                        <div class="course-image">
                            <img src="https://via.placeholder.com/400x160" alt="Course Image">
                            <span class="course-category">Web Development</span>
                        </div>
                        <div class="course-content">
                            <h3 class="course-title">Responsive Web Design</h3>
                            <p class="course-instructor">by John Doe</p>
                            <div class="course-progress">
                                <div class="progress-bar">
                                    <div class="progress-fill" style="width: 70%;"></div>
                                </div>
                                <p class="progress-text">70% Completed</p>
                            </div>
                            <div class="course-actions">
                                <button class="resume-btn">Resume Course</button>
                                <span class="course-status">In Progress</span>
                            </div>
                        </div>
                    </div>

                    <div class="course-card">
                        <div class="course-image">
                            <img src="https://via.placeholder.com/400x160" alt="Course Image">
                            <span class="course-category">Data Science</span>
                        </div>
                        <div class="course-content">
                            <h3 class="course-title">Introduction to Data Science</h3>
                            <p class="course-instructor">by Jane Smith</p>
                            <div class="course-progress">
                                <div class="progress-bar">
                                    <div class="progress-fill" style="width: 45%;"></div>
                                </div>
                                <p class="progress-text">45% Completed</p>
                            </div>
                            <div class="course-actions">
                                <button class="resume-btn">Resume Course</button>
                                <span class="course-status">In Progress</span>
                            </div>
                        </div>
                    </div>

                    <div class="course-card">
                        <div class="course-image">
                            <img src="https://via.placeholder.com/400x160" alt="Course Image">
                            <span class="course-category">Graphic Design</span>
                        </div>
                        <div class="course-content">
                            <h3 class="course-title">Creative Graphic Design</h3>
                            <p class="course-instructor">by Emily White</p>
                            <div class="course-progress">
                                <div class="progress-bar">
                                    <div class="progress-fill" style="width: 90%;"></div>
                                </div>
                                <p class="progress-text">90% Completed</p>
                            </div>
                            <div class="course-actions">
                                <button class="resume-btn">Resume Course</button>
                                <span class="course-status">In Progress</span>
                            </div>
                        </div>
                    </div>

                    <div class="course-card">
                        <div class="course-image">
                            <img src="https://via.placeholder.com/400x160" alt="Course Image">
                            <span class="course-category">Marketing</span>
                        </div>
                        <div class="course-content">
                            <h3 class="course-title">Digital Marketing Strategies</h3>
                            <p class="course-instructor">by Michael Brown</p>
                            <div class="course-progress">
                                <div class="progress-bar">
                                    <div class="progress-fill" style="width: 60%;"></div>
                                </div>
                                <p class="progress-text">60% Completed</p>
                            </div>
                            <div class="course-actions">
                                <button class="resume-btn">Resume Course</button>
                                <span class="course-status">In Progress</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
