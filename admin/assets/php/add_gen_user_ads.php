<?php


include 'config.php';




if(!isset($_POST['user_id']) || empty($_POST['user_id']) || !isset($_POST['ad_title']) || empty($_POST['ad_title'])  
|| !isset($_POST['general_cat']) || empty($_POST['general_cat']) 
|| !isset($_POST['sub_categories'])  || empty($_POST['sub_categories']) 
|| !isset($_POST['state'])  || empty($_POST['state']) 

 || !isset($_POST['ad_desc']) || empty($_POST['ad_desc']) )
{
  die(json_encode(array('reponse'=>'false',"message"=>1)));
}
elseif(!preg_match('/^[-a-zA-Z0-9 .]+$/', $_POST['ad_title']) ){
die(json_encode(array('reponse'=>'false',"message"=>4)));
}
else{

$user_id=$_POST['user_id'];
$ad_title=trim($_POST['ad_title']);
$ad_desc=$_POST['ad_desc'];
$general_cat=$_POST['general_cat'];
$sub_categories=$_POST['sub_categories'];
$state=$_POST['state'];
$city=$_POST['city'];
$keyword=$_POST['all_tags_input'];



  try {

            //connexion a la base de données
            $bdd = new PDO("mysql:host=".DB_SERVER.";dbname=".DB_NAME."; charset=utf8", DB_USER, DB_PASS, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));


            $req= $bdd->prepare('INSERT INTO `general_users_ads`( `user_id`, `ad_title`, `general_cat`, `suub_cat`, `ad_description`,  `state`, `cities`, `city_area`, `address_ad`, `status`, `lat`, `lon`,keyword, `creation_date`,activation_date)VALUES(?,?,?,?,?,?,?,?,?,"active",?,?,?,NOW(),NOW())');
            $req->execute(array(
            	$user_id,
            	$ad_title,
                $general_cat,
                $sub_categories,
            	$ad_desc,
            
             $state,
              $city,
             "",
              "",
              "",
              "",
              $keyword
            ));


            $fileName="";
if(isset($_FILES['files'])){
  $id=$bdd->lastInsertId();
  $target_dir = '../../gen_user_ads_images/';
  $response = array(); // Initialize response array

  // Loop through each uploaded file
  for($i = 0; $i < count($_FILES['files']['name']); $i++) {
    $t=time();
      $fileName = $_FILES['files']['name'][$i];
      $tmpFilePath = $_FILES['files']['tmp_name'][$i];

      $file= $t.'_'. basename($fileName);
      $targetFilePath = $target_dir . $t.'_'. basename($fileName);
     
      $imageFileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION)); // Get the file extension
      
      // Check if the uploaded file is an image
      $allowedExtensions = array("jpg", "jpeg", "png", "gif");
      if(!in_array($imageFileType, $allowedExtensions)) {
          $response[] = array('fileName' => $fileName, 'success' => false, 'message' => 'Invalid file format');
          continue; // Skip this file and proceed to the next one
      }
      
      // Move the uploaded file to the target directory
      if(move_uploaded_file($tmpFilePath, $targetFilePath)) {
          //$response[] = array('fileName' => $fileName, 'success' => true, 'message' => 'File uploaded successfully');
          $req = $bdd->prepare("INSERT INTO `gen_user_image`(`ad_id`, `path`, `creation_date`) VALUES(?,?,NOW())  ");
          $req->execute(array(
              $id,
              $file
          ));
      } else {
          $response[] = array('fileName' => $fileName, 'success' => false, 'message' => 'Failed to upload file');
      }
  }

}



              echo json_encode(array("reponse"=>"true"));
        }catch (Exception $e) {
            $msg = $e->getMessage();
              echo json_encode(array("reponse"=>"true","message"=>$msg));
        
         
        }
}

?>