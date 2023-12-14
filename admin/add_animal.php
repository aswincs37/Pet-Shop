<?php
include('admin_navbar.php');
?>
<html>

<head>
    <title>Add products</title>
    <style>
        body {
            color: green;
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa; /* Light background color */
            margin: 0;
            padding: 0;
        }

        center {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        h1 {
            color: #343a40; /* Dark text color */
        }

        form {
            background-color: #ffffff; /* White background color for the form */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 400px; /* Adjust width as needed */
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #343a40; /* Dark text color for labels */
        }

        select,
        input[type="text"],
        input[type="number"],
        input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            box-sizing: border-box;
            background-color: #f8f9fa; /* Light input background color */
            border: 1px solid #ced4da; /* Gray border */
            border-radius: 5px;
            color: #495057; /* Dark text color */
        }

        input[type="checkbox"] {
            margin-right: 5px;
        }

        table {
            width: 100%;
            margin-bottom: 10px;
        }

        table td {
            padding: 5px;
        }

        input[type="submit"],
        input[type="reset"] {
            background-color: #007bff; /* Blue button color */
            color: #ffffff; /* White button text color */
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease; /* Smooth transition on hover */
        }

        input[type="submit"]:hover,
        input[type="reset"]:hover {
            background-color: #0056b3; /* Darker blue button color on hover */
        }
    </style>
</head>

<body>
    <center>
        <h1>Add Animal</h1>
        <form method="POST" action="" enctype="multipart/form-data">
          
            Category: <br>
            <select name="cat">
                <?php
                require('../connection.php');
                $q = "select * from category where cat_id='1'";
                $res = mysqli_query($conn, $q);
                while ($row = mysqli_fetch_assoc($res)) {
                    $catid = $row["cat_id"];
                    $catname = $row["cat_name"];
                    echo '<option value="' . $catid . '">' . $catname . '</option>';
                }
                ?>
            </select>
            <table>
                <tr>
                    <td>Animal Name :</td>
                    <td><input type="text" name="pname" placeholder="Name"></td>
                </tr>
                <tr>
                    <td>Animal Description :</td>
                    <td><input type="text" name="desc" placeholder=" Description"></td>
                </tr>
                <tr>
                    <td>Species:</td>
                    <td><input type="text" name="spec" placeholder="Species"></td>
                </tr>
                <tr>
                    <td>Age :</td>
                    <td><input type="number" name="age" placeholder="age"></td>
                </tr>
                <tr>
                    <td>Price :</td>
                    <td><input type="number" name="price" placeholder="Price"></td>
                </tr>
                <tr>
                    <td>Stock :</td>
                    <td><input type="number" name="stock" placeholder="stock"></td>
                </tr>
                <tr>
                    <td>Image :</td>
                    <td><input type="file" name="image"></td>
                </tr>
            </table><br>
            <input type="submit" name="add" value="Add Product">
            <input type="reset" value="Clear">
        </form>
    </center>
</body>

</html>

<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require('../connection.php');

if (isset($_POST['add'])) {
    $category = $_POST['cat'];
    $pname = $_POST['pname'];
    $spec = $_POST['spec'];
    $age = $_POST['age'];
    $price = $_POST['price'];
    $desc = $_POST['desc'];
    $stock = $_POST['stock'];
    $img = $_FILES['image']['name']; // Accessing the name of the uploaded file

   

    $q = "INSERT INTO animal (cat_id, name, description,species,age, price, image, date, stock) 
          VALUES ('$category','$pname', '$desc', '$spec','$age','$price', '$img', NOW(), '$stock')";

   
    $r = mysqli_query($conn, $q) or die(mysqli_error($con)); // Print MySQL error if any

    if ($r) {
        echo "<script>alert('Successfully Added!')</script>";
    } else {
        echo '<script>alert("Addition Failed!")</script>';
    }
}
?>