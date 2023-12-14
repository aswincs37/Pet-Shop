<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require('../connection.php');
session_start();

if(isset($_GET['order_id']))
{
    $order_id = $_GET['order_id'];
   
$get_data = mysqli_query($conn, "SELECT * FROM orders WHERE order_id='$order_id'");
$row_fetch = mysqli_fetch_assoc($get_data);
$invoice_no = $row_fetch['invoice_no'];
$amount_due=$row_fetch['amount'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Choose Payment Option</title>
</head>
<body>
<h1>Payment Gateway</h1>
    <p>Please make your payment below:</p>
    <h1>Choose Payment Option</h1>
    order ID=<?php echo  $order_id ?><br>
    Total Amount=<?php echo $amount_due?>
    
    <form action="" method="post">
        <label>
            <input type="radio" name="payment_option" value="credit_card" required>
            Credit Card
        </label><br>

        <label>
            <input type="radio" name="payment_option" value="googlepay" require>
            google pay
        </label><br>

        <label>
            <input type="radio" name="payment_option" value="paytm" required>
            paytm
        </label><br>

        <label>
            <input type="radio" name="payment_option" value="bank transfer" required> 
            bank transfer
        </label><br>

        <input type="submit" name=submit value="Pay Now">
       
    </form>
</body>
</html>  
    </form>


<?php
}
 if(isset($_POST['submit']))
 {
    require('../connection.php');
    $order_id =$order_id;
    $amount_due=$amount_due;
    $invoice_no =$invoice_no;
    $payment_option=$_POST['payment_option'];
    
    $insert="insert into payment(order_id,invoice_no,amount,payment_method,date)
    values('$order_id','$invoice_no','$amount_due','$payment_option',NOW())";
    $r=mysqli_query($conn,$insert);
    if($r)
     {
        echo "<script>alert('Payment Success!')</script>";
        echo "<script>window.open('my_products.php','_self')</script>";
     }
 }
?>


