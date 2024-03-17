<?php


include 'config.php';


if(!isset($_POST['username']) || empty($_POST['username']) || !isset($_POST['password']) || empty($_POST['password']) || !isset($_POST['email']) || empty($_POST['email']) )
{

    die(json_encode(array('reponse'=>'false',"message"=>1)));
}else{
$username=$_POST['username'];
$business_name=$_POST['business_name'];

$email=$_POST['email'];
$contact_name=$_POST['contact_name'];
$password_user=$_POST['password'];
$password=sha1($password_user);
$role=$_POST['role'];
$status=$_POST['status'];
$user_desc=$_POST['user_desc'];
$address=$_POST['address'];
$phone_number=$_POST['phone_number'];
$whatsapp_number=$_POST['whatsapp_number'];
$latitude = $_POST['latitude'];
$longitude = $_POST['longitude'];
$fileName="";

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

       die(json_encode(array('reponse'=>'false',"message"=>4)));
}

if(!ctype_alnum($username)){
      die(json_encode(array('reponse'=>'false',"message"=>2)));
}


/******************************************/
//verify if username exist
  try {

            //connexion a la base de données
            $bdd = new PDO("mysql:host=".DB_SERVER.";dbname=".DB_NAME."; charset=utf8", DB_USER, DB_PASS, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

$req1 = $bdd->prepare('select * from users where username =?');
$req1->execute(array($username));
$count = $req1->rowCount();

$req2 = $bdd->prepare('select * from users where email =?');
$req2->execute(array($email));
$email_exist = $req2->rowCount();
 }catch (Exception $e) {
            $msg = $e->getMessage();
              echo json_encode(array("reponse"=>"true","message"=>$msg));
        
          
        }

        /**************************************************************/
        if($email_exist>0){
            die(json_encode(array('reponse'=>'false',"message"=>6)));
        }
if($count>0){
    die(json_encode(array('reponse'=>'false',"message"=>5)));
}
else{
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
    
            // insert user
            $req = $bdd->prepare('INSERT INTO `users`(`username`, `business_name`,  `email`, `logo`, `contact_name`, `password`, `role`, `status`, user_desc,address,phone_number,whatsapp_number,lat,lon,`creation_date`) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,NOW())');
            $req->execute(array(
                $username,
                $business_name,
               
                $email,
                $fileName,
                $contact_name,
                $password,
                $role,
                $status,
                $user_desc,
                $address,
                $phone_number,
                $whatsapp_number,
                $latitude,
                $longitude
    
            ));








            /************************* add opening day********************************* */


            $user_id=$bdd->lastInsertId();

            $Monday=$_POST['Monday'];
            $Monday_open=$_POST['Monday_open'];
            $Monday_close=$_POST['Monday_close'];

         

if($Monday_open!="" || $Monday_close!=""){
    $req2=$bdd->prepare('INSERT INTO `opening_hours`( `user_id`, `weekday`, `open_hour`, `close_hour`, `date_creation`) VALUES(?,?,?,?,NOW())');
    $req2->execute(array($user_id,$Monday,$Monday_open,$Monday_close));
}



            //********** Tuesday  ******** */
      

            $Tuesday=$_POST['Tuesday'];
            $Tuesday_open=$_POST['Tuesday_open'];
            $Tuesday_close=$_POST['Tuesday_close'];

            if($Tuesday_open!="" || $Tuesday_close!=""){
            $req3=$bdd->prepare('INSERT INTO `opening_hours`( `user_id`, `weekday`, `open_hour`, `close_hour`, `date_creation`) VALUES(?,?,?,?,NOW())');
            $req3->execute(array($user_id,$Tuesday,$Tuesday_open,$Tuesday_close));
            }
                        //********** Wednesday  ******** */
      

                        $Wednesday=$_POST['Wednesday'];
                        $Wednesday_open=$_POST['Wednesday_open'];
                        $Wednesday_close=$_POST['Wednesday_close'];
            
                        if($Wednesday_open!="" || $Wednesday_close!=""){
                        $req4=$bdd->prepare('INSERT INTO `opening_hours`( `user_id`, `weekday`, `open_hour`, `close_hour`, `date_creation`) VALUES(?,?,?,?,NOW())');
                        $req4->execute(array($user_id,$Wednesday,$Wednesday_open,$Wednesday_close));
                        }


                                    //********** Thursday  ******** */
      

                                    $Thursday=$_POST['Thursday'];
                                    $Thursday_open=$_POST['Thursday_open'];
                                    $Thursday_close=$_POST['Thursday_close'];
                                    if($Thursday_open!="" || $Thursday_close!=""){
                        
                                    $req5=$bdd->prepare('INSERT INTO `opening_hours`( `user_id`, `weekday`, `open_hour`, `close_hour`, `date_creation`) VALUES(?,?,?,?,NOW())');
                                    $req5->execute(array($user_id,$Thursday,$Thursday_open,$Thursday_close));
                                    }
            
                                            //********** Friday  ******** */
      

                                            $Friday=$_POST['Friday'];
                                            $Friday_open=$_POST['Friday_open'];
                                            $Friday_close=$_POST['Friday_close'];
                                
                                            if($Friday_open!="" || $Friday_close!=""){
                                            $req6=$bdd->prepare('INSERT INTO `opening_hours`( `user_id`, `weekday`, `open_hour`, `close_hour`, `date_creation`) VALUES(?,?,?,?,NOW())');
                                            $req6->execute(array($user_id,$Friday,$Friday_open,$Friday_close));
                                            }
                                            //********** Saturday  ******** */
      

                                            $Saturday=$_POST['Saturday'];
                                            $Saturday_open=$_POST['Saturday_open'];
                                            $Saturday_close=$_POST['Saturday_close'];
                                
                                            if($Saturday_open!="" || $Saturday_close!=""){
                                            $req7=$bdd->prepare('INSERT INTO `opening_hours`( `user_id`, `weekday`, `open_hour`, `close_hour`, `date_creation`) VALUES(?,?,?,?,NOW())');
                                            $req7->execute(array($user_id,$Saturday,$Saturday_open,$Saturday_close));
                                            }
                                            //********** Sunday  ******** */
      

                                            $Sunday=$_POST['Sunday'];
                                            $Sunday_open=$_POST['Sunday_open'];
                                            $Sunday_close=$_POST['Sunday_close'];
                                            if($Sunday_open!="" || $Sunday_close!=""){
                                
                                            $req8=$bdd->prepare('INSERT INTO `opening_hours`( `user_id`, `weekday`, `open_hour`, `close_hour`, `date_creation`) VALUES(?,?,?,?,NOW())');
                                            $req8->execute(array($user_id,$Sunday,$Sunday_open,$Sunday_close));
                                            }
            /******************************************************** */
             echo json_encode(array("reponse"=>"true"));


 include ('mail.php');
            
            
        }catch (Exception $e) {
            $msg = $e->getMessage();
              echo json_encode(array("reponse"=>"false","message"=>$msg));
        
         
        }
}



}


       
?>