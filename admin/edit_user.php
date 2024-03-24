
      <?php
include 'includes/header.php';
      ?>
        <div class="content-body">
            <!-- row -->
            <div class="container-fluid">
                    <div class="row page-titles">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Users</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Edit User</a></li>
                    </ol>
                </div>
               <div class="row">
                           <div class="col-lg-12 col-md-12 ">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Reset Password</h4>
                              
                            </div>
                            <div class="card-body"> 
                             <div class="row">
                             <div class="mb-3 col-lg-6 col-md-12">
                                <label class="form-label">Password </label>
                                            <input type="text" class="form-control input-default " name="password" id="passwordR">
                                        </div> <div class="mb-3 col-lg-4 col-md-12">
                               <a id="generate_password" class="btn  btn-square btn-outline-primary" style="margin-top:27px">Generate password</a>
                                        </div>
                                           
                               </div>
                             </div>
                              <div class="card-footer"> <a type="button" id="resetPassword" class="btn  btn-square btn-primary">Reset Password</a></div>

                        </div>
               </div>
<div class="col-lg-12 col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Edit User</h4>
                                <img class="rounded-circle" width="40" id="img_logo" alt="">
                            </div>
                             <form method="post" enctype="multipart/form-data" id="edit_user" >
                            <div class="card-body">
                               
                                     <div class="row"> 
                             <input type="hidden" name="user_id" value="<?php echo $_GET['user_id'];?>" id="user_id">
                                           <div class="mb-3 col-lg-6 col-md-12">
                                <label class="form-label">Business Name</label>
                                            <input type="text" id="business_name" name="business_name" class="form-control input-default " >
                                        </div>
                                        
                                        <div class="mb-3 col-lg-6 col-md-12">
                                <label class="form-label">Email <span class="text-danger">*</span></label>
                                            <input type="text" id="email" name="email" class="form-control input-default " >
                                        </div>
                                        <div class="mb-3 col-lg-6 col-md-12">
                                <label class="form-label">Conatct Name</label>
                                            <input type="text" id="contact_name" name="contact_name" class="form-control input-default " >
                                        </div>
                                        <div class="mb-3 col-lg-6 col-md-12">
                                <label class="form-label">Status</label>
                                            <select  class="form-control input-default " id="status"  name="status" >
                                                  <option></option>
                                                <option value="active">Active</option>
                                                <option value="inactive">Inactive</option>
                                               
                                            </select>
                                        </div>
                                         <div class="mb-3 col-lg-6 col-md-12">
                                <label class="form-label">Role</label>
                                            <select  class="form-control input-default " id="role" name="role" >
                                                  <option></option>
                                                <option value="admin">Admin</option>
                                                <option value="user">User</option>
                                               
                                            </select>
                                        </div>
                                         <div class="mb-3 col-lg-6 col-md-12">
                                <label class="form-label">Username <span class="text-danger">*</span></label>
                                            <input type="text" id="username" name="username" class="form-control input-default " >
                                        </div>
                                        <div class="mb-3 col-lg-6 col-md-12">
                                <label class="form-label">Phone Number </label>
                                            <input type="tel" name="phone_number" inputmode="tel" id="phone_number" class="phone form-control input-default " >
                                           
                                        </div>
                                        <div class="mb-3 col-lg-6 col-md-12">
                                <label class="form-label">Whatsapp Number </label>
                                            <input type="tel" name="whatsapp_number" inputmode="tel" id="whatsapp_number" class="form-control input-default " >
                                           
                                        </div>
                                          <div class="mb-3 col-lg-6 col-md-12">
                                <label class="form-label">Logo</label>
                                            <input type="file" name="logo" id="logo" class="form-control input-default " >
                                        </div>
                                        <div class="mb-3 col-lg-6 col-md-12">
                                <label class="form-label">Address</label>
                                            <input type="text" name="address" id="address" class="form-control input-default " >
                                        </div>
                                        <div class="mb-3 col-lg-12 col-md-12">
                                <label class="form-label">Location: (click on the map)</label>
                                <div id="map" style="height:300px;"></div>
<input id="latitude-input" type="hidden" name="latitude" />
<input id="longitude-input" type="hidden" name="longitude" />
                                        </div>
                                        <input type="hidden" id="logo_image"  name="logo_image"/>
                                        <div class="col-lg-12">
                                    <label class="form-label">Description (200 character  max)</label>
                                          <textarea style="height:100px" name="user_desc" id="user_desc" maxlength="200"  class="form-control input-default ">
     
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
<div class="mb-3 col-lg-12 col-md-12">
<input type="hidden" id="company_cover"  name="company_cover"/>
                                <label class="form-label">Company cover: Please upload a JPG or PNG image with a minimum size of 800 x 400 pixels</label>
                                            <input type="file" name="company_cover" id="company_cover" class="form-control input-default " >
                                        </div>
                                    </div>
                               
                              
                            </div>
                            <div class="card-footer"><button type="submit" class="btn  btn-square btn-primary">Edit User</button></div>
                             </form>
                        </div>
               </div>
    
            </div>
        </div>
      </div>
       <?php
include 'includes/footer.php';
      ?>
<script src='https://cdnjs.cloudflare.com/ajax/libs/inputmask/4.0.8/jquery.inputmask.bundle.min.js'></script>
<script type="text/javascript" src="assets/js/edit_user.js"></script>



<script src="vendor/leafleft/leaflet.js"></script>
<link rel="stylesheet" href="vendor/leafleft/leaflet.css" />

<script>

</script>