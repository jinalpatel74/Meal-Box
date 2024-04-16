<?php include 'header.php';?>
 <link rel="stylesheet" href="../assets/FrontAssets/css/cart.css"> 

 <div class="container-fluid">
<div class="shopping-cart d-none  mt-4">
<h1 style="margin:30px 30px 30px 30px" class="text-center mb-4">Shopping Cart</h1>
 
  <div class="column-label smt-4">
    <label class="product-image">Image</label>
    <label class="product-details">Item</label>
    <label class="product-price">Price</label>
    <label class="product-quantity">Quantity</label>
    <label class="product-removal">Remove</label>
    <label class="product-line-price">Total</label>
  </div>
  <div id='cart'>
  </div>
 
  <div class="totals">
   
    <div class="totals-item totals-item-total">
      <label> Total</label>
      <div class="totals-value" id="cart-total"></div>
    </div>
  </div>
       
      <a class="checkout" id="checkout" href="javascript:void(0)">Checkout</a>
 
</div>
<div class="no-div mt-4 d-none text-center" style="font-size:20px">
    No Item in cart
</div>
</div>
<?php $is=isset($_SESSION["Customer_login"])?'true':'false';?>
<?php include 'footer.php';?>

<script type="text/javascript">
  var login_id=<?php echo $is;?>;
console.log(login_id)

  $('#checkout').on('click',function(){
    if(login_id==true || login_id=='true'){
      window.location.href = '/mealbox/restaurants/checkout.php';
    }
    else{
      $('#exampleModal').modal('show');
    }
  });
  var old_cartdata=localStorage.getItem('cart');
    if(old_cartdata){
        old_cartdata=JSON.parse(old_cartdata);
        if(old_cartdata.length>0){
            var html='';
            var subtotal=0;
            $.each(old_cartdata,function (index,val) {
                var total=val.price*val.qty;
                subtotal+=total;
                html+='<div class="product" id="product_'+val.id+'"><div class="product-image"><img src="http://localhost/mealbox/restaurant/images/'+val.image+'"></div><div class="product-details"><div class="product-title">'+val.name+'</div><div class="product-title">'+val.restName+'</div> </div><div class="product-price">Rs '+val.price+'</div> <div class="product-quantity"><input type="number" class="item_qty" data-id="'+val.id+'" data-price="'+val.price+'" value="'+val.qty+'" min="1"></div><div class="product-removal"><button class="remove-product" data-id="'+val.id+'" data-total="'+total+'">  Remove</button></div><div class="product-line-price" id="total_'+val.id+'">Rs '+total+'</div></div>'
                if(index==old_cartdata.length-1){
                    $('#cart').html(html);
                    $('.totals-value').html('Rs '+subtotal);
                    $('.totals-value').attr('data-total',subtotal);
                    $('.shopping-cart').removeClass('d-none');
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
  
  $(document).on('change','.item_qty',function(){
    var qty=$(this).val();
    var price=$(this).attr('data-price');
    var id=$(this).attr('data-id');
    var total=qty*price;
    $('#total_'+id).html('Rs '+total);
    var subtotal=0;
    
    var old_cartdata=localStorage.getItem('cart');
    if(old_cartdata){
        old_cartdata=JSON.parse(old_cartdata);
        $.each(old_cartdata,function (index,val) {
            
            if(id==val.id){
                val.qty=qty;
                var total=val.price*qty;
                subtotal+=total;
                localStorage.setItem("cart", JSON.stringify(old_cartdata));

            }
            else{
                var total=val.price*val.qty;
                subtotal+=total;
            }
            
            if(index==old_cartdata.length-1){
                $('.totals-value').html('Rs '+subtotal);
                $('totals-value').attr('data-total',total);
                return false;
            }
        });
    }
  });

  $(document).on('click','.remove-product',function(){
    var id=$(this).attr('data-id');
    var subtotal=$(this).attr('data-total');
    var old_cartdata=localStorage.getItem('cart');
    if(old_cartdata){
        old_cartdata=JSON.parse(old_cartdata);
        $.each(old_cartdata,function (index,val) {
            if(id==val.id){
                old_cartdata.splice(index, 1); 
                localStorage.setItem("cart", JSON.stringify(old_cartdata));
                
                if($('.product').length==1){
                    $('.shopping-cart').addClass('d-none')
                    $('.no-div').removeClass('d-none')
                }
                var total=$('.totals-value').attr('data-total');
                var t=parseInt(total)-parseInt(subtotal);
                
                $('.totals-value').html('Rs '+t);
                $('.totals-value').attr('data-total',t);
                $('#product_'+id).remove();
            }
           
        });
    }
  });

</script>


















