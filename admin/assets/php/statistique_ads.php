<?php


include 'config.php';
  try {

            //connexion a la base de données
            $bdd = new PDO("mysql:host=".DB_SERVER.";dbname=".DB_NAME."; charset=utf8", DB_USER, DB_PASS, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    




/*************************** total ads *********************************************************** */


$user_id=$_POST['user_id'];

$req5=$bdd->prepare('select * from ads where user_id = ? ');
$req5->execute(array($user_id));

$totalAds=$req5->rowCount();

/**************************** active ads ********************************************************************* */

$req5=$bdd->prepare('select * from ads where user_id = ?  and status="active"');
$req5->execute(array($user_id));

$activeAds=$req5->rowCount();

/**************************** inactive ads ********************************************************************* */

$req5=$bdd->prepare('select * from ads where user_id = ?  and status="inactive"');
$req5->execute(array($user_id));

$inactiveAds=$req5->rowCount();


      echo json_encode(array("reponse"=>"true",'totalAds'=>$totalAds,"activeAds"=>$activeAds,"inactiveAds"=>$inactiveAds));







        }catch (Exception $e) {
            $msg = $e->getMessage();
            echo json_encode(array("reponse"=>"false",$msg));
          
         
        }
?>