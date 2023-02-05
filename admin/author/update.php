<?php 

include "../connect.php";

die();
$id=$_POST['auth_id'];
$old_image=$_POST['old_image'];
$auth_name = $_POST['author_name'];
$description = $_POST['description'];
$file_name=$_FILES['image']['name'];
$temp_file=$_FILES['image']['tmp_name'];
$path="img/authors/".$file_name;
if(move_uploaded_file($temp_file,$path)){
    $path="img/authors/".$file_name;
}else{
    $path=$old_image; 

}
$update_book="UPDATE `author` SET `author_name`='$auth_name',`author_description`='$description',`author_image`='$path'  WHERE auth_id='$id'";
echo "$update_book";
$query=mysqli_query($con,$update_book);

if($query){
    header('location:authors.php');    
}else{
    echo "Error: " . $update_book . "<br>" . mysqli_error($con);
}
?>