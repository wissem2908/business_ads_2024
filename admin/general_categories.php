
<?php
include 'includes/header.php';
session_start();

      ?>
        <div class="content-body">
            <!-- row -->
            <div class="container-fluid">
                    <div class="row page-titles">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">General Categories</a></li>
                      
                    </ol>
                </div>

                <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog  modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Sub Categories</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="row">
                    <div class="col-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Sub Categories List</h4>
                               
                            </div>
                            <div class="card-body">
         <!-- Button trigger modal -->

<input type='hidden' id="cat_id" />

                                <div class="table-responsive">
                                    <table  class="display" id="sub_categories" >
                                        <thead>
                                            <tr>
                                              
                                                <th> Sub Category title</th>
                                             
                                                <th>Action</th>
                                             
                                            </tr>
                                        </thead>
                                        <tbody id="sub_cat_list" class="sub_cat_position"  >
                                 
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
               </div>
               <div class="col-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"> Add Sub Category</h4>
                                
                               
                            </div>
                            <div class="card-body">
                             <div class="row">
                                
                             <div class="mb-3 col-lg-12 col-md-12">
                                <label class="form-label">Sub Category title</label>
                                            <input type="text" name="sub_cat_title" id="sub_cat_title" class="form-control input-default " >
                                        </div>
                                        <div class="mb-3 col-lg-4 col-md-12">
                                        <button type="submit" class="btn  btn-square btn-primary" id="add_sub_cat">Add Sub Category</button>
                                        </div>
                             </div>
                            </div>
                           
                        </div>
               </div>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>
               <div class="row">
                    <div class="col-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">General Categories List</h4>
                               
                            </div>
                            <div class="card-body">
         <!-- Button trigger modal -->



                                <div class="table-responsive">
                                    <table  class="display" id="categories" >
                                        <thead>
                                            <tr>
                                              <th></th>
                                                <th>Category title</th>
                                              <th>Sub Category</th>
                                                <th>Action</th>
                                             
                                            </tr>
                                        </thead>
                                        <tbody id="cat_list" class="row_position">
                                 
                                        
                                          

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
               </div>
               <div class="col-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"> Add General Category</h4>
                                
                               
                            </div>
                            <div class="card-body">
                             <div class="row">
                                
                             <div class="mb-3 col-lg-12 col-md-12">
                                <label class="form-label">General Category title</label>
                                            <input type="text" name="cat_title" id="cat_title" class="form-control input-default " >
                                        </div>
                                        <div class="mb-3 col-lg-4 col-md-12">
                                        <button type="submit" class="btn  btn-square btn-primary" id="add_cat">Add General Category</button>
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
<script type="text/javascript" src="assets/js/general_categories.js"></script>
<script type="text/javascript" src="assets/js/sub_categories.js"></script>

<script>

</script>