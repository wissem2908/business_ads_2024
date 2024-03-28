<?php


include 'config.php';

if(isset($_POST['status']) && $_POST['status']=='inactive'){
   try {

    $user_id=$_POST['user_id'];

            //connexion a la base de données
            $bdd = new PDO("mysql:host=".DB_SERVER.";dbname=".DB_NAME."; charset=utf8", DB_USER, DB_PASS, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    
           
            $req = $bdd->prepare('UPDATE `normal_users` SET `status` ="inactive" where id_user=?');
            $req->execute(array($user_id));
               
      echo json_encode(array("reponse"=>"true"));
        }catch (Exception $e) {
            $msg = $e->getMessage();
            echo json_encode(array("reponse"=>"false",$msg));
          
         
        }   
}
if(isset($_POST['status']) && $_POST['status']=='active'){
   try {

    $user_id=$_POST['user_id'];

            //connexion a la base de données
            $bdd = new PDO("mysql:host=".DB_SERVER.";dbname=".DB_NAME."; charset=utf8", DB_USER, DB_PASS, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    
           
            $req = $bdd->prepare('UPDATE `normal_users` SET `status` ="active" where id_user=?');
            $req->execute(array($user_id));
               
      echo json_encode(array("reponse"=>"true"));
        }catch (Exception $e) {
            $msg = $e->getMessage();
            echo json_encode(array("reponse"=>"false",$msg));
          
         
        }   
}

?>