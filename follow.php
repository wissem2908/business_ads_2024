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
    </style>

<link rel="stylesheet" href="css/index.css" />
    <section id="" class="text-center">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="intro">
                        
                        <h1>Following</h1>
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
    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Businesses</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false"> Ads</button>
  </li>

</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

  <!-- search  and -->

  <!-- list Ads -->
            <div class="row g-4" id="list_advertiser">
            </div>
  </div>
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
    
  <!-- search  and -->

  <!-- list Ads -->
            <div class="row g-4" id="list_ads">
            </div>
  </div>

    </div>
</div>
                
            </div>
         
           
          
         
            </div>
    </section>

  



<?php
include ('includes/footer_1.php');
?>

<script src="./assets/js/advertisers.js"></script>

<script>
    $(document).ready(function(){
        $('.hide').hide();
    $(document).on('click', '.share_icons', function(){
      $(this).siblings('.hide').toggle();
    });



    })
</script>



<script>

var search="";
var state="";
var city="";
var general_cat="";
var sub_categories="";
var host= window.location.hostname



function loadUsers(search){
    var url      =""; 
    var host= window.location.hostname

    $.ajax({
        url:'assets/php/list_advertisers.php',
        method:'post',
        async:false,
        data:{search:search,state:state,city:city,general_cat:general_cat,sub_categories:sub_categories},
        success:function(response){
          console.log(response)
            var data = JSON.parse(response)
            data = data.list
            var listUsers=""
            if(data.length==0){
                listUsers+='Data not found'
            }else{

                var adsObj =[]
 adsObj = localStorage.getItem('users')
 
if(adsObj!=null) adsObj = JSON.parse(adsObj)
if(adsObj==null) adsObj=[]

console.log(data)

 data = $.grep(data, function(obj) {
  return adsObj.includes(obj.user_id);
});
               for(i=0;i<data.length;i++){
                var heartClass="";
                if(adsObj.includes(data[i].user_id ))
                {
                    heartClass="heart"
                    
                }

                    var user_image = 'img/user.png';
                    if(data[i].logo!=''){
                        user_image='admin/logo_images/'+data[i].logo
                    }
                    const link = host+'/'+data[i].username
                    var facebook_link = 'https://www.facebook.com/share.php?u='+link
var msg=""
                    twitter_link = `http://twitter.com/share?&url=${link}&text=${msg}&hashtags=javascript,programming`;
                    linkedIn_link = `https://www.linkedin.com/sharing/share-offsite/?url=${link}`;

                    linkedIn_link=  'https://www.linkedin.com/sharing/share-offsite/?url=https://bizads.au/'+data[i].username
                    whatsapp_link = `https://api.whatsapp.com/send?text=${msg}: ${link}`;
                    listUsers+='<div class="users col-lg-4 col-md-6"><div class="service"><a href="'+url+''+data[i].username+'"><img src="'+user_image+'" class="rounded-circle" alt=""></a><p style="font-size:20px;" >'+data[i].business_name+'</p><a href="'+url+''+data[i].username+'" class="btn btn-sm btn-brand"><h3><b style="font-size:20px; font-weight:700;">'+host+'/'+data[i].username+'</b></h3></a> </div>  </div>'
                }
              
                $('.users').css('display','block !important')
                $('#list_advertiser').empty()
                $('#list_advertiser').append(listUsers)
            }
        }
    })
}

loadUsers(search,state,city,general_cat,sub_categories)









  /*******************************************  List aDS ********************************************* */

  function loadAds(search,state,city,general_cat,sub_categories){

    $.ajax({
        url:'assets/php/filtered_ads.php',
        method:"post",
        async:false,
        data:{search,state,city,general_cat,sub_categories},
        success:function(response){
          
            var data = JSON.parse(response)
            data= data.list

           
var listAds=""

var adsObj =[]
 adsObj = localStorage.getItem('ads')
 
if(adsObj!=null) adsObj = JSON.parse(adsObj)
if(adsObj==null) adsObj=[]

data = $.grep(data, function(obj) {
  return adsObj.includes(obj.ads_id);
});
for(i=0;i<data.length;i++){
    var ad_image="img/empty.png"
    if(data[i].ad_image!=''){
        ad_image='admin/ads_images/'+data[i].ad_image
    }
    var cat=data[i].cat_title
var title=data[i].ad_title


var heartClass="";
if(adsObj.includes(data[i].ads_id))
{
    heartClass="heart"
    
}



listAds+=' <div class=" col-lg-4 col-md-6"><div class=" service"><a target="_blank"  href="'+
    data[i].username+'/'+cat.replaceAll(" ","_")+'/'+title.replaceAll(" ","_")+'/'+data[i].ads_id+'" ><img src="'+ad_image+
    '"  class="rounded" ></a><p style="font-size:20px;" >'+data[i].ad_title+
    '</p><a  href="'+
    data[i].username+'/'+cat.replaceAll(" ","_")+'/'+title.replaceAll(" ","_")+'/'+data[i].ads_id+'" class="btn btn-sm btn-brand"><h3><b  style="font-size:20px; font-weight:700;">Details</b></h3></a> </div>  </div>'
}
$('#list_ads').empty()
            $('#list_ads').append(listAds)
            
        }

    })
}
loadAds(search,state,city,general_cat,sub_categories)

</script>