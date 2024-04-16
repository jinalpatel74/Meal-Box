<?php include 'header.php';?>
<?php
  if(!isset($_SESSION["Customer_login"])){
    echo "<script>window.location='index.php';</script>";
  }
?>
    <div class="container">
      <div class="py-5 text-center">
        <h2>Checkout form</h2>
      </div>

      <div class="row">
        <div class="col-md-4 order-md-2 mb-4">
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">Your cart</span>
          </h4>
          <ul class="list-group mb-3" id="product_list">        
           
          </ul>

        </div>
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
    var old_cartdata=localStorage.getItem('cart');
    if(old_cartdata){
         old_cartdata=JSON.parse(old_cartdata);
         if(old_cartdata.length>0){
             var html='';
             var subtotal=0;
             $.each(old_cartdata,function (index,val) {
                 var total=val.price*val.qty;
                 subtotal+=total;
                 html+='<li class="list-group-item d-flex justify-content-between lh-condensed"><img src="http://localhost/mealbox/restaurant/images/'+val.image+'" style="height: 60px;width: 80px;"><div><h6 class="my-0">'+val.name+'</h6> </div><span class="text-muted">Rs '+val.price+'</span></li>';
                 if(index==old_cartdata.length-1){
                     $('#product_list').html(html);
                     $('#product_list').append(' <li class="list-group-item d-flex justify-content-between"> <span>Total </span> <strong>Rs '+subtotal+'</strong></li>');
                      
                 }
            });
         }
         else{
           $('.shopping-cart').addClass('d-none');
           $('.no-div').removeClass('d-none');
         }
    }
    else{
        $('.shopping-cart').addClass('d-none');
        $('.no-div').removeClass('d-none');
    }
    $('#checkout_form').on('submit',function(e){
        e.preventDefault();
        var cartdata=localStorage.getItem('cart');
        var fd=new FormData(this);
        fd.append('cart',cartdata);
        
        $.ajax({
            url:'checkout_submit.php',
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