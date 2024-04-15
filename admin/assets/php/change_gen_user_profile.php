<?php


include 'config.php';

if( !isset($_POST['email']) || empty($_POST['email']) )
{

    die(json_encode(array('reponse'=>'false',"message"=>1)));
}else{
$user_id=$_POST['user_id'];

$first_name=$_POST['first_name'];
$last_name=$_POST['last_name'];
$email=$_POST['email'];
$phone_number=$_POST['phone_number'];

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

       die(json_encode(array('reponse'=>'false',"message"=>4)));
}



/******************************************/
  try {

            //connexion a la base de données
            $bdd = new PDO("mysql:host=".DB_SERVER.";dbname=".DB_NAME."; charset=utf8", DB_USER, DB_PASS, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    
            // insert user
            $req = $bdd->prepare('UPDATE normal_users SET first_name=?,last_name=?,email=?,mobile_number= ? WHERE id_user=?');
            $req->execute(array(
                $first_name,
                $last_name,
                $email,
                $phone_number,
                $user_id
    
            ));

            /******************************************************** */
             echo json_encode(array("reponse"=>"true"));
        }catch (Exception $e) {
            $msg = $e->getMessage();
              echo json_encode(array("reponse"=>"true","message"=>$msg));
        
         
        }



}


       
?>