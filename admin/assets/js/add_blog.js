$(document).ready(function(){


   
    
    
    
    
 

        $('#add_blog').submit(function(e){
    e.preventDefault();
    
    
    var formData =new FormData(this)

            $.ajax({
                url:'assets/php/add_blog.php',
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
                          }   if(data.reponse=="false" && data.message==3){
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Image should be jpeg, jpg,png or gif format!',
                                
                              })
                          }
                          
                          else if(data.reponse=="true" ){
    Swal.fire({
    
      icon: 'success',
      title: 'Blog Added',
      showConfirmButton: true,
    
    })
                          }
       }
            })
    
            
    })
        })
    