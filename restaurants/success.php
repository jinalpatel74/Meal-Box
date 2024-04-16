<?php include 'header.php';include_once("cnn.php");?>
<?php
  if(isset($_SESSION["order_success"]) && $_SESSION["order_success"]!='true'){
    echo "<script>window.location='index.php';</script>";
  }
?>
    <div class="container">
      <div class="py-5 text-center">
        <img src="../assets/FrontAssets/images/success.png">
        <?php  $_SESSION["order_success"]=false;  ?>
        <h2 style="color: green;margin-top: 60px">Order Placed Successfully</h2>
      </div>

 <?php include 'footer.php';?>


 <script type="text/javascript">
  
 </script>