<?php
include_once("cnn.php");
session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/FrontAssets/css/bootstrap.min.css"> 
    <link rel="stylesheet" href="../assets/FrontAssets/css/font.min.css"> 
    <link rel="stylesheet" href="../assets/FrontAssets/css/font-awesome.min.css"> 
    <link rel="stylesheet" href="../assets/FrontAssets/css/toastr.min.css"> 
    
    <title>Meal Box!</title>
  </head>
  <body>
    <header>
      <nav class="navbar navbar-expand-lg navbar-dark "  style=" background-color: #bd2130;font-family: georgia;"	;>
        <a class="navbar-brand text-white" href="#">MEALBOX</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="http://localhost/mealbox/register_restaurant.php">Restaurants<span class="sr-only"></span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="http://localhost/mealbox/contact.php">Contact<span class="sr-only"></span></a>
            </li>
            <li class="nav-item " id='login_nav'>
              <?php if(isset($_SESSION["Customer_login"])){?>
              
                <div class="dropdown ml-3 mt-2">
                    <span class="text-white mr-1"><?php echo $_SESSION["Customer_name"];?></span>
                      <a href="#" id="imageDropdown" data-toggle="dropdown" >
                        <img src="http://localhost/mealbox/restaurants/images/<?php echo $_SESSION["Customer_Image"];?>" class="img-fluid rounded-circle" style="max-height: 30px;max-width: 30px">
                      </a>
                      <ul class="dropdown-menu" role="menu" aria-labelledby="imageDropdown" style="margin-left: -100px"  >
                        <li role="presentation"><a class="dropdown-item" href="logout.php" >Logout</a></li>
                      </ul>
                    </div>
              <?php }else{ ?>

                <a class="nav-link" href="javascript:void(0)" data-toggle="modal" data-target="#exampleModal">Login</a>
              <?php } ?>
            
            </li>
            <?php if(!isset($_SESSION["Customer_login"])){?>
            <li class="nav-item " id="register_nav">
                <a class="nav-link" href="javascript:void(0)" data-toggle="modal" data-target="#registerModal">Register</a>
            </li>
           
            <?php }?>
            <li class="nav-item ">
                <a href="http://localhost/mealbox/restaurants/cart.php"><i class="fa  badge icon-cog" style="font-size:24px" id="cart_icon" value=0>&#xf07a;</i></a>
            </li>
          </ul>
         
        </div>
      </nav>
    </header>

        <!-- Modal -->
       <div class="modal fade bd-example-modal-sm" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered" role="document">
           <div class="modal-content">
             <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">Login</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
               </button>
             </div>
               <form id="login_form">
                 <div class="modal-body">
                     <div class="form-group">
                       <label for="recipient-name" class="col-form-label">Email:</label>
                       <input type="email" required="true" class="form-control" id="email" name="email">
                     </div>
                     <div class="form-group">
                       <label for="message-text" class="col-form-label">Password:</label>
                       <input type="password" required="true" class="form-control" id="password" name="password">
                     </div>
                 </div>
                 <div class="modal-footer">
                  <p>New user? <a href="javascript:void(0)" id="register_modal_a"> Register</a></p>
                   <button type="submit" class="btn btn-danger">Login</button>
                 </div>
               </form>
           </div>
         </div>
       </div>
       <div class="modal fade bd-example-modal-sm" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered" role="document">
           <div class="modal-content">
             <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">Register</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
               </button>
             </div>
               <form id="register_form" method="post">
                 <div class="modal-body">
                       <label for="reg_name" class="col-form-label">Name:</label>
                       <input type="text" required="true" class="form-control" id="reg_name" name="name">
                       <label for="reg_email" class="col-form-label">Email:</label>
                       <input type="email" required="true" class="form-control" id="reg_email" name="email">
                       <label for="reg_password" class="col-form-label">Password:</label>
                       <input type="password" required="true" class="form-control" id="reg_password" name="password">
                       <label for="address" class="col-form-label">Address:</label>
                       <textarea class="form-control" id="address" name="address"></textarea>
                       <label for="reg_contact" class="col-form-label">Contact:</label>
                       <input type="text" required="true" class="form-control" id="reg_contact" name="contact">
                       <label for="profile_pic" class="col-form-label">Profile Pic:</label>
                       <input type="file" class="form-control" id="profile_pic" name="profile_pic">
                 </div>
                 <div class="modal-footer">
                  <p>Registered already ? <a href="javascript:void(0)" id="login_modal_a"> Login</a></p>
                   <button type="submit" class="btn btn-danger">Register</button>
                 </div>
               </form>
           </div>
         </div>
       </div> 