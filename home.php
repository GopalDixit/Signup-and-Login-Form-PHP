<?php
session_start();
if(!isset($_SESSION['username'])){ // if any one try to access home page without login redirect it to login page
    header('location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        h1 {
            color: #333;
        }

        p {
            color: #555;
            font-size: 1.2em;
            line-height: 1.5;
            margin-top: 20px;
        }

        .btn {
            padding: 10px 20px;
            background-color: #333;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            font-size: 1.2em;
            margin-top: -2px;
            display: inline-block;
        }
        .btns {
            padding: 10px 20px;
            background-color: blue;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 1.2em;
            margin-top: 95px;
            margin-right:-1205px;
            display: inline-block;
        }
        .btn:hover {
            background-color: #555;
        }
    </style>
</head>

<body>
    <h1>Welcome</h1>
    <a href="#learn-more" class="btn"><?php echo $_SESSION['username'];?></a>
    <div class="container">
        <a href="logout.php" class="btns btns-primary">Logout</a>
    </div>
</body>

</html>
