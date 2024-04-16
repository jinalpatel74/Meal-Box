<?php include 'header.php';?>
<?php include 'sidebar.php';?>

    
<?php
if(isset($_POST["update_btn"]))
	{
	
		 if($_POST['image']){
		 	$file=addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
		 	$target_path = "images/";
			 
		 	$image=$_FILES["image"]["name"];
		 	$image_temp=$_FILES["image"]["tmp_name"];  
		 	move_uploaded_file($image_temp,$target_path.$image);
		 }
		 else{
			$image='';
		 }
		$name=$_POST["name"];
		$email=$_POST["email"];
		$contact=$_POST["contact"];
		$address=$_POST["address"];
		
		
		$insert="INSERT INTO customer(Customer_name,Customer_email,Customer_contact,Customer_address, Customer_Image) VALUES('".$name."','".$email."','".$contact."','".$address."','".$image."')";
		
		$res=mysqli_query($con,$insert);
		
		if($res==1)
		{
			echo "<script>window.location='users.php';</script>";

			
		}
		else
		{
			echo "<script>alert('Data not Inserted');</script>";
			
		}
		
	}
?>
<div class="content-page">
    <div class="content">
		<div class="container-fluid">
		    <div class="row page-title">
		        <div class="col-md-12">
		            <h4 class="mb-1 mt-0">Add Users</h4>
		            
		        </div>
		    </div>
			<div class="row">
			    <div class="col-lg-12">
			        <div class="card">
			            <div class="card-body">
			                <!-- <h4 class="header-title mt-0 mb-1">Bootstrap Validation - Normal</h4> -->
			                <p class="sub-header">	</p>
			                <form class="needs-validation" novalidate method="post" >
			                	<div class="row">
				                	<div class="col">
					                        <div class="form-group row">
					                        <label for="validationCustom01" class="col-lg-2 col-form-label">Name</label>
					                        <div class="col-lg-10">
					                        	
					                        	<input type="text" class="form-control" value="" id="validationCustom01" placeholder="" name="name"  required>
					                        
					                        </div>
					                    </div>
					                   
					                    <div class="form-group row">
					                        <label for="validationCustom01" class="col-lg-2 col-form-label">Contact</label>
					                        <div class="col-lg-10">
					                        	
					                        	<input type="text" class="form-control" id="validationCustom01" value="" placeholder="" name="contact"  required>
					                        
					                        </div>
					                    </div>
					                   
					                    <div class="form-group row">
					                        <label for="validationCustom01" class="col-lg-2 col-form-label">Image</label>
					                        <div class="col-lg-10">
					                        	
					                        	<input type="file" class="form-control" id="validationCustom01" name="image" >
					                        
					                        </div>
					                    </div>
					                    
					                  </div>
					                <div class="col">
					                    <div class="form-group row">
					                        <label for="validationCustom01" class="col-lg-2 col-form-label">Email</label>
					                        <div class="col-lg-10">
					                        	
					                        	<input type="text" class="form-control" id="validationCustom01" value="" placeholder="" name="email"  required>
					                        
					                        </div>
					                    </div>
					                    <div class="form-group row">
					                        <label for="validationCustom01" class="col-lg-2 col-form-label">Address</label>
					                        <div class="col-lg-10">
					                        	
					                        	<textarea 	 class="form-control" name="address"></textarea>
					                        
					                        </div>
					                    </div>
					                
					                    
					                   
					                  </div>
					                   
					                </div>
					                   
					         
					                <div class="row"> 
					                	<div class="col-6">
			                    				<button class="btn btn-primary" type="submit" name="update_btn">ADD</button>

					                	</div>
					                </div>
				                </div>
			                </form>

			            </div> <!-- end card-body-->
			        </div> <!-- end card-->
			    </div> <!-- end col-->

			</div>
		</div>
	</div>
</div>