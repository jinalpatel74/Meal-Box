<?php include 'header.php';?>

    
        <?php include 'sidebar.php';?>
            
<?php
        $query="select * from order_tbl LEFT JOIN order_detail ON order_tbl.Order_id=order_detail.order_id";
        $res=mysqli_query($con,$query);

        $query1="select * from special_tbl LEFT JOIN order_detail ON special_tbl.Order_id=order_detail.order_id";
        $res1=mysqli_query($con,$query1);
      

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
                    <h4 class="mb-1 mt-0">Orders</h4>
                    
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
                            <table id="basic-datatable" class="table dt-responsive nowrap">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Address</th>
                                      
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
                                        <td><?php echo $row["order_date"];?></td>
                                        <td><?php echo $row["firstName"];?> <?php echo $row["lastName"];?></td>
                                        <td><?php echo $row["email"];?></td>
                                        <td><?php echo $row["address"];?><div><?php echo $row["state"];?><div><?php echo $row["city"];?></div></td>
                                        <td>
                                            <a href="view_order.php?id=<?php echo $row["Order_id"];?>" class="btn btn-success">View</a>
                                        </td>
                                    </tr>
                                   <?php }

                                     while($row1=mysqli_fetch_array($res1))
                                    {                                
                                ?>
                                
                                    <tr>
                                        <td><?php echo $row1["order_date"];?>  <a href="javascript:void(0)" class="btn btn-info btn-sm">Special Order</a>   </td>
                                        <td><?php echo $row1["firstName"];?> <?php echo $row1["lastName"];?></td>
                                        <td><?php echo $row1["email"];?></td>
                                        <td><?php echo $row1["address"];?><div><?php echo $row1["state"];?><div><?php echo $row1["city"];?></div></td>
                                        <td>
                                            <a href="view_special.php?id=<?php echo $row1["Order_id"];?>" class="btn btn-success">View</a>
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