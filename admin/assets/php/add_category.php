<?php


include 'config.php';


if(!isset($_POST['cat_title']) || empty($_POST['cat_title'])  )
{

    die(json_encode(array('reponse'=>'false',"message"=>1)));
}elseif(!preg_match('/^[-a-zA-Z0-9 .]+$/', $_POST['cat_title']) ){
die(json_encode(array('reponse'=>'false',"message"=>5)));
}else{
$cat_title=$_POST['cat_title'];
$user_id=$_POST['user_id'];


  try {

            //connexion a la base de données
            $bdd = new PDO("mysql:host=".DB_SERVER.";dbname=".DB_NAME."; charset=utf8", DB_USER, DB_PASS, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    



            /************************************************** */
            //verify max category 

            $req1 = $bdd->prepare('select * from categories where user_id=? ');
            $req1->execute(array($user_id));

            $count=$req1->rowCount();
            if($count>5){
                die(json_encode(array('reponse'=>'false',"message"=>2)));
            }
            $req2 = $bdd->prepare('select * from categories where user_id=? and cat_title=? ');
            $req2->execute(array($user_id,$cat_title));
             $res=$req2->fetch(PDO::FETCH_ASSOC);
           
             if($res){
                if($cat_title == $res['cat_title']){
                    die(json_encode(array('reponse'=>'false',"message"=>4)));
                }
             }
           
            // insert 
            $req = $bdd->prepare('INSERT INTO `categories`( `user_id`, `cat_title`, `date_creation`) VALUES(?,?,NOW())');
            $req->execute(array(
                $user_id,
                $cat_title  ));

             echo json_encode(array("reponse"=>"true"));
 }catch (Exception $e) {
            $msg = $e->getMessage();
              echo json_encode(array("reponse"=>"false","message"=>$msg));
        
         
        }
}




       
?>