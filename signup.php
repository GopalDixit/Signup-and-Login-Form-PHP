<?php

$user = 0;
$success = 0;

if($_SERVER['REQUEST_METHOD']=='POST'){
    include 'connect.php';
    $username = $_POST['username'];
    $password = $_POST['password'];

    // $sql = "insert into `registration`(username,password)
    // values('$username','$password')";
    // $result = mysqli_query($connection,$sql);

    // if($result){
    //     echo "Data inserted succefully";
    // }
    // else{
    //     die(mysqli_error($connection));
    // }

    $sql = "Select * from `registration` where username='$username'";
    $result = mysqli_query($connection,$sql);
    if($result){
        $numberOfRows = mysqli_num_rows($result);
        if($numberOfRows > 0){
            $user = 1;
        }
        else{
            $sql = "insert into `registration`(username,password)
            values('$username','$password')";
            $result = mysqli_query($connection,$sql);
            if($result){
                $success=1;
                header('location:login.php');
            }
            else{
                die(mysqli_error($connection));
            }
        }
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Signup Page</title>
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
      margin-top: -50px; /* Adjust this value to move the alert higher or lower */
    }
    .alerts {
      background-color: green;
      color: white;
      border: 1px solid #f5c6cb;
      border-radius: 4px;
      padding: 8px;
      margin-top: -50px; /* Adjust this value to move the alert higher or lower */
    }
    .alert-top {
    position: fixed;
    top: 65px; /* Adjust this value to fine-tune the top position */
    left: 50%;
    transform: translateX(-50%); /* Center the alert horizontally */
    width: 80%; /* Adjust this value to control the width */
    z-index: 999; /* Ensure it appears above other elements */
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
     if ($user) {
        echo '<div class="alert alert-top" role="alert">
        <strong>Sorry!</strong> User Already Exist.
    </div>';
    }
?>
<?php
     if ($success) {
        echo '<div class="alerts alert-top" role="alert">
        <strong>Wow ...</strong> User Added Successfully.
    </div>';
    }
?>

  <form action="signup.php" method="post">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" required>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>

    <button type="submit">Submit</button>
  </form>

</body>
</html>
