<?php
/*

<link rel="stylesheet" href="css/base.css">
<link rel="stylesheet" href="css/skeleton.css">
*/

include ("inc/validar.php");
include ("inc/connect.php");
include ("inc/interfaz.php");

$currentA='asociados'; 
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
      <link href="css/footable-0.1.css" rel="stylesheet" type="text/css" />
      <link href="css/footable.sortable-0.1.css" rel="stylesheet" type="text/css" />
      <script src="js/footable-0.1.js" type="text/javascript"></script>
      <script src="js/footable.sortable.js" type="text/javascript"></script>
      <script src="js/footable.filter.js" type="text/javascript"></script>
<script type="text/javascript">

	$intentosMAX = 20;
	
	function refrescarConsulta(){
		$('#content').html('');
		$intentosD = $intentosMAX;
		refrescarConsultaAJAX();
	}
	
	function refrescarConsultaAJAX(){
    	//if($.browser.msie)
        	$IEcadena = "&ie=" + Math.floor((Math.random()*100)+1);
		
		$("#content").load('asociados_consulta.php?condition='+$('#tipo').val()+$IEcadena, 
        function(response, status, xhr) {
            if (status != "error") {
                $('#content').show('slow');
            }else{
                if($intentosD<1){
                    alert("Lo sentimos, su conexión con el servidor se ha perdido, favor de contactarse con nosotros. ");
                }else{
                    $intentosD--;
                    refrescarConsultaAJAX();
                }
            }
			return false;
        });
		return false;
	}
	
    $(function() {
      //$('#tabla').footable();
	  $('#tipo').val('a');
	  $('#refrescar').click();
    });
	
	function abrirExcel(){
		window.open("excel/asociados_excel.php?condition="+$('#tipo').val(), "_blank");
	}
  </script>
<style type="text/css">
.footable-row-detail-inner .tablaFoo {
	font-size: 16px;
	color: #800;
	text-align: center;
}
.url a {
	color: #03F !important;
	text-decoration: none;
}
</style>


        
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
                            <h1 class="font-alt" align="center">Asociados</h1>
                        </div>
                        
  
                    </div>
                    
                </div>
            </section>
            <!-- End Head Section --> 
                                              
            
            <!-- Section Asociación -->
            <section class="page-section" id="asociacion">
                <div class="relative container">
                    
                    <div class="section-text">

          <div>Tipo de tienda</div>
          <select id="tipo">
            <option value="a" selected>TODOS</option>
<?php
			$query = " SELECT * FROM tiendas_tipos
						ORDER BY tienda_tipo ";
			$result = mysql_query($query);
			if($result){
				while($values = mysql_fetch_assoc($result)){
					echo '<option value="'.$values['tienda_tipo_id'].'">'.$values['tienda_tipo'].'</option>';
				}
			}
?>
          </select>
        					</div>

      			<div class="clear"></div>
      				<div class="centered">
      				<?php crearBoton('Buscar','refrescarConsulta()','',"images/16x16/magnifier.png"); ?>
      				<?php crearBoton('Excel','abrirExcel()','',"images/16x16/export_excel.png"); ?>
      				</div>
    				</div>
  
  <!-- container -->
  <div id="content">&nbsp;</div>                     
                        
                    </div>
                    <!-- End Row -->
                                                                                                             
                    
                </div>
            </section>
            <!-- End Section -->

            <hr />             
                                    
            
            
            
            
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
