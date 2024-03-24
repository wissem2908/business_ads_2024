
      <?php
include 'includes/header.php';
      ?>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
        <div class="content-body">
            <!-- row -->
            <div class="container-fluid">
                    <div class="row page-titles">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Users</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Add User</a></li>
                    </ol>
                </div>
               <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Add User</h4>
                                <a href="users_list.php" type="button" class="btn btn-outline-primary">User List</a>
                            </div>
                             <form method="post" enctype="multipart/form-data" id="add_user">
                            <div class="card-body">
                               
                                     <div class="row"> 
                             
                                           <div class="mb-3 col-lg-6 col-md-12">
                                <label class="form-label">Business Name</label>
                                            <input type="text" name="business_name" class="form-control input-default " >
                                        </div>
                                       
                                        <div class="mb-3 col-lg-6 col-md-12">
                                <label class="form-label">Email </label>
                                            <input type="text" name="email" class="form-control input-default " >
                                        </div>
                                        <div class="mb-3 col-lg-6 col-md-12">
                                <label class="form-label">Contact Name</label>
                                            <input type="text" name="contact_name" class="form-control input-default " >
                                        </div>
                                        <div class="mb-3 col-lg-6 col-md-12">
                                <label class="form-label">Status</label>
                                            <select  class="form-control input-default " name="status" style="-webkit-appearance: none; -moz-appearance: none; appearance: none; background-image: url('data:image/svg+xml,%3Csvg xmlns=&quot;http://www.w3.org/2000/svg&quot; width=&quot;16&quot; height=&quot;16&quot; viewBox=&quot;0 0 16 16&quot;&gt;%3Cpath fill=&quot;none&quot; stroke=&quot;%23343a40&quot; stroke-linecap=&quot;round&quot; stroke-linejoin=&quot;round&quot; stroke-width=&quot;2&quot; d=&quot;M2 6l6 6 6-6&quot;%3E%3C/path%3E%3C/svg%3E'); background-repeat: no-repeat; background-position: right 0.5rem bottom 0.5rem; padding-right: 1.5rem;" >
                                                  <option></option>
                                                <option value="active">Active</option>
                                                <option value="inactive">Inactive</option>
                                               
                                            </select>
                                        </div>
                                         <div class="mb-3 col-lg-6 col-md-12">
                                <label class="form-label">Role</label>
                                            <select  class="form-control input-default " name="role" style="-webkit-appearance: none; -moz-appearance: none; appearance: none; background-image: url('data:image/svg+xml,%3Csvg xmlns=&quot;http://www.w3.org/2000/svg&quot; width=&quot;16&quot; height=&quot;16&quot; viewBox=&quot;0 0 16 16&quot;&gt;%3Cpath fill=&quot;none&quot; stroke=&quot;%23343a40&quot; stroke-linecap=&quot;round&quot; stroke-linejoin=&quot;round&quot; stroke-width=&quot;2&quot; d=&quot;M2 6l6 6 6-6&quot;%3E%3C/path%3E%3C/svg%3E'); background-repeat: no-repeat; background-position: right 0.5rem bottom 0.5rem; padding-right: 1.5rem;" >
                                                  <option></option>
                                                <option value="admin">Admin</option>
                                                <option value="user">User</option>
                                               
                                            </select>
                                        </div>
                                         <div class="mb-3 col-lg-6 col-md-12">
                                <label class="form-label">Username</label>
                                            <input type="text" name="username" class="form-control input-default " >
                                        </div>
                                         <div class="mb-3 col-lg-6 col-md-12">
                                <label class="form-label">Phone Number </label>
                                            <input type="tel" name="phone_number" inputmode="tel" id="phone_number" class="form-control input-default " >
                                           
                                        </div>
                                        <div class="mb-3 col-lg-6 col-md-12">
                                <label class="form-label">Whatsapp Number </label>
                                            <input type="tel" name="whatsapp_number" id="whatsapp_number" class="form-control input-default " >
                                           
                                        </div>
                                         <div class="mb-3 col-lg-6 col-md-12">
                                <label class="form-label">Password </label>
                                            <input type="text" class="form-control input-default " name="password" id="password">
                                        </div> <div class="mb-3 col-lg-4 col-md-12">
                               <a id="generate_password" class="btn  btn-square btn-outline-primary" style="margin-top:27px">Generate password</a>
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
                                        <div class="col-lg-12">
                                    <label class="form-label">Description (200 character  max)</label>
                                          <textarea style="height:100px" name="user_desc" id="user_desc" maxlength="200"  class="form-control input-default ">
     
    </textarea>
                                       </div>
                                    </div>
                                   <br/>
<div class="accordion accordion-flush" id="accordionFlushExample">
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
                                <label class="form-label">Company cover: Please upload a JPG or PNG image with a minimum size of 800 x 400 pixels</label>
                                            <input type="file" name="company_cover" id="company_cover" class="form-control input-default " >
                                        </div>
                            </div>




                            <div class="card-footer"><button type="submit" class="btn  btn-square btn-primary">Add User</button></div>
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
<script type="text/javascript" src="assets/js/add_user.js"></script>
<script src="vendor/leafleft/leaflet.js"></script>
<link rel="stylesheet" href="vendor/leafleft/leaflet.css" />

<script>

const mapDiv = document.getElementById("map");
  const latitudeInput = document.getElementById("latitude-input");
   const longitudeInput = document.getElementById("longitude-input");
  let marker;


  //   // Initialize map
  const map = L.map(mapDiv).setView([-23.588074679937083, 130.43388221316184], 5); // Default to Sydney, Australia

   // Add tile layer
   const tileLayer = L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors',
   }).addTo(map);
   marker = L.marker([-23.588074679937083, 130.43388221316184],{draggable: true}).on('dragend',function(e){
    var lat =e.target._latlng.lat
    var lng =e.target._latlng.lng
     osmGetAddress(lat,lng,marker)
   }).addTo(map);


  map.on("click", (event) => {
   
     if (marker) {
      marker.remove(); // Remove existing marker if present
     }
     marker = L.marker(event.latlng,{draggable: true}).on('dragend',function(e){
    var lat =e.target._latlng.lat
    var lng =e.target._latlng.lng
     osmGetAddress(lat,lng,marker)
   }).addTo(map);
     latitudeInput.value = event.latlng.lat;
     longitudeInput.value = event.latlng.lng;

     osmGetAddress(event.latlng.lat,event.latlng.lng,marker)
    
   });

   const successCallback = (position) => {
  console.log("position");
   console.log(position.coords.latitude);
  marker = L.marker([position.coords.latitude,position.coords.longitude],{draggable: true}).on('dragend',function(e){
    var lat =e.target._latlng.lat
    var lng =e.target._latlng.lng
     osmGetAddress(lat,lng,marker)
   }).addTo(map);
   map.flyTo([position.coords.latitude,position.coords.longitude], 10);
   osmGetAddress(position.coords.latitude,position.coords.longitude,marker)

   latitudeInput.value = position.coords.latitude
     longitudeInput.value = position.coords.longitude
 };

const errorCallback = (error) => {
   console.log(error);
 };

 navigator.geolocation.getCurrentPosition(successCallback, errorCallback);

 
//   // GET ADDRESS FROM LATITUDE AND LONGITUDE
 function osmGetAddress( lat, lon) {
   if(lat != 0 && lon != 0) {
           $.ajax({
         type: 'GET',
        url: location.protocol + '//nominatim.openstreetmap.org/reverse.php?format=json&accept-language=en_US&lat='+lat+'&lon=' + lon,
         success: function(data) {
             console.log("data")
            console.log(data.display_name)
             console.log("data")
            //$('#address_ad').val(data.display_name)
            marker.bindPopup(data.display_name).openPopup();
          //osmMarkerAddressBind(marker, data);
         }
       });
       }

   return false;
 }
</script>