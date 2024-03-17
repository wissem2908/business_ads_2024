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
  
	$('#add_user').submit(function(e){
e.preventDefault();


var formData =new FormData(this)
formData.append('phone_number',phone_number)
formData.append('whatsapp_number',whatsapp_number)
		$.ajax({
			url:'assets/php/add_users.php',
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
