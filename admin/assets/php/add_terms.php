<?php


include 'config.php';
$terms_desc=$_POST['terms_desc'];

try {

    //connexion a la base de données
    $bdd = new PDO("mysql:host=".DB_SERVER.";dbname=".DB_NAME."; charset=utf8", DB_USER, DB_PASS, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    $req= $bdd->prepare('UPDATE `terms` SET description=? where id_terms=1 ');
            $req->execute(array(
            	$terms_desc
            ));
            echo json_encode(array("reponse"=>"true"));
}catch (Exception $e) {
    $msg = $e->getMessage();
      echo json_encode(array("reponse"=>"true","message"=>$msg));

 
}