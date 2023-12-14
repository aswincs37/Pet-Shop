<!DOCTYPE html>
<html>

<head>
    <title>Update Products</title>
</head>

<body>
    <form action="" method="POST" enctype="multipart/form-data">
        <?php
        session_start();
        require('../connection.php');

        if (!empty($_GET['product_id'])) {
            $pid = $_GET['product_id'];
            $q = "SELECT * FROM product where product_id='$pid'";
            $res = mysqli_query($conn, $q);
            $row = mysqli_fetch_assoc($res);
        ?>
            <h2>UPDATE Vegitable DETAILS</h2>

            Product NAME:<br>
            <input type="text" name="pname" required="TRUE" onkeyup="this.value = this.value.charAt(0).toUpperCase() + this.value.slice(1);"
                value="<?php echo $row['name'] ?>"><br>

            Product Description:<br>
            <input type="text" name="desc" required="TRUE" onkeyup="this.value = this.value.charAt(0).toUpperCase() + this.value.slice(1);"
                value="<?php echo $row['description'] ?>"><br>

            Product price:<br>
            <input type="number" name="price" required="TRUE" value="<?php echo $row['price'] ?>"><br>

            Product Stock:<br>
            <input type="number" name="stock" required="TRUE" value="<?php echo $row['price'] ?>"><br>
        

            Product Image :<br>
            <img class="img" src="../images/<?php echo $row['image'] ?>" width="50px"><br>

            NEW IMAGE :<br>
            <input type="file" name="img1"><br>


            <input type="submit" class="btn" name="update" value="SAVE">
            <input type="reset" class="btn" name="reset" value="CANCEL ">
        <?php
        }
        ?>
    </form>
</body>

</html>
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require('../connection.php');


if (isset($_POST['update'])) {

    $pname = $_POST['pname'];
    $desc = $_POST['desc'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];

    // Use $_FILES to get information about the uploaded files
    $img1 = $_FILES['img1']['name'];
   
    // Set the target directory for the uploaded images
    $target_dir = "images/";

    // Move the uploaded files to the target directory
    move_uploaded_file($_FILES['img1']['tmp_name'], $target_dir . $img1);
    

    $q = "UPDATE product SET name='$pname', description='$desc', price='$price', image='$img1', stock='$stock'
    WHERE product_id='$pid'";
    $r = mysqli_query($conn, $q) or die("Can't execute the query...");

    header("location: display_products.php");
}
?>