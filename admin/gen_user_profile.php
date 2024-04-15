
<?php
include 'includes/header.php';

session_start();
$user_id = $_SESSION['user_id'];

      ?>
        <div class="content-body">
            <!-- row -->
			<div class="container-fluid">
				 <div class="row page-titles">
                    <ol class="breadcrumb">
                        
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">General User Profile</a></li>
                    </ol>
                </div>
                <div class="row">
                  <div class="col-lg-12">
                    <div class="card">
                           
                            <div class="card-body">
                                <!-- Nav tabs -->
                                <div class="default-tab">
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link" data-bs-toggle="tab" href="#profile"><i class="fas fa-user-alt me-2"></i>Change Profile</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link " data-bs-toggle="tab" href="#contact"><i class="fas fa-unlock-alt me-2"></i> Change Password</a>
                                        </li>
                                        
                                    </ul>
                                    <div class="tab-content">
                                       
                                       
                                        <div class="tab-pane fade active" id="profile">
                                            <div class="pt-4">
                                              <form method="post" enctype="multipart/form-data" id="changeProfile">
                            <div class="card-body">
                               
                                     <div class="row"> 
                             <input type="hidden" name="user_id" id="user_id" value="<?php echo $user_id; ?>">
                                           <div class="mb-3 col-lg-6 col-md-12">
                                <label class="form-label">First Name</label>
                                            <input type="text" name="first_name" id="first_name"  class="form-control input-default " >
                                        </div>
                                        <div class="mb-3 col-lg-6 col-md-12">
                                <label class="form-label">Last Name</label>
                                            <input type="text" name="last_name" id="last_name"  class="form-control input-default " >
                                        </div>
                                       
                                        <div class="mb-3 col-lg-6 col-md-12">
                                <label class="form-label">Email <span class="text-danger required" >*required</span></label>
                                            <input type="text" id="email"  name="email" class="form-control input-default " >
                                        </div>
                                      
                                        
                                        <div class="mb-3 col-lg-6 col-md-12">
                                <label class="form-label">Phone Number </label>
                                            <input type="tel" name="phone_number" inputmode="tel" id="phone_number" class="phone form-control input-default " >
                                           
                                        </div>
                                    
      


                                    </div>
                               
                              
                            </div>
                            <div class="card-footer"><button type="submit" class="btn  btn-square btn-primary">Change Profile</button></div>
                             </form>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="contact">
                                            <div class="pt-4">
                                             <div class="row">
                                                <div class="mb-3 col-lg-6 col-md-12">
                                <label class="form-label">Old password</label>
                                            <input type="password"  id="old_pass"  class="form-control input-default " >
                                        </div>
                                          <div class="mb-3 col-lg-6 col-md-12">
                                <label class="form-label">New password</label>
                                            <input type="password"  id="new_pass"  class="form-control input-default " >
                                        </div>
                                        <button type="button" id="changePass" class="btn  btn-square btn-primary">Change Password</button>
                                         
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
      
       <?php
include 'includes/footer.php';
      ?>

<script src='https://cdnjs.cloudflare.com/ajax/libs/inputmask/4.0.8/jquery.inputmask.bundle.min.js'></script>
<!-- <script type="text/javascript" src="assets/js/profile.js"></script> -->

<script>

$(document).ready(function(){


var user_id=$('#user_id').val()

$('.required').hide()

var phone_number="";
var whatsapp_number= ""

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
  
  

$.ajax({
	url:'assets/php/gen_user_by_id.php',
	method:'post',
	async:false,
	data:{user_id:user_id},
	success:function(response){
		var data =JSON.parse(response)
		data=data.result
console.log(data)
		$('#first_name').val(data.first_name)
		$('#last_name').val(data.last_name)
		$('#email').val(data.email)
		

    $('#phone_number').val(data.phone_number)
    
		phone_number=data.phone_number

		
	}
})//ajax




	$('#changeProfile').submit(function(e){
			e.preventDefault();
      var formData =new FormData(this)
      formData.append('phone_number',phone_number)
      formData.append('whatsapp_number',whatsapp_number)



			$.ajax({
			url:'assets/php/change_gen_user_profile.php',
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
                        $('.required').show()
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
                      }
                      
                      else if(data.reponse=="true" ){
                      	$('.required').hide()
Swal.fire({

  icon: 'success',
  title: 'Profile changed successfully',
  showConfirmButton: true,

})
                      }
   }
		})
		})


	$('#changePass').click(function(e){
e.preventDefault()
var old_pass=$('#old_pass').val()
var new_pass=$('#new_pass').val()

$.ajax({
	url:'assets/php/changePass.php',
	method:'post',
	async:false,
	data:{user_id:user_id,old_pass:old_pass,new_pass:new_pass},
	success:function(response){
		console.log(response)
		var data =JSON.parse(response)
		if(data.reponse=="false" && data.message==1){
			Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Enter required fields!',
                            
                          })
		}
	
		if(data.reponse=="true" ){
		Swal.fire({

  icon: 'success',
  title: 'Password changed successfully',
  showConfirmButton: true,

})
		}
	}
})
	})
})//ready
</script>



