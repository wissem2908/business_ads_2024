<?php


include 'config.php';
  try {
    $ad_id=$_POST['ad_id'];

    $username=$_POST['username'];

            //connexion a la base de données
            $bdd = new PDO("mysql:host=".DB_SERVER.";dbname=".DB_NAME."; charset=utf8", DB_USER, DB_PASS, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    
           
            $req = $bdd->prepare('SELECT *,users.status as user_status FROM `ads` left join users on ads.user_id = users.user_id left join states on ads.state=states.state_code left join cities on ads.cities=cities.id_city WHERE ads.ads_id =? and users.username=? and users.status="active"');
            $req->execute(array($ad_id,$username));
                  
        $res=$req->fetch(PDO::FETCH_ASSOC);
        
      echo json_encode(array("reponse"=>"true","result"=>$res));
        }catch (Exception $e) {
            $msg = $e->getMessage();
            echo json_encode(array("reponse"=>"false",$msg));
          
         
        }
?>