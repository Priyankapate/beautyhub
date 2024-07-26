<?php
    session_start();
    include 'dbcon.php';
    if(isset($_GET['token_client'])){
        $token = $_GET['token_client'];
        $updatequery = "update register_client set status_client = 'active' where token_client = '$token' ";
        $query = mysqli_query($con, $updatequery);
        if($query){
            if(isset($_SESSION['msg'])){
                $_SESSION['msg'] = "Account updated successfully";
                header('location: login_client.php');
            }
            else{
                $_SESSION['msg'] = "You are logged out";
                header('location: login_client.php');
            }
        }
        else{
            $_SESSION['msg'] = "Account not updated.";
            header('location: register_client.php');
        }
    }
    else{
        echo "fail";
    }
?>