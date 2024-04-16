<?php include 'header.php';?>

    
<?php

$id=$_REQUEST["delete"];
$update="delete  from customer where Customer_id='".$id."'";
$ans=mysqli_query($con,$update);
if($ans==1)
{
    echo "<script>alert('User deleted');</script>"; 

    $_SESSION["delete"]=true;
	header("Location:users.php");

}
