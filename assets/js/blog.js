$(document).ready(function(){




	function loadBlog(){



		$.ajax({
			url:'assets/php/list_blog.php',
			method:'post',
			async:false,
			success:function(response){
				console.log(response)

				var data = JSON.parse(response)


				if(data.reponse=="true"){

				


					data = data.list
					var listBlog=""
					for(i=0;i<data.length;i++){
								var description=""
					if(data[i].blog_desc.length>100){
						description=data[i].blog_desc.substring(0,100)+'...'
											}else{
												description=data[i].blog_desc
											}


listBlog+='  <div class="col-md-4"> <br/><article class="blog-post"> <img src="admin/blog_images/'+
data[i].blog_image+'" alt=""><div class="content"> <small>'+
data[i].date_creation+'</small><h5>'+data[i].blog_title+'</h5> <p> '+
description+'</p><a href="blog_details.php?id_blog='+data[i].id_blog+'" class=" btn btn-brand back-btn float-end">Read more</a> </div> </article></div>'
					}

					$('#listBlog').append(listBlog)
				}
			}
		})
	}

	loadBlog()
})