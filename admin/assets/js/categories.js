$(document).ready(function(){

var user_id=$('#user_id').val()
    function loadCat(){

        $.ajax({
            url:'assets/php/list_cat.php',
            method:'post',
            async:false,
            data:{user_id:user_id},
            success:function(response){
                console.log(response)
                var data = JSON.parse(response)
                if(data.reponse=='true'){
                    data=data.list
                    var cat_list=""
                    for(i=0;i<data.length;i++){
                        cat_list+='<tr id="'+data[i].cat_id+'"><td>'+data[i].cat_title+'</td><td><a id="delete_cat" data="'+
                        data[i]["cat_id"]+
                        '" href="#" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a></td></tr>'
                    }
                    $('#cat_list').append(cat_list)
                }
            }
        })
    }
    loadCat()

    $('#categories').DataTable({
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
		
	});///datatable


    /************************************************************* */
    // delete category

    $(document).on('click','#delete_cat',function(){

        var cat_id=$(this).attr('data')
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
                    url:'assets/php/delete_category.php',
                    method:'post',
                    async:false,
                    data:{cat_id:cat_id},
                    success:function(response){
                        var data = JSON.parse(response)
                        if(data.reponse=='true'){
                            $('#cat_list').empty()
                            loadCat()
                            Swal.fire(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                              )
                        }
                    }
                })
            
            }
          })

    })//delete


    /************************************************************** */

    //add category

    $('#add_cat').click(function(e){
        e.preventDefault()

        var cat_title=$('#cat_title').val()

        $.ajax({
            url:'assets/php/add_category.php',
            method:'post',
            async:false,
            data:{cat_title:cat_title,user_id:user_id},
            success:function(response){
                console.log(response)
                var data = JSON.parse(response)
                if(data.reponse=="true"){
                    $('#cat_list').empty()
                    loadCat()
                    Swal.fire({
                       
                        icon: 'success',
                        title: 'Category added',
                        showConfirmButton: false,
                        timer: 1500
                      })
                }else if(data.reponse=="false" && data.message==1){
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Enter requred fields!',
                       
                      })
                }else if(data.reponse=="false" && data.message==2){
                    Swal.fire({
                        title: 'you have max category',
                    
                        icon: 'warning',
                      
                        confirmButtonColor: '#3085d6',
                       
                        
                      })
                }else if(data.reponse=="false" && data.message==4){
                    Swal.fire({
                        title: 'this category already exist',
                    
                        icon: 'warning',
                      
                        confirmButtonColor: '#3085d6',
                       
                        
                      })
                }
                else if(data.reponse=="false" && data.message==5){
                    Swal.fire({
                        title: 'Category should not contain special character',
                    
                        icon: 'warning',
                      
                        confirmButtonColor: '#3085d6',
                       
                        
                      })
                }
            }
        })
    })



    $(".categories_position").sortable({
        delay: 150,
        stop: function() {
            var selectedData = new Array();
            $(".categories_position>tr").each(function() {
                selectedData.push($(this).attr("id"));
            });
            updateOrder_sub_cat(selectedData);
        }
    });
    function updateOrder_sub_cat(aData) {
        $.ajax({
            url: 'assets/php/change_cat_order.php',
            type: 'POST',
            data: {
                allData: aData
            },
            success: function(response) {
                console.log(response)
                //alert("Your change successfully saved");
            }
        })
    }
})