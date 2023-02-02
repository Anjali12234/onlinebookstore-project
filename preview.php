<?php
include "header.php";
$bookId = $_REQUEST['id'];
$pdo = mysqli_connect('localhost', 'root', '', 'online_book_store');
$select_book = "SELECT * FROM books, category, author WHERE category.catid = books.cat_id AND author.auth_id = books.fk_auth_id";
$result = mysqli_query($pdo, $select_book);

// $row = mysqli_fetch_assoc($result);
while ($row = mysqli_fetch_assoc($result)) {
    if ($bookId == $row['id']) {
?>
        <br>
        <div class="container-fluid">



            <div style="padding-left: 20px;">
                <div class="row col-md-12 ">
                    <div class="col-md-3 ">
                        <img src="admin\book\<?php echo $row['book_image']; ?>" class=" rounded d-block  mx-auto my-auto" height="300px" width="350px" alt="">

                        <?php
                        if (isset($_SESSION['loggedin'])) {


                            $user_id = $_SESSION["user_id"];
                            $query = "SELECT * FROM userlogin WHERE user_id='$user_id'";
                            $result = mysqli_query($con, $query);
                            $user = mysqli_fetch_assoc($result);
                        ?>    
                            <div class="button mt-3 ">
                                <a href="add_favourite.php?id1=<?= $row['id']; ?>&id2=<?php echo $user_id; ?>" class="favourite-button btn-sm btn btn-success">Add to favourite</a>
                                <a href="remove_favourite.php?id1=<?= $row['id']; ?>&id2=<?php echo $user_id; ?>" class="favourite-button btn-sm btn btn-danger">Remove favourite</a>
                                <a href="remove_favourite.php?id1=<?= $row['id']; ?>&id2=<?php echo $user_id; ?>" class="favourite-button btn-sm btn btn-primary">Order</a>

                            </div>
                        <?php
                        } else {
                            echo '<button class="btn btn-success mt-3">Add to favourite</button>
                            <button class="btn btn-success mt-3">Order</button>';
                        }
                        ?>




                    </div>
                    <div class="col-md-5 ">
                        <div>
                            <h2> <strong><?php echo $row['book_name'] ?></strong> </h2>
                            <p><strong><?php echo $row['author_name'] ?></strong></p>
                            <p><?php echo $row['description'] ?></p>
                            <p>Published Date: <?php echo $row['publish_date'] ?></p>
                            <hr style="width:600px">
                        </div>
                       
                        <div class=" mt-5">
                            <h2>About the Author</h2>
                            <div class=" row">
                                <div class="col-md-2 ml-3">
                                    <img src="admin\author\<?php echo $row['author_image'] ?>" class="rounded-circle border border-success" height="100px" width="100px" alt="">
                                </div>
                                <div class="col-md-3 mr-4">
                                    <p><strong><?php echo $row['author_name'] ?></strong></p>
                                </div>
                            </div>
                            <br>
                            <div>
                                <p>Note: <?php echo $row['author_description'] ?></p>
                            </div>
                            <hr style="width:600px">
                        </div>
                    </div>
                    <div class="col-md-4 ">
                        <iframe frameborder="0" scrolling="no" style="border:0px" src="https://books.google.com.np/books?id=c3wrDQAAQBAJ&lpg=PP4&dq=snowwhite&pg=PP4&output=embed" width=450 height=500></iframe>
                    </div>

                </div>
            </div>

            <div class="col-md-12 mt-5 ml-5">
                <h1>Readers also Reads</h1>
                <div class="row bookBody">
                    <?php
                    $catId = $row['cat_id'];
                    $sql = "SELECT * FROM books WHERE cat_id =$catId ORDER BY current_date ASC LIMIT 05";
                    $result = mysqli_query($con, $sql);
                    while ($data = mysqli_fetch_array($result)) {
                    ?>
                        <div class="card" style="width: 16rem;">
                            <img src="admin\book\<?= $data['book_image']; ?>" class="card-img-top" height="200px" width="500px" style="border-radius:10px;" alt="...">
                            <div class="card-body">
                                <h5 class="card-title"><?= $data['book_name']; ?></h5>
                                <!-- <p class="card-text"><?= $data['author_name'] ?></p> -->
                                <button id="preview-button" class="btn btn-success btn-block preview-button" value="<?= $data['id']; ?>"><img src="img\file.png" height="30px">Preview</button>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>

            </div>
            <div class="col-md-6 mt-5 ml-5  ">
                <br>
                <form id="form-data">

                    <input type="hidden" name="book_id" value="<?= $row['id'] ?>">

                    <h1 for="review">Write a review:</h1>
                    <textarea name="review" class="form-control" id="review" cols="30" rows="3"></textarea>
                    <br>


                    <div class="col-md-4">
                        <button type="submit" id="submit-data" class="btn btn-success btn-sm submit-data">Save</button>

                        <a class="btn btn-danger btn-sm" href="product.php">Cancel</a>
                    </div>


                </form>
            </div>


            <div class="row  mt-5 ml-5  ">
                <div class="col-md-6">
                    <h1 for="">View Comment:</h1>
                    <hr width="100px">

                    <?php
                    $select_review = "SELECT * FROM comments WHERE book_id=$bookId";
                    $result = mysqli_query($con, $select_review);
                    while ($rows = mysqli_fetch_array($result)) {
                    ?>

                        <div>
                            <h3><label for=""><?php echo $rows['comment'] ?></label></h3>

                        </div>
                    <?php
                    } ?>


                </div>
            </div>




        </div>
<?php }
} ?>

</div>
<script>
    $(document).ready(function() {
        $(".submit-data").click(function(event) {
            event.preventDefault();
            $.ajax({
                url: 'insert_review.php',
                type: 'POST',
                data: $("#form-data").serialize(),
                success: function(data) {
                    alert(data);
                    $("#review").val('');
                }
            });
        });
    });
    $('.preview-button').on('click', function(e) {
        let id = $(this).val();
        window.location.href = "preview.php?id=" + id;
    });
    $(document).on('click', '.status-button', function() {
        var button = $(this);
        var status = button.data('status');
        var id = button.data('id');
        if (status == 1) {
            button.removeClass('active');
            status = 0;
        } else {
            button.addClass('active');
            status = 1;
        }
        updateStatus(id, status);
    });

    function updateStatus(id, status) {
        $.ajax({
            type: "POST",
            url: "add_favourites.php",
            data: {
                id: id,
                status: status
            },
            success: function(data) {
                console.log(data);
            }
        });
    }
</script>

</body>
<br><br>

<?php include "footer.php"; ?>

</html>