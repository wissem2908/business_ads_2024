<?php


include 'config.php';
  try {

    $blog_id=$_POST['blog_id'];

            //connexion a la base de données
            $bdd = new PDO("mysql:host=".DB_SERVER.";dbname=".DB_NAME."; charset=utf8", DB_USER, DB_PASS, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
          
            $req2=$bdd->prepare('select * from blog where id_blog=? ');
            $req2->execute(array($blog_id));
            $res=$req2->fetch(PDO::FETCH_ASSOC);
            unlink('../../blog_images/'.$res['blog_image']);
           
            $req = $bdd->prepare('DELETE FROM `blog` WHERE  id_blog =?');
            $req->execute(array($blog_id ));



        
               
      echo json_encode(array("reponse"=>"true"));
        }catch (Exception $e) {
            $msg = $e->getMessage();
            echo json_encode(array("reponse"=>"false",$msg));
          
         
        }
?>