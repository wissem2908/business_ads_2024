<?php
include ('includes/header_1.php');
?>

<style>
.latest_ads{
 
    padding: 32px;
    background-color: #fff;
    box-shadow: var(--shadow);
}
.heart{
  color:red;
}

#pagination-container,#pagination-container_ads{
  padding:0;
  list-style:none;
  text-align:center;
  margin-left: 10px;
  display: inline-flex;

}#pagination-container li{
  display: inline-block !important;
  margin:2px;
}
#pagination-container  a, #pagination-container  span ,#pagination-container_ads a,#pagination-container_ads span{
  display: inline-block !important;
  margin:2px;

  width:40px;
  height: 40px;
  line-height: 40px;
  text-align: center;
  background-color: #fff;
  text-decoration: none;
  color:#252525;
  border-radius:4px;
  margin:5px;
  box-shadow:inset 0 5px;
}
#pagination-container .current , #pagination-container_ads .current{
  color: #fff;
  background-color: #000;
  border-color:rgb(255,255,255);
  border:1px solid;
  cursor:pointer;
}
#pagination-container .prev.current ,#pagination-container_ads .prev.current{
  background:#222;
  border:none;
}
    </style>

<link rel="stylesheet" href="css/index.css" />
    <section id="" class="text-center">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="intro">
                        
                        <h1>Advertisers</h1>
                        <!-- <a target='_blank' href="map.php">See ads on Map</a> -->
                    </div>
                </div>
            </div>
            <style>
                .nav-tabs .nav-item{
                    width:50%;
                }
                .nav-tabs .nav-item .nav-link{
                  
                    width:100%;
                    color:#000;
                    font-size:20px;
                }.nav-tabs .nav-item .nav-link.active{
                    background:#ffdf00;
                }
                .tab-content{
                  
                  
                    color:#000;
                    font-size:20px;
                }
                .tab-content .form-control{
                   /* background:transparent;*/
                }
                .tab-content .search{
                    background:#ffdf00;
                    padding: 10px;
                }
            </style>
            <div class="row">
                <div class="col-lg-12">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Find Businesses</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Find Ads</button>
  </li>

</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

  <!-- search  and -->
<div class="search">
      <!-- search   -->
    <div class="mb-3 ">
        <input type="text" class="form-control" id="search_advertisers" placeholder="Search">
    </div>
    <div class="input-group">
  
  <select aria-label="First name" class="form-select state">
    <option disabled selected>Select State</option>
    <option value="ACT">Australian Capital Territory</option>
                                                <option value="NSW">New South Wales</option>
                                                <option value="NT">Northern Territory</option>
                                                <option value="QLD">Queensland </option>
                                                <option value="SA">South Australia </option>
                                                <option value="TAS">Tasmania </option>
                                                <option value="VIC">Victoria </option>
                                                <option value="WA">Western Australia  </option>
  </select>
  <select aria-label="First name" class="form-select city">
    <option disabled selected >Select City/Region</option>
  </select>
  <select aria-label="First name" class="form-select general_cat">
    <option disabled selected>Select Category</option>
  </select>
  <select aria-label="First name" class="form-select sub_categories">
    <option disabled selected>Select Sub Category</option>
  </select>
 
</div>
</div>
  <!-- list Ads -->
            <div class="row g-4" id="list_advertiser">
            </div>
            <div id='pagination-container'></div>
  </div>
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
    
  <!-- search  and -->
<div class="search">
      <!-- search   -->
    <div class="mb-3 ">
        <input type="text" class="form-control" id="search_ads" placeholder="Search">
    </div>
    <div class="input-group">
  
  <select aria-label="First name" class="form-select state_ad">
  <option disabled selected>Select State</option>
    <option value="ACT">Australian Capital Territory</option>
                                                <option value="NSW">New South Wales</option>
                                                <option value="NT">Northern Territory</option>
                                                <option value="QLD">Queensland </option>
                                                <option value="SA">South Australia </option>
                                                <option value="TAS">Tasmania </option>
                                                <option value="VIC">Victoria </option>
                                                <option value="WA">Western Australia  </option>
  </select>
  <select aria-label="First name" class="form-select city_ad">
    <option disabled selected >Select City/Region</option>
  </select>
  <select aria-label="First name" class="form-select general_cat_ad">
    <option disabled selected>Select Category</option>
  </select>
  <select aria-label="First name" class="form-select sub_categories_ad">
    <option disabled selected>Select Sub Category</option>
  </select>
 
</div>
</div>
  <!-- list Ads -->
            <div class="row g-4" id="list_ads">
            </div>
            <div id="pagination-container_ads"></div>
  </div>

    </div>
</div>
                
            </div>
         
           
          
         
            </div>
    </section>

  



<?php
include ('includes/footer_1.php');
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/simplePagination.js/1.4/jquery.simplePagination.min.js" ></script>
<script src="./assets/js/advertisers.js"></script>

<script>
    $(document).ready(function(){
        $('.hide').hide();
    $(document).on('click', '.share_icons', function(){
      $(this).siblings('.hide').toggle();
    });


    $(document).on('click', '.bookmark', function(){
      $(this).toggleClass('heart')
      
      var data_type = $(this).attr('data_type')
        var id = $(this).attr('data')
      if(data_type=="ads"){

   
      if($(this).hasClass('heart')){


        var adsArray = localStorage.getItem("ads");
      
        
if(adsArray==null){
  adsArray=[];
  adsArray.push(id)
  adsArray = JSON.stringify(adsArray);
}else{
  var adsArray = JSON.parse(adsArray);
  if(!adsArray.includes(id)){
    adsArray.push(id)
  adsArray = JSON.stringify(adsArray);
  }

}
localStorage.setItem("ads",adsArray);

      
      }else{
        var adsArray = localStorage.getItem("ads");
        var adsArray = JSON.parse(adsArray);

       
        var id = $(this).attr('data').toString();
        const index = adsArray.indexOf(id);
if (index > -1) { 
  adsArray.splice(index, 1); 
  adsArray = JSON.stringify(adsArray);
  localStorage.setItem("ads",adsArray);
}
      }
    }else if(data_type=="users"){

        
      if($(this).hasClass('heart')){


var adsArray = localStorage.getItem("users");


if(adsArray==null){
adsArray=[];
adsArray.push(id)
adsArray = JSON.stringify(adsArray);
}else{
var adsArray = JSON.parse(adsArray);
if(!adsArray.includes(id)){
adsArray.push(id)
adsArray = JSON.stringify(adsArray);
}

}
localStorage.setItem("users",adsArray);


}else{
var adsArray = localStorage.getItem("users");
var adsArray = JSON.parse(adsArray);


var id = $(this).attr('data').toString();
const index = adsArray.indexOf(id);
if (index > -1) { 
adsArray.splice(index, 1); 
adsArray = JSON.stringify(adsArray);
localStorage.setItem("users",adsArray);
}
}

    }

    });
    })
</script>

<script>
 $(document).ready(function() {
  var items = $('.users_items');
  var numItems = items.length;
  var perPage = 9;
  items.slice(perPage).hide();

  $('#pagination-container').pagination({
    items: numItems,
    itemsOnPage: perPage,
    prevText: "<",
    nextText: ">",
    onPageClick: function(pageNumber) {
      var showFrom = perPage * (pageNumber - 1);
      var showTo = showFrom + perPage;
      items.hide().slice(showFrom, showTo).show();
    }
  });



  var items_ads = $('.ads_items');
  var numItems_ads = items_ads.length;
  var perPage_ads = 9;
  items_ads.slice(perPage_ads).hide();

  $('#pagination-container_ads').pagination({
    items: numItems_ads,
    itemsOnPage: perPage,
    prevText: "<",
    nextText: ">",
    onPageClick: function(pageNumber) {
      var showFrom = perPage_ads * (pageNumber - 1);
      var showTo = showFrom + perPage_ads;
      items_ads.hide().slice(showFrom, showTo).show();
    }
  });
});
</script>