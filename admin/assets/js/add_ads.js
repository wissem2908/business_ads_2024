$(document).ready(function(){

	/**************** general Cat********************************************** */
$('.required').hide()
    
function loadCat(){

  $.ajax({
      url:'assets/php/list_general_cat.php',
      method:'post',
      async:false,
      
      success:function(response){
          console.log(response)
          var data = JSON.parse(response)
          if(data.reponse=='true'){
              data=data.list
              var cat_list="<option disabled selected>Select...</option>"
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


$(document).on('change','#general_cat',function(){
  var gen_cat_id = $(this).val()
  console.log(gen_cat_id)

  $.ajax({
    url:'assets/php/list_sub_cat.php',
    method:'post',
    async:false,
    data:{cat_id:gen_cat_id},
    success:function(response){
        console.log(response)
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


$('#add_ad').on('keyup keypress', function(e) {
  var keyCode = e.keyCode || e.which;
  if (keyCode === 13) { 
    e.preventDefault();
    return false;
  }
});





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




$('#add_ad').submit(function(e){
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
			url:'assets/php/add_ads.php',
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
  console.log(total_image)
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



      $(document).on('change','#state',function(){
        var state = $(this).val()
       
        
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
})//ready