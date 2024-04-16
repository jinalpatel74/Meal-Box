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
    // $rows=mysqli_fetch_array($item_res);
	
?>
<link rel="stylesheet" href="../assets/FrontAssets/css/chosen.css"> 
<link rel="stylesheet" href="../assets/FrontAssets/css/ImageSelect.css"> 
<link rel="stylesheet" href="../assets/FrontAssets/css/datepicker.css"> 
<style type="text/css">
   
</style>
  <div class="container-fluid">
        <div class="row  py-5 " style="background-color: #343a40;">
            <div class="col-12 col-lg-4 col-md-4">
                <img class="d-block  ml-md-5 ml-lg-5 img-fluid" style="max-height:200;max-width:400"
                    src="http://localhost/mealbox/admin/images/<?php echo $row["Restaurant_image"];?>" alt="First slide">
            </div>
            <div class="col-12 col-lg-8 col-md-8">
                <h3 class="text-white text-left"><?php echo $row['Restaurant_name']?></h3>
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

    <div class="container mt-4 ">
    <form method="post" id="forms" action="special_menu_cart.php">
          <div class="row">
            
            <div class="col-md-12 order-md-1 orders">
                <div class="row" id="rows">
                        <div class="col-md-2  mb-3 date-col">
                            <label for="firstName">Date</label>
                            <input type="hidden" value="<?php echo $id;?>" name="rest_id">
                            <input type="text" name="date[]"  class="datetimepicker" required/><br><br>
                        
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="lastName">Item</label>
                            <select  multiple="multiple" class="my-select" name="item[0][]" required>
                                <?php
                                $ro=[];
                                $count=0;
                                    while($rows=mysqli_fetch_array($item_res))
                                    {
                                   
                                        array_push($ro, $rows);
                                ?>
                                <option class="items_sel"  data-name="<?php echo $rows["Item_name"];?>" data-image="<?php echo $rows["Item_image"];?>" data-price="<?php echo $rows["Price"];?>" id="option0" value="<?php echo $rows["Item_id"];?>" data-img-src="http://localhost/mealbox/restaurant/images/<?php echo $rows["Item_image"];?>"><?php echo $rows["Item_name"];?></option>
                        
                                 <?php
                                  }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-2">

                              <button class="btn btn-primary btn-lg btn-block mb-2 add_more" type="button" style="background-color:#bd2130;border-color: #bd2130;">
                                  Add more
                              </button>
                        </div>
                </div>
                
          
            </div>
          </div>
          <div class="row">
             <button class="btn btn-primary btn-lg btn-block mb-2  w-50" style="background-color:#bd2130;border-color: #bd2130;margin-left: 200px">
                 Submit
             </button>
          </div>
      </form>
            

    </div>
     <script src="../assets/FrontAssets/js/jquery.min.js"></script>
     <script src="../assets/FrontAssets/js/chosen.jquery.js"></script>
     <script src="../assets/FrontAssets/js/ImageSelect.jquery.js"></script>
     <script src="../assets/FrontAssets/js/datepicker.js"></script>

    <script type="text/javascript">
        var  ro=<?php echo json_encode($ro);?>;
        var  count=<?php echo json_encode($count);?>;
        $('.datetimepicker').datetimepicker({'minDate':'today'});
        $(".my-select").chosen({width:"100%"});
        $('.add_more').on('click',function() {
            count++;
            var item=' <div class="row" id="rows">'
                   +'<div class="col-md-2  mb-3 date-col">'
                        +'<label for="firstName">Date</label>'
                        +'<input type="text" name="date[]" required class="datetimepicker"/><br><br></div><div class="col-md-6 mb-3"><label for="lastName">Item</label>'
                        +'<select  multiple="multiple" class="my-select" name="item['+count+'][]" required>'
            $.each(ro,function(index,val){
                item+='<option class="items_sel" data-name="'+val.Item_name+'" data-image="'+val.Item_image+'" data-price="'+val.price+'" id="option'+count+'" value="'+val.Item_id+'" data-img-src="http://localhost/mealbox/restaurant/images/'+val.Item_image+'">'+val.Item_name+'</option>';
            });
           
                        item+='</select>'
                    +'</div>';
            $('.orders').append(item);
        $('.datetimepicker').datetimepicker();
        $(".my-select").chosen({width:"100%"});
        });
        $('#forms').on('submit',function(e){
           
            
            
        })
   </script>
    