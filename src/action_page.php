<?php

include 'connection.php';
$email = $_GET['email'];
$discount = $_GET['psw'];
$url = $_GET['url'];

if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
  if ($discount > 0) {
    $q = "INSERT INTO `cart`(`sno`, `email`, `url`, `disount`) VALUES ('','$email','$url','$discount');";
    $query = mysqli_query($connection, $q);
    if ($query)
      echo 'done';
  } else {
    echo 'enter valid discount';
    return;
  }
} else {
  echo 'Enter valid email';
  return;
}

?>
