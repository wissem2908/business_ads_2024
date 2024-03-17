
      <?php
include 'includes/header.php';
      ?>
        <div class="content-body">
            <!-- row -->
            <div class="container-fluid">
                    <div class="row page-titles">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">WebSite Content</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Header Content</a></li>
                    </ol>
                </div>
               <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Header Content</h4>
                               
                            </div>
                             <form method="post" enctype="multipart/form-data" id="change_content">
                            <div class="card-body">
                            <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Banner 1</h4>
                               
                            </div>
                           
                            <div class="card-body">
                               
                            <div class="row"> 
                                        <div class="col-lg-6 col-sm-12">
                                        <img  id="img_banner_1" width="100%"/>
                                        </div>
                                        <div class="col-lg-6 col-sm-12">
                                        <div class="mb-3 col-lg-12 col-md-12">
                                <label class="form-label">title 1</label>
                                            <input type="text" name="banner1_title1" id="banner1_title1" class="form-control input-default " >
                                        </div>
                                         <div class="mb-3 col-lg-12 col-md-12">
                                <label class="form-label">title 2</label>
                                            <input type="text" name="banner1_title2" id="banner1_title2" class="form-control input-default " >
                                        </div>
                                        
                                        
                                          <div class="mb-3 col-lg-12 col-md-12">
                                            <input type="hidden" name="image1" id="image1"/>
                                <label class="form-label">Image 1 (2000 x 1425)</label>
                                            <input type="file" name="banner1_path" id="banner1_path" class="form-control input-default " >
                                        </div>
                                        </div>
                             
                                           
                                    </div>
                               
                              
                            </div>
                           
                             
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Banner 2</h4>
                               
                            </div>
                           
                            <div class="card-body">
                               
                                     <div class="row"> 
                                        <div class="col-lg-6 col-sm-12">
                                        <img  id="img_banner_2" width="100%"/>
                                        </div>
                                        <div class="col-lg-6 col-sm-12">
                                        <div class="mb-3 col-lg-12 col-md-12">
                                <label class="form-label">title 1</label>
                                            <input type="text" name="banner2_title1" id="banner2_title1" class="form-control input-default " >
                                        </div>
                                         <div class="mb-3 col-lg-12 col-md-12">
                                <label class="form-label">title 2</label>
                                            <input type="text" name="banner2_title2" id="banner2_title2" class="form-control input-default " >
                                        </div>
                                        
                                        
                                          <div class="mb-3 col-lg-12 col-md-12">
                                            <input type="hidden" name="image2" id="image2"/>
                                <label class="form-label">Image 2 (2000 x 1425)</label>
                                            <input type="file" name="banner2_path" id="banner2_path" class="form-control input-default " >
                                        </div>
                                        </div>
                             
                                           
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

<script type="text/javascript" src="assets/js/content.js"></script>
