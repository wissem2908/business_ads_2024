<?php
include 'config.php';
function check_expiration($date) {
    $today = new DateTimeImmutable();
    $expirationDate = new DateTimeImmutable($date);
    $diff = $today->diff($expirationDate);
    $days = $diff->days;
    
    if ($days <= 45) {
      return false; // not expired
    } else {
      return true; // expired
    }
  }



  try {
    $bdd = new PDO("mysql:host=".DB_SERVER.";dbname=".DB_NAME."; charset=utf8", DB_USER, DB_PASS, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    $req = $bdd->prepare('SELECT * FROM `ads` ');
    $req->execute();
                  
    while($res=$req->fetch(PDO::FETCH_ASSOC)){
       $activation_date= $res['activation_date'];
      
       if (check_expiration($activation_date)) {
        echo "The date has expired $res[status] <br/>  ";


        $id_ads = $res['ads_id'];
         $req2 = $bdd->prepare('UPDATE `ads` SET `status`="inactive" where ads_id=?  ');
         $req2->execute(array($id_ads));

    } else {
        echo "The date has not expired $res[status]  <br/>";
    }
  }//fin while
        
     
        }catch (Exception $e) {
            $msg = $e->getMessage();
            echo json_encode(array("reponse"=>"false",$msg));
          
         
        }




?>