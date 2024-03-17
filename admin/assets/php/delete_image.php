<?php


include 'config.php';
  try {

    $id=$_POST['id'];

            //connexion a la base de données
            $bdd = new PDO("mysql:host=".DB_SERVER.";dbname=".DB_NAME."; charset=utf8", DB_USER, DB_PASS, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    
          


            $req2=$bdd->prepare('select * from images where image_id=? ');

            $req2->execute(array($id));

            $res=$req2->fetch(PDO::FETCH_ASSOC);
            unlink('../../ads_images/'.$res["path"]);



            $req = $bdd->prepare('DELETE FROM `images` WHERE image_id=?');
            $req->execute(array($id));
               
      echo json_encode(array("reponse"=>"true"));
        }catch (Exception $e) {
            $msg = $e->getMessage();
            echo json_encode(array("reponse"=>"false",$msg));
          
         
        }
?>