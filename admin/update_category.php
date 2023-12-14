<body>
    <form action="" method="POST" enctype="multipart/form-data">
        <?php
        session_start();
        require('../connection.php');

        if (!empty($_GET['cat_id'])) {
            $cid = $_GET['cat_id'];
            $q = "SELECT * FROM category where cat_id='$cid'";
            $res = mysqli_query($conn, $q);
            $row = mysqli_fetch_assoc($res);
        ?>
            <h2>UPDATE CATEGORY DETAILS</h2>

            Product NAME:<br>
            <input type="text" name="cname" required="TRUE" onkeyup="this.value = this.value.charAt(0).toUpperCase() + this.value.slice(1);"
                value="<?php echo $row['cat_name'] ?>"><br>

            Category Image:<br>
            <img class="img" src="../images/<?php echo $row['cat_image'] ?>" width="50px"><br>

            NEW IMAGE:<br>
            <input type="file" name="Catimage" required="true">

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
    $cname = $_POST['cname'];
    $cid = $_GET['cat_id'];

    // File upload handling
    $file_name = $_FILES['Catimage']['name'];
    $file_tmp = $_FILES['Catimage']['tmp_name'];
    $file_destination = "../images/" . $file_name;

    if (move_uploaded_file($file_tmp, $file_destination)) 
    {
        $q = "UPDATE category SET cat_name='$cname', cat_image='$file_name' WHERE cat_id='$cid'";
        $r = mysqli_query($conn, $q);

        if ($r) {
            echo '<script>alert("Successfully Updated!"); window.open("display_category.php", "_self");</script>';

        } else {
            echo "Error updating category details.";
        }
    } else {
        echo "File upload failed.";
    }
}
?>