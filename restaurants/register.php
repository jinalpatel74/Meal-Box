<?php
include_once("cnn.php");
 
$name=$_POST["name"];
$email=$_POST["email"];
$contact=$_POST["contact"];
$address=$_POST["address"];
$password=$_POST["password"];
$query="select * from customer where Customer_email='".$email."'";
$ans=mysqli_query($con,$query);
$row=mysqli_fetch_array($ans);

if($row){
	$data['status']=300;
	echo json_encode($data);
}
else{
	if(isset($_FILES['profile_pic'])){
	     $errors= array();
	     $file_name = uniqid().$_FILES['profile_pic']['name'];
	     $file_size =$_FILES['profile_pic']['size'];
	     $file_tmp =$_FILES['profile_pic']['tmp_name'];
	     $file_type=$_FILES['profile_pic']['type'];
	     
	    if(empty($errors)==true){
	        move_uploaded_file($file_tmp,"images/".$file_name);
	    }
	  }

	$insert="INSERT INTO customer(Customer_name,Customer_email,Customer_contact,Customer_address,Customer_pass,Customer_Image) VALUES('".$name."','".$email."','".$contact."','".$address."','".$password."','".$file_name."')";

	$res=mysqli_query($con,$insert);

	if($res==1)
	{

		$data['status']=200;
		echo json_encode($data);  
	}
	else
	{
		$data['status']=400;
	    echo json_encode($data);  
		
	}
}
	?>