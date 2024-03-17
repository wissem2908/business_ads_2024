
<?php
include 'includes/header.php';
session_start();
      ?>
        <div class="content-body">
            <!-- row -->
			<div class="container-fluid">
          <div class="row page-titles">
                    <ol class="breadcrumb">
                        
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Privacy Policy</a></li>
                    </ol>
                </div>
           
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Privacy Policy</h4>
                               
                            </div>
                             <form method="post" enctype="multipart/form-data" id="add_pp">
                            <div class="card-body">
                            <div class="row">
                            <div class="col-lg-12">
                                        <label>Description </label>
                                          <textarea name="pp_desc" id="pp_desc">
     
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
            .create( document.querySelector( '#pp_desc' ) )
            .catch( error => {
                console.error( error );
            } );


            $(document).ready(function(){
                $('#add_pp').on('submit', function(e){
                    e.preventDefault();

                    $.ajax({
			url:'assets/php/add_pp.php',
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
                            title: 'Privacy Policy updated successfully',
                            showConfirmButton: true,

                            })
                      }
   }
		})
                })
            })
    </script>