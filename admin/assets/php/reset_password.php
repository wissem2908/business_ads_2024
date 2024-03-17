<?php


include 'config.php';
  try {
    $user_id=$_POST['user_id'];
    $password_user=$_POST['password'];

            //connexion a la base de données
            $bdd = new PDO("mysql:host=".DB_SERVER.";dbname=".DB_NAME."; charset=utf8", DB_USER, DB_PASS, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    
           
           if(!isset($_POST['password']) || empty($_POST['password'])) {
              die(json_encode(array('reponse'=>'false',"message"=>1)));

           }
           else{

            $passwordhash=sha1($password_user);
              $req = $bdd->prepare('update users set password = ? where user_id =?');
            $req->execute(array($passwordhash,$user_id));


            $req2=$bdd->prepare("select * from users where user_id=?");
            $req2->execute(array($user_id));

          $res=$req2->fetch(PDO::FETCH_ASSOC);
          $username=$res['username'];
            $email=$res['email'];     
                 include 'mail.php'; 
           }
          
 
        
      echo json_encode(array("reponse"=>"true"));
        }catch (Exception $e) {
            $msg = $e->getMessage();
            echo json_encode(array("reponse"=>"false",$msg));
          
         
        }
?>