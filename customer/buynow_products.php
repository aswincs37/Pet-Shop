<?php
include('customer_navbar.php');

error_reporting(E_ALL);
ini_set('display_errors', 1);

require('../connection.php');
if(isset($_SESSION['cid']))
{
if (isset($_GET['product_id']) && isset($_POST['submit'])) 
{
    $pid = $_GET['product_id'];
    $q = mysqli_query($conn, "select * from product where product_id=$pid");
    $row = mysqli_fetch_assoc($q);

    $price = $row['price'];
    $cat_id=$row['cat_id'];
    $stock = $row['stock'];
    $customer_id=$_SESSION['cid'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $quantity = $_POST['quantity'];
    $invoice_no = mt_rand();
    $status = 'pending';

    $subtotal = $price * $quantity;

    $insert_orders = "INSERT INTO orders (c_id, customer_name, customer_address, customer_phone, invoice_no, product_id,cat_id ,quantity, amount,pickup_date,pickup_time, order_date, order_status)
               VALUES ('$customer_id', '$name', '$address', '$phone','$invoice_no', '$pid','$cat_id','$quantity', '$subtotal','0','0', NOW(), '$status')";
    $result = mysqli_query($conn, $insert_orders);

    if ($result) {
        $q = "SELECT order_id FROM orders WHERE c_id = $customer_id ORDER BY order_id DESC LIMIT 1";
        $r = mysqli_query($conn, $q);
        $row = mysqli_fetch_assoc($r);
        $order_id = $row['order_id'];

        $updateQuery = "UPDATE product SET stock = stock - '$quantity' WHERE product_id = '$pid'";
        $updateResult = mysqli_query($conn, $updateQuery);
        if ($order_id) {
            echo "<script>window.open('product_payment.php?order_id=$order_id','_self')</script>";
        } else {
            echo "<script>alert('Failed to retrieve order_id.')</script>";
        }
    } else {
        echo "<script>alert('Failed to submit the order.')</script>";
    }
}
}else
{
    echo "<script>alert('Login to your account!')</script>";
    echo "<script>window.open('../login.php','_self')</script>";
    exit();
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 80%;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            font-weight: bold;
        }

        input[type="text"],
        input[type="number"],
        textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-top: 5px;
        }

        input[type="submit"] {
            padding: 10px 20px;
            background-color: #4caf50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        #subtotal {
            font-weight: bold;
        }
    </style>
</head>

<body>
    <!-- Your PHP code -->

    <div class="container">
        <h1>Checkout</h1>
        <form method="post" action="">
            <!-- Other form fields -->
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" placeholder="Enter your name for this purchase" name="name" required>
            </div>

            <div class="form-group">
                <label for="address">Delivery Address:</label>
                <textarea id="address" name="address" placeholder="Enter the delivery address" rows="4" required></textarea>
            </div>

            <div class="form-group">
                <label for="phone">Phone Number:</label>
                <input type="text" name="phone" placeholder="Phone Number" pattern="[6-9]{1}[0-9]{9}" title="Enter a valid Indian phone number (10 digits starting with 6-9)" required>
            </div>

            <div class="form-group">
                <label for="quantity">Quantity:</label>
                <input type="number" id="quantity" name="quantity"  max="<?php echo $stock ?>"  placeholder="Enter Quantity" min="1" value="1" required onchange="calculateSubtotal()">

                <span id="subtotal"></span>
            </div>

            <input type="submit" name="submit" value="Make Payment">
        </form>
    </div>

    
</body>
</html>