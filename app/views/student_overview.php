<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard - LearnHub</title>
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

        /* Welcome Section */
        .welcome-section {
            background: linear-gradient(135deg, var(--color-secondary), #2563EB);
            color: white;
            padding: 30px;
            border-radius: 12px;
            margin-bottom: 30px;
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .profile-picture {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid white;
        }

        .welcome-text h2 {
            font-size: 1.8rem;
            margin-bottom: 5px;
        }

        .welcome-text p {
            opacity: 0.9;
        }

        /* Stats Grid */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-card {
            background-color: var(--color-card-bg);
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            border: 1px solid #E5E7EB;
            text-align: center;
        }

        .stat-value {
            font-size: 2rem;
            font-weight: bold;
            color: var(--color-secondary);
            margin-bottom: 5px;
        }

        .stat-label {
            color: #6B7280;
            font-size: 0.9rem;
        }

        /* Content Grid */
        .content-grid {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 30px;
        }

        /* Ongoing Courses */
        .ongoing-courses {
            background-color: var(--color-card-bg);
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            border: 1px solid #E5E7EB;
        }

        .section-header {
            display: flex;
            justify-content: between;
            align-items: center;
            margin-bottom: 20px;
        }

        .section-header h3 {
            font-size: 1.3rem;
            color: var(--color-text-dark);
        }

        .view-all-btn {
            background-color: var(--color-secondary);
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 6px;
            font-size: 0.9rem;
            cursor: pointer;
            text-decoration: none;
        }

        .course-item {
            display: flex;
            align-items: center;
            padding: 15px 0;
            border-bottom: 1px solid #E5E7EB;
        }

        .course-item:last-child {
            border-bottom: none;
        }

        .course-info {
            flex-grow: 1;
        }

        .course-title {
            font-weight: 600;
            color: var(--color-text-dark);
            margin-bottom: 5px;
        }

        .course-meta {
            font-size: 0.9rem;
            color: #6B7280;
        }

        .progress-bar {
            width: 100px;
            height: 8px;
            background-color: #E5E7EB;
            border-radius: 4px;
            margin: 0 15px;
            overflow: hidden;
        }

        .progress-fill {
            height: 100%;
            background-color: var(--color-positive);
            border-radius: 4px;
        }

        .resume-btn {
            background-color: var(--color-secondary);
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 6px;
            font-size: 0.9rem;
            cursor: pointer;
            text-decoration: none;
        }

        /* Recommendations */
        .recommendations {
            background-color: var(--color-card-bg);
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            border: 1px solid #E5E7EB;
            margin-bottom: 30px;
        }

        .recommendation-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 15px;
        }

        .recommendation-item {
            display: flex;
            align-items: center;
            padding: 15px;
            border: 1px solid #E5E7EB;
            border-radius: 8px;
            transition: box-shadow 0.2s;
        }

        .recommendation-item:hover {
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .rec-course-info {
            flex-grow: 1;
        }

        .rec-course-title {
            font-weight: 600;
            color: var(--color-text-dark);
            margin-bottom: 3px;
        }

        .rec-course-meta {
            font-size: 0.9rem;
            color: #6B7280;
        }

        .enroll-btn {
            background-color: var(--color-positive);
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 6px;
            font-size: 0.9rem;
            cursor: pointer;
            text-decoration: none;
        }

        /* Announcements */
        .announcements {
            background-color: var(--color-card-bg);
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            border: 1px solid #E5E7EB;
        }

        .announcement-item {
            padding: 15px 0;
            border-bottom: 1px solid #E5E7EB;
        }

        .announcement-item:last-child {
            border-bottom: none;
        }

        .announcement-title {
            font-weight: 600;
            color: var(--color-text-dark);
            margin-bottom: 5px;
        }

        .announcement-meta {
            font-size: 0.9rem;
            color: #6B7280;
            margin-bottom: 8px;
        }

        .announcement-content {
            font-size: 0.9rem;
            color: #4B5563;
            line-height: 1.4;
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .content-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 768px) {
            .dashboard-container {
                grid-template-columns: 1fr;
            }

            .sidebar {
                display: none;
            }

            .welcome-section {
                flex-direction: column;
                text-align: center;
            }

            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .course-item {
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
            }

            .progress-bar {
                width: 100%;
                margin: 0;
            }
        }
    </style>
</head>
<body>

    <div class="dashboard-container">
        <aside class="sidebar">
            <div class="logo">LearnHub</div>
            <nav class="nav-menu">
                <a href="/student-dashboard" class="nav-item active"><i class="fas fa-home"></i> Dashboard</a>
                <a href="/my-courses" class="nav-item"><i class="fas fa-book"></i> My Courses</a>
                <a href="/browse-courses" class="nav-item"><i class="fas fa-search"></i> Browse Courses</a>
                <a href="/certificates" class="nav-item"><i class="fas fa-certificate"></i> Certificates</a>
                <a href="/profile" class="nav-item"><i class="fas fa-user"></i> Profile</a>
                <a href="/settings" class="nav-item"><i class="fas fa-cog"></i> Settings</a>
            </nav>
        </aside>

        <main class="main-content">
            <header class="header">
                <div class="search-bar">
                    <i class="fas fa-search"></i>
                    <input type="text" placeholder="Search courses...">
                </div>
                <div class="user-info">
                    <i class="fas fa-bell notification-icon"></i>
                    <span><?php echo htmlspecialchars($student['name'] ?? 'Student'); ?></span>
                </div>
            </header>

            <!-- Welcome Section -->
            <div class="welcome-section">
                <img src="<?php echo !empty($student['profile_picture']) ? htmlspecialchars($student['profile_picture']) : '/public/images/default-avatar.png'; ?>"
                     alt="Profile Picture" class="profile-picture">
                <div class="welcome-text">
                    <h2>Welcome back, <?php echo htmlspecialchars($student['name'] ?? 'Student'); ?>!</h2>
                    <p>Continue your learning journey. You've got <?php echo count($enrolled_courses ?? []); ?> courses in progress.</p>
                </div>
            </div>

            <!-- Stats Grid -->
            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-value"><?php echo count($enrolled_courses ?? []); ?></div>
                    <div class="stat-label">Enrolled Courses</div>
                </div>
                <div class="stat-card">
                    <div class="stat-value">
                        <?php
                        $total_progress = 0;
                        $course_count = count($enrolled_courses ?? []);
                        if ($course_count > 0) {
                            foreach ($enrolled_courses as $course) {
                                $total_progress += $course['progress']['percentage'] ?? 0;
                            }
                            echo round($total_progress / $course_count);
                        } else {
                            echo '0';
                        }
                        ?>%
                    </div>
                    <div class="stat-label">Average Progress</div>
                </div>
                <div class="stat-card">
                    <div class="stat-value">
                        <?php
                        $completed_count = 0;
                        foreach ($enrolled_courses ?? [] as $course) {
                            if (($course['progress']['percentage'] ?? 0) >= 100) {
                                $completed_count++;
                            }
                        }
                        echo $completed_count;
                        ?>
                    </div>
                    <div class="stat-label">Completed Courses</div>
                </div>
                <div class="stat-card">
                    <div class="stat-value"><?php echo count($announcements ?? []); ?></div>
                    <div class="stat-label">New Announcements</div>
                </div>
            </div>

            <!-- Content Grid -->
            <div class="content-grid">
                <!-- Ongoing Courses -->
                <div class="ongoing-courses">
                    <div class="section-header">
                        <h3>Continue Learning</h3>
                        <a href="/my-courses" class="view-all-btn">View All</a>
                    </div>

                    <?php if (!empty($enrolled_courses)): ?>
                        <?php foreach (array_slice($enrolled_courses, 0, 3) as $course): ?>
                            <div class="course-item">
                                <div class="course-info">
                                    <div class="course-title"><?php echo htmlspecialchars($course['title']); ?></div>
                                    <div class="course-meta">
                                        <?php echo htmlspecialchars($course['instructor_name']); ?> •
                                        <?php echo $course['progress']['completed_lessons'] ?? 0; ?>/<?php echo $course['progress']['total_lessons'] ?? 0; ?> lessons
                                    </div>
                                </div>
                                <div class="progress-bar">
                                    <div class="progress-fill" style="width: <?php echo $course['progress']['percentage'] ?? 0; ?>%"></div>
                                </div>
                                <a href="/course/<?php echo $course['id']; ?>/continue" class="resume-btn">Resume</a>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p>You haven't enrolled in any courses yet. <a href="/browse-courses">Browse courses</a> to get started!</p>
                    <?php endif; ?>
                </div>

                <!-- Sidebar Content -->
                <div>
                    <!-- Recommendations -->
                    <div class="recommendations">
                        <div class="section-header">
                            <h3>Recommended for You</h3>
                        </div>

                        <div class="recommendation-grid">
                            <?php
                            $recommendations = !empty($recommended_courses) ? $recommended_courses : $trending_courses;
                            if (!empty($recommendations)):
                                foreach (array_slice($recommendations, 0, 3) as $course):
                            ?>
                                <div class="recommendation-item">
                                    <div class="rec-course-info">
                                        <div class="rec-course-title"><?php echo htmlspecialchars($course['title']); ?></div>
                                        <div class="rec-course-meta">
                                            <?php echo htmlspecialchars($course['instructor_name'] ?? 'Instructor'); ?> •
                                            <?php echo htmlspecialchars($course['category']); ?> •
                                            ₱<?php echo number_format($course['price'], 0); ?>
                                        </div>
                                    </div>
                                    <a href="/course/<?php echo $course['id']; ?>" class="enroll-btn">View</a>
                                </div>
                            <?php
                                endforeach;
                            else:
                            ?>
                                <p>No recommendations available at the moment.</p>
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- Announcements -->
                    <div class="announcements">
                        <div class="section-header">
                            <h3>Latest Announcements</h3>
                        </div>

                        <?php if (!empty($announcements)): ?>
                            <?php foreach ($announcements as $announcement): ?>
                                <div class="announcement-item">
                                    <div class="announcement-title"><?php echo htmlspecialchars($announcement['title']); ?></div>
                                    <div class="announcement-meta">
                                        Posted by <?php echo htmlspecialchars($announcement['posted_by']); ?>
                                        (<?php echo ucfirst($announcement['role']); ?>) •
                                        <?php echo date('M j, Y', strtotime($announcement['created_at'])); ?>
                                    </div>
                                    <div class="announcement-content">
                                        <?php echo htmlspecialchars(substr($announcement['content'], 0, 100)) . (strlen($announcement['content']) > 100 ? '...' : ''); ?>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <p>No announcements at this time.</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
