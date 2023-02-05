<?php
error_reporting(0);
include "header.php";
?>
<div class="main">
    <div class="content-wrapper">
        <!-- START PAGE CONTENT-->
        <div class="page-heading">
            <h1 class="page-title">Category </h1>
            <hr style="width:100%; height:5px;">

        </div>
        <div class="page-content fade-in-up">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title"></div>


                    <br>
                </div>
                <br>

                <div class="row">
                    <div class="ibox-body col-md-6">

                        <table class="table table-striped table-bordered table-hover" style="position:sticky;" id="myTable" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Category Name</th>
                                    <th width="160px">Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sno = 1;
                                $select_book = "SELECT * FROM category";
                                $result = mysqli_query($con, $select_book);
                                foreach ($result as $row) {
                                ?>
                                    <tr>
                                        <td><?= $sno; ?></td>
                                        <td><?= $row['category_name'] ?></td>

                                        <td>

                                            <a class="btn btn-primary" href="delete_category.php?del_id=<?= $row['catid']; ?>" onclick="return confirm('Are you sure want to delete?')"><span class="fa fa-trash"></span></a>
                                            <a href="#?up_id=<?= $row['catid'] ?>"><button type="button" class="btn btn-primary preview-button" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                    <span class="fa fa-edit"></span>
                                                </button></a>
                                        </td>


                                    </tr>
                                <?php $sno++;
                                } ?>

                            </tbody>


                        </table>
                    </div>
                    <div class="col-md-6">


                        <form style="margin-left: 300px;" action="insert_category.php" method="POST" enctype="multipart/form-data">


                            <div class="row">
                                <div>
                                    <h4><strong>Add Category</strong></h4>
                                    <hr width="200px">
                                </div>

                                <div class="col-xs-12 col-sm-6 col-md-6 ">
                                    <div class="form-group text-black">
                                        <strong> Category Name:</strong>
                                        <input type="text" name="category_name" placeholder="Category name">
                                    </div>
                                </div>

                            </div>

                            <br>

                            <div class="col-xs-12 col-sm-12 col-md-12 text-left">
                                <button type="submit" class="btn btn-primary">
                                    <center>Update</center>
                                </button>
                                <a class="btn btn-danger" href="../index.php"> Back</a>
                            </div>

                        </form>

                    </div>
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
                                <?php
                                $id = $_GET['up_id'];
                                $sno = 1;
                                $select_book = "SELECT * FROM category";
                                $result = mysqli_query($con, $select_book);
                                $row = mysqli_fetch_assoc($result);
                                ?>
                                <form class="form_edit" action="#" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" name="edit_id" value="<?= $row['catid']; ?>">
                                    <div class="col-xs-12 col-sm-6 col-md-6 ">
                                        <div class="form-group text-black">
                                            <strong> Category Name:</strong>
                                            <input type="text" name="category_name" value="<?= $row['category_name']; ?>" placeholder="Category name">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="modal-footer">
                                        <button type="submit" id="submit-data" class="btn btn-success btn-sm submit-data">Save</button>

                                        <a class="btn btn-danger btn-sm" href="category.php">Cancel</a>
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
<script>
    $('.preview-button').on('click', function(e) {
        let cat_id = $(this).val();
        alert (cat_id);
        $.ajax({    //create an ajax request to get product details
        type: "POST",
        url: "update.php",
        dataType: "json",   //expect json to be returned
        data : {id :cat_id},
        success: function(data){
            console.log(data);
             
           
            console.log("success getting category details");
            $('#exampleModal').modal('show');

        },
        error: function(response) {

            console.log('ERROR BLOCK');
            console.log(response);
        }

    });
    });
</script>