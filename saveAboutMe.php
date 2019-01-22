<?php
session_start();
include 'connect.php';
$id = $_SESSION['id'];
$aboutMe = $_POST['about'];

$insert = "update t142359v3_users set about='$aboutMe' where id=$id;";

mysqli_query($connect, $insert);
mysqli_close($connect);
header("Location: index.php");



?>
