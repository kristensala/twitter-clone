<?php
session_start();
include 'connect.php';
$id = $_SESSION['id'];
$tweet = $_POST['tweet'];

$insert = "insert into t142359v2_tweet (user_id, tweet, insert_date) values ('$id', '$tweet', NOW());";

mysqli_query($connect, $insert);
mysqli_close($connect);
header("Location: index.php");



?>
