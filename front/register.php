<?php
session_start();
include_once("cnn.php");


	
	if(isset($_POST["submit_btn"]))
	{
		$file=addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
		$target_path = "images/";
		 
		$image=$_FILES["image"]["name"];
		$image_temp=$_FILES["image"]["tmp_name"];  
		move_uploaded_file($image_temp,$target_path.$image);

		$name=$_POST["name"];
		$email=$_POST["email"];
		$contact=$_POST["contact"];
		$address=$_POST["address"];
		$password=$_POST["password"];
		$insert="INSERT INTO customer(Customer_name,Customer_email, Customer_contact , Customer_address,Customer_pass,Customer_Image) VALUES('".$name."','".$email."','".$contact."','".$address."','".$password."','".$image."')";
		
		$res=mysqli_query($con,$insert);
		
		if($res==1)
		{
			echo "<script>window.location='login.php';</script>";
			session_destroy();
		}
		else
		{
			echo "<script>alert('Data not Inserted');</script>";
			session_destroy();
		}
		
	}


?><!DOCTYPE html>
<html lang="en"><!-- Basic -->
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
   
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
     <!-- Site Metas -->
    <title>Mealbox</title>  
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="../assets/FrontAssets/images/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="../assets/FrontAssets/images/apple-touch-icon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/FrontAssets/css/bootstrap.min.css">    
	<!-- Site CSS -->
    <link rel="stylesheet" href="../assets/FrontAssets/css/style.css">    
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="../assets/FrontAssets/css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../assets/FrontAssets/css/custom.css">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<style>
	label{
		 font-size: 19px;
		 font-family: georgia;
	}
</style>
<body>
<!-- Start header -->
	<header class="top-navbar">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="container">
				<a class="navbar-brand" href="index.html">
					<img src="../assets/FrontAssets/images/logo.jpg" alt="" />
				</a>
				<h1 style="font-size: 35px;font-family: georgia;">MEALBOX</h1>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-rs-food" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
				  <span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbars-rs-food" style="font-family: georgia;">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item"><a class="nav-link" href="home.php">Home</a></li>
						<li class="nav-item"><a class="nav-link" href="menu.html">Menu</a></li>
						<li class="nav-item"><a class="nav-link" href="about.html">About</a></li>
						
						<li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
						<li class="nav-item active"><a class="nav-link" href="login.php">Login</a></li>
						<li class="nav-item"><a class="nav-link" href="res_register.php">Restaurant</a></li>
					</ul>
				</div>
			</div>
		</nav>
	</header>
	<!-- End header -->

	<!-- Start All Pages -->
	<div class="all-page-title page-breadcrumb">
		<div class="container text-center">
			<div class="row">
				<div class="col-lg-12">
					<h1 style="font-family: georgia;font-size: 50px;">REGISTER</h1>
				</div>
			</div>
		</div>
	</div>
	<!-- End All Pages -->
	
	<div class="reservation-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-sm-12 col-xs-12">
					<div class="contact-block">
						<form  method="POST" action="register.php" enctype="multipart/form-data" >
							<div class="row">
								
								<div class="col-md-2">
									
									<div class="form-group">
										
										<label style="font-size: 20px;color: red;"> * </label><label>&nbsp Name</label>
										<div class="help-block with-errors"></div>
									</div>                                 
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<input id="input_date" class="datepicker picker__input form-control" name="name" type="text" value="" required data-error="Please enter your name" placeholder="Your Name">
										<div class="help-block with-errors"></div>
									</div>                                 
								</div>
							</div> 
							<div class="row">
								
								<div class="col-md-2">
									<div class="form-group">
										
										<label style="font-size: 20px;color: red;"> * </label><label>&nbsp Email</label>
									</div>                                 
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<input id="input_time" class="time form-control picker__input" required data-error="Please enter email" placeholder="Your Email" type="email" name="email">
										<div class="help-block with-errors"></div>
									</div>                                 
								</div>
								
							</div>
							<div class="row">
								
								<div class="col-md-2">
									<div class="form-group">
										
										<label style="font-size: 20px;color: red;"> * </label><label>&nbsp Contact</label>
										<div class="help-block with-errors"></div>
									</div>                                 
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<input id="input_con" class="datepicker picker__input form-control" name="contact" type="tel" value="" required data-error="Please enter your contact No." placeholder="Your Contact No.">
										<div class="help-block with-errors"></div>
									</div>                                 
								</div>
							</div>  
							<div class="row">
								
								<div class="col-md-2">
									<div class="form-group">
										
										<label style="font-size: 20px;color: red;"> * </label><label>&nbsp Address</label>
										<div class="help-block with-errors"></div>
									</div>                                 
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<textarea id="input_add" class="datepicker picker__input form-control" name="address" type="text" value="" required data-error="Please enter your Address" placeholder="Your Address"></textarea>
										<div class="help-block with-errors"></div>
									</div>                                 
								</div>
							</div>
							<div class="row">
								
								<div class="col-md-2">
									<div class="form-group">
										
										<label style="font-size: 20px;color: red;"> * </label><label>&nbsp Password</label>
										<div class="help-block with-errors"></div>
									</div>                                 
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<input id="input_pass" class="datepicker picker__input form-control" name="password" type="password" value="" required data-error="Please enter your password" placeholder="Your password">
										<div class="help-block with-errors"></div>
									</div>                                 
								</div>
							</div>
							<div class="row">
								
								<div class="col-md-2">
									<div class="form-group">
										
										<label>&nbsp &nbsp Profile Picture</label>
										<div class="help-block with-errors"></div>
									</div>                                 
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<input id="input_pass" class="datepicker picker__input form-control" name="image" type="file" value="" >
										<div class="help-block with-errors"></div>
									</div>                                 
								</div>
							</div>            
							         
							<div class="row">
									<div class="col-md-2">
										<div class="form-group" style="margin-left: 300px;margin-top: 30px;">
											
											<button class="btn btn-common" id="submit" name="submit_btn" type="submit" style="    width: 145px; font-family: georgia
											;">Register</button>
										</div>                                 
									</div>
									
							</div>
							<div style="margin-left: 270px;margin-bottom: 10px;font-size: 20px;font-family: georgia
											;">Already a User ? <a href="login.php" style="color: #ef652f;font-family: georgia
											;">Login</a></div>
						
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Login -->
	
	
	
<?php include 'footer.php';?>