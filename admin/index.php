<?php
include ('includes/header_1.php');
?>
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

<?php
    include ("includes/footer_1.php");

    ?>
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