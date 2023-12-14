<?php
require('admin_navbar.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Home</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('../images/.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            font-family: Arial, sans-serif;
        }
       
        .content {
            margin-left: 250px;
            padding: 20px;
        }

        .card {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="content">
        <h1>Hi, Admin</h1>
        <div class="container">
            <div class="row">
                <?php
                require('../connection.php');
                
                // Query for Bird category orders
                $q = "SELECT * FROM orders WHERE cat_id='2'";
                $r = mysqli_query($conn, $q);
                $orderCount = mysqli_num_rows($r);
                ?>
                <div class="col-md-4">
                    <div class="card">
                        <img src="../images/budgie.jpg" class="card-img-top" alt="Placeholder Image">
                        <div class="card-body">
                            <h5 class="card-title">Birds</h5>
                            <h5 class="card-title">Orders: <?php echo $orderCount; ?></h5>
                            <a href="bird_orders.php" class="btn btn-primary">Show Orders</a>
                        </div>
                    </div>
                </div>
                
                <?php
                // Query for Animal category orders
                $q = "SELECT * FROM orders WHERE cat_id='1'";
                $r = mysqli_query($conn, $q);
                $orderCount = mysqli_num_rows($r);
                ?>
                <div class="col-md-4">
                    <div class="card">
                        <img src="../images/German_Shepherd.jpg" class="card-img-top" alt="Placeholder Image">
                        <div class="card-body">
                            <h5 class="card-title">Animals</h5>
                            <h5 class="card-title">Orders: <?php echo $orderCount; ?></h5>
                            <a href="animal_orders.php" class="btn btn-primary">Show Orders</a>
                        </div>
                    </div>
                </div>
                
                <?php
                // Query for Product category orders
                $q = "SELECT * FROM orders WHERE cat_id='3'";
                $r = mysqli_query($conn, $q);
                $orderCount = mysqli_num_rows($r);
                ?>
                <div class="col-md-4">
                    <div class="card">
                        <img src="../images/bone pedegree.jpg" class="card-img-top" alt="Placeholder Image">
                        <div class="card-body">
                            <h5 class="card-title">Products</h5>
                            <h5 class="card-title">Orders: <?php echo $orderCount; ?></h5>
                            <a href="product_orders.php" class="btn btn-primary">Show Orders</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and jQuery (required for Bootstrap functionality) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
