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

<!-- Mobile Specific Metas -->
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
                $("#empresa").val("");
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

            function insertarRegistro() {
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
                if ($.trim($('#username').val()) == "") {
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
				}
                if ($.trim($('#c1').val()) == "") {
                    $('#c1').focus();
					alerta("Atención","Favor de agregar la Contraseña.");
                    return false;
                }
                if ($.trim($('#c2').val()) == "") {
                    $('#c2').focus();
					alerta("Atención","Favor de confirmar la Contraseña.");
                    return false;
                }
                if ($('#c1').val() != $('#c2').val()) {
                    $('#c1').focus();
					alerta("Atención","La Contraseña de confirmación no coincide, favor de rectificar.");
                    return false;
                }
                if ($.trim($('#username').val()) == "") {
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
				if($("#datosFacturaCheck").is(":checked")){
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
                }
				if ($.trim($('#rfc').val()) == "") {
                    $('#rfc').focus();
					alerta("Atención","Favor de agregar el R.F.C.");
                    return false;
                }
				}//fin if($("#datosFacturaCheck").is(":checked"))
                return true;
            }

            function insertarRegistroAJAX() {
                jQuery.ajax({
                    type: "POST",
                    url: "php/insertarRegistro.php",
                    /*dataType:"html",*/
                    data: "username=" + Base64.encode($("#username").val().toString()) + "&" +
                            "email=" + Base64.encode($("#email").val().toString()) + "&" +
                            "pass1=" + Base64.encode($("#c1").val().toString()) + "&" +
                            "nombre=" + Base64.encode($("#nombre").val().toString()) + "&" +
                            "apellido=" + Base64.encode($("#apellido").val().toString()) + "&" +
                            "empresa=" + Base64.encode($("#empresa").val().toString()) + "&" +
                            "calle=" + Base64.encode($("#calle").val().toString()) + "&" +
                            "no_ext=" + Base64.encode($("#no_ext").val().toString()) + "&" +
                            "no_int=" + Base64.encode($("#no_int").val().toString()) + "&" +
                            "lada=" + Base64.encode($("#lada").val().toString()) + "&" +
                            "telefono=" + Base64.encode($("#telefono").val().toString()) + "&" +
                            "fax=" + Base64.encode($("#fax").val().toString()) + "&" +
                            "colonia=" + Base64.encode($("#colonia").val().toString()) + "&" +
                            "localidad=" + Base64.encode($("#localidad").val().toString()) + "&" +
                            "cp=" + Base64.encode($("#cp").val().toString()) + "&" +
                            "ap=" + Base64.encode($("#ap").val().toString()) + "&" +
                            "pais=" + Base64.encode($("#pais").val().toString()) + "&" +
                            "estado=" + Base64.encode($("#estado").val().toString()) + "&" +
                            "estado_text=" + Base64.encode($("#estado_text").val().toString()) + "&" +
                            "ciudad=" + Base64.encode($("#ciudad").val().toString()) + "&" +
                            "rfc=" + Base64.encode($("#rfc").val().toString()),
                    success: function(data) {
						$registrandose = false;
						if (data.indexOf('Ya usuario') != -1) {
							$('#username').focus();
                            alerta("Atención","El usuario ya existe, favor de cambiarlo.");
							return false;
                        }
                        if (data.indexOf('Ya existe') != -1) {
							$('#email').focus();
                            alerta("Atención","El correo electrónico ya existe, si no puede entrar a su cuenta puede que aún no este activado o se haya terminado su tiempo para acceder.");
							return false;
                        }
						if (data.indexOf('Mailer Error') != -1) {
                            alerta("Atención","Ha completado el registro, pero se ha producido un error al enviar el correo, favor de verificarlo o contactenos.");
							return false;
                        }
                        if (data.indexOf('Bien') != -1) {
                            alerta("¡Enhorabuena, ha completado el Registro! Recuerde su usuario y contraseña.","Le haremos llegar un correo email con las instrucciones para realizar el pago, favor de revisar tambi&eacute;n en la bandeja de correos no deseados. En caso de no recibir dicho correo contactar a: Rocío Patiño al mail rpatino@antad.org.mx o al teléfono (55) 55 80 99 38, gracias.","location.href='index.php';");
							limpiar();
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
				$('#datosFacturaCheck').removeAttr('checked');
				$('#datosFactura').hide();
            });
			function showDatosFactura(){
				if($("#datosFacturaCheck").is(":checked")){
					$('#datosFactura').show();
				}else{
					$('#datosFactura').hide();
				}
			}
        </script>
</head>
<body>
<?php include "inc/phpAll.php"; ?>
<?php include "header.php"; ?>
<?php /* ?><!-- Start Content
          ================================================== --><?php */ ?>
<div class="fullscreen">
  <div class="container contenidoA">
    <div class="fullcontainer">
      <div class="content_block leftTitle">
        <p class="title"> Inscripción al directorio ANTAD 2015</p>
      </div>
    </div>
    <div class="sixteen columns">
      <div class="titulomovil">
        <titulos>Inscripción al directorio ANTAD 2015</titulos>
      </div>
      <p>
      <div id="divForm">
        <form id="formulario" name="formulario" method="POST" action="insertarRegistro.php" onSubmit="return valida(this);">
          <?php //crearBoton('Datos de Cuenta', 'datosCuenta()', '', ''); ?>
          <?php //crearBoton('Datos Personales', 'datosPersonales()', '', ''); ?>
          <div class="columna1">Nombre de usuario *
            <input type="text" name="username" id="username" size="20" onKeyPress="return nextTab(event, this);" maxlength="20"/>
          </div>
          <div class="columna1">Correo Electr&oacute;nico *
            <input type="text" name="email" id="email" size="20" onKeyPress="return nextTab(event, this);" maxlength="100"/>
          </div>
          <div class="clear"></div>
          <div class="columna1">Contraseña *
            <input type="password" name="password" id="c1" size="20" onKeyPress="return nextTab(event, this);" maxlength="20"/>
          </div>
          <div class="columna1">Confirmar Contraseña *
            <input type="password" name="password" id="c2" size="20" onKeyPress="return nextTab(event, this);" maxlength="20"/>
          </div>
          <div class="clear"></div>
          <div class="columna1">Nombre(s) *
            <input type="text" name="nombre" id="nombre" size="20" maxlength="40"  onKeyPress="return nextTab(event, this);"/>
          </div>
          <div>Apellidos *
            <input type="text" name="apellido" id="apellido" size="20" maxlength="40"  onKeyPress="return nextTab(event, this);"/>
          </div>
          <div class="clear"></div>
          <div>Empresa *
            <input type="text" name="empresa" id="empresa" size="20" maxlength="50"  onKeyPress="return nextTab(event, this);"/>
          </div>
          <div class="clear"></div>
            <div class="columna1">LADA * / Tel&eacute;fono *
              <div class="clear"></div>
              <input type="text" name="lada" id="lada"  size="4" maxlength="6" style="width:50px; float:left;" onKeyPress="return nextTab(event, this);"/>
              <div style="float:left; font-size:26px; padding:6px;"> /</div>
              <input type="text" name="telefono" id="telefono"  size="15" maxlength="15" style="width:150px; float:left;" onKeyPress="return nextTab(event, this);"/>
            </div>
          <div class="clear"></div>
          <div class="columna1"> Requiere introducir datos factura (opcional):
            <input type="checkbox" id="datosFacturaCheck" onClick="showDatosFactura();">
            <br>
            <br>
          </div>
          <div class="clear"></div>
          <div id="datosFactura">
            <div class="columna1">Calle *
              <input type="text" name="calle" id="calle"  size="20" maxlength="30"  onKeyPress="return nextTab(event, this);"/>
            </div>
            <div class="columna1">Número Exterior *
              <input type="text" name="no_ext" id="no_ext"  size="20" maxlength="20" onKeyPress="return nextTab(event, this);"/>
            </div>
            <div>Número Interior
              <input type="text" name="no_int" id="no_int"  size="20" maxlength="20" onKeyPress="return nextTab(event, this);"/>
            </div>
            <div class="clear"></div>
            <div class="columna1">Colonia
              <input type="text" name="colonia" id="colonia"size="20" maxlength="30" onKeyPress="return nextTab(event, this);"/>
            </div>
            <div>Localidad
              <input type="text" name="localidad" id="localidad"  size="20" maxlength="30" onKeyPress="return nextTab(event, this);"/>
            </div>
            <div class="clear"></div>
            <div class="columna1">Código Postal
              <input type="text" name="cp" id="cp" size="20" maxlength="10" onKeyPress="return nextTab(event, this);"/>
            </div>
            <div>Apartado Postal
              <input type="text" name="ap" id="ap"  size="20" maxlength="6" onKeyPress="return nextTab(event, this);"/>
            </div>
            <div class="clear"></div>
            <div>Fax
              <input type="text" name="fax" id="fax"  size="20" maxlength="15" onKeyPress="return nextTab(event, this);"/>
            </div>
            <div class="clear"></div>
            <div>Pa&iacute;s *</div>
            <div>
              <select id="pais" onChange="nuevoEstado();
        return false;" onKeyPress="if (isEnter(event)) {
            if ($('#pais').val() == '146') {
                $('#estado').focus();
            } else {
                $('#estado_text').focus();
            }
        }">
                <option value="a">-- Seleccionar un País --</option>
                <?php
                                    $query_sql = "SELECT * FROM paises ORDER BY pais_nombre";
                                    $result = mysql_query($query_sql);
                                    while ($row = mysql_fetch_assoc($result)) {
                                        echo '<option value="' . $row['pais_id'] . '">' . utf8_encode($row['pais_nombre']) . '</option>';
                                    }
                                    ?>
              </select>
            </div>
            <div>Estado *</div>
            <div>
              <select id="estado" onKeyPress="if (isEnter(event))
            $('#ciudad').focus();">
                <option value="a">-- Seleccionar un Estado --</option>
                <?php
                                    $query_sql = "SELECT * FROM estados ORDER BY estado";
                                    $result = mysql_query($query_sql);
                                    while ($row = mysql_fetch_assoc($result)) {
                                        echo '<option value="' . $row['estado_id'] . '">' . utf8_encode($row['estado']) . '</option>';
                                    }
                                    ?>
              </select>
              <input type="text" name="estado_text" id="estado_text"  size="20" maxlength="20" onKeyPress="return nextTab(event, this);"/>
            </div>
            <div class="clear"></div>
            <div>Municipio o Delegación *</div>
            <div>
              <input type="text" name="ciudad" id="ciudad"  size="20" maxlength="30" onKeyPress="return nextTab(event, this);"/>
            </div>
            <div class="clear"></div>
            <div>R.F.C. *
              <input type="text" name="rfc" id="rfc"  size="20" maxlength="20" onKeyPress="return nextTab(event, this);"/>
            </div>
            <div class="clear"></div>
          </div>
          <?php crearBoton('Aceptar','insertarRegistro()','','');?>
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
