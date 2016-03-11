<?php
require("../inc/connect.php");
require("../phpmailer/class.phpmailer.php");

$bandError = 0;
//  INICIALIZACION DE VARIABLES 
$username = "";
$email = "";
$pass1 = "";
$nombre = "";
$apellidos = "";
$empresa = "";
$calle = "";
$no_ext = "";
$no_int = " ";
$colonia = " ";
$cp = "";
$ap = "";
$pais = "";
$estado = "";
$estado_text = " ";
$ciudad = "";
$rfc = "";

$tel = "";
$fax = "";
$localidad = " ";
$end ="2016-03-31";

if(!isset($_POST['username'],$_POST['nombre'],$_POST['email'],$_POST['pass1'],$_POST['empresa'],$_POST['calle'],$_POST['no_ext'],$_POST['lada'],$_POST['telefono'],$_POST['pais'],$_POST['estado'],$_POST['ciudad'])){
	echo "Faltan valores";
	return;
}

//Variables POST
    $username = utf8_decode(trim(base64_decode($_POST['username'])));
    $email = utf8_decode(trim(base64_decode($_POST['email'])));
    $pass1 = utf8_decode(trim(base64_decode($_POST['pass1'])));
    $nombre = utf8_decode(trim(base64_decode($_POST['nombre'])));
    $apellido = utf8_decode(trim(base64_decode($_POST['apellido'])));
    $empresa = utf8_decode(trim(base64_decode($_POST['empresa'])));
    $calle = utf8_decode(trim(base64_decode($_POST['calle'])));
    $no_ext = utf8_decode(trim(base64_decode($_POST['no_ext'])));
    $no_int = utf8_decode(trim(base64_decode($_POST['no_int'])));
    $lada = trim(base64_decode($_POST['lada']));
    $tel = trim(base64_decode($_POST['telefono']));
    $fax = trim(base64_decode($_POST['fax']));
    $colonia = utf8_decode(trim(base64_decode($_POST['colonia'])));
    $localidad = utf8_decode(trim(base64_decode($_POST['localidad'])));
    $cp = trim(base64_decode($_POST['cp']));
    $ap = trim(base64_decode($_POST['ap']));
    $pais = trim(base64_decode($_POST['pais']));
    $estado = trim(base64_decode($_POST['estado']));
    $estado_text = utf8_decode(trim(base64_decode($_POST['estado_text'])));
    $ciudad = utf8_decode(trim(base64_decode($_POST['ciudad'])));
    $rfc = utf8_decode(trim(base64_decode($_POST['rfc'])));

/*$query_sql = " SELECT * FROM usuarios 
					WHERE usuario_username = '$username'";
//echo $query_sql;
$resultado = mysql_query($query_sql);
if(intval(mysql_num_rows($resultado))>0){
	echo 'Ya usuario';
	mysql_close($db);
	return;
}*/

$query_sql = " SELECT * FROM usuarios 
					WHERE usuario_email = '$email'";
//echo $query_sql;
$resultado = mysql_query($query_sql);
if(intval(mysql_num_rows($resultado))>0){
	echo 'Ya existe';
	mysql_close($db);
	return;
}

//$fecha_inscripcion = ExtraeFecha();

if ($estado == 'a') {
    $estado = 0;
}

//'$usuario_id',
$query_sql = " INSERT INTO usuarios VALUES (
					'',						'$nombre',			'$apellido',
					'$empresa',				'$calle',			'$no_ext',
					'$no_int',				'$colonia',			'$localidad',		
					'$rfc', 				'$cp',				'$ap',	
					'$ciudad',				'$estado',			'$estado_text',		
					'$pais', 				'$lada', 			'$tel',
					'$fax',
					'$email',				'$username', 		'$pass1',
					NOW(),	'',					'$end', 			1)";
//echo $query_sql;
$resultado = mysql_query($query_sql);
if ($resultado === false) { //EXCEPCION
    mysql_close($db);
    return;
}
	
// Envio de los emails
$nombre_completo = utf8_encode($nombre." ".$apellido);	

$mail             = new PHPMailer();

$mail->IsSMTP(); // telling the class to use SMTP
$mail->IsHTML(true);
$mail->Host       = "localhost"; // SMTP server
$mail->SMTPDebug  = 2;                     // enables SMTP debug information (for testing)
                                           // 1 = errors and messages
                                           // 2 = messages only
$mail->SMTPAuth   = true;                  // enable SMTP authentication
$mail->Host       = "mail.ipsight.net"; // sets the SMTP server
$mail->Port       = 587;                    // set the SMTP port for the GMAIL server
#$mail->Username   = "registro@ipsight.com.mx"; // SMTP account username
$mail->Username   = "registro@directorio.antad.net"; // SMTP account username
$mail->Password   = "bto191269";        // SMTP account password

$administrador = "dirantad@ipsight.net";
$administrador = "btouleau@ipsight.com.mx";
$administrador = "rpatino@antad.org.mx";
$nombreadmin = "Rocío Patiño";

$mail->SetFrom($email, $nombre_completo);

$mail->AddReplyTo($email, $nombre_completo);

$mail->Subject    = "Nueva solicitud de acceso al directorio ANTAD 2015";
//$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test
$mail->CharSet = 'UTF-8';

$body = '<p>Se registr&oacute; una nueva solicitud de acceso al directorio ANTAD 2015</p>';
$body .= '<p>'.$nombre_completo.' de la empresa '. utf8_encode($empresa) . ' ('. $lada . '-'. $tel .' / '. $email .' )<p>';

$mail->MsgHTML($body);

$mail->AddAddress($administrador, "Registro al directorio");

if(!$mail->Send()) {
  echo "Mailer Error: " . $mailconfirm->ErrorInfo;
} else {
  echo "Message sent!";
}

$mailconfirm             = new PHPMailer();

$mailconfirm->IsSMTP(); // telling the class to use SMTP
$mailconfirm->IsHTML(true);
$mailconfirm->Host       = "localhost"; // SMTP server
$mailconfirm->SMTPDebug  = 2;                     // enables SMTP debug information (for testing)
                                           // 1 = errors and messages
                                           // 2 = messages only
$mailconfirm->SMTPAuth   = true;                  // enable SMTP authentication
$mailconfirm->Host       = "mail.ipsight.net"; // sets the SMTP server
$mailconfirm->Port       = 587;                    // set the SMTP port for the GMAIL server
#$mailconfirm->Username   = "registro@ipsight.com.mx"; // SMTP account username
$mailconfirm->Username   = "registro@directorio.antad.net"; // SMTP account username
$mailconfirm->Password   = "bto191269";        // SMTP account password

$mailconfirm->SetFrom($administrador, 'Registro Directorio ANTAD');
$mailconfirm->AddReplyTo($administrador, 'Registro Directorio ANTAD');

$mailconfirm->CharSet 	= 'UTF-8';
$mailconfirm->Subject	= "Registro de su solicitud de acceso al directorio ANTAD 2015";

$body = '
<html>
<head>
<style>
.body {
	font-family: "Times New Roman", serif;
	font-size: 14px;
	font-style: normal;
	font-weight: normal;
}
</style>
</head>

<body>
<div>
<p>Estimado/a '. $nombre_completo .', hemos recibido su solicitud de acceso al directorio ANTAD 2015</p>
<p>El pago de los $1,000 puede ser a trav&eacute;s de transferencia electr&oacute;nica o dep&oacute;sito.</p>
<table style="color:blue;">
	<tr><td>RAZON SOCIAL DE LA EMPRESA:</td><td>XCD DESARROLLADORA S.A. DE C.V.</td></tr> 
	<tr><td>DIRECCION FISCAL, COMERCIAL:</td><td>HORACIO NO. 1855-6° PISO, COL. CHAPULTEPEC MORALES,</td></tr> 
	<tr><td>Y ADMINISTRATIVA</td><td>11570, MEXICO, D.F.</td></tr> 
	<tr><td>GIRO:</td><td>SERVICIOS AL COMERCIO</td></tr> 
	<tr><td>R.F.C.:</td><td>XDE1111184P6</td></tr> 
	<tr><td>TELEFONO:</td><td>01 (55) 5580 1772 EXT. 231</td></tr> 
	<tr><td>FAX:</td><td>01 (55) 5395 2611</td></tr>
</table>

<p>TRANSFERENCIA:</p>
<table style="color:blue;">
	<tr><td>NOMBRE DEL BANCO:</td><td>BANAMEX</td></tr> 
	<tr><td>NUMERO DE CUENTA:</td><td>7132320</td></tr> 
	<tr><td>NUMERO DE SUCURSAL:</td><td>7003</td></tr> 
	<tr><td>EJECUTIVO:</td><td>LAURA PERALTA</td></tr> 
	<tr><td>DIRECCION DEL BANCO:</td><td>EJERCITO NACIONAL 966 LOS MORALES POLANCO</td></tr> 
	<tr><td>NOMBRE DE LA PLAZA:</td><td>MEXICO D.F.</td></tr> 
	<tr><td>CLABE INTERBANCARIA:</td><td>002180700371323207</td></tr> 
	<tr><td>SWIFT:</td><td>BNMXMXMM</td></tr>
</table>

<p>Le solicitamos nos haga llegar de manera electr&oacute;nica su comprobante de pago a rpatino@antad.org.mx<br />
De antemano agradecemos su compra.<br />
Saludos cordiales.</p>
<br />
Rocío Patiño<br />
Tel.: (0155) 5580 9938<br />
Email: rpatino@antad.org.mx<br />
ANTAD</p>
</div>
</body>
</html>
';

$mailconfirm->MsgHTML($body);

$mailconfirm->AddAddress($email, $nombre_completo);

if(!$mailconfirm->Send()) {
  echo "Mailer Error: " . $mailconfirm->ErrorInfo;
} else {
  echo "Message sent!";
}

$result = "Bien";

echo "Bien";
return $result;
mysql_close($db);

?>
