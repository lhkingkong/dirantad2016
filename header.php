<!-- START HEADER -->
<?php 
include_once ("inc/connect.php");

if($currentA!='login'){
	include_once('inc/interfaz.php');
	if(!isset($_SESSION)) session_start(); 
?>
<div class="topPage">
<div class="sessionBar">
	<div class="cerrarSesion"><span style="margin-right:3px;"><?php echo crearBoton('Cuenta','','miCuenta.php',''); ?></span><?php echo crearBoton('Cerrar Sesión','','php/destruirSesion.php',''); ?></div>
	<div class="sesion"><?php echo $_SESSION['nombre']; ?></div>
    <div class="clear"></div>
    </div>
<?php 
}//fin  if($currentA!='login') 
?>
<header class="clearfix">
  <div class="fullheader" style="width:100%;">
    <div class="header"><a href="index.php"><div class="logoANTAD"></div><img class="dirantadLogo" alt="ANTAD" class="scale-with-grid" src="images/headerLogin-2015b.png" /></a> </div>
  </div>  
</header>
<?php 
if($currentA!='login'){ 
?>
</div>
<?php 
}//fin  if($currentA!='login')
?>
<!-- END HEADER --> 