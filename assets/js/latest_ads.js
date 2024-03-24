$(document).ready(function(){

    function loadImages(ad_id, callback){
      
        $.ajax({
            url:'./assets/php/liste_images.php',
            method:'post',
            async:false,
            data:{ad_id:ad_id},
            success:function(response){
                var data=JSON.parse(response)
                if(data.reponse=='true'){
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

    $.ajax({
        url:'./assets/php/latest_ads.php',
        method:'post',
        async:false,
        success:function(response){
            var data = JSON.parse(response)
            data = data.list
          console.log(data)
            var latest_ads=""

            var adsObj =[]
 adsObj = localStorage.getItem('ads')
 
if(adsObj!=null) adsObj = JSON.parse(adsObj)
if(adsObj==null) adsObj=[]
            for(i=0;i<data.length;i++){
                
var heartClass="";
if(adsObj.includes(data[i].ads_id))
{
    heartClass="heart"
    
}

                var ad_image="img/empty.png"
                loadImages(data[i].ads_id, function(image) {
                    if(image !== "") {
                        ad_image = 'admin/ads_images/' + image;
                    }else{
                        console.log(data[i].logo)
                        ad_image = 'admin/logo_images/' + data[i].logo;
                    }
                });
                // if(data[i].ad_image!=''){
                //     ad_image='admin/ads_images/'+data[i].ad_image
                // }
                var cat=data[i].cat_title
    var title=data[i].ad_title
    var host= window.location.hostname
    
                latest_ads+=' <div class=" col-lg-3 col-md-6"><div class=" service"><a target="_blank"  href="'+
                data[i].username+'/'+cat.replaceAll(" ","_")+'/'+title.replaceAll(" ","_")+'/'+data[i].ads_id+'" ><img src="'+ad_image+
                '"  class="rounded" ></a><p style="font-size:20px;" >'+data[i].ad_title+
                '</p><a  href="'+
                data[i].username+'/'+cat.replaceAll(" ","_")+'/'+title.replaceAll(" ","_")+'/'+data[i].ads_id+'" class="btn btn-sm btn-brand"><h3><b  style="font-size:20px; font-weight:700;">Details</b></h3></a> </div>  </div>'
            }
            $('#latest_ads').append(latest_ads)
        }
    })
    $('.hide').hide();







   
})