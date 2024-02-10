<?php
    include("include/connection.php");

    $userEmail = $_COOKIE['userEmail'];


    if(isset($_POST['name'])) {
        $name = htmlentities(mysqli_real_escape_string($con, $_POST['name']));
        $address = htmlentities(mysqli_real_escape_string($con, $_POST['address']));
        $phone = htmlentities(mysqli_real_escape_string($con, $_POST['phone']));
    
        $update = "update user SET name = '$name', address = '$address', phone = '$phone' WHERE email = '$userEmail'";
        $query = mysqli_query($con, $update);
    
        if(!$query) {
            echo mysqli_error($con);
            echo"<script> alert('Error') </script>";
        } else {
            echo"<script> alert('Profile Updated.') </script>";
        }
    }

    if(isset($userEmail))
    {
        $getUser = "select * from user where email='$userEmail'";
        $runUser = mysqli_query($con, $getUser);
        $row = mysqli_fetch_array($runUser);
        
        $name = $row['name'];
        $email = $row['email'];
        $address = $row['address'];
        $phone = $row['phone'];
        $subscription = $row['subscription'];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="styles/profile.css" />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap" rel="stylesheet">
</head>
<body>
    <div class="wrapper">

    <div class="header-container">
            <div class="header">
                <h1 onclick="location.href='./index.php'">Online Laundry Service</h1>
                <div class="main-menu">
                    <ul>
                        <li><a href="./index.php">Home</a></li>
                        <li><a href="./orders.php">Orders</a></li>
                        <li><a href="./profile.php" style="font-weight: 700;">Profile</a></li>
                        <li id="logout-btn" style="color: red;">Logout</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="profile-container">
            <h1>Profile</h1>

            <div class="img-container">
                <img src="./images/user.png" alt="">
            </div>
            
            <form id="profileForm" method="POST" class="form" action="">
                <p>Name</p>
                <input id="name" type="text" name="name" value = "<?php echo (isset($name))?$name:'';?>">

                <p>Email</p>
                <input style="outline: none;" id="email" type="text" name="email" value = "<?php echo (isset($email))?$email:'';?>" readonly>

                <p>Phone</p>
                <input id="phone" type="text" name="phone" value = "<?php echo (isset($phone))?$phone:'';?>">

                <p>Address</p>
                <input id="address" type="text" name="address" value = "<?php echo (isset($address))?$address:'';?>">

                <h4> Your Subscription Plan - <?php echo $subscription ?> <a href="./subscription.php">Change</a></h4>

                <div class="button-container">
                    <button id="update-btn" type="button"> Update Profile</button>
                </div>
            </form>
        </div>
    
    </div>
    <script src="scripts/jquery/jquery-3.5.1.min.js"></script>
    <script src="scripts/javascript/profile.js"></script>
</body>
</html>