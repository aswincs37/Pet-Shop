<?php
require('admin_navbar.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category Display</title>
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
        .content {
            margin-left: 250px;
            padding: 20px;
        }
    </style>
</head>
<body>
    <div class="content">
    <table>
        <h1>CATEGORY</h1>
        <tr>
            <th>Category ID</th>
            <th>Category Name</th>
            <th>Category Image</th>
            <th>Options</th>
        </tr>

        <?php
        require('../connection.php');
        $q = "SELECT * FROM category";
        $r = mysqli_query($conn, $q) or die("Query failed: " . mysqli_error($conn));

        while ($row = mysqli_fetch_array($r)) {
            ?>
            <tr>
                <td><?php echo $row['cat_id']; ?></td>
                <td><?php echo $row['cat_name']; ?></td>
                <td><img src="../images/<?php echo $row['cat_image']; ?>" alt="Category Image"></td>
                <td>
                    <a href="update_category.php?cat_id=<?php echo $row['cat_id']; ?>">UPDATE</a>
                    <a href='display_category.php?remove=<?php echo $row['cat_id']; ?>' onclick="return confirm('Are you sure you want to remove this category?')">REMOVE</a>
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
    $remove_query = mysqli_query($conn, "DELETE FROM category WHERE cat_id = '$remove_id'");
    header('location:display_category.php');
}
?>
