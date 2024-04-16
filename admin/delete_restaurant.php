<?php include 'header.php';?>

    
<?php

$id=$_REQUEST["delete"];
$update="delete  from restaurant where Restaurant_id='".$id."'";
$ans=mysqli_query($con,$update);
if($ans==1)
{
    echo "<script>alert('Restaurant deleted');</script>"; 

    $_SESSION["delete"]=true;
	header("Location:restaurants.php");

}
