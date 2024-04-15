<?php


include 'config.php';
  try {
    $ad_id=$_POST['ad_id'];

    $username=$_POST['username'];

            //connexion a la base de données
            $bdd = new PDO("mysql:host=".DB_SERVER.";dbname=".DB_NAME."; charset=utf8", DB_USER, DB_PASS, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    
           
            $req = $bdd->prepare('SELECT *,normal_users.status as user_status FROM `general_users_ads` left join normal_users on general_users_ads.user_id = normal_users.id_user left join states on general_users_ads.state=states.state_code left join cities on general_users_ads.cities=cities.id_city WHERE general_users_ads.ads_id =? and normal_users.username=? and normal_users.status="active"');
            $req->execute(array($ad_id,$username));
                  
        $res=$req->fetch(PDO::FETCH_ASSOC);
        
      echo json_encode(array("reponse"=>"true","result"=>$res));
        }catch (Exception $e) {
            $msg = $e->getMessage();
            echo json_encode(array("reponse"=>"false",$msg));
          
         
        }
?>