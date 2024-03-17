<?php


include 'config.php';

if(!isset($_POST['blog_title']) || empty($_POST['blog_title']) || !isset($_POST['blog_desc']) || empty($_POST['blog_desc']) )
{

    die(json_encode(array('reponse'=>'false',"message"=>1)));
}else{
    $blog_id=$_POST['blog_id'];
$blog_title=$_POST['blog_title'];
$blog_desc=$_POST['blog_desc'];

$fileName=$_POST['blog_img'];


/******************************************/

if(isset($_FILES['blog_image']) && $_FILES['blog_image']['name']!=""){

    unlink('../../blog_images/'.$fileName);
    $t=time();
    $target_dir = '../../blog_images/';
    $target_file = $target_dir . $t.'_'.basename($_FILES["blog_image"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    
    $fileName = $t.'_'.basename($_FILES["blog_image"]["name"]);

if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
 die(json_encode(array('reponse'=>'false',"message"=>3)));
}else{
    
    move_uploaded_file($_FILES["blog_image"]["tmp_name"], $target_file);
}
}
  try {

            //connexion a la base de données
            $bdd = new PDO("mysql:host=".DB_SERVER.";dbname=".DB_NAME."; charset=utf8", DB_USER, DB_PASS, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    
            // insert user
            $req = $bdd->prepare('UPDATE `blog`SET  `blog_title`=?,`blog_desc`=?,`blog_image`=? WHERE id_blog=?');
            $req->execute(array(
                $blog_title,
                $blog_desc,
                $fileName,
               
                $blog_id
    
            ));

            /************************************************************************** */

            



                                    



             echo json_encode(array("reponse"=>"true"));
        }catch (Exception $e) {
            $msg = $e->getMessage();
              echo json_encode(array("reponse"=>"true","message"=>$msg));
        
         
        }



}


       
?>