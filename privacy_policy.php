<?php
include ('includes/header_1.php');
?>

<style>
    #bookmark_link{
    position: fixed;
top: 11%;
background: #e10000;
color: #fff;
padding: 10px 24px;
z-index:100;

/*display:none;*/
    }
    #bookmark_link a {
        color: #fff;
text-decoration: none;
    }
</style>
<link rel="stylesheet" href="css/index.css" />


     <!-- <div class="bookmark" onclick="addBookmark()">Bookmark</div> -->
    <section id="advertisers"  >
        <div class="container" >
            <div class="row">
                <div class="col-12">
                    <div class="intro">
                        
                        <h1>Privacy Policy</h1>
                        <!-- <a target='_blank' href="map.php">See ads on Map</a> -->
                    </div>
                </div>
            </div>
        
            <div class="row g-4" id="pp_desc">
           
           
            </div>
           
        </div>
    </section>

 
    <style>
</style>
<?php
include ('includes/footer_1.php');
?>


<script>
    $(document).ready(function(){
        $.ajax({
            url:'assets/php/get_pp.php',
            method:'post',
            async:false,
            success:function(response){
                console.log(response)
                var data = JSON.parse(response)
                data = data.result
                $('#pp_desc').append(data.description)

            }

        })
    })
</script>