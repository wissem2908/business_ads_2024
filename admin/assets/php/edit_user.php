<?php


include 'config.php';

if(!isset($_POST['username']) || empty($_POST['username']) || !isset($_POST['email']) || empty($_POST['email']) )
{
 
    die(json_encode(array('reponse'=>'false',"message"=>1)));
}else{
    $user_id=$_POST['user_id'];
$username=$_POST['username'];
$business_name=$_POST['business_name'];
$email=$_POST['email'];
$contact_name=$_POST['contact_name'];
$role=$_POST['role'];
$status=$_POST['status'];
$user_desc=$_POST['user_desc'];
$address=$_POST['address'];
$phone_number=$_POST['phone_number'];
$whatsapp_number=$_POST['whatsapp_number'];
$fileName=$_POST['logo_image'];
$latitude = $_POST['latitude'];
$longitude = $_POST['longitude'];

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

       die(json_encode(array('reponse'=>'false',"message"=>4)));
}

if(!ctype_alnum($username)){
      die(json_encode(array('reponse'=>'false',"message"=>2)));
}

/******************************************/
//verify if username exist
  try {

            //connexion a la base de données
            $bdd = new PDO("mysql:host=".DB_SERVER.";dbname=".DB_NAME."; charset=utf8", DB_USER, DB_PASS, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

$req1 = $bdd->prepare('select *from users where username =?');
$req1->execute(array($username));
$count = $req1->rowCount();
 }catch (Exception $e) {
            $msg = $e->getMessage();
              echo json_encode(array("reponse"=>"true","message"=>$msg));
        
         
        }

        if($count>1){
    die(json_encode(array('reponse'=>'false',"message"=>5)));
}else{

}if(isset($_FILES['logo']) && $_FILES['logo']['name']!=""){

    unlink('../../logo_images/'.$fileName);
    $t=time();
    $target_dir = '../../logo_images/';
    $target_file = $target_dir . $t.'_'.basename($_FILES["logo"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    
    $fileName = $t.'_'.basename($_FILES["logo"]["name"]);

if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
 die(json_encode(array('reponse'=>'false',"message"=>3)));
}else{
    
    move_uploaded_file($_FILES["logo"]["tmp_name"], $target_file);
}
}
  try {

            //connexion a la base de données
            $bdd = new PDO("mysql:host=".DB_SERVER.";dbname=".DB_NAME."; charset=utf8", DB_USER, DB_PASS, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    
            // insert user
            $req = $bdd->prepare('UPDATE `users` SET `username`=?,`business_name`=?,`email`=?,`logo`=?,`contact_name`=?,`role`=?,`status`=?,user_desc=?,address=?,phone_number=?, whatsapp_number=?,lat=?,lon=? WHERE user_id=?');
            $req->execute(array(
                $username,
                $business_name,
                
                $email,
                $fileName,
                $contact_name, 
                $role,
                $status,
                $user_desc,
                $address,
                $phone_number,
                $whatsapp_number,
                $latitude,
                $longitude,
                $user_id
    
            ));

            /************************************************************************** */

            


            /************************* edit opening day********************************* */


          

            $Monday=$_POST['Monday'];
            $Monday_open=$_POST['Monday_open'];
            $Monday_close=$_POST['Monday_close'];

         

$req22=$bdd->prepare('select * from  opening_hours where  weekday=? and user_id=?');
$req22->execute(array($Monday,$user_id));

$count22=$req22->rowCount();



if($count22!=0){
    if($Monday_open!='' && $Monday_close!=""){
    $req21=$bdd->prepare('UPDATE `opening_hours` SET `open_hour`=?,`close_hour`=? where user_id=? and weekday=?');
    $req21->execute(array($Monday_open,$Monday_close,$user_id,$Monday));
    }else{
        $req23=$bdd->prepare('DELETE FROM `opening_hours` WHERE  user_id=? and weekday=?');
        $req23->execute(array($user_id,$Monday));
    }
}else{
    if($Monday_open!='' && $Monday_close!=""){
    $req2=$bdd->prepare('INSERT INTO `opening_hours`(`user_id`, `weekday`, `open_hour`, `close_hour`, `date_creation`) VALUES(?,?,?,?,NOW())');
    $req2->execute(array($user_id,$Monday,$Monday_open,$Monday_close));
}
}



            //********** Tuesday  ******** */
         

            


            $Tuesday=$_POST['Tuesday'];
            $Tuesday_open=$_POST['Tuesday_open'];
            $Tuesday_close=$_POST['Tuesday_close'];


            $req33=$bdd->prepare('select * from  opening_hours where  weekday=? and user_id=?');
            $req33->execute(array($Tuesday,$user_id));
            
            $count33=$req33->rowCount();
  
    


            if($count33!=0){
                if($Tuesday_open!='' && $Tuesday_close!=""){
                $req34=$bdd->prepare('UPDATE `opening_hours` SET `open_hour`=?,`close_hour`=? where user_id=? and weekday=?');
                $req34->execute(array($Tuesday_open,$Tuesday_close,$user_id,$Tuesday));
                }
                else{
                    $req24=$bdd->prepare('DELETE FROM `opening_hours` WHERE  user_id=? and weekday=?');
                    $req24->execute(array($user_id,$Tuesday));
                }
            }else{
                if($Tuesday_open!='' && $Tuesday_close!=""){
                $req3=$bdd->prepare('INSERT INTO `opening_hours`(`user_id`, `weekday`, `open_hour`, `close_hour`, `date_creation`) VALUES(?,?,?,?,NOW())');
                $req3->execute(array($user_id,$Tuesday,$Tuesday_open,$Tuesday_close));
            }
            }
            

         

                        //********** Wednesday  ******** */
      

                        $Wednesday=$_POST['Wednesday'];
                        $Wednesday_open=$_POST['Wednesday_open'];
                        $Wednesday_close=$_POST['Wednesday_close'];
            
            

                        $req44=$bdd->prepare('select * from  opening_hours where  weekday=? and user_id=?');
                        $req44->execute(array($Wednesday,$user_id));
                        
                        $count44=$req44->rowCount();
                        if($count44!=0){
                            if($Wednesday_open!='' && $Wednesday_close!=""){
                        $req4=$bdd->prepare('UPDATE `opening_hours` SET `open_hour`=?,`close_hour`=? where user_id=? and weekday=?');
                        $req4->execute(array($Wednesday_open,$Wednesday_close,$user_id,$Wednesday));
                            } else{
                                $req25=$bdd->prepare('DELETE FROM `opening_hours` WHERE  user_id=? and weekday=?');
                                $req25->execute(array($user_id,$Wednesday));
                            }
                        }else{
                            if($Wednesday_open!='' && $Wednesday_close!=""){
                            $req4=$bdd->prepare('INSERT INTO `opening_hours`(`user_id`, `weekday`, `open_hour`, `close_hour`, `date_creation`) VALUES(?,?,?,?,NOW())');
                            $req4->execute(array($user_id,$Wednesday,$Wednesday_open,$Wednesday_close));
                        }
                        }
                        
            





                                    //********** Thursday  ******** */
      

                                    $Thursday=$_POST['Thursday'];
                                    $Thursday_open=$_POST['Thursday_open'];
                                    $Thursday_close=$_POST['Thursday_close'];
                        
                        

                                    $req55=$bdd->prepare('select * from  opening_hours where  weekday=? and user_id=?');
                                    $req55->execute(array($Thursday,$user_id));
                                    
                                    $count55=$req55->rowCount();
                                    if($count55!=0){
                                        if($Thursday_open!='' && $Thursday_close!=""){
                           
                                        $req5=$bdd->prepare('UPDATE `opening_hours` SET `open_hour`=?,`close_hour`=? where user_id=? and weekday=?');
                                        $req5->execute(array($Thursday_open,$Thursday_close,$user_id,$Thursday));
                                        }else{
                                            $req26=$bdd->prepare('DELETE FROM `opening_hours` WHERE  user_id=? and weekday=?');
                                            $req26->execute(array($user_id,$Thursday));
                                        }
                                    }else{
                                          if($Thursday_open!='' && $Thursday_close!=""){
                                        $req5=$bdd->prepare('INSERT INTO `opening_hours`(`user_id`, `weekday`, `open_hour`, `close_hour`, `date_creation`) VALUES(?,?,?,?,NOW())');
                                        $req5->execute(array($user_id,$Thursday,$Thursday_open,$Thursday_close));
                                    }
                                    }
                        
                                    


            
                                            //********** Friday  ******** */
      

                                            $Friday=$_POST['Friday'];
                                            $Friday_open=$_POST['Friday_open'];
                                            $Friday_close=$_POST['Friday_close'];
                                

                                            
                                    $req66=$bdd->prepare('select * from  opening_hours where  weekday=? and user_id=?');
                                    $req66->execute(array($Friday,$user_id));
                                    
                                    $count66=$req66->rowCount();
                                    if($count66!=0){
                                     
                                        if($Friday_open!='' && $Friday_close!=""){
                                        $req6=$bdd->prepare('UPDATE `opening_hours` SET `open_hour`=?,`close_hour`=? where user_id=? and weekday=?');
                                        $req6->execute(array($Friday_open,$Friday_close,$user_id,$Friday));
                                        }else{
                                            $req27=$bdd->prepare('DELETE FROM `opening_hours` WHERE  user_id=? and weekday=?');
                                            $req27->execute(array($user_id,$Friday));
                                        }
                                    }else{
                                        if($Friday_open!='' && $Friday_close!=""){

                                        $req6=$bdd->prepare('INSERT INTO `opening_hours`(`user_id`, `weekday`, `open_hour`, `close_hour`, `date_creation`) VALUES(?,?,?,?,NOW())');
                                        $req6->execute(array($user_id,$Friday,$Friday_open,$Friday_close));
                                    }
                                    }
                        
                                    


                                
                                     
                
                                            //********** Saturday  ******** */
      

                                            $Saturday=$_POST['Saturday'];
                                            $Saturday_open=$_POST['Saturday_open'];
                                            $Saturday_close=$_POST['Saturday_close'];
                                
                                

                                            $req77=$bdd->prepare('select * from  opening_hours where  weekday=? and user_id=?');
                                            $req77->execute(array($Saturday,$user_id));
                                            
                                            $count77=$req77->rowCount();
                                            if($count77!=0){
                                             
                                                if($Saturday_open!='' && $Saturday_close!=""){
                                                $req7=$bdd->prepare('UPDATE `opening_hours` SET `open_hour`=?,`close_hour`=? where user_id=? and weekday=?');
                                                $req7->execute(array($Saturday_open,$Saturday_close,$user_id,$Saturday));
                                                }else{
                                                    $req28=$bdd->prepare('DELETE FROM `opening_hours` WHERE  user_id=? and weekday=?');
                                                    $req28->execute(array($user_id,$Saturday));
                                                }
                                            }else{
                                                 if($Saturday_open!='' && $Saturday_close!=""){
                                                $req7=$bdd->prepare('INSERT INTO `opening_hours`(`user_id`, `weekday`, `open_hour`, `close_hour`, `date_creation`) VALUES(?,?,?,?,NOW())');
                                                $req7->execute(array($user_id,$Saturday,$Saturday_open,$Saturday_close));
                                            }
                                            }
                        
                                            
                                            
                                          

                                            //********** Sunday  ******** */
      

                                            $Sunday=$_POST['Sunday'];
                                            $Sunday_open=$_POST['Sunday_open'];
                                            $Sunday_close=$_POST['Sunday_close'];
                                
                                
                                            $req88=$bdd->prepare('select * from  opening_hours where  weekday=? and user_id=?');
                                            $req88->execute(array($Sunday,$user_id));
                                            
                                            $count88=$req88->rowCount();
                                            if($count88!=0){
                                                if($Sunday_open!='' && $Sunday_close!=""){
                                   
                                                $req8=$bdd->prepare('UPDATE `opening_hours` SET `open_hour`=?,`close_hour`=? where user_id=? and weekday=?');
                                                $req8->execute(array($Sunday_open,$Sunday_close,$user_id,$Sunday));
                                                }else{
                                                    $req29=$bdd->prepare('DELETE FROM `opening_hours` WHERE  user_id=? and weekday=?');
                                                    $req29->execute(array($user_id,$Sunday));
                                                }
                                            }else{
                                                  if($Sunday_open!='' && $Sunday_close!=""){
                                                $req8=$bdd->prepare('INSERT INTO `opening_hours`(`user_id`, `weekday`, `open_hour`, `close_hour`, `date_creation`) VALUES(?,?,?,?,NOW())');
                                                $req8->execute(array($user_id,$Sunday,$Sunday_open,$Sunday_close));
                                            }
                                            }
                        
                                            


                                    
            /******************************************************** */


             echo json_encode(array("reponse"=>"true"));
        }catch (Exception $e) {
            $msg = $e->getMessage();
              echo json_encode(array("reponse"=>"true","message"=>$msg));
        
         
        }



}


       
?>