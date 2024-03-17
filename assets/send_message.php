<?php


include 'config.php';
  try {

    $fullName=$_POST['fullName'];
    $email=$_POST['email'];
    $message = $_POST['message'];
    
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

    die(json_encode(array('reponse'=>'false',"message"=>1)));
}

            //connexion a la base de données
            $bdd = new PDO("mysql:host=".DB_SERVER.";dbname=".DB_NAME."; charset=utf8", DB_USER, DB_PASS, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    
           
            $req = $bdd->prepare('INSERT INTO `contact`(`full_name`, `email`, `message`, `creation_date`) VALUES(?,?,?,NOW())');
            $req->execute(array($fullName,$email,$message));
             
      echo json_encode(array("reponse"=>"true"));
        }catch (Exception $e) {
            $msg = $e->getMessage();
            echo json_encode(array("reponse"=>"false",$msg));
          
         
        }
?>