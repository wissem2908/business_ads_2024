<?php


include 'config.php';
  try {

            //connexion a la base de données
            $bdd = new PDO("mysql:host=".DB_SERVER.";dbname=".DB_NAME."; charset=utf8", DB_USER, DB_PASS, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    
           if($_POST['search']==""){

        $state = $_POST['state'];
        $city = $_POST['city'];
        $general_cat = $_POST['general_cat'];
        $sub_categories = $_POST['sub_categories'];


        $array = [];
        $sql = 'SELECT DISTINCT users.*
        FROM `users`
        LEFT  JOIN ads ON users.user_id = ads.user_id
        WHERE users.status = "active" AND users.role = "user" ';

if($state!=""){
    $sql.= " and ads.state = ?";
    array_push($array,$state);
}
if($city!=""){
    $sql.= " and ads.cities = ?";
    array_push($array,$city);
}
if($general_cat!=""){
    $sql.= " and ads.general_cat = ?";
    array_push($array,$general_cat);
}

if($sub_categories!=""){
    $sql.= " and ads.suub_cat = ?";
    array_push($array,$sub_categories);
}

        $sql .=' ORDER BY users.business_name ';
            $req = $bdd->prepare($sql);
            $req->execute($array);
                    $output=[];
        while($res=$req->fetch(PDO::FETCH_ASSOC)){
            $output[]= $res;
      }//fin while
      echo json_encode(array("reponse"=>"true","list"=>$output));
           }else{
            $state = $_POST['state'];
            $city = $_POST['city'];
            $general_cat = $_POST['general_cat'];
            $sub_categories = $_POST['sub_categories'];


            $array=[];
            $sql='SELECT DISTINCT users.*
            FROM `users`
            LEFT  JOIN ads ON users.user_id = ads.user_id where users.status="active" and users.role="user" and (users.business_name LIKE "%'.$_POST['search'].'%" OR users.username LIKE "%'.$_POST['search'].'%"  ) ';
        



if($state!=""){
    $sql.= " and ads.state = ?";
    array_push($array,$state);
}
if($city!=""){
    $sql.= " and ads.cities = ?";
    array_push($array,$city);
}
if($general_cat!=""){
    $sql.= " and ads.general_cat = ?";
    array_push($array,$general_cat);
}

if($sub_categories!=""){
    $sql.= " and ads.suub_cat = ?";
    array_push($array,$sub_categories);
}
$sql.=' order by users.business_name ';
            $req = $bdd->prepare($sql);




            $req->execute($array);
                    $output=[];
        while($res=$req->fetch(PDO::FETCH_ASSOC)){
            $output[]= $res;
      }//fin while
      echo json_encode(array("reponse"=>"true","list"=>$output));
           }
        
        }catch (Exception $e) {
            $msg = $e->getMessage();
            echo json_encode(array("reponse"=>"false",$msg));
          
         
        }
?>