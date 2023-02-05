<?php
include "header.php";
?>
<div class="main">
    <div class="content-wrapper">
        <!-- START PAGE CONTENT-->
        <br>
        <div class="row">
            <br>
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <center>
                        <h2 style="color:darkblue;"><b>Add New Book</b></h2>
                    </center>
                </div>

            </div>
        </div>
        <hr style="width:100%; height:5px;">




        <form action="insert_book.php" method="POST" enctype="multipart/form-data">


            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Cover Photo:</strong>
                        <input type="file" name="img" class="form-control">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Book Pdf:</strong>
                        <input type="file" name="pdf" class="form-control">
                    </div>
                </div>

            </div>
            <div class="row">
               
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Publication Date:</strong>
                        <input type="date" name="publication_date" class="form-control">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Book Name:</strong>
                        <input type="text" name="book_name" class="form-control" placeholder="Book name">
                    </div>
                </div>
              

            </div>
            <div class="row">
               
                <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Author Name:</strong>
                        <select name="author_name" id="author_id" class="form-control">

                            <option value="" disabled selected>Choose...</option>
                            <?php
                             $select_book = "SELECT * FROM author";
                             $result = mysqli_query($con, $select_book);
                             foreach ($result as $row1) {
                            ?>
                                <option value="<?= $row1['auth_id'] ?>"><?= $row1['author_name'] ?></option>
                            <?php
                            } ?>
                        </select>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                    <strong>Category Name:</strong>
                        <select name="category_name" id="category_id" class="form-control">

                            <option value="" disabled selected>Choose...</option>
                            <?php
                             $select_book = "SELECT * FROM category";
                             $result = mysqli_query($con, $select_book);
                             foreach ($result as $row2) {
                            ?>
                                <option value="<?= $row2['catid'] ?>"><?= $row2['category_name'] ?></option>
                            <?php
                            } ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Publication Name:</strong>
                        <input type="text" name="publication_name" class="form-control" placeholder="Publication Name">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="status">
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Description:</strong>
                        <textarea type="text" name="description" class="form-control" placeholder="Write about book"></textarea>
                    </div>
                </div>

            </div>
            <br>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Update</button>
                <a class="btn btn-danger" href="book.php"> Back</a>
            </div>

        </form>


    </div>

</div>