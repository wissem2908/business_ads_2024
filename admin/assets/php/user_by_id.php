<?php


include 'config.php';
  try {
    $user_id=$_POST['user_id'];

            //connexion a la base de données
            $bdd = new PDO("mysql:host=".DB_SERVER.";dbname=".DB_NAME."; charset=utf8", DB_USER, DB_PASS, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    
           
            $req = $bdd->prepare('SELECT *, DATE_FORMAT(creation_date, "%d/%m/%Y  %H:%i:%s") AS creation_date FROM `users` where user_id=?');
            $req->execute(array($user_id));
                  
        $res=$req->fetch(PDO::FETCH_ASSOC);
        
      echo json_encode(array("reponse"=>"true","result"=>$res));
        }catch (Exception $e) {
            $msg = $e->getMessage();
            echo json_encode(array("reponse"=>"false",$msg));
          
         
        }
?>