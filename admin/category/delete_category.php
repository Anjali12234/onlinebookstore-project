<?php
include "../connect.php";
$id=$_GET['del_id'];

$del_book = "DELETE FROM category WHERE catid=$id";
$query=mysqli_query($con, $del_book);
if($query){
    header('location:category.php');
} 
else{
    echo "Data not Deleted";
}
?>