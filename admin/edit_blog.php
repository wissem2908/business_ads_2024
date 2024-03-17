
      <?php
include 'includes/header.php';


$blog_id=$_GET['blog_id'];
      ?>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
        <div class="content-body">
            <!-- row -->
            <div class="container-fluid">
                    <div class="row page-titles">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Blogs</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Edit Blog</a></li>
                    </ol>
                </div>
               <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Edit Blog</h4>
                                <a href="blogs_list.php" type="button" class="btn btn-outline-primary">List Blog</a>
                            </div>
                             <form method="post" enctype="multipart/form-data" id="edit_blog">
                            <div class="card-body">
                               
                                     <div class="row"> 
                             <input type="hidden" value="<?php echo $blog_id; ?>" id='blog_id' name="blog_id"/>
                                           <div class="mb-3 col-lg-6 col-md-12">
                                <label class="form-label">Blog title</label>
                                            <input type="text" name="blog_title" id="blog_title" class="form-control input-default " >
                                        </div>
                                       
                                     
                                      <input type="hidden" id="blog_img" name="blog_img"/>
                                          <div class="mb-3 col-lg-6 col-md-12">
                                <label class="form-label">Blog Image</label>
                                            <input type="file" name="blog_image" id="blog_image" class="form-control input-default " >
                                        </div>
                                        <div class="mb-3 col-lg-12">
                                        <label class="form-label">Blog Description</label>
                                          <textarea name="blog_desc" id="blog_desc">
     
    </textarea>
                                       </div>
                                        
                                    </div>
                                   <br/>

                            </div>




                            <div class="card-footer"><button type="submit" class="btn  btn-square btn-primary">Edit Blog</button></div>
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
            .create( document.querySelector( '#blog_desc' ) )
            .then( editor => {
        // Store it in more "global" context.
        appEditor = editor;
    } )
            .catch( error => {
                console.error( error );
            } );
    </script>
 <script src='https://cdnjs.cloudflare.com/ajax/libs/inputmask/4.0.8/jquery.inputmask.bundle.min.js'></script>
<script type="text/javascript" src="assets/js/edit_blog.js"></script>
