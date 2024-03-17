$(document).ready(function(){
    var cat_id=""


    $(document).on('click','#sub_cat_btn',function(){
        cat_id=$(this).attr('data')
    
        $('#cat_id').val(cat_id)
       
        loadSubCat(cat_id)

        //$('#sub_categories').dataTable().fnClearTable();
    })


    /******************************************************************************************* */
    function loadSubCat(cat_id){

        $.ajax({
            url:'assets/php/list_sub_cat.php',
            method:'post',
            async:false,
            data:{cat_id:cat_id},
            success:function(response){
                console.log(response)
                var data = JSON.parse(response)
                if(data.reponse=='true'){
                    data=data.list
                    var cat_list=""
                    for(i=0;i<data.length;i++){
                        cat_list+='<tr id="'+data[i].id_sub_cat+'"><td>'+data[i].sub_cat_title+'</td><<td><a id="delete_sub_cat" data="'+
                        data[i]["id_sub_cat"]+
                        '" href="#" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a></td></tr>'
                    }
                    $('#sub_cat_list').empty()
                    $('#sub_cat_list').append(cat_list)
                }
            }
        })

    }
  
    loadSubCat(cat_id)
    $('#sub_categories').DataTable({
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
    // $('#sub_categories').DataTable({
    //     destroy: true,
    //     searching: true,
    //     paging:true,
    //     select: false,         
    //     lengthChange:true ,
    //     ordering: false,   
    //     language: {
    //         paginate: {
    //           next: '<i class="fa fa-angle-double-right" aria-hidden="true"></i>',
    //           previous: '<i class="fa fa-angle-double-left" aria-hidden="true"></i>' 
    //         }
    //       }
        
    // });///datatable

    /************************************************************* */
    // delete category

    $(document).on('click','#delete_sub_cat',function(){

        var sub_cat_id=$(this).attr('data')
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
                    url:'assets/php/delete_sub_category.php',
                    method:'post',
                    async:false,
                    data:{sub_cat_id:sub_cat_id},
                    success:function(response){
                        var data = JSON.parse(response)
                        if(data.reponse=='true'){
                            $('#sub_cat_list').empty()
                            loadSubCat(cat_id)
                            Swal.fire(
                                'Deleted!',
                                'Sub Categories has been deleted.',
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

    $('#add_sub_cat').click(function(e){
        e.preventDefault()

        var sub_cat_title=$('#sub_cat_title').val()

        $.ajax({
            url:'assets/php/add_sub_category.php',
            method:'post',
            async:false,
            data:{sub_cat_title:sub_cat_title,cat_id:cat_id},
            success:function(response){
                console.log(response)
                var data = JSON.parse(response)
                if(data.reponse=="true"){
                    $('#sub_cat_list').empty()
                    loadSubCat(cat_id)
                    Swal.fire({
                       
                        icon: 'success',
                        title: 'Sub Category added',
                        showConfirmButton: false,
                        timer: 1500
                      })
                      $('#sub_cat_title').val("")
                }
            }
        })
    })



    $(".sub_cat_position").sortable({
        delay: 150,
        stop: function() {
            var selectedData = new Array();
            $(".sub_cat_position>tr").each(function() {
                selectedData.push($(this).attr("id"));
            });
            updateOrder_sub_cat(selectedData);
        }
    });
    function updateOrder_sub_cat(aData) {
        $.ajax({
            url: 'assets/php/change_sub_cat_order.php',
            type: 'POST',
            data: {
                allData: aData
            },
            success: function(response) {
                console.log(response)
                //alert("Your change successfully saved");
            }
        });
    }
})