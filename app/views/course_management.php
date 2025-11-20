<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Management - LearnHub</title>
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

        .create-course-btn {
            background-color: var(--color-secondary);
            color: white;
            border: none;
            padding: 12px 24px;
            border-radius: 8px;
            font-weight: 500;
            cursor: pointer;
            transition: background-color 0.2s;
        }

        .create-course-btn:hover {
            background-color: #2563EB;
        }

        /* Course Cards */
        .courses-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 20px;
            margin-bottom: 40px;
        }

        .course-card {
            background-color: var(--color-card-bg);
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            border: 1px solid #E5E7EB;
        }

        .course-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }

        .course-title {
            font-size: 1.2rem;
            font-weight: 600;
            color: var(--color-text-dark);
        }

        .course-status {
            background-color: var(--color-positive);
            color: white;
            padding: 4px 8px;
            border-radius: 12px;
            font-size: 0.8rem;
            font-weight: 500;
        }

        .course-status.draft {
            background-color: #F59E0B;
        }

        .course-stats {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 15px;
            margin-bottom: 20px;
        }

        .stat-item {
            text-align: center;
        }

        .stat-value {
            font-size: 1.5rem;
            font-weight: bold;
            color: var(--color-text-dark);
        }

        .stat-label {
            font-size: 0.8rem;
            color: #6B7280;
        }

        .course-actions {
            display: flex;
            gap: 10px;
        }

        .action-btn {
            flex: 1;
            background-color: var(--color-secondary);
            color: white;
            border: none;
            padding: 10px;
            border-radius: 6px;
            font-weight: 500;
            cursor: pointer;
            transition: background-color 0.2s;
        }

        .action-btn:hover {
            background-color: #2563EB;
        }

        .edit-btn {
            background-color: #F59E0B;
        }

        .edit-btn:hover {
            background-color: #D97706;
        }

        .delete-btn {
            background-color: var(--color-negative);
        }

        .delete-btn:hover {
            background-color: #DC2626;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .dashboard-container {
                grid-template-columns: 1fr;
            }

            .sidebar {
                display: none;
            }

            .courses-grid {
                grid-template-columns: 1fr;
            }

            .course-actions {
                flex-direction: column;
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
                <span class="nav-item active"><i class="fas fa-book"></i> Course Management</span>
                <a href="/assessments" class="nav-item"><i class="fas fa-tasks"></i> Assessments</a>
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
                    <input type="text" placeholder="Search courses...">
                </div>
                <div class="user-info">
                    <i class="fas fa-bell notification-icon"></i>
                    <span>Jhon Carlo Gayo</span>
                </div>
            </header>

            <div class="page-header">
                <h1>Course Management</h1>
                <button class="create-course-btn">
                    <i class="fas fa-plus"></i> Create New Course
                </button>
            </div>

            <div class="courses-grid">
                <div class="course-card">
                    <div class="course-header">
                        <h3 class="course-title">Web Development Bootcamp</h3>
                        <span class="course-status">Published</span>
                    </div>
                    <div class="course-stats">
                        <div class="stat-item">
                            <div class="stat-value">156</div>
                            <div class="stat-label">Students</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-value">4.6</div>
                            <div class="stat-label">Rating</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-value">₱2,500</div>
                            <div class="stat-label">Price</div>
                        </div>
                    </div>
                    <div class="course-actions">
                        <button class="action-btn">View Details</button>
                        <button class="action-btn edit-btn">Edit</button>
                        <button class="action-btn delete-btn">Delete</button>
                    </div>
                </div>

                <div class="course-card">
                    <div class="course-header">
                        <h3 class="course-title">Data Science Fundamentals</h3>
                        <span class="course-status">Published</span>
                    </div>
                    <div class="course-stats">
                        <div class="stat-item">
                            <div class="stat-value">98</div>
                            <div class="stat-label">Students</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-value">4.2</div>
                            <div class="stat-label">Rating</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-value">₱3,200</div>
                            <div class="stat-label">Price</div>
                        </div>
                    </div>
                    <div class="course-actions">
                        <button class="action-btn">View Details</button>
                        <button class="action-btn edit-btn">Edit</button>
                        <button class="action-btn delete-btn">Delete</button>
                    </div>
                </div>

                <div class="course-card">
                    <div class="course-header">
                        <h3 class="course-title">Python Programming</h3>
                        <span class="course-status">Published</span>
                    </div>
                    <div class="course-stats">
                        <div class="stat-item">
                            <div class="stat-value">134</div>
                            <div class="stat-label">Students</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-value">4.4</div>
                            <div class="stat-label">Rating</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-value">₱2,800</div>
                            <div class="stat-label">Price</div>
                        </div>
                    </div>
                    <div class="course-actions">
                        <button class="action-btn">View Details</button>
                        <button class="action-btn edit-btn">Edit</button>
                        <button class="action-btn delete-btn">Delete</button>
                    </div>
                </div>

                <div class="course-card">
                    <div class="course-header">
                        <h3 class="course-title">JavaScript Fundamentals</h3>
                        <span class="course-status draft">Draft</span>
                    </div>
                    <div class="course-stats">
                        <div class="stat-item">
                            <div class="stat-value">0</div>
                            <div class="stat-label">Students</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-value">N/A</div>
                            <div class="stat-label">Rating</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-value">₱2,200</div>
                            <div class="stat-label">Price</div>
                        </div>
                    </div>
                    <div class="course-actions">
                        <button class="action-btn">View Details</button>
                        <button class="action-btn edit-btn">Edit</button>
                        <button class="action-btn delete-btn">Delete</button>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
