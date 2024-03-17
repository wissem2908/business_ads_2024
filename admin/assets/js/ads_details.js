$(document).ready(function(){


    var url = $(location).attr('href'),
    parts = url.split("/"),
    username = parts[parts.length-1];
   var host= window.location.hostname


var ad_id=$('#ad_id').val()
//console.log(ad_id)
    function loadAdDetails(){
$.ajax({
    url:'../assets/php/ads_details.php',
    method:'post',
    async:false,
    data:{ad_id:ad_id},
    success:function(response){
       // console.log(response)
        var data = JSON.parse(response)
        if(data.reponse=='true'){
            data=data.result

             $('#user_url').append('<a href="../'+data.username+'"  class="btn btn-brand" style="font-size:18px ;font-weight:bold;">'+host+'/'+data.username+'</a>')
                
            document.title =data.ad_title;
            $('#business_name').text(data.business_name)
           

            var user_image='img/user.png'
            if(data.logo!=''){
                user_image='../admin/logo_images/'+data.logo
            }
            $('#user_img').attr('src',user_image)

            $('#ads_title').text(data.ad_title)
            $('#ad_desc').html(data.ad_description)

            $('#ad_image').attr('src','../admin/ads_images/'+data.ad_image)
            
        }
    }
})
    }
    loadAdDetails()

    function loadImages(){
$.ajax({
    url:'../assets/php/liste_images.php',
    method:'post',
    async:false,
    data:{ad_id:ad_id},
    success:function(response){
        console.log(response)
        var data=JSON.parse(response)
        if(data.reponse=='true'){
            data=data.list
var listImg=""
            for(i=0;i<data.length;i++){
                listImg+='  <a style="margin-right: 10px;" href="../admin/ads_images/'+data[i].path+'" class="fancybox mr-2" data-fancybox="gallery1">  <img src="../admin/ads_images/'+data[i].path+'"  style="max-width:80px;max-height: 80px;" class="rounded"  ></a>'
            }
            $('#list_images').append(listImg)
        }
    }
})
    }
    loadImages()
})