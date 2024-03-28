$(document).ready(function(){


  const mapDiv = document.getElementById("map");
  const latitudeInput = document.getElementById("latitude-input");
   const longitudeInput = document.getElementById("longitude-input");
  let marker;


  //   // Initialize map
  const map = L.map(mapDiv).setView([-23.588074679937083, 130.43388221316184], 5); // Default to Sydney, Australia

   // Add tile layer
   const tileLayer = L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors',
   }).addTo(map);
   marker = L.marker([-23.588074679937083, 130.43388221316184],{draggable: true}).on('dragend',function(e){
    var lat =e.target._latlng.lat
    var lng =e.target._latlng.lng
     osmGetAddress(lat,lng,marker)
   }).addTo(map);


  map.on("click", (event) => {
   
     if (marker) {
      marker.remove(); // Remove existing marker if present
     }
     marker = L.marker(event.latlng,{draggable: true}).on('dragend',function(e){
    var lat =e.target._latlng.lat
    var lng =e.target._latlng.lng
     osmGetAddress(lat,lng,marker)
   }).addTo(map);
     latitudeInput.value = event.latlng.lat;
     longitudeInput.value = event.latlng.lng;

     osmGetAddress(event.latlng.lat,event.latlng.lng,marker)
    
   });





 
//   // GET ADDRESS FROM LATITUDE AND LONGITUDE
 function osmGetAddress( lat, lon) {
   if(lat != 0 && lon != 0) {
           $.ajax({
         type: 'GET',
        url: location.protocol + '//nominatim.openstreetmap.org/reverse.php?format=json&accept-language=en_US&lat='+lat+'&lon=' + lon,
         success: function(data) {
             console.log("data")
            console.log(data.display_name)
             console.log("data")
            //$('#address_ad').val(data.display_name)
            marker.bindPopup(data.display_name).openPopup();
          //osmMarkerAddressBind(marker, data);
         }
       });
       }

   return false;
 }
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
    url:'assets/php/reset_password.php',
    async:false,
    method:'post',
    data:{user_id:user_id,password:passwordR},
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
             
             $('input[name="phone_number"]').on("keyup", function(e, countryData) {
                      phone_number =  e.target.value;
                     console.log(phone_number);   
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
         
         $('input[name="whatsapp_number"]').on("keyup", function(e, countryData) {
             // whatsapp_number = iti1.getNumber();
             whatsapp_number =  e.target.value;
            
             console.log(whatsapp_number);   
         });
         
  }
  
  
  })



function loadUser(){
	$.ajax({
	url:'assets/php/user_by_id.php',
	method:'post',
	async:false,
	data:{user_id:user_id},
	success:function(response){
		
		var data = JSON.parse(response)
		data=data.result
		console.log(data)
		if(data.user_id==user_id){

$('#business_name').val(data.business_name)

$('#email').val(data.email)
$('#contact_name').val(data.contact_name)
$('#status').val(data.status)
$('#role').val(data.role)
$('#username').val(data.username)
$('#logo_image').val(data.logo)
$('#company_cover').val(data.company_cover)
$('#user_desc').val(data.user_desc)
$('#address').val(data.address)
$('#phone_number').val(data.phone_number)
$('#whatsapp_number').val(data.whatsapp_number)
$('#img_logo').attr('src','logo_images/'+data.logo)


if(data.lat==""){
  const successCallback = (position) => {
    console.log("position");
     console.log(position.coords.latitude);
    marker = L.marker([position.coords.latitude,position.coords.longitude],{draggable: true}).on('dragend',function(e){
      var lat =e.target._latlng.lat
      var lng =e.target._latlng.lng
       osmGetAddress(lat,lng,marker)
     }).addTo(map);
     map.flyTo([position.coords.latitude,position.coords.longitude], 10);
     osmGetAddress(position.coords.latitude,position.coords.longitude,marker)
  
     latitudeInput.value = position.coords.latitude
       longitudeInput.value = position.coords.longitude
   };
   const errorCallback = (error) => {
    console.log(error);
  };
  
  navigator.geolocation.getCurrentPosition(successCallback, errorCallback);
}else{
  marker = L.marker([data.lat,data.lon],{draggable: true}).on('dragend',function(e){
    var lat =data.lat
    var lng =data.lon
     osmGetAddress(lat,lng,marker)
   }).addTo(map);
   map.flyTo([data.lat,data.lon], 10);
   osmGetAddress(data.lat,data.lon,marker)
   latitudeInput.value = data.lat
   longitudeInput.value = data.lon
}

phone_number=data.phone_number
whatsapp_number=data.whatsapp_number
		}else{
			window.location.href="404.html";
		}
	}
})
}
loadUser()



/******************************************************************/

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

/*******************************************************************/
	$('#edit_user').submit(function(e){
			e.preventDefault();
      var formData =new FormData(this)
      formData.append('phone_number',phone_number)
      formData.append('whatsapp_number',whatsapp_number)
			$.ajax({
			url:'assets/php/edit_user.php',
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