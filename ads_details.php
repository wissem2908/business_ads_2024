<?php
$website=$_SERVER['SERVER_NAME'];
$ad_id = $_GET['id_ad'];

$category = $_GET['category'];
$ad_title = $_GET['ad_title'];
$username= $_GET['username'];
?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../css/owl.carousel.min.css">
    <link rel="stylesheet" href="../../../css/owl.theme.default.min.css">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.css" />
    <link rel="stylesheet" href="../../../css/style.css">
    <link rel="stylesheet" href="../../../css/index.css">
    <meta name="description" content="Business ads">
    <meta name="keywords" content="Business ads">
    <title>Ads from businesses direct to you</title>
    <style>

body{
   background: #282fab0f;
}
.heart{
  color:red;
}
    </style>
</head>

<body data-bs-spy="scroll" data-bs-target=".navbar" data-bs-offset="70">


    


  


<!-- *********************** user info **************************-->
<section class="container-fluid">
    <div class="row text-center">
        <div class="col-lg-12" id="user_url"> </div>
    </div>
    <br>
<input type="hidden" value='<?php echo $ad_id; ?>' id="ad_id"  />
<input type="hidden" value='<?php echo $category; ?>' id="category"  />
<input type="hidden" value='<?php echo $ad_title; ?>' id="ad_title"  />
<input type="hidden" value='<?php echo $username; ?>' id="username"  />


<div class="row">

    <div class="col-lg-3 col-md-12 col-sm-12">  
     <div class="row text-center">
        <div class="col-lg-12">
            <br/>
        <div class="card  mx-auto " >
        
      <div class="card-body">
      <a id="logo_url"><img  id="user_img" style="width:200px;height: 200px;" class="rounded-circle" ></a>
      <br><br>
                <h5> <span id="business_name"> </span></h5>
                <p id="user_link"></p>
            <p id="user_desc"> </p>
            <p id="address"> </p>
            <a id="google_map_link" target="_blank">Get directions</a>
           <a href="#" data-bs-toggle="modal" data-bs-target="#contact_user" class="btn btn-brand ms-lg-3">Contact </a>
               
      </div>
    </div>
        </div>

       </div>
    </div>
    <div class="col-lg-9 col-md-12 col-sm-12"> 
    <div class="row">
            
            </div>    
    <div class="row " >
       <div class="col-lg-12 "><br>
       <div class="card w-100  mx-auto  " >
        <div class="card-body" style="position:relative">
          
            <div class="row">
                
         <div class="col-lg-3">
           <a  id="image_ads_lien" class="fancybox mr-2" data-fancybox="gallery1"> <img   class="rounded" id='ad_image' ></a>
          
        </div> 
        <br/>
        <div class="col-lg-9"> 
       
        
        <br/>
            <h5 id="ads_title"></h5>
         
            <p id="ad_desc"></p>
     </div>
    </div>
    <br>
    <div class="d-flex " id="list_images">

       
    </div>
    <div id="share_div" style="position:absolute;left:40%;"></div>
     <input type="button" class=" btn btn-brand back-btn float-end" value="Back" onclick="history.back()">
    </div></div></div>

       </div>
    </div>
</div>







   
</section>

  <!-- *********************** ads list **************************-->
<section>
    
</section>




 

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
                        <a  href="../../../index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a  href="../../../about.php">About</a>
                    </li>
                  
                    <li class="nav-item">
                        <a  href="../../../index.php#advertisers">Advertisers</a>
                    </li>
                    <li class="nav-item">
                        <a  href="../../../blog.php">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a  href="../../../follow.php">Following</a>
                    </li>
                    <li >
                      <a  href="../../../terms_conditions.php">Terms & Conditions</a>
                  </li>
                  <li class="nav-item">
                      <a  href="../../../privacy_policy.php">Privacy Policy</a>
                  </li>
                    <!-- <li class="nav-item">
                    <a  href="../../../map.php">Ads Map</a>
                    </li> -->
                     <li class="nav-item">
                        <a  href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">Contact</a>
                    </li>
                   
                </ul>
               
            </div>
             <p class="mb-0"><a href="/"  style='color:white;text-decoration: none;'>Copyright © <?php echo $website ?> 2023</a></p>
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
                                style="background-image: url(../../../img/c2.jpg); min-height:300px;">
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

<!-- Modal -->
<div class="modal fade" id="contact_user" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-xl">
          <div class="modal-content">
              <div class="modal-body p-0">
                  <div class="container-fluid">
                      <div class="row gy-4">
                          <div class="col-lg-4 col-sm-12 bg-cover user_cover_img"
                              style="background:url('../../../img/c2.jpg'); min-height:300px; background-repeat:no-repeat; background-size:cover">
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
    <script src="../../../js/jquery.min.js"></script>
    <script src="../../../js/bootstrap.bundle.min.js"></script>
    <script src="../../../js/owl.carousel.min.js"></script>
    <script src="../../../js/app.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js" ></script>
    <script src="../../../assets/js/ads_details.js"></script>
    
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   
    <script>
        $(document).ready(function(){
    $('#send').click(function(e){
      
        e.preventDefault()
        var fullName=$('#fullName').val()
        var email=$('#email').val()
        var message=$('#message').val()
        console.log(email)
        if(fullName=="" || email=="" || message=="" ){
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Enter required field',
                
              })
        }else{
            $.ajax({
                url:'../../../assets/php/send_message.php',
                method:'post',
                async:false,
                data:{fullName:fullName,email:email,message:message},
                success:function(response){

                    console.log(response)
                    var data = JSON.parse(response)
                    if(data.reponse=="false" && data.message==1){
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Enter valid email format',
                            
                          })
                    }
                    else if(data.reponse=="true"){
                        Swal.fire({
                           
                            icon: 'success',
                            title: 'Message sent with success',
                            showConfirmButton: false,
                            timer: 1500
                          })  
                    }
                }
            })
        }
    })
})

          $(document).ready(function(){
             $("#website").html($("#website").text().replaceAll(".", "<span style='color:#FFDF00;'>.</span>"))
  
        })
    </script>
</body>

</html>


<script>

    
    $(document).ready(function(){
        $('.hide').hide();
    $(document).on('click', '.share_icons', function(){
      $(this).siblings('.hide').toggle();
    });
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