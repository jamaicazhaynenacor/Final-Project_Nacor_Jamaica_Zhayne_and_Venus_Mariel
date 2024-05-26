<?php
session_start();
include 'db.php';

// Check if the user is logged in
if (!isset($_SESSION['username']) || $_SESSION['role'] != 'user') {
    header("Location: login.php");
    exit;
}

$username = $_SESSION['username'];

// Fetch the current user details
$stmt = $conn->prepare("SELECT username, email, phone FROM Users WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_username = trim($_POST['username']);
    $new_email = trim($_POST['email']);
    $new_phone = trim($_POST['phone']);
    $new_password = $_POST['password'];


    if (!filter_var($new_email, FILTER_VALIDATE_EMAIL)) {
        $error = "Invalid email format.";
    } else if (strlen($new_password) > 0 && strlen($new_password) < 8) {
        $error = "Password must be at least 8 characters long.";
    } else {

        if (!empty($new_password)) {
            $hashedPassword = password_hash($new_password, PASSWORD_BCRYPT);
            $stmt = $conn->prepare("UPDATE Users SET username = ?, password = ?, email = ?, phone = ? WHERE username = ?");
            $stmt->bind_param("sssss", $new_username, $hashedPassword, $new_email, $new_phone, $username);
        } else {
            $stmt = $conn->prepare("UPDATE Users SET username = ?, email = ?, phone = ? WHERE username = ?");
            $stmt->bind_param("ssss", $new_username, $new_email, $new_phone, $username);
        }

        if ($stmt->execute()) {
            $_SESSION['username'] = $new_username; // Update session username
            $success = "Account updated successfully.";
        } else {
            $error = "Error: " . $stmt->error;
        }
    }
    $stmt->close();
}

$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Privacy and Security</title>
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
            padding: 50px 50px;
            border-radius: 10px;
            box-shadow: 0 0 5px #DAD7CD, 0 0 15px #DAD7CD;
            backdrop-filter: blur(4px);
        }
        .dashboard h2 {
            margin-bottom: 20px;
            text-align: center;
        }
        .dashboard label {
            display: flex;
            margin-bottom: 10px;
        }
        .dashboard input {
            width: 92%;
            margin-bottom: 20px;
            border: 2px solid white;
            border-radius: 5px;
            padding: 10px;
            background-color: transparent;
            color: #fff;
        }
        .dashboard button {
            width: 100%;
            padding: 10px;
            background-color: transparent;
            color: #fff;
            border: 2px solid white;
            border-radius: 5px;
            cursor: pointer;
            transition: 0.6s ease-out;
            font-size: 18px;
        }
        .dashboard button:hover {
            background-color: #F1B6AC;
            color: #fff;
            box-shadow: 0 0 5px #DAD7CD, 0 0 15px #DAD7CD;
        }
        .dashboard a {
            display: block;
            margin-top: 10px;
            text-align: center;
            color: #fff;
            text-decoration: none;
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
            background-color: #F1B6AC;
            color: black;
            padding: 6px 0;
            text-align: center;
            position: relative;
            bottom: 0;
            width: 100%;
            height: 70px;
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
            color: black;
            text-decoration: none;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="content">
        <img src="pics/1.png">
        <div class="dashboard">
            <h2>Privacy and Security</h2>
            <?php if (isset($success)): ?>
                <p style="color: green;"><?php echo $success; ?></p>
            <?php endif; ?>
            <?php if (isset($error)): ?>
                <p style="color: red;"><?php echo $error; ?></p>
            <?php endif; ?>
            <form method="post" action="privacy.php">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($user['username']); ?>" required>
                
                <label for="password">Password (leave blank to keep current):</label>
                <input type="password" id="password" name="password">
                
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>
                
                <label for="phone">Phone:</label>
                <input type="text" id="phone" name="phone" value="<?php echo htmlspecialchars($user['phone']); ?>">
                
                <button type="submit">Update</button>
            </form>
            <a href="user_dashboard.php">Back to Dashboard</a>
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
