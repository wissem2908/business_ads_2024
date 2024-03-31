
<?php
include 'includes/header.php';
session_start();
$user_id=$_GET['user_id'];
      ?>
        <div class="content-body">
            <!-- row -->
            <input type="hidden"  id="user_id" value="<?php echo $user_id; ?>" name="">
            <div class="container-fluid">
                    <div class="row page-titles">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Ads</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Ads List</a></li>
                    </ol>
                </div>

                <div class="row">
                <div class="col-xl-4 col-lg-4 col-sm-12">
                <div class="card bg-warning">
                  <div class="card-body">
                    <div class="row">
                      
                      <div class="col-lg-8">
                        <h3>Total Ads</h3>
                       
                      </div>
                      <div class="col-lg-4 d-flex justify-content-center"> <h1 id="totalAds"></h1></div>
                    </div>
                  </div>
                </div>
              </div> 
                <div class="col-xl-4 col-lg-4 col-sm-12">
                <div class="card bg-success">
                  <div class="card-body">
                    <div class="row">
                      
                      <div class="col-lg-8">
                        <h3>Active Ads</h3>
                       
                      </div>
                      <div class="col-lg-4 d-flex justify-content-center"> <h1 id="ActiveAds"></h1></div>
                    </div>
                  </div>
                </div>
              </div> 
              <div class="col-xl-4 col-lg-4 col-sm-12">
                <div class="card bg-danger">
                  <div class="card-body">
                    <div class="row">
                      
                      <div class="col-lg-8">
                        <h3>Inactive Ads</h3>
                       
                      </div>
                      <div class="col-lg-4 d-flex justify-content-center"> <h1 id="inactiveAds"></h1></div>
                    </div>
                  </div>
                </div>
              </div> 
                </div>
               <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Ads List</h4>
                                <a href="add_gen_user_ads_admin.php?user_id=<?php echo $user_id; ?>" type="button" class="btn btn-outline-primary">Place Ad</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table  class="display" id="ads" >
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Ad Title</th>
                                                <th>Ad Description</th>
                                                <th>Status</th>
                                               <th>Date creation</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="listAds">
                                           
                                        
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
<script type="text/javascript" >


</script>
<script type="text/javascript" src="assets/js/list_gen_user_ads.js"></script>
