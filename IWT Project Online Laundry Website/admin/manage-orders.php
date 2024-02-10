<?php
    include("../include/connection.php");

    if (isset($_POST['update'])) {

        $status = htmlentities(mysqli_real_escape_string($con, $_POST['status']));
        $id = htmlentities(mysqli_real_escape_string($con, $_POST['id']));

        if(empty($status)) {
            echo"<script> alert('Status can't be empty.') </script>";
        } else {
            $update = "update orders SET status = '$status' WHERE id = '$id'";
            $query = mysqli_query($con, $update);
        
            if(!$query) {
                echo mysqli_error($con);
                echo"<script> alert('Error') </script>";
            } else {
                echo"<script> alert('Status Updated.') </script>";
            }
        }
    }

    if (isset($_POST['remove'])) {

        $id = htmlentities(mysqli_real_escape_string($con, $_POST['id']));

        $update = "DELETE from orders WHERE id = '$id'";
        $query = mysqli_query($con, $update);
    
        if(!$query) {
            echo mysqli_error($con);
            echo"<script> alert('Error') </script>";
        } else {
            echo"<script> alert('Order Removed.') </script>";
        }
    }

    $getOrders = "select * from orders";
    $runOrder = mysqli_query($con, $getOrders);
    $numberOfOrders = mysqli_num_rows($runOrder);

    //echo"<script>window.open('manage-orders.php', '_self')</script>";
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Orders</title>
    <link rel="stylesheet" href="../styles/manage-orders.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
</head>

<body>
    <div class="header-container">
        <div class="header">
            <div class="left-side">
                <h1>Online Laundry Service - Admin</h1>
            </div>
            <div class="right-side">
                <ul>
                </ul>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="side-bar">
            <ul>
                <li style="font-weight: 600; color: white;" onclick="location.href='./'">Manage Orders</li>
            </ul>
        </div>

        <div class="manage-order-container">
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
                            $customer = $orderRow['user'];
                            $status = $orderRow['status'];

                            echo"
                            <div class='order'>
                                <h2>#$id |  $date</h1>
                                <div class='order-content'>
                                    <p>Customer</p>
                                    <p class='right'>$customer</p>
                                    <p>Address</p>
                                    <p class='right'>$address</p>
                                    <p>Service Types</p>
                                    <p class='right'>$serviceTypes</p>
                                    <p>Pickup Type</p>
                                    <p class='right'>$pickupType</p>
                                    <p>Delivery Methos</p>
                                    <p class='right'>$deliveryMethod</p>
                                </div>
                                <form id='orderForm' method='POST' class='form' >
                                    <input style='display: none;' id='id' type='text' placeholder='id' name='id' value = '$id'>
                                    <input id='status' type='text' placeholder='Status' name='status' value = '$status'>
                                    <input id='update-btn' type='submit' name='update' value='Update Status'>
                                    <input id='remove-btn' type='submit' name='remove' value='Remove Order'>
                                </form>
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
    <script src="scripts/javascript/manage-notices.js"></script>
</body>

</html>