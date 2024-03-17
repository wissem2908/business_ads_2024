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


	$('#add_user').submit(function(e){
e.preventDefault();
		$.ajax({
			url:'assets/php/register.php',
			method:'post',
			 method : 'POST',
                    processData: false,  // tell jQuery not to process the data
                    contentType: false,  // tell jQuery not to set contentType
                    cache:false,
                    data : new FormData(this),
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
  title: 'Thank you for registering, we will be in contact with you shortly',
  showConfirmButton: true,

})
                      }
   }
		})

		
})
	})
