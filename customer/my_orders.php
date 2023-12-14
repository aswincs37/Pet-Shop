<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require('../connection.php');
include('customer_navbar.php');

if (!$_SESSION['cid']) {
    echo "<script>alert('Login to your account!')</script>";
    echo "<script>window.open('../login.php','_self')</script>";
    exit();
} else {
    $customer_id = $_SESSION['cid'];
    $get_customer = mysqli_query($conn, "SELECT * FROM registration WHERE customer_id='$customer_id'");

    $row_fetch = mysqli_fetch_assoc($get_customer);
    $customer_id = $row_fetch['customer_id'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Orders</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        a {
            text-decoration: none;
            color: blue;
        }

        table {
            color: red;
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
            color: #fff;
        }
    </style>
</head>

<body>
    <br><br>
    <h1>My Pets Orders</h1>
    <table>
        <thead>
            <tr>
                <th>Sl no.</th>
                <th>Order ID</th>
                <th>Phone Number</th>
                <th>Token No</th>
                <th>Total Amount</th>
                <th>Order Date</th>
                
                <th>Pickup Date</th>
                <th>Pickup Time</th>
                <th>Order Status</th>
                <th>Feedback</th>
                <th>Bill</th>
            </tr>
        </thead>
        <tbody>
            <?php
            error_reporting(E_ALL);

            $get_order_details = mysqli_query($conn, "SELECT * FROM orders WHERE c_id='$customer_id' and cat_id='1' or cat_id='2'");

            $num = 1; // Initialize the row number
            while ($row_orders = mysqli_fetch_assoc($get_order_details)) {
                echo "<tr>";
                echo "<td>$num</td>";
                echo "<td>{$row_orders['order_id']}</td>";
                
                echo "<td>{$row_orders['customer_phone']}</td>";
                echo "<td>{$row_orders['invoice_no']}</td>";
                echo "<td>{$row_orders['amount']}</td>";

                echo "<td>{$row_orders['order_date']}</td>";
                echo "<td>{$row_orders['pickup_date']}</td>";
                echo "<td>{$row_orders['pickup_time']}</td>";
                echo "<td>{$row_orders['order_status']}</td>";

                $order_id = $row_orders['order_id'];
                $feedbackLink = ($row_orders['order_status'] == 'Delivered') ? "<a href='feedback.php?order_id=$order_id'>Write</a>" : "N/A";

                echo "<td>$feedbackLink</td>";
                echo "<td><a href='bill.php?order_id={$row_orders['order_id']}'>Bill</a></td>";

                echo "</tr>";
                $num++; // Increment the row number
            }
            if (!$get_order_details) {
                echo "Login Into your account!";
            }
            ?>
        </tbody>
    </table><br>
    <a href="categories.php" class="btn-primary">Explore More</a>
</body>

</html>
