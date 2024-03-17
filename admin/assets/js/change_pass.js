$(document).ready(function(){


 
    $('#change_pass').click(function(e){
        e.preventDefault();

        var email = $('#email').val()
        function generate_password(){
            e.preventDefault()
            
            var length=12;
            var character="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789&()-@=/*-+?!:%{}"
            var retval=""
            for (var i =0,n= character.length; i<length;i++) {
              retval +=character.charAt(Math.floor(Math.random() *n)) 
            
            }
            return retval
           
            }
var password=generate_password();
          console.log(password)  

        $.ajax({
            url:'./assets/php/change_pass.php',
            method:'post',
            async:false,
            data:{email:email,password:password},
            success:function(response){
                console.log(response)
                var data = JSON.parse(response);
                if(data.reponse=="false" && data.message==3){
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Inter required field !',
                        
                      })
                  }else if(data.reponse=="false" && data.message==2){
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'We were not able to identify you given the information provided',
                        
                      })
                  }else if(data.reponse=="false" && data.message==1){
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Invalid email format',
                        
                      })
                  }       else if(data.reponse=="true" ){
                    Swal.fire({
                    
                      icon: 'success',
                      title: 'New password sent to your email',
                      showConfirmButton: true,
                    
                    })
                                          }

            }
        })
    })
})