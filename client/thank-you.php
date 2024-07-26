<?php 
session_start();
error_reporting(0);
include('dbcon.php');
if (!isset($_SESSION['id_client']) || strlen($_SESSION['id_client']==0)) {
  header('location:logout_client.php');
  } else{


  ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Landing Page</title>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/index.css" />
  <style>
    .custom-card {
    border: 2px solid #2d4629;
    padding: 20px;
    width: 300px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.card-icon {
    background-color: #4e6e39;
    padding: 10px;
    display: inline-block;
    border: 2px dashed #8cad6e;
    margin-bottom: 15px;
}

.card-icon img {
    width: 30px;
    height: 30px;
}

.card-title {
    font-size: 1.25rem;
    margin-bottom: 10px;
    color: #2d4629;
}

.card-text {
    font-size: 0.875rem;
    color: #6c757d;
    margin-bottom: 20px;
}

.btn-outline-success {
    border-color: #2d4629;
    color: #2d4629;
    font-weight: bold;
}

.btn-outline-success:hover {
    background-color: #2d4629;
    color: #fff;
}
.btn-outline-success a{
    color: #2d4629;
}
.btn-outline-success a:hover{
    color: white;
}

.custom-card {
    margin: 20px 20px;
    padding: 20px;
    border: 1px solid #ddd;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    background-color: white;
    width: 500px;
    border-radius: 8px;
    position: relative;
}

.icon {
    background-color: #4CAF50;
    display: flex;
    align-items: center;
    justify-content: center;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    margin-bottom: 10px;
}

.custom-card h2 {
    font-size: 18px;
    margin: 10px 0;
    color: #333;
}

.custom-card p {
    font-size: 14px;
    color: #666;
    margin: 10px 0 20px;
}

.custom-card button {
    border: 1px solid #4CAF50;
    color: #4CAF50;
    border-radius: 5px;
    transition: background-color 0.3s, color 0.3s;
}

.custom-card button:hover {
    background-color: #4CAF50;
    color: white;
}

/* Rectangular border effect */
.custom-card::before {
    content: '';
    position: absolute;
    top: -10px;
    right: -10px;
    bottom: -10px;
    left: -10px;
    border: 2px dashed #4CAF50;
    border-radius: 8px;
    pointer-events: none;
}

  </style>
</head>

  <body>
    <nav class="navbar">
      <div class="navdiv">
        <div>
          <h2 class="nav-heading">Beauty Hub</h2>
        </div>
        <ul class="nav-list">
          <li class="nav-content"><a class="nav-link" href="index.php" >Home</a></li>
          <li class="nav-content"><a class="nav-link" href="services.php" style="text-decoration: underline;">Services</a></li>
          <li class="nav-content">
            <a class="nav-link" href="../profile/earnwithus.html">Earn With Us</a>
          </li>
          <li class="nav-content">
            <a class="nav-link" href="../profile/contactus.html">Contact Us</a>
          </li>
          <li class="nav-content"><a class="nav-link" href="../login/beauty.html">hij</a></li>
          <li class="nav-content"><a class="nav-link" href="logout_client.php">Logout</a></li>
        </ul>
      </div>
    </nav>
    <!-- Confirm -->
    <div class="first-section">
      <div class="first-section-heading">
        <section class="d-flex justify-content-center align-items-center vh-90">
          <div class="card custom-card text-center">
              <div class="icon mb-3 mx-auto">
                  <svg width="40" height="40" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <rect width="24" height="24" rx="4" fill="#4CAF50"/>
                      <path d="M9 11L11.5 13.5L15 10" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                  </svg>
              </div>
              <h2>You have successfully booked.</h2>
              <p>Waiting for Beautician Approval.</p>
              <p>Appointment Number: <?php echo $_SESSION['AptNumber'];?></p>
              <button class="btn btn-outline-success"><a href="./index.php">Go To Home Page</a></button>
          </div>
      </section>
        </div>
        </div>
    <!-- Footer -->
    <footer>
      <div class="footer-section">
        <p class="footer-paragraph">Our Parterns & Collaborators</p>
        <div class="footer-images">
          <img src="./images/Rectangle 13.svg" alt="images" />
          <img src="./images/Rectangle 13.svg" alt="images" />
          <img src="./images/Rectangle 13.svg" alt="images" />
          <img src="./images/Rectangle 13.svg" alt="images" />
          <img src="./images/Rectangle 13.svg" alt="images" />
          <img src="./images/Rectangle 13.svg" alt="images" />
        </div>

        <div class="container">
          <div class="footer-content">
            <h1>Beauty Hub</h1>

            <div class="footer-heading-detail">
              <div class="footer-email">
                <img
                  src="./images/Email.svg"
                  alt="images"
                />beautyhub@gmail.com
              </div>

              <div class="footer-contact">
                <img src="./images/Vector.svg" alt="images" />+977 986873098
              </div>

              <div class="footer-logo">
                <img src="./images/facebook.svg" alt="images" />
                <img src="./images/tiktok.svg" alt="images" />
                <img src="./images/youtube.svg" alt="images" />
                <img src="./images/insta.svg" alt="images" />
              </div>
            </div>
          </div>

          <div class="footer-content">
            <h1>About</h1>
            <ul class="footer-list">
              <li><a href="#">About Us</a></li>
              <li><a href="#">Contact Us</a></li>
              <li><a href="#">Become Beautician</a></li>
              <li><a href="#">FAQs</a></li>
            </ul>
          </div>

          <div class="footer-content">
            <h1>Features</h1>
            <ul class="footer-list">
              <li><a href="#">Ease Service</a></li>
              <li><a href="#">Location Track</a></li>
              <li><a href="#">Rating and Feedback</a></li>
              <li><a href="#">Ease Communicate</a></li>
            </ul>
          </div>

          <div class="footer-content">
            <h1>Support</h1>
            <ul class="footer-list">
              <li><a href="#">FAQs</a></li>
              <li><a href="#">Forum</a></li>
            </ul>
          </div>
        </div>
      </div>

      <div class="footer-bottom">
        <div class="footer-line"></div>

        <div class="footer-bottom-info">
          <p>@2024 Beauty hub.All rights Reserved</p>
        </div>
      </div>
    </footer>
  </main>
  <script src="js/index.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html><?php } ?>

