<?php
//include ("inc/validar.php");
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
                            <h1 class="hs-line-11 font-alt mb-20 mb-xs-0">Bienvenido al Directorio ANTAD 2016</h1>
                        </div>
                        
  
                    </div>
                    
                </div>
            </section>
            <!-- End Head Section --> 
                                              
            
            <!-- Section Asociación -->
            <section class="page-section" id="asociacion">
                <div class="relative container">
                    
                    <div class="section-text">
							<h1 class="uppercase">Los Formatos de Tiendas</h1>
                     <p align="justify">
Para analizar objetivamente la estructura de cada una de las Cadenas Asociadas, ANTAD presenta los formatos de tiendas que maneja el Comercio Detallista en México, además de los servicios que brinda este sector.


                    </div>
                      
                    <!-- Row -->
                    <div class="row">
                        
                        <!-- Col -->
                        
                        <div class="col-sm-10 col-sm-offset-1">
                            
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs tpl-tabs animate">
                                <li class="active">
                                    <a href="#Autoservicios" data-toggle="tab"><strong>Autoservicios</strong></a>
                                </li>
                                <li>
                                    <a href="#Departamentales" data-toggle="tab"><strong>Departamentales</strong></a>
                                </li>
                                <li>
                                    <a href="#Especializadas" data-toggle="tab"><strong>Especializadas</strong></a>
                                </li>                               
                            </ul>
							
                            <!-- Tab panes -->
                            <div class="tab-content tpl-tabs-cont section-text">
                                <div class="tab-pane fade in active" id="Autoservicios">
          <h2>Tiendas de Autoservicio</h2>

            <ul>
              <li>Sistema de ventas al consumidor que exhibe productos y artículos en forma abierta, clasificándolos por categorías y tipos, principalmente abarrotes, perecederos, ropa y mercancías generales.</li>
               <li>Ofrecen la mayor atención con la menor intervención del personal y un área para el pago de los clientes, con sistemas Punto de Venta a la salida.</li>
            </ul>
            
                       <!-- Col -->
                        
                        <div class="col-sm-12 mb-xs-40">
                            
                            <!-- Accordion -->
                            <dl class="accordion">
                                <dt>
                                    <a href="">Megamercado</a>
                                </dt>
                                <dd>

                  <strong>Superficie:</strong> superior a los 10 mil metros cuadrados de piso de venta aproximadamente.<br /><br />
                  <strong>Productos que maneja:</strong> toda la línea de mercancías.<br /><br />
                 <strong>Particularidad:</strong> Ofrece una gran variedad de servicios adicionales, como servicios bancarios, óptica y reparadora de calzado entre otros.

                                </dd>
                                
                                
                                <dt>
                                    <a href="">Hipermercado</a>
                                </dt>
                                <dd>

                  <p><strong>Superficie:</strong> oscila entre 4,501 y 10 mil metros cuadrados de piso de venta aproximadamente.</p>
                  <p><strong>Productos que maneja:</strong> casi toda la línea de mercancía.</p>
                  <p><strong>Particularidad:</strong> Ofrece servicios adicionales al consumidor como puede ser farmacia, cajeros automáticos y servicios de comida rápida.</p>

  
                                </dd>                                
                                
                                <dt>
                                    <a href="">Supermercado</a>
                                </dt>
                                <dd>
                    <p><strong>Superficie:</strong> desde los 501 hasta 4,500 metros cuadrados de piso de venta aproximadamente.</p>
                    <p><strong>Productos que maneja:</strong> principalmente perecederos y abarrotes.</p>
                    <p><strong>Particularidad:</strong> Cuenta únicamente con algunos de los servicios que tiene el megamercado como por ejemplo las farmacias.</p>
                                </dd>                                
                                
                                
                                <dt>
                                    <a href="">Bodega</a>
                                </dt>
                                <dd>
                  <p><strong>Superficie:</strong> mayor a los 2,500 metros cuadrados de piso de venta.</p>
                  <p><strong>Productos que maneja:</strong> la mayor parte de las líneas de productos con un sistema de descuento en medio mayoreo.</p>
                  <p><strong>Particularidad:</strong> Tiene poca decoración en las tiendas, y no ofrece a sus clientes ningún tipo de servicio que signifique atención directa.</p>
                                </dd>                                
                                
                                
                                <dt>
                                    <a href="">Clubes de Membresía</a>
                                </dt>
                                <dd>
                  <p>Están enfocados al mayoreo y medio mayoreo dirigidos a ciertos sectores a través de membresía.<br>
                    Manejan grandes volúmenes de compra y bajos márgenes de comercialización. Presentan los productos en envases grandes y/o múltiples. La tienda no cuenta con decoración.</p>
                  <p><strong>Superficie:</strong> mayor a los 4,500 metros cuadrados de piso de venta.</p>
                  <p><strong>Productos que maneja:</strong> abarrotes, perecederos, ropa y mercancías generales.</p>
                                </dd>                                
                                
                                
                                <dt>
                                    <a href="">Tiendas de Descuento</a>
                                </dt>
                                <dd>
                  <strong>Superficie:</strong> mayor a 150 y 500 metros cuadrados de piso de venta.<br /><br />
                  <strong>Productos que maneja:</strong> Cuentan con una limitada selección de productos y un nivel de precios por debajo del resto de los otros formatos de Autoservicio.<br />
                    Ofrecen reducido servicio al consumidor y una gran presencia de las marcas propias.<br /><br />
                 <strong>Particularidad:</strong> Se reducen los gastos generales controlando al máximo los costos relacionados con la decoración, el mobiliario, la energía eléctrica, publicidad dentro de la tienda, el almacenamiento y manipulación de mercancía.

                                </dd>                                
                                
                                
                                
                                                                
                                
                                
                                                                
                                
                                
                                                                
                                
                                
                                
                            </dl>    
                                
                                
                                
                                
                                
                                
                                                            

                            <!-- End Accordion -->
                            
                        </div>
                        
                        <!-- End Col -->  
                                    
            
            
                                </div>
                                <div class="tab-pane fade" id="Departamentales">
          <h3>Tiendas Departamentales</h3>


               <p align="justify">Sistema directo de venta al consumidor. Exhibe productos que clasifica por áreas o departamentos, principalmente ropa, varios, enseres mayores y menores. Ofrecen atención personalizada a clientes, cuenta por los menos con un Punto de Venta por departamento o área.</p>

								</div>
                                <div class="tab-pane fade" id="Especializadas">
          <h3>Tiendas Especializadas</h3>
          
                        <!-- Col -->
                        
                        <div class="col-sm-12 mb-xs-40">
                            
                            <!-- Accordion -->
                            <dl class="accordion">
                                <dt>
                                    <a href="">Farmacias</a>
                                </dt>
                                <dd>
                <p align="justify">Cuenta con  mostrador de servicio personalizado para productos farmacéuticos que requieren prescripción médica, además de un área de exhibición de productos y artículos en forma abierta. Regularmente funciona en horarios amplios. Cuenta en promedio con 2 puntos de venta para pago.</p>
                                </dd>
                                
                                
                                <dt>
                                    <a href="">Tiendas de Conveniencia</a>
                                </dt>
                                <dd>
                  <ul>

                    <p><strong>Superficie:</strong> menor a los 500 metros cuadrados de piso de venta.<br />
                    <strong>Productos que maneja:</strong> alimentos y bebidas, el surtido y diversidad de la mercancía es limitada.<br />
                    <strong>Particularidad:</strong> Unidades comerciales al detalle dedicadas a la venta de satisfactores inmediatos las 24 horas.
				</ul>
  
                                </dd>                                
                                
                                <dt>
                                    <a href="">Formatos Especializados</a>
                                </dt>
                                <dd>
                      <p>En este formato también se agrupa:                     
                      <ul>
                        <li>Electrónica</li>
                        <li>Ferretera</li>
                        <li>Jugueterías</li>
                        <li>Joyerías</li>
                        <li>Papelerías</li>
                        <li>Ropa, Zapatos y Accesorios</li>
                        <li>Otros</li>
                      </ul>
                      </p>
                      <p align="justify"><strong>Definición Piso de Venta:</strong> Superficie en la que tiene lugar el acceso al público, la exhibición de la mercancía y las actividades de promoción, publicidad, ventas y cobro.<br>
                        No considera la superficie destinada a privados, oficinas y bodegas, área de corte de carne, locales comerciales que den al pasillo de cajas, área de recibo o cualquier otra área con la cual no tenga contacto con el consumidor.</p>
                                         
                      
                                </dd>                                
                                
                                
                                
                                
                                
                                
                            </dl>    
                                
                                
                                
                                
                                
                                
                                                            

                            <!-- End Accordion -->
                            
                        </div>
                        
                        <!-- End Col -->  
                        



 
 
								</div>





                            </div>
                            
                        </div>
                        
                        <!-- End Col -->                         
                        
                    </div>
                    <!-- End Row -->
                                                                                                             
                    
                </div>
            </section>
            <!-- End Section -->
            
            <!-- Footer --> 
 					<?php include "footer-dirantad.php"; ?>
            <!-- End Footer -->     
        
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
