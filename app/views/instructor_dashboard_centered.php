<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instructor Dashboard</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
            font-family: sans-serif;
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

        .create-course-btn {
            background-color: #FBBF24; /* Orange/Yellow accent */
            color: var(--color-text-dark);
            border: none;
            padding: 12px 15px;
            border-radius: 8px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.2s;
        }

        .create-course-btn:hover {
            background-color: #FCD34D;
        }

        .sidebar-btn {
            margin: 10px 0;
            width: calc(100% - 30px);
            margin-left: 15px;
            margin-right: 15px;
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
            padding: 0;
        }

        .overview-section {
            padding: 30px;
        }

        .overview-section h2 {
            font-size: 1.8rem;
            margin-bottom: 20px;
        }

        /* KPI Cards */
        .kpi-cards {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            margin-bottom: 30px;
        }

        .kpi-card {
            background-color: var(--color-card-bg);
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }

        .kpi-card h3 {
            font-size: 0.9rem;
            color: #6B7280;
            margin-bottom: 5px;
        }

        .kpi-card .value {
            font-size: 2rem;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .kpi-card .change {
            font-size: 0.8rem;
            font-weight: 500;
        }

        .kpi-card .positive {
            color: var(--color-positive);
        }

        .kpi-card .negative {
            color: var(--color-negative);
        }

        .kpi-card.avg-rating .value i {
            color: #FBBF24; /* Star color */
            margin-left: 5px;
        }

        /* Charts and Reports */
        .charts-reports {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 20px;
            margin-bottom: 30px;
        }

        .chart {
            background-color: var(--color-card-bg);
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }

        .chart h3 {
            margin-bottom: 15px;
            font-size: 1.1rem;
        }

        .chart canvas {
            width: 100% !important;
            height: 300px !important;
        }

        /* Recent Activity Table */
        .recent-activity {
            background-color: var(--color-card-bg);
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }

        .recent-activity h3 {
            margin-bottom: 15px;
            font-size: 1.1rem;
        }

        .recent-activity table {
            width: 100%;
            border-collapse: collapse;
        }

        .recent-activity th, .recent-activity td {
            text-align: left;
            padding: 12px 0;
        }

        .recent-activity thead th {
            font-weight: bold;
            color: #6B7280;
            border-bottom: 1px solid #E5E7EB;
        }

        .recent-activity tbody tr:not(:last-child) td {
            border-bottom: 1px solid #F3F4F6;
        }

        .recent-activity tbody td {
            color: var(--color-text-dark);
        }

        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(5px);
        }

        .modal-content {
            background-color: var(--color-card-bg);
            margin: 0;
            padding: 30px;
            border-radius: 15px;
            width: 90%;
            max-width: 700px;
            max-height: 80vh;
            overflow-y: auto;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
            animation: modalSlideIn 0.3s ease-out;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        @keyframes modalSlideIn {
            from {
                opacity: 0;
                transform: translate(-50%, -50%) scale(0.9);
            }
            to {
                opacity: 1;
                transform: translate(-50%, -50%) scale(1);
            }
        }

        .close {
            color: #6B7280;
            float: right;
            font-size: 32px;
            font-weight: bold;
            cursor: pointer;
            transition: color 0.2s;
            margin-bottom: 10px;
        }

        .close:hover {
            color: var(--color-negative);
        }

        .modal-content h2 {
            color: var(--color-text-dark);
            margin-bottom: 25px;
            font-size: 1.8rem;
            text-align: center;
            border-bottom: 2px solid var(--color-background);
            padding-bottom: 15px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-weight: 600;
            margin-bottom: 8px;
            color: var(--color-text-dark);
            font-size: 0.95rem;
        }

        .form-group input,
        .form-group textarea,
        .form-group select {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #E5E7EB;
            border-radius: 8px;
            font-size: 1rem;
            font-family: inherit;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
            background-color: var(--color-background);
        }

        .form-group input:focus,
        .form-group textarea:focus,
        .form-group select:focus {
            outline: none;
            border-color: var(--color-secondary);
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }

        .form-group textarea {
            resize: vertical;
            min-height: 100px;
            font-family: inherit;
        }

        .modules-section {
            margin-top: 25px;
            border-top: 1px solid #E5E7EB;
            padding-top: 20px;
        }

        .modules-section h3 {
            color: var(--color-text-dark);
            margin-bottom: 15px;
            font-size: 1.2rem;
        }

        .module-item {
            background-color: var(--color-background);
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 15px;
            border: 1px solid #E5E7EB;
        }

        .module-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }

        .module-title {
            font-weight: 600;
            color: var(--color-text-dark);
        }

        .add-lesson-btn,
        .submit-btn {
            background-color: var(--color-secondary);
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 6px;
            font-size: 0.9rem;
            font-weight: 500;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .add-lesson-btn:hover,
        .submit-btn:hover {
            background-color: #2563EB;
            transform: translateY(-1px);
        }

        .lesson-item {
            background-color: white;
            border-radius: 5px;
            padding: 10px;
            margin: 8px 0;
            border: 1px solid #E5E7EB;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .lesson-title {
            font-weight: 500;
            color: var(--color-text-dark);
        }

        .lesson-type {
            font-size: 0.8rem;
            color: #6B7280;
        }

        .submit-btn {
            background-color: var(--color-positive);
            width: 100%;
            padding: 15px;
            font-size: 1.1rem;
            font-weight: 600;
            margin-top: 25px;
        }

        .submit-btn:hover {
            background-color: #059669;
        }

        @media (max-width: 768px) {
            .modal-content {
                width: 95%;
                margin: 10% auto;
                padding: 20px;
            }

            .modal-content h2 {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>

    <div class="dashboard-container">
        <aside class="sidebar">
            <div class="logo">LearnHub</div>
            <nav class="nav-menu">
                <a href="#" class="nav-item active"><i class="fas fa-chart-line"></i> Overview</a>
                <button class="create-course-btn sidebar-btn" onclick="openCreateCourseModal()">
                    <i class="fas fa-plus"></i> Create New Course
                </button>
                <a href="#" class="nav-item"><i class="fas fa-users"></i> Students</a>
                <a href="#" class="nav-item"><i class="fas fa-book"></i> Course Management</a>
                <a href="#" class="nav-item"><i class="fas fa-tasks"></i> Assessments</a>
                <a href="#" class="nav-item"><i class="fas fa-comments"></i> Discussions</a>
                <a href="#" class="nav-item"><i class="fas fa-star"></i> Reviews</a>
                <a href="#" class="nav-item"><i class="fas fa-user-circle"></i> Profile</a>
                <a href="#" class="nav-item"><i class="fas fa-money-bill-wave"></i> Earnings</a>
            </nav>
        </aside>

        <main class="main-content">
            <header class="header">
                <div class="search-bar">
                    <i class="fas fa-search"></i>
                    <input type="text" placeholder="Search courses, students, or questions...">
                </div>
                <div class="user-info">
                    <i class="fas fa-bell notification-icon"></i>
                    <span>Jhon Carlo Gayo</span>
                </div>
            </header>

            <section class="overview-section">
                <h2>Overview</h2>
                <div class="kpi-cards">
                    <div class="kpi-card total-courses">
                        <h3>Total Courses</h3>
                        <p class="value">24</p>
                        <span class="change positive">▲ +3</span>
                    </div>
                    <div class="kpi-card total-students">
                        <h3>Total Students</h3>
                        <p class="value">2,340</p>
                        <span class="change positive">▲ +285</span>
                    </div>
                    <div class="kpi-card total-earnings">
                        <h3>Total Earnings</h3>
                        <p class="value">₱28,750</p>
                        <span class="change positive">▲ 8.75%</span>
                    </div>
                    <div class="kpi-card avg-rating">
                        <h3>Avg. Rating</h3>
                        <p class="value">4.8 <i class="fas fa-star"></i></p>
                        <span class="change positive">▲ 0.2</span>
                    </div>
                </div>

                <div class="charts-reports">
                    <div class="chart monthly-earnings">
                        <h3>Monthly Earnings Report</h3>
                        <canvas id="earningsChart"></canvas>
                    </div>
                    <div class="chart course-ratings">
                        <h3>Course Ratings Breakdown</h3>
                        <canvas id="ratingsChart"></canvas>
                    </div>
                </div>

                <div class="recent-activity">
                    <h3>Recent Activity</h3>
                    <table>
                        <thead>
                            <tr>
                                <th>Activity Type</th>
                                <th>Course</th>
                                <th>Student/User</th>
                                <th>Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>New Enrollment</td>
                                <td>Introduction to AI</td>
                                <td>Alice K.</td>
                                <td>5 hours ago</td>
                            </tr>
                            <tr>
                                <td>Assignment Submitted</td>
                                <td>Web Development Bootcamp</td>
                                <td>Ben L.</td>
                                <td>1 day ago</td>
                            </tr>
                            <tr>
                                <td>Question Asked</td>
                                <td>Data Science Basics</td>
                                <td>Charlie P.</td>
                                <td>1 day ago</td>
                            </tr>
                            <tr>
                                <td>Review Posted</td>
                                <td>Python Programming</td>
                                <td>Diana R.</td>
                                <td>2 days ago</td>
                            </tr>
                            <tr>
                                <td>Course Completed</td>
                                <td>JavaScript Fundamentals</td>
                                <td>Evan M.</td>
                                <td>3 days ago</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
        </main>
    </div>

    <!-- Create Course Modal -->
    <div id="createCourseModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeCreateCourseModal()">&times;</span>
            <h2>Create New Course</h2>
            <form id="createCourseForm">
                <div class="form-group">
                    <label for="courseTitle">Course Title</label>
                    <input type="text" id="courseTitle" name="courseTitle" placeholder="Enter course title" required>
                </div>
                <div class="form-group">
                    <label for="courseDescription">Course Description</label>
                    <textarea id="courseDescription" name="courseDescription" placeholder="Describe your course" required></textarea>
                </div>
                <div class="form-group">
                    <label for="courseCategory">Category</label>
                    <select id="courseCategory" name="courseCategory" required>
                        <option value="">Select Category</option>
                        <option value="web-development">Web Development</option>
                        <option value="data-science">Data Science</option>
                        <option value="programming">Programming</option>
                        <option value="design">Design</option>
                        <option value="business">Business</option>
                        <option value="marketing">Marketing</option>
                        <option value="photography">Photography</option>
                        <option value="music">Music</option>
                        <option value="other">Other</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="courseLevel">Difficulty Level</label>
                    <select id="courseLevel" name="courseLevel" required>
                        <option value="">Select Level</option>
                        <option value="beginner">Beginner</option>
                        <option value="intermediate">Intermediate</option>
                        <option value="advanced">Advanced</option>
                        <option value="all-levels">All Levels</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="coursePrice">Price (₱)</label>
                    <input type="number" id="coursePrice" name="coursePrice" placeholder="0" min="0" step="0.01" required>
                </div>
                <div class="form-group">
                    <label for="courseThumbnail">Course Thumbnail</label>
                    <input type="file" id="courseThumbnail" name="courseThumbnail" accept="image/*" required>
                </div>
                <div class="modules-section">
                    <h3>Course Structure</h3>
                    <div id="modulesContainer">
                        <div class="module-item">
                            <div class="module-header">
                                <span class="module-title">Module 1: Getting Started</span>
                                <button type="button" class="add-lesson-btn" onclick="addLesson(this)">Add Lesson</button>
                            </div>
                            <div class="lessons-container">
                                <!-- Lessons will be added here -->
                            </div>
                        </div>
                    </div>
                    <button type="button" onclick="addModule()">Add Module</button>
                </div>
                <button type="submit" class="submit-btn">Create Course</button>
            </form>
        </div>
    </div>

    <script>
        let moduleCount = 1;

        // Initialize Charts
        document.addEventListener('DOMContentLoaded', function() {
            // Monthly Earnings Line Chart
            const earningsCtx = document.getElementById('earningsChart').getContext('2d');
            const earningsChart = new Chart(earningsCtx, {
                type: 'line',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                    datasets: [{
                        label: 'Monthly Earnings (₱)',
                        data: [18500, 19200, 21800, 22400, 23100, 24500, 25800, 26200, 27100, 27800, 28200, 28750],
                        borderColor: '#3B82F6',
                        backgroundColor: 'rgba(59, 130, 246, 0.1)',
                        borderWidth: 3,
                        fill: true,
                        tension: 0.4,
                        pointBackgroundColor: '#3B82F6',
                        pointBorderColor: '#ffffff',
                        pointBorderWidth: 2,
                        pointRadius: 6,
                        pointHoverRadius: 8
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    return '₱' + context.parsed.y.toLocaleString();
                                }
                            }
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                callback: function(value) {
                                    return '₱' + value.toLocaleString();
                                }
                            }
                        }
                    }
                }
            });

            // Course Ratings Bar Chart
            const ratingsCtx = document.getElementById('ratingsChart').getContext('2d');
            const ratingsChart = new Chart(ratingsCtx, {
                type: 'bar',
                data: {
                    labels: ['5 Stars', '4 Stars', '3 Stars', '2 Stars', '1 Star'],
                    datasets: [{
                        label: 'Number of Reviews',
                        data: [145, 89, 34, 12, 8],
                        backgroundColor: [
                            '#10B981',
                            '#3B82F6',
                            '#FBBF24',
                            '#F97316',
                            '#EF4444'
                        ],
                        borderColor: [
                            '#059669',
                            '#2563EB',
                            '#D97706',
                            '#EA580C',
                            '#DC2626'
                        ],
                        borderWidth: 1,
                        borderRadius: 6,
                        borderSkipped: false
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    return context.parsed.y + ' reviews';
                                }
                            }
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                stepSize: 25
                            }
                        }
                    }
                }
            });
        });

        function switchTab(tabName) {
            // Hide all tab contents
            const tabContents = document.querySelectorAll('.tab-content');
            tabContents.forEach(content => content.classList.remove('active'));

            // Remove active class from all tab buttons
            const tabButtons = document.querySelectorAll('.tab-nav-item');
            tabButtons.forEach(button => button.classList.remove('active'));

            // Show selected tab content
            document.getElementById(tabName).classList.add('active');

            // Add active class to clicked button
            event.target.classList.add('active');
        }

        function openCreateCourseModal() {
            document.getElementById('createCourseModal').style.display = 'block';
        }

        function closeCreateCourseModal() {
            document.getElementById('createCourseModal').style.display = 'none';
        }

        function addModule() {
            moduleCount++;
            const modulesContainer = document.getElementById('modulesContainer');
            const moduleItem = document.createElement('div');
            moduleItem.className = 'module-item';
            moduleItem.innerHTML = `
                <div class="module-header">
                    <span class="module-title">Module ${moduleCount}: New Module</span>
                    <button type="button" class="add-lesson-btn" onclick="addLesson(this)">Add Lesson</button>
                </div>
                <div class="lessons-container">
                    <!-- Lessons will be added here -->
                </div>
            `;
            modulesContainer.appendChild(moduleItem);
        }

        function addLesson(button) {
            const lessonsContainer = button.parentElement.nextElementSibling;
            const lessonItem = document.createElement('div');
            lessonItem.className = 'lesson-item';
            lessonItem.innerHTML = `
                <div>
                    <span class="lesson-title">New Lesson</span>
                    <span class="lesson-type">Video</span>
                </div>
                <div>
                    <button type="button">Edit</button>
                    <button type="button">Delete</button>
                </div>
            `;
            lessonsContainer.appendChild(lessonItem);
        }

        // Close modal when clicking outside
        window.onclick = function(event) {
            const modal = document.getElementById('createCourseModal');
            if (event.target == modal) {
                modal.style.display = 'none';
            }
        }

        // Handle form submission
        document.getElementById('createCourseForm').addEventListener('submit', function(e) {
            e.preventDefault();

            // Get form data
            const formData = new FormData(this);
            const courseData = {
                title: formData.get('courseTitle'),
                description: formData.get('courseDescription'),
                category: formData.get('courseCategory'),
                level: formData.get('courseLevel'),
                price: formData.get('coursePrice'),
                thumbnail: formData.get('courseThumbnail')
            };

            // Here you would typically send the data to the server
            console.log('Course Data:', courseData);

            // Show success message
            alert('Course created successfully!');

            // Close modal and reset form
            closeCreateCourseModal();
            this.reset();

            // Reset module count
            moduleCount = 1;
            document.getElementById('modulesContainer').innerHTML = `
                <div class="module-item">
                    <div class="module-header">
                        <span class="module-title">Module 1: Getting Started</span>
                        <button type="button" class="add-lesson-btn" onclick="addLesson(this)">Add Lesson</button>
                    </div>
                    <div class="lessons-container">
                        <!-- Lessons will be added here -->
                    </div>
                </div>
            `;
        });
    </script>
</body>
</html>
