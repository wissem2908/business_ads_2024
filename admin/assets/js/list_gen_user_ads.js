$(document).ready(function(){


    var user_id=$('#user_id').val()
    
        function loadAds(){
    
            $.ajax({
                url:"assets/php/list_gen_user_ads.php",
                method:'post',
                async:false,
                data:{user_id:user_id},
                success:function(response){
                    console.log(response)
                    var data = JSON.parse(response)
                    data = data.list
                    var list=""
                    for(i=0;i<data.length;i++){
                        var description=""
                        if(data[i].ad_description.length>25){
                            description=data[i].ad_description.substring(0,25)+'...'
                                                }else{
                                                    description=data[i].ad_description
                                                }
                        var status=""
                    if(data[i]['status']=="active"){
                        status = '<a href="#" id="inactive"  data="'+data[i]["ads_id"]+'"><span class="badge light badge-success">Active</span></a>'
                    }else{
                        status ='<a href="#" id="active"  data="'+data[i]["ads_id"]+'"><span class="badge light badge-danger">Inactive</span></a>'
                    }
    list+='<tr><td><img class="rounded-circle" width="40" src="ads_images/'+data[i]["ad_image"]+'" alt=""></td><td>'+
    data[i].ad_title+'</td><td>'+
    description+'</td><td>'+
    status+'</td><td>'+data[i].creation_date+'</td><td><div class="d-flex"><a id="update_ads" href="edit_ads.php?ads_id='+
                    data[i]["ads_id"]+'" class="btn btn-primary shadow btn-xs sharp me-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Ad"><i class="fas fa-pencil-alt"></i></a><a id="delete_ad" data="'+
                    data[i]["ads_id"]+
                    '" href="#" class="btn btn-danger shadow btn-xs sharp me-1 " data-bs-toggle="tooltip" data-bs-placement="top" title="Delete Ad"><i class="fa fa-trash"></i></a><a id="copy_ad" data="'+
                    data[i]["ads_id"]+
                    '" href="copy_ad.php?ads_id='+
                    data[i]["ads_id"]+'&&user_id='+user_id+'" class="btn btn-info shadow btn-xs sharp" data-bs-toggle="tooltip" data-bs-placement="top" title="Copy Ad"><i class="fas fa-clone"></i></a></div></td></tr>'
                
                    }
                    $('#listAds').append(list)
    
                }
            })
        }
    
        loadAds()
    
          $('#ads').DataTable({
            searching: true,
            paging:true,
            select: false,    
            ordering: false,        
            lengthChange:true ,
            language: {
                paginate: {
                  next: '<i class="fa fa-angle-double-right" aria-hidden="true"></i>',
                  previous: '<i class="fa fa-angle-double-left" aria-hidden="true"></i>' 
                }
              }
            
        });
    
    
      /************************* delete ads************************************/
    
      $(document).on('click','#delete_ad',function(e){
          e.preventDefault();
    
          var ads_id=$(this).attr('data')
    
    
          Swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to undo this!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.value) {
          console.log('ok')
          $.ajax({
              url:'assets/php/delete_gen_user_ad.php',
              method:"post",
              async:false,
              data:{ads_id:ads_id},
              success:function(response){
                  console.log(response)
                  var data = JSON.parse(response)
                  if(data.reponse=="true"){
                      $('#listAds').empty()
                      loadAds()
                         Swal.fire(
          'Deleted!',
          'Your ad has been deleted.',
          'success'
        )
                  }
     
              }
          })
    
      
    }
    
      })
    })
    
      /*********************************** change status ***************************************/
    
    
    $(document).on('click','#inactive',function(e){
        e.preventDefault()
    
        var ads_id=$(this).attr('data');
    
    
        $.ajax({
            url:'assets/php/change_ad_state.php',
            method:'post',
            async:false,
            data:{ads_id:ads_id,status:'inactive'},
            success:function(response){
                console.log(response)
                $('#listAds').empty()
                      loadAds()
            }
        })
    })
    
    $(document).on('click','#active',function(e){
        e.preventDefault()
    
        var ads_id=$(this).attr('data');
    
    
        $.ajax({
            url:'assets/php/change_ad_state.php',
            method:'post',
            async:false,
            data:{ads_id:ads_id,status:'active'},
            success:function(response){
                console.log(response)
                $('#listAds').empty()
                      loadAds()
            }
        })
    })
    /********************************************************************************/
    $.ajax({
        url:'assets/php/statistique_ads.php',
        method:'post',
        async:false,
        data:{user_id:user_id},
        success:function(response){
            console.log(response)
            var data = JSON.parse(response)
        
    
            $('#totalAds').text(data.totalAds)
            $('#ActiveAds').text(data.activeAds)
            $('#inactiveAds').text(data.inactiveAds)
    
        
    
        
    
            
        }
    })
    })//ready