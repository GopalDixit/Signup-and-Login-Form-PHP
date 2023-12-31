<?php
$hostName = 'localhost';
$username = 'root';
$password = '';
$database = 'signupforms';

$connection = mysqli_connect($hostName,$username,$password,$database);

if(!$connection){
    die(mysqli_error($connection));
}

?>