<?php include 'header.php';?>
<?php include 'sidebar.php';?>

<?php
if(isset($_POST["update_btn"]))
	{

			if(isset($_FILES['image'])){
			     $errors= array();
			      $file_name = uniqid().$_FILES['image']['name'];
			     $file_size =$_FILES['image']['size'];
			     $file_tmp =$_FILES['image']['tmp_name'];
			     $file_type=$_FILES['image']['type'];
			   
			     
			    if(empty($errors)==true){
			        move_uploaded_file($file_tmp,"images/".$file_name);
			    }
			  }

		$name=$_POST["name"];
		$price=$_POST["price"];
		$category=$_POST["category"];
		
		$insert="INSERT INTO item(Item_name,Price, Category , Item_image) VALUES('".$name."','".$price."','".$category."','".$file_name."')";
		
		$res=mysqli_query($con,$insert);
		
		if($res==1)
		{
			echo("<script>location.href = 'dishes.php';</script>");
		}
		else
		{
			echo "<script>alert('Data not Inserted');</script>";
			header("location:add_dishes.php");
		}
		
	}


?>
<div class="content-page">
    <div class="content">
		<div class="container-fluid">
		    <div class="row page-title">
		        <div class="col-md-12">
		            <h4 class="mb-1 mt-0">Add Dishes</h4>
		            
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
					                        	
					                        	<input type="text" class="form-control"  id="validationCustom01" placeholder="" name="name"  required>
					                        
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
					                        	
					                        	<input type="text" class="form-control" id="validationCustom01"  placeholder="" name="category"  required>
					                        
					                        </div>
					                    </div>
					                    <div class="form-group row">
					                        <label for="validationCustom01" class="col-lg-2 col-form-label">Price</label>
					                        <div class="col-lg-10">
					                        	
					                        	<input type="text" class="form-control" id="validationCustom01"  placeholder="" name="price"  required>
					                        
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