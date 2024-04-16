<?php include 'header.php';?>

    
        <?php include 'sidebar.php';?>
            
<?php
        $query="select * from restaurant";
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
                    <h4 class="mb-1 mt-0">Restaurants</h4>
                    
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <p class="sub-header">
                                <?php if(isset($_SESSION["delete"]) && $_SESSION["delete"]==true){?>
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                                                    Restaurant Deleted
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div> 
                                <?php }?> 
                                <?php if(isset($_SESSION["update"]) && $_SESSION["update"]==true){?>
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                                                    Restaurant Updated
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div> 
                                <?php }?>


                            </p>
<a href="add_restaurant.php">
                    <button type="button" class="btn btn-primary" style="float: right;"><i style="margin-right: 6px;height: 20px;" class="plus-circle" data-feather="plus-circle"></i>Add</button></a>
                            <table id="basic-datatable" class="table dt-responsive nowrap">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Image</th>
                                        <th>Email</th>
                                        <th>Address</th>
                                        <th>State</th>
                                        <th>City</th>
                                        <th>Contact</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                            
                            
                                <body>
                                <?php
                                    $_SESSION["delete"]=false;
                                    $_SESSION["update"]=false;

                                   while($row=mysqli_fetch_array($res))
                                   {
                                
                                ?>
                                
                                    <tr>
                                        <td><?php echo $row["Restaurant_name"];?></td>
                                        <td><?php if($row["Restaurant_image"]) {?><img style="width: 50px;height: 50px    " src="http://localhost/mealbox/admin/images/<?php echo $row["Restaurant_image"];?>"/><?php }?></td>
                                        <td><?php echo $row["Restaurant_email"];?></td>
                                        <td><?php echo $row["Restaurant_address"];?></td>
                                        <td><?php echo $row["State"];?></td>
                                        <td><?php echo $row["City"];?></td>
                                        <td><?php echo $row["Restaurant_contact"];?></td>
                                        <td><a href="edit_restaurant.php?id=<?php echo $row["Restaurant_id"];?>" class="btn btn-success">Edit</a>
                                            <a  class="btn btn-danger" href="delete_restaurant.php?delete=<?php echo $row["Restaurant_id"];?>">Delete</a>
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