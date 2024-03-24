
      <?php
include 'includes/header.php';

session_start();
$user_id=$_GET['user_id'];
      ?>

      
        <div class="content-body">
            <!-- row -->
            <div class="container-fluid">
                    <div class="row page-titles">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Ads</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Place Ad</a></li>
                    </ol>
                </div>
               <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Place Ad</h4>
                                <a href="#" onclick="history.back()" type="button" class="btn btn-outline-primary">Back</a>
                            </div>
                             <form method="post" enctype="multipart/form-data" id="add_ad">
                            <div class="card-body">
                               <input type="hidden" id="user_id"  value="<?php echo $user_id;  ?>" name="user_id">
                                     <div class="row"> 
                             
                                          
                                        <div class="mb-3 col-lg-6 col-md-12">
                                            <label class="form-label">Ad Title <span  class="text-danger required">*required</span></label>
                                          <div class="input-group mb-3 ">
                                            <input type="text" name="ad_title" class="form-control" >
                    
                                        </div>
                                        </div>

                                        <div class="mb-3 col-lg-6 col-md-12">
                                <label class="form-label">My Category <span class="text-danger required"  >*required</span></label>
                                           <select class="form-control input-default " name="categories" id="categories" style="-webkit-appearance: none; -moz-appearance: none; appearance: none; background-image: url('data:image/svg+xml,%3Csvg xmlns=&quot;http://www.w3.org/2000/svg&quot; width=&quot;16&quot; height=&quot;16&quot; viewBox=&quot;0 0 16 16&quot;&gt;%3Cpath fill=&quot;none&quot; stroke=&quot;%23343a40&quot; stroke-linecap=&quot;round&quot; stroke-linejoin=&quot;round&quot; stroke-width=&quot;2&quot; d=&quot;M2 6l6 6 6-6&quot;%3E%3C/path%3E%3C/svg%3E'); background-repeat: no-repeat; background-position: right 0.5rem bottom 0.5rem; padding-right: 1.5rem;">
                                            <option disabled selected>Select...</option>
                                           </select>
                                        </div>

                                        <div class="mb-3 col-lg-6 col-md-12">
                                <label class="form-label">General Category <span class="text-danger required" >*required</span></label>
                                           <select class="form-control input-default " name="general_cat" id="general_cat" style="-webkit-appearance: none; -moz-appearance: none; appearance: none; background-image: url('data:image/svg+xml,%3Csvg xmlns=&quot;http://www.w3.org/2000/svg&quot; width=&quot;16&quot; height=&quot;16&quot; viewBox=&quot;0 0 16 16&quot;&gt;%3Cpath fill=&quot;none&quot; stroke=&quot;%23343a40&quot; stroke-linecap=&quot;round&quot; stroke-linejoin=&quot;round&quot; stroke-width=&quot;2&quot; d=&quot;M2 6l6 6 6-6&quot;%3E%3C/path%3E%3C/svg%3E'); background-repeat: no-repeat; background-position: right 0.5rem bottom 0.5rem; padding-right: 1.5rem;">
                                            <option disabled selected>Select...</option>
                                           </select>
                                        </div>
                                        <div class="mb-3 col-lg-6 col-md-12">
                                <label class="form-label">Sub Category <span class="text-danger required" >*required</span></label>
                                           <select class="form-control input-default " name="sub_categories" id="sub_categories" style="-webkit-appearance: none; -moz-appearance: none; appearance: none; background-image: url('data:image/svg+xml,%3Csvg xmlns=&quot;http://www.w3.org/2000/svg&quot; width=&quot;16&quot; height=&quot;16&quot; viewBox=&quot;0 0 16 16&quot;&gt;%3Cpath fill=&quot;none&quot; stroke=&quot;%23343a40&quot; stroke-linecap=&quot;round&quot; stroke-linejoin=&quot;round&quot; stroke-width=&quot;2&quot; d=&quot;M2 6l6 6 6-6&quot;%3E%3C/path%3E%3C/svg%3E'); background-repeat: no-repeat; background-position: right 0.5rem bottom 0.5rem; padding-right: 1.5rem;">
                                            <option disabled selected>Select...</option>
                                           </select>
                                        </div>
                                       <div class="mb-3 col-lg-6 col-md-12">
                                <label class="form-label">State<span class="text-danger required" > *required</span></label>
                                <select class="form-control input-default" name="state" id="state" style="-webkit-appearance: none; -moz-appearance: none; appearance: none; background-image: url('data:image/svg+xml,%3Csvg xmlns=&quot;http://www.w3.org/2000/svg&quot; width=&quot;16&quot; height=&quot;16&quot; viewBox=&quot;0 0 16 16&quot;&gt;%3Cpath fill=&quot;none&quot; stroke=&quot;%23343a40&quot; stroke-linecap=&quot;round&quot; stroke-linejoin=&quot;round&quot; stroke-width=&quot;2&quot; d=&quot;M2 6l6 6 6-6&quot;%3E%3C/path%3E%3C/svg%3E'); background-repeat: no-repeat; background-position: right 0.5rem bottom 0.5rem; padding-right: 1.5rem;">
                                    <option disabled selected>Select...</option>
  <option value="ACT">Australian Capital Territory</option>
  <option value="NSW">New South Wales</option>
  <option value="NT">Northern Territory</option>
  <option value="QLD">Queensland</option>
  <option value="SA">South Australia</option>
  <option value="TAS">Tasmania</option>
  <option value="VIC">Victoria</option>
  <option value="WA">Western Australia</option>
  <option value="australia">Australia</option>
</select>

                                        </div>
                                        <div class="mb-3 col-lg-6 col-md-12">
                                <label class="form-label">City/Region<span class="text-small text-muted

"><i> (optional)</i></span> </label>
                                           <select class="form-control input-default " name="city" id="city" style="-webkit-appearance: none; -moz-appearance: none; appearance: none; background-image: url('data:image/svg+xml,%3Csvg xmlns=&quot;http://www.w3.org/2000/svg&quot; width=&quot;16&quot; height=&quot;16&quot; viewBox=&quot;0 0 16 16&quot;&gt;%3Cpath fill=&quot;none&quot; stroke=&quot;%23343a40&quot; stroke-linecap=&quot;round&quot; stroke-linejoin=&quot;round&quot; stroke-width=&quot;2&quot; d=&quot;M2 6l6 6 6-6&quot;%3E%3C/path%3E%3C/svg%3E'); background-repeat: no-repeat; background-position: right 0.5rem bottom 0.5rem; padding-right: 1.5rem;">
                                                
                                            <option disabled selected>Select...</option> 
                                           </select>
                                        </div>
                                        <div class="mb-3 col-lg-12 col-md-12">
                                        <div class="wrapper">
      
      <div class="content">
        <input type="hidden" id="all_tags_input" name="all_tags_input"/>
        <p>Keywords <span class="text-small text-muted

"><i>(optional) </i></span><br/><span class="text-small text-muted

"><i>Press enter after each keyword</i></span></p>
        <ul id="list_tags"><input type="text" spellcheck="false" id="tags_input"></ul>
      </div>
      <div class="details">
        <p><span>10</span> tags are remaining</p>
        <button id="remove_tags">Remove All</button>
      </div>
    </div>
</div>
                                         <!-- 
                                        <div class="mb-3 col-lg-6 col-md-12">
                                <label class="form-label">City area</label>
                                <input type="text" name="city_area" class="form-control" >
                                        </div>
                                        <div class="mb-3 col-lg-6 col-md-12">
                                <label class="form-label">Adreess</label>
                                <input list="addr_list" name="address_ad" id="address_ad" class="form-control" />
                                <datalist id="addr_list">

</datalist>
                                        </div>
                                     
                                       
                                       
                                        <div class="mb-3 col-lg-6 col-md-12"></div>
                                        <div class="mb-3 col-lg-12 col-md-12">
                                <label class="form-label">Location: (click on the map)</label>
                                <div id="map" style="height:300px;"></div>
<input id="latitude-input" type="hidden" name="latitude" />
<input id="longitude-input" type="hidden" name="longitude" />
                                        </div> -->
                                       <div class="col-lg-12">
                                          <textarea name="ad_desc" id="ad_desc">
     
    </textarea>
                                       </div>
                                       
                                      
                                       
                                          <div class="mb-3 col-lg-10 col-sm-6 col-md-8">
                                <label class="form-label">Image  <span class="text-small text-muted

                                    "><i>(optional) </i></span> <br/><span class="text-small text-muted

                                    "><i>Format: jpeg, jpg or png </i></span>  </label>
                                    <div id="uppy"></div>
                                            <!-- <input type="file" name="image" id="image" class="form-control input-default " > -->
                                        </div>
                         <!-- <div class="mb-3 col-lg-2 col-md-4 col-sm-6 mt-6">
                                <button class="btn btn-sm  btn-outline-primary btn-rounded-circle" style="margin-top:27px;" id="addInputImage"><i class="fa fa-plus color-info"></i></button>
                                        </div>
                                    </div>
                               <div class="col-lg-12" id="image_box">
                                
                               </div>
                               
                              
                            </div> -->
                            <div class="card-footer"><button type="submit" class="btn  btn-square btn-primary">Place Ad</button></div>
                             </form>
                        </div> 
               </div>

</div>
            </div>
        </div>
      
       <?php
include 'includes/footer.php';
      ?>


  <script src="vendor/ckeditor/ckeditor.js"></script>
    <script>
      ClassicEditor
    .create( document.querySelector( '#ad_desc' ), {
        toolbar: {
            items: [
              
                '|',
                'bold',
                'italic',
                '|',
                'link',
                '|',
                'undo',
                'redo'
               
             
            ]
        }
    } )
    .catch( error => {
        console.error( error );
    } );
    </script>

<script  src="assets/js/add_ads.js"  type="module"></script>

<script src="vendor/leafleft/leaflet.js"></script>
<link rel="stylesheet" href="vendor/leafleft/leaflet.css" />
<script src="./vendor/uppy core/dist/uppy.min.js"></script>
<script>






//   const mapDiv = document.getElementById("map");
//   const latitudeInput = document.getElementById("latitude-input");
//   const longitudeInput = document.getElementById("longitude-input");
//   let marker;
//   const currentMarkers = [];

//   // Initialize map
//   const map = L.map(mapDiv).setView([-23.588074679937083, 130.43388221316184], 5); // Default to Sydney, Australia

//   // Add tile layer
//   const tileLayer = L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
//     attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors',
//   }).addTo(map);
//   marker = L.marker([-23.588074679937083, 130.43388221316184],{draggable: true}).on('dragend',function(e){
//     var lat =e.target._latlng.lat
//     var lng =e.target._latlng.lng
//     osmGetAddress(lat,lng)
//   }).addTo(map);
//   // Add click listener to map to set marker and update input fields
//   map.on("click", (event) => {
//     for (const marker of currentMarkers) {
//         map.removeLayer(marker);
//     }
//     if (marker) {
//       marker.remove(); // Remove existing marker if present
//     }
//     marker = L.marker(event.latlng).addTo(map);
//     latitudeInput.value = event.latlng.lat;
//     longitudeInput.value = event.latlng.lng;
//     osmGetAddress(event.latlng.lat,event.latlng.lng)
    
//   });
//   const successCallback = (position) => {
//   console.log("position");
//   console.log(position.coords.latitude);
//   marker = L.marker([position.coords.latitude,position.coords.longitude]).addTo(map);
//   map.flyTo([position.coords.latitude,position.coords.longitude], 10);
// };

// const errorCallback = (error) => {
//   console.log(error);
// };

// navigator.geolocation.getCurrentPosition(successCallback, errorCallback);



//   // GET ADDRESS FROM LATITUDE AND LONGITUDE
// function osmGetAddress( lat, lon) {
//   if(lat != 0 && lon != 0) {
//           $.ajax({
//         type: 'GET',
//         url: location.protocol + '//nominatim.openstreetmap.org/reverse.php?format=json&accept-language=en_US&lat='+lat+'&lon=' + lon,
//         success: function(data) {
//             console.log("data")
//             console.log(data)
//             console.log("data")
//             $('#address_ad').val(data.display_name)
            
//           //osmMarkerAddressBind(marker, data);
//         }
//       });
//       }

//   return false;
// }


// $('#address_ad').keyup(function(){
//   var addr = $(this).val()
//   fetch('https://nominatim.openstreetmap.org/search?format=json&polygon=1&addressdetails=1&q=' + addr)
//         .then(result => result.json())
//         .then(parsedResult => {
//             setResultList(parsedResult);
//         });
// })

// const resultList = document.getElementById('addr_list');

// function setResultList(parsedResult) {
//     resultList.innerHTML = "";
//     for (const marker of currentMarkers) {
//         map.removeLayer(marker);
//     }
//    // map.flyTo(new L.LatLng(20.13847, 1.40625), 2);

//    var data="";

//     for (const result of parsedResult) {
// data+='<option value="'+result.display_name+'">'

//         const li = document.createElement('option');
//         li.setAttribute("value",result.display_name);
     
//        $('#address_ad').on('blur', (event) => {
//         console.log("result")
//           console.log(result)
//             for(const child of resultList.children) {
//                 child.classList.remove('active');
//             }
//             event.target.classList.add('active');
//             const clickedData = result;

//             console.log(clickedData.address)
//             const position = new L.LatLng(clickedData.lat, clickedData.lon);

//             for (const marker of currentMarkers) {
//         map.removeLayer(marker);
//     }
//         currentMarkers.push(new L.marker(position).addTo(map));
//             map.flyTo(position, 10);
//         })



      
//         resultList.appendChild(li);
//     }
// }

</script>
<script src="js/tags_input.js"></script>