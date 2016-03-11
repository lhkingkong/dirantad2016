<?php
$currentA='inicio'; 
include ("inc/validar.php");
include ("inc/connect.php");

$query_count = "SELECT COUNT(*) NUMERO, SUM(S.NUMTIENDAS) NUMTIENDASF, SUM(S.M2PISO) M2PISOF 
				FROM  (
						SELECT SUM(asociados_estados.asociado_estado_numtiendas) NUMTIENDAS, SUM(asociados_estados.asociado_estado_m2pisoventas) M2PISO, asociados_estados.asociado_id 
							FROM asociados_estados, asociados 
							WHERE asociados.asociado_id = asociados_estados.asociado_id 
							GROUP BY asociados_estados.asociado_id ) as S";
//echo $query_count;
$result_count = mysql_query ($query_count);
$count = mysql_fetch_assoc($result_count);
$total_cadenas = number_format($count['NUMERO'],0);
$total_numtiendas = number_format($count['NUMTIENDASF'], 0);
$total_superficie = number_format($count['M2PISOF']);

$query_count = "SELECT COUNT(*) NUMERO 
							FROM asociados 
							WHERE asociados.asociado_tipo_id = 1";
//echo $query_count;
$result_count = mysql_query ($query_count);
$count = mysql_fetch_assoc($result_count);
$total_autoserv = number_format($count['NUMERO'],0);

$query_count = "SELECT COUNT(*) NUMERO 
							FROM asociados 
							WHERE asociados.asociado_tipo_id = 2";
//echo $query_count;
$result_count = mysql_query ($query_count);
$count = mysql_fetch_assoc($result_count);
$total_depart = number_format($count['NUMERO'],0);

$query_count = "SELECT COUNT(*) NUMERO 
							FROM asociados 
							WHERE asociados.asociado_tipo_id = 3";
//echo $query_count;
$result_count = mysql_query ($query_count);
$count = mysql_fetch_assoc($result_count);
$total_especial = number_format($count['NUMERO'],0);
?>
<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="en">
<!--<![endif]-->
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
<style type="text/css">
.fotoA {
	border:5px solid #FFFFFF;
	box-shadow:2px 2px 7px #646464;
	transition: box-shadow 2s;
}
.foto1:hover {
	box-shadow:2px 2px 7px #333333;
}
.foto1 {
	border:5px solid #FFFFFF;
	box-shadow:2px 2px 7px #646464;
	transform:scale(0.5, 0.5);
	-ms-transform:scale(0.5, 0.5);
	-moz-transform:scale(0.5, 0.5);
	-webkit-transform:scale(0.5, 0.5);
	-o-transform:scale(0.5, 0.5);
	transition: box-shadow 2s, transform 2s;
}
.foto1:hover {
	box-shadow:2px 2px 7px #333333;
	transform:scale(1, 1);
	-ms-transform:scale(1, 1);
	-moz-transform:scale(1, 1);
	-webkit-transform:scale(1, 1);
	-o-transform:scale(1, 1);
}
#foto2 {
	border:5px solid #FFFFFF;
	box-shadow:2px 2px 7px #646464;
	transform:rotate(7deg);
	-ms-transform:rotate(7deg); /* IE 9 */
	-moz-transform:rotate(7deg); /* Firefox */
	-webkit-transform:rotate(7deg); /* Safari and Chrome */
	-o-transform:rotate(7deg); /* Opera */
	transition: box-shadow 2s, transform 2s;
}
#foto2:hover {
	box-shadow:2px 2px 7px #333333;
	transform:scale(1, 1);
	-ms-transform:scale(1, 1);
	-moz-transform:scale(1, 1);
	-webkit-transform:scale(1, 1);
	-o-transform:scale(1, 1);
}
</style>
<link rel="stylesheet" href="js/nivo-slider/themes/default/default.css" type="text/css" media="screen" />
<link rel="stylesheet" href="js/nivo-slider/nivo-slider.css" type="text/css" media="screen" />
<script type="text/javascript" language="javascript" src="js/jquery.carouFredSel-6.2.0-packed.js"></script>
		<!-- optionally include helper plugins -->
		<script type="text/javascript" language="javascript" src="js/helper-plugins/jquery.mousewheel.min.js"></script>
		<script type="text/javascript" language="javascript" src="js/helper-plugins/jquery.touchSwipe.min.js"></script>
		<script type="text/javascript" language="javascript" src="js/helper-plugins/jquery.transit.min.js"></script>
		<script type="text/javascript" language="javascript" src="js/helper-plugins/jquery.ba-throttle-debounce.min.js"></script>

		<!-- fire plugin onDocumentReady -->
		<script type="text/javascript" language="javascript">
			$(function() {
				$('#asociados1').carouFredSel({
					responsive: true,
					width: '100%',
					scroll: 2,
					prev: '#prev',
					next: '#next',
					items: {
						width: 60,
					//	height: '30%',	//	optionally resize item-height
						visible: {
							min: 2,
							max: 13
						}
					}
				});
				
				$('#aEstrategicos').carouFredSel({
					responsive: true,
					width: '100%',
					scroll: 2,
					prev: '#prevE',
					next: '#nextE',
					items: {
						width: 60,
					//	height: '30%',	//	optionally resize item-height
						visible: {
							min: 2,
							max: 13
						}
					}
				});
			});
		</script>
</head>
<body>
<?php include "inc/phpAll.php"; ?>
<?php include "header.php"; ?>
<?php include "mainmenu.php"; ?>
<?php /*?><!-- Start Content
	================================================== --><?php */?>
<div class="fullscreen firstContainer">
  <div class="container contenidoA">
    <div class="fullcontainer">
      <div class="content_block centerTitle">
        <p class="title">Bienvenido al Directorio ANTAD 2015</p>
      </div>
    </div>
    <div class="sixteen columns">
      <div class="titulomovil">
        <p><titulos>Bienvenido al directorio ANTAD 2015</titulos></p>
      </div>
      <div class="clear"></div>      
      <div style="width:88%; margin:auto;">
      	<br /><p>Aquí encontrará información relacionada con la Asociación Nacional de Tiendas de Autoservicios y Departamentales &quot;ANTAD&quot;, así como las Cadenas Asociadas.</p>
      </div>

    <div id="wrapper">
        <a href="#" id="dev7link" title="Go to dev7studios" style="text-decoration:none;">&nbsp;</a>
        <div class="slider-wrapper theme-default">
            <div id="slider" class="nivoSlider">
                <img src="images/banners2015/banner1.jpg" data-thumb="images/banners2015/banner1.jpg" alt="" />
                <a href="#"><img src="images/banners2015/banner2.jpg" data-thumb="images/banners2015/banner2.jpg" alt=""/></a>
                <img src="images/banners2015/banner3.jpg" data-thumb="images/banners2015/banner3.jpg" alt="" data-transition="slideInLeft" />
                <img src="images/banners2015/banner4.jpg" data-thumb="images/banners2015/banner4.jpg" alt=""/>
                <img src="images/banners2015/banner5.jpg" data-thumb="images/banners2015/banner5.jpg" alt=""/>                                
                <img src="images/banners2015/banner6.jpg" data-thumb="images/banners2015/banner6.jpg" alt=""/>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="js/nivo-slider/jquery.nivo.slider.js"></script>
    <script type="text/javascript">
    $(window).load(function() {
        $('#slider').nivoSlider({
			controlNav:false,
			effect:'random'
    	});
    });
    </script>
    
    <div class="one-second column inicio_column">
      <div>
        <h3>Antecedentes</h3>
        <p style="width:88%; margin:auto;">ANTAD Inició sus actividades en 1983 agrupando a las principales cadenas detallistas del país.<br />
        <img alt="ANTAD" class="scale-with-grid" src="images/lineadetiempo.png" />
        </p>
      </div>
    </div>
    <div class="one-second column inicio_column">      
      <div style="height:200px; vertical-align: top" >
        <h3>Hoy</h3>
        <p>Actualmente está conformada 
          por <strong><?php echo $total_cadenas; ?></strong> cadenas de las cuales <strong><?php echo $total_autoserv; ?></strong> son de Autoservicio, <strong><?php echo $total_depart; ?></strong> Departamentales y <strong><?php echo $total_especial; ?></strong> Especializadas, 
          que representan a <strong><?php echo $total_numtiendas; ?></strong> establecimientos con más de <strong><?php echo $total_superficie; ?></strong> de metros cuadrados de piso de venta.<br>
          <br>
        <br /><br /></p>
      </div>
    </div>
  </div>
</div>
      </div>

<div class="container contenidoA">
  <div class="content_block leftTitle">
	<p class="title">Asociados</p>
  </div>
  <div class="sixteen columns">
	<div class="titulomovil">
      <p><titulos>Asociados</titulos></p>
    </div>
  </div>	
  <div class="clear"></div>
  <div class="list_carousel list_carouselBig responsive">
    <a id="prev" class="prev" href="#"><img src="images/arrowL.png" alt="&lt;"/></a>
    <a id="next" class="next" href="#"><img src="images/arrowR.png" alt="&gt;"/></a>
	<div style="width:75%; margin:auto;">
	  <ul id="asociados1">
<?php
		$query_img = "SELECT asociados_logo.asociado_id,asociados_logo.asociado_path_img,asociados.asociado_website 
						FROM asociados,asociados_logo
						WHERE asociados.asociado_id = asociados_logo.asociado_id 
						ORDER BY asociados.asociado_id ";
		$result_img = mysql_query ($query_img);
		if ($result_img) {
			if (mysql_num_rows($result_img) > 0){
				while($values = mysql_fetch_assoc($result_img)){
					echo '<li><a href="'.$values['asociado_website'].'" target="_blank" title="image'.$values['asociado_id'].'"><img src="images/logos/100x100/'.trim($values['asociado_path_img']).'.jpg"></a></li>';
				}
			}
		}
?>
	  </ul>
      <div class="clearfix"></div>
	</div>
  </div>
</div>

<div class="container contenidoA">
  <div class="content_block rightTitle">
	<p class="title">Socios Estrat&eacute;gicos</p>
  </div>
  <div class="sixteen columns">
	<div class="titulomovil">
	  <p><titulos>Socios Estrat&eacute;gicos</titulos></p>
	</div>
  </div>	
  <div class="clear"></div>
  <div class="list_carousel list_carouselBig responsive"> 
	<a id="prevE" class="prev" href="#"><img src="images/arrowL.png" alt="&lt;"/></a> 
	<a id="nextE" class="next" href="#"><img src="images/arrowR.png" alt="&gt;"/></a>
    <div style="width:75%; margin:auto;">
      <ul id="aEstrategicos">
<?php
		$query_img = "SELECT socio_website, socio_id,socio_path_img FROM socios_estrategicos ORDER BY socio_id ";
		$result_img = mysql_query ($query_img);
		if ($result_img) {
			if (mysql_num_rows($result_img) > 0){
				while($values = mysql_fetch_assoc($result_img)){
					echo '<li><a href="'.$values['socio_website'].'" title="image'.$values['socio_id'].'"><img src="images/sociosE/100x100/'.trim($values['socio_path_img']).'.jpg"></a></li>';
				}
			}
		}
?>
      </ul>
    </div>
  </div>
</div>
<?php /*?><!-- End Content
================================================== --><?php */?>
<?php include "footer.php" ?>
</body>
</html>