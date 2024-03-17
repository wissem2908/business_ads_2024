$(document).ready(function(){


    function  loadContent(){
        $.ajax({
            url:'assets/php/get_content.php',
            method:'post',
            async:false,
            success:function(response){
               var data = JSON.parse(response)
               console.log(data)
               if(data.reponse=="true"){
                data=data.result
    
                $('#img_banner_1').attr('src','../img/'+data.banner1_path)
                $('#img_banner_2').attr('src','../img/'+data.banner2_path)
                $('#banner1_title1').val(data.banner1_title1)
                $('#banner1_title2').val(data.banner1_title2)
                $('#banner2_title1').val(data.banner2_title1)
                $('#banner2_title2').val(data.banner2_title2)
                $('#image1').val(data.banner1_path)
                $('#image2').val(data.banner2_path)
                $('#img_about').attr('src','../img/'+data.about_img	)
                $('#image').val(data.image)

                appEditor.setData( data.about_text );
               }
            }
        })
    }

    loadContent()


    $('#change_content').submit(function(e){

        e.preventDefault();
                $.ajax({
                    url:'assets/php/change_content.php',
                    method:'post',
                     method : 'POST',
                            processData: false,  // tell jQuery not to process the data
                            contentType: false,  // tell jQuery not to set contentType
                            cache:false,
                            data : new FormData(this),
                            success:function(response){
                                 var data = JSON.parse(response);
                                 console.log(response)
                                  if(data.reponse=="true" ){
                                    loadContent()
                                    Swal.fire({
                                    
                                      icon: 'success',
                                      title: 'Content changed With success',
                                      showConfirmButton: true,
                                    
                                    })
                                                          }else if(data.reponse=="false" && data.message==1){
                                                            Swal.fire({
                                                                icon: 'error',
                                                                title: 'Oops...',
                                                                text: 'Inter required field !',
                                                                
                                                              })
                                                          }
                                                          else if(data.reponse=="false" && data.message==3){
                                                            Swal.fire({
                                                                icon: 'error',
                                                                title: 'Oops...',
                                                                text: 'File is not an image',
                                                                
                                                              })
                                                          }
                              
                             
           }
                })
        
                
        })






        /**************** about content ************************** */

        $('#change_about_content').submit(function(e){

            e.preventDefault();
                    $.ajax({
                        url:'assets/php/change_about_content.php',
                        method:'post',
                         method : 'POST',
                                processData: false,  // tell jQuery not to process the data
                                contentType: false,  // tell jQuery not to set contentType
                                cache:false,
                                data : new FormData(this),
                                success:function(response){
                                     var data = JSON.parse(response);
                                     console.log(response)
                                      if(data.reponse=="true" ){
                                        loadContent()
                                        Swal.fire({
                                        
                                          icon: 'success',
                                          title: 'Content changed With success',
                                          showConfirmButton: true,
                                        
                                        })
                                                              }else if(data.reponse=="false" && data.message==1){
                                                                Swal.fire({
                                                                    icon: 'error',
                                                                    title: 'Oops...',
                                                                    text: 'Inter required field !',
                                                                    
                                                                  })
                                                              }
                                                              else if(data.reponse=="false" && data.message==3){
                                                                Swal.fire({
                                                                    icon: 'error',
                                                                    title: 'Oops...',
                                                                    text: 'File is not an image',
                                                                    
                                                                  })
                                                              }
                                  
                                 
               }
                    })
            
                    
            })
})