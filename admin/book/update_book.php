<?php 

include "../connect.php";
$id=$_POST['edit_id'];
$old_image=$_POST['old_image'];
$book_name=$_POST['book_name'];
$status=$_POST['status'];
$auth_id = $_POST['author_name'];
$description = $_POST['description'];
$publication_name = $_POST['publication_name'];
$cat_id = $_POST['category_name'];

$publication_date = $_POST['publication_date'];
$file_name=$_FILES['img']['name'];
$temp_file=$_FILES['img']['tmp_name'];
$path="img/books/".$file_name;
if(move_uploaded_file($temp_file,$path)){
    $path="img/books/".$file_name;
}else{
    $path=$old_image; 

}
$update_book="UPDATE `books` SET `book_name`='$book_name',`cat_id`='$cat_id',`fk_auth_id`='$auth_id',`publisher_name`='$publication_name',`publish_date`='$publication_date',`book_image`='$path',`status`='$status',`description`='$description' WHERE id='$id'";
$query=mysqli_query($con,$update_book);

if($query){
    header('location:book.php');    
}else{
    echo "File not Updated";
}
?>