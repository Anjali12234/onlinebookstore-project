<?php
// Connect to the database
@include("../connect.php");

if (mysqli_connect_error()){
  die('Connect Error ('. mysqli_connect_errno() .') '
    . mysqli_connect_error());
}
else{
  $name = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $password = password_hash($password, PASSWORD_DEFAULT); //password hashing
  $address = $_POST['address'];
  $phone_number = $_POST['phone_number'];
  
  $sql = "INSERT INTO `userlogin`(`username`, `email`, `address`, `phone_number`, `password`) VALUES ('$name','$email','$address','$phone_number','$password')";
  
  if ($con->query($sql)){
    echo "New record is inserted sucessfully";
  }
  else{
    echo "Error: ". $sql ."
". $con->error;
  }
  $con->close();
}
?>
