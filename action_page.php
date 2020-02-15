<?php
include 'connection.php';
 $email = $_GET['email'];
 $discount = $_GET['psw'];
  $url=$_GET['url'];
if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
  if($discount>0)
  {
    //echo 'heelo';
      $q1 = "SELECT * FROM `cart` WHERE 1;";

        $query = mysqli_query($conn,$q1);
        $z=0;
        while($qu = mysqli_fetch_array($query,MYSQLI_ASSOC)){
           $z = $qu['sno'];
        }
         $q1 = "SELECT * FROM `cart` WHERE 1;";
      
        $query = mysqli_query($conn,$q1);
        $y=0;
        while($qu = mysqli_fetch_array($query,MYSQLI_ASSOC)){
           $y = $qu['sno'];
        }
       $z++;
       $y++;
      $q="INSERT INTO `cart`(`sno`, `email`, `url`, `disount`) VALUES ('$z','$email','$url','$discount');";
      $a3 = "INSERT INTO `user`(`email`, `sno`) VALUES ('$email','$y');";
      $que =  mysqli_query($conn,$a3);
      $query = mysqli_query($conn,$q);
      if($query){
          echo 'done';
          header("location:index.php");
      } 

        
  }
    else{
        echo 'enter valid discount';
        return;
    }
} else {
    echo 'Enter valid email';
     return;
}
?>