<?php
@include("connect.php");
@include("header.php");
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-4 mt-5">
            <h4>My Library</h4>
            <br>
            <div mt-3>
                <form class="d-flex mt-3" role="search">
                    <input type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
            <div mt-3>
                <br>
                <?php
                @include("connect.php");

                // Count the number of books
                $userId = $_SESSION['user_id'];

                $sql = "SELECT COUNT(*) FROM favourite_book WHERE favourite_book.user_id='$userId'";
                $result = $con->query($sql);
                $count = $result->fetch_row()[0];
                ?>
                <p><a href="userindex.php" class="text-danger text-decoration-none">My Library</a></p>
                <p><a href="favourite.php" class="text-black text-decoration-none ">Favourites(<?php echo $count; ?>)</a></p>


                <p><a href="" class="text-black text-decoration-none ">Books for you</a></p>
                <p><a href="" class="text-black text-decoration-none ">My hIstory</a></p>

            </div>
        </div>
        <div class="col-md-8 mt-5">
            <h4>Favourites</h4>
            <?php
            $userId = $_SESSION['user_id'];
            $select_book = "SELECT * FROM books, favourite_book, author,category WHERE favourite_book.book_id = books.id AND books.fk_auth_id = author.auth_id AND books.cat_id = category.catid AND favourite_book.user_id = $userId";

            $result = mysqli_query($con, $select_book);


            while ($rows = mysqli_fetch_array($result)) {

            ?>
            <div class="row col-md-8">
                <div class="col-md-3">
                    <img src="admin/book/<?php echo $rows['book_image']; ?>" class=" rounded d-block  mx-auto my-auto" height="100px" width="100px" alt="">
                </div>


                <div class="col-md-5 ">

                    <h2> <strong><?php echo $rows['book_name']; ?></strong> </h2>
                    <p><strong><?php echo $rows['author_name']; ?></strong></p>
                    <p> Geners:<strong><?php echo $rows['category_name']; ?></strong></p>
                    <p><?php echo $rows['publisher_name']; ?></p>
                    <p><?php echo $rows['description']; ?></p>

                    <hr style="width:600px">


                </div>
            </div>
           
            <?php 
            } ?>

        </div>
       
    </div>