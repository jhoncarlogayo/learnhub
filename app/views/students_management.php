<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students Management - LearnHub</title>
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

        .filters {
            display: flex;
            gap: 15px;
            align-items: center;
        }

        .filter-select {
            padding: 8px 12px;
            border: 1px solid #D1D5DB;
            border-radius: 6px;
            background-color: white;
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

        .student-count {
            background-color: var(--color-secondary);
            color: white;
            padding: 4px 8px;
            border-radius: 12px;
            font-size: 0.8rem;
            font-weight: 500;
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

        .view-students-btn {
            width: 100%;
            background-color: var(--color-secondary);
            color: white;
            border: none;
            padding: 10px;
            border-radius: 6px;
            font-weight: 500;
            cursor: pointer;
            transition: background-color 0.2s;
        }

        .view-students-btn:hover {
            background-color: #2563EB;
        }

        /* Students Table */
        .students-section {
            background-color: var(--color-card-bg);
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .section-title {
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--color-text-dark);
        }

        .back-btn {
            background-color: #6B7280;
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 0.9rem;
        }

        .back-btn:hover {
            background-color: #4B5563;
        }

        .students-table {
            width: 100%;
            border-collapse: collapse;
        }

        .students-table th,
        .students-table td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #E5E7EB;
        }

        .students-table th {
            background-color: #F9FAFB;
            font-weight: 600;
            color: var(--color-text-dark);
        }

        .student-info {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .student-avatar {
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

        .student-details h4 {
            margin: 0;
            font-size: 0.9rem;
            font-weight: 500;
        }

        .student-details p {
            margin: 0;
            font-size: 0.8rem;
            color: #6B7280;
        }

        .progress-bar {
            width: 100px;
            height: 8px;
            background-color: #E5E7EB;
            border-radius: 4px;
            overflow: hidden;
        }

        .progress-fill {
            height: 100%;
            background-color: var(--color-positive);
            border-radius: 4px;
        }

        .progress-text {
            font-size: 0.8rem;
            color: #6B7280;
            margin-top: 4px;
        }

        .quiz-score {
            font-weight: 500;
        }

        .score-high { color: var(--color-positive); }
        .score-medium { color: var(--color-warning); }
        .score-low { color: var(--color-negative); }

        .action-buttons {
            display: flex;
            gap: 8px;
        }

        .action-btn {
            padding: 6px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 0.8rem;
            font-weight: 500;
            transition: background-color 0.2s;
        }

        .message-btn {
            background-color: var(--color-secondary);
            color: white;
        }

        .message-btn:hover {
            background-color: #2563EB;
        }

        .remove-btn {
            background-color: var(--color-negative);
            color: white;
        }

        .remove-btn:hover {
            background-color: #DC2626;
        }

        .grant-btn {
            background-color: var(--color-positive);
            color: white;
        }

        .grant-btn:hover {
            background-color: #059669;
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
            max-width: 500px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
            animation: modalSlideIn 0.3s ease-out;
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
            margin-bottom: 20px;
            font-size: 1.5rem;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-weight: 600;
            margin-bottom: 8px;
            color: var(--color-text-dark);
        }

        .form-group textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #D1D5DB;
            border-radius: 6px;
            resize: vertical;
            min-height: 100px;
            font-family: inherit;
        }

        .modal-buttons {
            display: flex;
            gap: 10px;
            justify-content: flex-end;
            margin-top: 20px;
        }

        .modal-btn {
            padding: 10px 20px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-weight: 500;
            transition: background-color 0.2s;
        }

        .cancel-btn {
            background-color: #6B7280;
            color: white;
        }

        .cancel-btn:hover {
            background-color: #4B5563;
        }

        .send-btn {
            background-color: var(--color-secondary);
            color: white;
        }

        .send-btn:hover {
            background-color: #2563EB;
        }

        .confirm-btn {
            background-color: var(--color-negative);
            color: white;
        }

        .confirm-btn:hover {
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

            .filters {
                flex-direction: column;
                align-items: stretch;
            }

            .students-table {
                font-size: 0.9rem;
            }

            .action-buttons {
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
                <button class="create-course-btn sidebar-btn" onclick="openCreateCourseModal()">
                    <i class="fas fa-plus"></i> Create New Course
                </button>
                <span class="nav-item active"><i class="fas fa-users"></i> Students</span>
                <a href="/course-management" class="nav-item"><i class="fas fa-book"></i> Course Management</a>
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
                    <input type="text" placeholder="Search students, courses...">
                </div>
                <div class="user-info">
                    <i class="fas fa-bell notification-icon"></i>
                    <span>Jhon Carlo Gayo</span>
                </div>
            </header>

            <!-- Courses Overview -->
            <div id="coursesOverview">
                <div class="page-header">
                    <h1>Students Management</h1>
                    <div class="filters">
                        <select class="filter-select" id="courseFilter">
                            <option value="all">All Courses</option>
                            <option value="web-dev">Web Development Bootcamp</option>
                            <option value="data-science">Data Science Fundamentals</option>
                            <option value="python">Python Programming</option>
                            <option value="javascript">JavaScript Fundamentals</option>
                        </select>
                        <select class="filter-select" id="statusFilter">
                            <option value="all">All Students</option>
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>
                </div>

                <div class="courses-grid">
                    <div class="course-card">
                        <div class="course-header">
                            <h3 class="course-title">Web Development Bootcamp</h3>
                            <span class="student-count">156 students</span>
                        </div>
                        <div class="course-stats">
                            <div class="stat-item">
                                <div class="stat-value">89%</div>
                                <div class="stat-label">Avg Progress</div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-value">4.6</div>
                                <div class="stat-label">Avg Quiz Score</div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-value">12</div>
                                <div class="stat-label">This Month</div>
                            </div>
                        </div>
                        <button class="view-students-btn" onclick="showStudents('web-dev')">
                            <i class="fas fa-users"></i> View Students
                        </button>
                    </div>

                    <div class="course-card">
                        <div class="course-header">
                            <h3 class="course-title">Data Science Fundamentals</h3>
                            <span class="student-count">98 students</span>
                        </div>
                        <div class="course-stats">
                            <div class="stat-item">
                                <div class="stat-value">76%</div>
                                <div class="stat-label">Avg Progress</div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-value">4.2</div>
                                <div class="stat-label">Avg Quiz Score</div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-value">8</div>
                                <div class="stat-label">This Month</div>
                            </div>
                        </div>
                        <button class="view-students-btn" onclick="showStudents('data-science')">
                            <i class="fas fa-users"></i> View Students
                        </button>
                    </div>

                    <div class="course-card">
                        <div class="course-header">
                            <h3 class="course-title">Python Programming</h3>
                            <span class="student-count">134 students</span>
                        </div>
                        <div class="course-stats">
                            <div class="stat-item">
                                <div class="stat-value">82%</div>
                                <div class="stat-label">Avg Progress</div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-value">4.4</div>
                                <div class="stat-label">Avg Quiz Score</div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-value">15</div>
                                <div class="stat-label">This Month</div>
                            </div>
                        </div>
                        <button class="view-students-btn" onclick="showStudents('python')">
                            <i class="fas fa-users"></i> View Students
                        </button>
                    </div>

                    <div class="course-card">
                        <div class="course-header">
                            <h3 class="course-title">JavaScript Fundamentals</h3>
                            <span class="student-count">87 students</span>
                        </div>
                        <div class="course-stats">
                            <div class="stat-item">
                                <div class="stat-value">91%</div>
                                <div class="stat-label">Avg Progress</div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-value">4.7</div>
                                <div class="stat-label">Avg Quiz Score</div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-value">6</div>
                                <div class="stat-label">This Month</div>
                            </div>
                        </div>
                        <button class="view-students-btn" onclick="showStudents('javascript')">
                            <i class="fas fa-users"></i> View Students
                        </button>
                    </div>
                </div>
            </div>

            <!-- Students List -->
            <div id="studentsList" style="display: none;">
                <div class="section-header">
                    <h2 class="section-title" id="courseTitle">Web Development Bootcamp - Students</h2>
                    <button class="back-btn" onclick="showCoursesOverview()">
                        <i class="fas fa-arrow-left"></i> Back to Courses
                    </button>
                </div>

                <div class="students-section">
                    <table class="students-table">
                        <thead>
                            <tr>
                                <th>Student</th>
                                <th>Progress</th>
                                <th>Quiz Score</th>
                                <th>Last Activity</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="studentsTableBody">
                            <!-- Students will be populated here -->
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>

    <!-- Message Modal -->
    <div id="messageModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeMessageModal()">&times;</span>
            <h2>Message Student</h2>
            <div class="form-group">
                <label for="studentName">To: <span id="studentName"></span></label>
            </div>
            <div class="form-group">
                <label for="messageSubject">Subject</label>
                <input type="text" id="messageSubject" placeholder="Enter subject" required>
            </div>
            <div class="form-group">
                <label for="messageContent">Message</label>
                <textarea id="messageContent" placeholder="Type your message here..." required></textarea>
            </div>
            <div class="modal-buttons">
                <button class="modal-btn cancel-btn" onclick="closeMessageModal()">Cancel</button>
                <button class="modal-btn send-btn" onclick="sendMessage()">Send Message</button>
            </div>
        </div>
    </div>

    <!-- Remove Student Modal -->
    <div id="removeModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeRemoveModal()">&times;</span>
            <h2>Remove Student</h2>
            <p>Are you sure you want to remove <strong id="removeStudentName"></strong> from this course? This action cannot be undone.</p>
            <div class="modal-buttons">
                <button class="modal-btn cancel-btn" onclick="closeRemoveModal()">Cancel</button>
                <button class="modal-btn confirm-btn" onclick="confirmRemove()">Remove Student</button>
            </div>
        </div>
    </div>

    <script>
        let currentCourse = '';
        let currentStudent = '';

        // Sample student data
        const studentsData = {
            'web-dev': [
                { id: 1, name: 'Alice Johnson', email: 'alice@email.com', progress: 95, quizScore: 4.8, lastActivity: '2 hours ago', status: 'active' },
                { id: 2, name: 'Bob Smith', email: 'bob@email.com', progress: 78, quizScore: 4.2, lastActivity: '1 day ago', status: 'active' },
                { id: 3, name: 'Carol Davis', email: 'carol@email.com', progress: 88, quizScore: 4.6, lastActivity: '3 hours ago', status: 'active' },
                { id: 4, name: 'David Wilson', email: 'david@email.com', progress: 45, quizScore: 3.8, lastActivity: '1 week ago', status: 'inactive' },
                { id: 5, name: 'Eva Brown', email: 'eva@email.com', progress: 92, quizScore: 4.9, lastActivity: '5 hours ago', status: 'active' }
            ],
            'data-science': [
                { id: 6, name: 'Frank Miller', email: 'frank@email.com', progress: 82, quizScore: 4.4, lastActivity: '4 hours ago', status: 'active' },
                { id: 7, name: 'Grace Lee', email: 'grace@email.com', progress: 67, quizScore: 4.0, lastActivity: '2 days ago', status: 'active' },
                { id: 8, name: 'Henry Taylor', email: 'henry@email.com', progress: 91, quizScore: 4.7, lastActivity: '1 hour ago', status: 'active' }
            ],
            'python': [
                { id: 9, name: 'Ivy Chen', email: 'ivy@email.com', progress: 85, quizScore: 4.5, lastActivity: '6 hours ago', status: 'active' },
                { id: 10, name: 'Jack Anderson', email: 'jack@email.com', progress: 73, quizScore: 4.1, lastActivity: '3 days ago', status: 'active' }
            ],
            'javascript': [
                { id: 11, name: 'Karen White', email: 'karen@email.com', progress: 96, quizScore: 4.9, lastActivity: '1 hour ago', status: 'active' },
                { id: 12, name: 'Leo Garcia', email: 'leo@email.com', progress: 89, quizScore: 4.6, lastActivity: '8 hours ago', status: 'active' }
            ]
        };

        function showStudents(courseId) {
            currentCourse = courseId;
            const courseNames = {
                'web-dev': 'Web Development Bootcamp',
                'data-science': 'Data Science Fundamentals',
                'python': 'Python Programming',
                'javascript': 'JavaScript Fundamentals'
            };

            document.getElementById('courseTitle').textContent = courseNames[courseId] + ' - Students';
            document.getElementById('coursesOverview').style.display = 'none';
            document.getElementById('studentsList').style.display = 'block';

            populateStudentsTable(courseId);
        }

        function showCoursesOverview() {
            document.getElementById('studentsList').style.display = 'none';
            document.getElementById('coursesOverview').style.display = 'block';
        }

        function populateStudentsTable(courseId) {
            const tbody = document.getElementById('studentsTableBody');
            tbody.innerHTML = '';

            const students = studentsData[courseId] || [];

            students.forEach(student => {
                const row = document.createElement('tr');

                // Student Info
                const studentCell = document.createElement('td');
                studentCell.innerHTML = `
                    <div class="student-info">
                        <div class="student-avatar">${student.name.split(' ').map(n => n[0]).join('')}</div>
                        <div class="student-details">
                            <h4>${student.name}</h4>
                            <p>${student.email}</p>
                        </div>
                    </div>
                `;

                // Progress
                const progressCell = document.createElement('td');
                progressCell.innerHTML = `
                    <div class="progress-bar">
                        <div class="progress-fill" style="width: ${student.progress}%"></div>
                    </div>
                    <div class="progress-text">${student.progress}%</div>
                `;

                // Quiz Score
                const scoreCell = document.createElement('td');
                const scoreClass = student.quizScore >= 4.5 ? 'score-high' :
                                 student.quizScore >= 4.0 ? 'score-medium' : 'score-low';
                scoreCell.innerHTML = `<span class="quiz-score ${scoreClass}">${student.quizScore}/5.0</span>`;

                // Last Activity
                const activityCell = document.createElement('td');
                activityCell.textContent = student.lastActivity;

                // Status
                const statusCell = document.createElement('td');
                const statusClass = student.status === 'active' ? 'positive' : 'negative';
                statusCell.innerHTML = `<span style="color: var(--color-${statusClass === 'positive' ? 'positive' : 'negative'})">${student.status.charAt(0).toUpperCase() + student.status.slice(1)}</span>`;

                // Actions
                const actionsCell = document.createElement('td');
                actionsCell.innerHTML = `
                    <div class="action-buttons">
                        <button class="action-btn message-btn" onclick="openMessageModal('${student.name}', ${student.id})">
                            <i class="fas fa-envelope"></i>
                        </button>
                        <button class="action-btn grant-btn" onclick="toggleAccess(${student.id})">
                            <i class="fas fa-key"></i>
                        </button>
                        <button class="action-btn remove-btn" onclick="openRemoveModal('${student.name}', ${student.id})">
                            <i class="fas fa-user-times"></i>
                        </button>
                    </div>
                `;

                row.appendChild(studentCell);
                row.appendChild(progressCell);
                row.appendChild(scoreCell);
                row.appendChild(activityCell);
                row.appendChild(statusCell);
                row.appendChild(actionsCell);

                tbody.appendChild(row);
            });
        }

        function openMessageModal(studentName, studentId) {
            currentStudent = studentId;
            document.getElementById('studentName').textContent = studentName;
            document.getElementById('messageModal').style.display = 'block';
        }

        function closeMessageModal() {
            document.getElementById('messageModal').style.display = 'none';
            document.getElementById('messageSubject').value = '';
            document.getElementById('messageContent').value = '';
        }

        function sendMessage() {
            const subject = document.getElementById('messageSubject').value;
            const content = document.getElementById('messageContent').value;

            if (!subject || !content) {
                alert('Please fill in both subject and message.');
                return;
            }

            // Here you would send the message to the backend
            alert('Message sent successfully!');
            closeMessageModal();
        }

        function openRemoveModal(studentName, studentId) {
            currentStudent = studentId;
            document.getElementById('removeStudentName').textContent = studentName;
            document.getElementById('removeModal').style.display = 'block';
        }

        function closeRemoveModal() {
            document.getElementById('removeModal').style.display = 'none';
        }

        function confirmRemove() {
            // Here you would call the backend to remove the student
            alert('Student removed successfully!');
            closeRemoveModal();

            // Remove from local data and refresh table
            if (studentsData[currentCourse]) {
                studentsData[currentCourse] = studentsData[currentCourse].filter(s => s.id !== currentStudent);
                populateStudentsTable(currentCourse);
            }
        }

        function toggleAccess(studentId) {
            // Here you would toggle access in the backend
            alert('Access toggled successfully!');
        }

        function openCreateCourseModal() {
            // This would open the create course modal from the main dashboard
            alert('Create Course modal would open here');
        }

        // Close modals when clicking outside
        window.onclick = function(event) {
            const messageModal = document.getElementById('messageModal');
            const removeModal = document.getElementById('removeModal');

            if (event.target == messageModal) {
                closeMessageModal();
            }
            if (event.target == removeModal) {
                closeRemoveModal();
            }
        }
    </script>
</body>
</html>
