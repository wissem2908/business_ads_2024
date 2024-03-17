
<footer >
      
      <div class="footer-bottom text-center ">

              <div  class="col-sm-12" >
              <ul class="footer-nav">
                  <li >
                      <a  href="index.php">Home</a>
                  </li>
                  <li class="nav-item">
                      <a  href="about.php">About</a>
                  </li>
                
                  <li class="nav-item">
                      <a  href="index.php#advertisers">Advertisers</a>
                  </li>
                  <li class="nav-item">
                      <a  href="blog.php">Blog</a>
                  </li>
                  <li class="nav-item">
                      <a  href="follow.php">Following</a>
                  </li>
                  <!-- <li class="nav-item">
                  <a  href="map.php">Ads Map</a>
                  </li> -->
                  <li >
                      <a  href="terms_conditions.php">Terms & Conditions</a>
                  </li>
                  <li class="nav-item">
                      <a  href="privacy_policy.php">Privacy Policy</a>
                  </li>
                   <li class="nav-item">
                      <a  href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">Contact</a>
                  </li>
                 
              </ul>
             
          </div>
           <p class="mb-0"><a href="/"  style='color:white;text-decoration: none;'>Copyright © <?php echo $website; ?> 2023</a></p>
      </div>
  </footer>


<!-- Modal -->
<div class="modal fade" id="contact_user" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-xl">
          <div class="modal-content">
              <div class="modal-body p-0">
                  <div class="container-fluid">
                      <div class="row gy-4">
                          <div class="col-lg-4 col-sm-12 bg-cover user_cover_img"
                              style="background:url('./img/c2.jpg'); min-height:300px; background-repeat:no-repeat; background-size:cover">
                              <div>
                                  
                              </div>
                          </div>
                          <div class="col-lg-8">
                              <form class="p-lg-5 col-12 row g-3">
                                  <div>
                                      <h1 class="user_name"></h1>
                                  <p>Fell free to contact us and we will get back to you as soon as possible</p>
                                  </div>
                                  <input type="hidden" id='user_id' />
                                  <div class="col-lg-12">
                                      <label for="fullName" class="form-label">Full name</label>
                                      <input type="text" class="form-control" id="fullName_user"
                                          aria-describedby="emailHelp">
                                  </div>
                                
                                  <div class="col-12">
                                      <label for="email" class="form-label">Email address</label>
                                      <input type="email" class="form-control"  id="email_user"
                                          aria-describedby="emailHelp">
                                  </div>
                                  <div class="col-12">
                                      <label for="" class="form-label">Enter Message</label>
                                      <textarea name="message"  class="form-control" id="message_user"  rows="4"></textarea>
                                  </div>

                                  <div class="col-12">
                                      <button type="button" class="btn btn-brand" id="send_user_message">Send Message</button>
                                  </div>
                              </form>
                          </div>
                      </div>
                  </div>
              </div>

          </div>
      </div>
  </div>



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








 



<!-- /GetButton.io widget -->
</body>




  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/app.js"></script>
 
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="./assets/js/send_message.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
           $("#website").html($("#website").text().replaceAll(".", "<span style='color:#FFDF00;'>.</span>"))

      })
</script>

<!-- GetButton.io widget -->


</html>