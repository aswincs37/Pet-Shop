<?php
session_start();
require('../connection.php');
include('customer_navbar.php');

$q = "SELECT * FROM animal";
$r = mysqli_query($conn, $q) or die("Wrong Query!");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .product-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            padding: 20px;
        }

        .product-card {
            flex-basis: calc(33.33% - 20px);
            margin-bottom: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            overflow: hidden;
            max-width: 300px;
        }

        .product-image {
            overflow: hidden;
        }

        .product-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .product-info {
            padding: 20px;
        }

        .product-title {
            font-size: 24px;
            margin: 0;
            color: #333;
        }

        .product-description {
            font-size: 14px;
            margin: 10px 0;
            color: #666;
        }

        .product-price {
            font-size: 18px;
            margin: 10px 0;
            color: #f36f6f;
            font-weight: bold;
        }

        .add-to-cart-button {
            background-color: #f36f6f;
            color: #fff;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .add-to-cart-button:hover {
            background-color: #e25f5f;
        }
    </style>
    <title>Category List</title>
</head>
<body>
<h1>Products</h1>
    <div class="product-container">
        <?php while ($row = mysqli_fetch_assoc($r)) { ?>
            <div class="product-card">
                <div class="product-image">
                    <img src="../images/<?php echo $row['image']; ?>" alt="Product Image" width="300" height="200">
                </div>
                <div class="product-info">
                    <h2 class="product-title"><?php echo $row['species']; ?></h2>
                    <p class="product-description"><?php echo $row['description']; ?></p>
                    <p class="product-price"><?php echo "₹".$row['price']; ?></p>
                    <a href="view_animal.php?animal_id=<?php echo $row['animal_id']; ?>">
                        <button class="add-to-cart-button">View Details</button>
                    </a>
                </div>
            </div>
        <?php } ?>
    </div>
</body>
</html>
