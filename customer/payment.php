<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require('../connection.php');
session_start();

if (isset($_GET['order_id'])) {
    $order_id = $_GET['order_id'];

    $get_data = mysqli_query($conn, "SELECT * FROM orders WHERE order_id='$order_id'");
    $row_fetch = mysqli_fetch_assoc($get_data);
    $invoice_no = $row_fetch['invoice_no'];
    $amount_due = $row_fetch['amount'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Choose Payment Option</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }

        h1 {
            margin-bottom: 20px;
        }

        form {
            margin-top: 20px;
        }

        label {
            margin-right: 20px;
        }

        input[type="submit"] {
            margin-top: 10px;
            padding: 8px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Payment Gateway</h1>
        <p>Please make your payment below:</p>
        <h2>Choose Payment Option</h2>
        <p>Order ID: <?php echo $order_id ?></p>
        <p>Total Amount: <?php echo $amount_due ?></p>

        <form action="" method="post">
            <div class="form-group">
                <label>
                    <input type="radio" name="payment_option" value="credit_card" required>
                    Credit Card
                </label><br>

                <label>
                    <input type="radio" name="payment_option" value="googlepay" require>
                    Google Pay
                </label><br>

                <label>
                    <input type="radio" name="payment_option" value="paytm" required>
                    Paytm
                </label><br>

                <label>
                    <input type="radio" name="payment_option" value="bank_transfer" required> 
                    Bank Transfer
                </label><br>

                <label>
                    <input type="radio" name="payment_option" value="cod" required> 
                    Cash On Delivery (COD)
                </label><br>
            </div>
            <input type="hidden" name="order_id" value="<?php echo $order_id; ?>">
            <input type="hidden" name="invoice_no" value="<?php echo $invoice_no; ?>">
            <input type="hidden" name="amount_due" value="<?php echo $amount_due; ?>">

            <input type="submit" name="submit" value="Pay Now" class="btn btn-primary">
        </form>
    </div>

    <!-- Bootstrap JS and jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php
}
 if (isset($_POST['submit'])) {
    require('../connection.php');
    $order_id = $order_id;
    $amount_due = $amount_due;
    $invoice_no = $invoice_no;
    $payment_option = $_POST['payment_option'];
    
    $insert = "insert into payment(order_id, invoice_no, amount, payment_method, date)
    values('$order_id', '$invoice_no', '$amount_due', '$payment_option', NOW())";
    $r = mysqli_query($conn, $insert);
    if ($r) {
        echo "<script>alert('Payment Success!')</script>";
        echo "<script>window.open('my_orders.php','_self')</script>";
    }
 }
?>
