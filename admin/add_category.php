<?php
include('admin_navbar.php');
?>
<html>

<head>
    <title>Admin Category</title>
    <style>
 
        body {
            background-color: #f1c40f; /* Background color */
            color: #2c3e50; /* Text color */
            font-family: Arial, sans-serif;
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
            color: #3498db; /* Header color */
            margin-bottom: 20px;
        }

        form {
            background-color: #ecf0f1; /* Form background color */
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px; /* Adjust width as needed */
        }

        input[type="text"],
        input[type="file"] {
            width: calc(100% - 22px); /* Adjust input width */
            padding: 10px;
            margin-bottom: 10px;
            box-sizing: border-box;
            border: 1px solid #bdc3c7; /* Border color */
            border-radius: 5px;
        }

        input[type="submit"],
        input[type="reset"] {
            background-color: #3498db; /* Button color */
            color: #ecf0f1; /* Button text color */
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover,
        input[type="reset"]:hover {
            background-color: #2980b9; /* Darker button color on hover */
        }
    </style>
    </style>
</head>

<body bgcolor="coffee">
    <center>
        <h1>Add Category</h1>
        <form method="POST" action="">
            Category Name : <input type="text" name="Catname" placeholder="Category Name" required><br><br>
            Category Image : <input type="File" name="Catimage" placeholder="Category image" required><br><br>
            <input type="submit" name="add" value="Add Category">
            <input type="reset" value="Clear">
        </form>
    </center>
</body>

</html>

<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require('../connection.php');
    if(isset($_POST['add']))
                     {
                      $cn=$_POST['Catname'];
                      $ci=$_POST['Catimage'];
                      $q="insert into category(cat_name,cat_image)values('$cn','$ci')";
                      if (mysqli_query($conn,$q)==true) 
                      {
                       echo "<script>alert('Added!')</script>";
                      }
                     
    
                  }
?>