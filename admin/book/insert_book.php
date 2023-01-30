<?php
include "../connect.php";
$book_name = $_POST['book_name'];
$author_name = $_POST['author_name'];
$publication_name = $_POST['publication_name'];
$cat_id = $_POST['category_name'];
$auth_id = $_POST['author_name'];
$publication_date = $_POST['publication_date'];
$description = $_POST['description'];
$status = $_POST['status'];
$file_name = $_FILES['img']['name'];
$temp_file = $_FILES['img']['tmp_name'];
$path = 'img/books/'.$file_name;

move_uploaded_file($temp_file,$path);
 

$sql = "INSERT INTO `books`(`book_name`, `book_image`, `cat_id`, `publisher_name`, `publish_date`, `status`, `description`, `fk_auth_id`) VALUES ('$book_name','$path','$cat_id','$publication_name','$publication_date','$status','$description','$auth_id')";
$query = mysqli_query($con,$sql);
echo "<pre>";
var_dump($query);
if($query){
    header('location:book.php');
}
else{
    echo"Something went wrong";
}

?>