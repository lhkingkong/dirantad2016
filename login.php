<?php
session_start();
include ("inc/connect.php");

if(!empty($_SESSION['e4m'])){
	header("location:inicio.php");
}
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
    <link rel="stylesheet" href="css/btouleau.css">

    <?php include "inc/jsAll.php"; ?>
      <script type="text/javascript">
        $intentosMax = 20;

        function login(event) {
          event.preventDefault();
          event.stopImmediatePropagation();
          if (!validar())
            return false;
          $intentos = $intentosMax;
          loginAJAX();
        }

        function validar() {
          if ($.trim($('#email').val()) == "") {
            alerta("Atención", "Favor de agregar un Usuario o Correo Electrónico.");
            $('#email').focus();
            return false;
          }
          /*if(!validarEmail($('#email').val())){
					alerta("Atención","Favor de agregar un Correo Electrónico válido.");
                    $('#email').focus();
                    return false;
				}*/
          if ($.trim($('#password').val()) == "") {
            alerta("Atención", "Favor de agregar la Contraseña.");
            $('#password').focus();
            return false;
          }
          return true;
        }
        $(document).ready(function () {
          $('#login-form').on('submit', function (e) {
            e.preventDefault();
          });
        });

        function loginAJAX() {
          jQuery.ajax({
            type: "POST",
            url: "php/validarLogin.php",
            /*dataType:"html",*/
            data: "email=" + Base64.encode($("#email").val().toString()) + "&" +
              "pass1=" + Base64.encode($("#password").val().toString()),
            success: function (data) {
              $registrandose = false;
              if (data.indexOf('Sin registro') != -1) {
                alerta("Atención", "No existe el Usuario / Correo Electrónico o su Contraseña es incorrecta.");
                return false;
              }
              if (data.indexOf('Inactivo') != -1) {
                alerta("Atención", "Su cuenta aun no ha sido activada.");
                return false;
              }
              if (data.indexOf('Vencida') != -1) {
                alerta("Atención", "Su cuenta se encuentra vencida o no ha sido activada con el periodo de vencimiento correspondiente.");
                return false;
              }
              if (data == 'Bien') {
                location.href = "inicio.php";
              } else {
                alerta("Atención", "Lo sentimos ha ocurrido un error.");
              }
            }, //fin success
            error: function (xhr, ajaxOptions, thrownError) {
              if ($intentos < 1) {
                alerta("Atención", "Lo sentimos, su conexi&oacute;n con el servidor se ha perdido, favor de contactarse con nosotros. ");
              } else {
                $intentos--;
                loginAJAX();
              }
            }
          });
        }
      </script>
  </head>

  <body class="appear-animate">
    <?php include "inc/phpAll.php"; ?>

      <!-- Page Loader -->
      <div class="page-loader">
        <div class="loader">Cargando...</div>
      </div>
      <!-- End Page Loader -->
      <form id='login-form'>
        <!-- Page Wrap -->
        <div class="page" id="top">

          <!-- Head Section -->
          <section class="small-section bg-dark-alfa-30 parallax-2" data-background="images/background-red.png">
            <div class="relative container align-left">

              <div class="row">

                <div class="col-md-12">
                  <h1 class="hs-line-11 font-alt mb-20 mb-xs-0"><center>Ingresar al<br />Directorio ANTAD 201886</center></h1>
                  <div class="hs-line-4 font-alt">
                    <center>Favor de ingresar su usuario y contraseña.
                      <center>
                  </div>
                </div>


              </div>

            </div>
          </section>
          <!-- End Head Section -->


          <!-- Section -->
          <section class="page-section">
            <div class="container relative">

              <!-- Tab panes -->
              <div class="tab-content tpl-minimal-tabs-cont section-text">

                <div class="tab-pane fade in active" id="mini-one">

                  <!-- Login Form -->
                  <div class="row">
                    <div class="col-md-4 col-md-offset-4">

                      <form class="form contact-form" id="contact_form">
                        <div class="clearfix">

                          <!-- Username -->
                          <div class="form-group">
                            <input type="text" name="email" id="email" class="input-md round form-control" placeholder="Usuario" pattern=".{3,100}" required>
                          </div>

                          <!-- Password -->
                          <div class="form-group">
                            <input type="password" name="password" id="password" class="input-md round form-control" placeholder="Contraseña" pattern=".{5,100}" required>
                          </div>

                        </div>

                        <div class="clearfix">

                          <div class="cf-left-col">

                            <!-- Inform Tip -->
                            <div class="form-tip pt-20">
                              <a href="olvidarPassword.php">Olvidó su contraseña?</a>
                            </div>

                          </div>

                          <div class="cf-right-col">

                            <!-- Send Button -->
                            <div class="align-right pt-10">
                              <button class="submit_btn btn btn-mod btn-medium btn-round" id="login-btn" onclick="login(event)">Entrar</button>
                            </div>

                          </div>

                        </div>

                      </form>

                    </div>
                  </div>
                  <!-- End Login Form -->
                  <div class="btouleau-contratar-div">
                    <div>En caso de no contar con una cuenta, tiene la opción de contratar el directorio </div>
                      <a href="contratar.php" class="btn btn-mod btn-border btn-round btn-medium" target="_self">Contratar Ahora</a>
                  </div>

                </div>

              </div>

            </div>
          </section>
          <!-- End Section -->

          <!-- Footer -->
          <?php include "footer-dirantad.php"; ?>
            <!-- End Foter -->
      </form>
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