<?php
require("../class.phpmailer.php"); 
$mail = new PHPMailer(); 
$mail->IsSMTP(); 
$mail->SMTPAuth = true; 
$mail->Host = "localhost"; // SMTP a utilizar. Por ej. �smtp.miservidor.com? 
$mail->Username = "btouleau@ipsight.com.mx"; // Correo completo a utilizar 
$mail->Password = "eto140205"; // Contrase�a 
$mail->Port = 587; // Puerto a utilizar 
$mail->From = "btouleau@ipsight.com.mx"; // Desde donde enviamos (Para mostrar) 
$mail->FromName = "MISERVER.COM"; 
$mail->AddAddress("btouleau@gmail.com"); // Esta es la direcci�n a donde enviamos 
$mail->AddCC("btouleau@hotmail.com"); // Copia 
$mail->IsHTML(true); // El correo se env�a como HTML 
$mail->Subject = .Titulo.; // Este es el titulo del email. 
$body = .Hola mundo. Esta es la primer l�nea<br />.; 
$body .= .Ac� continuo el <strong>mensaje</strong>.; 
$mail->Body = $body; // Mensaje a enviar 
$mail->AltBody = "Hola mundo. Esta es la primer l�nea\n Ac� continuo el mensaje.; // Texto sin html 
$exito = $mail->Send(); // Env�a el correo. 
  
if($exito){ 
echo .El correo fue enviado correctamente..; 
}else{ 
echo .Hubo un inconveniente. Contacta a un administrador..; 
}  
?>
