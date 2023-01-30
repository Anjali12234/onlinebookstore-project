<?php
@include("header.php");
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-4 mt-5">
            <h4> <a href="userindex.php"> My Library</a></h4>
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

    </div>