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




    <section id="advertisers" class="text-center">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="intro">
                        
                        <h1>Advertisers</h1>
                      <a target='_blank' href="map.php">See advertisers on Map</a>
                    </div>
                </div>
            </div>
            <div class="row"> 
                <div class="col-lg-4 col-sm-12">
                <div class="mb-3">
                        <input type="text" class="form-control" id="search" placeholder="Search ...">
                </div>
                </div>
            </div>
            <div class="row g-4" id="users">
            </div>
            <br/>
            <button class="text-center btn btn-brand loadMore">Load More</button>
        </div>
    </section>
         <!-- <div class="bookmark" onclick="addBookmark()">Bookmark</div> -->
         <section id="advertisers" class="text-center">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="intro">
                        
                        <h1>Latest Ads</h1>
                        <!-- <a target='_blank' href="map.php">See ads on Map</a> -->
                    </div>
                </div>
            </div>
        
            <div class="row g-4" id="latest_ads">
           
           
            </div>
           
        </div>
    </section>
    <style>
</style>
<?php
include ('includes/footer_1.php');
?>
<script src="./assets/js/latest_ads.js"></script>


<script>
    $(document).ready(function(){
        $('.hide').hide();
    $(document).on('click', '.share_icons', function(){
      $(this).siblings('.hide').toggle();
    });
    })
</script>






<script>

$(document).ready(function(){
   


$.ajax({
    url:'assets/php/check_expiration_date.php',
    method:'post',
    async:false,
    success:function(response){
        console.log(response)
    }
})

    })

</script>