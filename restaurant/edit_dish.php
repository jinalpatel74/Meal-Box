<?php include 'header.php';?>
<?php include 'sidebar.php';?>

    
<?php
	
	$id=$_REQUEST["id"];

	$query="select * from item where Item_id='".$id."'";
	$ans=mysqli_query($con,$query);
	$row=mysqli_fetch_array($ans);
	
	if(isset($_POST["update_btn"]))
	{
		$id1=$_REQUEST["id"];
		
		$name=$_POST["name"];
	  	$price=$_POST["price"];
	  	$category=$_POST["category"];
			if(isset($_FILES['image'])){
			     $errors= array();
			      $file_name = uniqid().$_FILES['image']['name'];
			     $file_size =$_FILES['image']['size'];
			     $file_tmp =$_FILES['image']['tmp_name'];
			     $file_type=$_FILES['image']['type'];
			   
			     
			    if(empty($errors)==true){
			        move_uploaded_file($file_tmp,"images/".$file_name);
			    }
			
	 			$query2="update item set `Item_name`='".$name."',`Price` ='".$price."',`Category` ='".$category."',`Item_image` ='".$file_name."' where `Item_id`='".$id1."'";
		 	}
			else{
	 			$query2="update item set `Item_name`='".$name."',`Price` ='".$price."',`Category` ='".$category."' where `Item_id`='".$id1."'";
			}
		
		
		$result=mysqli_query($con,$query2);
			echo "ok";	
		if($result==1)
		{
     		$_SESSION["update"]=true;
			echo("<script>location.href = '/mealbox/restaurant/dishes.php';</script>");	
			header("Location:dishes.php");
		}
	}	
?>
<div class="content-page">
    <div class="content">
		<div class="container-fluid">
		    <div class="row page-title">
		        <div class="col-md-12">
		            <h4 class="mb-1 mt-0">Edit Items</h4>
		            <a href="add_restaurant.php">
		            <button type="button" class="btn btn-primary" style="float: right;"><i style="margin-right: 6px;height: 20px;" class="plus-circle" data-feather="plus-circle"></i>Add</button></a>
		        </div>
		    </div>
			<div class="row">
			    <div class="col-lg-12">
			        <div class="card">
			            <div class="card-body">
			                <!-- <h4 class="header-title mt-0 mb-1">Bootstrap Validation - Normal</h4> -->
			                <p class="sub-header">	</p>
			                <form class="needs-validation" novalidate method="post" enctype="multipart/form-data">
			                	<div class="row">
				                	<div class="col">
					                    <div class="form-group row">
					                        <label for="validationCustom01" class="col-lg-2 col-form-label">Name</label>
					                        <div class="col-lg-10">
					                        	
					                        	<input type="text" class="form-control" value="<?php echo $row['Item_name']?>" id="validationCustom01" placeholder=" name" name="name"  required>
					                        
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
					                        <label for="validationCustom01" class="col-lg-2 col-form-label">Category</label>
					                        <div class="col-lg-10">
					                        	
					                        	<input type="text" class="form-control" id="validationCustom01" value="<?php echo $row['Category']?>" placeholder="" name="category"  required>
					                        
					                        </div>
					                    </div>
					                    <div class="form-group row">
					                        <label for="validationCustom01" class="col-lg-2 col-form-label">Price</label>
					                        <div class="col-lg-10">
					                        	
					                        	<input type="text" class="form-control" id="validationCustom01" value="<?php echo $row['Price']?>" placeholder="" name="price"  required>
					                        
					                        </div>
					                    </div>
					                
					                    
					                   
					                  </div>
					                   
					                </div>
					                <div class="row"> 
					                	<div class="col-6">
			                    				<button class="btn btn-primary" type="submit" name="update_btn">Update</button>

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