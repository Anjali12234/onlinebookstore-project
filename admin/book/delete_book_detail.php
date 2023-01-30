<?php
include "../connect.php";
$id=$_GET['del_id'];

$del_book = "DELETE FROM books WHERE id=$id";
$query=mysqli_query($con, $del_book);
if($query){
    header('location:book.php');
} 
else{
    echo "Data not Deleted";
}
?>