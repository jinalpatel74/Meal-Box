<?php
session_start();

include_once("cnn.php");

if(isset($_POST["login_btn"]))
{
    $email=$_POST["email"];
    $password=$_POST["password"];
    $query="select * from  admin where Admin_email='".$email."' and Admin_pass='".$password."'";
    $res=mysqli_query($con,$query);
    if($row=mysqli_fetch_array($res))
    {
        $_SESSION["Admin_id"]=$row["Admin_id"];
        $_SESSION["Admin_name"]=$row["Admin_name"];
        $_SESSION["Admin_login"]='true';
        
        header("location:index.php");
    }
    else
    {
        $_SESSION["error"]='true';
        
        header("locaton:login.php");
    }   
}
?>
<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from shreyu.coderthemes.com/pages-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 16 Jul 2020 17:07:41 GMT -->
<head>
        <meta charset="utf-8" />
        <title>Mealbox Admin</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        
        <!-- App favicon -->
        <link rel="shortcut icon" href="../assets/AdminAssets/images/favicon.jpg">

        <!-- App css -->
        <link href="../assets/AdminAssets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/AdminAssets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/AdminAssets/css/app.min.css" rel="stylesheet" type="text/css" />

    </head>

    <body class="authentication-bg">
        
        <div class="account-pages my-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-10">
                        <div class="card">
                            <div class="card-body p-0">
                                <div class="row">
                                    <div class="col-md-6 p-5">
                                        <div class="mx-auto mb-5">
                                            <a href="index.html">
                                                <img src="../assets/AdminAssets/images/logo.jpg" alt="" height="30" />
                                                <h3 class="d-inline align-middle ml-1 text-logo">MealBox</h3>
                                            </a>
                                        </div>

                                        <h6 class="h5 mb-0 mt-4">Welcome back!</h6>
                                        <p class="text-muted mt-1 mb-4">Enter your email address and password to
                                            access admin panel.</p>

                                        <form action="" method="post" class="authentication-form">
                                            <?php if(isset($_SESSION["error"])){
                                            ?>
                                            <div class="badge badge-danger">
                                                Invalid Credentials
                                            </div>
                                            <?php
                                                }
                                            ?>

                                            <div class="form-group">
                                                <label class="form-control-label">Email Address</label>
                                                <div class="input-group input-group-merge">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="icon-dual" data-feather="mail"></i>
                                                        </span>
                                                    </div>
                                                    <input type="email" name="email" class="form-control" id="email"  placeholder="Enter your email">
                                                </div>
                                            </div>

                                            <div class="form-group mt-4">
                                                <label class="form-control-label">Password</label>
                                                
                                                <div class="input-group input-group-merge">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="icon-dual" data-feather="lock"></i>
                                                        </span>
                                                    </div>
                                                    <input type="password" class="form-control" name="password" placeholder="Enter your password">
                                                </div>
                                                <!-- <a href="pages-recoverpw.html" class="float-right text-muted  ml-1">Forgot your password ?</a> -->
                                            </div>

                                          

                                            <div class="form-group mb-0 text-center">
                                                <button class="btn btn-primary btn-block" type="submit" id="login_btn" name="login_btn"> Log In
                                                </button>
                                            </div>
                                        </form>
                                       
                                    </div>
                                    <div class="col-lg-6 d-none d-md-inline-block">
                                        <div class="auth-page-sidebar">
                                            <div class="overlay"></div>
                                            <div class="auth-user-testimonial">
                                                <p style="font-size: 30px;font-family: nunito;">A TASTE OF HOME !</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->

                        

                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->

        <!-- Vendor js -->
        <script src="../assets/AdminAssets/js/vendor.min.js"></script>

        <!-- App js -->
        <script src="../assets/AdminAssets/js/app.min.js"></script>
        
    </body>

<!-- Mirrored from shreyu.coderthemes.com/pages-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 16 Jul 2020 17:07:41 GMT -->
</html>