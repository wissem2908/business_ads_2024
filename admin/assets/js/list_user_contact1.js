$(document).ready(function(){

	var user_id=$('#user_id').val()
	function listContact(){

		$.ajax({
			url:'assets/php/list_approved_contact.php',
			method:'post',
			async:false,
			data:{user_id:user_id},
			success:function(response){
				console.log(response)

				var data= JSON.parse(response)
				data=data.list
				var list=""
				var showModal=""
				for(i=0;i<data.length;i++){
					
					if(data[i].message_user.length>25){
message=data[i].message_user.substring(0,25)+'...'
					}else{
						message=data[i].message_user
					}




                   
list+='         <tr><td> '+data[i].full_name_user+'</td><td> '+
data[i].email_user+'</td><td> '+message+'</td><td> '+data[i].date_creation+
'</td><td ><div class="d-flex"> <button data="'+data[i].contact_user_id +'" type="button" class="btn btn-primary shadow btn-xs sharp me-1" data-bs-toggle="modal" data-bs-target="#basicModal" id="showModalDetails"><i class="fas fa-info-circle"></i></button>  <button data="'+data[i].contact_user_id +'" type="button" class="btn btn-danger shadow btn-xs sharp me-1"   id="delete"><i class="fas fa-trash"></i></button></div></td></tr>  '
				


                                }
				$('#list_user_contact').append(list)
				$('#showModal').append(list)
				

			}
		})
	}
	listContact()

/************************************************************************************** */

$(document).on('click','#delete',function(e){

	e.preventDefault()
	var contact_id=$(this).attr('data')

	
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
				url:'assets/php/delete_contact_user.php',
				method:"post",
				async:false,
				data:{contact_id:contact_id},
				success:function(response){
					console.log(response)
					var data = JSON.parse(response)
					if(data.reponse=="true"){
						$('#list_user_contact').empty()
						listContact()
						   Swal.fire(
			'Deleted!',
			'Message has been deleted.',
			'success'
		  )
					}
	   
				}
			})
	  
		
	  }
	  
		})
})
/*************************************************************************************** */

	  $('#contact').DataTable({
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
		
	});//datatable

	  $(document).on('click','#showModalDetails',function(e){
e.preventDefault()


var contact_id = $(this).attr('data')


$.ajax({
	url:'assets/php/contact_user_by_id.php',
	method:'post',
	async:false,
	data:{contact_id:contact_id},
	success:function(response){
		console.log(response)
		var data=JSON.parse(response)
		data = data.result

		$('#fullName').text(data.full_name_user)
		$('#email').text(data.email_user)
		$('#message').text(data.message_user)
		$('#date').text(data.date_creation)
		
	}
})

	  })





})//ready