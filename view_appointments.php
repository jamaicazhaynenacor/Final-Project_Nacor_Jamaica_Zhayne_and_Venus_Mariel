<?php
session_start();

// Check if the admin is logged in, if not, redirect to login page
if (!isset($_SESSION['admin_username'])) {
    header("Location: admin_login.php");
    exit;
}

include 'db.php';
include 'appointments_table.php';

// Fetch appointment records from the database
$sql = "SELECT * FROM Appointments";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Appointments</title>
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
            background-image:  linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)), url('pics/milad-fakurian-IQN_eAgUyI4-unsplash.jpg');
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
        .appointments {
            background: transparent;
            border: 2px solid rgba(255, 255, 255, .2);
            padding: 50px 50px;
            border-radius: 10px;
            box-shadow: 0 0 5px #DAD7CD, 0 0 15px #DAD7CD;
            backdrop-filter: blur(4px);
        }
        .appointments h2 {
            margin-bottom: 20px;
            text-align: center;
        }
        .appointments table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .appointments th, .appointments td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        .appointments th {
            background-color: #f2f2f2;
            color: #000;
        }
        .appointments a {
            color: #fff;
            text-decoration: underline;
        }
        .appointments a:hover {
            color: #ddd;
        }
         footer {
        background-color: #F1B6AC;
        color: #fff;
        padding: 6px 0;
        text-align: center;
        position: relative;
        bottom: 0;
        width: 100%;
        height: 191px;
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
    }
    footer .footer-content p,
    footer .footer-content a {
        color: #fff;
        text-decoration: none;
        font-size: 14px;
    }
    footer .footer-content a:hover {
        text-decoration: underline;
    }
    footer .social-media {
        display: flex;
        justify-content: center;
        margin-top: 10px;
    }
    footer .social-media a {
        color: #fff;
        font-size: 18px;
        margin: 0 8px;
        transition: 0.6s ease-out;
    }
    footer .social-media a:hover {
        color: #ddd;
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
    </style>
</head>
<body>
    <div class="content">
        <img src="pics/logo.png">
        <div class="appointments">
            <h2>View Appointments</h2>
            <table>
                <thead>
                    <tr>
                        <th>Appointment ID</th>
                        <th>User ID</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Service</th>
                        <!-- Add more columns as needed -->
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row['appointment_id'] . "</td>";
                            echo "<td>" . $row['user_id'] . "</td>";
                            echo "<td>" . $row['date'] . "</td>";
                            echo "<td>" . $row['time'] . "</td>";
                            echo "<td>" . $row['service'] . "</td>";
                            // Add more cells for additional columns
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5'>No appointments found.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
            <p><a href="admin_dashboard.php">Back to Dashboard</a></p>
        </div>
    </div>
    <footer>
        <div class="footer-content">
            <div>
                <h3>About Mayon veterinary Care Specialist Co</h3>
                <p>Providing passionate pet care since 2008</p>
            </div>
            <div>
                <h3>Contact Us</h3>
                <p>Phone: 0938 866 4009</p>
                <p>Address: 1st Floor ARNISP Building, P. Burgos cor MH del Pilar St, Sipi, Daraga, Albay, Daraga, Philippines</p>
            </div>
        </div>
        <div class="social-media">
            <a href="https://www.facebook.com/mayonveterinarycarespecialists"><i class="fab fa-facebook"></i></a>
        </div>
    </footer>
</body>
</html>
