<?php


include 'config.php';

if(!isset($_POST['about_text']) || empty($_POST['about_text']) )
{

    die(json_encode(array('reponse'=>'false',"message"=>1)));
}else{
$about_text=$_POST['about_text'];


$image=$_POST['image'];








/*************************************************************************************/

    if(isset($_FILES['about_img']) && $_FILES['about_img']['name']!=""){
          $t=time();
    $target_dir = '../../../img/';
       $target_file = $target_dir . $t.'_'.basename($_FILES["about_img"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  
    $image = $t.'_'.basename($_FILES["about_img"]["name"]);

if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
 die(json_encode(array('reponse'=>'false',"message"=>3)));
}else{
    
    move_uploaded_file($_FILES["about_img"]["tmp_name"], $target_file);
}
}

/********************************************************************************* */


  try {

            //connexion a la base de données
            $bdd = new PDO("mysql:host=".DB_SERVER.";dbname=".DB_NAME."; charset=utf8", DB_USER, DB_PASS, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    
            // insert user
            $req = $bdd->prepare('UPDATE `website_content` SET `about_img`=?,`about_text`=?  WHERE id_content=1');
            $req->execute(array(
                $image,
                $about_text,
               
               
    
            ));
             echo json_encode(array("reponse"=>"true"));
            
        }catch (Exception $e) {
            $msg = $e->getMessage();
              echo json_encode(array("reponse"=>"true","message"=>$msg));
        
         
        }
}






       
?>