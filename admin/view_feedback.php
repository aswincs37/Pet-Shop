<?php
require 'admin_navbar.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>VIEW FEEDBACK</title>
	<style>
       
        center {
            margin-top: 20px;
        }

        table {
            width: 80%;
            margin-top: 20px;
            border-collapse: collapse;
            border: 3px solid #333;
        }

        th, td {
            border: 1px solid #333;
            padding: 8px;
            text-align: center;
        }

        

        th {
            background-color: #333;
            color: white;
        }
        .contain 
        {
            margin-left: 250px;
        }
    </style>
</head>
<body>
    <div class="contain">
<center>
<br><br><table id="main" border="3">
			<h1>CUSTOMER FEEDBACK</h1>
			<tr>
			<th>FEEDBACK ID</th>
            <th>order ID</th>
            <th>Customer ID</th>
			<th>FEEDBACK</th>
			<th> </th>
			</tr>

			  <?php
              error_reporting(E_ALL);
              ini_set('display_errors', 1);
			 require '../connection.php';
			 	$total=0;
			 	$sel ="select * from feedback";
			 	$result=mysqli_query($conn,$sel);
			 	 while ($rw=mysqli_fetch_assoc($result)) {
			 ?> 
			 <tr>
			 	<td><?php echo $rw['feedback_id']; ?></td>
			 	<td><?php echo $rw['order_id']; ?></td>
                 <td><?php echo $rw['customer_id']; ?></td>
                 <td><?php echo $rw['feedback']; ?></td>

			 </tr>
			 <?php
			 }
			 ?>
</table>
</center>
    </div>
</body>
</html>