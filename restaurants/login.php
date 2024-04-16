<?php
session_start();

include_once("cnn.php");
$email=$_POST["email"];
$password=$_POST["password"];
$query="select * from  customer where Customer_email='".$email."' and Customer_pass='".$password."'";
$res=mysqli_query($con,$query);
if($row=mysqli_fetch_array($res))
{
    $_SESSION["Customer_id"]=$row["Customer_id"];
    $_SESSION["Customer_name"]=$row["Customer_name"];
    $_SESSION["Customer_Image"]=$row["Customer_Image"];
    $_SESSION["Customer_login"]='true';
    $data['Customer_name']=$row["Customer_name"];
    $data['Customer_Image']=$row["Customer_Image"];
    $data['status']=200;
    echo json_encode($data);  
}
else
{
    $data['status']=400;
    echo json_encode($data);  
}   

?>