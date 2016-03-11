<?php
	session_start();
	include ("validar.php");

  
          echo "<br> bienvenido(a) " . $_SESSION['usuario'] ;

	  session_destroy(); 
          echo "<br> Has cerrado sesión correctamente.  <a href='login.php'>Continuar</a>";
  
  
 include("class/auth.class.php");


   ?>

