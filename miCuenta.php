<?php
$currentA='micuenta';
include ("inc/validar.php");
include ("inc/connect.php");
include ("inc/interfaz.php");
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
<link rel="stylesheet" href="js/nivo-slider/themes/default/default.css" type="text/css" media="screen" />
<script type="text/javascript">
            $intentosMax = 20;
            $registrandose = false;

            function datosCuenta() {
                $('#datosPersonales').hide();
                $('#datosCuenta').show('slow');
            }

            function datosPersonales() {
                $('#datosCuenta').hide();
                $('#datosPersonales').show('slow');
            }

            function limpiar() {
                $("#username").val("");
                $("#email").val("");
                $("#c1").val("");
                $("#c2").val("");
                $("#nombre").val("");
                $("#apellido").val("");
                $("#empres").val("");
                $("#calle").val("");
                $("#no_ext").val("");
                $("#no_int").val("");
                $("#lada").val("");
                $("#telefono").val("");
                $("#colonia").val("");
                $("#cp").val("");
                $("#estado_text").val("");
                $("#ciudad").val("");
                $("#rfc").val("");
            }

            function cambiarContraseña() {
                if ($registrandose)
                    return false;
                if (!validarFormulario()) {
                    return false;
                }
                $registrandose = true;
                $intentos = $intentosMax;
                insertarRegistroAJAX();
            }

            //valida que el campo no este vacio y no tenga solo espacios en blanco  
            function validarFormulario() {
                <?php /*if ($.trim($('#username').val()) == "") {
					$('#username').focus();
                    alerta("Atención","Favor de agregar el Nombre de Usuario.");
                    return false;
                }
                if ($.trim($('#email').val()) == "") {
                    $('#email').focus();
					alerta("Atención","Favor de agregar el Correo Electrónico.");
                    return false;
                }
				if(!validarEmail($('#email').val())){
					$('#email').focus();
					alerta("Atención","Favor de agregar un Correo Electrónico válido.");
                    return false;
				}*/ ?>
				if ($.trim($('#c0').val()) == "") {
                    $('#c0').focus();
					alerta("Atención","Favor de agregar la Contraseña vieja.");
                    return false;
                }
                if ($.trim($('#c1').val()) == "") {
                    $('#c1').focus();
					alerta("Atención","Favor de agregar la Contraseña nueva.");
                    return false;
                }
                if ($.trim($('#c2').val()) == "") {
                    $('#c2').focus();
					alerta("Atención","Favor de confirmar la Contraseña nueva.");
                    return false;
                }
                if ($('#c1').val() != $('#c2').val()) {
                    $('#c1').focus();
					alerta("Atención","La Contraseña de confirmación no coincide, favor de rectificar.");
                    return false;
                }
                <?php /*if ($.trim($('#username').val()) == "") {
                    $('#username').focus();
					alerta("Atención","Favor de agregar el Nombre de Usuario.");
                    return false;
                }
                if ($.trim($('#nombre').val()) == "") {
                    $('#nombre').focus();
					alerta("Atención","Favor de agregar el Nombre completo.");
                    return false;
                }
                if ($.trim($('#apellido').val()) == "") {
                    $('#apellido').focus();
					alerta("Atención","Favor de agregar los Apellidos.");
                    return false;
                }
                if ($.trim($('#empresa').val()) == "") {
                    $('#empresa').focus();
					alerta("Atención","Favor de agregar la Empresa."); 
                    return false;
                }
                if ($.trim($('#calle').val()) == "") {
                    $('#calle').focus();
					alerta("Atención","Favor de agregar la Calle.");
                    return false;
                }
                if ($.trim($('#no_ext').val()) == "") {
                    $('#no_ext').focus();
					alerta("Atención","Favor de agregar el Número Exterior.");
                    return false;
                }
				if (isNaN($('#cp').val()) && $('#cp').val() != "") {
                    $('#cp').focus();
					alerta("Atención","Favor de agregar el Código Postal sólo con números.");
                    return false;
                }
				if (isNaN($('#ap').val()) && $('#ap').val() != "") {
                    $('#ap').focus();
					alerta("Atención","Favor de agregar el Apartado Postal sólo con números.");
                    return false;
                }
                if ($.trim($('#lada').val()) == "") {
                    $('#lada').focus();
					alerta("Atención","Favor de agregar la Lada.");
                    return false;
                }
				if (isNaN($('#lada').val())) {
                    $('#lada').focus();
					alerta("Atención","Favor de agregar la Lada sólo con números.");
                    return false;
                }
                if ($.trim($('#telefono').val()) == "") {
                    $('#telefono').focus();
					alerta("Atención","Favor de agregar el Teléfono.");
                    return false;
                }
				if (isNaN($('#telefono').val())) {
                    $('#telefono').focus();
					alerta("Atención","Favor de agregar el Teléfono sólo con números.");
                    return false;
                }
                if ($('#pais').val() == 'a') {
                    $('#pais').focus();
					alerta("Atención","Favor de agregar el País.");
                    return false;
                }
                if ($('#pais').val() == '146' && $('#estado').val() == 'a') {
                    $('#estado').focus();
					alerta("Atención","Favor de agregar el Estado.");
                    return false;
                }
                if ($('#pais').val() != '146' && $.trim($('#estado_text').val()) == "") {
                    $('#estado_text').focus();
					alerta("Atención","Favor de agregar el Estado.");
                    return false;
                }
                if ($.trim($('#ciudad').val()) == "") {
                    $('#ciudad').focus();
					alerta("Atención","Favor de agregar el Municipio o Delegación.");
                    return false;
                }*/ ?>
                return true;
            }

            function insertarRegistroAJAX() {
                jQuery.ajax({
                    type: "POST",
                    url: "php/cambiarPassword.php",
                    /*dataType:"html",*/
                    data: "pass0=" + Base64.encode($("#c0").val().toString()) + "&" +
                            "pass1=" + Base64.encode($("#c1").val().toString()),
                    success: function(data) {
						$registrandose = false;
                        if (data.indexOf('Password incorrecto') != -1) {
                            alerta("Atención","Su contraseña vieja no coincide, favor de verificar.");
							return false;
                        }
                        if (data == 'Bien') {
                            alerta("Atención","Se ha cambiado la Contraseña exitosamente.","location.href='inicio.php'");
                        } else {
                            alerta("Atención","Lo sentimos ha ocurrido un error.");
                        }
                    }, //fin success
                    error: function(xhr, ajaxOptions, thrownError) {
                        if ($intentos < 1) {
                            alerta("Atención","Lo sentimos, su conexi&oacute;n con el servidor se ha perdido, favor de contactarse con nosotros. ");
                        } else {
                            $intentos--;
                            insertarRegistroAJAX();
                        }
                    }
                });
            }

            function nuevoEstado() {
                if ($('#pais').val() == '146') {
                    $('#estado_text').hide();
                    $('#estado').show();
                    $('#estado').val('a');
                } else {
                    $('#estado').hide();
                    $('#estado_text').show();
                    $('#estado_text').val('');
                }
            }

            $(function() {
                $('#pais').val('146');
                nuevoEstado();
                $('#username').focus();
            });
        </script>
</head>
<body>
<?php include "inc/phpAll.php"; ?>
<?php include "header.php"; ?>
<?php include "mainmenu.php" ?>
<?php /* ?><!-- Start Content
          ================================================== --><?php */ ?>
<div class="fullscreen">
  <div class="container contenidoA">
    <div class="fullcontainer">
      <div class="content_block leftTitle">
        <p class="title"> Mi Cuenta</p>
      </div>
    </div>
    <div class="sixteen columns">
      <div class="titulomovil">
        <titulos>Mi Cuenta</titulos>
      </div>
      <p>
      <div id="divForm">
        <form id="formulario" name="formulario" method="POST" action="insertarRegistro.php" onSubmit="return valida(this);">
          <?php //crearBoton('Datos de Cuenta', 'datosCuenta()', '', ''); ?>
          <?php //crearBoton('Datos Personales', 'datosPersonales()', '', ''); ?>
          <div class="text_higlight" style="margin-bottom:5px;">Cambio de Contraseña:</div>
          <div class="clear"></div>
          <div>Contraseña vieja *
            <input type="password" name="password" id="c0" size="20" onKeyPress="return nextTab(event, this);" maxlength="20"/>
          </div>
          <div class="clear"></div>
          <div>Contraseña nueva *
            <input type="password" name="password" id="c1" size="20" onKeyPress="return nextTab(event, this);" maxlength="20"/>
          </div>
          <div>Confirmar Contraseña nueva *
            <input type="password" name="password" id="c2" size="20" onKeyPress="return nextTab(event, this);" maxlength="20"/>
          </div>
          <?php crearBoton('Aceptar','cambiarContraseña()','','');?>
        </form>
      </div>
      </p>
    </div>
    <div class="clearfix"></div>
  </div>
</div>
<?php /* ?><!-- End Content
          ================================================== --><?php */ ?>
<?php include "footer.php" ?>
</body>
</html>