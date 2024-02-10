<?php
include("include/connection.php");

if(isset($_POST['userEmail'])){
       
    $userName = htmlentities(mysqli_real_escape_string($con,$_POST['userName']));
    $userEmail = htmlentities(mysqli_real_escape_string($con,$_POST['userEmail']));
    $userPhone = htmlentities(mysqli_real_escape_string($con,$_POST['userPhone']));
    $userPassword = htmlentities(mysqli_real_escape_string($con,$_POST['userPassword']));
    
    $check_email = "select * from user where email = '$userEmail'";
    $run_email = mysqli_query($con,$check_email);
    $check = mysqli_num_rows($run_email);

    if($check == 1){
        echo"<script> alert('Email already exist') </script>";
    } else {
        $insert = "insert into user (name, email, phone, password) values ('$userName','$userEmail','$userPhone', '$userPassword')";
        $query = mysqli_query($con, $insert);

        if(!$query) {
            echo"<script> alert('Error') </script>";
        } else {
            setcookie("userEmail", $userEmail, time() + (86400 * 7));
            echo"<script>window.open('subscription.php', '_self')</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="styles/register.css" />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap" rel="stylesheet">
</head>
<body>
    <div class="wrapper">
        <div class="main-container">
            <h1> REGISTER </h1>
            <form id="registerForm" method="POST" class="form" action="">
                <input id="name" type="text" placeholder="Name" name="userName">
                <input id="email" type="email" placeholder="Email" name="userEmail">
                <input id="phone" type="text" placeholder="Phone" name="userPhone">
                <input id="password" type="password" placeholder="Password" name="userPassword">
                <button id="register-btn" type="button">Sign Up</button>
            </form>
            <p><a href="./login.php">Already have an account? Login</a></p>
        </div>
    </div>
    <script src="scripts/jquery/jquery-3.5.1.min.js"></script>
    <script src="scripts/javascript/register.js"></script>
</body>
</html>