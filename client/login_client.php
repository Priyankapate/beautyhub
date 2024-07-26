<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>login</title>
    <link rel="stylesheet" href="css/login.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
  </head>

  <body>
    <?php
     include 'dbcon.php';
     if(isset($_POST['submit'])){
      $email = $_POST["email_client"];
      $password = $_POST["password_client"];
      $email_search = "select * from register_client where email_client = '$email' and status_client = 'active' ";
     // $id_search = "select id_client from register_client where email_client = '$email' and status_client = 'active' ";
      //$ret = mysqli_fetch_array($id_search);
      $query = mysqli_query($con, $email_search);
      $email_count = mysqli_num_rows($query);
      if($email_count){
        $email_pass = mysqli_fetch_assoc($query);
        $db_pass = $email_pass['password_client'];
        $_SESSION['id_client'] = $email_pass['id_client'];
        $_SESSION['username_client'] = $email_pass['username_client'];
        $pass_decode = password_verify($password, $db_pass);
        if($pass_decode){
          echo "login successful";
         header('location: index.php');
        }
        else{
          echo "password Incorrect";
        }
      }
      else{
        echo "Invalid Email";
      }
     }
    ?>
    <div class="container">
      <div class="left-side">
        <img class="picture" src="images/login_img.webp" alt="picture" />
      </div>
     <div>
       </div>
       <div class="right-side">
         <p class="form-heading">Hey! Welcome Back</p>
        <div  class="alert alert-primary" role="alert"  style="margin: 20px;">
        <?php 
        if(isset($_SESSION['msg'])){
                echo $_SESSION['msg']; 
        }
        else{
              echo $_SESSION['msg'] = "You are logged out. Please login again.";
        }
        ?> 
        </div>
          <form class="form" action="<?php echo htmlentities($_SERVER ['PHP_SELF']); ?>" method="POST">
          <input type="email" placeholder="email" name="email_client" required />
          <input type="password" placeholder="Password" name="password_client" required />
          <button type="submit" class="signup" name="submit">Login</button>
          </form>
          <div>
              <!-- <a href="#" class="forget-password"> Forget Password?</a> -->
          </div>
        <div class="form-bottom">
          <div class="form-line"></div>
          <button type="button" class="create-account"><a href="register_client.php">Create new account</a>
          </button>
        </div>
      </div>
    </div>
  </body>
</html>
