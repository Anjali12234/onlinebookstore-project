<?php 
include "../connect.php";

$name = $_POST['author_name'];
$des = $_POST['description'];
$file_name = $_FILES['image']['name'];
$temp_file=$_FILES['image']['tmp_name'];
$path="img/authors/".$file_name;
move_uploaded_file($temp_file,$path);
$sql="INSERT INTO `author`(`author_name`, `author_image`, `author_description`) VALUES ('$name','$path','$des')";

if (mysqli_query($con, $sql)) {
    header('location:author.php');

} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
}

// Close connection
mysqli_close($con);

?>