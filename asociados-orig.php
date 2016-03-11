<?php
include ("inc/validar.php");
include ("inc/connect.php");
include ("inc/interfaz.php");

$currentA='asociados'; 
?>
<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="en">
<!--<![endif]-->
<head>
<meta charset="utf-8">
<meta name="author" content="">
<link href="css/960.css" rel="stylesheet"/>
<link href="css/defaultTheme.css" rel="stylesheet" />
<link href="css/myTheme.css" rel="stylesheet" />
<link rel="stylesheet" href="css/base.css">
<link rel="stylesheet" href="css/skeleton.css">
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">
<title>ANTAD - Directorio 2015</title>
<meta name="description" content="" />
<meta name="keywords" content="" />
<meta name="robots" content="index,follow" />
<meta name="viewport" content = "width = device-width, initial-scale = 1.0, minimum-scale = 1.0, maximum-scale = 1.0, user-scalable = no" />
<link rel="shortcut icon" href="images/faviconAntad.ico">
<link rel="apple-touch-icon" href="images/faviconAntad57.png">
<link rel="apple-touch-icon" sizes="72x72" href="images/faviconAntad72.png">
<link rel="apple-touch-icon" sizes="114x114" href="images/faviconAntad114.png">
<?php /*?><link rel="stylesheet" href="css/style.css" type="text/css" /><?php */?>
<!--[if (gte IE 6)&(lte IE 8)]>
<script src="https://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<script type="text/javascript" src="js/selectivizr-min.js"></script>
<link rel="stylesheet" href="css/ie_7.css" type="text/css" />
<![endif]-->
<?php include "inc/jsAll.php"; ?>
<link href="css/footable-0.1.css" rel="stylesheet" type="text/css" />
<link href="css/footable.sortable-0.1.css" rel="stylesheet" type="text/css" />
<script src="js/footable-0.1.js" type="text/javascript"></script>
<script src="js/footable.sortable.js" type="text/javascript"></script>
<script src="js/footable.filter.js" type="text/javascript"></script>
<script src="js/footable.paginate.js?v=2-0-1" type="text/javascript"></script>

<script type="text/javascript">

	$intentosMAX = 20;
	
	function refrescarConsulta(){
		$('#contenidoA').html('');
		$intentosD = $intentosMAX;
		refrescarConsultaAJAX();
	}
	
	function refrescarConsultaAJAX(){
    	//if($.browser.msie)
        	$IEcadena = "&ie=" + Math.floor((Math.random()*100)+1);
		
		$("#contenidoA").load('asociados_consulta.php?condition='+$('#tipo').val()+$IEcadena, 
        function(response, status, xhr) {
            if (status != "error") {
                $('#contenidoA').show('slow');
            }else{
                if($intentosD<1){
                    alert("Lo sentimos, su conexión con el servidor se ha perdido, favor de contactarse con nosotros. ");
                }else{
                    $intentosD--;
                    refrescarConsultaAJAX();
                }
            }
			return false;
        });
		return false;
	}
	
    $(function() {
      $('#tabla').footable();
	  $('#tipo').val('a');
	  $('#refrescar').click();
    });
	
	function abrirExcel(){
		window.open("excel/asociados_excel.php?condition="+$('#tipo').val(), "_blank");
	}
  </script>
<style type="text/css">
.footable-row-detail-inner .tablaFoo {
	font-size: 16px;
	color: #800;
	text-align: center;
}
.url a {
	color: #03F !important;
	text-decoration: none;
}
</style>
</head>
<body>
<?php include "header.php" ?>
<?php include "mainmenu.php" ?>
<div class="fullscreen">
  <div class="container contenidoA">
    <div class="clear"></div>
    <div class="fullcontainer">
      <div class="content_block leftTitle">
        <p class="title">Reportes de Asociados</p>
      </div>
    </div>
    <div class="clear"></div>
    <div class="sixteen columns formulario">
      <div class="titulomovil">
        <p><titulos>Reportes de Asociados</titulos></p>
      </div>
      <div class="groupA columnA twocolumn">
        <div>
          <div>Tipo de tienda</div>
          <select id="tipo">
            <option value="a" selected>TODOS</option>
<?php
			$query = " SELECT * FROM tiendas_tipos
						ORDER BY tienda_tipo ";
			$result = mysql_query($query);
			if($result){
				while($values = mysql_fetch_assoc($result)){
					echo '<option value="'.$values['tienda_tipo_id'].'">'.$values['tienda_tipo'].'</option>';
				}
			}
?>
          </select>
        </div>
      </div>
      <div class="clear"></div>
      <div class="centered">
      <?php crearBoton('Buscar','refrescarConsulta()','',"images/16x16/magnifier.png"); ?>
      <?php crearBoton('Excel','abrirExcel()','',"images/16x16/export_excel.png"); ?>
      </div>
    </div>
  </div>
  
  <!-- container -->
  <div id="contenidoA">&nbsp;</div>
</div>
<?php include "footer.php" ?>
</body>
</html>
