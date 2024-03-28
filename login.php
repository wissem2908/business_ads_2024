<?php

session_start();
if(isset($_SESSION['login']) && $_SESSION['login']=="yes"){
    header('location:admin/dashboard.php');
}
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
    <link href="admin/css/style.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="admin/vendor/sweetalert2/sweetalert2.min.css">

</head>

<body class="vh-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
									
                                    <h4 class="text-center mb-4">Sign in your account</h4>
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


    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
   <script src="admin/vendor/global/global.min.js"></script>

    <script src="admin/js/custom.min.js"></script>
  

<script type="text/javascript" src="admin/vendor/sweetalert2/sweetalert2.min.js"></script>
<script>


$(document).ready(function(){


$('#login').click(function(e){
    e.preventDefault();

    var username=$('#username').val()
    var password = $('#password').val()

    $.ajax({
        url:'assets/php/login.php',
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
text: 'Enter username and password !',

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