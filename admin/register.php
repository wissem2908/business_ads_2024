<?php
include ('includes/header_1.php');
?>


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