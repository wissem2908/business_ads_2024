$(document).ready(function(){



	var id_blog=$('#id_blog').val();


	$.ajax({
		url:'assets/php/blog_by_id.php',
		method:'post',
		async:false,
		data:{id_blog:id_blog},
		success:function(response){
			console.log(response)

			var data = JSON.parse(response)
			if(data.reponse=="true"){
				data=data.result


				$('#blog_image').attr('src',"admin/blog_images/"+data.blog_image)
				$('#blog_title').text(data.blog_title)
				$('#date_creation').text(data.date_creation)
				$('#blog_description').html(data.blog_desc)
			}
		}
	})
})