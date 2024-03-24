var lati = ""
var longi = ""
$(document).ready(function(){


  const StatusBar = Uppy.StatusBar
  const Informer = Uppy.Informer
  const Webcam = Uppy.Webcam
  const Dashboard = Uppy.Dashboard
  const GoogleDrive = Uppy.GoogleDrive
  const Dropbox = Uppy.Dropbox
  const Instagram = Uppy.Instagram
  const Facebook = Uppy.Facebook
  const OneDrive = Uppy.OneDrive
  const ScreenCapture = Uppy.ScreenCapture
  const ImageEditor = Uppy.ImageEditor
  const Tus = Uppy.Tus
  const DropTarget = Uppy.DropTarget
  const GoldenRetriever = Uppy.GoldenRetriever
  const XHRUpload = Uppy.XHRUpload
  
  const uppy = new Uppy.Core({
      id: 'uppy',
      autoProceed: false,
      allowMultipleUploads: true,
      debug: false,
      restrictions: {
        maxFileSize: null,
        minFileSize: null,
        maxTotalFileSize: null,
        maxNumberOfFiles: null,
        minNumberOfFiles: null,
        allowedFileTypes: ['image/*', 'video/*']
      },
      meta: {},
      onBeforeFileAdded: (currentFile, files) => currentFile,
      onBeforeUpload: (files) => {},
      locale: {},
      // store: new DefaultStore(),
      // logger: justErrorsLogger,
      infoTimeout: 5000
  })
  .use(Dashboard, {
    trigger: '.UppyModalOpenerBtn',
    inline: true,
    target: '#uppy',
    replaceTargetContent: true,
    showProgressDetails: true,
    note: 'Images and video only, 2–3 files, up to 1 MB',
    height: 470,
    metaFields: [
      { id: 'name', name: 'Name', placeholder: 'file name' },
      { id: 'caption', name: 'Caption', placeholder: 'describe what the image is about' }
    ],
    browserBackButtonClose: false,
    disableUploadButton: true // Add this line to disable the upload button
  })
  // .use(GoogleDrive, { target: Dashboard, companionUrl: 'https://companion.uppy.io' })
  // .use(Dropbox, { target: Dashboard, companionUrl: 'https://companion.uppy.io' })
  // .use(Instagram, { target: Dashboard, companionUrl: 'https://companion.uppy.io' })
  // .use(Facebook, { target: Dashboard, companionUrl: 'https://companion.uppy.io' })
  // .use(OneDrive, { target: Dashboard, companionUrl: 'https://companion.uppy.io' })
  .use(Webcam, { target: Dashboard })
  // .use(ScreenCapture, { target: Dashboard })
  .use(ImageEditor, { target: Dashboard })
  // .use(Tus, { endpoint: 'https://tusd.tusdemo.net/files/' })
  .use(DropTarget, {target: document.body })
  .use(GoldenRetriever)
  
  
  /************************************************************************************************** */

//   const mapDiv = document.getElementById("map");
//   const latitudeInput = document.getElementById("latitude-input");
//   const longitudeInput = document.getElementById("longitude-input");
//   let marker;
//   const currentMarkers = [];
//   // Initialize map
//   const map = L.map(mapDiv).setView([-23.588074679937083, 130.43388221316184], 5); // Default to Sydney, Australia

//   // Add tile layer
//   const tileLayer = L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
//     attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors',
//   }).addTo(map);


//   map.on("click", (event) => {
//     for (const marker of currentMarkers) {
//         map.removeLayer(marker);
//     }
//     if (marker) {
//       marker.remove(); // Remove existing marker if present
//     }
//     marker = L.marker(event.latlng).addTo(map);
//     latitudeInput.value = event.latlng.lat;
//     longitudeInput.value = event.latlng.lng;
//     osmGetAddress(event.latlng.lat,event.latlng.lng)
    
//   });
//   const successCallback = (position) => {
//   console.log("position");
//   console.log(position.coords.latitude);
//   marker = L.marker([position.coords.latitude,position.coords.longitude]).addTo(map);
//   map.flyTo([position.coords.latitude,position.coords.longitude], 10);
// };

// const errorCallback = (error) => {
//   console.log(error);
// };

// navigator.geolocation.getCurrentPosition(successCallback, errorCallback);



//   // GET ADDRESS FROM LATITUDE AND LONGITUDE
// function osmGetAddress( lat, lon) {
//   if(lat != 0 && lon != 0) {
//           $.ajax({
//         type: 'GET',
//         url: location.protocol + '//nominatim.openstreetmap.org/reverse.php?format=json&accept-language=en_US&lat='+lat+'&lon=' + lon,
//         success: function(data) {
//             console.log("data")
//             console.log(data.address)
//             console.log("data")
//             $('#address_ad').val(data.display_name)
            
//           //osmMarkerAddressBind(marker, data);
//         }
//       });
//       }

//   return false;
// }


// $('#address_ad').keyup(function(){
//   var addr = $(this).val()
//   fetch('https://nominatim.openstreetmap.org/search?format=json&polygon=1&addressdetails=1&q=' + addr)
//         .then(result => result.json())
//         .then(parsedResult => {
//             setResultList(parsedResult);
//         });
// })

// const resultList = document.getElementById('addr_list');

// function setResultList(parsedResult) {
//     resultList.innerHTML = "";
//     for (const marker of currentMarkers) {
//         map.removeLayer(marker);
//     }
//    // map.flyTo(new L.LatLng(20.13847, 1.40625), 2);

//    var data="";

//     for (const result of parsedResult) {
// data+='<option value="'+result.display_name+'">'

//         const li = document.createElement('option');
//         li.setAttribute("value",result.display_name);
     
//        $('#address_ad').on('blur', (event) => {
//         console.log("result")
//           console.log(result)
//             for(const child of resultList.children) {
//                 child.classList.remove('active');
//             }
//             event.target.classList.add('active');
//             const clickedData = result;

//             console.log(clickedData.address)
//             const position = new L.LatLng(clickedData.lat, clickedData.lon);

//             for (const marker of currentMarkers) {
//         map.removeLayer(marker);
//     }
//         currentMarkers.push(new L.marker(position).addTo(map));
//             map.flyTo(position, 10);
//         })



      
//         resultList.appendChild(li);
//     }
// }

  /*************************************************************************************************** */


  function loadCat(){

    $.ajax({
        url:'assets/php/list_general_cat.php',
        method:'post',
        async:false,
        
        success:function(response){
           
            var data = JSON.parse(response)
            if(data.reponse=='true'){
                data=data.list
                var cat_list="<option></option>"
                for(i=0;i<data.length;i++){
                    cat_list+='<option value="'+
                    data[i]["id_gen_cat"]+
                    '">'+data[i].title_cat+'</option>'
                }
                $('#general_cat').empty()
                $('#general_cat').append(cat_list)
            }
        }
    })
  }
  loadCat()
  function loadSubCat(gen_cat_id){

    $.ajax({
      url:'assets/php/list_sub_cat.php',
      method:'post',
      async:false,
      data:{cat_id:gen_cat_id},
      success:function(response){
      
          var data = JSON.parse(response)
          if(data.reponse=='true'){
              data=data.list
              var cat_list="<option></option>"
              for(i=0;i<data.length;i++){
                  cat_list+='<option value="'+
                  data[i]["id_sub_cat"]+
                  '">'+data[i].sub_cat_title+'</option>'
              }
              $('#sub_categories').empty()
              $('#sub_categories').append(cat_list)
          }
      }
  })
  }
  //loadSubCat()
  
  $(document).on('change','#general_cat',function(){
    var gen_cat_id = $(this).val()
   
  
    $.ajax({
      url:'assets/php/list_sub_cat.php',
      method:'post',
      async:false,
      data:{cat_id:gen_cat_id},
      success:function(response){
        
          var data = JSON.parse(response)
          if(data.reponse=='true'){
              data=data.list
              var cat_list="<option></option>"
              for(i=0;i<data.length;i++){
                  cat_list+='<option value="'+
                  data[i]["id_sub_cat"]+
                  '">'+data[i].sub_cat_title+'</option>'
              }
              $('#sub_categories').empty()
              $('#sub_categories').append(cat_list)
          }
      }
  })
  })
  


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
    ///var user_id=$('#user_id').val()
    $.ajax({
        url:'assets/php/ad_by_id.php',
        method:'post',
        async:false,
         data:{ads_id:ads_id},
         success:function(response){
           // console.log(response)
            var data = JSON.parse(response)
            if(data.reponse=="true"){
                data = data.result
                $('#ad_title').val(data.ad_title)
          //   console.log(data.ad_description)

             $('#image_ad').attr('src','ads_images/'+data.ad_image)
             if(data.ad_image==""){
              $('#image_ad').hide()
             }else{
              $('#no_image').hide()
             }
             $('#ad_image').val(data.ad_image)
           $('#general_cat').val(data.general_cat)
         
            $('#state').val(data.state)
           $('#city').val(data.cities)

           var keywords= data.keyword.split(",");
           console.log(keywords)
  
           for(i=0;i<keywords.length;i++){
            if(keywords[i]!=''){
              tags.push(keywords[i]);
              createTag();
            }
            
           }
          //  $('#city_area').val(data.city_area)
          //  $('#address_ad').val(data.address_ad)
          //  $('#latitude-input').val(data.lat)
          //  $('#longitude-input').val(data.lon)
          //  lati = data.lat
          //  longi=data.lon

          //  console.log('latitudeInput => '+lati + ' longitudeInput => '+longi)
          //  marker = L.marker([lati, longi]).addTo(map);
                appEditor.setData( data.ad_description );

                loadSubCat(data.general_cat)
                $('#sub_categories').val(data.suub_cat)

                loadCities(data.state)
                $('#city').val(data.cities)
         // get list categories
var user_id = data.user_id
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
   $('#categories').val(data.category_id)
            }
         }
    })

    function loadImages(){
        $.ajax({
            url:'assets/php/ad_images.php',
            method:'post',
            async:false,
             data:{ads_id:ads_id},
             success:function(response){
               
                var data = JSON.parse(response)
                if(data.reponse=="true"){
                    data = data.list
                    var list_images=""
                    for(i=0;i<data.length;i++){
                        list_images+='<div class="col-lg-3"><div class="row" style="position:relative" id="'+data[i].image_id+'"> <div class="mb-3 col-lg-2  col-sm-6 col-md-8"><img src="ads_images/'+data[i].path+'" class="rounded" width="100px" height="100px"></div><div class="mb-3 col-lg-3 col-md-4 col-sm-6 mt-6 remove_btn" ><a  data="'+data[i].image_id+'" id="delete_image" class="btn btn-sm  btn-danger" style="margin-top:27px;"><i class="fa fa-trash"></i></a></div></div></div>'
                    } 
                    $('#ads_images').append(list_images)
                }
             
             }
        })
    }
    loadImages()

/******************************************************************************** */
// $('#edit_ad').submit(function(e){

//   console.log($('#latitude-input').val())
//     e.preventDefault();
//             $.ajax({
//                 url:'assets/php/edit_ads.php',
//                 method:'post',
//                  method : 'POST',
//                         processData: false,  // tell jQuery not to process the data
//                         contentType: false,  // tell jQuery not to set contentType
//                         cache:false,
//                         data : new FormData(this),
//                         success:function(response){
//                              var data = JSON.parse(response);
                           
//                           if(data.reponse=="false" && data.message==1){
//                             Swal.fire({
//                                 icon: 'error',
//                                 title: 'Oops...',
//                                 text: 'Inter required field !',
                                
//                               })
//                           }
//                             else if(data.reponse=="false" && data.message==2){
//                             Swal.fire({
//                                 icon: 'error',
//                                 title: 'Oops...',
//                                 text: 'File is not an image',
                                
//                               })
//                           }
                         
                                             
//                           else if(data.reponse=="true" ){
//     Swal.fire({
    
//       icon: 'success',
//       title: 'Ad updated with success',
//       showConfirmButton: true,
    
//     })
    
//                           }
//        }
//             })
    
            
//     })//submit
$('.required').hide()
$('#copy_ad').on('keyup keypress', function(e) {
  var keyCode = e.keyCode || e.which;
  if (keyCode === 13) { 
    e.preventDefault();
    return false;
  }
});
$('#copy_ad').submit(function(e){
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
                url:'assets/php/copy_ad.php',
                method:'post',
                 method : 'POST',
                        processData: false,  // tell jQuery not to process the data
                        contentType: false,  // tell jQuery not to set contentType
                        cache:false,
                        data: formData,
                        success:function(response){
                             var data = JSON.parse(response);
                             console.log(response)
                          if(data.reponse=="false" && data.message==1){
                            $('.required').show()
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Inter required field !',
                                
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
    /*********************************************************** */
    //preview image file
   
       function loadFile(event) {
        var output = document.getElementById('image_ad');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
          URL.revokeObjectURL(output.src) // free memory
        }
      };

      $('#image').change(function(event){
        loadFile(event)

        $('#image_ad').show()
     
       $('#no_image').hide()
      })







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
            var list_cities='<option disabled selected>select a city...</option>'
    
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
      var list_cities='<option disabled selected>select a city...</option>'

      for (i=0;i<data.length;i++){
        list_cities+='<option value="'+data[i].id_city+'">'+data[i].city+' </option>'

      }
      $('#city').empty()
      $('#city').append(list_cities)
    }
  })
}


})