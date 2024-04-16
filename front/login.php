
<?php
session_start();

include_once("cnn.php");

if(isset($_POST["login_btn"]))
{
    $email=$_POST["email"];
    $password=$_POST["password"];
    $query="select * from  customer where Customer_email='".$email."' and Customer_pass='".$password."'";
    $res=mysqli_query($con,$query);
    if($row=mysqli_fetch_array($res))
    {
        $_SESSION["Customer_id"]=$row["Customer_id"];
        $_SESSION["Customer_name"]=$row["Customer_name"];
        $_SESSION["Customer_login"]='true';
         header("location:home.php");
    }
    else
    {
        $_SESSION["error"]=true;

        header("locaton:login.php");
    }   
}
?>
<!DOCTYPE html>
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
					<h1 style="font-family: georgia;font-size: 50px;">LOGIN</h1>
				</div>
			</div>
		</div>
	</div>
	<!-- End All Pages -->
	
	<!-- Start Reservation -->
<form action="" method="post">
	
	<div class="reservation-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-sm-12 col-xs-12">
					<div class="contact-block">
						<form id="contactForm">
						<?php if(isset($_SESSION["error"])){
								    ?>
								        <div class="badge badge-danger" style="font-size: 15px;">
								            Invalid Credentials
								        </div>
								    <?php
								      }
								     ?>
							<div class="row">
									 
								<div class="col-md-2">
									
									<div class="form-group">
										 
										<label style="font-size: 20px;color: red;"> * </label><label style="font-size: 20px;font-family: georgia;">  &nbsp Email</label>
										<div class="help-block with-errors"></div>
									</div>                                 
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<input id="input_date" class="datepicker picker__input form-control" name="email" type="email"	required data-error="Please enter email" placeholder="Email">
										<div class="help-block with-errors"></div>
									</div>                                 
								</div>
							</div> 
							<div class="row">
								
								<div class="col-md-2">
									<div class="form-group">
										
										<label style="font-size: 20px;color: red;"> * </label><label style="font-size: 20px;font-family: georgia;"> &nbsp Password</label>
									</div>                                 
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<input id="input_time" name="password" class="time form-control picker__input" required data-error="Please enter password" placeholder="Password" type="password">
										<div class="help-block with-errors"></div>
									</div>                                 
								</div>
								
							</div>        
								
							<div class="row">
									<div class="col-md-2">
										<div class="form-group" style="margin-left: 300px;margin-top: 40px;">
											
											<button class="btn btn-common" id="submit" name="login_btn" type="submit" style="    width: 145px;font-family: georgia;">Login</button>
										</div>                                 
									</div>
									
							</div>
							<div style="margin-left: 280px;margin-bottom: 10px;font-size: 20px;font-family: georgia;">New User ?  <a href="register.php" style="color: #ef652f;font-family: georgia;">Register</a></div>
						
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Login -->
	
	
	
<?php include 'footer.php';?>

</body></html>