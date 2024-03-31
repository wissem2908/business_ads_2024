
<?php
include 'includes/header.php';
      ?>
        <div class="content-body">
            <!-- row -->
            <div class="container-fluid">
                    <div class="row page-titles">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">General Users</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">General Users List</a></li>
                    </ol>
                </div>
               <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">General Users List</h4>
                                <a href="add_user.php" type="button" class="btn btn-outline-primary">Add General User</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table  class="display" id="users" >
                                        <thead>
                                            <tr>
                                                
                                                <th>Full name</th>
                                                <th></th>
                                                <th>Email</th>
                                                
                                                <th>Username</th>
                                                <th>Status</th>
                                                <th>Ads</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="listUser">
                                           
                                        
                                        
                                        
                                          
                                          

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
               </div>
            </div>
        </div>
      </div>
       <?php
include 'includes/footer.php';
      ?>

<script>
$(document).ready(function(){


function listeUsers(){


$.ajax({
	url:'assets/php/list_other_users.php',
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
					status = '<a href="#" id="inactive"  data="'+data[i]["id_user"]+'"><span class="badge light badge-success">Active</span></a>'
				}else{
					status ='<a href="#" id="active"  data="'+data[i]["id_user"]+'"><span class="badge light badge-danger">Inactive</span></a>'
				}


			



				list_data+=' <tr><td>'+
				data[i]["first_name"]+' '+data[i]["last_name"]+'</td><td><a href="//'+host+'/'+data[i]["username"]+'" target="_blank"><i class="fas fa-external-link-alt"></i></a></td> <td>'+data[i]["email"]+'</td><td>'+data[i]["username"]+
				'</td><td>'+status+
				'</td><td><a id="get_ads" href="list_gen_user_ads_admin.php?user_id='+
				data[i]["id_user"]+
				'" class="btn btn-primary shadow btn-xs  me-1">Ads</a></td><td><div class="d-flex"><a id="update_user" href="edit_other_user.php?user_id='+
				data[i]["id_user"]+
				'" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a><a id="delete_user" data="'+
				data[i]["id_user"]+
				'" href="#" class="btn btn-danger shadow btn-xs sharp me-1"><i class="fa fa-trash"></i></a></div></td></tr>'
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
  
  	$.ajax({
  		url:'assets/php/delete_other_user.php',
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
		url:'assets/php/change_other_user_state.php',
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
		url:'assets/php/change_other_user_state.php',
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



})//ready

    </script>
