<?php


include 'config.php';
  try {

            //connexion a la base de données
            $bdd = new PDO("mysql:host=".DB_SERVER.";dbname=".DB_NAME."; charset=utf8", DB_USER, DB_PASS, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    



            if($_POST['search']==''){
                $sql ='SELECT * FROM `ads` left join categories on ads.category_id = categories.cat_id left join users on ads.user_id = users.user_id  where 1 ';

                $array=[];
                $state = $_POST['state'];
                $city = $_POST['city'];
                $general_cat = $_POST['general_cat'];
                $sub_categories = $_POST['sub_categories'];
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
             $sql.= ' order by ads.ads_id desc ';
                $req=$bdd->prepare($sql);
                $req->execute($array);
    
                        $output=[];
            while($res=$req->fetch(PDO::FETCH_ASSOC)){
                $output[]= $res;
          }//fin while
    
             
          echo json_encode(array("reponse"=>"true","list"=>$output));
            }else{
                $sql ='SELECT * FROM `ads` left join categories on ads.category_id = categories.cat_id left join users on ads.user_id = users.user_id left join general_categories on ads.general_cat = general_categories.id_gen_cat  where  (ads.ad_title LIKE "%'.$_POST['search'].'%" OR categories.cat_title LIKE "%'.$_POST['search'].'%"   OR general_categories.title_cat LIKE "%'.$_POST['search'].'%" OR ads.keyword LIKE "%'.$_POST['search'].'%" ) ';

                $array=[];
                $state = $_POST['state'];
                $city = $_POST['city'];
                $general_cat = $_POST['general_cat'];
                $sub_categories = $_POST['sub_categories'];
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
                $sql.= ' order by ads.ads_id desc ';
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