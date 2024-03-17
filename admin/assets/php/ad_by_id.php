<?php


include 'config.php';
  try {
    $ads_id=$_POST['ads_id'];

            //connexion a la base de données
            $bdd = new PDO("mysql:host=".DB_SERVER.";dbname=".DB_NAME."; charset=utf8", DB_USER, DB_PASS, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    
           
            $req = $bdd->prepare('SELECT * FROM `ads` where ads_id =?');
            $req->execute(array($ads_id));
                  
        $res=$req->fetch(PDO::FETCH_ASSOC);
        
      echo json_encode(array("reponse"=>"true","result"=>$res));
        }catch (Exception $e) {
            $msg = $e->getMessage();
            echo json_encode(array("reponse"=>"false",$msg));
          
         
        }
?>