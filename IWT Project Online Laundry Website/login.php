<?php
include("include/connection.php");

if(isset($_POST['userEmail'])) {
    $userEmail = htmlentities(mysqli_real_escape_string($con, $_POST['userEmail']));
    $userPassword = htmlentities(mysqli_real_escape_string($con, $_POST['userPassword']));

    $selectUser = "select * from user where email='$userEmail' AND password='$userPassword'";
    $query = mysqli_query($con, $selectUser);
    $check = mysqli_num_rows($query);

    if($check == 1) {
        setcookie("userEmail", $userEmail, time() + (86400 * 7));
        echo"<script>window.open('index.php', '_self')</script>";
    } 
    else {
        echo"<script> alert('Wrong email or password.') </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="styles/login.css" />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap" rel="stylesheet">
</head>
<body>
    <div class="wrapper">
        <div class="main-container">
            <h1>LOGIN</h1>
            <form id="loginForm" method="POST" class="form" action="">
                <input id="email" type="email" placeholder="Email" name="userEmail">
                <input id="password" type="password" placeholder="Password" name="userPassword">
                <button id="login-btn" type="button" name="login_btn">Login</button>
            </form>
            <p><a href="./register.php">New user? Create an account</a></p>
        </div>
    </div>
    <script src="scripts/jquery/jquery-3.5.1.min.js"></script>
    <script src="scripts/javascript/login.js"></script>
</body>
</html>