<?php

require_once '../vendor/autoload.php';
/**
 * This example shows settings to use when sending via Google's Gmail servers.
 * This uses traditional id & password authentication - look at the gmail_xoauth.phps
 * example to see how to use XOAUTH2.
 * The IMAP section shows how to save this message to the 'Sent Mail' folder using IMAP commands.
 */

//Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;

function send_email($to, $name, $subject, $message, $from, $sender_name) {
	$mail = new PHPMailer(true);
	$mail->CharSet = 'UTF-8';
	//$mail->SMTPDebug = 3;
	$mail->isSMTP();
	$mail->Host = 'smtp.hostinger.com';
	$mail->SMTPAuth = true;         
	$mail->Username = 'no-reply@courdescomptes.govright.tech';                 // SMTP username
	$mail->Password = 'Cdc@_2021';  
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