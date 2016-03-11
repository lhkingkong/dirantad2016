<?php
$currentA='login';
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

            function limpiar() {
                $("#email").val("");
            }

            function enviarContrasena() {
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
                if ($.trim($('#email').val()) == "") {
                    $('#email').focus();
					alerta("Atención","Favor de agregar el Correo Electrónico.");
                    return false;
                }
				if(!validarEmail($('#email').val())){
					$('#email').focus();
					alerta("Atención","Favor de agregar un Correo Electrónico válido.");
                    return false;
				}
                return true;
            }

            function insertarRegistroAJAX() {
                jQuery.ajax({
                    type: "POST",
                    url: "php/enviarPassword.php",
                    /*dataType:"html",*/
                    data: "email=" + Base64.encode($("#email").val().toString()),
                    success: function(data) {
						$registrandose = false;
                        if (data.indexOf('Sin cuenta') != -1) {
                            alerta("Atención","El correo electrónico no existe, por seguridad requiere ser el correo registrado en la cuenta.");
							return false;
                        }
                        if (data == 'Bien') {
                            alerta("¡Muy bien!","se ha enviado un mensaje al Correo Electrónico especificado.",'location.href="inicio.php"');
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
<?php /* ?><!-- Start Content
          ================================================== --><?php */ ?>
<div class="fullscreen">
  <div class="container contenidoA">
    
    <div class="sixteen columns">
      
      <p>
      <div id="divForm">
        <form id="formulario" name="formulario" method="POST" action="insertarRegistro.php" onSubmit="return valida(this);">
          <div style="margin-bottom:15px;">Se te enviará la contraseña al correo indicado.</div>
          <div>Correo Electr&oacute;nico *
            <input type="text" name="email" id="email" size="20" onKeyPress="return nextTab(event, this);" maxlength="100"/>
          </div>
          <div class="clear"></div>
          <?php crearBoton('Aceptar','enviarContrasena()','','');?>
          
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