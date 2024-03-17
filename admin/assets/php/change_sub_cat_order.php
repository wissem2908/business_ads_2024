<?php


include 'config.php';



   try {

    $allData = $_POST['allData'];
    $i = 1;

            //connexion a la base de données
            $bdd = new PDO("mysql:host=".DB_SERVER.";dbname=".DB_NAME."; charset=utf8", DB_USER, DB_PASS, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    
            foreach ($allData as $key => $value) {
                  
            $req = $bdd->prepare('UPDATE `sub_categories` SET display_order=? where id_sub_cat=? ');
            $req->execute(array($i,$value));

             
                $i++;
            }

            
          
               
      echo json_encode(array("reponse"=>"true"));
        }catch (Exception $e) {
            $msg = $e->getMessage();
            echo json_encode(array("reponse"=>"false",$msg));
          
         
        }   


?>