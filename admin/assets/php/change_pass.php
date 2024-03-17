<?php


include 'config.php';


   try {

    $email=$_POST['email'];
    $password=$_POST['password'];
    $hash_password=sha1($password);

    if($email==""){
        die(json_encode(array('reponse'=>'false',"message"=>3)));
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

        die(json_encode(array('reponse'=>'false',"message"=>1)));
 }
            //connexion a la base de données
            $bdd = new PDO("mysql:host=".DB_SERVER.";dbname=".DB_NAME."; charset=utf8", DB_USER, DB_PASS, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    

            $req= $bdd->prepare('select * from users where email=?');
            $req->execute(array($email));
            $count= $req->rowCount();
            if($count!=0){


                $req= $bdd->prepare('UPDATE `users` SET password = ? where email = ?  ');
                $req->execute(array($hash_password,$email));
                echo json_encode(array("reponse"=>"true"));
 $to = $email;
$subject = "ads.com.au";

$message = "
<html>
<head>

</head>
<body>
<div style='background:#fff;width:100%;padding:20px'>
<h3>Dear ads.com.au Customer,</h3>
<p>Here is your new password:</p>
<br/>


<p>Password : " .$password."</p>
<p>To log into your account please click on this link <a href='https://ads.com.au/admin/' target='_blank'>https://ads.com.au/admin/</a></p>
<br/>
<p>Kind regards,</p>
<p>Customer Support Team(Ads.com.au) </p>
</div>
</body>
</html>
";

// Always set content-type when sending HTML email
//$headers = "MIME-Version: 1.0" . "\r\n";
//$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
//$headers .= 'From: ads.com.au' . "\r\n";


//mail($to,$subject,$message,$headers);

include('smtp/PHPMailerAutoload.php');


function smtp_mailer($to,$subject, $message){
	$mail = new PHPMailer(); 
	//$mail->SMTPDebug  = 3;
	$mail->IsSMTP(); 
	$mail->SMTPAuth = true; 
	$mail->SMTPSecure = 'ssl'; 
	$mail->Host = "mail.ads.com.au";
	$mail->Port = 465; 
	$mail->IsHTML(true);
	$mail->CharSet = 'UTF-8';
	$mail->Username = "admin@ads.com.au";
	$mail->Password = "}b[]!Pxr##m7";
	$mail->SetFrom("admin@ads.com.au");
   // $mail->SetFrom("admin@ads.com.au");
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
  echo smtp_mailer($to,$subject,$message);       

            }else{
                echo json_encode(array("reponse"=>"false",'message'=>2));
            }


           
          
               
     
        }catch (Exception $e) {
            $msg = $e->getMessage();
            echo json_encode(array("reponse"=>"false",$msg));
          
         
        }   



?>