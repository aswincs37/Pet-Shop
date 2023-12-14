<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trendz</title>
</head>
<body>
<?php
include ('navbar.php');
?>

<div class="user">
    <h1>Welcome, <?php session_start(); echo $_SESSION['name']; ?></h1>
</div>

</body>
</html>
<style>
  
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f0f0f0;
}


h1 {
    
    color:black;
}

</style>
