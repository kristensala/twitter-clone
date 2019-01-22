<?php
session_start();
include 'connect.php';

//-----------------------------

$username = $_POST['username'];
$password = $_POST['password'];

$select = "select * from t142359v3_users where username='$username' and password='$password';";

$result = mysqli_query($connect, $select);
$numRows = mysqli_num_rows($result);


if (!$row = mysqli_fetch_assoc($result)) {
  echo "<script type='text/javascript'>alert('Incorrect username or password');</script>";
	header("Location: index.php");
} else {
  $_SESSION['id'] = $row['id'];
  header("Location: profile.php");
}




?>
