<?php
require('admin_navbar.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Display</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #fff;
        }

        caption {
            text-align: center;
            font-size: 24px;
            margin-bottom: 10px;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f5f5f5;
        }

        tr:hover {
            background-color: #f9f9f9;
        }

        img {
            width: 120px;
            height: 120px;
        }

        a {
            color: #f90;
            text-decoration: none;
            font-weight: bold;
            margin-right: 10px;
        }

        a:hover {
            color: #f00;
        }
        .content
        {
            margin-left: 250px;
        }
    </style>
</head>
<body>
    <div class="content">
    <table id="main">
        <h1>PRODUCTS</h1>
        <tr>
            <th>Product ID</th>
            <th>Category ID</th>
            <th>Product Name</th>
            <th>Product For</th>
            <th>Product Description</th>
            <th>Price</th>
            <th>Date-Time</th>
            <th>Stock</th>
            <th>Image </th>
            <th>Options</th>
        </tr>

        <?php
        require('../connection.php');
        $q = "SELECT * FROM product";
        $result = mysqli_query($conn, $q) or die("Query failed: " . mysqli_error($conn));
        while ($row = mysqli_fetch_array($result)) {
            ?>
            <tr>
                <td><?php echo $row['product_id']; ?></td>
                <td><?php echo $row['cat_id']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['type']; ?></td>
                <td><?php echo $row['description']; ?></td>
                
                <td><?php echo $row['price']; ?></td>
                <td><?php echo $row['date']; ?></td>
                <td><?php echo $row['stock']; ?></td>
                <td><img src="../images/<?php echo $row['image']; ?>" width="50" height="50"></td>
              
                <td>
                    <!-- Options for each product -->
                    <a href="update.php?product_id=<?php echo $row['product_id']; ?>">UPDATE</a>
                  
                    <a href='display_products.php?remove=<?php echo $row['product_id']; ?>' onclick="return confirm('Are you sure you want to remove this product?')">REMOVE</a>
                </td>
            </tr>
            <?php
        }
        ?>
    </table>
    </div>
</body>
</html>
<?php
if (isset($_GET['remove'])) {
    $remove_id = $_GET['remove'];
    $remove_query = mysqli_query($conn, "DELETE FROM product WHERE product_id = '$remove_id'");
}
?>