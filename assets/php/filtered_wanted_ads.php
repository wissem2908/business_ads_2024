<?php


include 'config.php';
  try {

            //connexion a la base de données
            $bdd = new PDO("mysql:host=".DB_SERVER.";dbname=".DB_NAME."; charset=utf8", DB_USER, DB_PASS, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    



            if($_POST['search']==''){
                $sql ='SELECT * FROM `general_users_ads` left join categories on general_users_ads.category_id = categories.cat_id left join normal_users on general_users_ads.user_id = normal_users.id_user  where 1 ';

                $array=[];
                $state = $_POST['state'];
                $city = $_POST['city'];
                $general_cat = $_POST['general_cat'];
                $sub_categories = $_POST['sub_categories'];
                if($state!=""){
                    $sql.= " and general_users_ads.state = ?";
                    array_push($array,$state);
                }
                if($city!=""){
                    $sql.= " and general_users_ads.cities = ?";
                    array_push($array,$city);
                }
                if($general_cat!=""){
                    $sql.= " and general_users_ads.general_cat = ?";
                    array_push($array,$general_cat);
                }
                
                if($sub_categories!=""){
                    $sql.= " and general_users_ads.suub_cat = ?";
                    array_push($array,$sub_categories);
                }
             $sql.= ' order by general_users_ads.ads_id desc ';
                $req=$bdd->prepare($sql);
                $req->execute($array);
    
                        $output=[];
            while($res=$req->fetch(PDO::FETCH_ASSOC)){
                $output[]= $res;
          }//fin while
    
             
          echo json_encode(array("reponse"=>"true","list"=>$output));
            }else{
                $sql ='SELECT * FROM `general_users_ads` left join categories on general_users_ads.category_id = categories.cat_id left join normal_users on general_users_ads.user_id = normal_users.id_user  where  (general_users_ads.ad_title LIKE "%'.$_POST['search'].'%" OR categories.cat_title LIKE "%'.$_POST['search'].'%"   OR general_users_ads.keyword LIKE "%'.$_POST['search'].'%" ) ';

                $array=[];
                $state = $_POST['state'];
                $city = $_POST['city'];
                $general_cat = $_POST['general_cat'];
                $sub_categories = $_POST['sub_categories'];
                if($state!=""){
                    $sql.= " and general_users_ads.state = ?";
                    array_push($array,$state);
                }
                if($city!=""){
                    $sql.= " and general_users_ads.cities = ?";
                    array_push($array,$city);
                }
                if($general_cat!=""){
                    $sql.= " and general_users_ads.general_cat = ?";
                    array_push($array,$general_cat);
                }
                
                if($sub_categories!=""){
                    $sql.= " and general_users_ads.suub_cat = ?";
                    array_push($array,$sub_categories);
                }
                $sql.= ' order by general_users_ads.ads_id desc ';
                $req=$bdd->prepare($sql);
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