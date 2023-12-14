<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
  <title>Login Form</title>
  <style>
    body {
  margin: 0;
  padding: 0;
  font-family: 'Arial', sans-serif;
  background: url('img1.jpg') center/cover no-repeat; /* Replace 'background-image.jpg' with your image file */
  height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
}

.login-container {
  background: rgba(255, 255, 255, 0.8);
  padding: 20px;
  border-radius: 8px;
  width: 300px;
}

.login-form {
  display: flex;
  flex-direction: column;
}

h1 {
  text-align: center;
}

label {
  margin-top: 10px;
}

input {
  padding: 8px;
  margin: 5px 0;
  border: 1px solid #ccc;
  border-radius: 4px;
}

button {
  background-color: #4caf50;
  color: white;
  padding: 10px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

button:hover {
  background-color: #45a049;
}
.register-link {
  text-align: center;
  margin-top: 10px;
}

.register-link a {
  color: #3498db;
  text-decoration: none;
}

.register-link a:hover {
  text-decoration: underline;
}
.signup-link {
            text-align: center;
            margin-top: 10px;
        }

        .signup-link a {
            color: #4caf50;
            text-decoration: none;
            font-weight: bold;
        }

        .signup-link a:hover {
            text-decoration: underline;
        }
  </style>
</head>
<body>
  <div class="login-container">
    <form class="login-form" method="POST">
      <h1>Login</h1>
      <label for="username"><b>Email ID</b></label>
      <input type="text" id="username" name="username" required>

      <label for="password"><b>Password</b></label>
      <input type="password" id="password" name="password" required>

      <button type="submit" name="login">Login</button>
      
      <p>Not registered? <a href="registration.php">Sign up</a> here</p>
    </form>
  </div>

 <?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require('connection.php');
session_start();

if (isset($_POST['login'])) {
    $input_email = $_POST['username'];
    $input_password = $_POST['password'];

    // Admin Login Check
    $admin_query = "SELECT * FROM login WHERE username = '$input_email'";
    $admin_result = mysqli_query($conn, $admin_query);
    $admin_row = mysqli_fetch_assoc($admin_result);

    if ($admin_row && $input_password == $admin_row['password']) {
        $_SESSION['username'] = $admin_row['username'];
        $_SESSION['password'] = $admin_row['password'];
        header("Location: ./admin/admin_home.php");
        exit();
    }

    // Customer Login Check
    $customer_query = "SELECT * FROM registration WHERE email = '$input_email'";
    $customer_result = mysqli_query($conn, $customer_query);
    $customer_row = mysqli_fetch_assoc($customer_result);

    if ($customer_row && $input_password == $customer_row['password']) {
        $_SESSION['name'] = $customer_row['name'];
        $_SESSION['cid'] = $customer_row['customer_id'];
        header("Location: ./customer/home.php");
        exit();
    }

    // Invalid credentials for both admin and customer
    echo "<script>alert('Invalid username or password!')</script>";
}
?>


</body>
</html>
