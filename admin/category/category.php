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


                </div>

            </div>
        </div>
    </div>