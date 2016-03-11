<?php
session_start();
$currentA='login'; 
include ("inc/connect.php");
include ("inc/interfaz.php");

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
        <meta name="author" content="Admin" >
        <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
        
        <!-- Favicons -->
		  <link rel="shortcut icon" href="images/faviconAntad.ico">
		  <link rel="apple-touch-icon" href="images/faviconAntad57.png">
		  <link rel="apple-touch-icon" sizes="72x72" href="images/faviconAntad72.png">
		  <link rel="apple-touch-icon" sizes="114x114" href="images/faviconAntad114.png">
        
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
            
            <!-- Home Section -->
            <section class="home-section bg-gray bg-light-alfa-50 parallax-2" data-background="images/portada.jpg" id="home">
                <div class="js-height-full">
                    
                    <!-- Hero Content -->
                    <div class="home-content container">
                        <div class="home-text">
                       <div>
                            <img src="images/logo-dirantad.png" width= "400" alt="" />
                        </div>
                       <div>
										&nbsp;
                        </div>
                           
                            <h1 class="hs-line-11 no-transp font-alt mb-40 mb-xs-30">
                                BIENVENIDO<br />AL<br />DIRECTORIO<br />ANTAD 2016
                            </h1>
                        
                            <div class="local-scroll">
                                <a href="login.php" class="btn btn-mod btn-medium btn-round">Ingresar</a>
                                <span class="hidden-xs">&nbsp;</span>
                                <span class="hidden-xs">&nbsp;</span>
                                <a href="#informacion" class="btn btn-mod btn-medium btn-round">Más...</a>
                            </div>
                            
                        </div>
                    </div>
                    <!-- End Hero Content -->
                    
                    <!-- Scroll Down -->
                    <div class="local-scroll">
                        <a href="#about" class="scroll-down"><i class="fa fa-angle-down scroll-down-icon"></i></a>
                    </div>
                    <!-- End Scroll Down -->
                    
                </div>
            </section>
            <!-- End Home Section -->

            <!-- Navigation panel -->
            <nav class="main-nav dark transparent stick-fixed">
                <div class="full-wrapper relative clearfix">
                    <!-- Logo ( * your text or image into link tag *) -->
                    <div class="nav-logo-wrap local-scroll">
                        <a href="mp-index.html" class="logo">
                            <img src="images/logoANTAD.png" alt="" />
                        </a>
                    </div>
            </nav>
            <!-- End Navigation panel -->                                
            
            <!-- Section -->
            <section class="page-section" id="informacion">
                <div class="container relative">
                    
                    <div class="row">
                        
                        <div class="col-md-7 mb-sm-40">
                                        <img src="images/logo-dirantad.png" width= "600" alt="" />
                            
                        </div>
                        
                        <div class="col-md-5 col-lg-5 ">
                            
                            <!-- About Project -->
                            <div class="text">
                             <div>   
                                <h3 class="mb-20 mb-xxs-10">EL Directorio ANTAD 2016 contiene</h3>
                                </div>
                                <div>
                               
					Número de tiendas y m2 de piso de Venta a diciembre 2015 a nivel Nacional, por Estado y Zona Geográfica.
<ul>
    <li>Reportes para exportación en Excel.</li>
   <li> Concepto de formatos de tiendas.</li>
    <li>Líneas de Mercancía ANTAD.</li>
    <li>Compatibilidad con dispositivos móviles.</li>
 </ul>
</div>
<div>

                                <h4 class="mb-20 mb-xxs-10">Costo normal: $1,000</h3>
</div>
<div>
Mayores informes:  	Cecilia León (cleon@antad.org.mx)<br />
y / o:  	Rocio Patiño (rpatino@antad.org.mx)

                                </p>
                                
                                <div class="mt-40">
                                    <a href="contratar.php" class="btn btn-mod btn-border btn-round btn-medium" target="_self">Contratar Ahora</a>
                                </div>
     </div>                           
                            </div>
                            <!-- End About Project -->
                            
                        </div>
                    </div>
                </div>
            </section>
            <!-- End Section -->

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
