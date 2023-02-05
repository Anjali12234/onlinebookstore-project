<?php
include("header.php");
?>

<div class="main">
    <div class="content-wrapper ">
        <!-- START PAGE CONTENT-->
        <div class="page-heading">
            <h1 class="page-title">Author </h1>
            <hr style="width:100%; height:5px;">

        </div>
        <div class="page-content fade-in-up ">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Add Author
                        </button>


                    </div>


                    <br>
                </div>
                <br>

                <div class="row">
                    <div class="ibox-body col-md-6 mx-auto text-center ">

                        <table class="table table-striped table-bordered table-hover" style="position:sticky;" id="myTable" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Author Name</th>
                                    <th>Author Image</th>
                                    <th>Author Description</th>
                                    <th width="160px">Action</th>

                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $sno = 1;
                                $select_author = "SELECT * FROM author";
                                $result = mysqli_query($con, $select_author);
                                foreach ($result as $row) {
                                ?>
                                    <tr>
                                        <td><?= $sno; ?></td>
                                        <td><?= $row['author_name'] ?></td>
                                        <td><img src="<?= $row['author_image'] ?>" height="100px" width="100px" alt=""></td>
                                        <td><?= $row['author_description'] ?></td>

                                        <td>

                                            <a href="author.php?up_id=<?= $row['auth_id'] ?>"><button type="button" class="btn btn-primary preview-button" data-bs-toggle="modal" data-bs-target="#updateModal">
                                                    <span class="fa fa-edit"></span>
                                                </button></a>
                                            <a class="btn btn-primary" href="delete_author.php?del_id=<?= $row['auth_id']; ?>" onclick="return confirm('Are you sure want to delete?')"><span class="fa fa-trash"></span></a>
                                        </td>


                                    </tr>
                                <?php $sno++;
                                } ?>

                            </tbody>


                        </table>
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
                                <form action="insert_author.php" method="POST" enctype="multipart/form-data">
                                    <div class="mb-3">
                                        <label class="form-label">Author Name</label>
                                        <input type="text" class="form-control" name="author_name" placeholder="Author Name">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Author Image</label>
                                        <input type="file" class="form-control" name="image">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Author Description</label>
                                        <textarea class="form-control" name="description" rows="3"></textarea>
                                    </div>

                                    <button type="submit" id="submit-data" class="btn btn-success submit-data">Save</button>
                                    <a class="btn btn-danger " href="author.php">Cancel</a>


                                </form>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="updateModalLabel">Modal title</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                            <?php
                                $id = $_GET["up_id"];
                                $sno = 1;
                                $select_author = "SELECT * FROM author";
                                $result = mysqli_query($con, $select_author);
                                $row = mysqli_fetch_assoc($result);
                                ?>
                                <form action="#" method="GET" enctype="multipart/form-data">
                                    <div class="mb-3">
                                        <label class="form-label">Author Name</label>
                                        <input type="text" class="form-control" name="author_name" value="<?= $row['author_name'] ?>" placeholder="Author Name">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Author Image</label>
                                        <input type="file" class="form-control" value="<?= $row['author_image'] ?>" name="image">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Author Description</label>
                                        <textarea class="form-control" name="description"  rows="3"><?= $row['author_description'] ?></textarea>
                                    </div>

                                    <button type="submit" id="submit-data" class="btn btn-success submit-data">Save</button>
                                    <a class="btn btn-danger " href="author.php">Cancel</a>


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
        let id = $(this).val();
        alert (id);
    //     $.ajax({    //create an ajax request to get product details
    //     type: "POST",
    //     url: "update.php",
    //     dataType: "json",   //expect json to be returned
    //     data : {id :cat_id},
    //     success: function(data){
    //         console.log(data);
             
           
    //         console.log("success getting category details");
    //         $('#exampleModal').modal('show');

    //     },
    //     error: function(response) {

    //         console.log('ERROR BLOCK');
    //         console.log(response);
    //     }

    // });
    });
</script>