<?php include 'header.php';?>

    
        <?php include 'sidebar.php';?>
            
<?php
        $query="select * from item where Restaurant_id=".$_SESSION["Restaurant_id"];
        $res=mysqli_query($con,$query);

?>
<!-- ============================================================== -->
<!-- Start Page Content here -->
<!-- ============================================================== -->

<div class="content-page">
    <div class="content">
        
        <!-- Start Content-->
        <div class="container-fluid">
            <div class="row page-title">
                <div class="col-md-12">
                                      <h4 class="mb-1 mt-0">Dishes</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <p class="sub-header">
                                <?php if(isset($_SESSION["delete"]) && $_SESSION["delete"]==true){?>
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                                                    Dish Deleted
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div> 
                                <?php }?> 
                                <?php if(isset($_SESSION["update"]) && $_SESSION["update"]==true){?>
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                                                    Dish Updated
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div> 
                                     <?php }?>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <p class="sub-header">
                            <a href="add_dishes.php">
                    <button type="button" class="btn btn-primary" style="float: right;"><i style="margin-right: 6px;height: 20px;" class="plus-circle" data-feather="plus-circle"></i>Add</button></a>
                            </p>

                            <table id="basic-datatable" class="table dt-responsive nowrap">
                                <head>
                                    <tr>
                                        <th>Name</th>
                                        <th>Image</th>
                                        <th>Price</th>
                                        <th>Category</th>
                                        <th>Action</th>
                                    </tr>
                                </head>
                            
                            
                                <body>
                                <?php
                                   while($row=mysqli_fetch_array($res))
                                   {
                                
                                ?>
                                
                                    <tr>
                                        <td><?php echo $row["Item_name"];?></td>
                                        <td><?php if($row["Item_image"]) {?><img style="width: 50px;height: 50px    " src="http://localhost/mealbox/restaurant/images/<?php echo $row["Item_image"];?>"/><?php }?></td>
                                        <td><?php echo $row["Price"];?></td>
                                        <td><?php echo $row["Category"];?></td>
                                        <td><a href="edit_dish.php?id=<?php echo $row["Item_id"];?>" class="btn btn-success">Edit</a>
                                            
                                            <a  class="btn btn-danger" href="delete_dish.php?delete=<?php echo $row["Item_id"];?>">Delete</a>
                                        </td>
                                    </tr>
                                     
                                   <?php }?>
                                </tbody>
                            </table>

                        </div> <!-- end card body-->
                    </div> <!-- end card -->
                </div><!-- end col-->
            </div>
            <!-- end row-->


          


          


            <!-- end row-->
        </div> <!-- container-fluid -->

    </div> <!-- content -->
</p>
</div>
    

    <!-- Footer Start -->
    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                   
                </div>
            </div>
        </div>
    </footer>
    <!-- end Footer -->

</div>

<!-- ============================================================== -->
<!-- End Page content -->
<!-- ============================================================== -->


<?php include 'footer.php';?>