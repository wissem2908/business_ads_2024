import {
    Uppy,
    Dashboard,
    Webcam,
    Tus,
  } from 'https://releases.transloadit.com/uppy/v3.23.0/uppy.min.mjs'
  
  var lati = ""
  var longi = ""
  $(document).ready(function(){
 
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
    
    /*************************************************************************************************** */

  
  
      var total_image = 1;
      $('#addInputImage').click(function(e){
      
        total_image++;
        e.preventDefault()
      var html = ' <div class="row" id="add_image_box_'+total_image+'"> <div class="mb-3 col-lg-10  col-sm-6 col-md-8"><label class="form-label">Image</label><input type="file"id="ads_image" name="ads_images[]"  class="form-control input-default " ></div> <div class="mb-3 col-lg-2 col-md-4 col-sm-6 mt-6"><a  data="'+total_image+'" id="remove_image" class="btn btn-sm  btn-outline-danger" style="margin-top:27px;"><i class="fa fa-trash"></i></a></div></div> ';
      
      $('#image_box').append(html)
      
      })
      
      $(document).on('click','#remove_image',function(){
        var id = $(this).attr("data")
     
        $('#add_image_box_'+id).remove()
         })
      /********************************************************************************** */
         $(document).on('click','#delete_image',function(){
          var id = $(this).attr("data")
        
          Swal.fire({
              title: 'Are you sure?',
              text: "You won't be able to undo this!",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
              if (result.value) {
  
                  $.ajax({
                      url:'assets/php/delete_image.php',
                      method:'post',
                      async:false,
                      data:{id:id},
                      succcess:function(response){
                         
                      }
                  })
                  $('#'+id).remove()
              
                  $('#ads_images').empty()
                  loadImages()
              }
            })
  
       
           })
        
  
  
      var ads_id=$('#ads_id').val()
    
      $.ajax({
          url:'assets/php/gen_user_ad_by_id.php',
          method:'post',
          async:false,
           data:{ads_id:ads_id},
           success:function(response){
             // console.log(response)
              var data = JSON.parse(response)
              if(data.reponse=="true"){
                  data = data.result
                  console.log(data)
                  $('#ad_title').val(data.ad_title)
            //   console.log(data.ad_description)
            $('#image_ad').attr('src','gen_user_ads_images/'+data.ad_image)
            if(data.ad_image==""){
             $('#image_ad').hide()
            }else{
             $('#no_image').hide()
            }
  
            /********************************************************************** */
            if(data.ad_image!=""){
  
              $('#image_ad').attr("src",'gen_user_ads_images/'+data.ad_image)
              $('#image_ad').show()
  
                    // Add delete button
        var deleteButton = document.createElement('button');
        deleteButton.innerHTML = '<i class="fa fa-trash"></i>';
      
        deleteButton.classList.add('delete-button');
        deleteButton.classList.add('btn'); // Add the desired class to the delete button
        deleteButton.classList.add('btn-primary'); // Add the desired class to the delete button
        deleteButton.classList.add('btn-xs');
        deleteButton.classList.add('sharp');
        deleteButton.addEventListener('click', function(e) {
          e.preventDefault()
          // Delete image functionality here
         // output.src = ''; // Clear the image source
          $('#image_ad').hide(); // Hide the image element
            $('#no_image').show()
            $('#image').val('');
            $('#ad_image').val('')
          //$('#image').val(''); // Reset the value of the file input
          this.remove(); // Remove the delete button itself
        });
        
        // Append delete button to the container
        var container = document.getElementById('image_container');
        container.appendChild(deleteButton);
              
            }else{
              $('#image_user').hide()
            }
            /********************************************************************* */
               $('#image_ad').attr('src','gen_user_ads_images/'+data.ad_image)
               $('#ad_image').val(data.ad_image)
  
  
               /********************************************************************* */
  
               
             $('#general_cat').val(data.general_cat)
             //loadSubCat(data.general_cat)
             $('#sub_categories').val(data.suub_cat)
             $('#state').val(data.state)
              $('#city').val(data.cities)
              loadCities(data.state)
              $('#city').val(data.cities)
           var keywords= data.keyword.split(",");
         
           for(i=0;i<keywords.length;i++){
            if(keywords[i]!=''){
              tags.push(keywords[i]);
              createTag();
            }
            
           }
           var user_id = data.user_id
        //    $.ajax({
        //     url:'assets/php/list_cat.php',
        //     method:'post',
        //     async:false,
        //     data:{user_id:user_id},
        //     success:function(response){
        //       var data = JSON.parse(response)
        // data=data.list
        //       var categories=" <option value='' selected>Select...</option>   "
        
        //       for(i=0;i<data.length;i++){
        //         categories+='<option value="'+data[i].cat_id +'">'+data[i].cat_title+'</option>'
        //       }
        //       $('#categories').append(categories)
        //     }
        //    })
          // $('#categories').val(data.category_id)
            
            //  $('#city_area').val(data.city_area)
            //  $('#address_ad').val(data.address_ad)
            //  $('#latitude-input').val(data.lat)
            //  $('#longitude-input').val(data.lon)
            //  lati = data.lat
            //  longi=data.lon
  
            //  console.log('latitudeInput => '+lati + ' longitudeInput => '+longi)
            //  marker = L.marker([lati, longi]).addTo(map);
                  appEditor.setData( data.ad_description );
  
               
  
                
           // get list categories
  
              }
           }
      })
  
      function loadImages(){
          $.ajax({
              url:'assets/php/gen_user_ad_images.php',
              method:'post',
              async:false,
               data:{ads_id:ads_id},
               success:function(response){
                 
                  var data = JSON.parse(response)
                  if(data.reponse=="true"){
                      data = data.list
                      var list_images=""
                      for(i=0;i<data.length;i++){
                          list_images+='<div class="col-lg-3"><div class="row" style="position:relative" id="'+data[i].image_id+'"> <div class="mb-3 col-lg-2  col-sm-6 col-md-8"><img src="gen_user_ads_images/'+data[i].path+'" class="rounded" width="100px" height="100px"></div><div class="mb-3 col-lg-3 col-md-4 col-sm-6 mt-6 remove_btn" ><a  data="'+data[i].image_id+'" id="delete_image" class="btn btn-sm  btn-danger" style="margin-top:27px;"><i class="fa fa-trash"></i></a></div></div></div>'
                      } 
                      $('#ads_images').append(list_images)
                  }
               
               }
          })
      }
      loadImages()
  
  /******************************************************************************** */
  $('#edit_ad').on('keyup keypress', function(e) {
    var keyCode = e.keyCode || e.which;
    if (keyCode === 13) { 
      e.preventDefault();
      return false;
    }
  });
  $('.required').hide()
  $('#edit_ad').submit(function(e){
  
   
      e.preventDefault();
  
  
      
  
  const formData = new FormData(this);
  uppy.getFiles().forEach(file => {
      formData.append('files[]', file.data);
  });
  
  // Example: Log form data to console
  for (const [name, value] of formData.entries()) {
      console.log(`${name}: ${value}`);
  }
              $.ajax({
                  url:'assets/php/edit_gen_user_ads.php',
                  method:'post',
                   method : 'POST',
                          processData: false,  // tell jQuery not to process the data
                          contentType: false,  // tell jQuery not to set contentType
                          cache:false,
                          data: formData,
                          success:function(response){
                               var data = JSON.parse(response);
                             
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
                              localStorage.removeItem('uppyState');
                              uppy.reset()
      Swal.fire({
      
        icon: 'success',
        title: 'Ad updated successfully',
        showConfirmButton: true,
      
      })
      
                            }
         }
              })
      
              
      })//submit
  
      /*********************************************************** */
      //preview image file
     
      if (!$('#image_ad').attr('src')) {
        $('#image_ad').hide();
      }
      function loadFile(event) {
        var output = document.getElementById('image_ad');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
          URL.revokeObjectURL(output.src); // free memory
        }
        $('#image_ad').show();
        $('#no_image').hide()
        var container = document.getElementById('image_container');
        var existingDeleteButton = container.querySelector('.delete-button');
        if (existingDeleteButton) {
          existingDeleteButton.remove();
        }
    
    
        // Add delete button
        var deleteButton = document.createElement('button');
        deleteButton.innerHTML = '<i class="fa fa-trash"></i>';
      
        deleteButton.classList.add('delete-button');
        deleteButton.classList.add('btn'); // Add the desired class to the delete button
        deleteButton.classList.add('btn-primary'); // Add the desired class to the delete button
        deleteButton.classList.add('btn-xs');
        deleteButton.classList.add('sharp');
        deleteButton.addEventListener('click', function() {
          // Delete image functionality here
          output.src = ''; // Clear the image source
          $('#image_ad').hide(); // Hide the image element
            $('#no_image').show()
            $('#image').val('');
          //$('#image').val(''); // Reset the value of the file input
          this.remove(); // Remove the delete button itself
        });
        
        // Append delete button to the container
        var container = document.getElementById('image_container');
        container.appendChild(deleteButton);
      }
      
      $('#image').change(function(event) {
        loadFile(event);
      });
    
  
  
  
  
  
  
        /*********************************** list cities****************************************** */
  
  
  
        $(document).on('change','#state',function(){
          var state = $(this).val()
         
          
          $.ajax({
            url:'assets/php/list_cities.php',
            method:'post',
            async:false,
            data:{state:state},
            success:function(response){
          
              var data= JSON.parse(response)
              data = data.list
              var list_cities='<option value=""  selected>select...</option>'
      
              for (i=0;i<data.length;i++){
                list_cities+='<option value="'+data[i].id_city+'">'+data[i].city+' </option>'
      
              }
              $('#city').empty()
              $('#city').append(list_cities)
            }
          })
         })
  
  function loadCities(state){
    $.ajax({
      url:'assets/php/list_cities.php',
      method:'post',
      async:false,
      data:{state:state},
      success:function(response){
      
        var data= JSON.parse(response)
        data = data.list
        console.log(data)
        var list_cities='<option value=""  selected>select...</option>'
  
        for (i=0;i<data.length;i++){
          list_cities+='<option value="'+data[i].id_city+'">'+data[i].city+' </option>'
  
        }
        $('#city').empty()
        $('#city').append(list_cities)
      }
    })
  }
  
  
  })