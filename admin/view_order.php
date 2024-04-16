<?php include 'header.php';?>

    
        <?php include 'sidebar.php';?>
            
<?php
    $id=$_REQUEST["id"];
    $query="select * from order_tbl LEFT JOIN order_detail ON order_tbl.Order_id=order_detail.order_id where order_tbl.Order_id='".$id."'";
    $res=mysqli_query($con,$query);
    $row=mysqli_fetch_array($res);
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
                                                   <!-- Logo & title -->
                            <div class="clearfix">
                                
                                <div class="float-sm-left">
                                    <dl class="row mb-2 mt-3">
                                        <dt class="col-sm-3 font-weight-normal">OrderId :</dt>
                                        <dd class="col-sm-9 font-weight-normal">#<?php echo $row['Order_id']?></dd>

                                        <dt class="col-sm-3 font-weight-normal">Date:</dt>
                                        <dd class="col-sm-8 font-weight-normal"><?php echo $row['order_date']?></dd>

                                    </dl>
                                </div>
                                                        
                            </div>

                            <div class="row mt-4">
                                <div class="col-md-6">
                                    <h6 class="font-weight-normal">Order For:</h6>
                                    <h6 class="font-size-16"><?php echo $row['firstName']?> <?php echo $row['lastName']?></h6>
                                    <address>
                                        <?php echo $row['address']?><br>
                                        <?php echo $row['city']?><br>
                                        
                                    </address>
                                </div> <!-- end col -->

                                
                            </div>
                            <!-- end row -->

                            <div class="row">
                                <div class="col-12">
                                    <div class="table-responsive">
                                        <table class="table mt-4 table-centered">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Item</th>
                                                    <th>Restaurant</th>
                                                    <th style="width: 10%">Price</th>
                                                    <th style="width: 10%">Qty</th>
                                                    <th style="width: 10%" class="text-right">Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php

                                                $order_info=trim($row['Order_info'],'"');
                                                $order_info=json_decode($order_info);
                                                $i=1;
                                                $total=0;
                                                foreach ($order_info as $key => $value) {
                                                 
                                                ?> 

                                                <tr>
                                                    <td><?php echo $i;?></td>
                                                    <td>
                                                        <img src="http://localhost/mealbox/restaurant/images/<?php echo $value->image;?>" height=  "50" width="50"> <?php echo $value->name;?>  
                                                    </td>
                                                    <td><?php echo $value->restName;?></td>
                                                    <td><?php echo $value->price;?></td>
                                                    <td><?php echo $value->qty;?></td>
                                                    <td class="text-right">Rs <?php $total+=$value->price*$value->qty;echo $value->price*$value->qty;?></td>
                                                </tr>
                                                    <?php
                                                    $i++;
                                                    }
                                                ?>

                                            </tbody>
                                        </table>
                                    </div> <!-- end table-responsive -->
                                </div> <!-- end col -->
                            </div>
                            <!-- end row -->

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="clearfix pt-5">
                                           
                                    </div>
                                </div> <!-- end col -->
                                <div class="col-sm-6">
                                    <div class="float-right mt-4">
                                        <p><span class="font-weight-medium">Total:</span> <span class="float-right"><?php echo $total;?></span></p>
                                       
                                    </div>
                                    <div class="clearfix"></div>
                                </div> <!-- end col -->
                            </div>
                            <!-- end row -->

                            <div class="mt-5 mb-1">
                                <div class="text-right d-print-none">
                                    <a href="javascript:window.print()" class="btn btn-primary"><i class="uil uil-print mr-1"></i> Print</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
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