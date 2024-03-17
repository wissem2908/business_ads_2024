
      <?php
include 'includes/header.php';
session_start();
$user_id=$_SESSION['user_id'];
      ?>
        <div class="content-body">
            <!-- row -->
            <input type="hidden"  id="user_id" value="<?php echo $user_id; ?>" name="">
            <div class="container-fluid">
                    <div class="row page-titles">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Ads</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">My Ads</a></li>
                    </ol>
                </div>
               <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">My Ads</h4>
                                <a href="add_ads.php" type="button" class="btn btn-outline-primary">Place Ad</a>
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
                                               <th>Creation Date</th>
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

<script type="text/javascript" src="assets/js/list_ads.js"></script>
