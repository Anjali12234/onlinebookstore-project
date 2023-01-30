<?php

include "header.php";
$id = $_REQUEST['edit_id'];

$select_book = "SELECT * FROM books  WHERE id = $id";
$result = mysqli_query($con, $select_book);

$row = mysqli_fetch_assoc($result);
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



        <form action="update_book.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="edit_id" value="<?= $row['id']; ?>">
            <input type="hidden" name="old_image" value="<?= $row['book_image']; ?>">

            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Cover Photo:</strong>
                        <input type="file" name="img" class="form-control">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Description:</strong>
                        <textarea type="text" name="description" class="form-control" placeholder="Write about book"><?= $row['description']; ?></textarea>
                    </div>
                </div>
            </div>

    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Book Name:</strong>
                <input type="text" name="book_name" value="<?= $row['book_name']; ?>" class="form-control" placeholder="Book name">
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Publication Name:</strong>
                <input type="text" name="publication_name" value="<?= $row['publisher_name']; ?>" class="form-control" placeholder="Publication Name">
            </div>

        </div>



    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Publication Date:</strong>
                <input type="date" name="publication_date" value="<?= $row['publish_date']; ?>" class="form-control">
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="form-group">
                <label>Status</label>
                <select class="form-control" name="status">
                    <option value="1" <?php if (($row['status']) == 1) {
                                            echo "selected";
                                        }  ?>>Active</option>
                    <option value="0" <?php if (($row['status']) == 0) {
                                            echo "selected";
                                        } ?>>Inactive</option>
                </select>
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
                    foreach ($result as $row2) {
                    ?>
                        <option value="<?= $row2['auth_id']; ?>" <?php 
                        if ($row['fk_auth_id'] == $row2['auth_id']) {
                            echo "selected";
                        } ?>> <?= $row2['author_name']; ?></option>
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
                    foreach ($result as $row1) {
                    ?>
                        <option value="<?= $row1['catid']; ?>" <?php 
                        if ($row['cat_id'] == $row1['catid']) {
                            echo "selected";
                        } ?>> <?= $row1['category_name']; ?></option>
                    <?php
                    } ?>
                </select>
            </div>
        </div>



        <br><br>
        <br>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Update</button>
            <a class="btn btn-danger" href="book.php">Back</a>
        </div>
        </form>
    </div>