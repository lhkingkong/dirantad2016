<?php include ("inc/validar.php");
$currentA='antad'; ?>
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
  </head>

  <body class="appear-animate">
    <?php include "inc/phpAll.php"; ?>
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
                <h1 class="font-alt" align="center">Organigrama de la Asociación ANTAD</h1>
              </div>


            </div>

          </div>
        </section>
        <!-- End Head Section -->

        <!-- Delete everything in this .container and get started on your own site! -->
        <section class="page-section">
          <div class="container relative">
            <div class="sixteen columns">
              <p>La Asociación Nacional de Tiendas de Autoservicios y Departamentales tiene como objetivo fundamental el mantener y mejorar los sistemas de distribución de sus Asociados, de acuerdo a las necesidades, deseos e intereses sociales y económicos.</p>
              <hr />
            </div>
            <!-- organigrama pequeño -->
            <div class="smallOrg">
              <ul>
                <li>CONSEJO DIRECTIVO
                  <ul>
                    <li>Presidente Ejecutivo
                      <ul>
                        <li><a href="#" onClick="alertaDiv('#div-oC'); return false;">Director General de Operaciones</a>
                          <ul>
                            <li>Dirección de Estudios Económicos</li>
                            <li><a href="#" onClick="alertaDiv('#div-oE'); return false;">Dirección de Desarrollo</a>
                              <ul>
                                <li><a href="#" onClick="alertaDiv('#div-oI'); return false;">Gerente de Capacitación</a></li>
                                <li><a href="#" onClick="alertaDiv('#div-oJ'); return false;">Gerente de Desarrollo</a></li>
                                <li><a href="#" onClick="alertaDiv('#div-oK'); return false;">Gerente de Membresía</a></li>
                                <li><a href="#" onClick="alertaDiv('#div-oL'); return false;">Jefe de Comunicación</a></li>
                              </ul>
                            </li>
                            <li><a href="#" onClick="alertaDiv('#div-oN'); return false;">Gerente de Administración de Finanzas</a></li>
                            <li><a href="#" onClick="alertaDiv('#div-oM'); return false;">Gerente de Convenciones</a></li>
                          </ul>
                        </li>
                        <li><a href="#" onClick="alertaDiv('#div-oD'); return false;">Director General de Relaciones con Gobierno</a>
                          <ul>
                            <li><a href="#" onClick="alertaDiv('#div-oG'); return false;">Dirección de Enlace Legislativo</a></li>
                            <li><a href="#" onClick="alertaDiv('#div-oH'); return false;">Dirección de Relaciones con Gobierno</a></li>
                          </ul>
                        </li>
                      </ul>
                    </li>
                  </ul>
                </li>
              </ul>
            </div>
            <!-- fin organigrama pequeño -->
            <!-- organigrama grande -->
            <div class="wrapDiv orgDiv bigOrg" style="height:450px;">
              <div class="organigrama">
                <div id="oA">CONSEJO DIRECTIVO
                  <br> 25 Cadenas Asociadas</div>
                <div id="oB"> Presidente Ejecutivo</div>
                <a href="#" onClick="alertaDiv('#div-oD'); return false;">
                  <div id="oD">Director General de Relaciones con Gobierno</div>
                </a>
                <a href="#" onClick="alertaDiv('#div-oC'); return false;">
                  <div id="oC">Director General de Operaciones</div>
                </a>
                <div class="clear"></div>
                <div id="oF">Direcci&oacute;n de Estudios Econ&oacute;micos</div>
                <a href="#" onClick="alertaDiv('#div-oE'); return false;">
                  <div id="oE">Direcci&oacute;n de Desarrollo</div>
                </a>
                <a href="#" onClick="alertaDiv('#div-oH'); return false;">
                  <div id="oH">Direcci&oacute;n de Relaciones con Gobierno</div>
                </a>
                <a href="#" onClick="alertaDiv('#div-oG'); return false;">
                  <div id="oG">Direcci&oacute;n de Enlace Legislativo</div>
                </a>
                <div class="clear"></div>
                <a href="#" onClick="alertaDiv('#div-oN'); return false;">
                  <div id="oN">Gerente de Administraci&oacute;n y Finanzas</div>
                </a>
                <a href="#" onClick="alertaDiv('#div-oM'); return false;">
                  <div id="oM">Gerente de Convenciones</div>
                </a>
                <div class="clear"></div>
                <a href="#" onClick="alertaDiv('#div-oI'); return false;">
                  <div id="oI">Gerente de Capacitaci&oacute;n</div>
                </a>
                <a href="#" onClick="alertaDiv('#div-oJ'); return false;">
                  <div id="oJ">Gerente de ANTAD.biz</div>
                </a>
                <a href="#" onClick="alertaDiv('#div-oK'); return false;">
                  <div id="oK">Gerente de Membres&iacute;a</div>
                </a>
                <a href="#" onClick="alertaDiv('#div-oL'); return false;">
                  <div id="oL">Jefe de Comunicación</div>
                </a>
                <a href="#">
                  <div id="oP">Jefe de Sistemas</div>
                </a>
                <div class="clear"></div>
              </div>
            </div>
            <!-- fin organigrama grande -->
          </div>
        </section>
    </div>

    <!-- End Document
================================================== -->
   <div class="hidden">
    <div id="div-oD">
      <div class="contenidoMensaje">
        <p><span class="text_higlight">Director General de Relaciones con Gobierno</span>
          <br>
          <br>
          <span class="title text_higlight">Lic. Eugenio Carrión Rodríguez</span>
          <br> Ext. 249
          <br> Correo Electrónico: <span class="text_higlight">ecarrion@antad.net</span> </p>
        <p>Establece la estrategia para promover, a favor de la Asociación y de los intereses legítimos de sus Asociados, la adopción de políticas y decisiones públicas y la vinculación con representantes privadas y empresariales, nacionales y del extranjero.</p>
        <div class="centered">
          <button class="btn btn-mod btn-medium btn-round" onclick="cerrarMensaje('#div-oD'); return false;"> Aceptar </button>
        </div>
        <div class="clear"></div>
      </div>
    </div>
    <div id="div-oC">
      <div class="contenidoMensaje">
        <p><span class="text_higlight">Director General de Operaciones</span>
          <br>
          <br>
          <span class="title text_higlight">Ing. Ignacio Tatto Amador</span>
          <br> Ext. 226
          <br> Correo Electrónico: <span class="text_higlight">itatto@antad.net </span> </p>
        <p>Manejo de las Relaciones Institucionales con los Asociados de ANTAD, en todos los temas relacionados con los objetivos de la Asociación: tecnología, eficiencia, información estadística, estudios, capacitación, competencia leal y honesta, etc. exceptuando temas de Relaciones con Gobierno y Cabildeo. Manejo de las Relaciones institucionales con Organismos Cúpula, Cámaras y Asociaciones de Comercio e Industria, principalmente en los temas relacionados a Eficiencia y Cadenas Colaborativas y Convenciones de ANTAD. Responsable de la coordinación de Asambleas y Juntas del Consejo de Administración.</p>
        <p>Responsable de la Planeación Estratégica de las Convenciones de ANTAD y de su supervisión operativa .
        </p>
        <div class="centered">
          <button class="btn btn-mod btn-medium btn-round" onclick="cerrarMensaje('#div-oC'); return false;"> Aceptar </button>
        </div>
        <div class="clear"></div>
      </div>
    </div>
    <div id="div-oG">
      <div class="contenidoMensaje">
        <p><span class="text_higlight">Dirección de Enlace Legislativo</span>
          <br>
          <br>
          <span class="title text_higlight">Lic. Mónica Leñero Álvarez</span>
          <br> Ext. 248
          <br> Correo Electrónico: <span class="text_higlight">mlenero@antad.net </span> </p>
        <p>Representar los intereses de nuestros Asociados, en el diseño, ejecución, monitoreo y evaluación del trabajo legislativo; así como establecer contacto con los principales actores del poder legislativo para darles a conocer a la Asociación.</p>
        <div class="centered">
          <button class="btn btn-mod btn-medium btn-round" onclick="cerrarMensaje('#div-oG'); return false;"> Aceptar </button>
        </div>
        <div class="clear"></div>
      </div>
    </div>
    <div id="div-oE">
      <div class="contenidoMensaje">
        <p><span class="text_higlight">Dirección de Desarrollo</span>
          <br>
          <br>
          <span class="title text_higlight">Lic. Rogelio Rodríguez Morales </span>
          <br> Ext. 225
          <br> Correo Electrónico: <span class="text_higlight">rrodriguez@antad.net</span> </p>
        <p>Analizar los avances tecnológicos y mejores prácticas que hagan más eficiente la cadena de abasto, promoviendo su difusión e implantación entre lo Asociados y con sus Proveedores, en beneficio del Consumidor. Coadyuvar al desarrollo del capital humano de los Asociados a través de la detección de necesidades y llevar a cabo programas de capacitación por diferentes medios. Establecer una comunicación efectiva con todos los Asociados. Fomentar el intercambio de información a través de estudios que conformen un parámetro de referencia para evaluación de resultados y promuevan una mejor toma de decisiones.</p>
        <div class="centered">
          <button class="btn btn-mod btn-medium btn-round" onclick="cerrarMensaje('#div-oE'); return false;"> Aceptar </button>
        </div>
        <div class="clear"></div>
      </div>
    </div>
    <div id="div-oH">
      <div class="contenidoMensaje">
        <p><span class="text_higlight">Dirección de Relaciones con Gobierno</span>
          <br>
          <br>
          <span class="title text_higlight">Lic. Manuel Cardona Zapata</span>
          <br> Ext. 234
          <br> Correo Electrónico: <span class="text_higlight">mcardona@antad.net</span> </p>
        <p>Establecer relaciones con órganos y entidades de Gobierno, para estrechar relaciones y dar a conocer a la Asociación, para cabildear y gestionar asuntos presentados directamente por los Asociados y los atendidos en los Comités de la Asociación. Así mismo elaborar reformas legales y participar en Comités y Consejos de Organismos Cúpula y Poderes del Gobierno, tendientes a revisar, diseñar y simplificar las regulaciones, normas y leyes relacionadas con el Comercio Detallista. Proporcionar un servicio de información y seguimiento puntual de leyes, normas y temas que resultan de interés para nuestros Asociados. Dar seguimiento al Programa de Redondeo.</p>
        <div class="centered">
          <button class="btn btn-mod btn-medium btn-round" onclick="cerrarMensaje('#div-oH'); return false;"> Aceptar </button>
        </div>
        <div class="clear"></div>
      </div>
    </div>
    <div id="div-oN">
      <div class="contenidoMensaje">
        <p><span class="text_higlight">Gerente de Administración y Finanzas</span>
          <br>
          <br>
          <span class="title text_higlight">C.P. Jesús Daniel Martínez Castaño</span>
          <br> Ext. 229
          <br> Correo Electrónico: <span class="text_higlight">jdmartinez@antad.net</span> </p>
        <p>Administración y vigilancia de los recursos financieros y materiales de la Asociación. Elaboración y control del presupuesto anual. Información financiera para Asambleas y Consejo. Vigilar y supervisar las obligaciones fiscales. Control y optimización de la cobranza.</p>
        <div class="centered">
          <button class="btn btn-mod btn-medium btn-round" onclick="cerrarMensaje('#div-oN'); return false;"> Aceptar </button>
        </div>
        <div class="clear"></div>
      </div>
    </div>
    <div id="div-oM">
      <div class="contenidoMensaje">
        <p><span class="text_higlight">Gerente de Convenciones</span>
          <br>
          <br>
          <span class="title text_higlight">Lic. Manuel Álvarez Corona</span>
          <br> Ext. 237
          <br> Correo Electrónico: <span class="text_higlight">malvarez@antad.net</span> </p>
        <p>Coordinar los esfuerzos de los participantes de los eventos con la planeación e integración del staff de ANTAD, de las cadenas comerciales y los expositores, generando sinergias que permitan la concordancia entre ellos. Con actividades anticipadas, durante y posteriores a los eventos. Establecer los presupuestos y vigilar su correcta aplicación.</p>
        <p>Promover la vinculación comercial entre los Asociados y sus proveedores actuales y potenciales, a través de la comercialización de espacios de exposición en los eventos de Mercancías Generales y de la Convención Nacional del Comercio Detallista.</p>
        <div class="centered">
          <button class="btn btn-mod btn-medium btn-round" onclick="cerrarMensaje('#div-oM'); return false;"> Aceptar </button>
        </div>
        <div class="clear"></div>
      </div>
    </div>
    <div id="div-oI">
      <div class="contenidoMensaje">
        <p><span class="text_higlight">Gerente de Capacitación</span>
          <br>
          <br>
          <span class="title text_higlight">Lic. Cecilia Cáceres Fox</span>
          <br> Ext. 240
          <br> Correo Electrónico: <span class="text_higlight">ccaceres@antad.net</span> </p>
        <p>Diseñar y desarrollar Programas de Capacitación para satisfacer necesidades específicas de los Asociados. Organizar Conferencias, Seminarios, Diplomados y Simposios especiales para las diferentes áreas de las Cadenas Comerciales y sus contrapartes de la industria proveedora. Promover la participación y la interrelación de los Asociados en las diferentes actividades relacionadas con Recursos Humanos. Impulsar el desarrollo de nuevos proyectos: Grupo de Intercambio, UNICORP, Bolsa de Trabajo, Encuesta de Sueldos, Indicadores de R.H., Normas de Competencia Laboral, etc., para potenciar la fuerza laboral de nuestros Asociados.</p>
        <div class="centered">
          <button class="btn btn-mod btn-medium btn-round" onclick="cerrarMensaje('#div-oI'); return false;"> Aceptar </button>
        </div>
        <div class="clear"></div>
      </div>
    </div>
    <div id="div-oJ">
      <div class="contenidoMensaje">
        <p><span class="text_higlight">Gerente de ANTAD.biz</span>
          <br>
          <br>
          <span class="title text_higlight">Gerardo Sotomayor Reza</span>
          <br> Ext. 292
          <br> Correo Electrónico: <span class="text_higlight">gsotomayor@antad.org.mx</span></p>
        <p><strong>Desarrollo y fortalecimiento de la Plataforma ANTAD.biz</strong> Red Social Empresarial conectada a una base de datos Comercial desarrollada por ANTAD; así como fomentar su utilización por las áreas Comerciales de las Cadenas Asociadas a la ANTAD.</p>
        <p><strong>Coordinación de Comités ANTAD: Logística y Sistemas </strong> Realizar investigaciones y estudios que ayuden a la toma de decisiones para eficientar los procesos de distribución y tecnologías de la información para nuestros Asociados. Facilitar los medios electrónicos a los miembros de los Comités para mejorar su comunicación y participación.</p>
        <div class="centered">
          <button class="btn btn-mod btn-medium btn-round" onclick="cerrarMensaje('#div-oJ'); return false;"> Aceptar </button>
        </div>
        <div class="clear"></div>
      </div>
    </div>
    <div id="div-oK">
      <div class="contenidoMensaje">
        <p><span class="text_higlight">Gerente de Membresía</span>
          <br>
          <br>
          <span class="title text_higlight">Lic. Cecilia León Velasco</span>
          <br> Ext. 239
          <br> Correo Electrónico: <span class="text_higlight">cleon@antad.net</span> </p>
        <p>Convergir las necesidades de los Asociados y la evaluación de los servicios ofrecidos para lograr la permanencia, potenciar la participación e incremento de membresías. Fuente de información de establecimientos comerciales nacionales y de Latinoamérica con bases de datos fidedignas y oportunas.</p>
        <div class="centered">
          <button class="btn btn-mod btn-medium btn-round" onclick="cerrarMensaje('#div-oK'); return false;"> Aceptar </button>
        </div>
        <div class="clear"></div>
      </div>
    </div>
    <div id="div-oL">
      <div class="contenidoMensaje">
        <p><span class="text_higlight">Jefe de Comunicación</span>
          <br>
          <br>
          <span class="title text_higlight">Lic. Angélica Medel Moreno</span>
          <br> Ext. 242
          <br> Correo Electrónico: <span class="text_higlight">amedel@antad.net</span> </p>
        <p>Proyectar hacia el exterior el uso adecuado de la Imagen Institucional de ANTAD y de sus Asociados. Establecer contacto con los medios de comunicación relacionados con la Cadena de Distribución y Abasto. Informar a los Asociados de las innovaciones que se presentan en el Comercio Detallista, así como dar a conocer la realización del portafolio de productos y servicios de ANTAD. Revista Al Detalle y página internet www.antad.net .</p>
        <div class="centered">
          <button class="btn btn-mod btn-medium btn-round" onclick="cerrarMensaje('#div-oL'); return false;"> Aceptar </button>
        </div>
        <div class="clear"></div>
      </div>
    </div>
    </div>
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