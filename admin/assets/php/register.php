<?php


include 'config.php';

if(!isset($_POST['email']) || empty($_POST['email']) )
{

    die(json_encode(array('reponse'=>'false',"message"=>1)));
}else{

$business_name=$_POST['business_name'];

$email=$_POST['email'];
$contact_name=$_POST['contact_name'];

$role=$_POST['role'];
$status=$_POST['status'];
$fileName="";

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

       die(json_encode(array('reponse'=>'false',"message"=>4)));
}



        /**************************************************************/

    if(isset($_FILES['logo']) && $_FILES['logo']['name']!=""){
          $t=time();
    $target_dir = '../../logo_images/';
       $target_file = $target_dir . $t.'_'.basename($_FILES["logo"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  
    $fileName = $t.'_'.basename($_FILES["logo"]["name"]);

if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
 die(json_encode(array('reponse'=>'false',"message"=>3)));
}else{
    
    move_uploaded_file($_FILES["logo"]["tmp_name"], $target_file);
}
}
  try {

            //connexion a la base de données
            $bdd = new PDO("mysql:host=".DB_SERVER.";dbname=".DB_NAME."; charset=utf8", DB_USER, DB_PASS, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    
            $req2 = $bdd->prepare('select * from users where email =?');
$req2->execute(array($email));
$email_exist = $req2->rowCount();

/******************************************/

if($email_exist>0){
    die(json_encode(array('reponse'=>'false',"message"=>6)));
}
            // insert user
            $req = $bdd->prepare('INSERT INTO `users`( `username`,`business_name`,`email`, `logo`, `contact_name`, `password`, `role`, `status`, `user_desc`, `address`, `phone_number`, `whatsapp_number`, `creation_date`) VALUES("", ?,?,?,?,"",?,?,"","","","",NOW())');
            $req->execute(array(
               
                $business_name,
               
                $email,
                $fileName,
               $contact_name,
                $role,
                $status
    
            ));
             echo json_encode(array("reponse"=>"true"));



            
        }catch (Exception $e) {
            $msg = $e->getMessage();
              echo json_encode(array("reponse"=>"false","message"=>$msg));
        
         
        }
}






       
?>