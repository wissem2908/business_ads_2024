$(document).ready(function(){

var location = $('#location').val()
var cat = $('#cat').val();




$.ajax({
url:'assets/php/filtered_list_ads.php',
method:'post',
async:false,
data:{location:location,cat:cat},
success:function(response){
    console.log(response)
    var data = JSON.parse(response)
         
    data=data.list

    var list_ads = '';
    for(i=0;i<data.length;i++){
        var cat=data[i].cat_title
var title=data[i].ad_title

                var ad_image="img/empty.png"
                if(data[i].ad_image!=''){
                    ad_image='admin/ads_images/'+data[i].ad_image
                }
                var description=""
                if(data[i].ad_description.length>200){
description=data[i].ad_description.substring(0,200)+'...'
                }
                var username=data[i].username
        list_ads+=' <div class="col-lg-12 "><br><div class="card w-100  mx-auto  " ><div class="card-body"><div class="row"> <div class="col-lg-3"><a  href="'+
        username+'/'+cat.replaceAll(" ","_")+'/'+title.replaceAll(" ","_")+'/'+data[i].ads_id+'" ><img src="'+ad_image+
        '"  class="rounded" ></a></div> <div class="col-lg-9"> <a style="text-decoration:none;" href="'+
        username+'/'+cat.replaceAll(" ","_")+'/'+title.replaceAll(" ","_")+'/'+data[i].ads_id+'"><h5>'+data[i].ad_title+
        '</h5></a><p>'+description+'</p> <a href="'+
        username+'/'+cat.replaceAll(" ","_")+'/'+title.replaceAll(" ","_")+'/'+data[i].ads_id+'" class="btn btn-brand position-absolute bottom-0 end-0 m-2">Details</a> </div></div></div></div></div>'
    }
    $('#list_ads').append(list_ads)
}

})

/********************************************************************************************************* */

    /*********************************************************************** */

    //list location 
    $.ajax({
        url:'./assets/php/list_location.php',
        async:false,
        method:'post',
        success:function(response){
            console.log(response)
            var data = JSON.parse(response)
            console.log(data)
            data=data.list
            var list_location=''
            var cat = $('#cat').val()
            for(i=0;i<data.length;i++){
             
                var active ='';
                if(location==data[i].state_code){active="activeClass"}
                list_location+=' <li class="list-group-item "><a class=" '+active+'" href="ads.php?location='+data[i].state_code+'&cat='+cat+'" data="all" aria-current="true"> <i class="bx bxs-navigation" ></i> '+data[i].state_name+' ('+data[i].state_count+') </a></li>';
            }
            $('#list_location').append(list_location)
        }
    })

    /*************************************************************************** */

    //list categories

    $.ajax({
        url:'./assets/php/list_general_categories.php',
        async:false,
        method:'post',
        success:function(response){
          
            var data = JSON.parse(response)
         var location=$('#location').val()
            data=data.list
            var list_general_cat=''
            for(i=0;i<data.length;i++){
                var active ='';
                if(cat==data[i].id_gen_cat){active="activeClass"}
                list_general_cat+=' <li class="list-group-item"><a class="'+active+'" href="ads.php?cat='+data[i].id_gen_cat+'&location='+location+'" data="all" aria-current="true">  '+data[i].title_cat+' </a></li>';
            }
            $('#list_general_cat').append(list_general_cat)
        }
    })

})