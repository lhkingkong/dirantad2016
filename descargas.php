<?php include ("inc/validar.php");
$currentA='antad'; ?>
<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<head>
	<!-- Basic Page Needs
  ================================================== -->
	<!-- Mobile Specific Metas
  ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta charset="utf-8">
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
  <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.0/themes/base/jquery-ui.css" />

	<?php include "inc/jsAll.php"; ?>
	<title>Directorio ANTAD 2015</title>
	<link rel="stylesheet" href="css/jquery-ui.css" />
<link rel="stylesheet" href="css/jquery/jquery-ui-1.10.1.custom.css">
	<script src="js/ui/jquery.ui.core.js"></script>
	<script src="js/ui/jquery.ui.widget.js"></script>
	<script src="js/ui/jquery.ui.tabs.js"></script>
	<script>
	$(function() {
		$( "#tabs" ).tabs();
	});
    </script>
	 
</head>
<body>
<?php include "header.php" ?>
<?php include "mainmenu.php" ?>

	<!-- Primary Page Layout
	================================================== -->

	<!-- Delete everything in this .container and get started on your own site! -->
<div class="fullscreen">
<div class="container contenidoA">
	  			  		         
	  		<div class="fullcontainer">    
				<div class="content_block leftTitle">    
					<p class="title">Descargas</p>		
				</div>							
			</div>        
        
			<div class="sixteen columns content_justify">
					<div class="titulomovil">    
					<p><titulos>Descargas</titulos></p>
					</div>					

			<ul class="listaAnidada"> 
				<li><a href="downloads/Directorio2015-Asociados_Estados.xlsx" target="new">Tiendas m2 Cadenas por Estado</a></li>
				<br>
				<li><a href="downloads/Directorio2015_Estados_y_Cadenas.xlsx" target="new">Tiendas m2 Estado y Cadena</a></li>
				<br>
				<li><a href="downloads/Directorio2015-Asociados_Zonas.xlsx" target="new">Tiendas m2 Zona y Cadena</a></li>
				<br>
				<li><a href="downloads/Directorio2015-Asociados_Subtipos-Zonas.xlsx">Tiendas m2 Subtipo y Zona</a></li>
			  </ul>
            </p>		
		


	
		</div>
	</div><!-- container -->
	
<!-- End Document
================================================== -->

<?php include "footer.php" ?>
</body>
</html>
