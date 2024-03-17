<?php


include 'config.php';

session_start();

$user_id=$_SESSION['user_id'];
$role=$_SESSION['role'];


if($role=="admin"){

    try {


        //connexion a la base de données
        $bdd = new PDO("mysql:host=".DB_SERVER.";dbname=".DB_NAME."; charset=utf8", DB_USER, DB_PASS, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

       $req=$bdd->prepare('UPDATE `notification` SET `status`=1 WHERE role = "admin" and status=0');
       $req->execute();
   
      
    
  echo json_encode(array("reponse"=>"true"));
    }catch (Exception $e) {
        $msg = $e->getMessage();
        echo json_encode(array("reponse"=>"false",$msg));
      
     
    }

}elseif($role=="user"){

    try {


        //connexion a la base de données
        $bdd = new PDO("mysql:host=".DB_SERVER.";dbname=".DB_NAME."; charset=utf8", DB_USER, DB_PASS, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

       $req=$bdd->prepare('UPDATE `notification` SET `status`=1 WHERE role = "user" and user_id=? and status=0');
       $req->execute(array($user_id));
       
      
    
  echo json_encode(array("reponse"=>"true"));
    }catch (Exception $e) {
        $msg = $e->getMessage();
        echo json_encode(array("reponse"=>"false",$msg));
      
     
    }

}


?>