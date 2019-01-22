<?php
session_start();
include 'connect.php';


$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];

$insert = "insert into t142359v3_users(username, password, email, about) values ('$username','$password','$email', 'Hello my name is $username!');";

mysqli_query($connect, $insert);
mysqli_close($connect);
header("Location: index.php");



?>
