<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pawsandails</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: blueviolet;
            padding: 0;
            background-image: url(../images/login.jpg);
            background-size: cover;
            background-repeat: no-repeat;
            width: 100%;

        }

        .main {
            padding-top: 20px; /* Adjust according to navbar height */
            text-align: center;
            margin-top: 100px;
            color: #333;
        }

        h1{
            margin-top: 200px;
            color:#cc0000;
            text-shadow: 1px 1px 1px 1px #f0f0f0;
        }

        .quote {
            font-style: italic;
            margin-bottom: 20px;
            color: #6600ff;
            text-shadow: 2px 2px 2px 2px whitesmoke;
        }

        .shop-button {
            padding: 10px 20px;
            background-color: yellowgreen;
            color: blueviolet;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        .shop-button:hover {
            background-color: #45a049;
            text-decoration: none;
        }

        .navbar {
            background-color: #4CAF50;
            color: white;
            padding: 10px 0;
            text-align: center;
        }

        .navbar a {
            color: white;
            text-decoration: none;
            margin: 0 10px;
        }

        .navbar a:hover {
            text-decoration: none;
        }
        footer {
            background-color: gray;
            color: white;
            text-align: center;
            padding: 10px 0;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
      
    </style>
</head>
<body>
    <?php
    include ('customer_navbar.php');
    ?>

    <div class="main">
        <h1>Welcome to PAWSANDTAILS</h1>
        <h5 class="quote">"Pets are not our whole life, but they make our lives whole." </h5>
        <a href="categories.php" class="shop-button">Explore</a>
    </div>

    <footer>
        <p>&copy; 2023 Pawsandails. All Rights Reserved.</p>
    </footer>
</body>
</html>
