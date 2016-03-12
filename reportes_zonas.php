<?php
include ("inc/validar.php");
include ("inc/connect.php");
include ("inc/interfaz.php");

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
<html>
  <head>
    <title>Directorio ANTAD 2016</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta charset="utf-8">
    <meta name="author" content="Admin" >
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

    <!-- Favicons -->
    <link rel="shortcut icon" href="images/favicon.png">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">

    <!-- CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style-responsive.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/vertical-rhythm.min.css">
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <?php include "inc/jsAll.php"; ?>
    <link rel="stylesheet" href="css/btouleau.css">
      <script type="text/javascript">
        $intentosMAX = 20;

        function refrescarConsulta() {
          $('#contenidoA').html('');
          $intentosD = $intentosMAX;
          refrescarConsultaAJAX();
        }

        function refrescarConsultaAJAX() {
          //if($.browser.msie)
          $IEcadena = "&ie=" + Math.floor((Math.random() * 100) + 1);

          $("#contenidoA").load('reportes_zonas_consulta.php?zona=' + $('#zona').val() + '&tipo=' + $('#tipo').val() + '&asociado=' + $('#asociado').val() + $IEcadena,
            function (response, status, xhr) {
              if (status != "error") {
                $('#contenidoA').show('slow');
              } else {
                if ($intentosD < 1) {
                  alert("Lo sentimos, su conexión con el servidor se ha perdido, favor de contactarse con nosotros. ");
                } else {
                  $intentosD--;
                  refrescarConsultaAJAX();
                }
              }
              return false;
            });
          return false;
        }

        function cargarAsociados() {
          $('#asociado').html('<option selected>Cargando</option>');
          $intentos = $intentosMAX;
          cargarAsociadosAJAX();
        }

        function cargarAsociadosAJAX() {
          jQuery.ajax({
            type: "GET",
            url: 'php/cargarAsociados.php?tipo=' + $('#tipo').val(),
            /*dataType:"html",*/
            //data:"cve_mat="+$cve_mat,
            success: function (responseText) {
              $('#asociado').html(responseText);
              $('#asociado').val('a');
            }, //fin success
            error: function (xhr, ajaxOptions, thrownError) {
              if ($intentos < 1) {
                mandarMensaje("Lo sentimos, su conexi&oacute;n con el servidor se ha perdido, favor de contactarse con nosotros. ");
              } else {
                $intentos--;
                cargarAsociadosAJAX();
              }
            }
          });
        }

        $(function () {
          $('#zona').val('a');
          $('#tipo').val('a');
          $('#asociado').val('a');
        });

        function abrirExcel() {
          window.open('excel/reportes_zonas_excel.php?zona=' + $('#zona').val() + '&tipo=' + $('#tipo').val() + '&asociado=' + $('#asociado').val(), "_blank");
        }
      </script>
  </head>
  <body class="appear-animate">
    <!-- Page Wrap -->
    <div class="page" id="top">
      <?php include "menu.php" ?>

        <!-- Head Section -->
        <section class="small-section bg-dark-alfa-30 parallax-2" data-background="images/background-red.png">
          <div class="relative container align-left">

            <div class="row">

              <div class="col-md-12">
                <h1 class="font-alt mb-20 mb-xs-0">Directorio ANTAD 2016</h1>
                <h1 class="font-alt" align="center">Reportes de Asociados por Zonas</h1>
              </div>


            </div>

          </div>
        </section>
        <!-- End Head Section -->

        <!-- Start Document
	================================================== -->

        <section class="page-section">
          <div class="relative container">
           <div class="row">
            <div class="col-md-4">
              <div>Zona</div>
              <select id="zona" class="form-control">
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


            <div class="col-md-4">
              <div>Tipo de tienda</div>
              <select id="tipo" onChange="cargarAsociados(); return false;" class="form-control">
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

            <div class="col-md-4">
              <div>Asociado</div>
              <select id="asociado" class="form-control">
                <option value="a" selected>TODOS</option>
                <?php
                $query = " SELECT * FROM asociados
						ORDER BY asociado_nombrecomercial ";
                $result = mysql_query($query);
                if($result){
                  while($values = mysql_fetch_assoc($result)){
                    echo '<option value="'.$values['asociado_id'].'">'.utf8_encode($values['asociado_nombrecomercial']).'</option>';
                  }
                }
                ?>
              </select>
            </div>
            </div>
            <div class="btouleau-button-area">
              <?php crearBoton('Buscar','refrescarConsulta()','',"images/16x16/magnifier.png"); ?>
              <?php crearBoton('Excel','abrirExcel()','',"images/16x16/export_excel.png"); ?>
            </div>
          </div>
          <!-- container -->
          <div id="contenidoA">&nbsp;</div>
        </section>

    </div>
    <!-- JS -->
    <script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
    <script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>        
    <script type="text/javascript" src="js/SmoothScroll.js"></script>
    <script type="text/javascript" src="js/jquery.scrollTo.min.js"></script>
    <script type="text/javascript" src="js/jquery.localScroll.min.js"></script>
    <script type="text/javascript" src="js/jquery.viewport.mini.js"></script>
    <script type="text/javascript" src="js/jquery.countTo.js"></script>
    <script type="text/javascript" src="js/jquery.appear.js"></script>
    <script type="text/javascript" src="js/jquery.sticky.js"></script>
    <script type="text/javascript" src="js/jquery.parallax-1.1.3.js"></script>
    <script type="text/javascript" src="js/jquery.fitvids.js"></script>
    <script type="text/javascript" src="js/owl.carousel.min.js"></script>
    <script type="text/javascript" src="js/isotope.pkgd.min.js"></script>
    <script type="text/javascript" src="js/imagesloaded.pkgd.min.js"></script>
    <script type="text/javascript" src="js/jquery.magnific-popup.min.js"></script>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&amp;language=en"></script>
    <script type="text/javascript" src="js/gmap3.min.js"></script>
    <script type="text/javascript" src="js/wow.min.js"></script>
    <script type="text/javascript" src="js/masonry.pkgd.min.js"></script>
    <script type="text/javascript" src="js/jquery.simple-text-rotator.min.js"></script>
    <script type="text/javascript" src="js/all.js"></script>
    <script type="text/javascript" src="js/contact-form.js"></script>
    <script type="text/javascript" src="js/jquery.ajaxchimp.min.js"></script>        
    <!--[if lt IE 10]><script type="text/javascript" src="js/placeholder.js"></script><![endif]-->
</body>
</html>