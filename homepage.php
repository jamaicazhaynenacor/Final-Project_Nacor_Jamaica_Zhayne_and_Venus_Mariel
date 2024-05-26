<!DOCTYPE html>
<html>
<head>
    <title>Clinic Booking System</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style type="text/css">
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: Century Gothic;
    }
    body, html {
        height: 100%;
    }
    header {
        background-color: #a68a64;
        height: 90vh;
        background-size: cover;
        background-position: center;
        position: relative;
    }
    
    .main img {
        position: absolute;
        top: 68%;
        right: 0;
        transform: translateY(-50%);
        width: 500px;
        height: auto; 
    }
    
    .logo img{
        position: absolute;
        top: -60px;
        left: 0;
        padding: 10px;
        width: 300px;
    }
    
    ul {
        float: right;
        list-style-type: none;
        margin-top: 20px;
    }
    ul li {
        display: inline-block;
    }
    ul li a {
        text-decoration: none;
        color: #fff;
        padding: 5px 20px;  
        border: 1px solid #fff;
        transition: 0.6s ease-out;
    }
    ul li a:hover {
        background-color: #01377d;
        color: #fff;
    }
    ul li.active a {
        background-color: #fff;
        color: #000;
    }
    .main {
        max-width: 1200px;
        margin: auto;
    }
    .title {
        position: absolute;
        top: 50%;
        left: 32%;
        transform: translate(-50%, -50%);
    }
    .title h1 {
        color: #fff;
        font-size: 45px;
    }
    .title p {
        color: #fff;
        font-size: 20px;
        text-align: center;
        position: absolute;
        top: 130%;
        left: 50%;
        transform: translate(-50%, -50%);
    }
    .dropbtn {
        color: #000;
        font-size: 16px;
        border: none;
        text-decoration: none;
        padding: 5px 20px;  
        border: 1px solid #fff;
        transition: 0.6s ease-out;
    }
    .dropdown {
        position: relative;
        display: inline-block;
    }
    .dropdown-content {
        display: none;
        position: absolute;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        z-index: 1;
    }
    .dropdown-content a {
        color: #fff;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
        transition: 0.6s ease-out;
    }
    .dropdown-content a:hover {
        color: #000;
        background-color: #fff;
    }
    .dropdown:hover .dropdown-content {
        display: block;
    }
    footer {
        background-color: #01377d;
        color: #fff;
        padding: 6px 0;
        text-align: center;
        position: relative;
        bottom: 0;
        width: 100%;
        height: 90px;
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

    </style>
</head>
<body>
    <header>
        <div class="main">
            <img src="https://umiamihealth.org/-/media/images/location-thumbs/uhealth-clinic-at-walgreens-sunset.ashx">
            <ul>
                <li class="active"><a href="#">Home</a></li>
                <li><a href="services.php">Services</a></li>
                <div class="dropdown">
                    <button class="dropbtn">Account Login</button>
                    <div class="dropdown-content">
                        <a href="registration.php">Registration</a>
                        <a href="login.php">User Login</a>
                        <a href="admin_login.php">Admin Login</a>
                    </div>
                </div>
            </ul>
        </div>
        <div class="title">
        <h1>Walgreens Healthcare Clinic</h1>
            <p>United States (2007)</p>
        </div>
    </header>
    <footer>
        <div class="footer-content">

            <div>
                <h3>Contact Us</h3>
                <p>Phone: 0934 215 3674</p>
                <p>Address: United States</p>
            </div>
        </div>
    </footer>
</body>
</html>
