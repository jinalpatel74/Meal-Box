<?php
session_start();
include_once("cnn.php");
if(isset($_SESSION["Admin_login"]) )
{
    $Admin_id=$_SESSION["Admin_id"];
    $Admin_name=$_SESSION["Admin_name"];
    
}
else
{

    header("location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
    
<head>
        <meta charset="utf-8" />
        <title>MealBox - Admin & Dashboard Template</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        
        <!-- App favicon -->
        <link rel="shortcut icon" href="../assets/AdminAssets/images/favicon.jpg">

        <!-- plugins -->
        <link href="../assets/AdminAssets/libs/flatpickr/flatpickr.min.css" rel="stylesheet" type="text/css" />

        <!-- App css -->
        <link href="../assets/AdminAssets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/AdminAssets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/AdminAssets/css/app.min.css" rel="stylesheet" type="text/css" />

    </head>