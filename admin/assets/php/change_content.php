<?php


include 'config.php';

if(!isset($_POST['banner1_title1']) || empty($_POST['banner1_title1']) || !isset($_POST['banner1_title2']) || empty($_POST['banner1_title2']) || !isset($_POST['banner2_title1']) || empty($_POST['banner2_title1'])  || !isset($_POST['banner2_title2']) || empty($_POST['banner2_title2']))
{

    die(json_encode(array('reponse'=>'false',"message"=>1)));
}else{
$banner1_title1=$_POST['banner1_title1'];
$banner1_title2=$_POST['banner1_title2'];
$banner2_title1=$_POST['banner2_title1'];
$banner2_title2=$_POST['banner2_title2'];

$image1=$_POST['image1'];
$image2=$_POST['image2'];







/*************************************************************************************/

    if(isset($_FILES['banner2_path']) && $_FILES['banner2_path']['name']!=""){
          $t=time();
    $target_dir = '../../../img/';
       $target_file = $target_dir . $t.'_'.basename($_FILES["banner2_path"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  
    $image2 = $t.'_'.basename($_FILES["banner2_path"]["name"]);

if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
 die(json_encode(array('reponse'=>'false',"message"=>3)));
}else{
    
    move_uploaded_file($_FILES["banner2_path"]["tmp_name"], $target_file);
}
}

/********************************************************************************* */
if(isset($_FILES['banner1_path']) && $_FILES['banner1_path']['name']!=""){
    $t=time();
$target_dir = '../../../img/';
 $target_file = $target_dir . $t.'_'.basename($_FILES["banner1_path"]["name"]);
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

$image1 = $t.'_'.basename($_FILES["banner1_path"]["name"]);

if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
die(json_encode(array('reponse'=>'false',"message"=>3)));
}else{

move_uploaded_file($_FILES["banner1_path"]["tmp_name"], $target_file);
}
}

  try {

            //connexion a la base de données
            $bdd = new PDO("mysql:host=".DB_SERVER.";dbname=".DB_NAME."; charset=utf8", DB_USER, DB_PASS, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    
            // insert user
            $req = $bdd->prepare('UPDATE `website_content` SET `banner1_path`=?,`banner2_path`=?,`banner1_title1`=?,`banner1_title2`=?,`banner2_title1`=?,`banner2_title2`=?  WHERE id_content=1');
            $req->execute(array(
                $image1,
                $image2,
                $banner1_title1,
                $banner1_title2,
                $banner2_title1,
                $banner2_title2,
               
    
            ));
             echo json_encode(array("reponse"=>"true"));
            
        }catch (Exception $e) {
            $msg = $e->getMessage();
              echo json_encode(array("reponse"=>"true","message"=>$msg));
        
         
        }
}






       
?>