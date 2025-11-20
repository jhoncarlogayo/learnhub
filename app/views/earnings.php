<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Earnings & Payouts - LearnHub</title>
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

        .request-payout-btn {
            background-color: var(--color-secondary);
            color: white;
            border: none;
            padding: 12px 24px;
            border-radius: 8px;
            font-weight: 500;
            cursor: pointer;
            transition: background-color 0.2s;
        }

        .request-payout-btn:hover {
            background-color: #2563EB;
        }

        /* Earnings Sections */
        .earnings-sections {
            display: grid;
            gap: 30px;
        }

        .earnings-section {
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

        .section-icon.revenue {
            background-color: #10B981;
            color: white;
        }

        .section-icon.reports {
            background-color: #3B82F6;
            color: white;
        }

        .section-icon.payouts {
            background-color: #F59E0B;
            color: white;
        }

        .section-icon.accounts {
            background-color: #8B5CF6;
            color: white;
        }

        /* Total Revenue Card */
        .total-revenue {
            text-align: center;
            padding: 40px;
        }

        .revenue-amount {
            font-size: 3rem;
            font-weight: bold;
            color: var(--color-secondary);
            margin-bottom: 10px;
        }

        .revenue-label {
            font-size: 1.1rem;
            color: #6B7280;
        }

        /* Tables */
        .data-table {
            width: 100%;
            border-collapse: collapse;
        }

        .data-table th,
        .data-table td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #E5E7EB;
        }

        .data-table th {
            background-color: #F9FAFB;
            font-weight: 600;
            color: var(--color-text-dark);
        }

        .data-table tbody tr:hover {
            background-color: #F9FAFB;
        }

        .status-badge {
            padding: 4px 8px;
            border-radius: 12px;
            font-size: 0.8rem;
            font-weight: 500;
        }

        .status-pending {
            background-color: #FEF3C7;
            color: #92400E;
        }

        .status-completed {
            background-color: #D1FAE5;
            color: #065F46;
        }

        .status-processing {
            background-color: #DBEAFE;
            color: #1E40AF;
        }

        /* Payment Accounts */
        .payment-accounts {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }

        .account-card {
            border: 1px solid #E5E7EB;
            border-radius: 8px;
            padding: 20px;
            text-align: center;
        }

        .account-icon {
            width: 50px;
            height: 50px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            margin: 0 auto 15px;
        }

        .account-icon.stripe {
            background-color: #635BFF;
            color: white;
        }

        .account-icon.paypal {
            background-color: #0070BA;
            color: white;
        }

        .account-name {
            font-weight: 600;
            margin-bottom: 10px;
        }

        .account-status {
            margin-bottom: 15px;
        }

        .status-connected {
            background-color: var(--color-positive);
            color: white;
        }

        .status-not-connected {
            background-color: #F56565;
            color: white;
        }

        .connect-btn {
            background-color: var(--color-secondary);
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 6px;
            cursor: pointer;
            font-weight: 500;
            transition: background-color 0.2s;
        }

        .connect-btn:hover {
            background-color: #2563EB;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .dashboard-container {
                grid-template-columns: 1fr;
            }

            .sidebar {
                display: none;
            }

            .data-table {
                font-size: 0.9rem;
            }

            .data-table th,
            .data-table td {
                padding: 8px 10px;
            }

            .revenue-amount {
                font-size: 2.5rem;
            }

            .payment-accounts {
                grid-template-columns: 1fr;
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
                <a href="/profile" class="nav-item"><i class="fas fa-user-circle"></i> Profile</a>
                <span class="nav-item active"><i class="fas fa-money-bill-wave"></i> Earnings</span>
            </nav>
        </aside>

        <main class="main-content">
            <header class="header">
                <div class="search-bar">
                    <i class="fas fa-search"></i>
                    <input type="text" placeholder="Search earnings...">
                </div>
                <div class="user-info">
                    <i class="fas fa-bell notification-icon"></i>
                    <span>Jhon Carlo Gayo</span>
                </div>
            </header>

            <div class="page-header">
                <h1>Earnings & Payouts</h1>
                <button class="request-payout-btn">
                    <i class="fas fa-plus"></i> Request Payout
                </button>
            </div>

            <div class="earnings-sections">
                <!-- Total Revenue Section -->
                <div class="earnings-section">
                    <div class="section-header">
                        <div class="section-title">
                            <div class="section-icon revenue">
                                <i class="fas fa-dollar-sign"></i>
                            </div>
                            Total Revenue
                        </div>
                    </div>

                    <div class="total-revenue">
                        <div class="revenue-amount">₱ 125,430.00</div>
                        <div class="revenue-label">Lifetime earnings from all courses</div>
                    </div>
                </div>

                <!-- Monthly Earning Reports Section -->
                <div class="earnings-section">
                    <div class="section-header">
                        <div class="section-title">
                            <div class="section-icon reports">
                                <i class="fas fa-chart-bar"></i>
                            </div>
                            Monthly Earning Reports
                        </div>
                    </div>

                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>Month</th>
                                <th>Students Enrolled</th>
                                <th>Revenue Generated</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>December 2023</td>
                                <td>45</td>
                                <td>₱ 15,200.00</td>
                            </tr>
                            <tr>
                                <td>November 2023</td>
                                <td>38</td>
                                <td>₱ 12,800.00</td>
                            </tr>
                            <tr>
                                <td>October 2023</td>
                                <td>52</td>
                                <td>₱ 18,500.00</td>
                            </tr>
                            <tr>
                                <td>September 2023</td>
                                <td>41</td>
                                <td>₱ 14,300.00</td>
                            </tr>
                            <tr>
                                <td>August 2023</td>
                                <td>33</td>
                                <td>₱ 11,900.00</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Payout Requests Section -->
                <div class="earnings-section">
                    <div class="section-header">
                        <div class="section-title">
                            <div class="section-icon payouts">
                                <i class="fas fa-credit-card"></i>
                            </div>
                            Payout Requests
                        </div>
                    </div>

                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>Request ID</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>#PR-2023-012</td>
                                <td>₱ 5,000.00</td>
                                <td><span class="status-badge status-completed">Completed</span></td>
                                <td>Dec 15, 2023</td>
                            </tr>
                            <tr>
                                <td>#PR-2023-011</td>
                                <td>₱ 8,500.00</td>
                                <td><span class="status-badge status-processing">Processing</span></td>
                                <td>Dec 10, 2023</td>
                            </tr>
                            <tr>
                                <td>#PR-2023-010</td>
                                <td>₱ 3,200.00</td>
                                <td><span class="status-badge status-pending">Pending</span></td>
                                <td>Dec 5, 2023</td>
                            </tr>
                            <tr>
                                <td>#PR-2023-009</td>
                                <td>₱ 6,800.00</td>
                                <td><span class="status-badge status-completed">Completed</span></td>
                                <td>Nov 28, 2023</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Connected Payment Accounts Section -->
                <div class="earnings-section">
                    <div class="section-header">
                        <div class="section-title">
                            <div class="section-icon accounts">
                                <i class="fas fa-link"></i>
                            </div>
                            Connected Payment Accounts
                        </div>
                    </div>

                    <div class="payment-accounts">
                        <div class="account-card">
                            <div class="account-icon stripe">
                                <i class="fab fa-stripe-s"></i>
                            </div>
                            <div class="account-name">Stripe</div>
                            <div class="account-status">
                                <span class="status-badge status-connected">Connected</span>
                            </div>
                            <button class="connect-btn" disabled>Connected</button>
                        </div>

                        <div class="account-card">
                            <div class="account-icon paypal">
                                <i class="fab fa-paypal"></i>
                            </div>
                            <div class="account-name">PayPal</div>
                            <div class="account-status">
                                <span class="status-badge status-not-connected">Not Connected</span>
                            </div>
                            <button class="connect-btn">Connect PayPal</button>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
