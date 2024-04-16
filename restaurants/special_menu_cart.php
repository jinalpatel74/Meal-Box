<?php include 'header.php';?>
 <link rel="stylesheet" href="../assets/FrontAssets/css/cart.css"> 
<?php
if(!isset($_SESSION["Customer_login"])){
  echo "<script>alert('login to continue');window.location='index.php';</script>";
} 
$item=$_POST['item'];
$date=$_POST['date'];
$rest_id=$_POST['rest_id'];
$count=count($date);
  $date_ar=[];
  $item_ar=[];
?>

 <div class="container">
  <div class="shopping-cart   mt-4">
<h1 style="margin:30px 30px 30px 30px" class="text-center mb-4">Shopping Cart</h1>
</div>  
  <table class="w-100" border="1">
    <thead>
      <th>Date</th>
      <th>Name</th>
      <th>Price</th>
      <th>Total</th>
    </thead>
    <tbody>
      <?php
      $subtotal=0;
        for($i=0;$i<$count;$i++)
        {
      ?>
      <tr><?php $total=0;?>
        <td><?php array_push($date_ar,$date[$i]); echo $date[$i];?></td>
        <td>
        <?php
          $count_item=count($item[$i]);
            $jar=[];
          for ($j=0;$j<$count_item;$j++) {
            $item_query="select * from item where Item_id='".$item[$i][$j]."'";
            $item_res=mysqli_query($con,$item_query);
            ?> 
            <?php while($rowss=mysqli_fetch_array($item_res))
            {  
              array_push($jar,$rowss['Item_id']);
            ?><img class="mt-2" src="http://localhost/mealbox/restaurant/images/<?php echo $rowss["Item_image"];?>"style="height: 40px;width: 40px">
            <?php echo($rowss['Item_name']);?><br>
            <?php }
          }
          ?>

      </td>
        <td>
        <?php
          $count_item=count($item[$i]);
          for ($j=0;$j<$count_item;$j++) {
            $item_query="select * from item where Item_id='".$item[$i][$j]."'";
            $item_res=mysqli_query($con,$item_query);
            ?> 
            <?php while($rowss=mysqli_fetch_array($item_res))
            {  
            ?>
            <?php $total+=$rowss['Price'];
            echo($rowss['Price']);?><br>
            <?php }
          }?>

      </td>
      <td>
        <?php $subtotal+=$total; echo $total;?>
      </td>
      </tr>
    <?php array_push($item_ar,$jar);}?>  
      <tr><td></td><td></td><td></td><td><b>Subtotal-</b>  <?php echo $subtotal;?></td></tr>
    </tbody>
  </table>

</div>
<div class="container" style="margin-left: 450px">
  <div class="py-5 " style="margin-left: 250px">
    <h2>Checkout form</h2>
  </div>

  <div class="row">
    <div class="col-md-8 order-md-1">
      <h4 class="mb-3">Billing address</h4>
      <form class="needs-validation" method="post" id="checkout_form">
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="firstName">First name</label>
            <input type="text" class="form-control" name="firstName" required="true" placeholder="" value="" required>
            
          </div>
          <div class="col-md-6 mb-3">
            <label for="lastName">Last name</label>
            <input type="text" class="form-control" name="lastName" required="true" placeholder="" value="" required>
            
          </div>
        </div>

        <div class="mb-3">
          <label for="email">Email <span class="text-muted"></span></label>
          <input type="email" class="form-control" name="email" required="true" >
         
        </div>

        <div class="mb-3">
          <label for="address">Address</label>
          <input type="text" class="form-control" name="address" required="true" required>
         
        </div>

        <div class="row">
          
          <div class="col-md-4 mb-3">
            <label for="state">State</label>
            <select class="custom-select d-block w-100" name="state" required>
              <option value="">Choose...</option>
              <option>Gujarat</option>
             <option>Bihar</option>
             <option>Up</option>
             <option>Maharashtra</option>
             <option>Kerala</option>
             <option>Tamil Nadu</option>
             <option>Rajasthan</option>
             <option>Haryana</option>
             <option>Jharkhand</option>
             <option>Delhi</option>
            </select>
            <div class="invalid-feedback">
              Please provide a valid state.
            </div>
          </div>
          <div class="col-md-5 mb-3">
            <label for="country">City</label>
            <select class="custom-select d-block w-100" name="city" required>
              <option value="">Choose...</option>
              
              <option>Surat</option>
             <option>Ahmedabad</option>
             <option>Rajkot</option>
             <option>Baroda</option>
             <option>Bharch</option>
             <option>Bhavnagar</option>
            </select>
          </div>
          <div class="col-md-3 mb-3">
            <label for="zip">Zip</label>
            <input type="text" class="form-control" name="zip" required="true" placeholder="" required>
            <div class="invalid-feedback">
              Zip code required.
            </div>
          </div>
        </div>  
        <hr class="mb-4">
        <button class="btn btn-primary btn-lg btn-block" style="background-color:#bd2130;border-color: #bd2130;" type="submit">Continue to checkout</button>
      </form>
    </div>
  </div>

<?php include 'footer.php';?>
<script type="text/javascript">

        var  dates=<?php echo json_encode($date_ar);?>;
        var  items=<?php echo json_encode($item_ar);?>;
        var  rest_id=<?php echo json_encode($rest_id);?>;
        var cart={'date':dates,'items':items}


  $('#checkout_form').on('submit',function(e){
      e.preventDefault();
      var fd=new FormData(this);
      fd.append('cart',JSON.stringify(cart));
      fd.append('rest_id',rest_id);
      $.ajax({
          url:'special_submit.php',
          method:'POST',
          data:fd,
          cache : false,
          processData: false,
          contentType: false, 
          dataType:'json',
          success:function(response){
            if(response.status==200){
              localStorage.removeItem('cart');
               window.location.href='success.php'
            }
            else{
              swal({
                title: "Alert",
                text: "Username or password incorrect",
                icon: "warning",
              });
            }
          }
      });
  })

</script>


















