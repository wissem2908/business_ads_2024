
      <?php
include 'includes/header.php';

session_start();
$user_id = $_SESSION['user_id'];

      ?>
        <div class="content-body">
            <!-- row -->
			<div class="container-fluid">
				 <div class="row page-titles">
                    <ol class="breadcrumb">
                        
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Profile</a></li>
                    </ol>
                </div>
                <div class="row">
                  <div class="col-lg-12">
                    <div class="card">
                           
                            <div class="card-body">
                                <!-- Nav tabs -->
                                <div class="default-tab">
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-bs-toggle="tab" href="#home"><i class="fas fa-info-circle  me-2"></i> Profile Details</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-bs-toggle="tab" href="#profile"><i class="fas fa-user-alt me-2"></i>Change Profile</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link " data-bs-toggle="tab" href="#contact"><i class="fas fa-unlock-alt me-2"></i> Change Password</a>
                                        </li>
                                        
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane fade active show" id="home" role="tabpanel">
                                          <div class="row p-4">
                                            <div class="col-lg-3">      <img  id="view_logo_image" data-src="images/contacts/Untitled-3.jpg" alt="" class="rounded" width="150" height="150"></div>
                                            <div class="col-lg-6"> <h6 class="fs-18 font-w600 my-1"><a href="#" class="text-black user-name" data-name="Alan Green">Business Name: <span id="view_business_name"></span></a></h6>
                    
                     <p class="fs-14 mb-3 user-work" >Email: <span id="view_email"></span></p>
                              <p class="fs-14 mb-3 user-work" >Contact Name: <span id="view_contact_name"></span></p>
                                <p class="fs-14 mb-3 user-work" >Username: <span id="view_username"></span></p>
                     </div>
                                    
                                          </div>
                                        </div>
                                        <div class="tab-pane fade" id="profile">
                                            <div class="pt-4">
                                              <form method="post" enctype="multipart/form-data" id="changeProfile">
                            <div class="card-body">
                               
                                     <div class="row"> 
                             <input type="hidden" name="user_id" id="user_id" value="<?php echo $user_id; ?>">
                                           <div class="mb-3 col-lg-6 col-md-12">
                                <label class="form-label">Business Name</label>
                                            <input type="text" name="business_name" id="business_name"  class="form-control input-default " >
                                        </div>
                                       
                                        <div class="mb-3 col-lg-6 col-md-12">
                                <label class="form-label">Email <span class="text-danger required" >*required</span></label>
                                            <input type="text" id="email"  name="email" class="form-control input-default " >
                                        </div>
                                        <div class="mb-3 col-lg-6 col-md-12">
                                <label class="form-label">Contact Name</label>
                                            <input type="text" id="contact_name" name="contact_name" class="form-control input-default " >
                                        </div>
                                         <div class="mb-3 col-lg-6 col-md-12">
                                <label class="form-label">Username <span class="text-danger required">*required</span></label>
                                            <input disabled="" type="text" id="username" name="username" class="form-control input-default " >
                                        </div>
                                        <div class="mb-3 col-lg-6 col-md-12">
                                <label class="form-label">Phone Number </label>
                                            <input type="tel" name="phone_number" inputmode="tel" id="phone_number" class="phone form-control input-default " >
                                           
                                        </div>
                                        <div class="mb-3 col-lg-6 col-md-12">
                                <label class="form-label">Whatsapp Number </label>
                                            <input type="tel" name="whatsapp_number" inputmode="tel" id="whatsapp_number" class="form-control input-default " >
                                           
                                        </div>
                                        <input type="hidden" id="logo_image" name="logo_image">
                                          <div class="mb-3 col-lg-6 col-md-12">
                                             <label class="form-label">Logo</label>
                                            <input type="file" name="logo" id="logo" class="form-control input-default " >
                                        </div>
                                        <div class="mb-3 col-lg-6 col-md-12">
                                <label class="form-label">Address</label>
                                            <input type="text" name="address" id="address" class="form-control input-default " >
                                        </div>

                                        <div class="col-lg-12">
                                    <label class="form-label">Description (200 character  max)</label>
                                          <textarea style="height:100px" name="user_desc" id="user_desc" maxlength="200"  class="form-control  ">
     
    </textarea>
                                       </div>
                                        <div class="accordion accordion-flush" id="accordionFlushExample">
                                                <br/>
  <div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingOne">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
        Opening Hours
      </button>
    </h2>
    <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body">
       <div class="row">
       <div class="mb-3 col-lg-4 col-md-12">
                                <label class="form-label"><b>Weekday</b></label>
                                <input type="text" name="Monday" id="Monday" readonly   value="Monday" class="form-control input-default " >
                            
                                        </div>
                                        <div class="mb-3 col-lg-3 col-md-12">
                                <label class="form-label"><b>Open Time</b></label>
                                <input type="time" name="Monday_open" id="Monday_open" class="form-control input-default " >
                                        </div>
                                        <div class="mb-3 col-lg-3 col-md-12">
                                <label class="form-label"><b>Close Time</b></label>
                                <input type="time" name="Monday_close" id="Monday_close" class="form-control input-default " >
                                        </div>
                                        
       </div>
       <div class="row">
       <div class="mb-3 col-lg-4 col-md-12">
                              
                                <input type="text" name="Tuesday" id="Tuesday" readonly  value="Tuesday" class="form-control input-default " >
                            
                                        </div>
                                        <div class="mb-3 col-lg-3 col-md-12">
                             
                                <input type="time" name="Tuesday_open" id="Tuesday_open" class="form-control input-default " >
                                        </div>
                                        <div class="mb-3 col-lg-3 col-md-12">
                             
                                <input type="time" name="Tuesday_close" id="Tuesday_close" class="form-control input-default " >
                                        </div>
                                        
       </div>
       <div class="row">
       <div class="mb-3 col-lg-4 col-md-12">
                              
                                <input type="text" name="Wednesday" id="Wednesday" readonly  value="Wednesday" class="form-control input-default " >
                            
                                        </div>
                                        <div class="mb-3 col-lg-3 col-md-12">
                             
                                <input type="time" name="Wednesday_open" id="Wednesday_open" class="form-control input-default " >
                                        </div>
                                        <div class="mb-3 col-lg-3 col-md-12">
                             
                                <input type="time" name="Wednesday_close" id="Wednesday_close" class="form-control input-default " >
                                        </div>
                                        
       </div>
       <div class="row">
       <div class="mb-3 col-lg-4 col-md-12">
                              
                                <input type="text" name="Thursday" id="Thursday" readonly  value="Thursday" class="form-control input-default " >
                            
                                        </div>
                                        <div class="mb-3 col-lg-3 col-md-12">
                             
                                <input type="time" name="Thursday_open" id="Thursday_open" class="form-control input-default " >
                                        </div>
                                        <div class="mb-3 col-lg-3 col-md-12">
                             
                                <input type="time" name="Thursday_close" id="Thursday_close" class="form-control input-default " >
                                        </div>
                                        
       </div>
       <div class="row">
       <div class="mb-3 col-lg-4 col-md-12">
                              
                                <input type="text" name="Friday" id="Friday" readonly  value="Friday" class="form-control input-default " >
                            
                                        </div>
                                        <div class="mb-3 col-lg-3 col-md-12">
                             
                                <input type="time" name="Friday_open" id="Friday_open" class="form-control input-default " >
                                        </div>
                                        <div class="mb-3 col-lg-3 col-md-12">
                             
                                <input type="time" name="Friday_close" id="Friday_close" class="form-control input-default " >
                                        </div>
                                        
       </div>
       <div class="row">
       <div class="mb-3 col-lg-4 col-md-12">
                              
                                <input type="text" name="Saturday" id="Saturday" readonly  value="Saturday" class="form-control input-default " >
                            
                                        </div>
                                        <div class="mb-3 col-lg-3 col-md-12">
                             
                                <input type="time" name="Saturday_open" id="Saturday_open" class="form-control input-default " >
                                        </div>
                                        <div class="mb-3 col-lg-3 col-md-12">
                             
                                <input type="time" name="Saturday_close" id="Saturday_close" class="form-control input-default " >
                                        </div>
                                        
       </div>
       <div class="row">
       <div class="mb-3 col-lg-4 col-md-12">
                              
                                <input type="text" name="Sunday" id="Sunday" readonly  value="Sunday" class="form-control input-default " >
                            
                                        </div>
                                        <div class="mb-3 col-lg-3 col-md-12">
                             
                                <input type="time" name="Sunday_open" id="Sunday_open" class="form-control input-default " >
                                        </div>
                                        <div class="mb-3 col-lg-3 col-md-12">
                             
                                <input type="time" name="Sunday_close" id="Sunday_close" class="form-control input-default " >
                                        </div>
                                        
       </div>
    </div>
    </div>
  </div>


</div>
                                    </div>
                               
                              
                            </div>
                            <div class="card-footer"><button type="submit" class="btn  btn-square btn-primary">Change Profile</button></div>
                             </form>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="contact">
                                            <div class="pt-4">
                                             <div class="row">
                                                <div class="mb-3 col-lg-6 col-md-12">
                                <label class="form-label">Old password</label>
                                            <input type="password"  id="old_pass"  class="form-control input-default " >
                                        </div>
                                          <div class="mb-3 col-lg-6 col-md-12">
                                <label class="form-label">New password</label>
                                            <input type="password"  id="new_pass"  class="form-control input-default " >
                                        </div>
                                        <button type="button" id="changePass" class="btn  btn-square btn-primary">Change Password</button>
                                         
                                             </div>
                                            </div>
                                        </div>
                                      
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

<script src='https://cdnjs.cloudflare.com/ajax/libs/inputmask/4.0.8/jquery.inputmask.bundle.min.js'></script>
<script type="text/javascript" src="assets/js/profile.js"></script>



