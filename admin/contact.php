<?php include 'header.php';?>

    
        <?php include 'sidebar.php';?>
            
<?php
        $query="select * from contact_us";
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
                    <h4 class="mb-1 mt-0">Contacts</h4>
                    
                </div>
            </div>

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
                                        <th>Email</th>
                                        <th>Contact</th>
                                        <th>Message</th>
                                    </tr>
                                </thead>
                            
                            
                                <body>
                                  <?php  while($row=mysqli_fetch_array($res))
                                   {
                                
                                ?>
                                
                                
                                    <tr>
                                        <td><?php echo $row["Name"];?></td>
                                        
                                        <td><?php echo $row["Email"];?></td>
                                        <td><?php echo $row["Contact"];?></td>
                                        <td><?php echo $row["Message"];?></td>
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