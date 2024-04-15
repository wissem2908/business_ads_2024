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