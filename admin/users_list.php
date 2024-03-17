
      <?php
include 'includes/header.php';
      ?>
        <div class="content-body">
            <!-- row -->
            <div class="container-fluid">
                    <div class="row page-titles">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Users</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Users List</a></li>
                    </ol>
                </div>
               <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Users List</h4>
                                <a href="add_user.php" type="button" class="btn btn-outline-primary">Add User</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table  class="display" id="users" >
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Business Name</th>
                                                <th></th>
                                                <th>Email</th>
                                                
                                                <th>Username</th>
                                                <th>Categories</th>
                                                <th>Status</th>
                                                <th>Ads</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="listUser">
                                           
                                        
                                        
                                        
                                          
                                          

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

<script type="text/javascript" src="assets/js/list_users.js"></script>
