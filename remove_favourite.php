<?php
// Start the session
session_start();

// Check if the two query string variables "id1" and "id2" are set
if (isset($_GET["id1"]) && isset($_GET["id2"])) {
  $id1 = $_GET["id1"];
  $id2 = $_GET["id2"];

  // Validate and sanitize the input data
  $id1 = filter_var($id1, FILTER_VALIDATE_INT);
  $id2 = filter_var($id2, FILTER_VALIDATE_INT);

  if ($id1 === false && $id2 === false) {
    // Invalid data, redirect to error page
    header("Location: error.php");
    exit;
  }


  // Connect to the database
  @include("connect.php");

  // Use the two ids to perform the desired action in the database
  // ...
  // Example query to check if id's exists
  $query = "SELECT * FROM books WHERE id = $id1";
  $result = mysqli_query($con, $query);
  if (mysqli_num_rows($result) > 0) {
    //echo "id1 exists";
  } else {
    echo "id1 does not exists";
  }

  $query = "SELECT * FROM userlogin WHERE user_id = $id2";
  $result = mysqli_query($con, $query);
  if (mysqli_num_rows($result) > 0) {
    // echo "id2 exists";
  } else {
    echo "id2 does not exists";
  }
} else {
  // The two query string variables are not set, redirect to error page
  header("Location: error.php");
  exit;
}

$sql = "SElECT * FROM favourite_book WHERE user_id = $id2 AND book_id= $id1";

$result1 = mysqli_query($con, $sql);

if (mysqli_num_rows($result1) != 0) {
    $insert_book = "DELETE FROM `favourite_book` WHERE book_id='$id1'";
    $query = mysqli_query($con, $insert_book);
    if ($query) {
      header('location:preview.php?id=' . $id1);
    } else {
      echo "File not Updated";
    }
} else {
  header('location:preview.php?id=' . $id1);


}
?>
?>