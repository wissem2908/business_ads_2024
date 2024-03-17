
      <?php
include 'includes/header.php';
      ?>
        <div class="content-body">
            <!-- row -->
            <div class="container-fluid">
                    <div class="row page-titles">
                    <ol class="breadcrumb">
                        
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">User Messages</a></li>
                    </ol>
                </div>
               <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"> User Messages</h4>
                               
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table  class="display" id="contact" >
                                        <thead>
                                            <tr>
                                               
                                                <th>Full Name</th>
                                                
                                                <th>Email</th>
                                                
                                                <th>Message</th>
                                                <th>Status</th>
                                                <th>Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="list_user_contact">
                                           
                                            
                                        
                                          
                                          

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
               </div>
            </div>
        </div>
<!-- contact-->

      <div class="modal fade" id="basicModal">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Message Details</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                                                    </button>
                                                </div>
                                                <div class="modal-body">
<h3>Full name: <span id="fullName"></span></h3>
<h5>Email: <span id="email"></span></h5>
<h5>Date: <span id="date"></span></h5>
<h5>Message: <span id="message"></span></h5>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                                                   
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
      
       <?php
include 'includes/footer.php';
      ?>

<script type="text/javascript" src="assets/js/list_user_contact.js"></script>
