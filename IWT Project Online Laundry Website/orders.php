<?php
    include("include/connection.php");

    $userEmail = $_COOKIE['userEmail'];

    if(isset($userEmail))
    {
        $getOrders = "select * from orders where user='$userEmail'";
        $runOrder = mysqli_query($con, $getOrders);
        $numberOfOrders = mysqli_num_rows($runOrder);
    
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders</title>
    <link rel="stylesheet" href="styles/orders.css" />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap" rel="stylesheet">
</head>
<body>
    <div class="wrapper">

    <div class="header-container">
            <div class="header">
                <h1 onclick="location.href='welcome.php'">Online Laundry Service</h1>
                <div class="main-menu">
                    <ul>
                        <li><a href="./index.php">Home</a></li>
                        <li><a href="./orders.php" style="font-weight: 700;">Orders</a></li>
                        <li><a href="./profile.php">Profile</a></li>
                        <li id="logout-btn" style="color: red;"><a href="welcome.php">Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="order-container">
            <h1>Orders</h1>

            <div class="orders">
                <?php
                    if($numberOfOrders != 0)
                    {
                        while($orderRow = mysqli_fetch_array($runOrder)){
                            $id = $orderRow['id'];
                            $serviceTypes = $orderRow['serviceTypes'];
                            $productPrice = $orderRow['clotheTypes'];
                            $pickupType = $orderRow['pickupType'];
                            $deliveryMethod = $orderRow['deliveryMethod'];
                            $date = $orderRow['date'];
                            $address = $orderRow['address'];
                            $status = $orderRow['status'];

                            echo"
                            <div class='order'>
                                <h2>#$id |  $date</h1>
                                <div class='order-content'>
                                    <p>Customer</p>
                                    <p class='right'>$userEmail</p>
                                    <p>Address</p>
                                    <p class='right'>$address</p>
                                    <p>Service Types</p>
                                    <p class='right'>$serviceTypes</p>
                                    <p>Pickup Type</p>
                                    <p class='right'>$pickupType</p>
                                    <p>Delivery Methos</p>
                                    <p class='right'>$deliveryMethod</p>
                                    <p>Status</p>
                                    <p class='right'>$status</p>
                                </div>
                            </div>
                            ";
                        }
                    } else {
                        echo"<h3>No Orders</h3>";
                    }
                    
                ?>
            </div>
        </div>
    
    </div>
    <script src="scripts/jquery/jquery-3.5.1.min.js"></script>
    <script src="scripts/javascript/orders.js"></script>
</body>
</html>