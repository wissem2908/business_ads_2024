<?php
include ('includes/header_1.php');
?>

    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
									
                                    <h4 class="text-center mb-4">Recover your password</h4>
                                    <form action="index.html">
                                        <div class="mb-3">
                                            <label class="mb-1"><strong>Email</strong></label>
                                            <input type="email" class="form-control" id="email">
                                        </div>
                                       
                                        <div class="row d-flex justify-content-between mt-4 mb-2">
                                           
                                         
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary btn-block" id="change_pass">Send me a new password</button>
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
    <script type="text/javascript" src="assets/js/change_pass.js"></script>

<script type="text/javascript" src="vendor/sweetalert2/sweetalert2.min.js"></script>



<script src="../js/jquery.min.js"></script>
  <script src="../js/bootstrap.bundle.min.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="../js/owl.carousel.min.js"></script>
  <script src="../assets/js/content.js"></script>
  <script src="../js/app.js"></script>
  <script src="../assets/js/list_users.js"></script>
  <script src="../assets/js/send_message.js"></script>
  
</body>
</html>