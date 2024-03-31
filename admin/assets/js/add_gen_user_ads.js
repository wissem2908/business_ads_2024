import {
    Uppy,
    Dashboard,
    Webcam,
    Tus,
  } from 'https://releases.transloadit.com/uppy/v3.23.0/uppy.min.mjs'
  
  $(document).ready(function(){
  
      /**************** general Cat********************************************** */
  $('.required').hide()
      
  
  $('#add_ad').on('keyup keypress', function(e) {
    var keyCode = e.keyCode || e.which;
    if (keyCode === 13) { 
      e.preventDefault();
      return false;
    }
  });
  
  
  $(document).on('change','#state',function(){
    var state = $(this).val()
   console.log(state)
   console.log("state")
    $.ajax({
      url:'assets/php/list_cities.php',
      method:'post',
      async:false,
      data:{state:state},
      success:function(response){
        console.log(response)
        var data= JSON.parse(response)
        data = data.list
        var list_cities='<option disabled selected>select a city...</option>'

        for (i=0;i<data.length;i++){
          list_cities+='<option value="'+data[i].id_city+'">'+data[i].city+' </option>'

        }
        $('#city').empty()
        $('#city').append(list_cities)
      }
    })
   })
  
  const uppy = new Uppy({ debug: true, autoProceed: false })
  .use(Dashboard, {
      trigger: '.UppyModalOpenerBtn',
      inline: true,
      target: '#uppy',
      replaceTargetContent: true,
      showProgressDetails: true,
      note: 'Images only',
      height: 470,
      metaFields: [
        { id: 'name', name: 'Name', placeholder: 'file name' },
        { id: 'caption', name: 'Caption', placeholder: 'describe what the image is about' }
      ],
      browserBackButtonClose: false,
      disableUploadButton: true // Add this line to disable the upload button
    })
    .use(Webcam, { target: Dashboard })
    .use(Tus, { endpoint: 'https://tusd.tusdemo.net/files/' })
    // .use(Restrictions, { 
    //     maxNumberOfFiles: 1, // Limit to one file
    //     allowedFileTypes: ['image/*'] // Only allow image files
    //   });

  
  
  $('#add_ad').submit(function(e){
  e.preventDefault();
  
  
  
  const formData = new FormData(this);
  uppy.getFiles().forEach(file => {
      formData.append('files[]', file.data);
  });
  
  // Example: Log form data to console
  for (const [name, value] of formData.entries()) {
    //  console.log(`${name}: ${value}`);
  }
  
  
          $.ajax({
              url:'assets/php/add_gen_user_ads.php',
              method:'post',
               method : 'POST',
                      processData: false,  // tell jQuery not to process the data
                      contentType: false,  // tell jQuery not to set contentType
                      cache:false,
                      data: formData,
                      success:function(response){
                           var data = JSON.parse(response);
                           //console.log(response)
                        if(data.reponse=="false" && data.message==1){
                          $('.required').show()
                          Swal.fire({
                              icon: 'error',
                              title: 'Oops...',
                              text: 'Enter required fields!',
                              
                            })
                        }
                          else if(data.reponse=="false" && data.message==2){
                          Swal.fire({
                              icon: 'error',
                              title: 'Oops...',
                              text: 'File is not an image',
                              
                            })
                        }else if(data.reponse=="false" && data.message==4){
                          Swal.fire({
                              icon: 'error',
                              title: 'Oops...',
                              text: 'Ad title should not contain special character',
                              
                            })
                        }
                       
                                           
                        else if(data.reponse=="true" ){
                          $('.required').hide()
                          uppy.reset()
  Swal.fire({
  
    icon: 'success',
    title: 'Ad placed successfully',
    showConfirmButton: true,
  
  })
                        }
     }
          })     
  })//submit
  /**************************************************** */
  var total_image = 1;
  $('#addInputImage').click(function(e){
   // console.log(total_image)
    total_image++;
    e.preventDefault()
  var html = ' <div class="row" id="add_image_box_'+total_image+'"> <div class="mb-3 col-lg-10  col-sm-6 col-md-8"><label class="form-label">Image</label><input type="file"id="ads_image" name="ads_images[]"  class="form-control input-default " ></div> <div class="mb-3 col-lg-2 col-md-4 col-sm-6 mt-6"><a  data="'+total_image+'" id="remove_image" class="btn btn-sm  btn-outline-danger" style="margin-top:27px;"><i class="fa fa-trash"></i></a></div></div> ';
  
  $('#image_box').append(html)
  
  })
  
  $(document).on('click','#remove_image',function(){
    var id = $(this).attr("data")
  
    $('#add_image_box_'+id).remove()
     })
  
  
  
     /******************************************************* */
     // get list categories
     var user_id = $('#user_id').val()
     $.ajax({
      url:'assets/php/list_cat.php',
      method:'post',
      async:false,
      data:{user_id:user_id},
      success:function(response){
        var data = JSON.parse(response)
  data=data.list
        var categories=''
  
        for(i=0;i<data.length;i++){
          categories+='<option value="'+data[i].cat_id +'">'+data[i].cat_title+'</option>'
        }
        $('#categories').append(categories)
      }
     })
    
  
  
  
        /*********************************** list cities****************************************** */
  
  

  })//ready