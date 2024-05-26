<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Clinic Services">
    <meta name="keywords" content="Cardiology, Dermatology, Gastroenterology">
    <meta name="author" content="Walgreens Healthcare Clinic">
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
        height: 80vh;
        background-size: cover;
        background-position: center;
        position: relative;
    }
    .main img {
        position: absolute;
        top: 0;
        left: 0;
        margin: 0;
        margin-top: -70px;
        width: 300px;
        height: auto; 
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
        background-color: #fff;
        color: #000;
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
        left: 50%;
        transform: translate(-50%, -50%);
    }
    .title h1 {
        color: #fff;
        font-size: 50px;
        font-family: Arial;
    }
    .title p {
        color: #fff;
        font-size: 20px;
        text-align: center;
    }
    .button {
        position: absolute;
        top: 65%;
        left: 50%;
        transform: translate(-50%, -50%);
    }
    .btn {
        border: 1px solid #fff;
        padding: 10px 30px;
        text-decoration: none;
        transition: 0.6s ease-out;
    }
    .btn:hover {
        background-color: #fff;
        color: #000;
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
    .services {
        padding: 50px 0;
        background-color: #f4f4f4;
        text-align: center;
    }
    .services h2 {
        font-size: 40px;
        margin-bottom: 20px;
    }
    .services p {
        font-size: 18px;
        margin-bottom: 10px;
        color: #555;
    }
    .service-box {
        max-width: 1200px;
        margin: auto;
        display: flex;
        flex-wrap: wrap;
        justify-content: space-around;
    }
    .service-box div {
        background: #fff;
        margin: 10px;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        flex-basis: 30%;
    }
    .service-box div img {
        width: 100%;
        border-radius: 10px;
    }
    .service-box div h3 {
        margin: 15px 0 10px;
        font-size: 22px;
    }
    .service-box div p {
        color: #777;
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
    </style>
</head>
<body>
    <header>
            <nav>
                <ul>
                    <li><a href="homepage.php">Home</a></li>
                    <li  class="active"><a href="#services">Services</a></li>
                    <div class="dropdown">
                        <button class="dropbtn">Account Login</button>
                        <div class="dropdown-content">
                            <a href="registration.php">Registration</a>
                            <a href="login.php">User Login</a>
                            <a href="admin_login.php">Admin Login</a>
                        </div>
                    </div>
                </ul>
            </nav>
        </div>
        <div class="title">
        <h1>Walgreens Healthcare Clinic</h1>
            <p>United States (2007)</p>
        </div>
    </header>

    <section id="services" class="services">
        <h2>Our Services</h2>
        <div class="service-box">
             <div>
                <img src="https://southdenver.com/wp-content/uploads/2021/02/cardiology-treatment-1536x1025.jpg" alt="Service 1">
                <h3>Cardiology</h3>
            </div>
            <div>
                <img src="https://tse2.mm.bing.net/th?id=OIP.kzeS8p6fieZR4befhFtpDwHaE8&pid=Api&P=0&h=220" alt="Service 2">
                <h3>Dermatology</h3>
            </div>
             <div>
                <img src="https://tse3.mm.bing.net/th?id=OIP.4CAw-WakrJamYyXiWVf-bQHaE5&pid=Api&P=0&h=220" alt="Service 3">
                <h3>Gastroenterology</h3>
            </div>
            
    </footer>
</body>
</html>
