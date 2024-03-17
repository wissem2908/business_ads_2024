<?php


include 'config.php';
  try {

            //connexion a la base de données
            $bdd = new PDO("mysql:host=".DB_SERVER.";dbname=".DB_NAME."; charset=utf8", DB_USER, DB_PASS, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    


//****************** total users **************************************************//
           
            $req = $bdd->prepare('SELECT * FROM `users`  where role="user"');
            $req->execute();

            $totalUser = $req->rowCount();

/************************ active user **********************************************/
$req2 = $bdd->prepare('SELECT * FROM `users`  where role="user" and status ="active"');
$req2->execute();

$activeUser = $req2->rowCount();


/***************************** inactive user ****************************************/
$req3 = $bdd->prepare('SELECT * FROM `users` where role="user" and status ="inactive"');
$req3->execute();

$inactiveUser = $req3->rowCount();


/************************* monthly user creation **************************************/

$req4 = $bdd->prepare('SELECT
SUM(CASE WHEN MONTH(creation_date) = 1 THEN 1 ELSE 0 END) AS Jan,
SUM(CASE WHEN MONTH(creation_date) = 2 THEN 1 ELSE 0 END) AS Feb,
SUM(CASE WHEN MONTH(creation_date) = 3 THEN 1 ELSE 0 END) AS Mar,
SUM(CASE WHEN MONTH(creation_date) = 4 THEN 1 ELSE 0 END) AS Apr,
SUM(CASE WHEN MONTH(creation_date) = 5 THEN 1 ELSE 0 END) AS May,
SUM(CASE WHEN MONTH(creation_date) = 6 THEN 1 ELSE 0 END) AS Jun,
SUM(CASE WHEN MONTH(creation_date) = 7 THEN 1 ELSE 0 END) AS Jul,
SUM(CASE WHEN MONTH(creation_date) = 8 THEN 1 ELSE 0 END) AS Aug,
SUM(CASE WHEN MONTH(creation_date) = 9 THEN 1 ELSE 0 END) AS Sep,
SUM(CASE WHEN MONTH(creation_date) = 10 THEN 1 ELSE 0 END) AS Oct,
SUM(CASE WHEN MONTH(creation_date) = 11 THEN 1 ELSE 0 END) AS Nov,
SUM(CASE WHEN MONTH(creation_date) = 12 THEN 1 ELSE 0 END) AS December
FROM users
WHERE role = "user" AND YEAR(creation_date) = YEAR(CURRENT_DATE)');
$req4->execute();

$output=[];
        while($res=$req4->fetch(PDO::FETCH_ASSOC)){
            $output[]= $res;
      }//fin while


      /************************************* total admin ads******************************************** */
      $req7=$bdd->prepare('select * from ads ');
$req7->execute();

$totalAdsAdmin=$req7->rowCount();

/**************************************** active admin ads************************************************* */
$req8=$bdd->prepare('select * from ads where  status="active"');
$req8->execute();

$activeAdsAdmin=$req8->rowCount();

/*************************** total ads *********************************************************** */

session_start();
$user_id=$_SESSION['user_id'];

$req5=$bdd->prepare('select * from ads where user_id = ? ');
$req5->execute(array($user_id));

$totalAds=$req5->rowCount();

/**************************** active ads ********************************************************************* */

$req5=$bdd->prepare('select * from ads where user_id = ?  and status="active"');
$req5->execute(array($user_id));

$activeAds=$req5->rowCount();

/**************************** inactive ads ********************************************************************* */

$req5=$bdd->prepare('select * from ads where user_id = ?  and status="inactive"');
$req5->execute(array($user_id));

$inactiveAds=$req5->rowCount();


      echo json_encode(array("reponse"=>"true","totalUser"=>$totalUser,"activeUser"=>$activeUser,"inactiveUser"=>$inactiveUser,'monthlyUser'=>$output,'totalAds'=>$totalAds,"activeAds"=>$activeAds,"inactiveAds"=>$inactiveAds,"totalAdsAdmin"=>$totalAdsAdmin,"activeAdsAdmin"=>$activeAdsAdmin));







        }catch (Exception $e) {
            $msg = $e->getMessage();
            echo json_encode(array("reponse"=>"false",$msg));
          
         
        }
?>