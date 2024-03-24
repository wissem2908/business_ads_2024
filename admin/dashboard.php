﻿
      <?php
include 'includes/header.php';
session_start();
      ?>
        <div class="content-body">
            <!-- row -->
			<div class="container-fluid">
          <div class="row page-titles">
                    <ol class="breadcrumb">
                        
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Dashboard</a></li>
                    </ol>
                </div>
                <?php if($_SESSION['role']=="admin"){ ?>
                  <div class="row page-titles">
                    <ol class="breadcrumb">
                        
                        <li class="breadcrumb-item active"><p></p><div class="form-check form-switch">
  <input class="form-check-input" type="checkbox" id="maintenanceCheck">
  <label class="form-check-label" for="maintenanceCheck">Display Maintenance</label>
</div></li>
                    </ol>
                </div>
				<div class="row">
                  <div class="col-lg-12">
                    <div class="row">





                  <div class="col-xl-4 col-lg-4 col-sm-12">
                <div class="card bg-primary">
                  <div class="card-body">
                    <div class="row">
                      
                      <div class="col-lg-8">
                        <h3>Total Clients</h3>
                       
                      </div>
                      <div class="col-lg-4 d-flex justify-content-center"> <h1 id="totalUser"></h1></div>
                    </div>
                  </div>
                </div>
              </div>    
                     <div class="col-xl-4 col-lg-4 col-sm-12">
                <div class="card bg-success">
                  <div class="card-body">
                    <div class="row">
                      
                      <div class="col-lg-8">
                        <h3>Active Clients </h3>
                       
                      </div>
                      <div class="col-lg-4 d-flex justify-content-center"> <h1 id="activeUser"></h1></div>
                    </div>
                  </div>
                </div>
              </div>   
                  </div>
                  <div class="row">
              <div class="col-xl-4 col-lg-4 col-sm-12">
                <div class="card bg-primary">
                  <div class="card-body">
                    <div class="row">
                      
                      <div class="col-lg-8">
                        <h3>Total Ads</h3>
                       
                      </div>
                      <div class="col-lg-4 d-flex justify-content-center"> <h1 id="totalAdsAdmin"></h1></div>
                    </div>
                  </div>
                </div>
              </div>    
                     <div class="col-xl-4 col-lg-4 col-sm-12">
                <div class="card bg-success">
                  <div class="card-body">
                    <div class="row">
                      
                      <div class="col-lg-8">
                        <h3>Active Ads </h3>
                       
                      </div>
                      <div class="col-lg-4 d-flex justify-content-center"> <h1 id="activeAdsAdmin"></h1></div>
                    </div>
                  </div>
                </div>
              </div>   
                   <!-- <div class="col-xl-4 col-lg-4 col-sm-12">
                <div class="card bg-danger text-white">
                  <div class="card-body">
                    <div class="row">
                      
                      <div class="col-lg-8">
                        <h3>Inactive Clients </h3>
                       
                      </div>
                      <div class="col-lg-4 d-flex justify-content-center"> <h1 id="inactiveUser"></h1></div>
                    </div>
                  </div>
                </div>
              </div>    -->
                     
                  </div>
                    </div>

                      <div class="row">
             <div class="col-lg-8">
              
                <div class="card">
                  <div class="card-body">
                     <div ><canvas id="users"></canvas></div>
                  </div>
                </div>
              
               
             </div>
           </div>
           <?php } ?>
           <?php if($_SESSION['role']=="user"){ ?>
           <div class="row">
                  
              <div class="col-xl-4 col-lg-4 col-sm-12">
                <div class="card bg-primary">
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
                        <h3>Active Ads </h3>
                       
                      </div>
                      <div class="col-lg-4 d-flex justify-content-center"> <h1 id="activeAds"></h1></div>
                    </div>
                  </div>
                </div>
              </div>   
                   <div class="col-xl-4 col-lg-4 col-sm-12">
                <div class="card bg-danger text-white">
                  <div class="card-body">
                    <div class="row">
                      
                      <div class="col-lg-8">
                        <h3>Inactive Ads </h3>
                       
                      </div>
                      <div class="col-lg-4 d-flex justify-content-center"> <h1 id="inactiveAds"></h1></div>
                    </div>
                  </div>
                </div>
              </div>   
                     
                 
                    </div>
                    <?php } ?>
            </div>

         
        </div>
        
       
        
        </div>
        </div>
       <?php
     
include 'includes/footer.php';
      ?>


      <script src="assets/js/statistique.js"></script>


      <script>

$(document).ready(function(){

function getMaintenanceStatus(){
  $.ajax({
      url:'./assets/php/maintenance.php',
      method:'post',
      async:false,
      data:{action:'get'},
      success:function(response){
        console.log(response)

        var val = JSON.parse(response)
        data = val.data.value
        console.log(data)
       if(data=="true"){
        $("#maintenanceCheck").prop("checked", true);
       }
         
        
      
      }
    })
}

getMaintenanceStatus()
  $('#maintenanceCheck').change(function(){
    // Check if the checkbox is checked
    var value=false
    if ($(this).prop("checked")) {
        // Checkbox is checked, perform desired action
        console.log("Maintenance checkbox is checked");
        value=true
        // You can do further processing here
    } else {
        // Checkbox is not checked
        console.log("Maintenance checkbox is not checked");
        // You can do further processing here
        value=false
    }
    console.log(value)


    $.ajax({
      url:'./assets/php/maintenance.php',
      method:'post',
      async:false,
      data:{value:value,action:'change'},
      success:function(response){
        console.log(response)
      }
    })
  })
})


      </script>