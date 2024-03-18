<?php


include 'config.php';


if(!isset($_POST['user_id']) || empty($_POST['user_id']) || !isset($_POST['ad_title']) || empty($_POST['ad_title']) || !isset($_POST['categories']) || empty($_POST['categories']) 
|| !isset($_POST['general_cat']) || empty($_POST['general_cat']) 
|| !isset($_POST['sub_categories'])  || empty($_POST['sub_categories']) 
|| !isset($_POST['state'])  || empty($_POST['state']) 
|| !isset($_POST['city'])  || empty($_POST['city']) 
 || !isset($_POST['ad_desc']) || empty($_POST['ad_desc'])  )
{
  die(json_encode(array('reponse'=>'false',"message"=>1)));
}
elseif(!preg_match('/^[-a-zA-Z0-9 .]+$/', $_POST['ad_title']) ){
die(json_encode(array('reponse'=>'false',"message"=>4)));
}
else{
$ads_id=$_POST['ads_id'];
$user_id=$_POST['user_id'];
$ad_title=trim($_POST['ad_title']);
$ad_desc=$_POST['ad_desc'];
$categories=$_POST['categories'];
$general_cat=$_POST['general_cat'];
$sub_categories=$_POST['sub_categories'];
 $state=$_POST['state'];
$city=$_POST['city'];
$keyword=$_POST['all_tags_input'];
// $city_area=$_POST['city_area'];
// $address=$_POST['address_ad'];
// $latitude=$_POST['latitude'];
// $longitude=$_POST['longitude'];
$t=time();
$path= '../../ads_images/';
// $ad_image=$_POST["ad_image"];
$fileName="";



// if(isset($_FILES['image']) && $_FILES['image']['name']!=""){

//     unlink('../../ads_images/'.$_POST["ad_image"]);
//             $t=time();
//       $target_dir = '../../ads_images/';
//          $target_file = $target_dir . $t.'_'.basename($_FILES["image"]["name"]);
//       $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    
//       $fileName = $t.'_'.basename($_FILES["image"]["name"]);
  
//   if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
//   && $imageFileType != "gif" ) {
//    die(json_encode(array('reponse'=>'false',"message"=>2)));
//   }else{
      
//       move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
//   }
//   }else{
  
// if($ad_image!=""){
//   $fileName=  $t.'_'.$ad_image;
//   copy($path.$ad_image,$path.$fileName);
// }
   
//   }

// if(isset($_FILES['ads_images']) && $_FILES['ads_images']['name']!=""){
//   if(isset($_FILES['ads_images'])){
//     foreach ($_FILES['ads_images']['type'] as $key => $val) {
//        // var_dump($_FILES['product_images']['type'][$key]);
      
//         if(($_FILES['ads_images']['type'][$key] !='image/png') &&  ($_FILES['ads_images']['type'][$key]  !='image/jpg') && ($_FILES['ads_images']['type'][$key] !='image/jpeg')){
//           die(json_encode(array('reponse'=>'false',"message"=>2)));
           
//         }
//     }
// }
// }


  try {

            //connexion a la base de données
            $bdd = new PDO("mysql:host=".DB_SERVER.";dbname=".DB_NAME."; charset=utf8", DB_USER, DB_PASS, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));


            $req= $bdd->prepare('INSERT INTO `ads`( `user_id`, `ad_title`, `category_id`, `general_cat`, `suub_cat`, `ad_description`, `ad_image`, `state`, `cities`, `city_area`, `address_ad`, `status`, `lat`, `lon`,keyword, `creation_date`)VALUES(?,?,?,?,?,?,?,?,?,?,?,"active",?,?,?,NOW())');
            $req->execute(array(
            	$user_id,
            	$ad_title,
              $categories,
              $general_cat,
              $sub_categories,
            	$ad_desc,
              $fileName,
             $state,
              $city,
             "",
"",
              "",
              "",
              $keyword
            ));
            

            if(isset($_FILES['files'])){
              $id=$bdd->lastInsertId();
              $target_dir = '../../ads_images/';
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
                      $req = $bdd->prepare("INSERT INTO `images`(`ad_id`, `path`, `creation_date`) VALUES(?,?,NOW())  ");
                      $req->execute(array(
                          $id,
                          $file
                      ));
                  } else {
                      $response[] = array('fileName' => $fileName, 'success' => false, 'message' => 'Failed to upload file');
                  }
              }
            
             // echo json_encode($response); // Output the response array as JSON
            }
            // if(isset($_FILES['ads_images']) && $_FILES['ads_images']['name']!=""){
            //   if(isset($_FILES['ads_images'])){
            //     foreach ($_FILES['ads_images']['type'] as $key => $val) {
            //        // var_dump($_FILES['product_images']['type'][$key]);
                  
            //         if(($_FILES['ads_images']['type'][$key] !='image/png') &&  ($_FILES['ads_images']['type'][$key]  !='image/jpg') && ($_FILES['ads_images']['type'][$key] !='image/jpeg')){
            //           die(json_encode(array('reponse'=>'false',"message"=>2)));
                       
            //         }
            //     }
            //    }
            
        
            
            //   foreach ($_FILES['ads_images']['name'] as $key => $val) {
            //     $t=time();
            //     $product_image =$_FILES['ads_images']['name'][$key];
               
                
            //     $product_image_tmp_name = $_FILES['ads_images']['tmp_name'][$key];
            //     $product_image=$t.'_'.$product_image;
            //     move_uploaded_file($product_image_tmp_name ,'../../ads_images/'.$product_image);
            
            //     $req = $bdd->prepare("INSERT INTO `images`(`ad_id`, `path`, `creation_date`) VALUES(?,?,NOW())  ");
            //     $req->execute(array(
            //         $id,
            //         $product_image
            //     ));
            
              
            // }
            // }




              $req3=$bdd->prepare('select * from images where ad_id=? ');

              $req3->execute(array($ads_id));
              $count= $req3->rowCount();
            
              if($count!=0){
                while($res=$req3->fetch(PDO::FETCH_ASSOC)){
                  $ImageName=  $t.'_'.$res['path'];
  
                  $req4=$bdd->prepare("INSERT INTO `images`(`ad_id`, `path`, `creation_date`) VALUES(?,?,NOW()) ");
                  $req4->execute(array(
                    $id,
                    $ImageName
                ));
                  copy($path.$res['path'],$path.$ImageName);
            }//fin while
    
              }
           
            
              echo json_encode(array("reponse"=>"true"));
        }catch (Exception $e) {
            $msg = $e->getMessage();
              echo json_encode(array("reponse"=>"true","message"=>$msg));
        
         
        }
}

?>