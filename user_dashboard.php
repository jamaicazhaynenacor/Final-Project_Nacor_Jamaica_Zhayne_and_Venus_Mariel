<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username']) || $_SESSION['role'] != 'user') {
    header("Location: login.php");
    exit;
}

// Logout functionality
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            font-family: Century Gothic;
        }
        html, body {
            height: 100%;
            margin: 0;
        }
        body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            background-color: #a68a64;
            background-size: cover;
            background-position: center;
            color: #fff;
        }
        .content {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .dashboard {
            background: transparent;
            border: 2px solid rgba(255, 255, 255, .2);
            padding: 40px 40px;
            border-radius: 10px;
            box-shadow: 0 0 5px #DAD7CD, 0 0 0px #DAD7CD;
            backdrop-filter: blur(4px);
        }
        .dashboard h2 {
            margin-bottom: 20px;
            text-align: center;
            color: black;
        }
        .dashboard a {
            display: block;
            margin-bottom: 10px;
            padding: 10px 15px;
            background-color: transparent;
            color: #fff;
            border: 2px solid white;
            border-radius: 5px;
            text-decoration: none;
            text-align: center;
            transition: 0.6s ease-out;
        }
        .dashboard a:hover {
            background-color: #eddea4;
            color: #fff;
        }
        img {
        position: absolute;
        top: 0;
        left: 0;
        margin: 0;
        margin-top: -70px;
        width: 300px;
        height: auto; 
    }
    footer {
        background-color: #c2c5aa;
        color: #fff;
        padding: 3px 0;
        text-align: center;
        position: relative;
        bottom: 0;
        width: 100%;
        height: 100px;
    }
    footer .footer-content {
        display: flex;
        justify-content: space-around;
        max-width: 1200px;
        margin: auto;
        flex-wrap: wrap;
    }
    footer .footer-content div {
        flex: 1;
        margin: 10px;
    }
    footer .footer-content h3 {
        margin-bottom: 5px;
        font-size: 16px;
        color: black;
    }
    footer .footer-content p,
    footer .footer-content a {
        color: black;
        text-decoration: none;
        font-size: 14px;
    }
    footer .footer-content a:hover {
        text-decoration: underline;
    }
    }
    </style>
</head>
<body>
    <div class="content">
        <img src="pics/logo.png">
        <div class="dashboard">
            <h2>Welcome to the User Dashboard, <?php echo $_SESSION['username']; ?>!</h2>
            <a href="make_appointment.php">Make an Appointment</a>
            <a href="privacy.php">Privacy and Security</a>
            <a href="user_dashboard.php?logout=true">Logout</a>

            <!-- User-specific functionalities here -->
        </div>
    </div>
    <footer>
        <div class="footer-content">
            <div>
            <h3>Walgreens Healthcare Clinic</h3>
            <p>United States (2007)</p>
            </div>
    
    </footer>
</body>
</html>
