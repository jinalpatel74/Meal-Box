<?php include 'header.php';?>
<?php
    $query="select * from restaurant";
    $res=mysqli_query($con,$query);
    $id=$_REQUEST["id"];

	$query="select * from restaurant where Restaurant_id='".$id."'";
	$ans=mysqli_query($con,$query);
	$row=mysqli_fetch_array($ans);

    $item_query="select * from item where Restaurant_id='".$id."'";
    $item_res=mysqli_query($con,$item_query);
	
?>
  <div class="container-fluid">
        <div class="row  py-5 " style="background-color: #343a40;">
            <div class="col-12 col-lg-4 col-md-4">
                <img class="d-block  ml-md-5 ml-lg-5 img-fluid" style="max-height:200;max-width:400"
                    src="http://localhost/mealbox/admin/images/<?php echo $row["Restaurant_image"];?>" alt="First slide">
            </div>
            <div class="col-12 col-lg-8 col-md-8">
                <h3 class="text-white text-left"><?php echo $row['Restaurant_name']?></h3>
                <a href="special_menu.php?id=<?php echo $id?>"><button class="btn">Special Menu</button></a>
                <hr class="w-50 " style="border-top: 1px solid white; max-width: 450px; margin-left:0;">
                <h5 class="text-white text-left">
                    <!-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20">
                        <path fill="none" d="M0 0h24v24H0z" />
                        <path
                            d="M18.364 17.364L12 23.728l-6.364-6.364a9 9 0 1 1 12.728 0zM12 13a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"
                            fill="rgba(255,255,255,1)" />
                    </svg> -->
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M12 20.9l4.95-4.95a7 7 0 1 0-9.9 0L12 20.9zm0 2.828l-6.364-6.364a9 9 0 1 1 12.728 0L12 23.728zM12 13a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm0 2a4 4 0 1 1 0-8 4 4 0 0 1 0 8z" fill="rgba(255,255,255,1)"/></svg>
                    <?php echo $row['Restaurant_address']?>,<?php echo $row['City']?>
                </h5>
                <span class="text-white">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20"><path fill="none" d="M0 0h24v24H0z"/><path d="M3 3h18a1 1 0 0 1 1 1v16a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1zm17 4.238l-7.928 7.1L4 7.216V19h16V7.238zM4.511 5l7.55 6.662L19.502 5H4.511z" fill="rgba(255,255,255,1)"/></svg>
                    <span><?php echo $row["Restaurant_email"];?></span>
                <div class="text-white">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M9.366 10.682a10.556 10.556 0 0 0 3.952 3.952l.884-1.238a1 1 0 0 1 1.294-.296 11.422 11.422 0 0 0 4.583 1.364 1 1 0 0 1 .921.997v4.462a1 1 0 0 1-.898.995c-.53.055-1.064.082-1.602.082C9.94 21 3 14.06 3 5.5c0-.538.027-1.072.082-1.602A1 1 0 0 1 4.077 3h4.462a1 1 0 0 1 .997.921A11.422 11.422 0 0 0 10.9 8.504a1 1 0 0 1-.296 1.294l-1.238.884zm-2.522-.657l1.9-1.357A13.41 13.41 0 0 1 7.647 5H5.01c-.006.166-.009.333-.009.5C5 12.956 11.044 19 18.5 19c.167 0 .334-.003.5-.01v-2.637a13.41 13.41 0 0 1-3.668-1.097l-1.357 1.9a12.442 12.442 0 0 1-1.588-.75l-.058-.033a12.556 12.556 0 0 1-4.702-4.702l-.033-.058a12.442 12.442 0 0 1-.75-1.588z" fill="rgba(255,255,255,1)"/></svg>
                    <span><?php echo $row["Restaurant_contact"];?></div>
            </div>

        </div>
    </div>

    <div class="container-fluid mt-4 ">
        <!-- <div class="row" style="width: 20%;float: left;">
            <div class="col-md-12 ">
                <a href="#" class="list-group-item list-group-item-action bg-dark text-white">Menu</a>
                <a href="#" class="list-group-item list-group-item-action bg-dark text-white">Menu</a>
                <a href="#" class="list-group-item list-group-item-action bg-dark text-white">Menu</a>
                <a href="#" class="list-group-item list-group-item-action bg-dark text-white">Menu</a>
                <a href="#" class="list-group-item list-group-item-action bg-dark text-white">Menu</a>
                <a href="#" class="list-group-item list-group-item-action bg-dark text-white">Menu</a>
            </div>
        </div> -->

       
            <div class="row mb-2">
            <?php
                while($rows=mysqli_fetch_array($item_res))
                {
                ?>
                <div class="col-md-3 col-lg-3 col-12 ">
                    <div class="card">
                        <img class="card-img-top" style="max-height:200;max-width:400" src="http://localhost/mealbox/restaurant/images/<?php echo $rows["Item_image"];?>"
                            alt="Card image cap">
                        <div class="card-body">
                            <div class="card-title"><?php echo $rows["Item_name"];?></div>
                            <div>
                                <b class="card-text" style="color:#ff1f1f;">Rs <?php echo $rows["Price"];?></b>
                                <button class="btn btn-danger add_to_cart" style="float: right;"data-id="<?php echo $rows["Item_id"];?>" data-image="<?php echo $rows["Item_image"];?>" data-price="<?php echo $rows["Price"];?>" data-name    ="<?php echo $rows["Item_name"];?>">Add to Cart</button>
                            </div>

                        </div>
                    </div>
                </div>
                <?php
                }
            ?>
            </div>
            

    </div>
    <?php include 'footer.php';?>
<script>
    var rest_id=<?php echo $id;?>;
    var restName=<?php echo json_encode($row["Restaurant_name"]);?>;
    
    $('.add_to_cart').on('click',function(){
       var id=$(this).attr('data-id');
       var name=$(this).attr('data-name');
       var image=$(this).attr('data-image');
       var price=$(this).attr('data-price');

       var data=[];    

       var cartdata='';
       
       cartdata={'id':id,'name':name,'image':image,'price':price,'qty':1,'rest_id':rest_id,'restName':restName}
        var old_cartdata=localStorage.getItem('cart');
        if(old_cartdata){
            
            old_cartdata=JSON.parse(old_cartdata);
            if(old_cartdata.length>0){
                $.each(old_cartdata,function (index,val) {
                    if(id==val.id){
                        val.qty=val.qty+1;
                        localStorage.setItem("cart", JSON.stringify(old_cartdata));
                        suceess_cart();
                        return false;

                    }
                    else{
                        if(index==old_cartdata.length-1){
                            old_cartdata.push(cartdata);
                            localStorage.setItem("cart", JSON.stringify(old_cartdata));
                            suceess_cart();
                            return false;
                        }
                    }
                    
                });
            }
            else{
                data.push(cartdata)
                localStorage.setItem("cart", JSON.stringify(data));
                suceess_cart();
            }
        }
        else{
            data.push(cartdata)
            localStorage.setItem("cart", JSON.stringify(data));
            suceess_cart();
        }

    });
    function suceess_cart(){
        var old_cartdata=localStorage.getItem('cart');
        if(old_cartdata){
          old_cartdata=JSON.parse(old_cartdata);
            toastr.success('Item added to cart')
          if(old_cartdata.length>0){
              $('#cart_icon').attr('value',old_cartdata.length);
          }
        }
    }
</script>
    