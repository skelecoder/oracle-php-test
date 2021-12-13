<?php

require '../phpmailer/PHPMailerAutoload.php';
require '../phpmailer/class.phpmailer.php';

function send_email($to, $name, $subject, $message, $from, $sender_name) {
	$mail = new PHPMailer(true);
	$mail->CharSet = 'UTF-8';
	//$mail->SMTPDebug = 3;
	$mail->isSMTP();
	$mail->Host = 'smtp.hostinger.com';
	$mail->SMTPAuth = true;         
	$mail->Username = 'no-reply@gouvernement-ouvert.ma';                 // SMTP username
	$mail->Password = 'Ogp@_2021';  
	//$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
	//$mail->SMTPSecure = 'tls';
	$mail->Port = 587;                       // TCP port to connect to

	$mail->setFrom($from, $sender_name);
	$mail->addAddress($to, $name);

	$mail->isHTML(true);

	$mail->Subject = $subject;
	$mail->Body    = $message;

	//send the message, check for errors
/*if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent!";
}*/
$mail->send();
}
?>