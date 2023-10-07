<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Not Found</title>
    

    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
        }

        .container {
            max-width: 800px;
            margin: 100px auto;
            display: flex;
            align-items: center;
           
          
           
            padding: 40px;
        }

        .image {
            flex: 1;
            max-width: 500px;
        }

        .image img {
            display: block;
            width: 100%;
            height: auto;
            border-radius: 5px;
        }

        .message {
            flex: 2;
            text-align: left;
            padding: 0 20px;
        }

        h2 {
            font-size: 23px;
            color: #e74c3c;
            margin: 0;
        }

        p {
            font-size: 15px;
            color: #333333;
            line-height: 1.6;
        }

        .home-button {
            display: inline-block;
            background-color: #3498db;
            color: #ffffff;
            font-size: 18px;
            padding: 12px 24px;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .home-button:hover {
            background-color: #2980b9;
        }
    </style>

</head>
<body>
    <div class="container">
        <div class="image">
            <img src="../img/404.png" alt="Error Image" width="500" height="500">
        </div>
        <div class="message">
            <h2>Oops! The page you are looking for cannot be found.</h2>
            <p>Sorry, the page you requested could not be found. It might have been moved or deleted.</p>
            <p><a href="../home.php" class="home-button">Go Home</a></p>
        </div>
    </div>
</body>
</html>
