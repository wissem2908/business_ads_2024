<?php

$website=$_SERVER['SERVER_NAME'];
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
               <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/index.css">
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
        <div class="col-lg-12" ><p class="title" id="user_url"></p> </div>
    </div>
    <br>


    <div class="row ">

<div class="col-lg-3">
    <div class="row text-center">
        <div class="col-lg-12" id="user_card">
            <br/>
            <div class="card  mx-auto ">
            
                    <div class="card-body">
                                <a id="logo_url"> <img  id="user_img" style="width:200px;height: 200px;" class="" ></a>
                                <br><br>
                                <p class="title"> <span id="business_name"> </span></p>
                                <p id="user_link"></p>
                                <p id="user_desc"> </p>
                                    <p id="address"> </p>
                                <a id="google_map_link" target="_blank">Get directions</a>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#contact_user" class="btn btn-brand ms-lg-3">Contact </a>
                            <div id="share_div"></div>
                        
                    </div>
            </div>
        </div> 
        <div class="col-lg-12" id="hours_card">
            <br/>
            <div class="card  mx-auto " style=" border:4px solid #262626;">
            
                <div class="card-body" id="open_time">
                        <h5 class="time_title title">Opening Hours</h3>

                                        
                </div>
            </div>
        </div>
        <div class="col-lg-12" id="liste_cat">
        
                <p class="title" style="margin-top:25px;">Categories</p>
            <a href="#" class="list-group-item list-group-item-action active category" data="all" aria-current="true">
            All
            </a> 
        </div>
    </div>
</div>
<div class="col-lg-9">
<div class="row">
        <div class="col-lg-12">
            <div class="row " id="list_ads">    

<img id="company_cover" width="800px" height='400px' />
</div>
        </div>
          <div class="col-lg-3">
            <br>
       <div class="row">
      

    

          
       </div>
   </div>
        </div>
</div>
</div>

   <div class="row text-center">



    <style>
       .time_title {
            border: 4px solid #ffdf00;
    padding: 8px;
    background: #262626;
    color: #ddd9d9;
        }
        .category.active{
            background:#ffdf00;
            border:1px solid #ffdf00;
        }
        .title{
            font-size: 20px !important;
            font-weight: bold !important;
        }
    </style>

   </div>
   
   <br>





   
</section>

  <!-- *********************** ads list **************************-->
<section>
    
</section>




 
<style>
    .eARkMz, .evMtho{

opacity: 1;
display: none !important;
margin-top: 7px;
white-space: nowrap;
margin-right: auto;
text-decoration: none;
width: 64px;
font-family: Roboto, "Helvetica Neue", sans-serif;
font-size: 11px;
line-height: 11px;
border: 0px;
max-width: inherit;
color: rgb(175, 175, 175) !important;
}
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


<?php
include ('includes/footer_2.php');
?>




<script src="./assets/js/list_ads.js"></script>

<script>

    
    $(document).ready(function(){
        $('.hide').hide();
    $(document).on('click', '.share_icons', function(){
        console.log('ok')
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