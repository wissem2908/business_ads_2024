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
  
  $(function () {
  
  
  /*
  * International Telephone Input v16.0.0
  * https://github.com/jackocnr/intl-tel-input.git
  * Licensed under the MIT license
  */
  var input = document.querySelectorAll("input[name=whatsapp_number]");
  var iti_el = $('.iti.iti--allow-dropdown.iti--separate-dial-code');
  
  for(var i = 0; i < input.length; i++){
  iti1 = intlTelInput(input[i], {
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
  
  
  $('input[name="whatsapp_number"]').on("focus click countrychange", function(e, countryData) {
  
  var pl = $(this).attr('placeholder') + '';
  var res = pl.replace( /X/g ,'9');
  if(res != 'undefined'){
      $(this).inputmask(res, {placeholder: "X", clearMaskOnLostFocus: true});
  }
  
  });
         
         $('input[name="whatsapp_number"]').on("focusout", function(e, countryData) {
              whatsapp_number = iti1.getNumber();
             console.log(intlNumber);   
         });
         
  }
  
  
  })

$.ajax({
	url:'assets/php/user_by_id.php',
	method:'post',
	async:false,
	data:{user_id:user_id},
	success:function(response){
		var data =JSON.parse(response)
		data=data.result

		$('#business_name').val(data.business_name)
		$('#company').val(data.company)
		$('#email').val(data.email)
		$('#contact_name').val(data.contact_name)
		$('#username').val(data.username)
		$('#business_name').val(data.business_name)
    $('#user_desc').val(data.user_desc)
    $('#address').val(data.address)
    $('#phone_number').val(data.phone_number)
    $('#whatsapp_number').val(data.whatsapp_number)
		$('#logo_image').val(data.logo)

		$('#view_business_name').text(data.business_name)
		$('#view_company_name').text(data.company)
		$('#view_email').text(data.email)
		$('#view_contact_name').text(data.contact_name)
		$('#view_username').text(data.username)
		phone_number=data.phone_number
whatsapp_number=data.whatsapp_number


if(data.logo!=''){
	$('#view_logo_image').attr('src','logo_images/'+data.logo)
}else{
  $('#view_logo_image').attr('src','logo_images/user.png')
}
	
		
	}
})//ajax


function getOpeningHour(){
	$.ajax({
    url:'assets/php/opening_hour.php',
    method:'post',
    async:false,
    data:{user_id:user_id},
    success:function(response){
      console.log(response)
      var data = JSON.parse(response)
      data=data.liste
      console.log(data)
    
      for(i=0;i<data.length;i++){
        console.log(data[i].close_hour)
       open_hour=' <div class="row"> <div class="mb-3 col-lg-4 col-md-12"> <input type="text" name="'+data[i].weekday+'" id="'+data[i].weekday+'" readonly  value="'+data[i].weekday+'" class="form-control input-default " >  </div> <div class="mb-3 col-lg-3 col-md-12">  <input type="time" name="'+data[i].weekday+'_open" id="'+data[i].weekday+'_open"  class="form-control input-default " > </div> <div class="mb-3 col-lg-3 col-md-12"> <input type="time"  name="'+data[i].weekday+'_close" id="'+data[i].weekday+'_close" class="form-control input-default " >  </div> </div>'

       $('#'+data[i].weekday+'_close').val(data[i].close_hour)
       $('#'+data[i].weekday+'_open').val(data[i].open_hour)
      }
    }
  })
}
getOpeningHour()
	$('#changeProfile').submit(function(e){
			e.preventDefault();
      var formData =new FormData(this)
      formData.append('phone_number',phone_number)
      formData.append('whatsapp_number',whatsapp_number)



			$.ajax({
			url:'assets/php/change_profile.php',
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