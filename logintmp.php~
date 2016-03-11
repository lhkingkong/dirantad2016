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
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="en">
<!--<![endif]-->
<head>

<!-- Basic Page Needs
  ================================================== -->
<meta charset="utf-8">
<title>Directorio ANTAD 2015</title>
<meta name="description" content="">
<meta name="author" content="Admin" >

<!-- Mobile Specific Metas
  ================================================== -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">


        <!-- CSS -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/style-responsive.css">
        <link rel="stylesheet" href="css/animate.min.css">
        <link rel="stylesheet" href="css/vertical-rhythm.min.css">
        <link rel="stylesheet" href="css/owl.carousel.css">
        <link rel="stylesheet" href="css/magnific-popup.css">        
    </head>

<?php include "inc/jsAll.php"; ?>
<!-- bxSlider Javascript file -->
<script src="js/jquery.bxslider.min.js"></script>
<!-- bxSlider CSS file -->
<link href="css/jquery.bxslider.css" rel="stylesheet" />
<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

<!-- Favicons
	================================================== -->
<link rel="shortcut icon" href="images/faviconAntad.ico">
<link rel="apple-touch-icon" href="images/faviconAntad57.png">
<link rel="apple-touch-icon" sizes="72x72" href="images/faviconAntad72.png">
<link rel="apple-touch-icon" sizes="114x114" href="images/faviconAntad114.png">

<!-- optionally include helper plugins -->
<script type="text/javascript" language="javascript" src="js/helper-plugins/jquery.mousewheel.min.js"></script>
<script type="text/javascript" language="javascript" src="js/helper-plugins/jquery.touchSwipe.min.js"></script>
<script type="text/javascript" language="javascript" src="js/helper-plugins/jquery.transit.min.js"></script>
<script type="text/javascript" language="javascript" src="js/helper-plugins/jquery.ba-throttle-debounce.min.js"></script>
<script type="text/javascript">
$intentosMax=20;
function login(){
	if(!validar())
		return false;
	$intentos = $intentosMax;
	loginAJAX();
}
function validar(){
	if ($.trim($('#email').val()) == "") {
                    alerta("Atención","Favor de agregar un Usuario o Correo Electrónico.");
                    $('#email').focus();
                    return false;
                }
				/*if(!validarEmail($('#email').val())){
					alerta("Atención","Favor de agregar un Correo Electrónico válido.");
                    $('#email').focus();
                    return false;
				}*/
				if($.trim($('#password').val()) == ""){
					alerta("Atención","Favor de agregar la Contraseña.");
                    $('#password').focus();
                    return false;
				}
				return true;
}

function loginAJAX() {
                jQuery.ajax({
                    type: "POST",
                    url: "php/validarLogin.php",
                    /*dataType:"html",*/
                    data: "email=" + Base64.encode($("#email").val().toString()) + "&" +
                            "pass1=" + Base64.encode($("#password").val().toString()),
                    success: function(data) {
						$registrandose = false;
                        if (data.indexOf('Sin registro') != -1) {
                            alerta("Atención","No existe el Usuario / Correo Electrónico o su Contraseña es incorrecta.");
							return false;
                        }
						if (data.indexOf('Inactivo') != -1) {
                            alerta("Atención","Su cuenta aun no ha sido activada.");
							return false;
                        }
						if (data.indexOf('Vencida') != -1) {
                            alerta("Atención","Su cuenta se encuentra vencida o no ha sido activada con el periodo de vencimiento correspondiente.");
							return false;
                        }
                        if (data == 'Bien') {
                            location.href="inicio.php";
                        } else {
                            alerta("Atención","Lo sentimos ha ocurrido un error.");
                        }
                    }, //fin success
                    error: function(xhr, ajaxOptions, thrownError) {
                        if ($intentos < 1) {
                            alerta("Atención","Lo sentimos, su conexi&oacute;n con el servidor se ha perdido, favor de contactarse con nosotros. ");
                        } else {
                            $intentos--;
                            loginAJAX();
                        }
                    }
                });
            }
</script>
</head>
<body class="loginForm">
<?php include "inc/phpAll.php"; ?>

<!-- Login Section -->
        <!-- Page Wrap -->
        <div class="page" id="top">

            <!-- Navigation panel -->
            <nav class="main-nav js-stick">
                <div class="full-wrapper relative clearfix">
                    <!-- Logo ( * your text or image into link tag *) -->
                    <div class="nav-logo-wrap local-scroll">
                        <a href="mp-index.html" class="logo">
                            <img src="images/logoANTAD.png" alt="" />
                        </a>
                    </div>
                    <div class="mobile-nav">
                        <i class="fa fa-bars"></i>
                    </div>
                    
                </div>
            </nav>
            <!-- End Navigation panel -->
                        
            <!-- Home Section -->
            <section class="home-section bg-gray bg-light-alfa-50 parallax-2" data-background="images/portada.jpg" id="home">
                <div class="js-height-full">
                    
                    <!-- Hero Content -->
                    <div class="home-content container">
                
                        <div class="home-text">

                      <div>
                            <img src="images/logo-dirantad-w300.png" alt="" />
                        </div>     
                        
                        		  <form action="login.php" method="post">


                    <!-- Tab panes -->
                    <div class="tab-content tpl-minimal-tabs-cont section-text">
                        
                        <div class="tab-pane fade in active" id="mini-one">
                        
                        		  
                  <div class="row">
                        
                        <div class="col-md-12">
                            <h1 class="hs-line-11 font-alt mb-20 mb-xs-0">Entrar al Directorio ANTAD 2016</h1>
                                                        <h2 class="hs-line-8 font-alt mb-20 mb-xs-0">Favor de ingresar su usuario y contraseña. En caso de no tener, tiene la opción de contratar el directorio</h2>
                            <div class="hs-line-11 font-alt">
                                
                            </div>
                        </div>
                        


                    </div>	
                            <!-- Login Form -->                            
                            <div class="row">
                                <div class="col-md-8 col-md-offset-2">                    	
                                       <div class="clearfix">
                                            
                                            <!-- Username -->
                                            <div class="form-group">
			<div>Usuario o Correo Electr&oacute;nico *
          		<input type="text" name="email" id="email" size="0" onKeyPress="return nextTab(event, this);"/>
        	</div
                                            </div>
                                            
                                            <!-- Password -->
                                            <div class="form-group">
        	<div>Contraseña *
          		<input type="password" name="password" id="password"  placeholder="Contraseña" size="20" onKeyPress="if(isEnter(event)) { login(); return false; }"/>
                                            </div>
                                                               </div>                                          
                                                                                   </div>                                               
                                        </div>                      
		                     </div>   
		                                        </div>   

        	<div class="clear"></div>
			<?php crearBoton('Entrar','login()','','');?>
        	<?php crearBoton('¡Regístrate ahora!','','registro.php','');?>
        	<div clas="forgottenpasswd" style="margin:5px;"><a href="olvidarPassword.php" class="link">¿Olvidaste la Contraseña?</a></div>
		  </form>
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


<div class="fullscreen">

    <div class="headerImages">
    <?php include "header2.php"; ?>
	  <div class="sixteen columns"> 
		<div class="one-second column" id="divForm">
		  <form action="login.php" method="post">
		  	<p><span class="text_higlight">ACCESO RESTRINGUIDO</span></p>
			<div>Usuario o Correo Electr&oacute;nico *
          		<input type="text" name="email" id="email" size="20" onKeyPress="return nextTab(event, this);"/>
        	</div>
        	<div class="clear"></div>
        	<div>Contraseña *
          		<input type="password" name="password" id="password" size="20" onKeyPress="if(isEnter(event)) { login(); return false; }"/>
        	</div>
        	<div class="clear"></div>
			<?php crearBoton('Entrar','login()','','');?>
        	<?php crearBoton('¡Regístrate ahora!','','registro.php','');?>
        	<div clas="forgottenpasswd" style="margin:5px;"><a href="olvidarPassword.php" class="link">¿Olvidaste la Contraseña?</a></div>
		  </form>
      	</div>
      	<div class="one-second column mensajeIndex">

	</div>

</div>
</body>
</html>