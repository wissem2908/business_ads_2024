
      <?php
include 'includes/header.php';
      ?>
        <div class="content-body">
            <!-- row -->
            <div class="container-fluid">
                    <div class="row page-titles">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">WebSite Content</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">About Content</a></li>
                    </ol>
                </div>
               <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">About Content</h4>
                               
                            </div>
                             <form method="post" enctype="multipart/form-data" id="change_about_content">
                            <div class="card-body">
                 
                                     <div class="row"> 
                                        <div class="col-lg-6 col-sm-12">
                                        <img  id="img_about" width="100%"/>
                                        </div>
                                        <div class="col-lg-6 col-sm-12">
                                     
                                         <div class="mb-3 col-lg-12 col-md-12">
                                <label class="form-label">About text</label>
                                <textarea name="about_text" id="about_text">
     
     </textarea>
                                        </div>
                                        
                                        
                                          <div class="mb-3 col-lg-12 col-md-12">
                                            <input type="hidden" name="image" id="image"/>
                                            <label class="form-label">About Image (380 x 390)</label>
                                            <input type="file" name="about_img" id="about_img" class="form-control input-default " >
                                        </div>
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
       <?php
include 'includes/footer.php';
      ?>
<script src="vendor/ckeditor/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#about_text' ) )
            .then( editor => {
        // Store it in more "global" context.
        appEditor = editor;
    } )
            .catch( error => {
                console.error( error );
            } );
    </script>
<script type="text/javascript" src="assets/js/content.js"></script>
