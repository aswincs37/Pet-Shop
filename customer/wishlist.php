<?php
session_start();
require('../connection.php');
require('customer_navbar.php');

if($_SESSION['cid'])
{
   
$q="select * from wishlist";
$r=mysqli_query($conn,$q)or die("Wrong Query!");
while($row=mysqli_fetch_assoc($r))
 {
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <style>
    /* Styles for Product Cards */



.product-card {
    border: 1px solid #ddd;
    background-color: #fff;
    padding: 20px;
    margin: 20px;
    border-radius: 5px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    width: 300px; /* Adjust the width as needed */
}

.product-image img {
    width: 100%; /* Ensures the image takes the full width of the container */
    height: auto;
    border-radius: 5px;
}

.product-info {
    text-align: center;
}

.product-title {
    font-size: 20px;
    margin-top: 10px;
    margin-bottom: 5px;
}

.product-description {
    font-size: 14px;
    color: #666;
    margin-bottom: 10px;
}

.product-price {
    font-size: 18px;
    font-weight: bold;
    color: #333;
    margin-bottom: 10px;
}

.add-to-cart-button {
    padding: 8px 16px;
    background-color: #337ab7;
    color: #fff;
    border: none;
    border-radius: 3px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.add-to-cart-button:hover {
    background-color: #23527c;
}

   </style>
    <title>wishlist</title>
</head>
<body>
   
    
    <div class="product-card">
    
        <div class="product-image">
           
        </div>
        <div class="product-info">
        <p class="product-price"> <img src="../images/<?php echo $row['image']; ?>" 
            width="150" height="150"></p>
            <h2 class="product-title"><?php echo $row['product_name']; ?></h2>
            <p class="product-description"><?php echo $row['description']; ?></p>
            <p class="product-price"><?php echo "$".$row['price']; ?></p> 
            <a href="view_product.php?product_id=<?php echo $row['product_id'];?>">
    <button class="add-to-cart-button">View Product</button>
</a>


        </div>
    </div>
    <?php
 }
}else
   {
    echo "<script>alert('Please Login Your Account!'); window.open('../login.php','_self');</script>";

   }
    ?>
</body>
</html>