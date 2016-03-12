<?php
$currentA='login';
include ("inc/connect.php");
include ("inc/interfaz.php");
?>
  <!DOCTYPE html>
  <html>

  <head>
    <title>Directorio ANTAD 2016</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta charset="utf-8">
    <meta name="author" content="Admin">
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

    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/layout.css">
    <link rel="stylesheet" href="css/btouleau.css">
    <?php include "inc/jsAll.php"; ?>


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

        function insertarRegistro(e) {
          e.stopImmediatePropagation();
          e.preventDefault();
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
            alerta("Atención", "Favor de agregar el Nombre de Usuario.");
            return false;
          }
          if ($.trim($('#email').val()) == "") {
            $('#email').focus();
            alerta("Atención", "Favor de agregar el Correo Electrónico.");
            return false;
          }
          if (!validarEmail($('#email').val())) {
            $('#email').focus();
            alerta("Atención", "Favor de agregar un Correo Electrónico válido.");
            return false;
          }
          if ($.trim($('#c1').val()) == "") {
            $('#c1').focus();
            alerta("Atención", "Favor de agregar la Contraseña.");
            return false;
          }
          if ($.trim($('#c2').val()) == "") {
            $('#c2').focus();
            alerta("Atención", "Favor de confirmar la Contraseña.");
            return false;
          }
          if ($('#c1').val() != $('#c2').val()) {
            $('#c1').focus();
            alerta("Atención", "La Contraseña de confirmación no coincide, favor de rectificar.");
            return false;
          }
          if ($.trim($('#username').val()) == "") {
            $('#username').focus();
            alerta("Atención", "Favor de agregar el Nombre de Usuario.");
            return false;
          }
          if ($.trim($('#nombre').val()) == "") {
            $('#nombre').focus();
            alerta("Atención", "Favor de agregar el Nombre completo.");
            return false;
          }
          if ($.trim($('#apellido').val()) == "") {
            $('#apellido').focus();
            alerta("Atención", "Favor de agregar los Apellidos.");
            return false;
          }
          if ($.trim($('#empresa').val()) == "") {
            $('#empresa').focus();
            alerta("Atención", "Favor de agregar la Empresa.");
            return false;
          }
          if ($.trim($('#lada').val()) == "") {
            $('#lada').focus();
            alerta("Atención", "Favor de agregar la Lada.");
            return false;
          }
          if (isNaN($('#lada').val())) {
            $('#lada').focus();
            alerta("Atención", "Favor de agregar la Lada sólo con números.");
            return false;
          }
          if ($.trim($('#telefono').val()) == "") {
            $('#telefono').focus();
            alerta("Atención", "Favor de agregar el Teléfono.");
            return false;
          }
          if (isNaN($('#telefono').val())) {
            $('#telefono').focus();
            alerta("Atención", "Favor de agregar el Teléfono sólo con números.");
            return false;
          }
          if ($("#datosFacturaCheck").is(":checked")) {
            if ($.trim($('#calle').val()) == "") {
              $('#calle').focus();
              alerta("Atención", "Favor de agregar la Calle.");
              return false;
            }
            if ($.trim($('#no_ext').val()) == "") {
              $('#no_ext').focus();
              alerta("Atención", "Favor de agregar el Número Exterior.");
              return false;
            }
            if (isNaN($('#cp').val()) && $('#cp').val() != "") {
              $('#cp').focus();
              alerta("Atención", "Favor de agregar el Código Postal sólo con números.");
              return false;
            }
            if (isNaN($('#ap').val()) && $('#ap').val() != "") {
              $('#ap').focus();
              alerta("Atención", "Favor de agregar el Apartado Postal sólo con números.");
              return false;
            }

            if ($('#pais').val() == 'a') {
              $('#pais').focus();
              alerta("Atención", "Favor de agregar el País.");
              return false;
            }
            if ($('#pais').val() == '146' && $('#estado').val() == 'a') {
              $('#estado').focus();
              alerta("Atención", "Favor de agregar el Estado.");
              return false;
            }
            if ($('#pais').val() != '146' && $.trim($('#estado_text').val()) == "") {
              $('#estado_text').focus();
              alerta("Atención", "Favor de agregar el Estado.");
              return false;
            }
            if ($.trim($('#ciudad').val()) == "") {
              $('#ciudad').focus();
              alerta("Atención", "Favor de agregar el Municipio o Delegación.");
              return false;
            }
            if ($.trim($('#rfc').val()) == "") {
              $('#rfc').focus();
              alerta("Atención", "Favor de agregar el R.F.C.");
              return false;
            }
          } //fin if($("#datosFacturaCheck").is(":checked"))
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
            success: function (data) {
              $registrandose = false;
              if (data.indexOf('Ya usuario') != -1) {
                $('#username').focus();
                alerta("Atención", "El usuario ya existe, favor de cambiarlo.");
                return false;
              }
              if (data.indexOf('Ya existe') != -1) {
                $('#email').focus();
                alerta("Atención", "El correo electrónico ya existe, si no puede entrar a su cuenta puede que aún no este activado o se haya terminado su tiempo para acceder.");
                return false;
              }
              if (data.indexOf('Mailer Error') != -1) {
                alerta("Atención", "Ha completado el registro, pero se ha producido un error al enviar el correo, favor de verificarlo o contactenos.");
                return false;
              }
              if (data.indexOf('Bien') != -1) {
                alerta("¡Enhorabuena, ha completado el Registro! Recuerde su usuario y contraseña.", "Le haremos llegar un correo email con las instrucciones para realizar el pago, favor de revisar tambi&eacute;n en la bandeja de correos no deseados. En caso de no recibir dicho correo contactar a: Rocío Patiño al mail rpatino@antad.org.mx o al teléfono (55) 55 80 99 38, gracias.", "location.href='index.php';");
                limpiar();
              } else {
                alerta("Atención", "Lo sentimos ha ocurrido un error.");
              }
            }, //fin success
            error: function (xhr, ajaxOptions, thrownError) {
              if ($intentos < 1) {
                alerta("Atención", "Lo sentimos, su conexi&oacute;n con el servidor se ha perdido, favor de contactarse con nosotros. ");
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

        $(function () {
          $('#pais').val('146');
          nuevoEstado();
          $('#username').focus();
          $('#datosFacturaCheck').removeAttr('checked');
          $('#datosFactura').hide();
        });

        function showDatosFactura() {
          if ($("#datosFacturaCheck").is(":checked")) {
            $('#datosFactura').show();
          } else {
            $('#datosFactura').hide();
          }
        }
      </script>
  </head>

  <body class="appear-animate" style="background-color:#333;">
    <?php include "inc/phpAll.php"; ?>

      <!-- Page Loader -->
      <div class="page-loader">
        <div class="loader">Loading...</div>
      </div>
      <!-- End Page Loader -->

      <!-- Page Wrap -->
      <div class="page" id="top">
        
        <!-- Navigation panel -->
        <nav class="main-nav dark transparent stick-fixed">
          <div class="full-wrapper relative clearfix">
            <!-- Logo ( * your text or image into link tag *) -->
            <div class="nav-logo-wrap local-scroll">
              <a href="index.php" class="logo">
                <img src="images/logoANTAD.png" alt="" />
              </a>
            </div>
            </nav>
          <!-- End Navigation panel -->   

        <!-- Registro Content -->
        <!-- Section -->
          <section class="home-section bg-gray bg-light-alfa-50 parallax-2 btouleau-with-navbar" data-background="images/portada.jpg" id="informacion">
          <div class="container relative">
            <div class="row">
              <form class="form-horizontal" id="formulario" name="formulario" method="POST">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Nombre de usuario *</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="username" id="username" onKeyPress="return nextTab(event, this);" maxlength="20" placeholder="Nombre de usuario" />
                  </div>
                </div>
                <div class="form-group">
                  <label for="email" class="col-sm-3 control-label">Correo Electr&oacute;nico *</label>
                  <div class="col-sm-9">
                    <input type="email" class="form-control" name="email" id="email" onKeyPress="return nextTab(event, this);" maxlength="100" placeholder="Correo Electr&oacute;nico" />
                  </div>
                </div>
                <div class="form-group">
                  <label for="c1" class="col-sm-3 control-label">Contraseña *</label>
                  <div class="col-sm-9">
                    <input type="password" class="form-control" name="password" id="c1" size="20" onKeyPress="return nextTab(event, this);" maxlength="20" placeholder="Contraseña" />
                  </div>
                </div>
                <div class="form-group">
                  <label for="c2" class="col-sm-3 control-label">Confirmar Contraseña *</label>
                  <div class="col-sm-9">
                    <input type="password" class="form-control" name="password" id="c2" size="20" onKeyPress="return nextTab(event, this);" maxlength="20" placeholder="Confirmar Contraseña" />
                  </div>
                </div>

                <div class="form-group">
                  <label for="nombre" class="col-sm-3 control-label">Nombre(s) *</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="nombre" id="nombre" size="20" maxlength="40" onKeyPress="return nextTab(event, this);" placeholder="Nombre(s)" />
                  </div>
                </div>
                <div class="form-group">
                  <label for="apellido" class="col-sm-3 control-label">Apellidos *</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="apellido" id="apellido" size="20" maxlength="40" onKeyPress="return nextTab(event, this);" placeholder="Apellidos" />
                  </div>
                </div>
                <div class="form-group">
                  <label for="empresa" class="col-sm-3 control-label">Empresa *</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="empresa" id="empresa" size="20" maxlength="50" onKeyPress="return nextTab(event, this);" placeholder="Empresa" />
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">LADA * / Tel&eacute;fono *</label>
                  <div class="col-sm-9">
                    <div class="form-group row">
                      <div class="col-sm-3">
                        <input type="text" class="form-control" name="lada" id="lada" size="4" maxlength="6" onKeyPress="return nextTab(event, this);" placeholder="Lada">
                      </div>
                      <label for="inputValue" class="col-sm-1 control-label">/</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="telefono" id="telefono" size="15" maxlength="15" onKeyPress="return nextTab(event, this);" placeholder="Tel&eacute;fono">
                      </div>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-sm-offset-3 col-sm-9">
                    <div class="checkbox">
                      <label>
                        <input type="checkbox" id="datosFacturaCheck" onClick="showDatosFactura();"> <strong>Requiere introducir datos factura (opcional)</strong>
                      </label>
                    </div>
                  </div>
                </div>

                <div id="datosFactura">
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-3 control-label">Calle *</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="calle" id="calle" size="20" maxlength="30" onKeyPress="return nextTab(event, this);" placeholder="Calle" />
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-3 control-label">Número Exterior *</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="no_ext" id="no_ext" size="20" maxlength="20" onKeyPress="return nextTab(event, this);" placeholder="Número Exterior" />
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-3 control-label">Número Interior</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="no_int" id="no_int" size="20" maxlength="20" onKeyPress="return nextTab(event, this);" placeholder="Número Interior" />
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-3 control-label">Colonia</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="colonia" id="colonia" size="20" maxlength="30" onKeyPress="return nextTab(event, this);" placeholder="Colonia" />
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-3 control-label">Localidad</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="localidad" id="localidad" size="20" maxlength="30" onKeyPress="return nextTab(event, this);" placeholder="Localidad" />
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-3 control-label">Código Postal</label>
                    <div class="col-sm-3">
                      <input type="text" class="form-control" name="cp" id="cp" size="20" maxlength="10" onKeyPress="return nextTab(event, this);" placeholder="Código Postal" />
                    </div>
                    <label for="inputEmail3" class="col-sm-3 control-label">Apartado Postal</label>
                    <div class="col-sm-3">
                      <input type="text" class="form-control" name="ap" id="ap" size="20" maxlength="6" onKeyPress="return nextTab(event, this);" placeholder="Apartado Postal" />
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-3 control-label">Fax</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="fax" id="fax" size="20" maxlength="15" onKeyPress="return nextTab(event, this);" placeholder="Fax" />
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="pais" class="col-sm-3 control-label">Pa&iacute;s *</label>
                    <div class="col-sm-9">
                      <select class="form-control" id="pais" onChange="nuevoEstado();
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
                  </div>
                  <div class="form-group">
                    <label for="estado" class="col-sm-3 control-label">Estado *</label>
                    <div class="col-sm-9">
                      <select class="form-control" id="estado" onKeyPress="if (isEnter(event))
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
                      <input type="text" class="form-control" name="estado_text" id="estado_text" size="20" maxlength="20" onKeyPress="return nextTab(event, this);" />
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-3 control-label">Municipio o Delegación *</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="ciudad" id="ciudad" size="20" maxlength="30" onKeyPress="return nextTab(event, this);" placeholder="Municipio o Delegación" />
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-3 control-label">R.F.C. *</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="rfc" id="rfc" size="20" maxlength="20" onKeyPress="return nextTab(event, this);" placeholder="R.F.C." />
                    </div>
                  </div>

                </div>

                <div class="form-group">
                  <div class="col-sm-offset-3 col-sm-9">
                    <button type="button" class="submit_btn btn btn-mod btn-medium btn-round" onclick="insertarRegistro(event)">Registrar</button>
                  </div>
                </div>
              </form>

              <!-- End Registro Content -->
            </div>
          </div>
        </section>
        <!-- End Home Section -->

      </div>
      <!-- End Page Wrap -->


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