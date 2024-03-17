<?php
$to = $email;
$subject = "ads.com.au";

$message = "
<html>
<head>
<title>ads.com.au</title>
</head>
<body>
<div style='background:#fff;width:100%;padding:20px'>
<h3>Dear ads.com.au Customer,</h3>
<p>Here are your User details:</p>
<br/>
<p>Username:".$username."</p>

<p>Password: ".$password_user."</p>
<p>To log into your account please click on this link https://ads.com.au/admin/</p>
<br/>
<p>Kind regards,</p>
<p>Customer Support (ads.com.au) </p>
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