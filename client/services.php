
<?php
session_start();
include('dbcon.php');
if(!isset($_SESSION['username_client' ])){
  header('location: login_client.php');
 }
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>location</title>
		<link rel="stylesheet" href="./css/style.css" />
		 <!-- Leaflet CSS -->
		 <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
		 <style>
				 body {
						 margin: 0;
						 padding: 0;
						
				 }
				 #map {
						 width: 100%;
						 height: 70vh;
				 }
				 /* Custom alert box styles */
				 .custom-alert {
						 display: none;
						 position: fixed;
						 left: 50%;
						 top: 50%;
						 width: 300px;
						 height: 100px;
						 transform: translate(-50%, -50%);
						 background-color: rgb(204, 198, 198);
						 border: 2px solid #0d0b0b;
						 padding: 20px;
						 z-index: 1000;
						 box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
				 }
				 .custom-alert p {
						 margin: 0;
				 }
				 .custom-alert button {
						 margin-top: 20px;
						 padding: 5px 10px;
				 }
				 /* Overlay styles */
				 .overlay {
						 display: none;
						 position: fixed;
						 top: 0;
						 left: 0;
						 width: 100%;
						 height: 100%;
						 background-color: rgba(0, 0, 0, 0.5);
						 z-index: 999;
				 }
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
		 </style>
	</head>
	<body>
		<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script> 
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
					<li class="nav-content"><a class="nav-link" href="../login/beauty.html"><?php echo $_SESSION['username_client']; ?></a></li>
          <li class="nav-content"><a class="nav-link" href="logout.php">Logout</a></li>
				</ul>
			</div>
		</nav>

		<!-- Link Section -->
		<div class="link-section">
			<div class="link-heading">
				<a href="#">Services</a> > <a href="#">HairCare</a> >
				<a href="#">Search</a>
			</div>

			<!-- Search Section -->
			<div class="search-section">
				<h2 class="section-heading">Beauty Salons Around You</h2>
				<div class="search-bar">
					<div class="search-heading">
						<div class="search-field">
							<img
								class="search-icon-img"
								src="./images/search.svg"
								alt="search-icon"
							/>
							<input
								class="search-input"
								type="text"
								placeholder="Enter address "
							/>
						</div>
						<button class="search-button">Search</button>
					</div>
				</div>
			</div>
			<?php
			 $sql2 = "SELECT COUNT(*) as username_beautician FROM register_beautician";
			 $result2 = $con->query($sql2);
			 
			 if ($result2->num_rows > 0) {
					 $row = $result2->fetch_assoc();
					 $total_beautician = $row['username_beautician'];
			 }
				else {
					echo "No users found.";
			}
			 
	?>
			<div class="service-heading">
				<?php
			echo '<p >Number of Results: ' . $total_beautician . '</p>';
			?>
			</div>

		 
 <!-- Service Section -->
 <div class="service-section">
	<div class="service-section-left">
		<?php
	// $ret = mysqli_query($con, "select * from register_beautician");
	// $cnt = 1;
	// while($row = mysqli_fetch_array($ret)){
		$sql = "SELECT id_beautician, username_beautician, email_beautician, mobile_beautician, address_beautician, type_beautician, salon_name  FROM register_beautician ";
		$result = $con->query($sql);

		if ($result -> num_rows > 0) {
			while($row = $result->fetch_assoc()) {
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
				<div class="business-card-button">
				<button class="btn-more-details"><a href="beautician_details.php?id_beautician=<?php echo $row['id_beautician']; ?>">More Details</a></button>

				</div>
				</div>
				</div>
				<?php 
// $cnt = $cnt +1; 
}
} else {
	echo "<tr><td colspan='4'>No users found</td></tr>";
}
?>
</div>
<div class="service-section-right">
					<div id="map"></div>
					<!-- Custom alert box -->
					<div class="overlay"></div>
					<div class="custom-alert">
							<p id="alert-content"></p>
							<button onclick="closeAlert()">OK</button>
					</div>
					<button  type="submit" class="btn-update">Add location</a></button>&nbsp;
				<button type="button" class="btn-cancel">Cancel</button>
</div>
</div>     
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

		<!-- map initialization -->
<script>
		// Map initialization
		var map = L.map('map').setView([27.7172, 85.3240], 13);

		// OSM layer
		var osm = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
				attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
		});
		osm.addTo(map);

		// Google Streets layer
		var googleStreets = L.tileLayer('http://{s}.google.com/vt?lyrs=m&x={x}&y={y}&z={z}', {
				maxZoom: 20,
				subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
		});
		googleStreets.addTo(map);

		// Single marker with popup
		var singleMarker = L.marker([27.7172, 85.3240]);
		singleMarker.bindPopup('This is Kathmandu, Nepal').openPopup();
		singleMarker.addTo(map);

		// Function to perform reverse geocoding
		function reverseGeocode(lat, lon) {
				var url = `https://nominatim.openstreetmap.org/reverse?format=json&lat=${lat}&lon=${lon}&zoom=18&addressdetails=1`;

				fetch(url)
						.then(response => response.json())
						.then(data => {
								var address = data.address;
								var placeName = [
										address.attraction || address.road,
										address.suburb,
										address.city || address.town || address.village || address.municipality
								].filter(Boolean).join(', ');
								showAlert("Location:- " + placeName);
								saveLocation(lat, lon, placeName);
						})
						.catch(error => console.log('Error:', error));
		}

		// Function to save location data to the database
		function saveLocation(lat, lon, placeName) {
				var xhr = new XMLHttpRequest();
				xhr.open("POST", "save_location.php", true);
				xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
				xhr.onreadystatechange = function () {
						if (xhr.readyState === 4 && xhr.status === 200) {
								showAlert(xhr.responseText);
						}
				};
				var data = `latitude=${lat}&longitude=${lon}&place_name=${encodeURIComponent(placeName)}`;
				xhr.send(data);
		}

		// Event handling
		function onMapClick(e) {
				var latlng = e.latlng;
				showAlert("You clicked the map at " + latlng);
				reverseGeocode(latlng.lat, latlng.lng);
		}

		map.on('click', onMapClick);

		// Function to show custom alert
		function showAlert(message) {
				document.querySelector('.overlay').style.display = 'block';
				document.querySelector('.custom-alert').style.display = 'block';
				document.getElementById('alert-content').innerText = message;
		}

		// Function to close custom alert
		function closeAlert() {
				document.querySelector('.overlay').style.display = 'none';
				document.querySelector('.custom-alert').style.display = 'none';
		}



</script>
	</body>
</html>
