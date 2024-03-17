
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









  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="./assets/js/content.js"></script>
  <script src="js/app.js"></script>
  <script src="./assets/js/list_users.js"></script>
  <script src="./assets/js/send_message.js"></script>
  
  <script>
     
  </script>
</body>

</html>

<script>

$(document).ready(function(){
  $(".users").slice(0, 6).show(); //showing 3 div
console.log($('.users'))
if($(".users:hidden").length ==0)
  {
      $(".loadMore").fadeOut(); //this will hide
      //button when length is 0
  }
$(".loadMore").on("click",function(){
  $(".users:hidden").slice(0, 6).show(); //showing 3 hidden div on click

  if($(".users:hidden").length ==0)
  {
      $(".loadMore").fadeOut(); //this will hide
      //button when length is 0
  }
})


$("#website").html($("#website").text().replaceAll(".", "<span style='color:#FFDF00;'>.</span>"))


})





$(document).on('click', '.bookmark', function(){
      $(this).toggleClass('heart')
      
      var data_type = $(this).attr('data_type')
        var id = $(this).attr('data')
      if(data_type=="ads"){

   
      if($(this).hasClass('heart')){


        var adsArray = localStorage.getItem("ads");
      
        
if(adsArray==null){
  adsArray=[];
  adsArray.push(id)
  adsArray = JSON.stringify(adsArray);
}else{
  var adsArray = JSON.parse(adsArray);
  if(!adsArray.includes(id)){
    adsArray.push(id)
  adsArray = JSON.stringify(adsArray);
  }

}
localStorage.setItem("ads",adsArray);

      
      }else{
        var adsArray = localStorage.getItem("ads");
        var adsArray = JSON.parse(adsArray);

       
        var id = $(this).attr('data').toString();
        const index = adsArray.indexOf(id);
if (index > -1) { 
  adsArray.splice(index, 1); 
  adsArray = JSON.stringify(adsArray);
  localStorage.setItem("ads",adsArray);
}
      }
    }else if(data_type=="users"){

        
      if($(this).hasClass('heart')){


var adsArray = localStorage.getItem("users");


if(adsArray==null){
adsArray=[];
adsArray.push(id)
adsArray = JSON.stringify(adsArray);
}else{
var adsArray = JSON.parse(adsArray);
if(!adsArray.includes(id)){
adsArray.push(id)
adsArray = JSON.stringify(adsArray);
}

}
localStorage.setItem("users",adsArray);


}else{
var adsArray = localStorage.getItem("users");
var adsArray = JSON.parse(adsArray);


var id = $(this).attr('data').toString();
const index = adsArray.indexOf(id);
if (index > -1) { 
adsArray.splice(index, 1); 
adsArray = JSON.stringify(adsArray);
localStorage.setItem("users",adsArray);
}
}

    }

    });



</script>