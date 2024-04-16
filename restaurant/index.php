<?php include 'header.php';?> 

    
<?php include 'sidebar.php';
    $query="select count(*) from item where Restaurant_id=".$_SESSION["Restaurant_id"];
    $ans=mysqli_query($con,$query);
    $rows=mysqli_fetch_array($ans);

    $query1="select * from order_tbl";
    $ans1=mysqli_query($con,$query1);

    $query2="select count(*) from special_tbl where rest_id=".$_SESSION["Restaurant_id"];
    $ans2=mysqli_query($con,$query2);
    $row2=mysqli_fetch_array($ans2);
    $count=0;
    while($row=mysqli_fetch_array($ans1)){
                                   
        $arr=$row['rest_id'];
        $arr=trim($arr,'"');
        $arr=json_decode($arr);
        foreach ($arr as $key => $value) {
            if($value==intval($_SESSION['Restaurant_id'])){
                $count++;
            }
        }
    }
    $count+=$row2[0];

 
?> 
     
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
                                    <h4 class="mt-0 mb-1 font-size-22 font-weight-normal"><?php echo $count?></h4>
                                    <span class="text-muted">Total Orders</span>
                                </div>
                                <i data-feather="shopping-cart" class="align-self-center icon-dual icon-lg"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-3">
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="media px-3 py-4 border-bottom">
                                <div class="media-body">
                                    <h4 class="mt-0 mb-1 font-size-22 font-weight-normal"><?php echo $rows[0]?></h4>
                                    <span class="text-muted">Total Dishes</span>
                                </div>
                                <i data-feather="grid" class="align-self-center icon-dual icon-lg"></i>
                            </div>
                        </div>
                    </div>
                </div>
             
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php';?>   <!-- END wrapper -->


       

