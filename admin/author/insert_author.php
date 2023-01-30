<?php
include "../connect.php";
$author_name = $_REQUEST['author_name'];
$description = $_REQUEST['description'];
$file_name = $_FILES['image']['name'];
$temp_file = $_FILES['image']['tmp_name'];
$path = 'img/authors/'.$file_name;
move_uploaded_file($temp_file,$path);
$sql = "INSERT INTO `author`(`author_name`, `author_description`, `author_image`) VALUES ('$author_name','$description','$path')";
$query = mysqli_query($con,$sql);

if($query){
    header('location:author.php');
}
else{
    echo"Something went wrong";
}

?>