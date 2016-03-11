<?php
/**
* Simple example script using PHPMailer with exceptions enabled
* @package phpmailer
* @version $Id$
*/

require '../class.phpmailer.php';

try {
	$mail = new PHPMailer(true); //New instance, with exceptions enabled

	$body             = file_get_contents('contents.html');
	$body             = preg_replace('/\\\\/','', $body); //Strip backslashes

	$mail->IsSMTP();                           // tell the class to use SMTP
	$mail->SMTPAuth   = true;                  // enable SMTP authentication
//	$mail->Port       = 465;                    // set the SMTP server port
//	$mail->Host       = "mail.unixhelp.com.mx"; // SMTP server
//	$mail->Username   = "peterpedro@unixhelp.com.mx";     // SMTP server username
//	$mail->Password   = "ZeN564un1x";            // SMTP server password

//	$mail->IsSendmail();  // tell the class to use Sendmail

	//$mail->AddReplyTo("name@domain.com","First Last");

	$mail->From       = " peterpedro@unixhelp.com.mx";
	$mail->FromName   = " peterpedro";

//	$to = "pedro@unixhelp.com.mx";
    
	$to = "zapper71@hotmail.com";
	$mail->AddAddress($to);

	$mail->Subject  = "Saludos";

	$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test	
	
//	$mail->WordWrap   = 80; // set word wrap

//	$mail->MsgHTML($body);

//	$mail->IsHTML(true); // send as HTML
   $body= "Hola";
   $mail->Body = $body;

	$mail->Send();
	echo 'Message has been sent.';
} catch (phpmailerException $e) {
	echo $e->errorMessage();
}
?>