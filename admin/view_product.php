<?php
include('admin_navbar.php');
?>
<html>
    <head>
        <title>View Product</title>
        <style>
            body{
            color:red;
            }
        </style>
    </head>
    <body>
        <center>
            <h1>View Product</h1>
            <?php
            error_reporting(E_ALL);
            ini_set('display_errors', 1);
                require '../connection.php';
                $query="select * from product";
                $result=mysqli_query($conn,$query) or die("<script>alert('Selection Query Failed...')</script>".mysqli_error($con));

                echo "<table border=50 cellpadding=10>";
                echo "<tr><th>Product ID</th><th>Product Name</th><th>category ID</th><th>Brand ID</th><th>Material ID</th>
                <th>Product Description</th><th>Size</th><th>price</th><th>Product Image</th></tr>";  
                while( $row = mysqli_fetch_array($result))
                {
                    echo "<tr>";
                        echo "<td>" .$row['product_id']. "</td>";
                        echo "<td>" .$row['name']. "</td>";
                        echo "<td>" .$row['cat_id']. "</td>";
                        echo "<td>" .$row['brand_id']. "</td>";
                        echo "<td>" .$row['material_id']. "</td>";
                        echo "<td>" .$row['description']. "</td>";
                        echo "<td>" .$row['size']. "</td>";
                        echo "<td>" .$row['price']. "</td>";
                        echo "<td><img src='../images/" . $row["image"] . "' width=100px height=100px></td>";

                    echo "</tr>";
                }    
                echo "</table>";
                
                mysqli_close($conn);
            ?>
        </center>
    </body>
</html>