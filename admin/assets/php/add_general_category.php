<?php


include 'config.php';


if(!isset($_POST['cat_title']) || empty($_POST['cat_title'])  )
{

    die(json_encode(array('reponse'=>'false',"message"=>1)));
}else{
$cat_title=$_POST['cat_title'];



  try {

            //connexion a la base de données
            $bdd = new PDO("mysql:host=".DB_SERVER.";dbname=".DB_NAME."; charset=utf8", DB_USER, DB_PASS, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    



            /************************************************** */
         

     
            $req = $bdd->prepare('INSERT INTO `general_categories`( `title_cat`, `date_creation`)  VALUES(?,NOW())');
            $req->execute(array(
              
                $cat_title  ));

             echo json_encode(array("reponse"=>"true"));
 }catch (Exception $e) {
            $msg = $e->getMessage();
              echo json_encode(array("reponse"=>"false","message"=>$msg));
        
         
        }
}




       
?>