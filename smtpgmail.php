<?php
include("include/settings.php");
include "classes/class.phpmailer.php"; // include the class name
$mail = new PHPMailer(); // create a new object
$mail->IsSMTP(); // enable SMTP
$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
$mail->SMTPAuth = true; // authentication enabled
$mail->SMTPSecure = 'tls'; // secure transfer enabled REQUIRED for Gmail
$mail->Host = "smtp.gmail.com";
$mail->Port = 587; // or 587
$mail->IsHTML(true);
$mail->Username = "harshitathakur68@gmail.com";
$mail->Password = "";
$mail->SetFrom("harshitathakur68@gmail.com");
$mail->Subject = "Your Feedback is";
$mail->Body = "<b>Feedback: ";


$mail->AddAddress("harshitathakur68@gmail.com");		//mail address of sender

if(!$mail->Send())
{
	echo "Mailer Error: " . $mail->ErrorInfo;
}
// else
// {
// 	header("location:SentEmail_mp.php");
//}
?>