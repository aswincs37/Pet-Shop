<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pawsandtails</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom styles for the online pet shop */
        .navbar-custom {
            background-color: blueviolet; /* Change navigation bar background color */
        }

        .navbar-custom .navbar-brand,
        .navbar-custom .navbar-nav .nav-link {
            color: #000000; /* Change brand and link color */
        }

        .navbar-custom .navbar-toggler-icon {
            background-color: #000000; /* Change toggler icon color */
        }

        .welcome-text {
            color: #FFD166; /* Change welcome text color */
        }

        /* Additional custom styling for the pet shop content */
        /* Add your custom styles for the content here */
        /* For example: */
        .main-content {
            padding: 20px;
            text-align: center;
        }
        /* Adjust button styles */
        .nav-item a {
            color: #ffffff !important; /* Adjust link color */
            text-decoration: none; /* Remove underline */
        }
        .nav-item a:hover {
            color: #ffffff !important; /* Change link color on hover */
        }
        .dropdown-menu a {
            color: #000000 !important; /* Adjust dropdown link color */
        }
        .dropdown-menu a:hover {
            color: #ffffff !important; /* Change dropdown link color on hover */
            background-color: #000000; /* Change dropdown background color on hover */
        }
        .nav-item .btn {
            margin: 5px; /* Set margin for buttons */
        }
    </style>
</head>
<body>
    <div class="navbar navbar-expand-lg navbar-custom">
        <a class="navbar-brand" href="index.php">
            <img src="../images/logo.png" alt="Pawsandtails" class="img">
        </a>
        <?php
        session_start();
        if (isset($_SESSION['name'])) {
            echo "<span class='welcome-text'>Welcome "  . $_SESSION['name'] . "</span>";
        } else {
            echo "<a href='login.php' class='btn btn-outline-light'>LOGIN||REGISTER</a>";
        }
        ?>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse ml-auto" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="btn btn-success" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-success" href="./customer/categories.php">All Categories</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-success" href="./customer/products.php">Food Products</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-success" href="./customer/animal.php">Animals</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-success" href="./customer/bird.php">Birds</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle btn btn-success" href="#" id="navbarDropdownMyOrders" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        My Orders
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMyOrders">
                        <a class="dropdown-item" href="./customer/my_products.php">Products</a>
                        <a class="dropdown-item" href="./customer/my_orders.php">Animal/Birds</a>
                    </div>
                </li>
                <?php if (isset($_SESSION['cid'])) {?>
                    <li class="nav-item">
                        <a class="btn btn-danger ml-2" href="logout.php">Logout</a>
                    </li>
                <?php }?>
            </ul>
        </div>
    </div>


    <!-- Bootstrap JS and jQuery (required for Bootstrap functionality) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
