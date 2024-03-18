<?php


include 'config.php';

if(isset($_POST['status']) && $_POST['status']=='inactive'){
   try {

    $ads_id=$_POST['ads_id'];

            //connexion a la base de données
            $bdd = new PDO("mysql:host=".DB_SERVER.";dbname=".DB_NAME."; charset=utf8", DB_USER, DB_PASS, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    
           
            $req = $bdd->prepare('UPDATE `ads` SET `status` ="inactive" where ads_id=?');
            $req->execute(array($ads_id));
               
      echo json_encode(array("reponse"=>"true"));
        }catch (Exception $e) {
            $msg = $e->getMessage();
            echo json_encode(array("reponse"=>"false",$msg));
          
         
        }   
}
if(isset($_POST['status']) && $_POST['status']=='active'){
   try {

    $ads_id=$_POST['ads_id'];

            //connexion a la base de données
            $bdd = new PDO("mysql:host=".DB_SERVER.";dbname=".DB_NAME."; charset=utf8", DB_USER, DB_PASS, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    
           
            $req = $bdd->prepare('UPDATE `ads` SET `status` ="active" , activation_date=NOW() where ads_id=?');
            $req->execute(array($ads_id));
               
      echo json_encode(array("reponse"=>"true"));
        }catch (Exception $e) {
            $msg = $e->getMessage();
            echo json_encode(array("reponse"=>"false",$msg));
          
         
        }   
}

?>