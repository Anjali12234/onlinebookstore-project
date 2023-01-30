<?php
include "../connect.php";
$id=$_GET['del_id'];

$del_book = "DELETE FROM author WHERE auth_id=$id";
$query=mysqli_query($con, $del_book);
if($query){
    header('location:author.php');
} 
else{
    echo "Data not Deleted";
}
?>