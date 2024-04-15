<?php


include 'config.php';


if(!isset($_POST['username']) || empty($_POST['username']) || !isset($_POST['password']) || empty($_POST['password']) || !isset($_POST['email']) || empty($_POST['email']) )
{

    die(json_encode(array('reponse'=>'false',"message"=>1)));
}else{
$username=$_POST['username'];
$first_name=$_POST['first_name'];
$last_name=$_POST['last_name'];
$email=$_POST['email'];
$password_user=$_POST['password'];
$password=sha1($password_user);
$status=$_POST['status'];
$phone_number=$_POST['phone_number'];


if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

       die(json_encode(array('reponse'=>'false',"message"=>4)));
}

if(!ctype_alnum($username)){
      die(json_encode(array('reponse'=>'false',"message"=>2)));
}


/******************************************/
//verify if username exist
  try {

            //connexion a la base de données
            $bdd = new PDO("mysql:host=".DB_SERVER.";dbname=".DB_NAME."; charset=utf8", DB_USER, DB_PASS, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

$req1 = $bdd->prepare('select * from normal_users where username =?');
$req1->execute(array($username));
$count = $req1->rowCount();

$req2 = $bdd->prepare('select * from normal_users where email =?');
$req2->execute(array($email));
$email_exist = $req2->rowCount();
 }catch (Exception $e) {
            $msg = $e->getMessage();
              echo json_encode(array("reponse"=>"true","message"=>$msg));
        
          
        }

        /**************************************************************/
        if($email_exist>0){
            die(json_encode(array('reponse'=>'false',"message"=>6)));
        }
if($count>0){
    die(json_encode(array('reponse'=>'false',"message"=>5)));
}
else{



/*********************** */


  try {

            //connexion a la base de données
            $bdd = new PDO("mysql:host=".DB_SERVER.";dbname=".DB_NAME."; charset=utf8", DB_USER, DB_PASS, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    
            // insert user
            $req = $bdd->prepare('INSERT INTO `normal_users`(`username`, `first_name`, `last_name`, `email`, `mobile_number`, `active`, `status`, `password`, `creation_date`) VALUES(?,?,?,?,?,?,?,?,NOW()) ');
            $req->execute(array(
                $username,
                $first_name,
                $last_name,
                $email,
                $phone_number,
              1,
              $status,
                $password
            ));









      

            /******************************************************** */
             echo json_encode(array("reponse"=>"true"));


 include ('mail.php');
            
            
        }catch (Exception $e) {
            $msg = $e->getMessage();
              echo json_encode(array("reponse"=>"false","message"=>$msg));
        
         
        }
}



}


       
?>