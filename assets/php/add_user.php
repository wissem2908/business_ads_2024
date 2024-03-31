<?php
error_reporting(E_ALL); 
ini_set('display_errors', 1);
include 'config.php';


function generateUsername($name) {
    // Convert name to lowercase and remove spaces
    $name = strtolower(str_replace(' ', '', $name));
    
    // Generate a random string of alphabetic characters
    $randomString = substr(str_shuffle(str_repeat("abcdefghijklmnopqrstuvwxyz", 6)), 0, 6); // Generate a 5-character random string
    
    // Concatenate name and random string to form username
    $username = $name . $randomString;
    
    return $username;
}


function generateConfirmationCode() {
    return md5(uniqid(rand(), true));
}
$confirmationCode = generateConfirmationCode();



  try {
  
if(!isset($_POST['first_name']) || $_POST['first_name']=="" || !isset($_POST['last_name']) || $_POST['last_name']=="" || !isset($_POST['email']) || $_POST['email']=="" || !isset($_POST['mobile_number']) || $_POST['mobile_number']=="" ){
    echo json_encode(array("reponse"=>"false" ,"message"=>1));
}else{
    $first_name=$_POST['first_name'];
    $last_name=$_POST['last_name'];
    $email=$_POST['email'];
    $mobile_number=$_POST['mobile_number'];
    $generatedUsername =generateUsername($last_name);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

        die(json_encode(array('reponse'=>'false',"message"=>4)));
 }
 
 if(!ctype_alnum($first_name) || !ctype_alnum($last_name)){
       die(json_encode(array('reponse'=>'false',"message"=>2)));
 }
 
            //connexion a la base de données
            $bdd = new PDO("mysql:host=".DB_SERVER.";dbname=".DB_NAME."; charset=utf8", DB_USER, DB_PASS, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    
    //check email existance       
            $req2 = $bdd->prepare('select * from normal_users where email =?');
            $req2->execute(array($email));
            $email_exist = $req2->rowCount();

            if($email_exist>0){
                die(json_encode(array('reponse'=>'false',"message"=>6)));
            }


            $req = $bdd->prepare('INSERT INTO `normal_users`(`username`,`first_name`, `last_name`, `email`, `mobile_number`, `creation_date`,confirmationCode) VALUES (?,?,?,?,?,NOW(),?)');
            $req->execute(array($generatedUsername,$first_name,$last_name,$email,$mobile_number,$confirmationCode));
                  
        
        
  

      /****************************************************************************************************** */
      require_once '../../admin/assets/php/smtp/PHPMailerAutoload.php';


     // echo $confirmationCode;
      $to = $email;
      $subject = 'Confirm Your Account';
      $confirmLink = 'https://bizads.au/assets/php/confirm.php?code=' . $confirmationCode;
      $message = "
      <html>
      <head>
        <title>Confirm Your Account</title>
      </head>
      <body>
        <p>Please click the button below to confirm your account:</p>
        <a href='$confirmLink'><button style='padding: 10px 20px; background-color: #4CAF50; color: white; border: none; border-radius: 5px; cursor: pointer;'>Confirm Account</button></a>
      </body>
      </html>
  ";
      // Always set content-type when sending HTML email
      //$headers = "MIME-Version: 1.0" . "\r\n";
      //$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
      
      // More headers
      ////$headers .= 'From: Ads.io' . "\r\n";
      
      
      //mail($to,$subject,$message,$headers);
      
     
      
      
     
 echo smtp_mailer($to,$subject,$message);  
 echo json_encode(array("reponse"=>"true"));

}

        }catch (Exception $e) {
            $msg = $e->getMessage();
            echo json_encode(array("reponse"=>"false",$msg));
          
         
        }


        function smtp_mailer($to,$subject, $message){
            $mail = new PHPMailer(); 
            //$mail->SMTPDebug  = 2;
            $mail->IsSMTP(); 
            $mail->SMTPAuth = true; 
            $mail->SMTPSecure = 'ssl'; 
            $mail->Host = "mail.bizads.au";
            $mail->Port = 465; 
            $mail->IsHTML(true);
            $mail->CharSet = 'UTF-8';
            $mail->Username = "admin@bizads.au";
            $mail->Password = "bhjJtI4Rptrt1";
            $mail->SetFrom("admin@bizads.au");
            $mail->Subject = $subject;
            $mail->Body =$message;
            $mail->AddAddress($to);
            $mail->SMTPOptions=array('ssl'=>array(
                'verify_peer'=>false,
                'verify_peer_name'=>false,
                'allow_self_signed'=>true
            ));
            if(!$mail->Send()){
                echo $mail->ErrorInfo;
            }else{
                //return 'Sent';
            }
         }
               
?>