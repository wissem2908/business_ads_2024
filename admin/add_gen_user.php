
<?php
include 'includes/header.php';
      ?>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
        <div class="content-body">
            <!-- row -->
            <div class="container-fluid">
                    <div class="row page-titles">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">General Users</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Add General User</a></li>
                    </ol>
                </div>
               <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Add General User</h4>
                                <a href="users_list.php" type="button" class="btn btn-outline-primary">General User List</a>
                            </div>
                             <form method="post" enctype="multipart/form-data" id="add_user">
                            <div class="card-body">
                               
                                     <div class="row"> 
                             
                                           <div class="mb-3 col-lg-6 col-md-12">
                                <label class="form-label">First Name</label>
                                            <input type="text" name="first_name" class="form-control input-default " >
                                        </div>
                                        <div class="mb-3 col-lg-6 col-md-12">
                                <label class="form-label">Last Name</label>
                                            <input type="text" name="last_name" class="form-control input-default " >
                                        </div>
                                        <div class="mb-3 col-lg-6 col-md-12">
                                <label class="form-label">Email </label>
                                            <input type="text" name="email" class="form-control input-default " >
                                        </div>
                                   
                                        <div class="mb-3 col-lg-6 col-md-12">
                                <label class="form-label">Status</label>
                                            <select  class="form-control input-default " name="status" style="-webkit-appearance: none; -moz-appearance: none; appearance: none; background-image: url('data:image/svg+xml,%3Csvg xmlns=&quot;http://www.w3.org/2000/svg&quot; width=&quot;16&quot; height=&quot;16&quot; viewBox=&quot;0 0 16 16&quot;&gt;%3Cpath fill=&quot;none&quot; stroke=&quot;%23343a40&quot; stroke-linecap=&quot;round&quot; stroke-linejoin=&quot;round&quot; stroke-width=&quot;2&quot; d=&quot;M2 6l6 6 6-6&quot;%3E%3C/path%3E%3C/svg%3E'); background-repeat: no-repeat; background-position: right 0.5rem bottom 0.5rem; padding-right: 1.5rem;" >
                                                  <option></option>
                                                <option value="active">Active</option>
                                                <option value="inactive">Inactive</option>
                                               
                                            </select>
                                        </div>
                                      
                                         <div class="mb-3 col-lg-6 col-md-12">
                                <label class="form-label">Username</label>
                                            <input type="text" name="username" class="form-control input-default " >
                                        </div>
                                         <div class="mb-3 col-lg-6 col-md-12">
                                <label class="form-label">Phone Number </label>
                                            <input type="tel" name="phone_number" inputmode="tel" id="phone_number" class="form-control input-default " >
                                           
                                        </div>
                                        
                                         <div class="mb-3 col-lg-6 col-md-12">
                                <label class="form-label">Password </label>
                                            <input type="text" class="form-control input-default " name="password" id="password">
                                        </div> <div class="mb-3 col-lg-4 col-md-12">
                               <a id="generate_password" class="btn  btn-square btn-outline-primary" style="margin-top:27px">Generate password</a>
                                        </div>
                                          
                                   
                                        
                                    </div>
                                   <br/>

                            </div>




                            <div class="card-footer"><button type="submit" class="btn  btn-square btn-primary">Add User</button></div>
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
<!-- <script type="text/javascript" src="assets/js/add_user.js"></script> -->
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
$('#password').val(retval)
})

var phone_number="";


$(function () {


  /*
   * International Telephone Input v16.0.0
   * https://github.com/jackocnr/intl-tel-input.git
   * Licensed under the MIT license
  */
  var input = document.querySelectorAll("input[name=phone_number]");
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
  
             
  $('input[name="phone_number"]').on("focus click countrychange", function(e, countryData) {
  
      var pl = $(this).attr('placeholder') + '';
      var res = pl.replace( /X/g ,'9');
      if(res != 'undefined'){
          $(this).inputmask(res, {placeholder: "X", clearMaskOnLostFocus: true});
      }
                  
                  
  
  
  });
             
             $('input[name="phone_number"]').on("focusout", function(e, countryData) {
                      phone_number = iti.getNumber();
                     console.log(intlNumber);   
             });
             
  }
  
  
  })
  
 
  
	$('#add_user').submit(function(e){
e.preventDefault();


var formData =new FormData(this)
formData.append('phone_number',phone_number)

		$.ajax({
			url:'assets/php/add_gen_users.php',
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
                      else if(data.reponse=="false" && data.message==3){
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'File is not an image',
                            
                          })
                      }
                      else if(data.reponse=="false" && data.message==4){
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Invalid email format',
                            
                          })
                      }else if(data.reponse=="false" && data.message==5){
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Username Exist',
                            
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
  title: 'User Added',
  showConfirmButton: true,

})
                      }
   }
		})

		
})
	})


</script>