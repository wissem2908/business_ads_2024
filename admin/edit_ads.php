
<?php
include 'includes/header.php';


$ads_id=$_GET['ads_id'];
      ?>
      <style>
        .remove_btn{
            position: absolute;
            top: -35px;
            left: 72px;
        }
      </style>
        <div class="content-body">
            <!-- row -->
            <div class="container-fluid">
                    <div class="row page-titles">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Ads</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Edit Ad</a></li>
                    </ol>
                </div>
               <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Edit ad</h4>
                                <a href="#" onclick="history.back()" type="button" class="btn btn-outline-primary">Back</a>
                            </div>
                             <form method="post" enctype="multipart/form-data" id="edit_ad">
                            <div class="card-body">
                               <input type="hidden" id="ads_id"  value="<?php echo $ads_id;  ?>" name="ads_id">
                                     <div class="row"> 
                             
                                           <div class="mb-3 col-lg-6 col-md-12">
                                           <label class="form-label">Ad Title <span  class="text-danger required">*required</span></label>
                                            <input type="text" name="ad_title" id="ad_title" class="form-control input-default " >
                                        </div>
                                        <div class="mb-3 col-lg-6 col-md-12">
                                        <label class="form-label">My Category <span class="text-danger required"  >*required</span></label>
                                           <select class="form-control input-default " name="categories" id="categories" style="-webkit-appearance: none; -moz-appearance: none; appearance: none; background-image: url('data:image/svg+xml,%3Csvg xmlns=&quot;http://www.w3.org/2000/svg&quot; width=&quot;16&quot; height=&quot;16&quot; viewBox=&quot;0 0 16 16&quot;&gt;%3Cpath fill=&quot;none&quot; stroke=&quot;%23343a40&quot; stroke-linecap=&quot;round&quot; stroke-linejoin=&quot;round&quot; stroke-width=&quot;2&quot; d=&quot;M2 6l6 6 6-6&quot;%3E%3C/path%3E%3C/svg%3E'); background-repeat: no-repeat; background-position: right 0.5rem bottom 0.5rem; padding-right: 1.5rem;">
                                            <option value="" selected>Select...</option>
                                           </select>
                                           </select>
                                        </div>

                                        <div class="mb-3 col-lg-6 col-md-12">
                                       
                                        <label class="form-label">General Category <span class="text-danger required" >*required</span></label>
                                           <select class="form-control input-default " name="general_cat" id="general_cat" style="-webkit-appearance: none; -moz-appearance: none; appearance: none; background-image: url('data:image/svg+xml,%3Csvg xmlns=&quot;http://www.w3.org/2000/svg&quot; width=&quot;16&quot; height=&quot;16&quot; viewBox=&quot;0 0 16 16&quot;&gt;%3Cpath fill=&quot;none&quot; stroke=&quot;%23343a40&quot; stroke-linecap=&quot;round&quot; stroke-linejoin=&quot;round&quot; stroke-width=&quot;2&quot; d=&quot;M2 6l6 6 6-6&quot;%3E%3C/path%3E%3C/svg%3E'); background-repeat: no-repeat; background-position: right 0.5rem bottom 0.5rem; padding-right: 1.5rem;">
                                            <option value="" selected>Select...</option>
                                           </select>
                                        </div>
                                        <div class="mb-3 col-lg-6 col-md-12">
                                        <label class="form-label">Sub Category <span class="text-danger required" >*required</span></label>
                                           <select class="form-control input-default " name="sub_categories" id="sub_categories" style="-webkit-appearance: none; -moz-appearance: none; appearance: none; background-image: url('data:image/svg+xml,%3Csvg xmlns=&quot;http://www.w3.org/2000/svg&quot; width=&quot;16&quot; height=&quot;16&quot; viewBox=&quot;0 0 16 16&quot;&gt;%3Cpath fill=&quot;none&quot; stroke=&quot;%23343a40&quot; stroke-linecap=&quot;round&quot; stroke-linejoin=&quot;round&quot; stroke-width=&quot;2&quot; d=&quot;M2 6l6 6 6-6&quot;%3E%3C/path%3E%3C/svg%3E'); background-repeat: no-repeat; background-position: right 0.5rem bottom 0.5rem; padding-right: 1.5rem;">
                                            <option value="" selected>Select...</option>
                                           </select>
                                        </div>
                                         <div class="mb-3 col-lg-6 col-md-12">
                                         <label class="form-label">State<span class="text-danger required" > *required</span></label>
                                           <select class="form-control input-default " name="state" id="state">
                                           <option value="" selected>Select...</option>
                                                <option value="ACT">Australian Capital Territory</option>
                                                <option value="NSW">New South Wales</option>
                                                <option value="NT">Northern Territory</option>
                                                <option value="QLD">Queensland </option>
                                                <option value="SA">South Australia </option>
                                                <option value="TAS">Tasmania </option>
                                                <option value="VIC">Victoria </option>
                                                <option value="WA">Western Australia  </option>
                                                <option value="australia">Australia</option>
                                           </select>
                                        </div> 
                                        <div class="mb-3 col-lg-6 col-md-12">
                                
<label class="form-label">City/Region<span class="text-small text-muted

"><i> (optional)</i></span> </label>
                                           <select class="form-control input-default " name="city" id="city" style="-webkit-appearance: none; -moz-appearance: none; appearance: none; background-image: url('data:image/svg+xml,%3Csvg xmlns=&quot;http://www.w3.org/2000/svg&quot; width=&quot;16&quot; height=&quot;16&quot; viewBox=&quot;0 0 16 16&quot;&gt;%3Cpath fill=&quot;none&quot; stroke=&quot;%23343a40&quot; stroke-linecap=&quot;round&quot; stroke-linejoin=&quot;round&quot; stroke-width=&quot;2&quot; d=&quot;M2 6l6 6 6-6&quot;%3E%3C/path%3E%3C/svg%3E'); background-repeat: no-repeat; background-position: right 0.5rem bottom 0.5rem; padding-right: 1.5rem;">
                                                
                                            <option value='' selected>Select...</option>   
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
                                        <!-- <div class="mb-3 col-lg-6 col-md-12">
                                <label class="form-label">City area</label>
                                <input type="text" name="city_area"  id="city_area" class="form-control" >
                                        </div>
                                        <div class="mb-3 col-lg-6 col-md-12">
                                <label class="form-label">Adreess</label>
                                <input list="addr_list" name="address_ad" id="address_ad" class="form-control" />
                                <datalist id="addr_list">

</datalist>
                                        </div> -->
                                        <!-- <div class="mb-3 col-lg-6 col-md-12"></div>
                                        <div class="mb-3 col-lg-12 col-md-12">
                                <label class="form-label">Location: (click on the map)</label>
                                <div id="map" style="height:300px;"></div>
<input id="latitude-input" type="hidden" name="latitude" />
<input id="longitude-input" type="hidden" name="longitude" />
                                        </div> -->
                                       <div class="col-lg-12">
                                       <label>Description <span class="text-danger required">*</span></label>
                                          <textarea name="ad_desc"  id="ad_desc">
     
    </textarea>
                                       </div>
                                    
                                      
                                       <!-- <div class="mb-3 col-lg-2 col-sm-6 col-md-8">
                                       <br>
                           <div id="image_container">
                              <p id="no_image"><span   class="btn btn-warning shadow btn-xs sharp" data-bs-toggle="tooltip" data-bs-placement="top" title="No image"><i class="fas fa-info"></i> </span> No image</p>
                              <img id="image_ad" class="rounded" width="100px" height="100px"/>
                            </div>
                                        </div> -->
                                          <div class="mb-3 col-lg-8 col-sm-6 col-md-8">
                                          <br>
                                          <label class="form-label">Image  <span class="text-small text-muted

"><i>(optional) </i></span> <br/><span class="text-small text-muted

"><i>Format: jpeg, jpg or png </i></span>  </label>
                                <input type="hidden" id="ad_image" name="ad_image" />
                                <div id="uppy"></div>
                                            <!-- <input type="file" name="image" id="image" class="form-control input-default " > -->
                                        </div>
                                         <!-- <div class="mb-3 col-lg-2 col-md-4 col-sm-6 mt-6">
                                         <br>
                                <button  class="btn btn-sm  btn-outline-primary btn-rounded-circle" style="margin-top:27px;" id="addInputImage"><i class="fa fa-plus color-info"></i></button>
                                        </div> -->

                                        
                                    </div>
                                    <div class="col-lg-12" > 
                                        <div class="row" id="ads_images"></div>
                                    </div>
                                    <!-- <div class="col-lg-12" id="image_box"> </div> -->
                                
                              <!-- <div class="col-lg-12">
                                 <div class="row">
                                   
                                          <div class="mb-3 col-lg-10  col-sm-6 col-md-8">
                                <label class="form-label">Image</label>
                                            <input type="file" name="image" id="image" class="form-control input-default " >
                                        </div>
                                         <div class="mb-3 col-lg-2 col-md-4 col-sm-6 mt-6">
                                <button class="btn  btn-outline-primary" style="margin-top:27px;"><i class="fa fa-plus color-info"></i></button>
                                        </div>
                                 </div>
                               </div>-->
                               
                              
                            </div>
                            <div class="card-footer"><button type="submit" class="btn  btn-square btn-primary">Edit ad</button></div>
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
    } ).then( editor => {
        appEditor = editor;
        appEditor.setData(data.ad_description);
    } )
    .catch( error => {
        console.error( error );
    } );

    
    </script>
<script src="./vendor/leafleft/leaflet.js"></script>
<link rel="stylesheet" href="./vendor/leafleft/leaflet.css" />
<script src="./vendor/uppy core/dist/uppy.min.js"></script>
<script type="module" src="assets/js/edit_ad.js"></script>
<script src="js/tags_input.js"></script>



<script>




  // Add click listener to map to set marker and update input fields
 
</script>