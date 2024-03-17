<?php


include 'config.php';
  try {

    $contact_id=$_POST['contact_id'];


    $user_id=$_POST['user_id'];


            //connexion a la base de données
            $bdd = new PDO("mysql:host=".DB_SERVER.";dbname=".DB_NAME."; charset=utf8", DB_USER, DB_PASS, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    
           
            $req = $bdd->prepare('UPDATE `contact_user` SET `status`=1 WHERE contact_user_id=?');
            $req->execute(array($contact_id));
               


$req2=$bdd->prepare('select * from `contact_user` where contact_user_id=?  ');
$req2->execute(array($contact_id));
$res=$req2->fetch(PDO::FETCH_ASSOC);

$fullName=$res['full_name_user'];



               /************************* notification **************************************/

             


        $message="New Message from ".$fullName;

        $req2 = $bdd->prepare('INSERT INTO `notification`(`user_id`,role, `type`, `status`, `notification`, `date_creation`) VALUES(?,?,?,?,?,NOW())');
        $req2->execute(array($user_id,'user','message_approved',0,$message));
        





      echo json_encode(array("reponse"=>"true"));
        }catch (Exception $e) {
            $msg = $e->getMessage();
            echo json_encode(array("reponse"=>"false",$msg));
          
         
        }
?>