<?php
include ('includes/header_1.php');
?>
    <section id="blog" >
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="intro">
                        <h1>Blog</h1>
                       
                    </div>
                </div>
            </div>

            <input type="hidden" value="<?php echo $_GET['id_blog']; ?>" id="id_blog" />
            <div class="row justify-content-md-center" >
               <div class="col-lg-9"> <br/><article class="blog-post"> <img  id="blog_image"  alt=""><div class="content"> <small id="date_creation"></small><h5 id="blog_title"></h5> <p id="blog_description"> </p><input type="button" class=" btn btn-brand back-btn float-end" value="Back" onclick="history.back()"> </div> </article></div>'

           
            </div>
        </div>
    </section>






  



 


    <?php
include ('includes/footer_1.php');
?>


<script src="./assets/js/blog_details.js"></script>