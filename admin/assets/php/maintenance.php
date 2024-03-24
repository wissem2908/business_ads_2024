<?php




include 'config.php';
  try {

            //connexion a la base de données
            $bdd = new PDO("mysql:host=".DB_SERVER.";dbname=".DB_NAME."; charset=utf8", DB_USER, DB_PASS, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    

            if(isset($_POST['action']) && $_POST['action']=='change'){
                $value=$_POST['value'];
                $req = $bdd->prepare('UPDATE `maintenance` SET `value`=?');
                $req->execute(array($value));
                    
      
          echo json_encode(array("reponse"=>"true"));
            }
            if(isset($_POST['action']) && $_POST['action']=='get'){

                $req = $bdd->prepare('select * from `maintenance`');
                $req->execute();
                $res=$req->fetch(PDO::FETCH_ASSOC);
                echo json_encode(array("reponse"=>"true", "data"=>$res));
            }

        }catch (Exception $e) {
            $msg = $e->getMessage();
            echo json_encode(array("reponse"=>"false",$msg));
          
         
        }
?>