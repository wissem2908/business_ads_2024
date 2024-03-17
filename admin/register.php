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
	
	<!-- PAGE TITLE HERE -->
	<title>Admin Dashboard</title>
	
	<!-- FAVICONS ICON -->
	<link rel="shortcut icon" type="image/png" href="images/favicon.png">
    <link href="css/style.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="vendor/sweetalert2/sweetalert2.min.css">

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

</body>
</html>