
      <?php
include 'includes/header.php';
      ?>
        <div class="content-body">
            <!-- row -->
            <div class="container-fluid">
                    <div class="row page-titles">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Blogs</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Blogs List</a></li>
                    </ol>
                </div>
               <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Blogs List</h4>
                                <a href="add_blog.php" type="button" class="btn btn-outline-primary">Add Blog</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table  class="display" id="blogs" >
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Blog Title</th>
                                              
                                                <th>Desription</th>
                                                
                                                <th>Status</th>
                                              <th>Date creation</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="listBlog">
                                           
                                        
                                        
                                        
                                          
                                          

                                        </tbody>
                                    </table>
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

<script type="text/javascript" src="assets/js/list_blogs.js"></script>
