<?php


include 'config.php';
  try {




            //connexion a la base de données
            $bdd = new PDO("mysql:host=".DB_SERVER.";dbname=".DB_NAME."; charset=utf8", DB_USER, DB_PASS, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    

            $sql ='SELECT * FROM `ads` left join categories on ads.category_id = categories.cat_id left join users on ads.user_id = users.user_id  where 1 ';

            $array=[];
         
            $req=$bdd->prepare($sql);
            $req->execute($array);

                    $output=[];
        while($res=$req->fetch(PDO::FETCH_ASSOC)){
            $output[]= $res;
      }//fin while

         
      echo json_encode(array("reponse"=>"true","list"=>$output));

        }catch (Exception $e) {
            $msg = $e->getMessage();
            echo json_encode(array("reponse"=>"false",$msg));
          
         
        }
?>