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
        <meta name="author" content="Admin" >
        <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
        
        <!-- Favicons -->
        <link rel="shortcut icon" href="images/faviconAntad.png">
        <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
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
        <link rel="stylesheet" href="css/btouleau.css">

        <link rel="stylesheet" href="css/jquery.bxslider.css">
                
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
            <section class="page-section">
                <div class="container relative">
                    
                    <!-- Row -->
                    <div class="row">
                        
                        <!-- Col -->                       
                        <div class="col-sm-6 mb-40">
                            
                            <div class="text">
                                <center><h5 class="uppercase">Antecedentes</h5></enter>
                                	<br />ANTAD Inició sus actividades en 1983 agrupando a las principales cadenas detallistas del país.
                            </div>
                            
                        </div>                       
                        <!-- End Col -->
                        
                        <!-- Col -->                        
                        <div class="col-sm-6 mb-40">
                            
                            <div class="text">
                                <center><h5 class="uppercase">Hoy</h5></center>
											 <p style="text-align: justify;"><strong><?php echo $total_cadenas; ?></strong> cadenas de las cuales <strong><?php echo $total_autoserv; ?></strong> son de Autoservicio, <strong><?php echo $total_depart; ?>
											 </strong> Departamentales y <strong><?php echo $total_especial; ?></strong> Especializadas, que representan a <strong><?php echo $total_numtiendas; ?></strong> establecimientos con más de <strong>
          <?php echo $total_superficie; ?></strong> de metros cuadrados de piso de venta.</p>

                            </div>
                            
                        </div>
                        <!-- End Col -->
                        
                     </div>
                    <!-- End Row -->
              
  
                    <div class="section-text">
							<h1 class="uppercase"><center>Asociados ANTAD</center></h1>
         
                    <!-- Row -->
                    <div class="row">


<div id="slider-wrapper">
 <ul class="bxslider">
<?php
		$query_img = "SELECT asociados_logo.asociado_id,asociados_logo.asociado_path_img,asociados.asociado_website 
						FROM asociados,asociados_logo
						WHERE asociados.asociado_id = asociados_logo.asociado_id 
						ORDER BY asociados.asociado_id ";
		$result_img = mysql_query ($query_img);
		if ($result_img) {
			if (mysql_num_rows($result_img) > 0){
				while($values = mysql_fetch_assoc($result_img)){
					echo '<li><a href="'.$values['asociado_website'].'" target="_blank" title="image'.$values['asociado_id']
.'"><img src="images/logos/100x100/'.trim($values['asociado_path_img']).'.jpg"></a></li>';
				}
			}
		}
?>
 </ul>
</div>

                        </div>                       
                        <!-- End Col --> 


							<h1 class="uppercase"><center>Socios Estrategicos</center></h1>
         
                    <!-- Row -->
                    <div class="row">



<div id="slider-wrapper">
 <ul class="bxslider">
<?php
		$query_img = "SELECT socio_website, socio_id,socio_path_img FROM socios_estrategicos ORDER BY socio_id ";
		$result_img = mysql_query ($query_img);
		if ($result_img) {
			if (mysql_num_rows($result_img) > 0){
				while($values = mysql_fetch_assoc($result_img)){
					echo '<li><a href="'.$values['socio_website'].'" title="image'.$values['socio_id'].'"><img src="images/s
ociosE/100x100/'.trim($values['socio_path_img']).'.jpg"></a></li>';
				}
			}
		}
?>

 </ul>
</div>


                    </div>
                    </div>


                                                                                                                 
                    
                </div>
            </section>
            <!-- End Section --> 
 
 					<?php include "flexisel.php"; ?>                               
				<hr />                                                  
            
            <!-- Section Asociación -->
            <section class="page-section" id="asociacion">
                <div class="relative container">
                    
                    <div class="section-text">
							<h1 class="uppercase">La Asociación ANTAD</h1>
                     <p align="justify">

							La Asociación Nacional de Tiendas de Autoservicios y Departamentales tiene como objetivo fundamental el mantener y mejorar los sistemas de distribución de sus Asociados, de acuerdo a las necesidades, deseos e intereses sociales y económicos.
							ANTAD se dedica a difundir y defender los principios de la libre empresa y la competencia leal y abierta.

							En relación con estos principios, las funciones organizativas se desarollan en las siguientes áreas: Investigación, Educación, Relaciones Gubernamentales y Comunicación.

							Dentro de estos aspectos nos esforzamos por proporcionar a nuestro Asociados los siguientes servicios:						
                     
							<ul>
    							<li style="text-align: justify;">Fomentar la unión entre los Asociados y promover la cooperación en el intercambio de información de nuevos conocimientos, de experiencias y de prácticas comerciales.</li>
    							<li style="text-align: justify;">Difundir los beneficios que el comercio establecido presta a la sociedad haciendo ver que somos fuente generadora de empleos, recaudadores importantes de impuestos y generadores de empresas socialmente responsables, logrando así la proyección de una imagen real y positiva.</li>
    							<li style="text-align: justify;">Efectuar estudios estadísticos como resultado de la información que proporcionan los Asociados y que sirven de base para el análisis y predicción de tendencias de venta o de cualquiera otra área que se decida investigar.</li>
    							<li style="text-align: justify;">Organizar cursos, conferencias, simposios y seminarios para el mejoramiento y capacitación de los Asociados, de sus empleados y en general, para toda persona interesada en la ciencia y cultura.</li>
    							<li style="text-align: justify;">Proporcionar información oportuna de leyes, acontecimiento o disposiciones vigentes que afectan a los Asociados.</li>
    							<li style="text-align: justify;">Estudiar, mejorar y defender los intereses legítimos de los Asociados, representando a estos ante las autoridades, organismos y terceros, particulares o públicos.</li>
    							<li style="text-align: justify;">Promover la relación y la acción con industriales, proveedores, Cámaras y Asociaciones de toda índole.</li>
    							<li style="text-align: justify;">Editar publicaciones especializadas como apoyo para la administración técnica de tiendas, así como de un boletín diario informativo, con noticias sobre tendencias de mercado y artículos técnicos.</li>
    							<li style="text-align: justify;">Realizar visitas a tiendas de socios de ANTAD para promover el intercambio de libre información.</li>
    							<li style="text-align: justify;">Lograr el intercambio de información y material con Asociaciones similares, nacionales o extranjeras.</li>
                     </ul>	    						
                     </p>

                    </div>
                      
                    <!-- Row -->
                    <div class="row">
                        
                        <!-- Col -->                       
                        <div class="col-sm-10 col-sm-offset-1">
                            
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs tpl-tabs animate">
                                <li class="active">
                                    <a href="#vision" data-toggle="tab"><strong><span class="text_higlight">Visión</span></strong></a>
                                </li>
                                <li>
                                    <a href="#mision" data-toggle="tab"><strong><span class="text_higlight">Misión</span></strong></a>
                                </li>
                                <li>
                                    <a href="#objetivos" data-toggle="tab"><strong><span class="text_higlight">Objectivos</span></strong></a>
                                </li>
                                <li>
                                    <a href="#pilares" data-toggle="tab"><strong><span class="text_higlight">Pilares</span></strong></a>
                                </li>                                
                            </ul>
							
                            <!-- Tab panes -->
                            <div class="tab-content tpl-tabs-cont section-text">
                                <div class="tab-pane fade in active" id="vision">
												<p align="justify">Ser un organismo modelo, reconocido por su liderazgo y vanguardismo, ofreciendo con excelencia servicios de calidad con base en la participación de sus Asociados y al profesionalismo de su equipo de trabajo: capaz de desarrollar y realizar proyectos y programas que promuevan la competencia leal, el comercio formal y la productividad, colaborando en la formación y desarrollo del personal involucrado en el comercio detallista.</p>
                                </div>
                                <div class="tab-pane fade" id="mision">
												<p align="justify">La Asociación Nacional de Tiendas de Autoservicio y Departamentales es una organización de servicio que representa los intereses legítimos de sus Asociados, promoviendo el desarollo del comercio detallista y sus proveedores en una economía de mercado con responsabilidad social.
										  </div>
                                <div class="tab-pane fade" id="objetivos">
		  									<ul> 
												<li>Promover la libre competencia leal y honesta.</li>
												<li>Capacitar al personal de sus Asociados para su desarrollo.</li>
												<li>Fomentar el intercambio de información y experiencias para mejorar la operación comercial.</li>
												<li>Hacer eficiente la interrelación de los integrantes de la cadena distributiva.</li>
												<li>Promover los aspectos relacionados con responsabilidad social de sus afiliados.</li>
												<li>Promover la cultura de respeto al medio ambiente, uso eficiente de energía y fomento de energía renovable.</li>
		 									 </ul>
										</div>
								 		<div class="tab-pane fade" id="pilares">
		 									 <ul> 
												<li><titulos>Compromiso:</titulos> Actuar proactivamente, con responsabilidad, honestidad y lealtad.</li>
												<li><titulos>Confidencialidad:</titulos> Manejo responsable de la información.</li>
												<li><titulos>Unidad e Individualidad:</titulos> Defender los intereses legítimos de los Asociados y respeto a su individualidad.</li>	
												<li><titulos>Liderazgo:</titulos> Ser una organización de vanguardia.</li>	
												<li><titulos>Participación de los Asociados</titulos></li>
		 									 </ul>
								 	 </div>
                            </div>
                            
                        </div>                       
                        <!-- End Col -->                         
                        
                    </div>
                    <!-- End Row -->                                                                                               
                    
                </div>
            </section>
            <!-- End Section -->

            <hr />             
                                    
            <!-- Section Consejo -->
            <section class="page-section" id="consejo">
                <div class="relative container">
                    
                    <div class="section-text">
							<h1 class="uppercase">El Consejo Directivo</h1>

								El consejo directivo está constituído por los asociados fundadores, asociados estratégicos y asociados activos

                     
                                <h5 class="uppercase">CONSEJO DIRECTIVO ANTAD 2015</h5>                     
                     
         								 <ul>
         								   <li><span class="text_higlight">PRESIDENTE EJECUTIVO: </span>LIC. VICENTE YÁÑEZ SOLLOA</li>
          									 <li><span class="text_higlight">SECRETARIO: </span>SEARS OPERADORA MÉXICO, S.A. DE C.V.</li>
          									 <li><span class="text_higlight">TESORERO: </span>TIENDAS SORIANA, S.A. DE C.V.</li>
         								 </ul>
                    </div>
                    
                    <hr />  
                    <!-- Row -->
                    <div class="row">
                        
                        <!-- Col -->
                        <div class="col-sm-4 mb-40">
                            
                            <div class="text">
                                <h5 class="uppercase">Asociados Fundadores</h5>

        									<ul>
           								 <li>7-ELEVEN MÉXICO, S.A. DE C.V.</li>
         								   <li>ALMACENES ZARAGOZA, S.A. DE C.V.</li>
            								<li>CASA LEY, S.A. DE C.V.</li>
           									 <li>EL PUERTO DE LIVERPOOL, S.A.B. DE C.V.</li>
           									 <li>GRUPO COMERCIAL CONTROL, S.A. DE C.V.</li>
           										 <li>GRUPO GIGANTE, S.A. DE C.V.</li>
          									  <li>OPERADORA FUTURAMA, S.A. DE C.V.</li>
           									 <li>TIENDAS COMERCIAL MEXICANA, S.A. DE C.V.</li>
           									 <li>TIENDAS CHEDRAUI, S.A. DE C.V.</li>
           									 <li>TIENDAS SORIANA, S.A. DE C.V.</li>
         							 </ul>                   
                              
                            </div>
                            
                        </div>      
                        <!-- End Col -->
                        
                        <!-- Col -->
                        
                        <div class="col-sm-4 mb-40">
                            
                            <div class="text">
                                <h5 class="uppercase">Asociados Activos</h5>

       							   <ul>
       							     <li>ANHEUSER-BUSCH MEXICO HOLDING S. DE R.L. DE C.V.</li>
          							  <li>HEMSA, S.A. DE C.V.</li>
         							   <li>OPERADORA DE CIUDAD JUÁREZ, S.A. DE C.V.</li>
          								  <li>OPERADORA MERCO, S.A. DE C.V.</li>
         							   <li>OPERADORA OMX, S.A. DE C.V.</li>
          							  <li>SEARS OPERADORA MÉXICO, S.A. DE C.V.</li>
           								 <li>SUPER SAN FRANCISCO DE ASIS, S.A. DE C.V.</li>
           								 <li>SUPERMERCADOS INTERNACIONALES HEB, S.A. DE C.V.</li>
          								  <li>TIENDAS GARCÉS, S.A. DE C.V.</li>
          								  <li>VICKY FORM, S.A. DE C.V.</li>          								  
          								</ul>

                            </div>
                            
                        </div>                       
                        <!-- End Col -->
                        
                        <!-- Col -->                       
                        <div class="col-sm-4 mb-40">
                            
                            <div class="text">
                                <h5 class="uppercase">Asociados Estratégicos</h5>

        								  <ul>
         							   <li>CADENA COMERCIAL OXXO, S.A. DE C.V.</li>
         							   <li>COPPEL, S.A. DE C.V.</li>
         							   <li>EL PALACIO DE HIERRO, S.A. DE C.V.</li>
         							   <li>HOME DEPOT MÉXICO, S DE R.L. DE C.V.</li>
         								   <li>WAL-MART DE MÉXICO, S.A.B. DE C.V.</li>
       								   </ul>

                            </div>
                            
                        </div>               
                        <!-- End Col -->
                        
                     </div>
                    <!-- End Row -->               
                    
                </div>
            </section>
            <!-- End Section -->            

            <hr />             
            
            <!-- Section Comités -->
            <section class="page-section" id="comites">
                <div class="container relative">

                  
                    <div class="section-text">
 							<h1 class="uppercase">Comités de Trabajo ANTAD 2015</h1>                                           
							</div>
                    <!-- Row -->
                    <div class="row">

                        <!-- Col -->
                        <div class="col-sm-12 mb-xs-40">
                            
                            <!-- Toggle -->
                            <dl class="toggle">
                                <dt>
                                    <a href="">ANÁLISIS Y ESTUDIOS FINANCIEROS</a>
                                </dt>
                                <dd>
          <p><span class="text_higlight">Presidente: </span>TIENDAS COMERCIAL MEXICANA, S.A. DE C.V. <br>
            <span class="text_higlight">Contacto ANTAD:</span> Lic. Rogelio Rodríguez Morales</p>
          <p><span class="text_higlight">Misión: </span> Proporcionar y difundir información financiera básica para la toma de decisiones de nuestros Asociados.</p>                                

          <h5>TEMÁTICA ESTUDIOS FINANCIEROS</h5>
          <ul>
            <li>ESTUDIOS:
              <ul>
                <li>Crecimiento en Ventas</li>
                <li>Benchmarking</li>
              </ul>
            </li>
            <li>PROYECTOS:
              <ul>
                <li>Remesas nacionales</li>
                <li>Cajeros automáticos</li>
                <li>Seguros</li>
              </ul>
            </li>
          </ul>
                  
                                </dd>
                                <dt>
                                    <a href="">COMERCIAL</a>
                                </dt>
                                <dd>
          <p><span class="text_higlight">Consejero Delegado: </span> TIENDAS COMERCIAL MEXICANA, S.A. DE C.V.<br>
          <span class="text_higlight">Contacto ANTAD:</span> Lic. Manuel Cardona Zapata y Lic. Mónica Leñero Álvarez</p>
          <p><span class="text_higlight">Misión: </span> Propiciar la modernización del mercado y su comercialización en beneficio de los Consumidores a través de la libre competencia.</p>
          <h5>AGENDA CON EL PODER EJECUTIVO</h5>
          <ul>
            <li>Promover ante la  administración pública federal y estatal la competitividad y mejora regulatoria</li>
            <li>Prácticas comerciales</li>
            <li>El Buen Fin</li>
            <li>Participación en la Comisión Nacional de Normalización y grupos de trabajo de elaboración de normas oficiales 	mexicanas de información comercial, sanitarias entre otras</li>
            <li>Etiquetado, publicidad y comercialización de productos con alto contenido calórico</li>
            <li>Comercialización de productos milagro, tabaco y alcohol</li>
          </ul>
          <h5>AGENDA LEGISLATIVA</h5>
          <ul>
            <li>Prácticas comerciales</li>
            <li>Etiquetado, publicidad y comercialización de productos (sobrepeso/obesidad; alimentos “chatarra”;publicidad engañosa, semáforo de alimentos, comercialización y etiquetado de medicamentos, información nutricional en comida rápida, etiquetado de bebidas alcohólicas y venta a mayores de 21 años)</li>
            <li>Tabaco y bebidas alcohólicas</li>
            <li>Organismos Genéticamente Modificados</li>
          </ul>
                                </dd>
                                <dt>
                                    <a href="">COMERCIO EXTERIOR Y FRONTERA</a>
                                </dt>
                                <dd>
          <p><span class="text_higlight">Consejero Delegado: </span> OPERADORA DE CIUDAD JUÁREZ, S.A. DE C.V.<br>
          <span class="text_higlight">Contacto ANTAD:</span> Lic. Manuel Cardona Zapata y Lic. Mónica Leñero Álvarez</p>
          <p><span class="text_higlight">Misión: </span> Promover mejora regulatoria en las operaciones de Comercio Exterior de nuestros Asociados y fortalecer la competitividad de los Asociados de ANTAD que tienen establecimientos en las franjas.</p>
          <h5>AGENDA CON EL PODER EJECUTIVO</h5>
          <ul>
            <li>Eliminación de barreras no arancelarias</li>
            <li>Padrones de importadores</li>
            <li>Reglas de Comercio Exterior</li>
            <li>Precios de referencia</li>
            <li>Medidas de salvaguarda</li>
            <li>Mejora regulatoria</li>
            <li>Sistema simplificado en frontera</li>
            <li>Permisos y avisos sanitarios de importación</li>
            <li>Mejora regulatoria en la importación de productos</li>
            <li>Cumplimiento de normas/ productos de importación</li>
            <li>Decreto de frontera</li>
          </ul>
          <h5>AGENDA LEGISLATIVA</h5>
          <ul>
            <li>Ley de Competitividad, medio ambiente y aranceles verdes
            <ul>
            <li>Normas Mexicanas Obligatorias</li>
            <li>Avisos Automáticos en todas las importaciones</li>
            <li>Certificados de Origen</li>
            </ul></li>
            <li>Importación de productos</li>
            <li>Reformas Ley Aduanera</li>
            <li>Reformas Ley de Comercio Exterior</li>
            <li>Padrón Único de Marcas de Importación</li>
            <li>Registro Internacional de marcas</li>
          </ul>

                                </dd>
                                <dt>
                                    <a href="">COMUNICACIÓN E IMAGEN</a>
                                </dt>
                                <dd>
          <span class="text_higlight">Consejero Delegado: </span> OFFICE DEPOT, S.A. DE C.V.<br />
            <span class="text_higlight">Contacto ANTAD:</span>   Lic. Angélica Medel Moreno</p>
          <p><span class="text_higlight">Misión: </span> Establecer los mecanismos de comunicación que permitan fortalecer la imagen de los Asociados, así como difundir los trabajos que realiza ANTAD en beneficio del consumidor.</p>
          <ul>
            <li>Campaña Formalmente, México Crece</li>
            <li>Sello Tienda Asociada</li>
            <li>Apoyos a las Campañas del Consejo de la Comunicación</li>
            <li>Simposio de Comunicación</li>
            <li>Difusión de Expo ANTAD</li>
            <li>Desarrollo del Logotipo de EXPO ANTAD</li>
          </ul>
                                </dd>
                                <dt>
                                    <a href="">FISCAL</a>
                                </dt>
                                <dd>
<p><span class="text_higlight">Consejero Delegado: </span> TIENDAS COMERCIAL MEXICANA, S.A. DE C.V.<br />
           <span class="text_higlight">Contacto ANTAD:</span> Lic. Manuel Cardona Zapata</p>
          <span class="text_higlight"> Misión: </span> Analizar y difundir las leyes que la S.H.C.P. dispone y emite en relación con la aplicación de los impuestos y otras contribuciones fiscales que afectan las funciones administrativas y operativas de la Asociación.
          <p><h5>TEMÁTICA FISCAL</h5>
          <ul>
            <li>Miscelánea Fiscal</li>
            <li>(IVA, IEPS, IDE, ISR, Deducciones de Mermas y Faltantes, IVA en Alimentos Procesados, Consolidación Fiscal)</li>
            <li>Factura Electrónica</li>
            <li>Tasas de Descuento</li>
            <li>Plataforma Transaccional</li>
            <li>Guía Contable</li>
            <li>Recepción de Dólares</li>
          </ul>

          <h5>AGENDA LEGISLATIVA</h5>
          <ul>
            <li>Reforma hacendaria/paquete fiscal (IVA –desglose precio/impuesto-, ISR, IETU, IDE, Consolidación fiscal)</li>
          </ul>
                                </dd>                                                                                                
                                <dt>
                                    <a href="">GRUPO DE FARMACIAS</a>
                                </dt>
                                <dd>
<p><span class="text_higlight">Consejero Delegado: </span> FARMACIA GUADALAJARA, S.A. DE C.V.<br />
          <span class="text_higlight">Contacto ANTAD:</span> Lic. Manuel Cardona Zapata</p>
          <p><span class="text_higlight">Misión:</span> Propiciar la modernización del mercado y su comercialización en beneficio de los Consumidores a través de la libre competencia.</p>

          <ul>
            <li>Fomentar el libre mercado y competencia en la distribución y proveeduría de medicamentos</li>
            <li>Guía de buenas prácticas para operar consultorios en farmacias</li>
            <li>Lineamientos para el retiro de medicamentos caducos</li>
            <li>Registros de entradas y salidas en la venta de medicamentos</li>
            <li>Licencias de funcionamiento de farmacias</li>
          </ul>
                                </dd> 
                                <dt>
                                    <a href="">LOGÍSTICA Y TECNOLOGÍA COMERCIAL</a>
                                </dt>
                                <dd>
 <p><span class="text_higlight">Consejero Delegado:</span> TIENDAS COMERCIAL MEXICANA, S.A. DE C.V.<br />
            <span class="text_higlight">Contacto ANTAD:</span> Gerardo Sotomayor Reza</p>
          <p><span class="text_higlight">Misión:</span> Establecer soluciones que generen eficiencia en los procesos de negocio a lo largo de la Cadena de Abasto, a través del conocimiento, análisis y aplicación de prácticas, estrategias y herramientas modernas. Conocer, aprender y medir, así como tener la representatividad ante autoridades y proveedores compartiendo el conocimiento de forma interna.</p>
          <h5>TEMÁTICAS</h5>
          <ul>
            <li>Fortalecimiento de la actividad logística en el sector</li>
            <li>Representatividad ante: Autoridades/ Proveedores / Prestadores de servicios</li>
            <li>Mejores Prácticas para compartir experiencias y casos de éxito</li>
            <li>Indicadores Logísticos para conocer y compartir información para el mejor desempeño del negocio</li>
           </ul>
                                </dd> 
                                <dt>
                                    <a href="">MEDIOS DE PAGO</a>
                                </dt>
                                <dd>
<p><span class="text_higlight">Presidente:</span> TIENDAS COMERCIAL MEXICANA, S.A. DE C.V.<br />
            <span class="text_higlight">Contacto ANTAD:</span>  Ing. Daniel Greaves Munguía</p>
          <ul>
            <li>Comisiones bancarias tarjetas de crédito, débito y otros medios de pago</li>
            <li>Cash Back</li>
            <li>Switch Electrónico</li>
          </ul>
                                </dd> 
                                <dt>
                                    <a href="">PREVENCIÓN DE PÉRDIDAS Y MÉRMAS</a>
                                </dt>
                                <dd>
<p><span class="text_higlight">Consejero Delegado:</span> WAL-MART DE MÉXICO, S. DE R.L. DE C.V.<br />
           <span class="text_higlight"> Vicepresidente:</span> CORPORACIÓN CONTROL, S.A. DE C.V.<br />
            <span class="text_higlight">Contacto ANTAD:</span> Lic. Manuel Cardona Zapata</p>
          <p><span class="text_higlight">Misión:</span> Hacer frente al tema de inseguridad en nuestro país, creando una base de información geográfica de incidencias para establecer un sistema de denuncia y seguimiento de las mismas ante autoridades, federales y locales.</p>
          <h5>AGENDA CON EL PODER EJECUTIVO</h5>        
          <ul>
            <li>Índices delictivos</li>
            <li>Colaboración con CNS, PF, SEGOB, DGPCivil, SE, SSPDF, SSC y PGJ Edo Mex.</li>
            <li>Atención de desastres naturales y movilizaciones sociales</li>
            <li>Participación en la Sistema Nacional de Atención de Desastres</li>
          </ul>

          <h5>AGENDA LEGISLATIVA</h5> 
          En sinergia y colaboración con CCE:      
          <ul>
            <li>Código Penal Único</li>
            <li>Código de Procedimientos Penales Único</li>
            <li>Seguridad Nacional</li>
            <li>Mando único</li>
            <li>Extinción de dominio</li>
          </ul>
          <h5>TEMÁTICA</h5> 
          <ul>
            <li>Censo Nacional de Mermas y Prevención de Pérdidas</li>
            <li>Simposio de Prevención de Pérdidas y Mermas</li>
            <li>20, 21 y 22 de Octubre</li>
          </ul>

                                </dd> 
                                <dt>
                                    <a href="">RECURSOS HUMANOS</a>
                                </dt>
                                <dd>
<p><span class="text_higlight">Consejero Delegado:</span> TIENDAS CHEDRAUI, S.A. DE C.V.<br />
            <span class="text_higlight">Contacto ANTAD:</span>  Lic. Cecilia Cáceres Fox</p>
          <h5>MISIÓN:</h5> 
          <ul>
            <li>Competencias Laborales- Entidad de Certificación y Evaluación</li>
            <li>Simposio de Recursos Humanos</li>
            <li>Subcomités: Reclutamiento y Selección, Sueldos y Compensaciones, Relaciones Laborales</li>
            <li>Encuesta de Sueldos y Compensaciones 2015</li>
            <li>Índices de Rotación de Personal Mensual y Trimestral</li>
            <li>Capacitación: conferencias y seminarios especializados</li>
            <li>Alianzas con instituciones de capacitación y universidades</li>
            <li>Manuales Autodidactas</li>
            <li>Convenio de Protección a Menores Empacadores en el D.F.</li>
            <li>Secretaría del Trabajo y Previsión Social</li>
            <li>Prevención de riesgos laborales</li>
            <li>Escuela de Ventas – SEP – ANTAD – International Youth Foundation</li>
            <li>Bolsa de Trabajo en línea www.antad.net</li>
          </ul>

                                </dd>                                                                                                                                 
                                <dt>
                                    <a href="">RELACIONES GUBERNAMENTALES</a>
                                </dt>
                                <dd>
<span class="text_higlight">Consejero Delegado:</span> EL PUERTO DE LIVERPOOL, S.A.B. DE C.V.<br/>
            <span class="text_higlight">Contacto ANTAD:</span> Lic. Manuel Cardona Zapata y Lic. Mónica Leñero Álvarez</p>
          <span class="text_higlight">Misión:</span> Mantener e incrementar relaciones con autoridades Municipales, Estatales y Federales mostrándoles la importancia de ANTAD y sus Asociados en la actividad económica del país.

          <h5>AGENDA CON EL EJECUTIVO</h5>
          <ul>
            <li>Prácticas comerciales</li>
            <li>Mejora regulatoria</li>
            <li>Profeco</li>
            <li>Tiendas de gobierno</li>
            <li>Lavado de Dinero</li>
            <li>Comercio ilegal</li>
            <li>Bolsas de plástico</li>
            <li>Menores y adultos empacadores</li>
            <li>Ayuda alimentaria</li>
            <li>Inspecciones STPS</li>
            <li>Norma 29</li>
            <li>Horario venta de alcohol</li>
          </ul>
          <h5>AGENDA LEGISLATIVA FEDERAL</h5>
          <ul>
            <li>Prácticas comerciales</li>
            <li>Competencia económica</li>
            <li>Protección al consumidor</li>
            <li>Lavado de dinero</li>
            <li>Consulta indígena</li>
            <li>Amparo</li>
            <li>Autotransporte Federal</li>
            <li>Ley  Federal del Trabajo</li>
            <li>Código de Comercio</li>
            <li>Acciones Colectivas</li>
            <li>Reforma política</li>
            <li>Responsabilidad ambiental</li>
            <li>Residuos sólidos y de manejo especial</li>
            <li>Servicios financieros</li>
            <li>Datos Personales</li>
            <li>Código  Penal (responsabilidad penal de personas morales, miscelánea penal lavado de dinero)</li>
          </ul>
          <h5>AGENDA  LEGISLATIVA</h5>
          Distrito Federal
          <ul>
            <li>Bebidas alcohólicas</li>
            <li>Ley de movilidad</li>
            <li>Norma 29</li>
            <li>Residuos</li>
            <li>Establecimientos Mercantiles</li>
            <li>Mercados Públicos</li>
            <li>Estacionamientos</li>
            <li>Código Penal (robo)</li>
            <li>Acciones colectivas</li>
          </ul>
                                </dd> 
                                <dt>
                                    <a href="">RESPONSABILIDAD SOCIAL</a>
                                </dt>
                                <dd>
<p><span class="text_higlight">Consejero Delegado:</span> TIENDAS CHEDRAUI, S.A. DE C.V.<br />
            <span class="text_higlight">Contacto ANTAD:</span> Lic. Manuel Cardona Zapata</p>
          <p><span class="text_higlight">Misión:</span> Integrar y dar a conocer las acciones de Responsabilidad Social que realizan los Asociados a la ANTAD, y compartir información y experiencias para desarrollar programas en beneficio de la comunidad Mexicana.</p>
          <ul>
            <li>Campaña de colecta CINEPOLIS/VER BIEN objetivo operación de cataratas y entrega de lentes a niños de escuelas públicas.</li>
            <li>Apoyo en desastres naturales</li>
            <li>Banco de Alimentos</li>
            <li>Catalogo Responsabilidad Social ANTAD</li>
          </ul>
                                </dd> 
                                <dt>
                                    <a href="">EFICIENCIA ENERGÉTICA</a>
                                </dt>
                                <dd>
<span class="text_higlight">Consejero Delegado:</span> TIENDAS COMERCIAL MEXICANA, S.A. DE C.V.<br />
            <span class="text_higlight">Contacto ANTAD:</span> Lic. Rogelio Rodríguez Morales</p>
          <p><span class="text_higlight">Misión:</span> Contribuir con la estrategia de desarrollo sustentable de las cadenas comerciales asociadas, mediante el intercambio de experiencias y mejores prácticas en iniciativas de uso y aprovechamiento de energías renovables y sistemas de eficiencia energética.</p>
          <p><h5>OBJETIVOS</h5>
          <ul>
            <li>Generar información estratégica e indicadores energéticos del sector</li>
            <li>Mantener presencia y canales de interlocución con autoridades</li>
            <li>Apoyar procesos de formación, desarrollo de capacidades y certificación de competencias laborales</li>
            <li>Promover eventos, foros, tendencias e información de interés</li>
            <li>Compartir casos de éxito y mejores prácticas</li>
            <li>Otorgar reconocimientos avalados por instancias nacionales e internacionales</li>
          </ul>
                                </dd>                                 
                                <dt>
                                    <a href="">SISTEMAS</a>
                                </dt>
                                <dd>
<span class="text_higlight">Consejero Delegado:</span> TIENDAS COMERCIAL MEXICANA, S.A. DE C.V.<br />
            <span class="text_higlight">Contacto ANTAD:</span> Gerardo Sotomayor Reza</p>
          <p><span class="text_higlight">Misión:</span> Intercambiar mejores prácticas y experiencias en temas de Tecnologías de Información para lograr una mayor eficiencia en la operación de la cadena de suministro.</p>
         <p>
          <h5>TEMÁTICAS</h5>
          <ul>
            <li>PCI Certificación Seguridad en la Comunicación Electrónica</li>
            <li>Vinculación con organismos especializados</li>
            <li>Mejores Prácticas para compartir experiencias y casos de éxito</li>
            <li>Foros de tecnología apoyados por proveedores</li>
            <li>Indicadores de TI para conocer y compartir información para el mejor desempeño del negocio</li>
          </ul>
                                </dd>                                                                 
                                                                                                                        
                            </dl>
                            <!-- End Toggle -->
                            
                        </div>                   
                        <!-- End Col -->                                           
                        
                    </div>
                    <!-- End Row -->
                    
                </div>
            </section>
            <!-- End Section -->

            <hr />                                                  

            <!-- Section Relaciones con organizaciones -->
            <section class="page-section" id="relaciones">
                <div class="relative container">
                    
                    <div class="section-text">
							<h1 class="uppercase">Relaciones con Organizaciones</h1>
                     <p align="justify">
ANTAD colabora en forma constante con Organismos para el logro de objetivos comunes. Estos foros tienen como objetivo principal proporcionar canales apropiados para que industriales y comerciantes intercambien opiniones y conocimientos con el propósito de cristalizar negocios que permitan brindar nuevas oportunidades para el comercio.

                    </div>
                      <hr />                                                                     
                    <!-- Row -->
                    <div class="row">
                        
                        <!-- Col -->                        
                        <div class="col-sm-12" >
                            
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs tpl-tabs animate">
                                <li class="active">
                                    <a href="#cupula" data-toggle="tab"><strong><span class="text_higlight">Organismos Cúpula</span></strong></a>
                                </li>
                                <li>
                                    <a href="#internacionales" data-toggle="tab"><strong><span class="text_higlight">Organismos Internacionales</span></strong></a>
                                </li>
                            </ul>
							
                            <!-- Tab panes -->
                            <div class="tab-content tpl-tabs-cont section-text">
                                <div class="tab-pane fade in active" id="cupula">
       									ANTAD colabora en forma constante con Organismos cúpula como CANACO, CCE, COPARMEX y CONCAMIN entre otros, para el logro de objetivos comunes.
        									<ul>
											<li><a href="http://www.cce.org" target="_blank">Consejo Coordinador Empresarial (CCE)</a></li>		
											<li><a href="http://www.concanaco.com.mx/" target="_blank">CONCANACO SERVYTUR México (CONCANACO)</a></li>
											<li><a href="http://www.camaradecomerciodemexico.com.mx/" target="_blank">Cámara Nacional de Comercio de la Ciudad de México (CANACO)</a></li>
											<li><a href="http://www.amis.org.mx/" target="_blank">Asociación Mexicana de Instituciones de Seguros (AMIS)</a></li>
											<li><a href="http://www.abm.org.mx/" target="_blank">Asociación de Bancos de México (ABM)</a></li>			
											<li><a href="http://www.canacintra.org.mx/" target="_blank">Cámara Nacional de la Industria de Transformación (CANACINTRA)</a></li>
											<li><a href="http://www.amib.com.mx/" target="_blank">Asociación Mexicana de Intermediarios Bursátiles (AMIB)</a></li>
											<li><a href="http://www.comce.org.mx/" target="_blank">Consejo Empresarial Méxicano de Comercio Exterior (COMCE)</a></li>		  
											<li><a href="http://www.coparmex.org" target="_blank">Confederación Patronal de la República Mexicana (COPARMEX)</a></li>
											<li><a href="http://www.concamin.org" target="_blank">Confederación de Cámaras Industriales (CONCAMIN)</a></li>
											<li><a href="http://www.cna.org.mx/" target="_blank">Consejo Nacional Agropecuario (CNA)</a></li>	
											<li><a href="#" target="_blank">Consejo Mexicano de Hombres de Negocios (CMHN)</a></li>	
        									</ul>		
                                </div>
                                
                                 
                                <div class="tab-pane fade" id="internacionales"> 
       									 Por su actividad ANTAD mantien interrelación constante con organismos internacionales como son:
      									  <ul>
       									   <li><a href="http://www.pma.com" target="_blank">Produce Marketing Association (PMA)</a></li>
       									   <li><a href="http://www.alasnet.org" target="_blank">Asociación Latinoamericana de Supermercados (ALAS)</a></li>
      									    <li><a href="http://www.fmi.org" target="_blank">Food Marketing Institute (FMI)</a></li>
     										     <li><a href="http://www.firae.org" target="_blank">Forum For International Retail Association Executives (FIRAE)</a></li>
       										   <li><a href="http://www.icsc.org" target="_blank">International Council of Shopping Centers (ICSC)</a></li>
      										    <li><a href="http://www.housewares.org" target="_blank">International Housewares Association (IHA)</a></li>
    									      <li><a href="http://www.nacsonline.org" target="_blank">National Association of Convenience Stores (NACS)</a></li>
     									     <li><a href="http://www.nrf.com" target="_blank">National Retail Federation (NRF)</a>)</li>
        									  <li><a href="http://www.plma.com" target="_blank">Private Label Manufacturers Association (PLMA)</a></li>
        								  <li><a href="http://www.affi.org" target="_blank">American Frozen Food Institute (AFFI)</a></li>
       								 </ul>
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

        <script type="text/javascript" src="js/jquery.bxslider.js"></script>

<script type="text/javascript">



$(document).ready(function(){
   $('.bxslider').bxSlider({
   	
 auto: true,
 autoControls: true,

  minSlides: 3,
  maxSlides: 11,
  slideWidth: 100,
  slideMargin: 18   	
   });
});
</script>

        
    </body>
</html>