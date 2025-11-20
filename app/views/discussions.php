<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Discussion Forums - LearnHub</title>
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

        .header-actions {
            display: flex;
            gap: 15px;
        }

        .action-btn {
            background-color: var(--color-secondary);
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 8px;
            font-weight: 500;
            cursor: pointer;
            transition: background-color 0.2s;
        }

        .action-btn:hover {
            background-color: #2563EB;
        }

        .action-btn.secondary {
            background-color: #6B7280;
        }

        .action-btn.secondary:hover {
            background-color: #4B5563;
        }

        /* Discussion Sections */
        .discussion-sections {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 30px;
            margin-bottom: 30px;
        }

        .main-section {
            display: grid;
            gap: 30px;
        }

        .sidebar-section {
            display: grid;
            gap: 30px;
        }

        .discussion-section {
            background-color: var(--color-card-bg);
            border-radius: 12px;
            padding: 25px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            border: 1px solid #E5E7EB;
        }

        .section-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
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

        .section-icon.questions {
            background-color: #3B82F6;
            color: white;
        }

        .section-icon.pinned {
            background-color: #F59E0B;
            color: white;
        }

        .section-icon.moderation {
            background-color: #EF4444;
            color: white;
        }

        .section-actions {
            display: flex;
            gap: 10px;
        }

        .btn-small {
            padding: 6px 12px;
            border: none;
            border-radius: 6px;
            font-size: 0.9rem;
            font-weight: 500;
            cursor: pointer;
            transition: background-color 0.2s;
        }

        .btn-filter {
            background-color: #F3F4F6;
            color: #374151;
        }

        .btn-filter:hover {
            background-color: #E5E7EB;
        }

        /* Questions List */
        .questions-list {
            display: grid;
            gap: 15px;
        }

        .question-item {
            border: 1px solid #E5E7EB;
            border-radius: 8px;
            padding: 20px;
            background-color: #F9FAFB;
            transition: box-shadow 0.2s;
        }

        .question-item:hover {
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .question-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 10px;
        }

        .question-title {
            font-size: 1.1rem;
            font-weight: 600;
            color: var(--color-text-dark);
            margin-bottom: 5px;
        }

        .question-meta {
            font-size: 0.85rem;
            color: #6B7280;
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .question-content {
            color: #374151;
            margin-bottom: 15px;
            line-height: 1.5;
        }

        .question-stats {
            display: flex;
            gap: 20px;
            font-size: 0.9rem;
            color: #6B7280;
        }

        .question-actions {
            display: flex;
            gap: 10px;
            margin-top: 15px;
        }

        .btn-reply {
            background-color: var(--color-secondary);
            color: white;
        }

        .btn-reply:hover {
            background-color: #2563EB;
        }

        .btn-pin {
            background-color: #F59E0B;
            color: white;
        }

        .btn-pin:hover {
            background-color: #D97706;
        }

        .btn-moderate {
            background-color: #EF4444;
            color: white;
        }

        .btn-moderate:hover {
            background-color: #DC2626;
        }

        /* Pinned Posts */
        .pinned-posts {
            max-height: 400px;
            overflow-y: auto;
        }

        .pinned-item {
            background-color: #FEF3C7;
            border: 1px solid #F59E0B;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 10px;
        }

        .pinned-item .question-title {
            color: #92400E;
        }

        .pin-indicator {
            color: #F59E0B;
            margin-right: 5px;
        }

        /* Moderation Tools */
        .moderation-tools {
            background-color: #FEF2F2;
            border: 1px solid #FECACA;
        }

        .moderation-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 12px 0;
            border-bottom: 1px solid #FECACA;
        }

        .moderation-item:last-child {
            border-bottom: none;
        }

        .moderation-text {
            font-size: 0.9rem;
            color: #991B1B;
        }

        .moderation-count {
            background-color: #EF4444;
            color: white;
            padding: 2px 8px;
            border-radius: 12px;
            font-size: 0.8rem;
            font-weight: 500;
        }

        .moderation-actions {
            display: flex;
            gap: 8px;
            margin-top: 15px;
        }

        .btn-review {
            background-color: #EF4444;
            color: white;
        }

        .btn-review:hover {
            background-color: #DC2626;
        }

        .btn-approve {
            background-color: var(--color-positive);
            color: white;
        }

        .btn-approve:hover {
            background-color: #059669;
        }

        /* Placeholder Content */
        .placeholder-content {
            background-color: #F9FAFB;
            border: 2px dashed #D1D5DB;
            border-radius: 8px;
            padding: 40px;
            text-align: center;
            color: #6B7280;
        }

        .placeholder-content i {
            font-size: 3rem;
            margin-bottom: 15px;
            display: block;
        }

        .placeholder-content p {
            margin: 5px 0;
            font-size: 0.95rem;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .dashboard-container {
                grid-template-columns: 1fr;
            }

            .sidebar {
                display: none;
            }

            .discussion-sections {
                grid-template-columns: 1fr;
            }

            .question-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
            }

            .question-meta {
                flex-wrap: wrap;
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
                <span class="nav-item active"><i class="fas fa-comments"></i> Discussions</span>
                <a href="/reviews" class="nav-item"><i class="fas fa-star"></i> Reviews</a>
                <a href="/profile" class="nav-item"><i class="fas fa-user-circle"></i> Profile</a>
                <a href="/earnings" class="nav-item"><i class="fas fa-money-bill-wave"></i> Earnings</a>
            </nav>
        </aside>

        <main class="main-content">
            <header class="header">
                <div class="search-bar">
                    <i class="fas fa-search"></i>
                    <input type="text" placeholder="Search discussions, questions...">
                </div>
                <div class="user-info">
                    <i class="fas fa-bell notification-icon"></i>
                    <span>Jhon Carlo Gayo</span>
                </div>
            </header>

            <div class="page-header">
                <h1>Discussion Forums</h1>
                <div class="header-actions">
                    <button class="action-btn secondary">
                        <i class="fas fa-filter"></i> Filter
                    </button>
                    <button class="action-btn">
                        <i class="fas fa-plus"></i> New Discussion
                    </button>
                </div>
            </div>

            <div class="discussion-sections">
                <!-- Main Content Area -->
                <div class="main-section">
                    <!-- Questions List Section -->
                    <div class="discussion-section">
                        <div class="section-header">
                            <div class="section-title">
                                <div class="section-icon questions">
                                    <i class="fas fa-question-circle"></i>
                                </div>
                                Student Questions
                            </div>
                            <div class="section-actions">
                                <button class="btn-small btn-filter">
                                    <i class="fas fa-filter"></i> Unanswered
                                </button>
                                <button class="btn-small btn-filter">
                                    <i class="fas fa-clock"></i> Recent
                                </button>
                            </div>
                        </div>

                        <div class="questions-list">
                            <div class="question-item">
                                <div class="question-header">
                                    <div>
                                        <h3 class="question-title">How do I implement CSS Grid in responsive design?</h3>
                                        <div class="question-meta">
                                            <span><i class="fas fa-user"></i> Alice Johnson</span>
                                            <span><i class="fas fa-book"></i> Web Development Bootcamp</span>
                                            <span><i class="fas fa-clock"></i> 2 hours ago</span>
                                        </div>
                                    </div>
                                </div>
                                <p class="question-content">I'm having trouble making my CSS Grid layout work properly on mobile devices. The columns seem to stack incorrectly. Can someone help me understand the best practices?</p>
                                <div class="question-stats">
                                    <span><i class="fas fa-eye"></i> 12 views</span>
                                    <span><i class="fas fa-reply"></i> 3 replies</span>
                                    <span><i class="fas fa-thumbs-up"></i> 5 likes</span>
                                </div>
                                <div class="question-actions">
                                    <button class="btn-small btn-reply">
                                        <i class="fas fa-reply"></i> Reply
                                    </button>
                                    <button class="btn-small btn-pin">
                                        <i class="fas fa-thumbtack"></i> Pin
                                    </button>
                                    <button class="btn-small btn-moderate">
                                        <i class="fas fa-flag"></i> Moderate
                                    </button>
                                </div>
                            </div>

                            <div class="question-item">
                                <div class="question-header">
                                    <div>
                                        <h3 class="question-title">Python list comprehensions vs for loops</h3>
                                        <div class="question-meta">
                                            <span><i class="fas fa-user"></i> Bob Smith</span>
                                            <span><i class="fas fa-book"></i> Python Programming</span>
                                            <span><i class="fas fa-clock"></i> 5 hours ago</span>
                                        </div>
                                    </div>
                                </div>
                                <p class="question-content">When should I use list comprehensions instead of regular for loops? Are there performance differences I should consider?</p>
                                <div class="question-stats">
                                    <span><i class="fas fa-eye"></i> 8 views</span>
                                    <span><i class="fas fa-reply"></i> 0 replies</span>
                                    <span><i class="fas fa-thumbs-up"></i> 2 likes</span>
                                </div>
                                <div class="question-actions">
                                    <button class="btn-small btn-reply">
                                        <i class="fas fa-reply"></i> Reply
                                    </button>
                                    <button class="btn-small btn-pin">
                                        <i class="fas fa-thumbtack"></i> Pin
                                    </button>
                                    <button class="btn-small btn-moderate">
                                        <i class="fas fa-flag"></i> Moderate
                                    </button>
                                </div>
                            </div>

                            <div class="question-item">
                                <div class="question-header">
                                    <div>
                                        <h3 class="question-title">Data visualization best practices</h3>
                                        <div class="question-meta">
                                            <span><i class="fas fa-user"></i> Carol Davis</span>
                                            <span><i class="fas fa-book"></i> Data Science Fundamentals</span>
                                            <span><i class="fas fa-clock"></i> 1 day ago</span>
                                        </div>
                                    </div>
                                </div>
                                <p class="question-content">What are the most important principles to follow when creating data visualizations? Any recommended tools or libraries?</p>
                                <div class="question-stats">
                                    <span><i class="fas fa-eye"></i> 15 views</span>
                                    <span><i class="fas fa-reply"></i> 7 replies</span>
                                    <span><i class="fas fa-thumbs-up"></i> 8 likes</span>
                                </div>
                                <div class="question-actions">
                                    <button class="btn-small btn-reply">
                                        <i class="fas fa-reply"></i> Reply
                                    </button>
                                    <button class="btn-small btn-pin">
                                        <i class="fas fa-thumbtack"></i> Pin
                                    </button>
                                    <button class="btn-small btn-moderate">
                                        <i class="fas fa-flag"></i> Moderate
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Content -->
                <div class="sidebar-section">
                    <!-- Pinned Posts Section -->
                    <div class="discussion-section">
                        <div class="section-header">
                            <div class="section-title">
                                <div class="section-icon pinned">
                                    <i class="fas fa-thumbtack"></i>
                                </div>
                                Pinned Posts
                            </div>
                        </div>

                        <div class="pinned-posts">
                            <div class="pinned-item">
                                <h4 class="question-title">
                                    <i class="fas fa-thumbtack pin-indicator"></i>
                                    Important: Course Project Guidelines
                                </h4>
                                <p class="question-content">Please review the updated project submission guidelines before starting your final projects.</p>
                                <div class="question-meta">
                                    <span><i class="fas fa-user"></i> Instructor</span>
                                    <span><i class="fas fa-clock"></i> 3 days ago</span>
                                </div>
                            </div>

                            <div class="pinned-item">
                                <h4 class="question-title">
                                    <i class="fas fa-thumbtack pin-indicator"></i>
                                    Office Hours Schedule
                                </h4>
                                <p class="question-content">Updated office hours for the remainder of the semester. Tuesdays and Thursdays 2-4 PM.</p>
                                <div class="question-meta">
                                    <span><i class="fas fa-user"></i> Instructor</span>
                                    <span><i class="fas fa-clock"></i> 1 week ago</span>
                                </div>
                            </div>

                            <div class="placeholder-content">
                                <i class="fas fa-thumbtack"></i>
                                <p>No additional pinned posts</p>
                                <p>Pin important discussions here</p>
                            </div>
                        </div>
                    </div>

                    <!-- Moderation Tools Section -->
                    <div class="discussion-section moderation-tools">
                        <div class="section-header">
                            <div class="section-title">
                                <div class="section-icon moderation">
                                    <i class="fas fa-shield-alt"></i>
                                </div>
                                Moderation Tools
                            </div>
                        </div>

                        <div class="moderation-item">
                            <span class="moderation-text">Flagged Posts</span>
                            <span class="moderation-count">3</span>
                        </div>

                        <div class="moderation-item">
                            <span class="moderation-text">Spam Reports</span>
                            <span class="moderation-count">1</span>
                        </div>

                        <div class="moderation-item">
                            <span class="moderation-text">Unanswered Questions</span>
                            <span class="moderation-count">12</span>
                        </div>

                        <div class="moderation-actions">
                            <button class="btn-small btn-review">
                                <i class="fas fa-eye"></i> Review All
                            </button>
                            <button class="btn-small btn-approve">
                                <i class="fas fa-check"></i> Quick Approve
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
