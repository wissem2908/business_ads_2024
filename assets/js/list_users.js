$(document).ready(function(){
    var search="";

    var host= window.location.hostname
    $('#search').keyup(function(){

        search=$(this).val()
        $('#users').empty()
        loadUsers(search)

            
    })


    function loadUsers(search){
        var url      =""; 
        $.ajax({
            url:'assets/php/list_users.php',
            method:'post',
            async:false,
            data:{search:search},
            success:function(response){
               
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
                        const link = host+'/'+data[i].username
                 
                        listUsers+='<div class="users col-lg-4 col-md-6"><div class="service"><a href="'+url+''+data[i].username+'"><img src="'+user_image+'" class="rounded-circle" alt=""></a><p class="text-break" style="font-size:20px;" >'+data[i].business_name+'</p><a href="'+url+''+data[i].username+'" class="btn btn-sm btn-brand" style="width:100%;"><h3 ><b class="text-wrap" style="">'+host+'/'+data[i].username+'</b></h3></a> </div>  </div>'



                    }
                    
                    $('.users').css('display','block !important')
                    $('#users').append(listUsers)
                }
            }
        })
    }

    loadUsers(search)


})