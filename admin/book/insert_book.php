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
 
$pdf = $_FILES['pdf']['name'];
$pdf_type = $_FILES['pdf']['type'];
$pdf_size = $_FILES['pdf']['size'];
$pdf_tem_loc = $_FILES['pdf']['tmp_name'];
$pdf_store = "pdf/".$pdf;
move_uploaded_file($pdf_tem_loc,$pdf_store);

$sql = "INSERT INTO `books`(`book_name`, `book_image`, `description`, `status`, `publish_date`, `publisher_name`, `cat_id`, `fk_auth_id`, `book_pdf`) VALUES ('$book_name','$path','$description','$status','$publication_date','$publication_name','$cat_id','$auth_id','$pdf')";
$query = mysqli_query($con,$sql);
echo "<pre>";
var_dump($query);
if($query){
    header('location:book.php');
}
else{
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
}

?>