<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assessments - LearnHub</title>
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

        .create-assessment-btn {
            background-color: var(--color-secondary);
            color: white;
            border: none;
            padding: 12px 24px;
            border-radius: 8px;
            font-weight: 500;
            cursor: pointer;
            transition: background-color 0.2s;
        }

        .create-assessment-btn:hover {
            background-color: #2563EB;
        }

        /* Assessment Sections */
        .assessment-sections {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
            gap: 20px;
            margin-bottom: 40px;
        }

        .assessment-section {
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

        .section-icon {
            width: 50px;
            height: 50px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            margin-right: 15px;
        }

        .section-icon.quiz {
            background-color: #3B82F6;
            color: white;
        }

        .section-icon.auto-grade {
            background-color: #10B981;
            color: white;
        }

        .section-icon.review {
            background-color: #F59E0B;
            color: white;
        }

        .section-icon.manual {
            background-color: #8B5CF6;
            color: white;
        }

        .section-icon.feedback {
            background-color: #EF4444;
            color: white;
        }

        .section-title {
            font-size: 1.3rem;
            font-weight: 600;
            color: var(--color-text-dark);
            margin-bottom: 5px;
        }

        .section-description {
            color: #6B7280;
            font-size: 0.9rem;
            line-height: 1.4;
        }

        .section-content {
            margin-top: 20px;
        }

        .placeholder-content {
            background-color: #F9FAFB;
            border: 2px dashed #D1D5DB;
            border-radius: 8px;
            padding: 30px;
            text-align: center;
            color: #6B7280;
        }

        .placeholder-content i {
            font-size: 2rem;
            margin-bottom: 10px;
            display: block;
        }

        .placeholder-content p {
            margin: 0;
            font-size: 0.9rem;
        }

        .action-button {
            background-color: var(--color-secondary);
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 6px;
            font-weight: 500;
            cursor: pointer;
            margin-top: 15px;
            transition: background-color 0.2s;
        }

        .action-button:hover {
            background-color: #2563EB;
        }

        /* Recent Assessments */
        .recent-assessments {
            background-color: var(--color-card-bg);
            border-radius: 12px;
            padding: 25px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }

        .recent-assessments h2 {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 20px;
            color: var(--color-text-dark);
        }

        .assessment-list {
            display: grid;
            gap: 15px;
        }

        .assessment-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px;
            background-color: #F9FAFB;
            border-radius: 8px;
            border: 1px solid #E5E7EB;
        }

        .assessment-info h4 {
            margin: 0 0 5px 0;
            font-size: 1rem;
            font-weight: 500;
            color: var(--color-text-dark);
        }

        .assessment-meta {
            font-size: 0.8rem;
            color: #6B7280;
        }

        .assessment-status {
            padding: 4px 8px;
            border-radius: 12px;
            font-size: 0.8rem;
            font-weight: 500;
        }

        .status-published {
            background-color: #10B981;
            color: white;
        }

        .status-draft {
            background-color: #F59E0B;
            color: white;
        }

        .assessment-actions {
            display: flex;
            gap: 8px;
        }

        .btn-small {
            padding: 6px 12px;
            border: none;
            border-radius: 4px;
            font-size: 0.8rem;
            font-weight: 500;
            cursor: pointer;
            transition: background-color 0.2s;
        }

        .btn-edit {
            background-color: var(--color-secondary);
            color: white;
        }

        .btn-edit:hover {
            background-color: #2563EB;
        }

        .btn-view {
            background-color: #6B7280;
            color: white;
        }

        .btn-view:hover {
            background-color: #4B5563;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .dashboard-container {
                grid-template-columns: 1fr;
            }

            .sidebar {
                display: none;
            }

            .assessment-sections {
                grid-template-columns: 1fr;
            }

            .assessment-item {
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
            }

            .assessment-actions {
                align-self: stretch;
                justify-content: flex-end;
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
                <span class="nav-item active"><i class="fas fa-tasks"></i> Assessments</span>
                <a href="/discussions" class="nav-item"><i class="fas fa-comments"></i> Discussions</a>
                <a href="/reviews" class="nav-item"><i class="fas fa-star"></i> Reviews</a>
                <a href="/profile" class="nav-item"><i class="fas fa-user-circle"></i> Profile</a>
                <a href="/earnings" class="nav-item"><i class="fas fa-money-bill-wave"></i> Earnings</a>
            </nav>
        </aside>

        <main class="main-content">
            <header class="header">
                <div class="search-bar">
                    <i class="fas fa-search"></i>
                    <input type="text" placeholder="Search assessments...">
                </div>
                <div class="user-info">
                    <i class="fas fa-bell notification-icon"></i>
                    <span>Jhon Carlo Gayo</span>
                </div>
            </header>

            <div class="page-header">
                <h1>Assessments</h1>
                <button class="create-assessment-btn">
                    <i class="fas fa-plus"></i> Create New Assessment
                </button>
            </div>

            <div class="assessment-sections">
                <!-- Create Quizzes Section -->
                <div class="assessment-section">
                    <div class="section-header">
                        <div class="section-icon quiz">
                            <i class="fas fa-question-circle"></i>
                        </div>
                        <div>
                            <h3 class="section-title">Create Quizzes</h3>
                            <p class="section-description">Design and build interactive quizzes with multiple choice, true/false, and short answer questions.</p>
                        </div>
                    </div>
                    <div class="section-content">
                        <div class="placeholder-content">
                            <i class="fas fa-plus-circle"></i>
                            <p>Quiz creation tools will be implemented here</p>
                            <p>Support for question types, timing, and randomization</p>
                        </div>
                        <button class="action-button">Create Quiz</button>
                    </div>
                </div>

                <!-- Auto-Graded Items Section -->
                <div class="assessment-section">
                    <div class="section-header">
                        <div class="section-icon auto-grade">
                            <i class="fas fa-robot"></i>
                        </div>
                        <div>
                            <h3 class="section-title">Auto-Graded Items</h3>
                            <p class="section-description">Set up automatic grading for multiple choice, true/false, and coding challenges.</p>
                        </div>
                    </div>
                    <div class="section-content">
                        <div class="placeholder-content">
                            <i class="fas fa-cogs"></i>
                            <p>Auto-grading configuration will be implemented here</p>
                            <p>Instant feedback and scoring algorithms</p>
                        </div>
                        <button class="action-button">Configure Auto-Grading</button>
                    </div>
                </div>

                <!-- Review Submissions Section -->
                <div class="assessment-section">
                    <div class="section-header">
                        <div class="section-icon review">
                            <i class="fas fa-eye"></i>
                        </div>
                        <div>
                            <h3 class="section-title">Review Submissions</h3>
                            <p class="section-description">Monitor student progress and view completed assessments across all courses.</p>
                        </div>
                    </div>
                    <div class="section-content">
                        <div class="placeholder-content">
                            <i class="fas fa-chart-bar"></i>
                            <p>Submission tracking and analytics will be implemented here</p>
                            <p>Progress monitoring and completion rates</p>
                        </div>
                        <button class="action-button">View Submissions</button>
                    </div>
                </div>

                <!-- Manual Grading Section -->
                <div class="assessment-section">
                    <div class="section-header">
                        <div class="section-icon manual">
                            <i class="fas fa-edit"></i>
                        </div>
                        <div>
                            <h3 class="section-title">Manual Grading</h3>
                            <p class="section-description">Grade long-answer questions, essays, and project submissions with detailed feedback.</p>
                        </div>
                    </div>
                    <div class="section-content">
                        <div class="placeholder-content">
                            <i class="fas fa-file-alt"></i>
                            <p>Manual grading interface will be implemented here</p>
                            <p>Rubric-based assessment and detailed feedback</p>
                        </div>
                        <button class="action-button">Grade Submissions</button>
                    </div>
                </div>

                <!-- Add Feedback Section -->
                <div class="assessment-section">
                    <div class="section-header">
                        <div class="section-icon feedback">
                            <i class="fas fa-comment-dots"></i>
                        </div>
                        <div>
                            <h3 class="section-title">Add Feedback</h3>
                            <p class="section-description">Provide constructive feedback to help students improve and understand their mistakes.</p>
                        </div>
                    </div>
                    <div class="section-content">
                        <div class="placeholder-content">
                            <i class="fas fa-comments"></i>
                            <p>Feedback system will be implemented here</p>
                            <p>Individual and group feedback options</p>
                        </div>
                        <button class="action-button">Add Feedback</button>
                    </div>
                </div>
            </div>

            <!-- Recent Assessments Section -->
            <div class="recent-assessments">
                <h2>Recent Assessments</h2>
                <div class="assessment-list">
                    <div class="assessment-item">
                        <div class="assessment-info">
                            <h4>Web Development Quiz - Module 1</h4>
                            <div class="assessment-meta">Created 2 days ago • 45 submissions</div>
                        </div>
                        <div class="assessment-status status-published">Published</div>
                        <div class="assessment-actions">
                            <button class="btn-small btn-edit">Edit</button>
                            <button class="btn-small btn-view">View Results</button>
                        </div>
                    </div>

                    <div class="assessment-item">
                        <div class="assessment-info">
                            <h4>Data Science Assignment</h4>
                            <div class="assessment-meta">Created 1 week ago • 23 submissions</div>
                        </div>
                        <div class="assessment-status status-published">Published</div>
                        <div class="assessment-actions">
                            <button class="btn-small btn-edit">Edit</button>
                            <button class="btn-small btn-view">View Results</button>
                        </div>
                    </div>

                    <div class="assessment-item">
                        <div class="assessment-info">
                            <h4>Python Coding Challenge</h4>
                            <div class="assessment-meta">Created 3 days ago • 12 submissions</div>
                        </div>
                        <div class="assessment-status status-draft">Draft</div>
                        <div class="assessment-actions">
                            <button class="btn-small btn-edit">Edit</button>
                            <button class="btn-small btn-view">Preview</button>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
