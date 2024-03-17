$(document).ready(function(){


	$('#login').click(function(e){
		e.preventDefault();

		var username=$('#username').val()
		var password = $('#password').val()

		$.ajax({
			url:'assets/php/login.php',
			method:'post',
			async:false,
			data:{password:password,username:username},
			success:function(response){
				console.log(response)
				var data = JSON.parse(response)

				if(data.reponse=='false' && data.message==1){
					Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'Enter username and password !',
  
})
				}else if(data.reponse=='false' && data.message==2){
					Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'Inactive Account !',
  
})
				}else if(data.reponse=='false' && data.message==3){
					Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'User Not Found !',
  
})
				}else if(data.reponse=="true"){
					window.location.href="dashboard.php"
				}
			}
		})//ajax
	})//click
})//ready