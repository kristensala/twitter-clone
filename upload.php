<?php
session_start();

include 'connect.php';

$user_id = $_SESSION['id'];
$msg = "";
if (isset($_POST['upload'])) {
  if (getimagesize($_FILES['image']['tmp_name'])== FALSE) {
    echo "select an image";
  } else {
    $image = addslashes($_FILES['image']['tmp_name']);
    $name = addslashes($_FILES['image']['name']);
    $image = file_get_contents($image);
    $image = base64_encode($image);
    saveImage($name, $image);
  }
}
function saveImage($name,$image) {
  include 'connect.php';
  $user_id = $_SESSION['id'];
  $insert = "insert t142359_image (user_id, name, image) values('$user_id', '$name', '$image');";
  $result = mysqli_query($connect, $insert);
  if ($result) {
    echo "Image uploaded";
  } else {
    echo "image not uploaded";
  }

}

 ?>
