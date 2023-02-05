<?php 

include "../connect.php";


$id=$_POST['catid'];
$category_name = $_POST['category_name'];
$update_book="UPDATE `category` SET `category_name`='$category_name'  WHERE catid='$id'";
echo "$update_book";
$query=mysqli_query($con,$update_book);

if($query){
    header('location:category.php');    
}else{
    echo "File not Updated";
}
?>