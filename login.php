<?php

$login = 0;
$invalid = 0;

if($_SERVER['REQUEST_METHOD']=='POST'){
    include 'connect.php';
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "Select * from `registration` where username='$username' and password='$password'";
    $result = mysqli_query($connection,$sql);
    if($result){
        $numberOfRows = mysqli_num_rows($result);
        if($numberOfRows > 0){
            $login = 1;
            session_start(); // function
            $_SESSION['username']=$username;
            header('location:home.php');
        }
        else{
            $invalid = 1;
        }
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      margin: 0;
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
    }

    form {
      background-color: #fff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      width: 300px;
    }

    label {
      display: block;
      margin-bottom: 8px;
      font-weight: bold;
    }

    input {
      width: 100%;
      padding: 8px;
      margin-bottom: 16px;
      box-sizing: border-box;
    }
    .alert {
      background-color: #f8d7da;
      color: #721c24;
      border: 1px solid #f5c6cb;
      border-radius: 4px;
      padding: 8px;
      margin-top: -50px; 
    }
    .alerts {
      background-color: green;
      color: white;
      border: 1px solid #f5c6cb;
      border-radius: 4px;
      padding: 8px;
      margin-top: -50px; 
    }
    .alert-top {
    position: fixed;
    top: 65px; 
    left: 50%;
    transform: translateX(-50%); 
    width: 80%; 
    z-index: 999; 
    }
    button {
      background-color: #4caf50;
      color: #fff;
      padding: 10px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      width: 100%;
    }

    button:hover {
      background-color: #45a049;
    }
  </style>
</head>
<body>
<?php
     if ($invalid) {
        echo '<div class="alert alert-top" role="alert">
        <strong>Sorry!</strong> User Data Is Invalid.
    </div>';
    }
?>
<?php
     if ($login) {
        echo '<div class="alerts alert-top" role="alert">
        <strong>Successful ...</strong> LoggedIn Successfully.
    </div>';
    }
?>
  <form action="login.php" method="post">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" required>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>

    <button type="submit">Login</button>
  </form>

</body>
</html>
