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
   <?php

include ("includes/footer_1.php");
?>
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