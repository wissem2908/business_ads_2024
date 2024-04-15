<!DOCTYPE html>
<html lang="en" class="h-100">
<?php
$website=$_SERVER['SERVER_NAME'];
?>
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
	
	<!-- PAGE TITLE HERE -->
	<title>Admin Dashboard</title>
	
	<!-- FAVICONS ICON -->
	<link rel="shortcut icon" type="image/png" href="images/favicon.png">
    <link href="css/style.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="vendor/sweetalert2/sweetalert2.min.css">



    <link rel="stylesheet" href="./css/bootstrap.min.css">
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

    <div class=" mt-3  mb-3">
         <br><br>

        <div class="container-fluid">
            <div class="row">


                    <div class="col-lg-6">
                            <div class="row justify-content-center  align-items-center">
                                <div class="col-md-12">
                                    <div class="authincation-content">
                                        <div class="row no-gutters">
                                            <div class="col-xl-12">
                                                <div class="auth-form">
                                                    
                                                    <h2 class="text-center mb-4">Sign up for an account - Business Only </h2>
                                                    <form method="post" enctype="multipart/form-data" id="add_user">
                                            <div class="card-body">
                                            
                                                    <div class="row"> 
                                            <input type="hidden" name="register" value="register">
                                                        <div class="mb-3 col-lg-6 col-md-12">
                                                <label class="form-label">Business Name</label>
                                                            <input type="text" name="business_name" class="form-control input-default " >
                                                        </div>
                                                        
                                                        <div class="mb-3 col-lg-6 col-md-12">
                                                <label class="form-label">Email </label>
                                                            <input type="text" name="email" class="form-control input-default " >
                                                        </div>
                                                        <div class="mb-3 col-lg-12 col-md-12">
                                                <label class="form-label">Contact Name</label>
                                                            <input type="text" name="contact_name" class="form-control input-default " >
                                                        </div>
                                                        <div class="mb-3 col-lg-6 col-md-12">
                                            
                                                            <select  class="form-control input-default hidden " hidden name="status" >
                                                                <option></option>
                                                                <option value="active">Active</option>
                                                                <option selected="true" value="inactive">Inactive</option>
                                                            
                                                            </select>
                                                        </div>
                                                        <div class="mb-3 col-lg-6 col-md-12">
                                            
                                                            <select  class="form-control input-default hidden " hidden name="role" >
                                                                <option></option>
                                                                <option  value="admin">Admin</option>
                                                                <option selected="true" value="user">User</option>
                                                            
                                                            </select>
                                                        </div>
                                                        
                                                        
                                                        <div class="mb-3 col-lg-12 col-md-12">
                                                <label class="form-label">Logo</label>
                                                            <input type="file" name="logo" id="logo" class="form-control input-default " >
                                                        </div>
                                                    </div>
                                            
                                            
                                            </div>
                                            <div class="card-footer"><button type="submit" class="btn  btn-square btn-primary">Sign me up</button></div>
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
                    <div class="col-lg-6">
                    <div class="row justify-content-center  align-items-center">
                <div class="col-md-12">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
									
                                    <h2 class="text-center mb-4">Sign up for an account - Customer </h2>
                                    <h5 class="text-center mb-4">(Place "Wanted" ads only)</h5>
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
<script src="js/dlabnav-init.js"></script>
<script src="assets/js/register.js"></script>

<script type="text/javascript" src="vendor/sweetalert2/sweetalert2.min.js"></script>
<script>

$(document).ready(function(){



    $("#signup").click(function(e){
        e.preventDefault()
        var first_name = $('#first_name').val()
        var last_name = $('#last_name').val()
        var email = $('#email').val()
        var mobile_number = $('#mobile_number').val()

        $.ajax({
            url:'../assets/php/add_user.php',
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