<?php


include 'config.php';
$pp_desc=$_POST['pp_desc'];

try {

    //connexion a la base de données
    $bdd = new PDO("mysql:host=".DB_SERVER.";dbname=".DB_NAME."; charset=utf8", DB_USER, DB_PASS, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    $req= $bdd->prepare('UPDATE `privacy_policy` SET description=? where id_pp=1 ');
            $req->execute(array(
            	$pp_desc
            ));
            echo json_encode(array("reponse"=>"true"));
}catch (Exception $e) {
    $msg = $e->getMessage();
      echo json_encode(array("reponse"=>"true","message"=>$msg));

 
}