<?php
$to = $email;
$subject = "bizads.au";

$message = "
<html>
<head>
<title>bizads.au</title>
</head>
<body>
<div style='background:#fff;width:100%;padding:20px'>
<h3>Dear ads.com.au Customer,</h3>
<p>Here are your User details:</p>
<br/>
<p>Username:".$username."</p>

<p>Password: ".$password_user."</p>
<p>To log into your account please click on this link https://bizads.au/login.php</p>
<br/>
<p>Kind regards,</p>
<p>Customer Support (bizads.au) </p>
</div>
</body>
</html>
";

// Always set content-type when sending HTML email
//$headers = "MIME-Version: 1.0" . "\r\n";
//$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
////$headers .= 'From: Ads.io' . "\r\n";


//mail($to,$subject,$message,$headers);

include('smtp/PHPMailerAutoload.php');



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
  echo smtp_mailer($to,$subject,$message);  
?>