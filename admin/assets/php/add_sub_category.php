<?php


include 'config.php';


if(!isset($_POST['sub_cat_title']) || empty($_POST['sub_cat_title'])  )
{

    die(json_encode(array('reponse'=>'false',"message"=>1)));
}else{
$cat_title=$_POST['sub_cat_title'];

$id_cat = $_POST['cat_id'];

  try {

            //connexion a la base de données
            $bdd = new PDO("mysql:host=".DB_SERVER.";dbname=".DB_NAME."; charset=utf8", DB_USER, DB_PASS, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    



            /************************************************** */
         

     
            $req = $bdd->prepare('INSERT INTO `sub_categories`(`id_gen_cat`, `sub_cat_title`) VALUES (?,?)');
            $req->execute(array(
              
                $id_cat,$cat_title ));

             echo json_encode(array("reponse"=>"true"));
 }catch (Exception $e) {
            $msg = $e->getMessage();
              echo json_encode(array("reponse"=>"false","message"=>$msg));
        
         
        }
}




       
?>