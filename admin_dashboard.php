<?php
session_start();

if (!isset($_SESSION['admin_username'])) {
    header("Location: admin_login.php");
    exit;
}

include 'db.php';

if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: admin_login.php");
    exit;
}

$sql = "SELECT * FROM Users";
$result = $conn->query($sql);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Delete user
    if (isset($_POST['delete_user'])) {
        $user_id = $_POST['user_id'];

        // Delete associated appointments first
        $delete_appointments_sql = "DELETE FROM Appointments WHERE user_id=$user_id";
        if ($conn->query($delete_appointments_sql) === TRUE) {
            // Appointments deleted successfully, now delete the user
            $delete_user_sql = "DELETE FROM Users WHERE user_id=$user_id";
            if ($conn->query($delete_user_sql) === TRUE) {
                echo "User deleted successfully.";
                header("Location: admin_dashboard.php");
                exit;
            } else {
                echo "Error deleting user: " . $conn->error;
            }
        } else {
            echo "Error deleting appointments: " . $conn->error;
        }
    }

    // Update user information
    if (isset($_POST['update_user'])) {
        $user_id = $_POST['user_id'];
        $new_username = $_POST['username'];
        $new_email = $_POST['email'];
        $new_phone = $_POST['phone'];
        $new_password = password_hash($_POST['password'], PASSWORD_BCRYPT);

        // Check if password is provided and update accordingly
        if (!empty($_POST['password'])) {
            $update_sql = "UPDATE Users SET username='$new_username', email='$new_email', phone='$new_phone', password='$new_password' WHERE user_id=$user_id";
        } else {
            $update_sql = "UPDATE Users SET username='$new_username', email='$new_email', phone='$new_phone' WHERE user_id=$user_id";
        }

        if ($conn->query($update_sql) === TRUE) {
            echo "User information updated successfully.";
            header("Location: admin_dashboard.php");
            exit;
        } else {
            echo "Error updating user information: " . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style type="text/css">
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
            padding: 70px 70px;
            border-radius: 10px;
            box-shadow: 0 0 5px #DAD7CD, 0 0 15px #DAD7CD;
            backdrop-filter: blur(4px);
            color: #fff;
            width: 80%;
        }
        .dashboard h2 {
            margin-bottom: 20px;
            text-align: center;
        }
        .dashboard table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .dashboard th, .dashboard td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        .dashboard th {
            background-color: #f2f2f2;
            color: #000;
        }
        .dashboard form {
            display: inline;
        }
        .dashboard button {
            padding: 5px 10px;
            background-color: transparent;
            color: #fff;
            border: 2px solid white;
            border-radius: 5px;
            cursor: pointer;
            transition: 0.6s ease-out;
        }
        .dashboard button:hover {
            background-color: #F1B6AC;
            color: #fff;
            box-shadow: 0 0 5px #DAD7CD, 0 0 15px #DAD7CD;
        }
        .edit-form {
            margin-top: 20px;
        }
        .edit-form label {
            display: block;
            margin-bottom: 5px;
        }
        .edit-form input {
            width: calc(100% - 24px);
            margin-bottom: 10px;
            padding: 10px;
            border: 2px solid white;
            border-radius: 5px;
            background-color: transparent;
            color: #fff;
        }
        .edit-form button {
            margin-top: 10px;
            width: 100%;
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
            background-color: #e6ccb2;
            color: black;
            padding: 6px 0;
            text-align: center;
            width: 100%;
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
            <h2>Welcome, <?php echo $_SESSION['admin_username']; ?>!</h2>
            <h2>Edit User</h2>
            <table>
                <tr>
                    <th>User ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Action</th>
                </tr>
                <?php while ($row = $result->fetch_assoc()) : ?>
                    <tr>
                        <td><?php echo $row['user_id']; ?></td>
                        <td><?php echo $row['username']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['phone']; ?></td>
                        <td>
                            <form action="admin_dashboard.php" method="post">
                                <input type="hidden" name="user_id" value="<?php echo $row['user_id']; ?>">
                                <input type="hidden" name="username" value="<?php echo $row['username']; ?>">
                                <input type="hidden" name="email" value="<?php echo $row['email']; ?>">
                                <input type="hidden" name="phone" value="<?php echo $row['phone']; ?>">
                                <button type="submit" name="edit_user">Edit</button>
                            </form>
                            <form action="admin_dashboard.php" method="post" onsubmit="return confirm('Are you sure you want to delete this user?');">
                                <input type="hidden" name="user_id" value="<?php echo $row['user_id']; ?>">
                                <button type="submit" name="delete_user">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </table>

            <?php if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['edit_user'])) : ?>
                <?php
                $selected_user_id = $_POST['user_id'];
                $user_query = "SELECT * FROM Users WHERE user_id=$selected_user_id";
                $user_result = $conn->query($user_query);
                $user = $user_result->fetch_assoc();
                ?>
                <form action="admin_dashboard.php" method="post" class="edit-form">
                    <input type="hidden" name="user_id" value="<?php echo $user['user_id']; ?>">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" value="<?php echo $user['username']; ?>" required>
                    
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" value="<?php echo $user['email']; ?>" required>
                    
                    <label for="phone">Phone:</label>
                    <input type="text" id="phone" name="phone" value="<?php echo $user['phone']; ?>">
                    
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password">
                    
                    <button type="submit" name="update_user">Update</button>
                </form>
            <?php endif; ?>
            <button onclick="location.href='view_appointments.php'" style="margin-bottom: 20px; display: block;">View Appointments</button>
            <button onclick="location.href='admin_dashboard.php?logout=true'" style="margin-top: 20px; display: block;">Logout</button>
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
