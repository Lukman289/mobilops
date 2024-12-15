<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
        }

        /* Sidebar Styles */
        .sidebar {
            width: 250px;
            background-color: #2c3e50;
            color: white;
            padding: 20px;
            position: fixed;
            height: 100%;
        }

        .sidebar .logo {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
            text-align: center;
        }

        .sidebar .nav-item {
            list-style: none;
            padding: 10px 0;
        }

        .sidebar .nav-item a {
            text-decoration: none;
            color: white;
            display: block;
            padding: 10px;
            border-radius: 5px;
        }

        .sidebar .nav-item a:hover {
            background-color: #34495e;
        }

        /* Main Content Styles */
        .main-content {
            margin-left: 250px;
            padding: 20px;
            width: 100%;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #ecf0f1;
            padding: 15px 20px;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .header .welcome-text {
            font-size: 18px;
            font-weight: 500;
        }

        .header .user-info {
            font-size: 16px;
        }

        .card {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-bottom: 20px;
        }

        .card h2 {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .card .card-content {
            font-size: 18px;
        }

        .card .card-footer {
            text-align: right;
            margin-top: 10px;
        }

        .btn {
            padding: 10px 20px;
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #2980b9;
        }

        .footer {
            text-align: center;
            font-size: 14px;
            padding: 10px;
            background-color: #ecf0f1;
            margin-top: 20px;
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <div class="logo">
            Admin Dashboard
        </div>
        <ul>
            <li class="nav-item"><a href="#">Dashboard</a></li>
            <li class="nav-item"><a href="#">Users</a></li>
            <li class="nav-item"><a href="#">Reports</a></li>
            <li class="nav-item"><a href="#">Settings</a></li>
            <li class="nav-item"><a href="{{route('logout')}}">Logout</a></li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Header -->
        <div class="header">
            <div class="welcome-text">Welcome, Admin</div>
            <div class="user-info">Logged in as: admin@example.com</div>
        </div>

        <!-- Dashboard Cards -->
        <div class="card">
            <h2>Total Users</h2>
            <div class="card-content">
                1,250
            </div>
            <div class="card-footer">
                <button class="btn">View Details</button>
            </div>
        </div>

        <div class="card">
            <h2>Reports Generated</h2>
            <div class="card-content">
                180
            </div>
            <div class="card-footer">
                <button class="btn">View Reports</button>
            </div>
        </div>

        <div class="card">
            <h2>System Status</h2>
            <div class="card-content">
                All systems are operational.
            </div>
            <div class="card-footer">
                <button class="btn">View Status</button>
            </div>
        </div>

        <!-- Footer -->
        <div class="footer">
            &copy; 2024 Your Company. All Rights Reserved.
        </div>
    </div>

</body>
</html>
