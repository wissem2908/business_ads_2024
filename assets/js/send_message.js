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
                url:'assets/php/send_message.php',
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
                            title: 'Message sent succesfully!',
                            showConfirmButton: false,
                            timer: 1500
                          })  
                    }
                }
            })
        }
    })
})