$(document).ready(function(){
var user_id=""
    var url = $(location).attr('href');
    parts = url.split("/");
    username = parts[parts.length-1];
  
   var host= window.location.hostname

var user_logo=""
    $.ajax({
        url:'assets/php/user_by_id.php',
        method:'post',
        async:false,
        data:{username:username},
        success:function(response){
           
            var data=JSON.parse(response)
            data=data.result
console.log(data)
if(data.status!='active'){
    window.location.href="404.html"
}
            if(data==false){
                window.location.href="404.html"
            }else{
                var host= window.location.hostname
                var url = $(location).attr('href');
                parts = url.split("/");
    username = parts[parts.length-1];
    $('#user_link').append('<a href="'+url+'">'+url+'</a>')
                $('#logo_url').attr('href',url)
                $('#user_url').append('<a href="'+url+'"  class="btn btn-brand" style="font-size:20px ;font-weight:bold;">'+host+'/'+username+'</a>')
                $('#business_name').text(data.business_name)
                $('#user_desc').text(data.user_desc)
                $('.user_name').text(data.business_name)
                $('#user_id').val(data.user_id)
                user_logo=data.logo

                /************************************************** */
                var lat = data.lat;
                var lng = data.lon;
var mapLink = "https://www.google.com/maps/search/?api=1&query=" + lat + "," + lng;

                    
                    $('#google_map_link').attr('href',mapLink)
                    if(data.display_marker==0){
                        $('#google_map_link').hide() 
                    }
                /***************************************************** */
                 document.title =data.business_name+" ads";
                if(data.address!=''){

                $('#address').append("<i style='font-size:25px' class='bx bxs-map'></i> &nbsp;"+data.address)
                }
                //console.log('user id'+data.user_id)

                var user_image='img/user.png'
                if(data.logo!=''){
                    user_image='admin/logo_images/'+data.logo
                }
                $('#user_img').attr('src',user_image)
                $('#company_cover').attr('src',"admin/cover_images/"+data.company_cover)


                /************************************************** */

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
$('#share_div').append('<div class="share_link"><i class="bx bxs-heart bookmark '+heartClass+'" data="'+data.user_id +'" data_type="users" ></i>&nbsp;&nbsp;&nbsp;<i class="bx bx-share-alt share_icons"></i><div class="hide"><ul class="icons"><li><a class="facebook" target="_blank" href="'+facebook_link+'"> <i class="bx bxl-facebook-circle" ></i></a></li><li><a class="twitter" target="_blank" href="'+twitter_link+'"><i class="bx bxl-twitter"></i></a></li><li><a class="linkedin" target="_blank" href="'+linkedIn_link+'"><i class="bx bxl-linkedin-square"></i></a></li><li><a class="whatsapp" target="_blank" href="'+whatsapp_link+'"><i class="bx bxl-whatsapp" ></i></a></li></ul></div></div>')
                /**************************************** call phone number**************************************************** */
             

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
              
                /****************************************************************************************** */

                ////get opening hours
 user_id=data.user_id
                $.ajax({
                    url:'assets/php/opening_hour.php',
                    async:false,
                    method:'post',
                    data:{user_id:user_id},
                    success:function(response){
                        console.log(response)
                        var data= JSON.parse(response)
                        data= data.liste
                        console.log(data)
                        var open_time=""

console.log("data length "+data.length)
                        if(data.length==0){
                            open_time=""
                            $('#hours_card').hide()
                            $('#user_card').attr('class','col-lg-12')
                        }
                        for(i=0;i<data.length;i++){
                            console.log(i)
                            open_time+=' <div class="fs-6">'+data[i].weekday+' &nbsp;'+data[i].open_hour+'  - '+data[i].close_hour+' </div>'
                        }
                        $('#open_time').append(open_time)
                    }
                })//opening hours


                /*******************/
                //categories
                $.ajax({
                    url:'assets/php/categories.php',
                    method:"post",
                    async:false,
                    data:{user_id:user_id},
                    success:function(response){
                        console.log(response)
                        var data= JSON.parse(response)
                        if(data.reponse=="true"){
                            data=data.list
                            var liste_cat=""
                            for(i=0;i<data.length;i++){
                               liste_cat+= '<a href="#"  class="list-group-item list-group-item-action category "data="'+data[i].cat_id+'">'+data[i].cat_title+'</a>'
                            }
                            $('#liste_cat').append(liste_cat)
                        }
                    }
                    
                })
            }
        }
    })//ajax

/*******************************************************/

$(document).on('click','.category',function(){

    $(this).addClass('active').siblings().removeClass('active')

    var cat_id=$(this).attr('data')
    $('#list_ads').empty()
    loadAds(cat_id)


})
    /************************************************/
function loadAds(cat_id){

    $.ajax({
        url:'assets/php/list_ads.php',
        method:"post",
        async:false,
        data:{username:username,cat_id:cat_id},
        success:function(response){
          
            var data = JSON.parse(response)
            data= data.list

           
var listAds=""
            for(i=0;i<data.length;i++){

                console.log(data[i].category_id)
var cat=data[i].cat_title
var title=data[i].ad_title

                var ad_image="img/empty.png"
                loadImages(data[i].ads_id, function(image) {
                    if(image !== "") {
                        ad_image = 'admin/ads_images/' + image;
                    }else{
                        ad_image = 'admin/logo_images/' + user_logo;
                    }
                });
                var description=""
                if(data[i].ad_description.length>200){
description=data[i].ad_description.substring(0,200)+'...'
                }else{
                    description=data[i].ad_description;
                }
listAds+='    <div class="col-lg-12 "><br><div class="card w-100  mx-auto  " ><div class="card-body"><div class="row"> <div class="col-lg-3"><a  href="'+
username+'/'+cat.replaceAll(" ","_")+'/'+title.replaceAll(" ","_")+'/'+data[i].ads_id+'" ><img src="'+ad_image+
'"  class="rounded" ></a></div> <div class="col-lg-9"> <br/><a style="text-decoration:none;" href="'+
username+'/'+cat.replaceAll(" ","_")+'/'+title.replaceAll(" ","_")+'/'+data[i].ads_id+'"><h5>'+data[i].ad_title+
'</h5></a><p>'+description+'</p> <a href="'+
username+'/'+cat.replaceAll(" ","_")+'/'+title.replaceAll(" ","_")+'/'+data[i].ads_id+'" class="btn btn-brand position-absolute bottom-0 end-0 m-2">Details</a> </div></div></div></div></div>'
            }
            $('#list_ads').append(listAds)
            
        }

    })
}

loadAds("all")



/******************************************************************************/
    $('#send_user_message').click(function(e){
        e.preventDefault()
        var fullName=$('#fullName_user').val()
        var email=$('#email_user').val()
        var message=$('#message_user').val()
        var user_id=$('#user_id').val()
        console.log(email)
        if(fullName=="" || email=="" || message=="" ){
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Enter required field',
                
              })
        }else{
            $.ajax({
                url:'assets/php/send_user_message.php',
                method:'post',
                async:false,
                data:{fullName:fullName,email:email,message:message,user_id:user_id},
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


                        $.ajax({
                            url:'assets/php/add_notification.php',
                            method:'post',
                            async:false,
                            data:{user_id:user_id,fullName:fullName},
                            success:function(res){
                                console.log(res)
                            }
                        })
                        Swal.fire({
                           
                            icon: 'success',
                            title: 'Message sent succesfully!',
                            showConfirmButton: false,
                            timer: 1500
                          })  
                    }
                }
            })
        }
    })



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




})//ready