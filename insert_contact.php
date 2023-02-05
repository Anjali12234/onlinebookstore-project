<?php
@include('connect.php');

$username = $_POST['username'];
$email = $_POST['email'];
$subject = $_POST['subject'];

$sql = "INSERT INTO `comments`(`comment`, `book_id`) VALUES ('$comment','$book_id')";

if ($con->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}

$con->close();
?>
