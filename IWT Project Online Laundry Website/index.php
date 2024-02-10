<?php
    include("include/connection.php");

    $userEmail = $_COOKIE['userEmail'];

    if(isset($userEmail))
    {
        $getUser = "select * from user where email='$userEmail'";
        $runUser = mysqli_query($con, $getUser);
        $row = mysqli_fetch_array($runUser);
        
        $subscription = $row['subscription'];

        if(empty($subscription)) {
            echo"<script>window.open('subscription.php', '_self')</script>";
        }
    }

    if(isset($_POST['address'])) {
        $address = htmlentities(mysqli_real_escape_string($con, $_POST['address']));
        $mass = htmlentities(mysqli_real_escape_string($con, $_POST['mass']));
        $count = htmlentities(mysqli_real_escape_string($con, $_POST['count']));

        $servicesArray = $_POST['service'];
        $services="";

        foreach ($servicesArray as $service){ 

            if(!empty($services)) {
                $services .= ", ";
            }
           
            $services .= $service;
        }

        $clothesArray = $_POST['clotheType'];
        $clothes="";

        foreach ($clothesArray as $clothe){ 

            if(!empty($clothes)) {
                $clothes .= ", ";
            }
           
            $clothes .= $clothe;
        }

        $pickupTypeArray = $_POST['pickupType'];
        $pickupTypes="";

        foreach ($pickupTypeArray as $pickupType){ 

            if(!empty($pickupTypes)) {
                $pickupTypes .= ", ";
            }
           
            $pickupTypes .= $pickupType;
        }

        $deliveryMethodArray = $_POST['deliveryMethod'];
        $deliveryMethods="";

        foreach ($deliveryMethodArray as $deliveryMethod){ 

            if(!empty($deliveryMethods)) {
                $deliveryMethods .= ", ";
            }
           
            $deliveryMethods .= $deliveryMethod;
        }


        function generateRandomString() {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < 15; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
            return $randomString;
        }

        $orderID = generateRandomString();
        date_default_timezone_set("Asia/Colombo");
        $date = date('d-m-y h:i:s');


        $insert = "INSERT INTO orders (id, user, serviceTypes, clotheTypes, count, mass, address, pickupType, deliveryMethod, date, status) VALUES ('$orderID', '$userEmail','$services','$clothes', '$count', '$mass', '$address', '$pickupTypes', '$deliveryMethods', '$date', 'pending')";

        $query = mysqli_query($con, $insert);

        if(!$query) {
            echo mysqli_error($con);
            echo"<script> alert('Error') </script>";
        } else {
            echo"<script> alert('Order has been placed.') </script>";
        }

        echo"<script>window.open('index.php', '_self')</script>";
     
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="styles/index.css" />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap" rel="stylesheet">
</head>
<body>
    <div class="wrapper">

        <div class="header-container">
            <div class="header">
                <h1 onclick="location.href='./index.php'">Online Laundry Service</h1>
                <div class="main-menu">
                    <ul>
                        <li><a href="./index.php" style="font-weight: 700;">Home</a></li>
                        <li><a href="./orders.php">Orders</a></li>
                        <li><a href="./profile.php">Profile</a></li>
                        <li id="logout-btn" style="color: red;"><a href="welcome.php">Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
        
        <div class="order-container">
            <h1>Order a Service</h1>
            <form id="orderForm" method="POST" class="form" action="">
                <p>Service Type</p>
                <div class="section-two">
                    <label class="container">Laundry
                        <input id="laundry" value="Laundry" name="service[]" type="checkbox" checked="checked">
                    </label>
                    <label class="container">Dry Cleaning
                        <input id="dry-c" value="Dry Cleaning" name="service[]" type="checkbox">
                    </label>
                    <label class="container">Ironing
                        <input id="ironing" value="Ironing" name="service[]" type="checkbox">
                    </label>
                </div>

                <p>Clothes Type</p>
                <div class="section-two">
                    <label class="container">Cotton
                        <input id="cotton" value="Cotton" name="clotheType[]" type="checkbox" checked="checked">
                    </label>
                    <label class="container">Fabric
                        <input id="fabric" value="Fabric" name="clotheType[]" type="checkbox">
                    </label>
                    <label class="container">Silk
                        <input id="silk" value="Silk" name="clotheType[]" type="checkbox">
                    </label>
                </div>

                <div class="count-container">
                    <div> 
                        <p>Number of Clothes</p>
                        <input id="count" type="number" name="count" min="1">
                    </div>

                    <div>
                        <p>Mass KG</p>
                        <input id="mass" type="number" name="mass"  min="1">
                    </div>
                </div>

                <p>Address</p>
                <input id="address" type="text" name="address">

                <div class="pd-container">
                    <div class="section-three">
                        <p>Pickup Type</p>
                        <label class="container">Bring to Store
                            <input id="bts" value="Bring to Store" type="checkbox" name="pickupType[]" checked="checked">
                        </label>
                        <label class="container">Pickup from Home
                            <input id="pfh" value="Pickup from Home" name="pickupType[]" type="checkbox">
                        </label>
                    </div>
                   
                    <div class="section-four">
                        <p>Delivery Method</p>
                        <label class="container">Pickup from Store
                            <input id="pfs" value="Pickup from Store" type="checkbox" name="deliveryMethod[]" checked="checked">
                        </label>
                        <label class="container">Delivery to Home
                            <input id="dth" value="Delivery to Home" name="deliveryMethod[]" type="checkbox">
                        </label>
                    </div>
                </div>

                <div class="button-container">
                    <button type="button" id="order-btn"> Place Order</button>
                </div>
            </form>
        </div>
        
    </div>
    <script src="scripts/jquery/jquery-3.5.1.min.js"></script>
    <script src="scripts/javascript/index.js"></script>
</body>
</html>