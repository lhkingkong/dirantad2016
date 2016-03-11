
					<?php
  session_start();
?>
<?php
          echo "<br> Cerrando sesión de " . $_SESSION['usuario'];

	  session_destroy(); 
          echo "<br> Has cerrado sesión correctamente.  <a href='login.php'>Continuar</a>";
  
   ?>

		