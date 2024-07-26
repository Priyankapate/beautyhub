<?php 
session_start();
error_reporting(0);
include('dbcon.php');
if (!isset($_SESSION['id_client']) || strlen($_SESSION['id_client']==0)) {
  header('location:logout_client.php');
} 
else{
  $id = intval($_GET['id_beautician']);
  $sql = "SELECT * FROM register_beautician WHERE id_beautician = $id";
  $result = $con->query($sql);
  if($result && $result->num_rows > 0){
    $row = $result->fetch_assoc();
    $beautician = $row['username_beautician']; 
  }
  else {
    echo '<tr><td colspan="2">No details found for this user.</td></tr>';
  }

  
  if(isset($_POST['submit']))
  {
    $uid=$_SESSION['id_client'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $adate=$_POST['date'];
    $atime=$_POST['time'];
    $service=$_POST['service'];
    $msg = $_POST['note'];
    $aptnumber = mt_rand(100000000, 999999999);
    $query = mysqli_query($con, "INSERT INTO book_appointment (UserID, Username_Client, AptNumber, AptDate, AptTime, Service_Type, Remark, Mobile, beautician) VALUES ('$uid', '$name', '$aptnumber', '$adate', '$atime', '$service', '$msg', '$phone', '$beautician')");

   
 if ($query) {
$ret=mysqli_query($con,"select AptNumber from book_appointment where book_appointment.UserID='$uid' order by ID desc limit 1;");
$result=mysqli_fetch_array($ret);
$_SESSION['AptNumber']=$result['AptNumber'];
  header('location:thank-you.php');
  }
  else
    {
      echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }

  }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Book appointment</title>
    <link rel="stylesheet" href="css/bookappointment.css" />
  </head>
  <body>
    <div class="container">
      <h1>Make Appointment</h1>
      <form class="appointment-form" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST"   >
        <div class="name-details">
            <img class="appointment-icon" src="./images/svg/user.svg" alt="">
          <input type="text" name="name" placeholder="Name" required = "true"/>
        </div>

        <div class="number-details">
          <img class="appointment-icon" src="./images/svg/phone1.svg" alt="" />
          <input type="text" name="phone" placeholder="Phone Number" required = "true"/>
        </div>

        <div class="date-details">
          <img class="appointment-icon" src="./images/svg/date.svg" alt="" /> 
          <input type="date" name="date" placeholder="Date" required = "true"/>
        </div>

        <div class ="time-details">
         <img class="appointment-icon" src="./images/svg/time.svg" alt="" /> 
          <input type="time" name="time" placeholder="Time" required = "true"/>
        </div>

        <div class="service-details">
          <img class="appointment-icon" src="./images/svg/service.svg" alt="" />
          <input type="text" name="service" placeholder="Service You Need" required = "true"/>
          
        </div>

        <div class="note-details">
          <img class="appointment-icon" src="./images/svg/note.svg" alt="" />
          <textarea name="note" placeholder="Any Note For Us"></textarea>
        </div>

        <div class="buttons">
          <button type="submit" name="submit" >Book Appointment</button>
          <button type="cancel" name="cancel">Cancel</button>
        </div>
      </form>
    </div>
  </body>
</html>

