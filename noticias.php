<?php
$currentA='noticias';
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
                            <h1 class="hs-line-11 font-alt mb-20 mb-xs-0">Directorio ANTAD 2016</h1>
                            <h1 class="hs-line-11 font-alt mb-20 mb-xs-0">Noticias</h1>                         
                        </div>
                        
  
                    </div>
                    
                </div>
            </section>
            <!-- End Head Section --> 
 
           <!-- Section Aperturas -->
            <section class="page-section" id="aperturas">
                <div class="container relative">
 
                    <div class="section-text">
							<h1 class="uppercase">Aperturas 2015</h1>   

                    <p align="justify">

Durante el año pasado se invirtieron <span class="percent">3,500 millones de dólares</span>, considerando el ajuste 
      que realizaron varias cadenas en su presupuesto original de proyectos.<br />
            <br />
      Las cadenas asociadas a la ANTAD registraron más de <span class="percent">5,495 nuevas tiendas</span></p>
      
                    <!-- Row -->
                    <div class="row">
                        
                        <!-- Col -->
                        
                        <div class="col-sm-4 mb-40">
                            
                            <div class="text">
                                <h5 class="uppercase">Autoservicios</h5>
        <div class="percent">
          4.5 % <span>(245 tiendas)</span>
        </div>              
                              
                            </div>
                            
                        </div>
                        
                        <!-- End Col -->
                        
                        <!-- Col -->
                        
                        <div class="col-sm-4 mb-40">
                            
                            <div class="text">
                                <h5 class="uppercase">Departamentales</h5>
        <div class="percent">
          3.4 % <span>(189 tiendas)</span>
        </div>

                            </div>
                            
                        </div>
                        
                        <!-- End Col -->
                        
                        <!-- Col -->
                        
                        <div class="col-sm-4 mb-40">
                            
                            <div class="text">
                                <h5 class="uppercase">Especializadas</h5>


        <div class="percent">
        92.1 % <span>(5,061 tiendas)</span>
        </div>
                            </div>
                            
                        </div>
                        
                        <!-- End Col -->
                        
                     </div>
                    <!-- End Row -->
                                  
                    <hr class="mb-40" />    					
 
 

              
                </div>
            </section>
            <!-- End Section -->
            
                     <hr />     

           <!-- Section Aperturas -->
            <section class="page-section"  id="proyecciones">
                <div class="container relative">
 
                    <div class="section-text">
							<h1 class="uppercase">Proyecciones 2016</h1>   

                    <p align="justify">
		  Se estima para el 2016 un crecimiento nominal a tiendas totales de <span class="percent">6.3%</span> y a tiendas iguales de <span class="percent">2.37%</span>.<br />
            <br />
            Para el 2015 se estima una inversión de <span class="percent">3,6000 millones de dólares</span> que beneficiará a los consumidores y a diversos sectores económicos.<br>
              <br>
              El mayor monto de la inversión se destinará a nuevas tiendas, remodelaciones, logística y distribución, sistemas y tecnología, así como capacitación y desarrollo de capital.
            </div>
                                  
                    <hr class="mb-40" />    					
 
 

              
                </div>
            </section>
            <!-- End Section -->


           <!-- Section Eventos -->
            <section class="page-section"  id="eventos">
                <div class="container relative">
 
                    <div class="section-text">
							<h1 class="uppercase">Eventos 2016</h1>   

                    <p align="justify">
		  Se estima para el 2016 un crecimiento nominal a tiendas totales de <span class="percent">6.3%</span> y a tiendas iguales de <span class="percent">2.37%</span>.<br />
            <br />
            Para el 2015 se estima una inversión de <span class="percent">3,6000 millones de dólares</span> que beneficiará a los consumidores y a diversos sectores económicos.<br>
              <br>
              El mayor monto de la inversión se destinará a nuevas tiendas, remodelaciones, logística y distribución, sistemas y tecnología, así como capacitación y desarrollo de capital.
            </div>
                                  
                    <hr class="mb-40" />    					
            
                </div>
            </section>
            <!-- End Section -->
            

           <!-- Section Publicaciones -->
            <section class="page-section"  id="libros">
                <div class="container relative">
 
                    <div class="section-text">
							<h1 class="uppercase">Publicaciones ANTAD</h1>   

                    <p align="justify">
		  Se estima para el 2016 un crecimiento nominal a tiendas totales de <span class="percent">6.3%</span> y a tiendas iguales de <span class="percent">2.37%</span>.<br />
            <br />
            Para el 2015 se estima una inversión de <span class="percent">3,6000 millones de dólares</span> que beneficiará a los consumidores y a diversos sectores económicos.<br>
              <br>
              El mayor monto de la inversión se destinará a nuevas tiendas, remodelaciones, logística y distribución, sistemas y tecnología, así como capacitación y desarrollo de capital.
            </div>
                                  
                    <hr class="mb-40" />    					
 
 

              
                </div>
            </section>
            <!-- End Section -->
                                                                              
            
        

            
            
 <?php include "bottom.php" ?>
                    
                 </div>
                 
                 
                 <!-- Top Link -->
                 <div class="local-scroll">
                     <a href="#top" class="link-to-top"><i class="fa fa-caret-up"></i></a>
                 </div>
                 <!-- End Top Link -->
                 
            </footer>
            <!-- End Foter -->
        
        
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
