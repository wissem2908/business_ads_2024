
<?php
include 'includes/header.php';
      ?>
        <div class="content-body">
            <!-- row -->
            <div class="container-fluid">
                    <div class="row page-titles">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Other Users</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Edit User</a></li>
                    </ol>
                </div>
               <div class="row">
                           <div class="col-lg-12 col-md-12 ">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Reset Password</h4>
                              
                            </div>
                            <div class="card-body"> 
                             <div class="row">
                             <div class="mb-3 col-lg-6 col-md-12">
                                <label class="form-label">Password </label>
                                            <input type="text" class="form-control input-default " name="password" id="passwordR">
                                        </div> <div class="mb-3 col-lg-4 col-md-12">
                               <a id="generate_password" class="btn  btn-square btn-outline-primary" style="margin-top:27px">Generate password</a>
                                        </div>
                                           
                               </div>
                             </div>
                              <div class="card-footer"> <a type="button" id="resetPassword" class="btn  btn-square btn-primary">Reset Password</a></div>

                        </div>
               </div>
<div class="col-lg-12 col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Edit User</h4>
                                <img class="rounded-circle" width="40" id="img_logo" alt="">
                            </div>
                             <form method="post" enctype="multipart/form-data" id="edit_user" >
                            <div class="card-body">
                               
                                     <div class="row"> 
                             <input type="hidden" name="user_id" value="<?php echo $_GET['user_id'];?>" id="user_id">
                                           <div class="mb-3 col-lg-6 col-md-12">
                                <label class="form-label">First Name</label>
                                            <input type="text" id="first_name" name="first_name" class="form-control input-default " >
                                        </div>
                                        <div class="mb-3 col-lg-6 col-md-12">
                                <label class="form-label">Last Name</label>
                                            <input type="text" id="last_name" name="last_name" class="form-control input-default " >
                                        </div>
                                        <div class="mb-3 col-lg-6 col-md-12">
                                <label class="form-label">Email <span class="text-danger">*</span></label>
                                            <input type="text" id="email" name="email" class="form-control input-default " >
                                        </div>
                                      
                                        <div class="mb-3 col-lg-6 col-md-12">
                                <label class="form-label">Status</label>
                                            <select  class="form-control input-default " id="status"  name="status" >
                                                  <option></option>
                                                <option value="active">Active</option>
                                                <option value="inactive">Inactive</option>
                                               
                                            </select>
                                        </div>
                                       
                                         <div class="mb-3 col-lg-6 col-md-12">
                                <label class="form-label">Username <span class="text-danger">*</span></label>
                                            <input type="text" id="username" name="username" class="form-control input-default " >
                                        </div>
                                        <div class="mb-3 col-lg-6 col-md-12">
                                <label class="form-label">Phone Number </label>
                                            <input type="tel" name="mobile_number" inputmode="tel" id="mobile_number" class="phone form-control input-default " >
                                           
                                        </div>
                                    
                                        
                                        
                                    </div>
                               
                              
                            </div>
                            <div class="card-footer"><button type="submit" class="btn  btn-square btn-primary">Edit User</button></div>
                             </form>
                        </div>
               </div>
    
            </div>
        </div>
      </div>
       <?php
include 'includes/footer.php';
      ?>
<script src='https://cdnjs.cloudflare.com/ajax/libs/inputmask/4.0.8/jquery.inputmask.bundle.min.js'></script>
<!-- <script type="text/javascript" src="assets/js/edit_other_user.js"></script> -->



<script src="vendor/leafleft/leaflet.js"></script>
<link rel="stylesheet" href="vendor/leafleft/leaflet.css" />

<script>
$(document).ready(function(){


$('#generate_password').click(function(e){
e.preventDefault()

var length=12;
var character="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789&()-@=/*-+?!:%{}<>"
var retval=""
for (var i =0,n= character.length; i<length;i++) {
retval +=character.charAt(Math.floor(Math.random() *n)) 

}
$('#passwordR').val(retval)
})



var user_id = $('#user_id').val()






/*************************** reset password *************************/
$('#resetPassword').click(function(){

var passwordR=$('#passwordR').val()
console.log("password"+passwordR)
console.log("user"+user_id)

$.ajax({
  url:'assets/php/reset_password_other_user.php',
  async:false,
  method:'post',
  data:{id_user:user_id,password:passwordR},
  success:function(response){
    console.log(response)

    var data = JSON.parse(response)
     if(data.reponse=="false" && data.message==1){
                      Swal.fire({
                          icon: 'error',
                          title: 'Oops...',
                          text: 'Enter required fields!',
                          
                        })
                    }         else if(data.reponse=="true" ){
                      
Swal.fire({

icon: 'success',
title: 'Password Changed with success',
showConfirmButton: true,

})
                    }
  }//succes
})//ajax

})//click
/************************************************/
var mobile_number="";
$(function () {


/*
 * International Telephone Input v16.0.0
 * https://github.com/jackocnr/intl-tel-input.git
 * Licensed under the MIT license
*/
var input = document.querySelectorAll("input[name=mobile_number]");
var iti_el = $('.iti.iti--allow-dropdown.iti--separate-dial-code');

for(var i = 0; i < input.length; i++){
    iti = intlTelInput(input[i], {
        autoHideDialCode: false,
        autoPlaceholder: "aggressive" ,
        initialCountry: "AU",
        separateDialCode: true,
        preferredCountries: ['ru','th'],
        customPlaceholder:function(selectedCountryPlaceholder,selectedCountryData){
            return ''+selectedCountryPlaceholder.replace(/[0-9]/g,'X');
        },
        geoIpLookup: function(callback) {
            $.get('https://ipinfo.io', function() {}, "jsonp").always(function(resp) {
              var countryCode = (resp && resp.country) ? resp.country : "";
              callback(countryCode);
          });
        },
        utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/16.0.0/js/utils.js" // just for 
});

           
$('input[name="mobile_number"]').on("focus click countrychange", function(e, countryData) {

    var pl = $(this).attr('placeholder') + '';
    var res = pl.replace( /X/g ,'9');
    if(res != 'undefined'){
        $(this).inputmask(res, {placeholder: "X", clearMaskOnLostFocus: true});
    }
                
                


});
           
           $('input[name="mobile_number"]').on("keyup", function(e, countryData) {

            console.log(e.target.value)
            mobile_number = e.target.value;
                   console.log(e.target.value);   
           });
           
}


})





function loadUser(){
  $.ajax({
  url:'assets/php/other_user_by_id.php',
  method:'post',
  async:false,
  data:{user_id:user_id},
  success:function(response){
      
      var data = JSON.parse(response)
      data=data.result
      console.log(data)
      if(data.id_user==user_id){

$('#first_name').val(data.first_name)
$('#last_name').val(data.last_name)

$('#email').val(data.email)

$('#status').val(data.status)

$('#username').val(data.username)


$('#mobile_number').val(data.mobile_number)






mobile_number=data.mobile_number

      }else{
          window.location.href="404.html";
      }
  }
})
}
loadUser()



/******************************************************************/



/*******************************************************************/
  $('#edit_user').submit(function(e){
          e.preventDefault();
    var formData =new FormData(this)
    formData.append('mobile_number',mobile_number)
    console.log(mobile_number)
          $.ajax({
          url:'assets/php/edit_other_user.php',
          method:'post',
           method : 'POST',
                  processData: false,  // tell jQuery not to process the data
                  contentType: false,  // tell jQuery not to set contentType
                  cache:false,
                  data : formData,
                  success:function(response){
                       var data = JSON.parse(response);
                       console.log(response)
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
                          text: 'Username must be alphanumeric !',
                          
                        })
                    }
                    else if(data.reponse=="false" && data.message==4){
                      Swal.fire({
                          icon: 'error',
                          title: 'Oops...',
                          text: 'Invalid email format',
                          
                        })
                    }
                    
                    else if(data.reponse=="true" ){
                        loadUser()
Swal.fire({

icon: 'success',
title: 'User Updated with success',
showConfirmButton: true,

})
                    }
 }
      })
      })
})
</script>