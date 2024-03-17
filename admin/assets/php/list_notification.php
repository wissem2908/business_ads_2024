<?php

session_start();

$role=$_SESSION['role'];
$user_id=$_SESSION['user_id'];

include 'config.php';


if($role=='admin'){
    try {

        //connexion a la base de données
        $bdd = new PDO("mysql:host=".DB_SERVER.";dbname=".DB_NAME."; charset=utf8", DB_USER, DB_PASS, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

       
        $req = $bdd->prepare('SELECT *, DATE_FORMAT(date_creation, "%d/%m/%Y  %H:%i:%s") AS date_creation FROM `notification` where role="admin"  order by id_notification  desc');
        $req->execute(array());
                $output=[];
    while($res=$req->fetch(PDO::FETCH_ASSOC)){
        $output[]= $res;
  }//fin while
  echo json_encode(array("reponse"=>"true","list"=>$output));
    }catch (Exception $e) {
        $msg = $e->getMessage();
        echo json_encode(array("reponse"=>"false",$msg));
      
     
    }
}elseif($role=='user'){
    try {

        //connexion a la base de données
        $bdd = new PDO("mysql:host=".DB_SERVER.";dbname=".DB_NAME."; charset=utf8", DB_USER, DB_PASS, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

       
        $req = $bdd->prepare('SELECT * FROM `notification` where role="user"  and user_id=? order by id_notification  desc');
        $req->execute(array($user_id));
                $output=[];
    while($res=$req->fetch(PDO::FETCH_ASSOC)){
        $output[]= $res;
  }//fin while
  echo json_encode(array("reponse"=>"true","list"=>$output));
    }catch (Exception $e) {
        $msg = $e->getMessage();
        echo json_encode(array("reponse"=>"false",$msg));
      
     
    }
}

?>