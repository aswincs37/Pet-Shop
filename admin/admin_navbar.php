<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: 250px;
            height: 100vh;
            background-color: orangered;
            color: #fff;
            padding-top: 20px;
        }

        .sidebar .nav-link {
            color: #fff;
            font-weight: bold;
        }

        .sidebar .nav-link:hover {
            background-color: #e94e1b;
        }

        .content {
            margin-left: 250px;
            padding: 20px;
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: static;
            }
            .content {
                margin-left: 0;
            }
        }
        a {
            color: yellowgreen;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <a class="navbar-brand" href="admin_home.php">Pawsandails</a>
        <?php
        session_start();
        if(isset($_SESSION['username'])) {
            echo '<a class="nav-link">WELCOME<br>' . $_SESSION['username'] . '</a>';
        } else {
            header('Location: ../login.php');
        }
        ?>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" href="admin_home.php">Home</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownCategory" role="button" aria-haspopup="true" aria-expanded="false">
                    Add Category
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownCategory">
                <a class="dropdown-item" href="add_category.php">Add Category</a>
                    <a class="dropdown-item" href="display_category.php">View All Categories</a>
                   
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownCategory" role="button" aria-haspopup="true" aria-expanded="false">
                    Add Animal
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownCategory">
                <a class="dropdown-item" href="add_animal.php">Add Animals</a>
                    <a class="dropdown-item" href="display_animals.php">View All Animals</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownCategory" role="button" aria-haspopup="true" aria-expanded="false">
                    Add Birds
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownCategory">
                <a class="dropdown-item" href="add_bird.php">Add Birds</a>
                    <a class="dropdown-item" href="display_birds.php">View All Birds</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownProducts" role="button" aria-haspopup="true" aria-expanded="false">
                    Add Food Products
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownProducts">
                <a class="dropdown-item" href="add_product.php">Add Food Products</a>
                <a class="dropdown-item" href="display_products.php">View All Products</a>
                   
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownProducts" role="button" aria-haspopup="true" aria-expanded="false">
                    Orders
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownProducts">
                <a class="dropdown-item" href="product_orders.php">Products Orders</a>
                <a class="dropdown-item" href="animal_orders.php">Animal Orders</a>
                <a class="dropdown-item" href="bird_orders.php">Bird Orders</a>
                   
                </div>
            </li>
           
            <li class="nav-item">
                <a class="nav-link" href="view_feedback.php">Feedback</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="logout.php">Logout</a>
            </li>
        </ul>
    </div>

    <div class="content">
        <!-- Main content area -->
        <!-- Your content goes here -->
    </div>

    <!-- Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.querySelectorAll('.dropdown-toggle').forEach(function(dropdown) {
                dropdown.addEventListener('click', function() {
                    var menu = dropdown.nextElementSibling;
                    if (menu.style.display === 'block') {
                        menu.style.display = '';
                    } else {
                        document.querySelectorAll('.dropdown-menu').forEach(function(m) {
                            m.style.display = '';
                        });
                        menu.style.display = 'block';
                    }
                });
            });
        });
    </script>
</body>
</html>
