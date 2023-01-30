<?php
session_start();
@include("../connect.php");
if (mysqli_connect_error()) {
  die('Connect Error (' . mysqli_connect_errno() . ')' . mysqli_connect_error());
} 
else {

  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $sql = "SELECT * FROM userlogin WHERE username = '$username'";
  $result = $con->query($sql);
  $row = $result->fetch_assoc();
  // check if the entered username is "admin"
  if ($username == "admin") {
    // check if the entered password is correct
    if (password_verify($password, $row['password'])) {
      $_SESSION['loggedin'] = true;
      $_SESSION['email'] = $email;
      header('location:../admin/index.php');
    } else {
      echo "Incorrect email or Password";
    }
  } else {
    // check if the entered password is correct
    if (password_verify($password, $row['password'])) {
      $_SESSION['loggedin'] = true;
      $_SESSION['email'] = $email;
      $_SESSION["user_id"] = $row['user_id'];

      $_SESSION['username'] = $row['username'];
      header('location:../index.php');
    } else {
      echo "Incorrect password.";
    }
  }
}
