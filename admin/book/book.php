<?php
error_reporting(0);
include "header.php";
?>
<div class="main">
    <div class="content-wrapper">
        <!-- START PAGE CONTENT-->
        <div class="page-heading">
            <h1 class="page-title">Book Table</h1>

        </div>
        <div class="page-content fade-in-up">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="pull-right ">
                        <a class="btn btn-primary   ml-5  mb-2 " href="book_form.php"> Add Book</a>
                        <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search Book Name">
                        <div id="search-results"></div>

                    </div>
                    <br>
                </div>
                <hr style="width:100%; height:5px;">
                <br>
                <div class="ibox-body">

                    <table class="table table-striped table-bordered table-hover" style="position:sticky;" id="myTable" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Cover Photo</th>
                                <th>Book Name</th>
                                <th>Author</th>
                                <th>Category</th>
                                <th>Publisher</th>
                                <th>Published Date</th>
                                <th>Status</th>
                                <th width="110px">Action</th>


                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sno = 1;
                            $num_per_page = 05;
                            if (isset($_GET["page"])) {
                                $page = $_GET["page"];
                            } else {
                                $page = 1;
                            }
                            $start_from = ($page - 1) * 05;
                            $select_book = "SELECT * FROM books, category, author WHERE category.catid = books.cat_id AND author.auth_id = books.fk_auth_id limit $start_from,$num_per_page";

                            $result = mysqli_query($con, $select_book);


                            while ($rows = mysqli_fetch_array($result)) {

                            ?>
                                <tr>
                                    <td><?= $sno; ?></td>
                                    <td><img src="<?= $rows['book_image'] ?>" width="150" height="100"></td>
                                    <td> <?= $rows['book_name']; ?></td>
                                    <td><?= $rows['author_name']; ?></td>
                                    <td><?= $rows['category_name']; ?></td>
                                    <td><?= $rows['publisher_name']; ?></td>
                                    <td><?= $rows['publish_date']; ?></td>

                                    <td><?php
                                        if ($rows['status'] == 1) {
                                            echo "<button class='btn btn-success text-black'>Active</button>";
                                        } else {
                                            echo "<button class=' btn btn-danger text-black'>Inactive</button>";
                                        }
                                        ?> </td>

                                    <td>
                                        <a class="btn btn-primary" href="edit_form_book.php?edit_id=<?= $rows['id']; ?>"><span class="fa fa-edit"></span></a>
                                        <a class="btn btn-primary" href="delete_book_detail.php?del_id=<?= $rows['id']; ?>" onclick="return confirm('Are you sure want to delete?')"><span class="fa fa-trash"></span></a>
                                    </td>




                                <?php $sno++;
                            } ?>


                                </tr>

                        </tbody>


                    </table>
                </div>
                <div style=" text-align: center  ; ">
                    <?php

                    $select_book = "SELECT * FROM books";
                    $result = mysqli_query($con, $select_book);

                    $total_records = mysqli_num_rows($result);
                    // echo $total_records;
                    $total_pages = ceil($total_records / $num_per_page);
                    // echo $total_pages;

                    if ($page > 1) {
                        echo "<a  href ='book.php?page=" . ($page - 1) . "' class='btn btn-none border border-success'   text-success'>Previous</a>";
                    }
                    for ($i = 1; $i <= $total_pages; $i++) {

                        echo "<a   href ='book.php?page=" . $i . "' class='btn btn-none border border-success  text-success'>" . $i . "</a>";
                    }
                    if ($i > $page) {
                        echo "<a   href ='book.php?page=" . ($page + 1) . "' class='btn btn-none border border-success  text-success '>Next</a>";
                    }


                    ?>
                </div>

            </div>

        </div>
    </div>
</div>
<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[2];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>
</body>
</html>