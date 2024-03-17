<?php


include 'config.php';
  try {

            //connexion a la base de données
            $bdd = new PDO("mysql:host=".DB_SERVER.";dbname=".DB_NAME."; charset=utf8", DB_USER, DB_PASS, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    
           if($_POST['search']==""){
            $req = $bdd->prepare('SELECT * FROM `users` where status="active" and role="user"  ORDER BY RAND ( ) limit 9 ');
            $req->execute();
                    $output=[];
        while($res=$req->fetch(PDO::FETCH_ASSOC)){
            $output[]= $res;
      }//fin while
      echo json_encode(array("reponse"=>"true","list"=>$output));
           }else{

            $req = $bdd->prepare('SELECT * FROM `users` where status="active" and role="user" and (business_name LIKE "%'.$_POST['search'].'%" OR username LIKE "%'.$_POST['search'].'%"  ) order by business_name  limit 9');
            $req->execute();
                    $output=[];
        while($res=$req->fetch(PDO::FETCH_ASSOC)){
            $output[]= $res;
      }//fin while
      echo json_encode(array("reponse"=>"true","list"=>$output));
           }
        
        }catch (Exception $e) {
            $msg = $e->getMessage();
            echo json_encode(array("reponse"=>"false",$msg));
          
         
        }
?>