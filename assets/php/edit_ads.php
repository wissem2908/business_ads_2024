<?php


include 'config.php';



if(!isset($_POST['user_id']) || empty($_POST['user_id']) || !isset($_POST['ad_title']) || empty($_POST['ad_title']) || !isset($_POST['categories']) || empty($_POST['categories']) 
|| !isset($_POST['general_cat']) || empty($_POST['general_cat']) 
|| !isset($_POST['sub_categories'])  || empty($_POST['sub_categories']) 
|| !isset($_POST['state']) || empty($_POST['state']) 
|| !isset($_POST['city']) || empty($_POST['city']) 
|| !isset($_POST['latitude'])  || empty($_POST['latitude']) 
|| !isset($_POST['longitude']) || empty($_POST['longitude']) || !isset($_POST['ad_desc']) || empty($_POST['ad_desc']) || !isset($_FILES['image']) || empty($_FILES['image']) )
{
  die(json_encode(array('reponse'=>'false',"message"=>1)));
}else{

  $user_id=$_POST['user_id'];
  $ad_title=trim($_POST['ad_title']);
  $ad_desc=$_POST['ad_desc'];
  $categories=$_POST['categories'];
  $general_cat=$_POST['general_cat'];
  $sub_categories=$_POST['sub_categories'];
  $state=$_POST['state'];
  $city=$_POST['city'];
  $city_area=$_POST['city_area'];
  $address=$_POST['address'];
  $latitude=$_POST['latitude'];
  $longitude=$_POST['longitude'];
echo $latitude;
$fileName=$ad_image;
if(isset($_FILES['image']) && $_FILES['image']['name']!=""){

  unlink('../../ads_images/'.$_POST["ad_image"]);
          $t=time();
    $target_dir = '../../ads_images/';
       $target_file = $target_dir . $t.'_'.basename($_FILES["image"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  
    $fileName = $t.'_'.basename($_FILES["image"]["name"]);

if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
 die(json_encode(array('reponse'=>'false',"message"=>2)));
}else{
    
    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
}
}

if(isset($_FILES['ads_images']) && $_FILES['ads_images']['name']!=""){
  if(isset($_FILES['ads_images'])){
    foreach ($_FILES['ads_images']['type'] as $key => $val) {
       // var_dump($_FILES['product_images']['type'][$key]);
      
        if(($_FILES['ads_images']['type'][$key] !='image/png') &&  ($_FILES['ads_images']['type'][$key]  !='image/jpg') && ($_FILES['ads_images']['type'][$key] !='image/jpeg')){
          die(json_encode(array('reponse'=>'false',"message"=>2)));
           
        }
    }
}
}


  try {

            //connexion a la base de données
            $bdd = new PDO("mysql:host=".DB_SERVER.";dbname=".DB_NAME."; charset=utf8", DB_USER, DB_PASS, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));


            $req= $bdd->prepare('UPDATE `ads` SET `ad_title`=?,`ad_description`=?,`ad_image`=? ,category_id=? `general_cat`=?,`suub_cat`=?,state`=?,`cities`=?,`city_area`=?,`address_ad`=?,lat=?,lon=? WHERE ads_id=?');
            $req->execute(array(
            	
            	$ad_title,
            	$ad_desc,
            	$fileName,
              $categories,
              $general_cat,
              $sub_categories,
              $state,
  $city,
  $city_area,
  $address,
  $latitude,
  $longitude,
                $ads_id,
            ));
           // $id=$bdd->lastInsertId();
            if(isset($_FILES['ads_images']) && $_FILES['ads_images']['name']!=""){
          
            
         
            
              foreach ($_FILES['ads_images']['name'] as $key => $val) {
                $t=time();
                $product_image =$_FILES['ads_images']['name'][$key];
               
                
                $product_image_tmp_name = $_FILES['ads_images']['tmp_name'][$key];
                $product_image=$t.'_'.$product_image;
                move_uploaded_file($product_image_tmp_name ,'../../ads_images/'.$product_image);
            
                $req = $bdd->prepare("INSERT INTO `images`(`ad_id`, `path`, `creation_date`) VALUES(?,?,NOW())  ");
                $req->execute(array(
                    $ads_id,
                    $product_image
                ));
            
              
            }
            }
              echo json_encode(array("reponse"=>"true"));
        }catch (Exception $e) {
            $msg = $e->getMessage();
              echo json_encode(array("reponse"=>"true","message"=>$msg));
        
         
        }
}

?>