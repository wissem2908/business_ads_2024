
      <?php
include 'includes/header.php';
session_start();
$user_id=$_SESSION['user_id'];
      ?>
        <div class="content-body">
            <!-- row -->
            <div class="container-fluid">
                    <div class="row page-titles">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Categories</a></li>
                      
                    </ol>
                </div>
               <div class="row">
                    <div class="col-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Categories List</h4>
                               
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table  class="display" id="categories" >
                                        <thead>
                                            <tr>
                                              
                                                <th>Category title</th>
                                              
                                                <th>Action</th>
                                             
                                            </tr>
                                        </thead>
                                        <tbody id="cat_list" class="categories_position">
                                 
                                          
                                          

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
               </div>
               <div class="col-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"> Add Category</h4>
                                <span>Max 6 categories</span>
                               
                            </div>
                            <div class="card-body">
                             <div class="row">
                                <input type="hidden" value=<?php echo $user_id; ?> id="user_id"/>
                             <div class="mb-3 col-lg-12 col-md-12">
                                <label class="form-label">Category title</label>
                                            <input type="text" name="cat_title" id="cat_title" class="form-control input-default " >
                                        </div>
                                        <div class="mb-3 col-lg-4 col-md-12">
                                        <button type="submit" class="btn  btn-square btn-primary" id="add_cat">Add Category</button>
                                        </div>
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
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script type="text/javascript" src="assets/js/categories.js"></script>
