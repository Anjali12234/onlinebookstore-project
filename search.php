<?php
//connect to the database
@include("connect.php");
//get the search term from the GET request
$search = mysqli_real_escape_string($con, $_GET['search']);
if($search != null){



//query the database for the search results
$sql = "SELECT * FROM books WHERE book_name LIKE '%$search%'";
$result = mysqli_query($con, $sql);

//loop through the results and display them on the page
while($row = mysqli_fetch_array($result)) {
    echo '<a class="text-black" href="preview.php?id='.$row['id'].'">'.$row['book_name'].'</a><br>';
}
}

?>
