
<?php
include 'includes/header.php';
session_start();
      ?>
        <div class="content-body">
            <!-- row -->
			<div class="container-fluid">
          <div class="row page-titles">
                    <ol class="breadcrumb">
                        
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Terms & Conditions</a></li>
                    </ol>
                </div>
           
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Terms & Conditions</h4>
                               
                            </div>
                             <form method="post" enctype="multipart/form-data" id="add_term">
                            <div class="card-body">
                            <div class="row">
                            <div class="col-lg-12">
                                        <label>Description </label>
                                          <textarea name="terms_desc" id="terms_desc">
     
    </textarea>
                                       </div>
                            </div>
                            </div>
                            <div class="card-footer"><button type="submit" class="btn  btn-square btn-primary">Update</button></div>
                             </form>
                        </div>
                    </div>
                </div>
         
                  
            </div>

         
        </div>
       
        
        </div>
        </div>
       <?php
     
include 'includes/footer.php';
      ?>


<script src="vendor/ckeditor/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#terms_desc' ) )
            .catch( error => {
                console.error( error );
            } );


            $(document).ready(function(){
                $('#add_term').on('submit', function(e){
                    e.preventDefault();

                    $.ajax({
			url:'assets/php/add_terms.php',
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
                       
Swal.fire({

  icon: 'success',
  title: 'Terms & Conditions updated successfully',
  showConfirmButton: true,

})
                      }
   }
		})
                })
            })
    </script>