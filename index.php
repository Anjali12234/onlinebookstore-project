<?php include "header.php";
?>
<div class="container">
    <br><br><br>
    <div class="row">

        <div class="col-md-3 ">
            <div class="bg-success" style=" height:50px; width:300px;">
                <h4 class="text-white ml-4 p-2">Category</h4>
            </div>

            <ul class="list-group" style="width:300px;">
                <?php

                $select_book = "SELECT * FROM category";
                $result = mysqli_query($con, $select_book);
                foreach ($result as $row) {
                ?>
                    <li class="list-group-item"><button id="" class=" btn category" value="<?= $row['catid']; ?>"><?= $row['category_name']; ?></button></li>
                <?php } ?>
            </ul>
        </div>
        <div class="col-md-9 ">
            <div class="row bookBody">
                <?php
                $sno = 1;
                $num_per_page = 06;
                if (isset($_GET["page"])) {
                    $page = $_GET["page"];
                } else {
                    $page = 1;
                }
                $start_from = ($page - 1) * 06;
                $select_book = "SELECT * FROM books, category, author WHERE category.catid = books.cat_id AND author.auth_id = books.fk_auth_id limit $start_from,$num_per_page";
                           
                $result = mysqli_query($con, $select_book);             
              
                while ($rows = mysqli_fetch_array($result)) {
                ?>
                    <div class="card" style="width: 18rem;">
                        <img src="admin\book\<?= $rows['book_image']; ?>" class="card-img-top" height="200px" width="500px" style="border-radius:10px;" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?= $rows['book_name']; ?></h5>
                            <p class="card-text"><?= $rows['author_name'] ?></p>
                            <p class="card-text"><?= $rows['category_name'] ?></p>
                            <button id="preview-button" class="btn btn-success btn-block preview-button" value="<?= $rows['id']; ?>"><img src="img\file.png" height="30px">Preview</button>


                        </div>
                    </div>
                <?php $sno++;
                } ?>

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
                    echo "<a  href ='index.php?page=" . ($page - 1) . "' class='btn btn-none border border-success'   text-success'>Previous</a>";
                }
                for ($i = 1; $i <= $total_pages; $i++) {

                    echo "<a   href ='index.php?page=" . $i . "' class='btn btn-none border border-success  text-success'>" . $i . "</a>";
                }
                if ($i > $page) {
                    echo "<a   href ='index.php?page=" . ($page + 1) . "' class='btn btn-none border border-success  text-success '>Next</a>";
                }


                ?>
            </div>

        </div>

    </div>
</div>
<script>
    $('.preview-button').on('click', function(e) {
        let id = $(this).val();
        window.location.href = "preview.php?id=" + id;
    });
    $(document).on('click', '.category', function(e) {
        e.preventDefault();
        var categoryId = $(this).val();
        $.ajax({
            url: 'controller/BookController.php',
            type: 'GET',
            data: {
                displayBook_id: categoryId
            },
            success: function(data) {
                $('.bookBody').html(data);
            }
        });
    });
    
</script>


</body>


<?php include "footer.php"; ?>

</html>