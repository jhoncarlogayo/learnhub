<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reviews & Ratings - LearnHub</title>
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

        .filter-actions {
            display: flex;
            gap: 15px;
        }

        .filter-select {
            padding: 8px 12px;
            border: 1px solid #D1D5DB;
            border-radius: 6px;
            background-color: white;
        }

        /* Rating Summary Section */
        .rating-summary {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .summary-card {
            background-color: var(--color-card-bg);
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .summary-card h3 {
            font-size: 0.9rem;
            color: #6B7280;
            margin-bottom: 10px;
        }

        .rating-stars {
            color: #FBBF24;
            font-size: 1.5rem;
            margin-bottom: 5px;
        }

        .rating-value {
            font-size: 2rem;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .rating-count {
            font-size: 0.9rem;
            color: #6B7280;
        }

        /* Reviews Sections */
        .reviews-sections {
            display: grid;
            grid-template-columns: 1fr;
            gap: 30px;
        }

        .reviews-section {
            background-color: var(--color-card-bg);
            border-radius: 12px;
            padding: 25px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }

        .section-header {
            display: flex;
            justify-content: space-between;
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

        .section-icon.feedback {
            background-color: #3B82F6;
            color: white;
        }

        .section-icon.replies {
            background-color: #10B981;
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

        /* Reviews List */
        .reviews-list {
            display: grid;
            gap: 20px;
        }

        .review-item {
            border: 1px solid #E5E7EB;
            border-radius: 8px;
            padding: 20px;
            background-color: #F9FAFB;
        }

        .review-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 15px;
        }

        .reviewer-info {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .reviewer-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: #D1D5DB;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
        }

        .reviewer-details h4 {
            margin: 0;
            font-size: 0.9rem;
            font-weight: 500;
        }

        .reviewer-details p {
            margin: 0;
            font-size: 0.8rem;
            color: #6B7280;
        }

        .review-rating {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .stars {
            color: #FBBF24;
        }

        .review-content {
            color: #374151;
            margin-bottom: 15px;
            line-height: 1.5;
        }

        .review-actions {
            display: flex;
            gap: 10px;
        }

        .btn-reply {
            background-color: var(--color-secondary);
            color: white;
        }

        .btn-reply:hover {
            background-color: #2563EB;
        }

        .btn-helpful {
            background-color: var(--color-positive);
            color: white;
        }

        .btn-helpful:hover {
            background-color: #059669;
        }

        /* Reply Panel */
        .reply-panel {
            margin-top: 15px;
            padding: 15px;
            background-color: white;
            border-radius: 8px;
            border: 1px solid #E5E7EB;
        }

        .reply-form textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #D1D5DB;
            border-radius: 6px;
            resize: vertical;
            min-height: 80px;
            font-family: inherit;
            margin-bottom: 10px;
        }

        .reply-actions {
            display: flex;
            gap: 10px;
            justify-content: flex-end;
        }

        .btn-submit {
            background-color: var(--color-secondary);
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 6px;
            cursor: pointer;
        }

        .btn-submit:hover {
            background-color: #2563EB;
        }

        .btn-cancel {
            background-color: #6B7280;
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 6px;
            cursor: pointer;
        }

        .btn-cancel:hover {
            background-color: #4B5563;
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

            .rating-summary {
                grid-template-columns: repeat(2, 1fr);
            }

            .filter-actions {
                flex-direction: column;
                align-items: stretch;
            }

            .review-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
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
                <span class="nav-item active"><i class="fas fa-star"></i> Reviews</span>
                <a href="/profile" class="nav-item"><i class="fas fa-user-circle"></i> Profile</a>
                <a href="/earnings" class="nav-item"><i class="fas fa-money-bill-wave"></i> Earnings</a>
            </nav>
        </aside>

        <main class="main-content">
            <header class="header">
                <div class="search-bar">
                    <i class="fas fa-search"></i>
                    <input type="text" placeholder="Search reviews...">
                </div>
                <div class="user-info">
                    <i class="fas fa-bell notification-icon"></i>
                    <span>Jhon Carlo Gayo</span>
                </div>
            </header>

            <div class="page-header">
                <h1>Reviews & Ratings</h1>
                <div class="filter-actions">
                    <select class="filter-select">
                        <option value="all">All Courses</option>
                        <option value="web-dev">Web Development Bootcamp</option>
                        <option value="data-science">Data Science Fundamentals</option>
                        <option value="python">Python Programming</option>
                    </select>
                    <select class="filter-select">
                        <option value="all">All Ratings</option>
                        <option value="5">5 Stars</option>
                        <option value="4">4 Stars</option>
                        <option value="3">3 Stars</option>
                        <option value="2">2 Stars</option>
                        <option value="1">1 Star</option>
                    </select>
                </div>
            </div>

            <!-- Rating Summary -->
            <div class="rating-summary">
                <div class="summary-card">
                    <h3>Overall Rating</h3>
                    <div class="rating-stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <div class="rating-value">4.8</div>
                    <div class="rating-count">387 reviews</div>
                </div>

                <div class="summary-card">
                    <h3>Web Development</h3>
                    <div class="rating-stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <div class="rating-value">4.9</div>
                    <div class="rating-count">156 reviews</div>
                </div>

                <div class="summary-card">
                    <h3>Data Science</h3>
                    <div class="rating-stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                    </div>
                    <div class="rating-value">4.2</div>
                    <div class="rating-count">98 reviews</div>
                </div>

                <div class="summary-card">
                    <h3>Python Programming</h3>
                    <div class="rating-stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <div class="rating-value">4.4</div>
                    <div class="rating-count">133 reviews</div>
                </div>
            </div>

            <!-- Reviews Sections -->
            <div class="reviews-sections">
                <!-- Student Feedback List -->
                <div class="reviews-section">
                    <div class="section-header">
                        <div class="section-title">
                            <div class="section-icon feedback">
                                <i class="fas fa-comments"></i>
                            </div>
                            Student Feedback
                        </div>
                        <div class="section-actions">
                            <button class="btn-small btn-filter">
                                <i class="fas fa-clock"></i> Recent
                            </button>
                            <button class="btn-small btn-filter">
                                <i class="fas fa-flag"></i> Needs Reply
                            </button>
                        </div>
                    </div>

                    <div class="reviews-list">
                        <div class="review-item">
                            <div class="review-header">
                                <div class="reviewer-info">
                                    <div class="reviewer-avatar">AJ</div>
                                    <div class="reviewer-details">
                                        <h4>Alice Johnson</h4>
                                        <p>Web Development Bootcamp • 2 days ago</p>
                                    </div>
                                </div>
                                <div class="review-rating">
                                    <div class="stars">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <span>5.0</span>
                                </div>
                            </div>
                            <p class="review-content">Excellent course! The instructor explains complex concepts in a very clear and understandable way. The projects are practical and helped me build a strong portfolio. Highly recommended!</p>
                            <div class="review-actions">
                                <button class="btn-small btn-reply">
                                    <i class="fas fa-reply"></i> Reply
                                </button>
                                <button class="btn-small btn-helpful">
                                    <i class="fas fa-thumbs-up"></i> Mark Helpful
                                </button>
                            </div>

                            <!-- Reply Panel Placeholder -->
                            <div class="reply-panel" style="display: none;">
                                <div class="reply-form">
                                    <textarea placeholder="Write your reply to this review..."></textarea>
                                    <div class="reply-actions">
                                        <button class="btn-cancel">Cancel</button>
                                        <button class="btn-submit">Post Reply</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="review-item">
                            <div class="review-header">
                                <div class="reviewer-info">
                                    <div class="reviewer-avatar">BS</div>
                                    <div class="reviewer-details">
                                        <h4>Bob Smith</h4>
                                        <p>Data Science Fundamentals • 1 week ago</p>
                                    </div>
                                </div>
                                <div class="review-rating">
                                    <div class="stars">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="far fa-star"></i>
                                    </div>
                                    <span>4.0</span>
                                </div>
                            </div>
                            <p class="review-content">Great course overall. The content is comprehensive and well-structured. Would have liked more hands-on exercises, but still very valuable learning experience.</p>
                            <div class="review-actions">
                                <button class="btn-small btn-reply">
                                    <i class="fas fa-reply"></i> Reply
                                </button>
                                <button class="btn-small btn-helpful">
                                    <i class="fas fa-thumbs-up"></i> Mark Helpful
                                </button>
                            </div>
                        </div>

                        <div class="review-item">
                            <div class="review-header">
                                <div class="reviewer-info">
                                    <div class="reviewer-avatar">CD</div>
                                    <div class="reviewer-details">
                                        <h4>Carol Davis</h4>
                                        <p>Python Programming • 2 weeks ago</p>
                                    </div>
                                </div>
                                <div class="review-rating">
                                    <div class="stars">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                    </div>
                                    <span>4.5</span>
                                </div>
                            </div>
                            <p class="review-content">Perfect for beginners! The pace is just right and the instructor is very patient. I went from knowing nothing about Python to building my own applications. Thank you!</p>
                            <div class="review-actions">
                                <button class="btn-small btn-reply">
                                    <i class="fas fa-reply"></i> Reply
                                </button>
                                <button class="btn-small btn-helpful">
                                    <i class="fas fa-thumbs-up"></i> Mark Helpful
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Reply Section Placeholder -->
                <div class="reviews-section">
                    <div class="section-header">
                        <div class="section-title">
                            <div class="section-icon replies">
                                <i class="fas fa-reply"></i>
                            </div>
                            Reply to Reviews
                        </div>
                    </div>

                    <div class="placeholder-content">
                        <i class="fas fa-reply"></i>
                        <p>Reply functionality will be implemented here</p>
                        <p>Individual reply panels and bulk reply options</p>
                        <p>Reply templates and response tracking</p>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
