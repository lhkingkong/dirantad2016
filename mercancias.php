<?php
include ("inc/validar.php");
include ("inc/connect.php");

$query_count = "SELECT COUNT(*) NUMERO, SUM(S.NUMTIENDAS) NUMTIENDASF, SUM(S.M2PISO) M2PISOF 
				FROM  (
						SELECT SUM(asociados_estados.asociado_estado_numtiendas) NUMTIENDAS, SUM(asociados_estados.asociado_estado_m2pisoventas)
 M2PISO, asociados_estados.asociado_id 
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
  </head>

  <body class="appear-animate">

    <!-- Page Loader -->
    <div class="page-loader">
      <div class="loader">Loading...</div>
    </div>
    <!-- End Page Loader -->

    <!-- Page Wrap -->
    <div class="page" id="top">

      <?php include "menu.php" ?>


        <!-- Head Section -->
        <section class="small-section bg-dark-alfa-30 parallax-2" data-background="images/background-red.png">
          <div class="relative container align-left">

            <div class="row">

              <div class="col-md-12">
                <h1 class="font-alt mb-20 mb-xs-0">Directorio ANTAD 2016</h1>
                <h1 class="font-alt" align="center">Mercancías</h1>
              </div>


            </div>

          </div>
        </section>
        <!-- End Head Section -->


        <!-- Section -->
        <section class="page-section">
          <div class="container relative">

            <!-- Row -->
            <div class="row">

              <!-- Col -->

              <div class="col-sm-10 col-sm-offset-1">


                <!-- Nav tabs -->
                <ul class="nav nav-tabs tpl-tabs animate">
                  <li class="active">
                    <a href="#supermercado" data-toggle="tab"><strong>1. Supermercado</strong></a>
                  </li>
                  <li>
                    <a href="#ropacalzado" data-toggle="tab"><strong>2. Ropa y Calzado</strong></a>
                  </li>
                  <li>
                    <a href="#generales" data-toggle="tab"><strong>3. Mercancías Generales</strong></a>
                  </li>
                </ul>


                <!-- Tab panes -->
                <div class="tab-content tpl-tabs-cont section-text">
                  <div class="tab-pane active in" id="supermercado">
                    <div class="col-sm-12 mb-xs-40">
                      <!-- Toggle -->
                      <dl class="toggle">
                        <dt>
                          <a href="">1.1. Abarrotes</a>
                        </dt>
                        <dd>
                          <?php include "mercancias/1.1.php" ?>
                        </dd>


                        <dt>
                          <a href="">1.2. Perecederos</a>
                        </dt>
                        <dd>
                          <?php include "mercancias/1.2.php" ?>
                        </dd>

                      </dl>
                      <!-- End Toggle -->

                    </div>

                  </div>

                  <div class="tab-pane fade" id="ropacalzado">

                    <div class="col-sm-12 mb-xs-40">

                      <!-- Toggle -->
                      <dl class="toggle">
                        <dt>
                                    <a href="">2.1. Ropa</a>
                               		 </dt>
                        <dd>
                          <?php include "mercancias/2.1.php" ?>
                        </dd>


                        <dt>
                                    <a href="">1.2. Calzado</a>
                               			 </dt>
                        <dd>
                          <?php include "mercancias/2.2.php" ?>
                        </dd>

                      </dl>
                      <!-- End Toggle -->

                    </div>

                  </div>

                  <div class="tab-pane fade" id="generales">

                    <div class="col-sm-12 mb-xs-40">

                      <!-- Toggle -->
                      <dl class="toggle">
                        <dt>
                                 			   <a href="">3.1 Enseres Mayores</a>
                               		 </dt>
                        <dd>
                          <?php include "mercancias/3.1.php" ?>
                        </dd>


                        <dt>
                                			    <a href="">3.2 Línea Blanca</a>
                               			 </dt>
                        <dd>
                          <?php include "mercancias/3.2.php" ?>
                        </dd>

                        <dt>
                                			    <a href="">3.3 Enseres Menores</a>
                               			 </dt>
                        <dd>
                          <?php include "mercancias/3.3.php" ?>
                        </dd>

                        <dt>
                                			    <a href="">3.4 Electrónica y Video, Celulares y Computadoras </a>
                               			 </dt>
                        <dd>
                          <?php include "mercancias/3.4.php" ?>
                        </dd>

                        <dt>
                                			    <a href="">3.5 Líneas Generales</a>
                               			 </dt>
                        <dd>
                          <?php include "mercancias/3.5.php" ?>
                        </dd>

                        <dt>
                                			    <a href="">3.6 Ferreteria</a>
                               			 </dt>
                        <dd>
                          <?php include "mercancias/3.6.php" ?>
                        </dd>

                        <dt>
                                			    <a href="">3.7 Cuidado e Higiena Personal</a>
                               			 </dt>
                        <dd>
                          <?php include "mercancias/3.7.php" ?>
                        </dd>

                        <dt>
                                			    <a href="">3.8 Farmacia</a>
                               			 </dt>
                        <dd>
                          <?php include "mercancias/3.8.php" ?>
                        </dd>

                        <dt>
                                			    <a href="">3.9 Juguetes</a>
                               			 </dt>
                        <dd>
                          <?php include "mercancias/3.9.php" ?>
                        </dd>

                        <dt>
                                			    <a href="">3.10 Papelería</a>
                               			 </dt>
                        <dd>
                          <?php include "mercancias/3.10.php" ?>
                        </dd>
                        <dt>
                                			    <a href="">3.11 Varíos</a>
                               			 </dt>
                        <dd>
                          <?php include "mercancias/3.11.php" ?>
                        </dd>


                      </dl>
                      <!-- End Toggle -->

                    </div>

                  </div>

                </div>

                <!-- End Tab panes -->

              </div>
            </div>
          </div>
        </section>
    </div>

    <hr />


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