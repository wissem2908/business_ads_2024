<?php


include 'config.php';



if(!isset($_POST['ad_title']) || empty($_POST['ad_title']) 
|| !isset($_POST['general_cat']) || empty($_POST['general_cat']) 
|| !isset($_POST['sub_categories'])  || empty($_POST['sub_categories']) 
|| !isset($_POST['state'])  || empty($_POST['state']) 
|| !isset($_POST['city'])  || empty($_POST['city']) 
|| !isset($_POST['ad_desc']) || empty($_POST['ad_desc'])  )
{
  die(json_encode(array('reponse'=>'false',"message"=>1)));
}elseif(!preg_match('/^[-a-zA-Z0-9 .!]+$/', $_POST['ad_title']) ){
die(json_encode(array('reponse'=>'false',"message"=>4)));
}else{

  $ads_id=$_POST['ads_id'];
  $ad_title=trim($_POST['ad_title']);
  $ad_desc=$_POST['ad_desc'];
  $general_cat=$_POST['general_cat'];
  $sub_categories=$_POST['sub_categories'];
   $state=$_POST['state'];
  $city=$_POST['city'];
  $keyword=$_POST['all_tags_input'];


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


            $req= $bdd->prepare('UPDATE `general_users_ads` SET `ad_title`=?,`ad_description`=? ,`general_cat`=?,`suub_cat`=?,state=?,`cities`=?,`city_area`=?,`address_ad`=?,lat=?,lon=?,keyword=? WHERE ads_id=?');
            $req->execute(array(
            	
            	$ad_title,
            	$ad_desc,
           
           
              $general_cat,
              $sub_categories,
              $state,
$city,
"",
"",
 "",
"",
$keyword,
                $ads_id,
            ));
           // $id=$bdd->lastInsertId();

           if(isset($_FILES['files'])){
        
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
                      $ads_id,
                        $file
                    ));
                } else {
                    $response[] = array('fileName' => $fileName, 'success' => false, 'message' => 'Failed to upload file');
                }
            }
          
           // echo json_encode($response); // Output the response array as JSON
          }


            // if(isset($_FILES['ads_images']) && $_FILES['ads_images']['name']!=""){
          
            
         
            
            //   foreach ($_FILES['ads_images']['name'] as $key => $val) {
            //     $t=time();
            //     $product_image =$_FILES['ads_images']['name'][$key];
               
                
            //     $product_image_tmp_name = $_FILES['ads_images']['tmp_name'][$key];
            //     $product_image=$t.'_'.$product_image;
            //     move_uploaded_file($product_image_tmp_name ,'../../ads_images/'.$product_image);
            
            //     $req = $bdd->prepare("INSERT INTO `images`(`ad_id`, `path`, `creation_date`) VALUES(?,?,NOW())  ");
            //     $req->execute(array(
            //         $ads_id,
            //         $product_image
            //     ));
            
              
            // }
            // }
              echo json_encode(array("reponse"=>"true"));
        }catch (Exception $e) {
            $msg = $e->getMessage();
              echo json_encode(array("reponse"=>"true","message"=>$msg));
        
         
        }
}

?>