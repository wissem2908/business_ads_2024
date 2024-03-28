<?php


include 'config.php';

if(!isset($_POST['username']) || empty($_POST['username']) || !isset($_POST['password']) || empty($_POST['password']) ){

	die(json_encode(array('reponse'=>'false',"message"=>1)));
}else{
	$username=$_POST['username'];
	$password=$_POST['password'];
	$password=sha1($password);
	  try {

            //connexion a la base de données
            $bdd = new PDO("mysql:host=".DB_SERVER.";dbname=".DB_NAME."; charset=utf8", DB_USER, DB_PASS, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    

    //select user
  
            $req = $bdd->prepare('SELECT * FROM `normal_users` WHERE  username=? and password=?');
		    $req->execute(array(
               $username,$password
            ));
           

           $count=$req->rowCount();
        $res=$req->fetch(PDO::FETCH_ASSOC);
       
           if($count>0){

           	if($res['status']=="inactive"){
				die(json_encode(array('reponse'=>'false',"message"=>2)));
           	}else{
           		session_start();
           		$_SESSION['username']=$res['username'];
           		$_SESSION['role']="normal_user";
           		$_SESSION['login']="yes";
           		$_SESSION['user_id']=$res['id_user'];
         
           		echo json_encode(array("reponse"=>"true"));

           	}

           }else{
           		die(json_encode(array('reponse'=>'false',"message"=>3)));
           }
        }catch (Exception $e) {
            $msg = $e->getMessage();
            die(json_encode(array('reponse'=>'false',"message"=> $msg)));
           
         
        }
}

?>