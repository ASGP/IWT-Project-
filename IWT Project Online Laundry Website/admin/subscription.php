<?php
    include("include/connection.php");

    $userEmail = $_COOKIE['userEmail'];

    if(isset($_POST['plan-one-button']) || isset($_POST['plan-two-button']) || isset($_POST['plan-three-button'])) {
        if(isset($_POST['plan-one-button'])) {

            $subscription ="Plan One";
        }
    
        if(isset($_POST['plan-two-button'])) {
    
            $subscription ="Plan Two";
        }
    
        if(isset($_POST['plan-three-button'])) {
    
            $subscription ="Plan Three";
        }
    
        $update = "update user SET subscription = '$subscription' WHERE email = '$userEmail'";
        $query = mysqli_query($con, $update);
    
        if(!$query) {
            echo mysqli_error($con);
            echo"<script> alert('Error') </script>";
        } else {
            echo"<script>window.open('index.php', '_self')</script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subscription</title>
    <link rel="stylesheet" href="styles/subscription.css" />
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
                        <li><a href="./profile.php">Profile</a></li>
                        <li id="logout-btn" >Logout</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="subscription-container">
            <h1>Select Your Plan</h1>
            <div class="subscription">
                <div class="section">
                    <h2>Plan 01</h2>
                    <h4>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed auctor facilisis elit, ut feugiat nunc iaculis ut. Praesent lacinia elementum eros eu hendrerit.</h4>
                    <p>Feature A</p>
                    <p>Feature B</p>
                    <p style="opacity: 0.5;">Feature C</p>
                    <p style="opacity: 0.5;">Feature D</p>
                    <h3>Rs 1000 Yearly</h3>
                    <form method="POST" class="form" action="">
                        <button name="plan-one-button">Select</button>
                    </form>
                </div>
                <div class="section">
                    <h2>Plan 02</h2>
                    <h4>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed auctor facilisis elit, ut feugiat nunc iaculis ut. Praesent lacinia elementum eros eu hendrerit.</h4>
                    <p>Feature A</p>
                    <p>Feature B</p>
                    <p>Feature C</p>
                    <p style="opacity: 0.5;">Feature D</p>
                    <h3>Rs 1500 Yearly</h3>
                    <form method="POST" class="form" action="">
                        <button name="plan-two-button">Select</button>
                    </form>
                </div>
                <div class="section">
                    <h2>Plan 03</h2>
                    <h4>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed auctor facilisis elit, ut feugiat nunc iaculis ut. Praesent lacinia elementum eros eu hendrerit.</h4>
                    <p>Feature A</p>
                    <p>Feature B</p>
                    <p>Feature C</p>
                    <p>Feature D</p>
                    <h3>Rs 2500 Yearly</h3>
                    <form method="POST" class="form" action="">
                        <button name="plan-three-button">Select</button>
                    </form>
                </div>

            </div>
        </div>

    
    </div>
    <script src="scripts/jquery/jquery-3.5.1.min.js"></script>
    <script src="scripts/javascript/subscription.js"></script>
</body>
</html>