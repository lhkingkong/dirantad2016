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
                            <h1 class="hs-line-11 font-alt mb-20 mb-xs-0">Bienvenido al Directorio ANTAD 2016</h1>
                            <div class="hs-line-4 font-alt">
                                Aquí encontrará información relacionada con la Asociación Nacional de Tiendas de Autoservicios y Departamentales "ANTAD", así como las Cadenas Asociadas.

                            </div>
                        </div>
                        
  
                    </div>
                    
                </div>
            </section>
            <!-- End Head Section --> 
            
            
            <!-- Section -->
            <section class="page-section pt-0 pb-0 bg-dark-alfa-30" data-background="images/portada.jpg">
                <div class="js-height-parent container relative">
                    
                    <div class="home-content">
                        <div class="home-text">

                            
                            <h2 class="hs-line-14 font-alt mb-50 mb-xs-30">
                                Creative Project
                            </h2>
                            
                            <div>
                                <a href="#" class="btn btn-mod btn-border-w btn-medium btn-round">View Project</a>
                            </div>
                            

                            
                            <h2 class="hs-line-14 font-alt mb-50 mb-xs-30">
                                Creative Project
                            </h2>
                            
                            <div>
                                <a href="#" class="btn btn-mod btn-border-w btn-medium btn-round">View Project</a>
                            </div>
                            
                        </div>
                    </div> 
                    
                </div>
            </section>
            <!-- End Section -->
            
            <!-- Section -->
            <section class="page-section fixed-height-small pt-0 pb-0 bg-dark-alfa-30" data-background="images/full-width-images/section-bg-6.jpg">
                <div class="js-height-parent container relative">
                    
                    <div class="home-content">
                        <div class="home-text">

                            
                            <h2 class="hs-line-14 font-alt mb-50 mb-xs-30">
                                Another Project
                            </h2>
                            
                            <div>
                                <a href="#" class="btn btn-mod btn-border-w btn-medium btn-round">View Project</a>
                            </div>
                            
                        </div>
                    </div>
                    
                </div>
            </section>
            <!-- End Section -->
            
            <!-- Section -->
            <section class="page-section fixed-height-small pt-0 pb-0 bg-light-alfa-30" data-background="images/full-width-images/section-bg-7.jpg">
                <div class="js-height-parent container relative">
                    
                    <div class="home-content">
                        <div class="home-text">

                            
                            <h2 class="hs-line-14 font-alt mb-50 mb-xs-30">
                                Awesome Stuff
                            </h2>
                            
                            <div>
                                <a href="#" class="btn btn-mod btn-border btn-medium btn-round">View Project</a>
                            </div>
                            
                        </div>
                    </div>
                    
                </div>
            </section>
            <!-- End Section -->
            
            <!-- Section -->
            <section class="page-section fixed-height-small pt-0 pb-0 bg-dark-alfa-30" data-background="images/full-width-images/section-bg-15.jpg">
                <div class="js-height-parent container relative">
                    
                    <div class="home-content">
                        <div class="home-text">

                            
                            <h2 class="hs-line-14 font-alt mb-50 mb-xs-30">
                                Print Mockup
                            </h2>
                            
                            <div>
                                <a href="#" class="btn btn-mod btn-border-w btn-medium btn-round">View Project</a>
                            </div>
                            
                        </div>
                    </div>
                    
                </div>
            </section>
            <!-- End Section -->
            
            
            
            
            <!-- Foter -->
            <footer class="page-section bg-gray-lighter footer pb-60">
                <div class="container">
                    
                    <!-- Footer Logo -->
                    <div class="local-scroll mb-30 wow fadeInUp" data-wow-duration="1.5s">
                        <a href="#top"><img src="images/logo-footer.png" width="78" height="36" alt="" /></a>
                    </div>
                    <!-- End Footer Logo -->
                    
                    <!-- Social Links -->
                    <div class="footer-social-links mb-110 mb-xs-60">
                        <a href="#" title="Facebook" target="_blank"><i class="fa fa-facebook"></i></a>
                        <a href="#" title="Twitter" target="_blank"><i class="fa fa-twitter"></i></a>
                        <a href="#" title="Behance" target="_blank"><i class="fa fa-behance"></i></a>
                        <a href="#" title="LinkedIn+" target="_blank"><i class="fa fa-linkedin"></i></a>
                        <a href="#" title="Pinterest" target="_blank"><i class="fa fa-pinterest"></i></a>
                    </div>
                    <!-- End Social Links -->  
                    
                    <!-- Footer Text -->
                    <div class="footer-text">
                        
                        <!-- Copyright -->
                        <div class="footer-copy font-alt">
                            <a href="http://themeforest.net/user/theme-guru/portfolio" target="_blank">&copy; Rhythm 2015</a>.
                        </div>
                        <!-- End Copyright -->
                        
                        <div class="footer-made">
                            Made with love for great people.
                        </div>
                        
                    </div>
                    <!-- End Footer Text --> 
                    
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
