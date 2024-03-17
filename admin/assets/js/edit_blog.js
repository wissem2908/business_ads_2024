$(document).ready(function(){



    var blog_id = $('#blog_id').val()

    

    
    
    
    function loadBlog(){
        $.ajax({
        url:'assets/php/blog_by_id.php',
        method:'post',
        async:false,
        data:{blog_id:blog_id},
        success:function(response){
            
            var data = JSON.parse(response)
            data=data.result
            console.log(data)
            if(data.id_blog==blog_id){
    
    $('#blog_title').val(data.blog_title)
    $('#blog_img').val(data.blog_image)

    appEditor.setData( data.blog_desc );
  
            }else{
                window.location.href="404.html";
            }
        }
    })
    }
    loadBlog()
    
    
    
    /******************************************************************/
    

    
    /*******************************************************************/
        $('#edit_blog').submit(function(e){
                e.preventDefault();
          var formData =new FormData(this)

                $.ajax({
                url:'assets/php/edit_blog.php',
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
                          }
                         
                          
                          else if(data.reponse=="true" ){
                            loadBlog()
    Swal.fire({
    
      icon: 'success',
      title: 'Blog Updated with success',
      showConfirmButton: true,
    
    })
                          }
       }
            })
            })
    })