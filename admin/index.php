<?php include 'header.php';?>
<?php include 'sidebar.php';
    $query="select count(*) from restaurant";
    $ans=mysqli_query($con,$query);
    $row=mysqli_fetch_array($ans);

    $query1="select count(*) from customer";
    $ans1=mysqli_query($con,$query1);
    $row1=mysqli_fetch_array($ans1);

    $query2="select count(*) from order_detail";
    $ans2=mysqli_query($con,$query2);
    $row2=mysqli_fetch_array($ans2);
    
?>
            <!-- END wrapper -->
<div class="content-page">
    <div class="content">
        <div class="container-fluid">
            <div class="row page-title align-items-center">
                <div class="col-sm-4 col-xl-6">
                    <h4 class="mb-1 mt-0">Dashboard</h4>
                </div>
            </div>

                                <!-- content -->
            <div class="row">
                <div class="col-md-6 col-xl-3">
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="media px-3 py-4 border-bottom">
                                <div class="media-body">
                                    <h4 class="mt-0 mb-1 font-size-22 font-weight-normal"><?php echo $row1[0]?></h4>
                                    <span class="text-muted">Total Users</span>
                                </div>
                                <i data-feather="users" class="align-self-center icon-dual icon-lg"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-3">
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="media px-3 py-4 border-bottom">
                                <div class="media-body">
                                    <h4 class="mt-0 mb-1 font-size-22 font-weight-normal"><?php echo $row[0]?></h4>
                                    <span class="text-muted">Total Restaurant</span>
                                </div>
                                <i data-feather="home" class="align-self-center icon-dual icon-lg"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-3">
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="media px-3 py-4 border-bottom">
                                <div class="media-body">
                                    <h4 class="mt-0 mb-1 font-size-22 font-weight-normal"><?php echo $row2[0]?></h4>
                                    <span class="text-muted">Total Orders</span>
                                </div>
                                <i data-feather="shopping-cart" class="align-self-center icon-dual icon-lg"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <?php include 'footer.php';?>

           

