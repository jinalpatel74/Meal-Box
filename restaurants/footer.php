 <script src="../assets/jquery.min.js"></script>
 <script src="../assets/FrontAssets/sweetalert.js"></script>
 <script src="../assets/FrontAssets/js/bootstrap.min.js"></script>
 <script src="../assets/FrontAssets/js/toastr.min.js"></script>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->

<script type="text/javascript">
	$('#login_form').on('submit',function (e) {
		e.preventDefault();
		var email=$('#email').val();
		var password=$('#password').val();
		$.ajax({
		    url:'login.php',
		    method:'POST',
		    data:{'email':email,'password':password},
		    dataType:'json',
		    success:function(response){
		   		if(response.status==200){
            login_id='true';
            $('#exampleModal').modal('hide');

            
            $('#login_nav').html('<div class="dropdown ml-3 mt-2"><span class="text-white mr-1">'+response.Customer_name+'</span><a href="#" id="imageDropdown" data-toggle="dropdown" ><img src="http://localhost/mealbox/restaurants/images/'+response.Customer_Image+'" class="img-fluid rounded-circle" style="max-height: 30px;max-width: 30px"></a><ul class="dropdown-menu" role="menu" aria-labelledby="imageDropdown" style="margin-left: -100px"  ><li role="presentation"><a class="dropdown-item" href="logout.php" >Logout</a></li></ul></div>');
            
            $('#register_nav').addClass('d-none');
            swal({
              title: "",
              text: "Login Successfull",
              icon: "success",
            });
		   		}
		   		else{
            swal({
              title: "Alert",
              text: "Username or password incorrect",
              icon: "warning",
            });
		   		
		   		}
		    },
		    error:function(response){
	        }
	    });
	}); 
  $('#register_form').on('submit',function (e) {
    e.preventDefault();
    var email=$('#email').val();
    var password=$('#password').val();
    $.ajax({
        url:'register.php',
        method:'POST',
        data:new FormData(this),
        cache : false,
        processData: false,
        contentType: false, 
        dataType:'json',
        success:function(response){
          if(response.status==200){
            $('#registerModal').modal('hide');
            
            swal({
              title: "",
              text: "Registration Successfull",
              icon: "success",
            });
          }
          else if(response.status==300){
            swal({
              title: "Alert",
              text: "User already registered",
              icon: "warning",
            });
          }
          else{
            swal({
              title: "Alert",
              text: "Username or password incorrect",
              icon: "warning",
            });
          
          }
        },
        error:function(response){
          }
      });
  });
  var old_cartdata=localStorage.getItem('cart');
  if(old_cartdata){
    old_cartdata=JSON.parse(old_cartdata);
    if(old_cartdata.length>0){
        $('#cart_icon').attr('value',old_cartdata.length);
    }
  }
  $('#register_modal_a').on('click',function(){
    $('#registerModal').modal('show');
    $('#exampleModal').modal('hide');
  });
  $('#login_modal_a').on('click',function(){
    $('#registerModal').modal('hide');
    $('#exampleModal').modal('show');
  });
</script>