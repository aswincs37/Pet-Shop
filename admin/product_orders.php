<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require('../connection.php');
include('admin_navbar.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Orders</title>
    <style>
      

        h1 {
            color: black;
            text-align: center;
          
        }

        table {
            width: 100%;
            border-collapse: collapse;
            
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        a {
            text-decoration: none;
            color: blue;
        }
        .contain 
        {
            margin-left: 250px;
        }
    </style>
</head>
<body>
    <div class="contain">
    <h1 >Product Orders</h1>
    <table border="5" style="color: red;">
        <tr>
            <th>Sl no.</th>
            <th>Order ID</th>
            <th>Customer_id</th>
            <th>Customer Name</th>
            <th>Delivery Address</th>
            <th>Phone Number</th>
            <th>Invoice No</th>
            <th>Product  ID</th>
            <th>Product Quantities</th>
            <th>Order Date</th>
            <th>payment Status</th>
        </tr>
        <?php
        error_reporting(E_ALL);
                    
        $get_order_details = mysqli_query($conn, "SELECT * FROM orders  where cat_id='3'");
         
        $num = 1; // Initialize the row number
        while ($row_orders = mysqli_fetch_assoc($get_order_details)) {
            echo "<tr>";
            echo "<td>$num</td>";
            echo "<td>{$row_orders['order_id']}</td>";
            echo "<td>{$row_orders['c_id']}</td>";
            echo "<td>{$row_orders['customer_name']}</td>";
            echo "<td>{$row_orders['customer_address']}</td>";
            echo "<td>{$row_orders['customer_phone']}</td>";
            echo "<td>{$row_orders['invoice_no']}</td>";
            echo "<td>{$row_orders['product_id']}</td>";
            echo "<td>{$row_orders['quantity']}</td>";

            //echo "<td>{$row_orders['quantity']}</td>";
            echo "<td>{$row_orders['order_date']}</td>";
            $order_id=$row_orders['order_id'];
            // Checking and displaying "Complete" or "Incomplete" based on order status
          
                  echo "<td><a href='payment_status.php?order_id=$order_id'>Done</td>";
             
          
       
            echo "</tr>";
            $num++; // Increment the row number
        }
        ?>
    </table>
    </div>
</body>
</html>