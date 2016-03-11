<?php /*
echo "Prueba"; 
require("inc/PHPMailer/class.phpmailer.php");
require("inc/PHPMailer/class.smtp.php");
require("inc/PHPMailer/class.pop3.php");;
include('inc/funciones2.php');

if(mail2('asd', 'sad', 'loquese', 'head'))
 echo "S";
else
	echo "2";*/
?>
<html>
					<head>
					<style type="text/css">
						#encabezado {
							margin:10px;
							text-align:center;
							color:#660000 !important;
							font-size:20px;
							font-weight: bold;
							font: Arial, Helvetica, Sans-serif  !important;
							border-bottom: 1px solid #990000 !important;
						}
					
						#cuerpo {
							font: Arial, Helvetica, Sans-serif;
							color:#333333;
							font-size:12px;
							width:800px;
						}
					
						#titulo {
							background-color: #EFEFEF;
							font: Arial, Helvetica, Sans-serif;
							color:#000;
							font-size:14px;
							width:800px;
						}
					</style>
					</head>
					
					<body>
					<div id="encabezado">
						Directorio ANTAD 2015
					</div>
					<div id="password">
					Estimado Cliente, su contraseña para ingresar al directorio es: <br/><b>Contaseña123456789</b><br/><br/>
					</div>
					<div id="cuerpo">
					Se le recomienda cambiar su contraseña por cuestiones de seguridad.<br/><br/>
					Si usted ha recibido este mensaje por error, es probable que otro usuario haya introducido su dirección de correo electrónico por error al tratar de restablecer una contraseña, si es así haga caso omiso.<br/><br/>
					Nota: Este mensaje es generado por nuestro sistema automaticamente no se puede recibir mensajes a esta dirección de correo electrónico. 
					</div>
					
					</body>
					</html>