$(document).ready(function(){

    $.ajax({
        url:'assets/php/get_content.php',
        method:'post',
        async:false,
        success:function(response){
           var data = JSON.parse(response)
           if(data.reponse=="true"){
            data=data.result

            $('.slide1').css('background','linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)),url(./img/'+data.banner1_path+')')
            $('.slide1').css('background-size','cover')
            $('.slide1').css(' background-position','center')
            $('.slide1').css('background-repeat','no-repeat')

            $('.slide2').css('background','linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)),url(./img/'+data.banner2_path+')')
            $('.slide2').css('background-size','cover')
            $('.slide2').css(' background-position','center')
            $('.slide2').css('background-repeat','no-repeat')

           

$('#banner1_title1').append(data.banner1_title1)
$('#banner1_title2').append(data.banner1_title2)

            $('#banner2_title1').append(data.banner2_title1)
            $('#banner2_title2').append(data.banner2_title2)
            $('#about_img').attr('src','./img/'+data.about_img)
            $('#about_text').html(data.about_text)
           }
        }
    })
})