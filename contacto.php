<?php include ("inc/validar.php");
$currentA='contacto'; ?>
<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<head>
	<!-- Basic Page Needs
  ================================================== -->
	<meta charset="utf-8">
	<title>Directorio ANTAD 2015</title>
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- Mobile Specific Metas
  ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- CSS
  ================================================== -->
	<link rel="stylesheet" href="css/base.css">
	<link rel="stylesheet" href="css/skeleton.css">
	<link rel="stylesheet" href="css/layout.css">

<?php include "inc/jsAll.php"; ?> 
    <!-- bxSlider Javascript file -->
    <script src="js/jquery.bxslider.min.js"></script>
    <!-- bxSlider CSS file -->
    <link href="css/jquery.bxslider.css" rel="stylesheet" />
	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- Favicons
	================================================== -->
	<link rel="shortcut icon" href="images/faviconAntad.ico">
    <link rel="apple-touch-icon" href="images/faviconAntad57.png">
    <link rel="apple-touch-icon" sizes="72x72" href="images/faviconAntad72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="images/faviconAntad114.png">
</head>
<body>
<?php include "header.php" ?>
<?php include "mainmenu.php" ?>

<!-- Start Content
================================================== -->
<div class="fullscreen">
  <div class="container contenidoA">
    <div class="fullcontainer">
	  <div class="content_block leftTitle"><p class="title">Contacto ANTAD</p></div>
    	<div class="sixteen columns">
		<div class="titulomovil"><p><titulos>Contacto ANTAD</titulos></p></div>
	  	</div>	
    <div class="clear"></div>
      
    </div>
    <div class="clear"></div>  

    <div class="one-second column floatLeft"> 
       <div class="boxA contacto">
   
		  <h1 class="red">Dirección</h1>			
            <table>
            <tr>
            	<td><strong>Dirección:&nbsp;</strong></td>
            	<td>Horacio 1855, 6° piso</td>
            </tr>
            <tr>
            	<td>&nbsp;</td>
            	<td>Col. Chapultepec Morales.</td>
            </tr>
            <tr>
            	<td>&nbsp;</td>
            	<td>C.P. 11570, México D.F.</td>
            </tr>
            <tr>
            	<td><strong>Teléfono:&nbsp;</strong></td>
            	<td>(55) 5580 9900</td>
            </tr>            
            <tr>
            	<td><strong>Fax:&nbsp;</strong></td>
            	<td>(55)5395 2611</td>
            </tr>               
            <tr>
            	<td><strong>Contactos:&nbsp;</strong></td>
            	<td>Cecilia León</td>
            </tr>               
            <tr>
            	<td>&nbsp;</td>
            	<td><a href="mailto:cleon@antad.net">cleon@antad.net</a></td>
            </tr>                 
            <tr>
            	<td>&nbsp;</td>
            	<td>Rocio Patiño</td>
            </tr>  
            <tr>
            	<td>&nbsp;</td>
            	<td><a href="mailto:rpatino@antad.org.mx">rpatino@antad.org.mx</a></td>
            </tr>  
            <tr>
            	<td>&nbsp;</td>
            	<td>(55) 5580 9938</td>
            </tr>             
            <tr>
            	<td>&nbsp;</td>
            	<td>&nbsp;</td>
            </tr>                        
            <tr>
            	<td><strong>Website:&nbsp;</strong></td>
            	<td><a href="http://www.antad.net/" target="_blank">http://www.antad.net/</a></td>
            </tr>                                                         
            </table> 
            </div>
    </div>
    <div class="one-second column floatLeft"> 
          <div class="boxA contacto">

			<h1 class="red">Formulario de Contacto</h1>
						
			<p class="required_info">Todos los campos son requeridos<span>*</span></p>
			
			<div class="line"></div>
						
			<!-- SUCCESS MESSAGE -->
			<div class="success_box none">
				Correo enviado exitosamente. Gracias!
			</div>
			<!-- END SUCCESS MESSAGE -->
			
			<!-- ERROR MESSAGE -->
			<div class="error_box none">
				Favor de rellenar todos los campos.
			</div>
			<!-- END ERROR MESSAGE -->
			
			<div class="padding15"></div>
			
			<!-- START CONTACT FORM -->	
			<form action="#" class="contact_form">
			<p>
				<label for="name">Nombre completo <span>*</span></label>
				<input class="inputText" type="text" id="name" name="name" />
			</p>
			<div class="clear"></div>
			<p>
				<label for="email">Empresa <span>*</span></label>
				<input class="inputText" type="text" id="email" name="email" />
			</p>
			<div class="clear"></div>
			<p>
				<label for="email">Correo Electrónico <span>*</span></label>
				<input class="inputText" type="text" id="email" name="email" />
			</p>
			<div class="clear"></div>
			<p>
				<label for="message">Mensaje <span>*</span></label>
				<textarea class="inputTextarea" cols="88" rows="6" id="message" name="message"></textarea>
			</p>
			<div class="clear"></div>
			<div>
            <a href="javascript:void(0);" class="boton" onclick="$('.contact_form').submit();">
      <div>Enviar Mensaje</div>
      </a></div>			
			</form>
			<!-- END CONTACT FORM -->	    
    
    </div>
    </div>
      <div class="clear"></div>       


	</div><!-- container -->
	</div>
<!-- End Content
================================================== -->

<?php include "footer.php" ?>
</body>
</html>