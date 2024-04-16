<?php
include_once("cnn.php");
 session_start();
$firstName=$_POST["firstName"];
$lastName=$_POST["lastName"];
$email=$_POST["email"];
$address=$_POST["address"];
$city=$_POST["city"];
$state=$_POST["state"];
$zip=$_POST["zip"];
$cart=$_POST["cart"];

 date_default_timezone_set("Asia/Kolkata");
$date=date("Y/m/d H:i");
 $_SESSION["order_success"]='true';

 $rest_id=$_POST["rest_id"];

/*$insert="INSERT INTO order(Customer_id,Order_info,order_date) VALUES('2','m','222')";*/
$Order_info=json_encode($cart);
$insert="INSERT INTO `special_tbl` (`Customer_id`, `Order_info`, `order_date`,`rest_id`) VALUES ( '".$_SESSION["Customer_id"]."', '".$Order_info."', '".$date."', '".$rest_id."')";

	$res=mysqli_query($con,$insert);

	if($res==1)
	{
		$last_id = mysqli_insert_id($con);
		
		$insert_detail="INSERT INTO `order_detail` (`order_id`, `firstName`, `lastName`, `email`, `address`, `city`, `state`, `zip`) VALUES ( '".$last_id."', '".$firstName."', '".$lastName."', '".$email."', '".$address."', '".$city."', '".$state."', '".$lastName."')";
		$result=mysqli_query($con,$insert_detail);
		$data['status']=200;
		echo json_encode($data);  
	}

	else{
		$data['status']=400;
	    echo json_encode($data);  
	}				


	?>