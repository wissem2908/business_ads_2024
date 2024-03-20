var search="";
var state="";
var city="";
var general_cat="";
var sub_categories="";
var host= window.location.hostname
$('#search_advertisers').keyup(function(){

    search=$(this).val()
    $('#list_advertiser').empty()
    loadUsers(search,state,city,general_cat,sub_categories)

        
})

$('#search_ads').keyup(function(){

    search=$(this).val()
   console.log(search)
    $('#list_ads').empty()
    loadAds(search,state,city,general_cat,sub_categories)

        
})


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
                  
                    listUsers+='<div class=" users_items users col-lg-4 col-md-6"><div class="service"><a href="'+url+''+data[i].username+'"><img src="'+user_image+'" class="" alt=""></a><p style="font-size:20px;" >'+data[i].business_name+'</p><a href="'+url+''+data[i].username+'" class="btn btn-sm btn-brand"><h3><b style="font-size:20px; font-weight:700;">'+host+'/'+data[i].username+'</b></h3></a> </div>  </div>'
                }
              
                $('.users').css('display','block !important')
                $('#list_advertiser').empty()
                $('#list_advertiser').append(listUsers)
            }
        }
    })
}

loadUsers(search,state,city,general_cat,sub_categories)






/**********************************  list state   ********************************* */

/**********************************  list city   ********************************** */
$(document).on('change','.state , .state_ad',function(){
    var state = $(this).val()
   
    
    $.ajax({
      url:'admin/assets/php/list_cities.php',
      method:'post',
      async:false,
      data:{state:state},
      success:function(response){
        console.log(response)
        var data= JSON.parse(response)
        data = data.list
        var list_cities='<option disabled selected>Select City...</option><option></option>'

        for (i=0;i<data.length;i++){
          list_cities+='<option value="'+data[i].id_city+'">'+data[i].city+' </option>'

        }
        $('.city').empty();

        $('.city').append(list_cities);

        $('.city_ad').empty();
        
        $('.city_ad').append(list_cities);
      }
    })
   })
/**********************************  list category   ****************************** */
function loadCat(){

    $.ajax({
        url:'admin/assets/php/list_general_cat.php',
        method:'post',
        async:false,
        
        success:function(response){
            console.log(response)
            var data = JSON.parse(response)
            if(data.reponse=='true'){
                data=data.list
                var cat_list=" <option disabled selected>Select Category</option><option></option>"
                for(i=0;i<data.length;i++){
                    cat_list+='<option value="'+
                    data[i]["id_gen_cat"]+
                    '">'+data[i].title_cat+'</option>'
                }
                $('.general_cat , .general_cat_ad').empty()
                $('.general_cat , .general_cat_ad').append(cat_list)
            }
        }
    })
  }
  loadCat()

  /************************ sub category ************************* */
  $(document).on('change','.general_cat , .general_cat_ad',function(){
    var gen_cat_id = $(this).val()
    console.log(gen_cat_id)
  
    $.ajax({
      url:'admin/assets/php/list_sub_cat.php',
      method:'post',
      async:false,
      data:{cat_id:gen_cat_id},
      success:function(response){
          console.log(response)
          var data = JSON.parse(response)
          if(data.reponse=='true'){
              data=data.list
              var cat_list="<option disabled  selected>Select Sub Categroy</option><option></option>"
              for(i=0;i<data.length;i++){
                  cat_list+='<option value="'+
                  data[i]["id_sub_cat"]+
                  '">'+data[i].sub_cat_title+'</option>'
              }
              $('.sub_categories').empty()
              $('.sub_categories').append(cat_list)
              $('.sub_categories_ad').empty()
              $('.sub_categories_ad').append(cat_list)
          }
      }
  })
  })

  /********************************* filter by state , cat, sity ,subcat************************************** */
  $(document).on('change', '.state, .city, .general_cat, .sub_categories', function() {

    state = $('.state').val();
    console.log(state)
    city = $('.city').val();
    general_cat = $('.general_cat').val();
    sub_categories = $('.sub_categories').val();
    $('#list_ads').empty()
    $('#list_advertiser').empty()
    loadAds(search,state,city,general_cat,sub_categories)
    loadUsers(search,state,city,general_cat,sub_categories)
    // code to handle change event for classes .class1, .class2, and .class3
  });

  /*************************************************************************************************** */

  $(document).on('change', '.state_ad, .city_ad, .general_cat_ad, .sub_categories_ad', function() {

    state = $('.state_ad').val();
    console.log(state)
    city = $('.city_ad').val();
    general_cat = $('.general_cat_ad').val();
    sub_categories = $('.sub_categories_ad').val();
    $('#list_ads').empty()
    $('#list_advertiser').empty()
    loadAds(search,state,city,general_cat,sub_categories)
    loadUsers(search,state,city,general_cat,sub_categories)
    // code to handle change event for classes .class1, .class2, and .class3
  });

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
for(i=0;i<data.length;i++){
    var ad_image="img/empty.png"

    loadImages(data[i].ads_id, function(image) {
        if(image !== "") {
            ad_image = 'admin/ads_images/' + image;
        }else{
            ad_image = 'admin/logo_images/' +data[i].logo
        }
    });
    var cat=data[i].cat_title
var title=data[i].ad_title


var heartClass="";
if(adsObj.includes(data[i].ads_id))
{
    heartClass="heart"
    
}




listAds+=' <div class="ads_items col-lg-4 col-md-6"><div class=" service"><a target="_blank"  href="'+
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
function loadImages(ad_id, callback){
    console.log(ad_id)
    $.ajax({
        url:'./assets/php/liste_images.php',
        method:'post',
        async:false,
        data:{ad_id:ad_id},
        success:function(response){
            
            var data=JSON.parse(response)
            if(data.reponse=='true'){
                console.log(data)
                data=data.list
                if(data.length!=0){
                    callback(data[0].path);
                }else {
                    callback("");
                }
                   
     
            }else {
                callback("");
            }
        }
    })
        }