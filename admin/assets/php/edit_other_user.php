<?php
//print_r($_POST);

include 'config.php';

if(!isset($_POST['username']) || empty($_POST['username']) || !isset($_POST['email']) || empty($_POST['email']) )
{
 
    die(json_encode(array('reponse'=>'false',"message"=>1)));
}else{
    $user_id=$_POST['user_id'];
$username=$_POST['username'];
$first_name=$_POST['first_name'];
$last_name=$_POST['last_name'];
$email=$_POST['email'];
$status=$_POST['status'];
$mobile_number=$_POST['mobile_number'];

//echo $username;
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
 }catch (Exception $e) {
            $msg = $e->getMessage();
              echo json_encode(array("reponse"=>"true","message"=>$msg));
        
         
        }

        if($count>1){
    die(json_encode(array('reponse'=>'false',"message"=>5)));
}else{

}
/************************************************************ */

  try {

            //connexion a la base de données
            $bdd = new PDO("mysql:host=".DB_SERVER.";dbname=".DB_NAME."; charset=utf8", DB_USER, DB_PASS, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    
            // insert user
            $req = $bdd->prepare('UPDATE `normal_users` SET `username`=?,`first_name`=?,`last_name`=?,`email`=?,`status`=?,mobile_number=? WHERE id_user=?');
            $req->execute(array(
                $username,
                $first_name,
                $last_name,
                $email,
                $status,
                $mobile_number,
                $user_id
    
            ));

            /************************************************************************** */



             echo json_encode(array("reponse"=>"true"));
        }catch (Exception $e) {
            $msg = $e->getMessage();
              echo json_encode(array("reponse"=>"false","message"=>$msg));
        
         
        }



}


       
?>