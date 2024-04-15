﻿<?php

session_start();
if(isset($_SESSION['login']) && $_SESSION['login']=="yes"){
    header('location:dashboard.php');
}

$website=$_SERVER['SERVER_NAME'];

?>

<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="">
	<meta name="author" content="">
	<meta name="robots" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Fillow : Fillow Saas Admin  Bootstrap 5 Template">
	<meta property="og:title" content="Fillow : Fillow Saas Admin  Bootstrap 5 Template">
	<meta property="og:description" content="Fillow : Fillow Saas Admin  Bootstrap 5 Template">
	<meta property="og:image" content="https://fillow.dexignlab.com/xhtml/social-image.png">
	<meta name="format-detection" content="telephone=no">
	
	<!-- PAGE TITLE HERE -->
	<title>Business Ads | Login</title>
	
	<!-- FAVICONS ICON -->
	<link rel="shortcut icon" type="image/png" href="images/favicon.png">
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="vendor/sweetalert2/sweetalert2.min.css">


    <!-- <link rel="stylesheet" href="../css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="../css/owl.carousel.min.css">
    <link rel="stylesheet" href="../css/owl.theme.default.min.css">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../css/style.css">
    <style>
    .footer-nav{
        position: absolute;
        left: 0
    }
   .footer-nav li {
  display:inline !important;
}
.footer-nav li a{
    color:#fff;
    text-decoration: none;
    padding: 10px;
}
@media only screen and (max-width: 1020px) {
    .footer-nav{
        width:100%;
        
    }
    .copy{
        margin-top: 30px;
    }
}
</style>
</head>

<body class="">


    <!-- BOTTOM NAV -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top">
        <div class="container">
            <a class="navbar-brand" href="/" id="website"></a><img src="../img/logo.png" style='width:150px;'/>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="../index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../about.php">About</a>
                    </li>
                  
                    <li class="nav-item">
                        <a class="nav-link" href="../advertisers.php">Advertisers</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../blog.php">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../follow.php">Following</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" target='_blank' href="../map.php">Map</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" target='_blank' href="../wanted.php">Wanted</a>
                    </li>
                     <li class="nav-item">
                        <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">Contact</a>
                    </li>
                   
                </ul>
               
                <a href="./"  class="btn btn-brand ms-lg-3">Login</a>
                 <a href="./register.php"  class="btn btn-brand ms-lg-3">Register</a>
            </div>
        </div>
    </nav>


<div class="container">

<div class="row">
    <div class="col-lg-6">
    <div class="authincation h-100" style="background:rgb(210 201 229 / 10%);">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-12">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
									
                                    <h4 class="text-center mb-4">Sign in your account - Business Only</h4>
                                    <p class="text-center mb-4" style="color:transparent">(Place "Wanted" ads only)</p>
                                    <form action="index.html">
                                        <div class="mb-3">
                                            <label class="mb-1"><strong>Username</strong></label>
                                            <input type="text" class="form-control" id="username">
                                        </div>
                                        <div class="mb-3">
                                            <label class="mb-1"><strong>Password</strong></label>
                                            <input type="password" class="form-control" id="password" >
                                        </div>
                                        <div class="row d-flex justify-content-between mt-4 mb-2">
                                           
                                            <div class="mb-3">
                                                <a href="forgot_password.php">Forgot Password?</a>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary btn-block" id="login">Sign Me In</button>
                                        </div>
                                    </form>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="col-lg-6">
    <div class="authincation h-100" style="background:rgb(210 201 229 / 10%);">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-12">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
									
                                    <h4 class="text-center mb-4">Sign in your account - Customer</h4>
                                    <p class="text-center mb-4">(Place "Wanted" ads only)</p>
                                    <form action="index.html">
                                        <div class="mb-3">
                                            <label class="mb-1"><strong>Username</strong></label>
                                            <input type="text" class="form-control" id="username">
                                        </div>
                                        <div class="mb-3">
                                            <label class="mb-1"><strong>Password</strong></label>
                                            <input type="password" class="form-control" id="password" >
                                        </div>
                                        <div class="row d-flex justify-content-between mt-4 mb-2">
                                           
                                            <div class="mb-3">
                                                <a href="forgot_password.php">Forgot Password?</a>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary btn-block" id="login_customer">Sign Me In</button>
                                        </div>
                                    </form>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
</div>

  
<footer >
      
      <div class="footer-bottom text-center ">

              <div  class="col-sm-12" >
              <ul class="footer-nav">
                  <li >
                      <a  href="terms_conditions.php">Terms & Conditions</a>
                  </li>
                  <li class="nav-item">
                      <a  href="privacy_policy.php">Privacy Policy</a>
                  </li>
                
              </ul>
             
          </div>
           <p class="mb-0"><a href="/"  style='color:white;text-decoration: none;'>Copyright © <?php echo $website; ?> 2023</a></p>
      </div>
  </footer>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-xl">
          <div class="modal-content">
              <div class="modal-body p-0">
                  <div class="container-fluid">
                      <div class="row gy-4">
                          <div class="col-lg-4 col-sm-12 bg-cover"
                              style="background-image: url(img/c2.jpg); min-height:300px;">
                              <div>
                                  
                              </div>
                          </div>
                          <div class="col-lg-8">
                              <form class="p-lg-5 col-12 row g-3">
                                  <div>
                                      <h1>Get in touch</h1>
                                  <p>Fell free to contact us and we will get back to you as soon as possible</p>
                                  </div>
                                  <div class="col-lg-12">
                                      <label for="fullName" class="form-label">Full name</label>
                                      <input type="text" class="form-control" id="fullName"
                                          aria-describedby="emailHelp">
                                  </div>
                                
                                  <div class="col-12">
                                      <label for="email" class="form-label">Email address</label>
                                      <input type="email" class="form-control"  id="email"
                                          aria-describedby="emailHelp">
                                  </div>
                                  <div class="col-12">
                                      <label for="" class="form-label">Enter Message</label>
                                      <textarea name="message"  class="form-control" id="message"  rows="4"></textarea>
                                  </div>

                                  <div class="col-12">
                                      <button type="button" class="btn btn-brand" id="send">Send Message</button>
                                  </div>
                              </form>
                          </div>
                      </div>
                  </div>
              </div>

          </div>
      </div>
  </div>





  
    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
   <script src="vendor/global/global.min.js"></script>

    <script src="js/custom.min.js"></script>
  
<script type="text/javascript" src="assets/js/login.js"></script>
<script type="text/javascript" src="vendor/sweetalert2/sweetalert2.min.js"></script>
<script>


$(document).ready(function(){


$('#login_customer').click(function(e){
    e.preventDefault();

    var username=$('#username').val()
    var password = $('#password').val()

    $.ajax({
        url:'../assets/php/login.php',
        method:'post',
        async:false,
        data:{password:password,username:username},
        success:function(response){
            console.log(response)
            var data = JSON.parse(response)

            if(data.reponse=='false' && data.message==1){
                Swal.fire({
icon: 'error',
title: 'Oops...',
text: 'Enter correct username and password !',

})
            }else if(data.reponse=='false' && data.message==2){
                Swal.fire({
icon: 'error',
title: 'Oops...',
text: 'Inactive Account !',

})
            }else if(data.reponse=='false' && data.message==3){
                Swal.fire({
icon: 'error',
title: 'Oops...',
text: 'User Not Found !',

})
            }else if(data.reponse=="true"){
                window.location.href="admin/dashboard.php"
            }
        }
    })//ajax
})//click
})//ready
</script>
</body>
</html>