<?php
include "header.php";


?>
<?php
@include("connect.php");

// Count the number of books
$sql = "SELECT COUNT(*) FROM books";
$sql1 = "SELECT COUNT(*) FROM category";
$sql2 = "SELECT COUNT(*) FROM author";


$result = $con->query($sql);
$result1 = $con->query($sql1);
$result2 = $con->query($sql2);


$count = $result->fetch_row()[0];
$count1 = $result1->fetch_row()[0];
$count2 = $result2->fetch_row()[0];



echo "Number of books: $count";




?>


<div class="main">
  <br>

  

  <div class="container">
    <div class="row">
      <div class="col-md-3" style="background-color:teal; color:white;">
        <h1>Category</h1>

        <p><?php echo $count1; ?></p>


      </div>
      &nbsp;&nbsp;
      <div class="col-md-3" style="background-color:tomato; color:white;">
        <h1>Author</h1>
        <p><?php echo $count; ?></p>

      </div>
      &nbsp;&nbsp;
      <div class="col-md-3" style="background-color:teal; color:white;">
        <h1>No of Books</h1>
        <p><?php echo $count; ?></p>
      </div>
    </div>
  </div>
  

  <script>
    /* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
    var dropdown = document.getElementsByClassName("dropdown-btn");
    var i;

    for (i = 0; i < dropdown.length; i++) {
      dropdown[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var dropdownContent = this.nextElementSibling;
        if (dropdownContent.style.display === "block") {
          dropdownContent.style.display = "none";
        } else {
          dropdownContent.style.display = "block";
        }
      });
    }
  
  </script>