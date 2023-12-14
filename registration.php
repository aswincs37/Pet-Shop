<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require('connection.php');

if (isset($_POST['submit'])) {
  
    $name = $_POST['name'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];


        $query = "INSERT INTO registration (name,email,phone,gender,password)
         VALUES ('$name', '$email','$phone','$gender','$password')";
        $result=mysqli_query($conn, $query);
        if($result)
        {
            echo "<script>alert('Registration Success');</script>";
            echo "<script>window.open('login.php', '_self')</script>";
        }

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
</head>
<body>
    <h2>Registration</h2>
    <form method="POST" action="registration.php">
        <label for="username">Name:</label>
        <input type="text" name="name" required><br><br>

        <label for="email">Email:</label>
        <input type="email" name="email" required><br><br>      

        <label for="phone">Phone:</label>
        <input type="number" name="phone" required><br><br>

        <label for="gender">Gender:</label>
          <input type="radio" name="gender" value="Male" required="true"> Male   
          <input type="radio" name="gender" value="Female" required="true"> Female 
          <input type="radio" name="gender" value="others" required="true"> Others<br>
        </div>   

        <label for="password">Password:</label>
        <input type="password" name="password" required><br><br>

        <input type="submit" name ="submit" value="Register">
    </form>
</body>
</html>

<style>

body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f0f0f0;
    text-align: center;
}


h2 {
    color: #333;
}

form {
    max-width: 300px;
    margin: 0 auto;
    padding: 20px;
    background-color: #fff;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
}

label {
    display: block;
    margin: 10px 0;
    color: #333;
}

input[type="text"],
input[type="email"],
input[type="number"],
input[type="password"] {
    width: 100%;
    padding: 10px;
    margin: 10px 0;
    border: 1px solid #ccc;
    border-radius: 5px;
}

input[type="radio"] {
    margin: 0 5px;
}

input[type="submit"] {
    background-color: #3498db;
    color: #fff;
    padding: 10px 15px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
}

input[type="submit"]:hover {
    background-color: #2980b9;
}

</style>
