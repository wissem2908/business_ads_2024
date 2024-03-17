$(document).ready(function(){



/****************************************************************************************************** */
    function countNotification(){
        $.ajax({
            url:'assets/php/count_notification.php',
            method:'post',
            async:false,
            success:function(response){
                console.log(response)


                var data = JSON.parse(response)
                if(data.reponse=="true"){

                    if(data.count_notification==0){
                        $('#count_notification').css('display','none')
                    }else{
                        $('#count_notification').text(data.count_notification)
                    }
                 
                }
            }
        })
    }

    countNotification()





    /******************************************************************************************** */


    function changeStatus(){

        $.ajax({
            url:'assets/php/change_notification_status.php',
            method:'post',
            async:false,
            success:function(response){
                console.log(response)
            }
        })
    }




    $("body").on('click','.notification_dropdown a svg path',function(){
        alert('ok')
        changeStatus()
        countNotification()
    })
  
    $('#changeStaus').click(function(){
        changeStatus()
        countNotification()
    })
  

    /*********************************************************************************************** */

    function listNotification(){
        $.ajax({
            url:'assets/php/list_notification.php',
            method:'post',
            async:false,
            success:function(response){
                console.log(response)
                var data = JSON.parse(response)
                if(data.reponse=="true"){
                    data = data.list
                    var listNotif=""
                    if(data.length<=6){

                        for(i=0;i<data.length;i++){
                            listNotif+='<li><div class="timeline-panel"><div class="media me-2"><i class="fa fa-home"></i> </div> <div class="media-body"><h6 class="mb-1">'+data[i].notification+'</h6><small class="d-block">'+data[i].date_creation+'</small></div></div></li>'
                        }
                       
                    }else{
                        for(i=0;i<=6;i++){
                            listNotif+='<li><div class="timeline-panel"><div class="media me-2"><i class="fa fa-home"></i> </div> <div class="media-body"><h6 class="mb-1">'+data[i].notification+'</h6><small class="d-block">'+data[i].date_creation+'</small></div></div></li>'
                        }

                    }
                    $('#listNotif').append(listNotif)
                }
            }
        })
    }

    listNotification()


    function showNotification(){
        $.ajax({
            url:'assets/php/list_notification.php',
            method:'post',
            async:false,
            success:function(response){
                console.log(response)
                var data = JSON.parse(response)
                if(data.reponse=="true"){
                    data = data.list
                    var listNotif=""
                   
                        for(i=0;i<data.length;i++){
                            listNotif+='<div class="alert alert-primary alert-dismissible fade show text-dark" role="alert">'+data[i].notification+'<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button><span class="float-end me-4">'+data[i].date_creation+'</span></div>'
                        }

                  
                    $('#showNotif').append(listNotif)
                }
            }
        })
    }

    showNotification()
})