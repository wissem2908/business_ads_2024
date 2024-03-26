<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="">
	<meta name="author" content="">
	<meta name="robots" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta property="og:title" content="">
	<meta property="og:description" content="">
	<meta property="og:image" content="">
	<meta name="format-detection" content="telephone=no">
	<style>



    </style>
	<!-- PAGE TITLE HERE -->
	<title>Admin Dashboard</title>
	
	<!-- FAVICONS ICON -->
	<link rel="shortcut icon" type="image/png" href="images/favicon.png">
    <link href="admin/css/style.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="admin/vendor/sweetalert2/sweetalert2.min.css">

</head>

<body class="">

    <div class=" mt-3 ">
         <br><br>
        <div class="container">
            <div class="row justify-content-center  align-items-center">
                <div class="col-md-10">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
									
                                    <h2 class="text-center mb-4">Sign up for an account </h2>
                                      <form method="post" >
                            <div class="card-body">
                               
                                     <div class="row"> 
                             <input type="hidden" name="register" value="register">
                                           <div class="mb-3 col-lg-6 col-md-12">
                                <label class="form-label">First Name</label>
                                            <input type="text" id="first_name" name="first_name" class="form-control input-default " >
                                        </div>
                                        <div class="mb-3 col-lg-6 col-md-12">
                                <label class="form-label">Last Name</label>
                                            <input type="text" id="last_name" name="last_name" class="form-control input-default " >
                                        </div>
                                        <div class="mb-3 col-lg-6 col-md-12">
                                <label class="form-label">Email </label>
                                            <input type="email" id="email" name="email" class="form-control input-default " >
                                        </div>
                                        <div class="mb-3 col-lg-6 col-md-12">
                                <label class="form-label">Mobile Number</label>
                                            <input type="text" id="mobile_number" name="mobile_number" class="form-control input-default " >
                                        </div>
                                       
                                    </div>
                               
                              
                            </div>
                            <div class="card-footer"><button  id="signup" class="btn  btn-square btn-primary">Sign me up</button></div>
                             </form>
                                    <div class="new-account mt-3">
                                        <p>Already have an account? <a class="text-primary" href="index.php">Sign in</a></p>
                                    </div>
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
<script src="admin/js/dlabnav-init.js"></script>
<script src="admin/assets/js/register.js"></script> 

<script type="text/javascript" src="admin/vendor/sweetalert2/sweetalert2.min.js"></script>


<script>

$(document).ready(function(){



    $("#signup").click(function(e){
        e.preventDefault()
        var first_name = $('#first_name').val()
        var last_name = $('#last_name').val()
        var email = $('#email').val()
        var mobile_number = $('#mobile_number').val()

        $.ajax({
            url:'assets/php/add_user.php',
            method:'post',
            async:false,
            data:{first_name:first_name,last_name:last_name,email:email,mobile_number:mobile_number},
            success:function(response){
                console.log(response)
                var data = JSON.parse(response);
                if(data.reponse=="false" && data.message==1){
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Enter required fields!',
                            
                          })
                      }else if(data.reponse=="false" && data.message==2){
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'First name and last name must be alphanumeric !',
                            
                          })
                      }  else if(data.reponse=="false" && data.message==4){
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Invalid email format',
                            
                          })
                      }else if(data.reponse=="false" && data.message==6){
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Email Exist',
                            
                          })
                      }
                      
                      else if(data.reponse=="true" ){
Swal.fire({

  icon: 'success',
  title: 'Account created, Please check your email for account activation',
  showConfirmButton: true,

})
                      }
            }
        })

    })


})

</script>
</body>
</html>