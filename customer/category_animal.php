<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pawsandails</title>
    <style>
      

        .main {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
            gap: 20px;
            padding: 20px;
            margin-top: 20px;
        }

        .product-image {
            width: 40%;
            max-width: 400px;
        }

        .product-image img {
            width: 100%;
            height: auto;
        }

        .product-details {
            width: 50%;
            max-width: 400px;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 5px;
        }

        .product-details h2,
        .product-details h5 {
            margin-bottom: 10px;
        }

        .in-stock {
            color: #007bff;
        }

        .btn {
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            border: none;
            border-radius: 4px;
            background-color: #007bff;
            color: #fff;
            transition: background-color 0.3s;
        }

        .btn:disabled {
            background-color: #ccc;
            cursor: not-allowed;
        }

        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    require('customer_navbar.php');
    require('../connection.php');
    if (!empty($_GET['cat_id'])) {
        $customer_id = isset($_SESSION['cid']) ? $_SESSION['cid'] : null;
        $cid = $_GET['cat_id'];
        $q = "SELECT * FROM animal where cat_id='1'";
        $result = mysqli_query($conn, $q) or die("Query failed: " . mysqli_error($conn));
        while ($row = mysqli_fetch_array($result)) {
    ?>
            <form method="post" action="">
                <div class="container main">
                    <div class="product-image">
                        <div id="productCarousel" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="../images/<?php echo $row['image']; ?>" class="d-block w-100" alt="image1">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product-details">
                        <h2><?php echo $row['name']; ?></h2>
                        <h3>Species:<?php echo $row['species']; ?></h3>
                        <h3>Age:<?php echo $row['age']; ?></h3>
                        <h5><?php echo $row['description']; ?></h5>
                        
                        <h5 class="in-stock">Available: <?php echo $row['stock'] . " pieces"; ?></h5>
                        <h2>Price: ₹<?php echo $row['price']; ?>/-</h2>
                        
                        
                        <input type="hidden" name="product_id" value="<?php echo $row['animal_id']; ?>">
                        <input type="hidden" name="name" value="<?php echo $row['name']; ?>">
                        <input type="hidden" name="image" value="<?php echo $row['image']; ?>">
                        <input type="hidden" name="price" value="<?php echo $row['price']; ?>">

                        <?php
                        // Check if the stock is zero
                        if ($row['stock'] == 0) {
                            // Disable the "Add to Cart" button
                            echo '<input type="submit" name="submit" value="Out of Stock" class="btn" disabled>';
                        } else {
                            // Enable the "Add to Cart" button
                             
                            echo '<a href="buynow.php?product_id=' . $row['animal_id'] . '&cat_id=' . $_GET['cat_id']. '" class="btn btn-primary" style="text-decoration:none;">Buy Now</a>';

                        }
                       
                        ?>
                    </div>
                </div>
            </form>
    <?php
        }
    }
    ?>


</body>

</html>

<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require('../connection.php');

if (isset($_POST['submit'])) {
    if (isset($_SESSION['cid'])) {
        $customer_id = $_SESSION['cid'];
        $product_id = $_POST['product_id'];
        $product_name = $_POST['name'];
        $product_image = $_POST['image'];
        $product_price = $_POST['price'];
        $quantity = 1;


        $sql = "SELECT * FROM wishlist WHERE customer_id = $customer_id AND product_id = $product_id";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            echo "<script>alert('This product is already added to your wishlist.');</script>";
            echo "<script>window.open('wishlist.php', '_self')</script>";
        } else {

            $insert_query = "INSERT INTO wishlist(customer_id, product_id, product_name,price, image) VALUES ('$customer_id', '$product_id', '$product_name', '$product_price', '$product_image')";
            $insert_result = mysqli_query($conn, $insert_query);

            if ($insert_result) {
                echo "<script>
                if (confirm('Added to wishlist. Do you want to continue shopping?')) {
                    window.open('products.php', '_self');
                } else {
                    window.open('wishlist.php', '_self');
                }
            </script>";

            } else {
                echo "<script>alert('Failed to add the product to the wishlist.');</script>";
            }
        }
    } else {
        echo "<script>alert('Please Login!');</script>";
        echo "<script>window.open('../login.php', '_self')</script>";
    }
}
?>
