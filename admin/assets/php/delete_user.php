<?php


include 'config.php';
  try {

    $user_id=$_POST['user_id'];

            //connexion a la base de données
            $bdd = new PDO("mysql:host=".DB_SERVER.";dbname=".DB_NAME."; charset=utf8", DB_USER, DB_PASS, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    
$req2=$bdd->prepare('select * from users where user_id=?');
$req2->execute(array($user_id));

$res=$req2->fetch(PDO::FETCH_ASSOC);



            unlink('../../logo_images/'.$res["logo"]);
            $req = $bdd->prepare('DELETE FROM `users` WHERE user_id=?');
            $req->execute(array($user_id));
               
      echo json_encode(array("reponse"=>"true"));
        }catch (Exception $e) {
            $msg = $e->getMessage();
            echo json_encode(array("reponse"=>"false",$msg));
          
         
        }
?>