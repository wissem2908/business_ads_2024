$(document).ready(function(){

    var one_user_id=''

    var url = $(location).attr('href'),
    parts = url.split("/"),
    username = parts[parts.length-1];
   var host= window.location.hostname


var ad_id=$('#ad_id').val()
var category=$('#category').val()
var ad_title=$('#ad_title').val()
var username=$('#username').val()
//console.log(ad_id)


var user_logo=""
    function loadAdDetails(){
$.ajax({
    url:'../../../assets/php/ads_details.php',
    method:'post',
    async:false,
    data:{ad_id:ad_id,category:category,ad_title:ad_title,username:username},
    success:function(response){
       // console.log(response)
        var data = JSON.parse(response)
console.log(data.reponse)
        // if(data.user_status!='active'){
        //     window.location.href="../../../404.html"
        // }
      
        if(data.reponse=='true'){
            data=data.result
console.log(data)
 if(data.user_status!='active'){
            window.location.href="../../../404.html"
        }
            if(data.ads_id==ad_id){
                var host= window.location.hostname
$('#logo_url').attr('href','../../../'+data.username)
             $('#user_url').append('<a href="../../../'+data.username+'"  class="btn btn-brand" style="font-size:18px ;font-weight:bold;">'+host+'/'+data.username+'</a>')
                
            document.title =data.ad_title;
            $('#business_name').text(data.business_name)
           
            one_user_id=data.user_id
            console.log(user_id)
            var user_image='../../../img/user.png'
            if(data.logo!=''){
                user_image='../../../admin/logo_images/'+data.logo
            }
            $('#user_img').attr('src',user_image)

            $('#ads_title').text(data.ad_title)
            $('#ad_desc').html(data.ad_description)
            user_logo= data.logo
            /*************************************************************** */


            var adsObj =[]
            adsObj = localStorage.getItem('users')
            
           if(adsObj!=null) adsObj = JSON.parse(adsObj)
           if(adsObj==null) adsObj=[]
                         
                           var heartClass="";
                           if(adsObj.includes(data.user_id ))
                           {
                               heartClass="heart"
                               
                           }
            const link = host+'/'+data.username
            var facebook_link = 'https://www.facebook.com/share.php?u='+link
var msg=""
            twitter_link = `http://twitter.com/share?&url=${link}&text=${msg}&hashtags=javascript,programming`;
            linkedIn_link = `https://www.linkedin.com/sharing/share-offsite/?url=${link}`;

            linkedIn_link=  'https://www.linkedin.com/sharing/share-offsite/?url=https://bizads.au/'+data.username


            whatsapp_link = `https://api.whatsapp.com/send?text=${msg}: ${link}`;
$('#share_div').append('<div class="share_link"><i class="bx bxs-heart bookmark '+heartClass+'" data="'+data.user_id +'" data_type="users" ></i>&nbsp;&nbsp;&nbsp;<i class="bx bx-share-alt share_icons"></i><div class="hide" style="left: 32px;"><ul class="icons"><li><a class="facebook" target="_blank" href="'+facebook_link+'"> <i class="bx bxl-facebook-circle" ></i></a></li><li><a class="twitter" target="_blank" href="'+twitter_link+'"><i class="bx bxl-twitter"></i></a></li><li><a class="linkedin" target="_blank" href="'+linkedIn_link+'"><i class="bx bxl-linkedin-square"></i></a></li><li><a class="whatsapp" target="_blank" href="'+whatsapp_link+'"><i class="bx bxl-whatsapp" ></i></a></li></ul></div></div>')
            /******************************************************************** */
            $('#ad_address').html('<i style="font-size:25px" class="bx bxs-map"></i>'+data.state_name+', '+data.city+', '+data.city_area+', '+data.address_ad)
 /************************ new code ************************************************ */
 var metaDesc = $('meta[name="description"]');
 var metaKeywords = $('meta[name="keywords"]');
 
 var lat = data.lat;
 var lng = data.lon;
var mapLink = "https://www.google.com/maps/search/?api=1&query=" + lat + "," + lng;

     
     $('#google_map_link').attr('href',mapLink)
     if(data.display_marker==0){
         $('#google_map_link').hide() 
     }
 metaDesc.attr('content', data.ad_description);
 metaKeywords.attr('content', data.keyword);
/*************************************************** */
if(data.whatsapp_number!='' || data.phone_number!=''){
    var options = {
        call: data.phone_number, // Call phone number
        call_color: "#129BF4", // Call button color
        whatsapp: data.whatsapp_number, // WhatsApp number
        call_to_action: "Call us", // Call to action
        button_color: "#FF6550", // Color of button
        position: "right", // Position may be 'right' or 'left'
        order: "call,whatsapp", // Order of buttons
    };
    var proto = 'https:', host = "getbutton.io", url = proto + '//static.' + host;
    var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
    s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
    var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
}
/*************************************************************************************** */    $('#user_link').append('<a href="../../../'+data.username+'">'+host+'/'+data.username+'</a>')
            $('#user_desc').text(data.user_desc)
            $('#address').html("<i style='font-size:25px' class='bx bxs-map'></i> &nbsp;"+data.address)
         
            // if(data.ad_image==""){
            //     $('#image_ads_lien').attr('href','../../../img/empty.png')
            //     $('#ad_image').attr('src','../../../img/empty.png')
            // }else{
            //     $('#image_ads_lien').attr('href','../../../admin/ads_images/'+data.ad_image)
            // $('#ad_image').attr('src','../../../admin/ads_images/'+data.ad_image)
            // }
        }else{
            //window.location.href="../../../404.html"
        }
            
        }
    }
})
    }
    loadAdDetails()

    function loadImages(){
$.ajax({
    url:'../../../assets/php/liste_images.php',
    method:'post',
    async:false,
    data:{ad_id:ad_id},
    success:function(response){
        
        var data=JSON.parse(response)
        if(data.reponse=='true'){
            data=data.list
var listImg=""

if(data.length!=0){
    $('#image_ads_lien').attr('href','../../../admin/ads_images/'+data[0].path)
    $('#ad_image').attr('src','../../../admin/ads_images/'+data[0].path)

}else{
    $('#image_ads_lien').attr('href','../../../admin/logo_images/'+user_logo)
    $('#ad_image').attr('src','../../../admin/logo_images/'+user_logo)

}
            for(i=0;i<data.length;i++){
                listImg+='  <a style="margin-right: 10px;" href="../../../admin/ads_images/'+data[i].path+'" class="fancybox mr-2" data-fancybox="gallery1">  <img src="../../../admin/ads_images/'+data[i].path+'"  style="max-width:80px;max-height: 80px;" class="rounded"  ></a>'
            }
            $('#list_images').append(listImg)
        }
    }
})
    }
    loadImages()


    $('#send_user_message').click(function(e){
        e.preventDefault()
        var fullName=$('#fullName_user').val()
        var email=$('#email_user').val()
        var message=$('#message_user').val()
        //var user_id=$('#user_id').val()
        console.log(one_user_id)
        if(fullName=="" || email=="" || message=="" ){
            console.log('error')
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Enter required field',
                
              })
        }else{
            $.ajax({
                url:'../../../assets/php/send_user_message.php',
                method:'post',
                async:false,
                data:{fullName:fullName,email:email,message:message,user_id:one_user_id},
                success:function(response){
    
                    console.log(response)
                    var data = JSON.parse(response)
                    if(data.reponse=="false" && data.message==1){
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Enter valid email format',
                            
                          })
                    }
                    else if(data.reponse=="true"){
    
    console.log('test')
                        $.ajax({
                            url:'../../../assets/php/add_notification.php',
                            method:'post',
                            async:false,
                            data:{user_id:one_user_id,fullName:fullName},
                            success:function(res){
                                console.log(res)
                            }
                        })
                        Swal.fire({
                           
                            icon: 'success',
                            title: 'Message sent succesfully',
                            showConfirmButton: false,
                            timer: 1500
                          })  
                    }
                }
            })
        }
    })
})

