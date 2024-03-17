<?php


include 'config.php';


$user_id=$_POST['user_id'];
$fullName=$_POST['fullName'];

  try {
    

            //connexion a la base de données
            $bdd = new PDO("mysql:host=".DB_SERVER.";dbname=".DB_NAME."; charset=utf8", DB_USER, DB_PASS, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    
           
            $req = $bdd->prepare('SELECT * FROM users where user_id=?');
            $req->execute(array($user_id));
                  
    
        $res=$req->fetch(PDO::FETCH_ASSOC);

        $message=$fullName." sent message to ".$res['business_name'];

        $req2 = $bdd->prepare('INSERT INTO `notification`(`user_id`,role, `type`, `status`, `notification`, `date_creation`) VALUES(?,?,?,?,?,NOW())');
        $req2->execute(array($user_id,'admin','message_sent',0,$message));
        
      echo json_encode(array("reponse"=>"true"));
        }catch (Exception $e) {
            $msg = $e->getMessage();
            echo json_encode(array("reponse"=>"false",$msg));
          
         
        }
?>