$(document).ready(function(){


function listeUsers(){


$.ajax({
	url:'assets/php/list_users.php',
	method:'post',
	async:false,
	success:function(response){
		var data=JSON.parse(response)

		if(data.reponse=="true"){
			data = data.list;

			var list_data ="";
			for(i=0;i<data.length;i++){
				var host= window.location.hostname
				var status=""
				if(data[i]['status']=="active"){
					status = '<a href="#" id="inactive"  data="'+data[i]["user_id"]+'"><span class="badge light badge-success">Active</span></a>'
				}else{
					status ='<a href="#" id="active"  data="'+data[i]["user_id"]+'"><span class="badge light badge-danger">Inactive</span></a>'
				}


				var display_marker=""
				if(data[i]['display_marker']==1){
					display_marker = '<a href="#" id="hide_marker"  data="'+data[i]["user_id"]+'"><span class="badge light badge-success"><i class="fas fa-map-marker"></i></span></a>'
				}else{
					display_marker ='<a href="#" id="display_marker"  data="'+data[i]["user_id"]+'"><span class="badge light badge-danger"><i class="fas fa-map-marker"></i></span></a>'
				}



				list_data+=' <tr><td><img class="rounded-circle" width="35" src="logo_images/'
				+data[i]["logo"]+'" alt=""></td><td>'+
				data[i]["business_name"]+'</td><td><a href="//'+host+'/'+data[i]["username"]+'" target="_blank"><i class="fas fa-external-link-alt"></i></a></td> <td>'+data[i]["email"]+'</td><td>'+data[i]["username"]+
				'</td><td><a href="admin_categories.php?user_id='+data[i]["user_id"]+'" "><span class="badge light badge-info ">Categories</span></a></td><td>'+status+
				'</td><td><a id="get_ads" href="list_ads_admin.php?user_id='+
				data[i]["user_id"]+
				'" class="btn btn-primary shadow btn-xs  me-1">Ads</a></td><td><div class="d-flex"><a id="update_user" href="edit_user.php?user_id='+
				data[i]["user_id"]+
				'" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a><a id="delete_user" data="'+
				data[i]["user_id"]+
				'" href="#" class="btn btn-danger shadow btn-xs sharp me-1"><i class="fa fa-trash"></i></a>'+display_marker+'</div></td></tr>'
			}
			$('#listUser').append(list_data)
		}
	}
})
}
listeUsers()
  $('#users').DataTable({
		searching: true,
		paging:true,
		select: false,         
		lengthChange:true ,
		ordering: false,   
		language: {
			paginate: {
			  next: '<i class="fa fa-angle-double-right" aria-hidden="true"></i>',
			  previous: '<i class="fa fa-angle-double-left" aria-hidden="true"></i>' 
			}
		  }
		
	});

  /************************* delete user************************************/

  $(document).on('click','#delete_user',function(e){
  	e.preventDefault();

  	var user_id=$(this).attr('data')


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
  		url:'assets/php/delete_user.php',
  		method:"post",
  		async:false,
  		data:{user_id:user_id},
  		success:function(response){
  			console.log(response)
  			var data = JSON.parse(response)
  			if(data.reponse=="true"){
  				$('#listUser').empty()
  				listeUsers()
  				   Swal.fire(
      'Deleted!',
      'User has been deleted.',
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

	var user_id=$(this).attr('data');


	$.ajax({
		url:'assets/php/change_user_state.php',
		method:'post',
		async:false,
		data:{user_id:user_id,status:'inactive'},
		success:function(response){
			console.log(response)
			$('#listUser').empty()
  				listeUsers()
		}
	})
})

$(document).on('click','#active',function(e){
	e.preventDefault()

	var user_id=$(this).attr('data');


	$.ajax({
		url:'assets/php/change_user_state.php',
		method:'post',
		async:false,
		data:{user_id:user_id,status:'active'},
		success:function(response){
			console.log(response)
			$('#listUser').empty()
  				listeUsers()
		}
	})
})


/************************************************************************************** */

$(document).on('click','#display_marker',function(){
var user_id = $(this).attr("data")

$.ajax({
	url:'assets/php/display_marker.php',
	method:'post',
	async:false,
	data:{user_id:user_id,status:'active'},
	success:function(response){
		console.log(response)
		$('#listUser').empty()
			  listeUsers()
	}
})
})

$(document).on('click','#hide_marker',function(){
	var user_id = $(this).attr("data")
	
	$.ajax({
		url:'assets/php/display_marker.php',
		method:'post',
		async:false,
		data:{user_id:user_id,status:'inactive'},
		success:function(response){
			console.log(response)
			$('#listUser').empty()
				  listeUsers()
		}
	})
	})
})//ready