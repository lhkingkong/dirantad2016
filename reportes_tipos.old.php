<?php
include ("inc/validar.php");
include ("inc/connect.php");
include ("inc/interfaz.php");
$currentA="reportes";

if(!isset($_GET['condition']))
	$condition = 0;
else
	$condition = $_GET['condition'];

$where = "";

switch(intval($condition)){
	case 1:
				$where = "AND asociados.asociado_tipo_id = 1 ";
				$txtreport ="Listado de las cadenas de Tiendas de Autoservicio asociadas a ANTAD";
				break;
	case 2:
				$where = "AND asociados.asociado_tipo_id = 2 ";
				$txtreport ="Listado general de las cadenas de Tiendas Departamentales asociadas a ANTAD";
				break;
	case 3:
				$where = "AND asociados.asociado_tipo_id = 3 ";
				$txtreport ="Listado general de las cadenas de Tiendas Especializadas asociadas a ANTAD";
				break;
	default:
				$txtreport ="Listado general de las cadenas asociadas a ANTAD";
				break;
}

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
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">

<!-- CSS
  ================================================== -->
<link rel="stylesheet" href="css/base.css">
<link rel="stylesheet" href="css/skeleton.css">
<link rel="stylesheet" href="css/layout.css">

<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

<!-- Favicons
	================================================== -->
<link rel="shortcut icon" href="images/faviconAntad.ico">
<link rel="apple-touch-icon" href="images/faviconAntad57.png">
<link rel="apple-touch-icon" sizes="72x72" href="images/faviconAntad72.png">
<link rel="apple-touch-icon" sizes="114x114" href="images/faviconAntad114.png">
<?php include "inc/jsAll.php"; ?>
<link href="css/footable-0.1.css" rel="stylesheet" type="text/css" />
<link href="css/footable.sortable-0.1.css" rel="stylesheet" type="text/css" />
<script src="js/footable-0.1.js" type="text/javascript"></script>
<script src="js/footable.sortable.js" type="text/javascript"></script>
<script src="js/footable.filter.js" type="text/javascript"></script>
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
		
		$("#contenidoA").load('reportes_tipos_consulta.php?zona='+$('#zona').val()+'&tipo='+$('#tipo').val()+'&subtipo='+$('#subtipo').val()+$IEcadena, 
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
	
	function cargarSubtipos(){
        $('#subtipo').html('<option selected>Cargando</option>');		
        $intentos = $intentosMAX;
        cargarSubtiposAJAX();
	}
	
	function cargarSubtiposAJAX(){
    jQuery.ajax({
        type: "GET",
        url: 'php/cargarSubtipos.php?tipo='+ $('#tipo').val(),
        /*dataType:"html",*/
        //data:"cve_mat="+$cve_mat,
        success:function(responseText){
                $('#subtipo').html(responseText);
                    $('#subtipo').val('a');
        },//fin success
        error:function (xhr, ajaxOptions, thrownError){
            if($intentos<1){
                mandarMensaje("Lo sentimos, su conexi&oacute;n con el servidor se ha perdido, favor de contactarse con nosotros. ");
            }else{
                $intentos--;
                cargarSubtiposAJAX();
            }
        }    
    });
	}
	
	$(function(){
		$('#subtipo').val('a');
		$('#tipo').val('a');
		$('#zona').val('a');
	});
	
	function abrirExcel(){
		window.open('excel/reportes_tipos_excel.php?zona='+$('#zona').val()+'&tipo='+$('#tipo').val()+'&subtipo='+$('#subtipo').val(), "_blank");
	}
  </script>
</head>
<body>
<?php include "header.php" ?>
<?php include "mainmenu.php" ?>

<!-- Start Document
	================================================== -->

<div class="fullscreen">
  <div class="container contenidoA">
    <div class="clear"></div>
    <div class="fullcontainer">
      <div class="content_block leftTitle">
        <p class="title">Reportes de Asociados por Tipos</p>
      </div>
    </div>
    <div class="clear"></div>
    <div class="sixteen columns formulario">
		<div class="titulomovil">
        <p><titulos>Reportes de Asociados por Tipos</titulos></p>
      </div>	
      <div class="groupB columnB twocolumn">
        <div>
          <div>Tipo de tienda</div>
          <select id="tipo" onChange="cargarSubtipos(); return false;">
            <option value="a" selected>TODOS</option>
            <?php
$query = " SELECT * FROM tiendas_tipos
			ORDER BY tienda_tipo ";
$result = mysql_query($query);
if($result){
	while($values = mysql_fetch_assoc($result)){
		echo '<option value="'.$values['tienda_tipo_id'].'">'.utf8_encode($values['tienda_tipo']).'</option>';
	}
}
?>
          </select>
        </div>
      </div>
      <div class="groupB columnB twocolumn">
        <div>
          <div>Subtipo</div>
          <select id="subtipo">
            <option value="a" selected>TODAS</option>
            <?php
$query = " SELECT * FROM tiendas_subtipos
			ORDER BY tienda_subtipo ";
$result = mysql_query($query);
if($result){
	while($values = mysql_fetch_assoc($result)){
		echo '<option value="'.$values['tienda_subtipo_id'].'">'.utf8_encode($values['tienda_subtipo']).'</option>';
	}
}
?>
          </select>
        </div>
      </div>
      <div class="groupA columnA twocolumn">
      	<div>
          <div>Zona</div>
          <select id="zona">
            <option value="a" selected>TODAS</option>
            <?php
$query = " SELECT * FROM zonas
			ORDER BY zona_id ";
$result = mysql_query($query);
if($result){
	while($values = mysql_fetch_assoc($result)){
		echo '<option value="'.$values['zona_id'].'">'.utf8_encode($values['zona_nombre']).'</option>';
	}
}
?>
          </select>
        </div>
        
      </div>
      <div class="clear"></div>
      <div class="centered">
        <?php crearBoton('Reporte','refrescarConsulta()','',"images/16x16/magnifier.png"); ?>
        <?php crearBoton('Excel','abrirExcel()','',"images/16x16/export_excel.png"); ?>
        <?php /*?><a id="refrescar" href="#" class="boton" onClick="refrescarConsulta(); return false;">
        <div>Buscar</div>
        </a> </div>
      <div class="groupA columnA twocolumn"> <a href="#" onClick="abrirExcel();"  class="boton">
        <div>Excel <img src="images/export_excel.png"> </div>
        </a><?php */?>
      </div>
    </div>
  </div>
  <!-- container --> 
</div>
<div id="contenidoA">&nbsp;</div>
<?php include "footer.php" ?>
</body>
</html>