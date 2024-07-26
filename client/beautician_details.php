<?php
session_start();
include('dbcon.php');
$id = intval($_GET['id_beautician']);
$sql = "SELECT * FROM register_beautician WHERE id_beautician = $id";
$result = $con->query($sql);
if($result && $result->num_rows > 0){
  $row = $result->fetch_assoc();
}
else {
  echo '<tr><td colspan="2">No details found for this user.</td></tr>';
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Rating</title>
    <link rel="stylesheet" href="./css/details.css" />
    <script defer src="./js/details.js"></script>
  </head>
  <style>
		 .btn-more-details a{
          text-decoration: none;
          color: #365314;
      }
      .btn-more-details:hover {
          background-color:365314 ;
      }
      .btn-more-details:hover a {
        color: white;
     }
     .reservation a{
      text-decoration: none;
          color: #365314;
     }
     .reservation:hover{
      background-color:365314 ;
      }
      .reservation:hover a {
        color: white;
     }
  </style>
  <body>
    <nav class="navbar">
      <div class="navdiv">
        <div>
          <h2 class="nav-heading">Beauty Hub</h2>
        </div>
        <ul class="nav-list">
          <li class="nav-content"><a class="nav-link" href="#">Home</a></li>
          <li class="nav-content"><a class="nav-link" href="#">Services</a></li>
          <li class="nav-content">
            <a class="nav-link" href="#">Earn With Us</a>
          </li>
          <li class="nav-content">
            <a class="nav-link" href="#">Contact Us</a>
          </li>
          <li class="nav-content">
            <a href="#">
              <img src="./images/contact.svg" class="nav-images" alt="images"
            /></a>
          </li>
        </ul>
      </div>
    </nav>
    <div class="link-section">
      <div class="link-heading">
        <a href="#">Services</a> > <a href="#">HairCare</a> >
        <a href="#">Search </a>> <a href="#">Service Center</a>
      </div>

      <div class="first-section">
        <h2 class="first-heading"><?php echo $row['username_beautician']; ?></h2>

        <div class="details">
          <div class="first-details">
            <div class="first-details-container">
              <div class="first-details-box">
                <div class="details-box">
                  <img
                    class="details-icon"
                    src="./images/near_me.svg"
                    alt="location-icon"
                  />
                  <p class="details-desc"><?php echo $row['email_beautician']; ?></p>
                </div>
                <div class="details-box">
                  <img src="./images/phone-1.svg" alt="number-icon" />
                  <p class="details-desc"><?php echo $row['mobile_beautician']; ?></p>
                </div>

                <div class="details-box">
                  <img src="./images/time.svg" alt="number-icon" />
                  <p class="details-desc">Opens at 6:00am -Closes at 6:00PM</p>
                </div>
                <div class="time-details">
                  <div class="details-date-time">
                    <p class="details-desc">Mon-Fri</p>
                    <p class="details-desc">6 AM - 6 PM</p>
                  </div>

                  <div class="details-date-time">
                    <p class="details-desc">Sat-Sun</p>
                    <p class="details-desc">8 AM - 8 PM</p>
                  </div>
                </div>
              </div>

              <div class="box-content">
                <div class="box">
                  <img class="box-icon" src="./images/star.svg" alt="" />
                  <p class="box-review">3.9</p>
                  <p class="box-review">Ratings</p>
                </div>

                <div class="box">
                  <img class="box-icon" src="./images/review.svg" alt="" />
                  <p class="box-review">149</p>
                  <p class="box-review">Reviews</p>
                </div>

                <div class="box">
                  <img class="box-icon" src="./images/tick.svg" alt="" />
                  <p class="box-review">305</p>
                  <p class="box-review">Services Given</p>
                </div>
              </div>

              <div class="reservation">
                <h2><a href = "book.php?id_beautician=<?php echo $row['id_beautician']; ?>">Make Reservation</a></h2>
              </div>
            </div>
          </div>

          <div class="second-details">
            <div class="second-section-left">
              <div class="image-section-left">
                <img src="images/image-1.png" alt="image1" />
                <img src="./images/image-2.png" alt="image2" />
              </div>

              <div class="image-section-right">
                <img src="./images/image-3.png" alt="image3" />
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Slider Section -->
    <div class="slider">
      <div class="slider-title">
        <p class="slider-title-name">Nearest branch</p>
      </div>

      <div class="slider-section">
        <div class="button-icon">
          <img src="./images/right-arrow.svg" alt="left-arrow" />
        </div>

        <div class="slider-section-slider">
          <div class="slider-box">
          <?php
            	$ret = mysqli_query($con, "select * from register_beautician");
	            $cnt = 1;
	            while($row = mysqli_fetch_array($ret)){
	      	?>
            <div class="business-card">
              <div class="business-card-description">
                <div class="business-card-details">
                  <div class="business-card-title">
                    <img src="./images/location.svg" alt="location-icon" />
                    <p><?php echo $row['username_beautician']; ?></p>
                  </div>

                  <div class="business-card-desc">
                    <div class="business-card-detail">
                      <img src="./images/address.svg" alt="location" />
                      <p><?php echo $row['email_beautician'];?></p>
                    </div>

                    <div class="business-card-detail">
                      <img src="./images/phone-1.svg" alt="" />
                      <p><?php echo $row['mobile_beautician'];?></p>
                    </div>

                    <div class="business-card-detail">
                      <img src="./images/time.svg" alt="" />
                      <p>Opens at 6:00 am - Closes at 9:00pm</p>
                    </div>
                  </div>
                </div>
                <button class="btn-more-details"><a href="beautician_details.php?id_beautician=<?php echo $row['id_beautician']; ?>">More Details</a></button>

              </div>
            </div>
        <!-- </div> -->
        <?php 
              $cnt = $cnt +1; 
              }
          ?>
</div>

        <!-- <div class="button-icon">
          <img src="./images/right-arrow.svg" alt="right-arrow" />
        </div> -->
      </div>
    </div>
    <!-- footer section -->
    <footer>
      <div class="footer-section">
        <div class="container">
          <div class="footer-content">
            <h1>Beauty Hub</h1>

            <div class="footer-heading-detail">
              <div class="footer-email">
                <img src="./images/Email.svg" alt="images" />beautyhub@gmail.com
              </div>

              <div class="footer-contact">
                <img src="./images/phone.svg" alt="images" />+977 986873098
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
  </body>
</html>
