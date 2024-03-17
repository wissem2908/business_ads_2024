<?php


include 'config.php';

if(!isset($_POST['old_pass']) || empty($_POST['old_pass']) || !isset($_POST['new_pass']) || empty($_POST['new_pass']) )
  {

    die(json_encode(array('reponse'=>'false',"message"=>1)));

  } else{
    try {

    $user_id=$_POST['user_id'];
    $old_pass=$_POST['old_pass'];
     $password=$_POST['new_pass'];
  
  

        $password=sha1($password);
            //connexion a la base de données
            $bdd = new PDO("mysql:host=".DB_SERVER.";dbname=".DB_NAME."; charset=utf8", DB_USER, DB_PASS, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    
           
            $req = $bdd->prepare('UPDATE `users` SET `password` =? where user_id=?');
            $req->execute(array($password,$user_id));
               
      echo json_encode(array("reponse"=>"true"));
     


        }catch (Exception $e) {
            $msg = $e->getMessage();
            echo json_encode(array("reponse"=>"false",$msg));
          
         
          

  }
}