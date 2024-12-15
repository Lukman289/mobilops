<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Validator</title>
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

        /* Form Styles */
        .form-container {
            background-color: white;
            border-radius: 8px;
            padding: 30px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .input-group {
            margin-bottom: 20px;
        }

        .input-group label {
            font-size: 16px;
            margin-bottom: 5px;
            display: block;
        }

        .input-group input {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .input-group input:focus {
            border-color: #3498db;
            outline: none;
        }

        .input-group .error {
            color: red;
            font-size: 12px;
            margin-top: 5px;
        }

        .btn {
            padding: 12px;
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #2980b9;
        }

        /* Validation Results */
        .validation-results {
            background-color: #fff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .validation-results h3 {
            font-size: 18px;
            margin-bottom: 15px;
        }

        .validation-results table {
            width: 100%;
            border-collapse: collapse;
        }

        .validation-results table th, .validation-results table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
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
            Validator Dashboard
        </div>
        <ul>
            <li class="nav-item"><a href="#">Dashboard</a></li>
            <li class="nav-item"><a href="#">Validator</a></li>
            <li class="nav-item"><a href="#">Settings</a></li>
            <li class="nav-item"><a href="{{route('logout')}}">Logout</a></li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Header -->
        <div class="header">
            <div class="welcome-text">Welcome, Validator</div>
        </div>

        <!-- Validator Form -->
        <div class="form-container">
            <h2>Validator Form</h2>
            <form id="validatorForm" onsubmit="return validateForm()">
                <div class="input-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" placeholder="Enter your username">
                    <div id="usernameError" class="error"></div>
                </div>

                <div class="input-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="Enter your email">
                    <div id="emailError" class="error"></div>
                </div>

                <div class="input-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Enter your password">
                    <div id="passwordError" class="error"></div>
                </div>

                <button type="submit" class="btn">Submit</button>
            </form>
        </div>

        <!-- Validation Results -->
        <div class="validation-results" id="validationResults" style="display:none;">
            <h3>Validation Results</h3>
            <table>
                <thead>
                    <tr>
                        <th>Field</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody id="validationTable">
                    <!-- Validation results will be dynamically inserted here -->
                </tbody>
            </table>
        </div>

        <!-- Footer -->
        <div class="footer">
            &copy; 2024 Your Company. All Rights Reserved.
        </div>
    </div>

    <script>
        function validateForm() {
            let valid = true;

            // Clear previous errors
            document.getElementById("usernameError").innerHTML = '';
            document.getElementById("emailError").innerHTML = '';
            document.getElementById("passwordError").innerHTML = '';

            // Clear previous validation results
            document.getElementById("validationResults").style.display = 'none';
            document.getElementById("validationTable").innerHTML = '';

            // Validate Username
            const username = document.getElementById("username").value;
            let usernameStatus = "Valid";
            if (username === '') {
                document.getElementById("usernameError").innerHTML = 'Username is required';
                usernameStatus = "Invalid";
                valid = false;
            }

            // Validate Email
            const email = document.getElementById("email").value;
            const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
            let emailStatus = "Valid";
            if (email === '') {
                document.getElementById("emailError").innerHTML = 'Email is required';
                emailStatus = "Invalid";
                valid = false;
            } else if (!emailPattern.test(email)) {
                document.getElementById("emailError").innerHTML = 'Invalid email format';
                emailStatus = "Invalid";
                valid = false;
            }

            // Validate Password
            const password = document.getElementById("password").value;
            let passwordStatus = "Valid";
            if (password === '') {
                document.getElementById("passwordError").innerHTML = 'Password is required';
                passwordStatus = "Invalid";
                valid = false;
            }

            // Show validation results
            if (valid) {
                document.getElementById("validationResults").style.display = 'block';
                const validationTable = document.getElementById("validationTable");

                // Append validation results
                const rows = [
                    { field: "Username", status: usernameStatus },
                    { field: "Email", status: emailStatus },
                    { field: "Password", status: passwordStatus }
                ];

                rows.forEach(row => {
                    const tr = document.createElement("tr");
                    tr.innerHTML = `<td>${row.field}</td><td>${row.status}</td>`;
                    validationTable.appendChild(tr);
                });
            }

            return valid;
        }
    </script>

</body>
</html>
