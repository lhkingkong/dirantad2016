<?php
$nombre=$_POST['nombre'];
echo "tu nombre es  " . $nombre . "  ";
$apellido=$_POST['apellido'];
echo "Tu apellido es " . $apellido . " ";
$empresa=$_POST['empresa'];
echo "La empresa es " . $empresa . "  ";
$dirrecion=$_POST['dirrecion'];
echo "La dirrecion es " . $dirrecion . "  ";
$colonia=$_POST['colonia'];
echo "La colonia es " . $colonia . "  ";
$cp=$_POST['cp'];
echo "La codigo postal es " . $cp . "  ";
$ciudad=$_POST['ciudad'];
echo "La ciudad es " . $ciudad . "  ";
$estado_id=$_POST['estado_id'];
echo "La Estados es " . $estado_id . "  ";
$telefono=$_POST['telefono'];
echo "su telefono es " . $telefono . "  ";
$email=$_POST['email'];
echo "Tu E-mail es " . $email . "  ";

$username=$_POST['username'];
$password=$_POST['password'];


//CREAR CONSULTa
$sql="INSERT INTO usuarios(nombre,apellido,empresa,dirrecion,colonia,cp,ciudad,estado_id,telefono,email,username,password) 
VALUES('$nombre','$apellido','$empresa','$dirrecion','$colonia','$cp','$ciudad','$estado_id','$telefono','$email','$username','$password');";


$conexion=mysql_connect("localhost","ipsight_antad","bto191269");
if(!$conexion)
    die("ERROR EN LA CONEXION"); //funcion que mata el proceso
if(!mysql_select_db("ipsight_antad",$conexion))
	echo "No se selecciono la base de datos correctamente";

//enviar la consulta

mysql_query($sql,$conexion);
if(mysql_errno($conexion) !=0)
echo "existe un error en la consulta".mysql_error($conexion);
else
echo "El registro ha sido insertado correctamente";

//cerrar la conexio de la base de datos
mysql_close($conexion);
 

	   ?>  
	   
	   <p><h3><a href="../login.php" accesskey="4" title="">Entra al sistema</a></li></p></h3> 