<?php

	$Email = "btouleau@ipsight.com.mx";

	$sendfrom   = "Foro Internacional de Vivienda Sustentable <info@forointernacionaldeviviendasustentable.com>";
	$sendto   	= "btouleau@ipsight.com.mx";
	$sendcopyto	= "liliana@grupomad.com";
	$boundary = "-----=".md5(uniqid(rand()));

	$title = "Registro al Foro Internacional de Vivienda Sustentable Infonavit, Ciudad de México ";
	$titleconfirm = "Confirmacion de registro al Foro Internacional de Vivienda Sustentable Infonavit, Ciudad de México";
	
	$header = "MIME-Version: 1.0\r\n";
	$header .= "Content-Type: multipart/mixed; boundary=\"$boundary\"\r\n";
	$header .= "X-Sender: <$Email>\r\n";
	$header .= "X-Mailer: Microsoft Office Outlook, Build 11.0.5510\r\n";
	$header .= "X-MimeOLE: Produced By Microsoft MimeOLE V6.00.2800.1441\r\n";
	$header .= "Return-Path: <$Email>\n";
	$header .= "X-auth-smtp-user: $Email\r\n";
	$header .= "X-abuse-contact: $Email\r\n";
	$header .= "Reply-to: $Email\r\n";
	$header .= "From: $Email\r\n";

	$msg = "Content-Type: text/plain; charset=\"iso-8859-1\"\r\n";
	$msg .= "Content-Transfer-Encoding:8bit\r\n";
	$msg .= "\r\n";
	$msg .= "Nuevo registro Foro Internacional de Vivienda Sustentable Infonavit, Ciudad de México\r\n";
	$msg .= "\r\n";
	$msg .= "Ficha de registro\r\n";
	$msg .= "\r\n";


	$headerconfirm	= "From: \"Infonavit\"<info@forointernacionaldeviviendasustentable.com>\n";
	$headerconfirm .= "Reply-To: info@forointernacionaldeviviendasustentable.com\n";
	$headerconfirm .= "Content-Type: text/html; charset=\"iso-8859-1\"";	

	$msgconfirm 	= "	<strong>Gracias, hemos recibido su registro al Foro Internacional de Vivienda Sustentable Infonavit, Ciudad de México 2012.</strong><br /><br />
					Atentamente: Comité Organizador<br /><br />
					Cualquier duda favor de comunicarse con:<br />
					Claudia M. Peña Ruiz<br />
					(477) 718 59 12, (477) 773 11 13<br />
					claudia@grupomad.com<br />";

	$send = mail($sendto, $title, $msg, $header);
	$sendcopy = mail($sendcopyto, $title, $msg, $header);
		
	$confirm = mail($Email, $titleconfirm, $msgconfirm, $headerconfirm);
	
?>