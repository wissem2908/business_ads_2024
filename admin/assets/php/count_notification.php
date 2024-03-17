<?php


include 'config.php';

session_start();

$user_id=$_SESSION['user_id'];
$role=$_SESSION['role'];


if($role=="admin"){

    try {


        //connexion a la base de données
        $bdd = new PDO("mysql:host=".DB_SERVER.";dbname=".DB_NAME."; charset=utf8", DB_USER, DB_PASS, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

       $req=$bdd->prepare('select * from notification where role = "admin" and status = 0');
       $req->execute();
       $count_notification= $req->rowCount();
      
    
  echo json_encode(array("reponse"=>"true","count_notification"=>$count_notification));
    }catch (Exception $e) {
        $msg = $e->getMessage();
        echo json_encode(array("reponse"=>"false",$msg));
      
     
    }

}elseif($role=="user"){

    try {


        //connexion a la base de données
        $bdd = new PDO("mysql:host=".DB_SERVER.";dbname=".DB_NAME."; charset=utf8", DB_USER, DB_PASS, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

       $req=$bdd->prepare('select * from notification where role = "user" and user_id=? and status = 0');
       $req->execute(array($user_id));
       $count_notification= $req->rowCount();
      
    
  echo json_encode(array("reponse"=>"true","count_notification"=>$count_notification));
    }catch (Exception $e) {
        $msg = $e->getMessage();
        echo json_encode(array("reponse"=>"false",$msg));
      
     
    }

}


?>