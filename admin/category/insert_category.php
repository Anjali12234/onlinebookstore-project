<?php
include "../connect.php";
if(!$con)
{
   echo"something went wrong";
}
else{
 // echo"successfully connect";
}
$category_name = $_POST['category_name'];
$insert_category = "INSERT INTO `category`( `category_name`) VALUES ('$category_name')";
$query = mysqli_query($con,$insert_category);
if($query){
    header('location:category.php');
}
else{
    echo"Something went wrong";
}

?>