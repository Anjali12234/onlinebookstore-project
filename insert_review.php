<?php
@include('connect.php');

$comment = $_POST['review'];
$book_id = $_POST['book_id'];

$sql = "INSERT INTO `comments`(`comment`, `book_id`) VALUES ('$comment','$book_id')";

if ($con->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}

$con->close();
?>
