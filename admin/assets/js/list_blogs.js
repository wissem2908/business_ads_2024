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
                    data=data.list
                    
var lisBlogs=""
                    for(i=0;i<data.length;i++){

                        var description=""
					if(data[i].blog_desc.length>25){
						description=data[i].blog_desc.substring(0,25)+'...'
											}else{
												description=data[i].blog_desc
											}


                                            var title=""
                                            if(data[i].blog_title.length>25){
                                                title=data[i].blog_title.substring(0,25)+'...'
                                                                    }else{
                                                                        title=data[i].blog_title
                                                                    }
                        

                        var status=""
                        if(data[i]['status']=="active"){
                            status = '<a href="#" id="inactive"  data="'+data[i]["id_blog"]+'"><span class="badge light badge-success">Active</span></a>'
                        }else{
                            status ='<a href="#" id="active"  data="'+data[i]["id_blog"]+'"><span class="badge light badge-danger">Inactive</span></a>'
                        }
                        lisBlogs+='<tr><td><img class="rounded" width="60" src="blog_images/'+data[i].blog_image+'" alt=""></td><td>'+title+'</td><td>'+description+'</td><td>'+status+'</td><td>'+data[i].date_creation+'</td><td><div class="d-flex"><a  href="edit_blog.php?blog_id='+
                        data[i].id_blog+
                        '" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a><a id="delete_blog" data="'+
                        data[i].id_blog+
                        '" href="#" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a></div></td></tr>'
                    }
                    $('#listBlog').append(lisBlogs)
                }
            }
        })
    }

    loadBlog()

    $('#blogs').DataTable({
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






    /********************************************************************************************* */

    
  $(document).on('click','#delete_blog',function(e){
    e.preventDefault();

    var blog_id=$(this).attr('data')


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
        url:'assets/php/delete_blog.php',
        method:"post",
        async:false,
        data:{blog_id:blog_id},
        success:function(response){
            console.log(response)
            var data = JSON.parse(response)
            if(data.reponse=="true"){
                $('#listBlog').empty()
                loadBlog()
                   Swal.fire(
    'Deleted!',
    'Blog has been deleted.',
    'success'
  )
            }

        }
    })


}

})
})



/************************************************************************************************************** */

  /*********************************** change status ***************************************/


  $(document).on('click','#inactive',function(e){
	e.preventDefault()

	var blog_id=$(this).attr('data');


	$.ajax({
		url:'assets/php/change_blog_state.php',
		method:'post',
		async:false,
		data:{blog_id:blog_id,status:'inactive'},
		success:function(response){
			console.log(response)
            $('#listBlog').empty()
            loadBlog()
		}
	})
})

$(document).on('click','#active',function(e){
	e.preventDefault()

	var blog_id=$(this).attr('data');


	$.ajax({
		url:'assets/php/change_blog_state.php',
		method:'post',
		async:false,
		data:{blog_id:blog_id,status:'active'},
		success:function(response){
			console.log(response)
            $('#listBlog').empty()
            loadBlog()
		}
	})
})

/******************************************************************************************************* */
})