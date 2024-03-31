<?php


include 'config.php';
  try {

    $ads_id=$_POST['ads_id'];

            //connexion a la base de données
            $bdd = new PDO("mysql:host=".DB_SERVER.";dbname=".DB_NAME."; charset=utf8", DB_USER, DB_PASS, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    
           

            $req2=$bdd->prepare('select * from general_users_ads where ads_id=? ');

            $req2->execute(array($ads_id));

            $res=$req2->fetch(PDO::FETCH_ASSOC);
            if($res["ad_image"]!=''){
              unlink('../../ads_images/'.$res["ad_image"]);
            }
           


            $req3=$bdd->prepare('select * from images where ad_id=? ');
            $req3->execute(array($ads_id));
            while($res=$req3->fetch(PDO::FETCH_ASSOC)){
              unlink('../../ads_images/'.$res["path"]);
        }//fin while




            $req = $bdd->prepare('DELETE FROM `general_users_ads` WHERE ads_id=?');
            $req->execute(array($ads_id));
               
      echo json_encode(array("reponse"=>"true"));
        }catch (Exception $e) {
            $msg = $e->getMessage();
            echo json_encode(array("reponse"=>"false",$msg));
          
         
        }
?>