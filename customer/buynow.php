<?php
include('customer_navbar.php');

error_reporting(E_ALL);
ini_set('display_errors', 1);

require('../connection.php');
if (!$_SESSION['cid']) {
    echo "<script>alert('Login to your account!')</script>";
    echo "<script>window.open('../login.php','_self')</script>";
    exit();
    
}
else
{
if(isset($_SESSION['cid']))
{
if (isset($_GET['product_id']) && isset($_GET['cat_id']) && isset($_POST['submit'])) 
{
    if($_GET['cat_id']==1)
    {
    $pid = $_GET['product_id'];
    $q = mysqli_query($conn, "select * from animal where animal_id=$pid");
    $row = mysqli_fetch_assoc($q);
    }
    elseif($_GET['cat_id']==2)
    {
    $pid = $_GET['product_id'];
    $q = mysqli_query($conn, "select * from bird where bird_id=$pid");
    $row = mysqli_fetch_assoc($q);
    }
    elseif($_GET['cat_id']==3)
    {
    $pid = $_GET['product_id'];
    $q = mysqli_query($conn, "select * from product where product_id=$pid");
    $row = mysqli_fetch_assoc($q);
    }
    $price = $row['price'];
    $customer_id=$_SESSION['cid'];
    $name = $_POST['name'];
    $cat_id=$row['cat_id'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $pickup_date=$_POST['date'];
    $pickup_time=$_POST['time'];
    $quantity = $_POST['quantity'];
    $invoice_no = mt_rand(1, 100);
    $status = 'Pick Your Pet';

    $subtotal = $price * $quantity;

    $insert_orders = "INSERT INTO orders (c_id, customer_name, customer_address, customer_phone, invoice_no, product_id,cat_id, quantity, amount,pickup_date,pickup_time, order_date, order_status)
               VALUES ('$customer_id', '$name', '$address', '$phone','$invoice_no', '$pid','$cat_id','$quantity', '$subtotal', '$pickup_date','$pickup_time',NOW(), '$status')";
    $result = mysqli_query($conn, $insert_orders);

    if ($result) {
        $q = "SELECT order_id FROM orders WHERE c_id = $customer_id ORDER BY order_id DESC LIMIT 1";
        $r = mysqli_query($conn, $q);
        $row = mysqli_fetch_assoc($r);
        $order_id = $row['order_id'];

        if ($order_id) {
            echo "<script>window.open('payment.php?order_id=$order_id','_self')</script>";
        } else {
            echo "<script>alert('Failed to retrieve order_id.')</script>";
        }
        if($_GET['cat_id']==1)
        {
        $pid = $_GET['product_id'];
        $updateQuery = "UPDATE animal SET stock = stock - '$quantity' WHERE animal_id = '$pid'";
            $updateResult = mysqli_query($conn, $updateQuery);
        }
        if($_GET['cat_id']==2)
        {
        $pid = $_GET['product_id'];
        $updateQuery = "UPDATE bird SET stock = stock - '$quantity' WHERE bird_id = '$pid'";
            $updateResult = mysqli_query($conn, $updateQuery);
        }
        if($_GET['cat_id']==3)
        {
        $pid = $_GET['product_id'];
        $updateQuery = "UPDATE product SET stock = stock - '$quantity' WHERE product_id = '$pid'";
            $updateResult = mysqli_query($conn, $updateQuery);
        }
        
    }
     else {
        echo "<script>alert('Failed to submit the order.')</script>";
    }

}
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
    <div class="container">
        <h1>Enter Details</h1>
        <form method="post" action="">
            <!-- Other form fields -->
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" placeholder="Enter your name for this purchase" name="name" required>
            </div>

            <div class="form-group">
                <label for="address">Address:</label>
                <textarea id="address" name="address" placeholder="Enter address" rows="2" required></textarea>
            </div>

            <div class="form-group">
                <label for="phone">Phone Number:</label>
                <input type="text" name="phone" placeholder="Phone Number" pattern="[6-9]{1}[0-9]{9}" title="Enter a valid Indian phone number (10 digits starting with 6-9)" required>
            </div>
            <div class="form-group">
                <label for="date">Pickup Date:</label>
                <input type="date" name="date" required>
            </div>
            <div class="form-group">
                <label for="date">Pickup Time:</label>
                <input type="time" name="time" required>
            </div>
           <div class="form-group">
                <label for="quantity">Quantity:</label>
                <?php
                $pid = $_GET['product_id'];
                $cat_id = $_GET['cat_id'];

    if($cat_id==1)
    {
                $query = "SELECT * FROM animal WHERE animal_id=$pid";
                $result = mysqli_query($conn, $query);
    }elseif($cat_id==2)
        {

            $query = "SELECT * FROM bird WHERE bird_id=$pid";
            $result = mysqli_query($conn, $query);
        }
        elseif($cat_id==3)
        {

            $query = "SELECT * FROM product WHERE product_id=$pid";
            $result = mysqli_query($conn, $query);
        }
                if ($result && mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);
                    $stock = $row['stock'];
                ?>
                    <input type="number" id="quantity" name="quantity" placeholder="Enter Quantity" min="1" max="<?php echo $stock ?>" value="1" required>
                <?php } }?>
            </div>

            <input type="submit" name="submit" value="Make Payment">
        </form>
    </div>

</body>

</html>