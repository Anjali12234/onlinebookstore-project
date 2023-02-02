<?php
error_reporting(0);
include "header.php";
?>
<div class="main">
    <div class="content-wrapper">
        <!-- START PAGE CONTENT-->
        <div class="page-heading">
            <h1 class="page-title">Author </h1>
            <hr style="width:100%; height:5px;">
        </div>
        <div class="page-content fade-in-up">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title"></div>
                    <br>
                </div>
                <br>

                <div class="row ">
                    <div class="ibox-body col-md-6">

                        <table class="table table-striped table-bordered table-hover" style="position:sticky;" id="myTable" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Author Name</th>
                                    <th>Image</th>
                                    <th>Description</th>
                                    <th width="160px">Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sno = 1;
                                $select_book = "SELECT * FROM author";
                                $result = mysqli_query($con, $select_book);
                                foreach ($result as $row) {
                                ?>
                                    <tr>
                                        <td><?= $sno; ?></td>
                                        <td><?= $row['author_name'] ?></td>
                                        <td> <img src="./<?= $row['author_image'] ?>" height="50" width="50" alt=""> </td>
                                        <td><?= $row['author_description'] ?></td>
                                        <td>
                                            <a class="btn btn-primary" href="delete_author.php?del_id=<?= $row['auth_id']; ?>" onclick="return confirm('Are you sure want to delete?')"><span class="fa fa-trash"></span></a>
                                            <button type="button" class="btn btn-primary preview-button" value="<?= $row['auth_id']; ?>" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                <span class="fa fa-edit"></span>
                                            </button>
                                            <button id="preview-button" class="btn btn-success  preview-button" value="<?= $row['auth_id']; ?>"><img src="img\file.png" height="30px">Preview</button>
                                        </td>
                                    </tr>
                                <?php $sno++;
                                } ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-5">
                        <form id="form-data" action="insert_author.php" method="POST" enctype="multipart/form-data">
                            <div class="row ">
                                <div class="text-center">
                                    <h4><strong>Add Author</strong></h4>
                                    <hr width="600px">
                                </div>
                                <label>Image:</label>
                                <input type="file" name="image" class="form-control" />
                                <br>
                                <label>Name:</label>
                                <input name="author_name" type="text" class="form-control" placeholder="Author Name" />
                                <br>
                                <label>Description:</label>
                                <textarea name="description" class="form-control" id="description" cols="30" rows="3" placeholder="Write something"></textarea>
                                <br>
                                <div class="col-md-4">
                                    <button type="submit" id="submit-data" class="btn btn-success btn-sm submit-data">Save</button>
                                    <a class="btn btn-danger btn-sm" href="index.php">Cancel</a>
                                </div>
                        </form>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form class="form_edit" action="" method="POST" enctype="multipart/form-data">
                                        <input type="hidden" name="edit_id" value="<?= $row['auth_id']; ?>">
                                        <input type="hidden" name="old_image" value="<?= $row['author_image']; ?>">
                                        <label>Image:</label>
                                        <input type="file" name="image" class="form-control" />
                                        <br>
                                        <?= $row['auth_id']; ?>
                                        <label>Name:</label>
                                        <input name="author_name" type="text" class="form-control" value="<?= $row['author_name']; ?>" placeholder="Author Name" />
                                        <br>
                                        <label>Description:</label>
                                        <textarea name="description" class="form-control" id="description" cols="30" rows="3" placeholder="Write something"><?= $row['author_description']; ?></textarea>
                                        <br>
                                        <div class="modal-footer">
                                            <button type="submit" id="submit-data" class="btn btn-success btn-sm submit-data">Save</button>

                                            <a class="btn btn-danger btn-sm" href="author.php">Cancel</a>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>


            </div>

        </div>
    </div>
</div>
<script>
    // $(document).ready(function() {
    //     $('.form_edit').submit(function(e) {
    //         e.preventDefault();
    //         var authid = 'id';
    //         alert(authid);
    //         $.ajax({
    //             type: "POST",
    //             url: "update.php",
    //             //   data: $(this).serialize(),
    //             data: {
    //                 authid: auth_id
    //             },
    //             success: function(response) {
    //                 if (response === 'success') {
    //                     alert('Form updated successfully');
    //                 } else {
    //                     alert('Failed to update form');
    //                 }
    //             }
    //         });
    //     });
    // });

    $('.preview-button').on('click', function(e) {
        let authid = $(this).val();
        alert (authid);
        $.ajax({    //create an ajax request to get product details
        type: "POST",
        url: "update.php",
        dataType: "json",   //expect json to be returned
        data : {id :authid},
        success: function(data){
            console.log(data);
             
           
            console.log("success getting author details");
            $('#exampleModal').modal('show');

        },
        error: function(response) {

            console.log('ERROR BLOCK');
            console.log(response);
        }

    });
    });
</script>


</body>
<html