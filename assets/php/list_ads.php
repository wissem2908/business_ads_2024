<?php


include 'config.php';
  try {


$username=$_POST["username"];
$cat_id=$_POST["cat_id"];



            //connexion a la base de données
            $bdd = new PDO("mysql:host=".DB_SERVER.";dbname=".DB_NAME."; charset=utf8", DB_USER, DB_PASS, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    
           if($cat_id=="all"){
     $req = $bdd->prepare('SELECT * FROM `ads` left join users on ads.user_id = users.user_id  left join categories on ads.category_id=categories.cat_id WHERE  users.username=? and ads.status="active" order by ads_id desc');
            $req->execute(array($username));
                    $output=[];
        while($res=$req->fetch(PDO::FETCH_ASSOC)){
            $output[]= $res;
      }//fin while
}else{
       $req = $bdd->prepare('SELECT * FROM `ads` left join users on ads.user_id = users.user_id left join categories on ads.category_id=categories.cat_id   WHERE  users.username=? and ads.status="active" and ads.category_id=? order by ads_id desc');
            $req->execute(array($username,$cat_id));
                    $output=[];
        while($res=$req->fetch(PDO::FETCH_ASSOC)){
            $output[]= $res;
      }//fin while
}

         
      echo json_encode(array("reponse"=>"true","list"=>$output));
        }catch (Exception $e) {
            $msg = $e->getMessage();
            echo json_encode(array("reponse"=>"false",$msg));
          
         
        }
?>