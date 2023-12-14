<!DOCTYPE html>
<html>
<head>
    <title>Invoice</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }
        .invoice-box {
            border: 2px solid #000;
            padding: 20px;
            width: 80%;
            margin: 20px auto;
        }
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #000;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        .invoice-info {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require('customer_navbar.php');
include '../connection.php';

if (isset($_GET['order_id'])) {
    $order_id = $_GET['order_id'];

    // Fetch order details
    $query = "SELECT * FROM orders WHERE order_id = $order_id";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $customer_name = $row['customer_name'];
        $customer_address = $row['customer_address'];
        $customer_phone = $row['customer_phone'];
        $invoice_no = $row['invoice_no'];
        $order_date = $row['order_date'];
        $order_status = $row['order_status'];

        // Fetch product details for the order
        $product_id = $row['product_id'];
        $quantity = $row['quantity'];
        $amount = $row['amount'];

        // Calculate GST (assuming 18% GST)
        $gst_percentage = 18;
        $gst_amount = ($amount * $gst_percentage) / 100;
        $total_amount = $amount + $gst_amount;

        // Display the bill/invoice
        echo "<div class='invoice-box'>";
        echo "<h1>Invoice</h1>";
        echo "<div class='invoice-info'>";
        echo "<p><strong>Company Name:</strong>Pawsandails</p>";
        echo "<p><strong>GST Number:</strong> GST012365478</p>";
        echo "<p><strong>Company Email:</strong> paswsandails@gmail.com</p>";
        echo "<p><strong>Invoice Number:</strong> $invoice_no</p>";
        echo "<p><strong>Order Date:</strong> $order_date</p>";
        echo "<p><strong>Customer Name:</strong> $customer_name</p>";
        echo "<p><strong>Customer Address:</strong> $customer_address</p>";
        echo "<p><strong>Customer Phone:</strong> $customer_phone</p>";
        echo "</div>";

        echo "<table>
                <tr>
                    <th>Product ID</th>
                    <th>Quantity</th>
                    <th>Amount</th>
                    <th>GST (18%)</th>
                    <th>Total Amount</th>
                </tr>
                <tr>
                    <td>$product_id</td>
                    <td>$quantity</td>
                    <td>$amount</td>
                    <td>$gst_amount</td>
                    <td>$total_amount</td>
                </tr>
              </table>";
        echo "</div>";
    } else {
        echo "No order found with the provided ID.";
    }

    mysqli_close($conn);
} else {
    echo "No order ID provided.";
}
?>

</body>
</html>