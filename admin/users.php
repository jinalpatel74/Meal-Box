<?php include 'header.php';?>

    
        <?php include 'sidebar.php';?>
            
<?php
        $query="select * from customer";
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
                                      <h4 class="mb-1 mt-0">Users</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <p class="sub-header">
                                <?php if(isset($_SESSION["delete"]) && $_SESSION["delete"]==true){?>
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                                                    User Deleted
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div> 
                                <?php }?> 
                                <?php if(isset($_SESSION["update"]) && $_SESSION["update"]==true){?>
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                                                    User Updated
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
                            
                            </p>

                            <table id="basic-datatable" class="table dt-responsive nowrap">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Image</th>
                                        <th>Address</th>
                                        <th>Email</th>
                                        <th>Contact</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                            
                            
                                <tbody>
                                <?php
                                   while($row=mysqli_fetch_array($res))
                                   {
                                
                                ?>
                                
                                    <tr>
                                        <td><?php echo $row["Customer_name"];?></td>
                                        <td><?php if($row["Customer_Image"]) {?><img style="width: 50px;height: 50px    " src="http://localhost/mealbox/restaurants/images/<?php echo $row["Customer_Image"];?>"/><?php }?></td>
                                        <td><?php echo $row["Customer_address"];?></td>
                                        <td><?php echo $row["Customer_email"];?></td>
                                        <td><?php echo $row["Customer_contact"];?></td>
                                        <td><a href="edit_user.php?id=<?php echo $row["Customer_id"];?>" class="btn btn-success">Edit</a>
                                            
                                            <a  class="btn btn-danger" href="delete_user.php?delete=<?php echo $row["Customer_id"];?>">Delete</a>
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