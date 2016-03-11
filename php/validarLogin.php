<?php
require("../inc/connect.php");
 
$email = "";
$pass1 = "";

if(!isset($_POST['email'],$_POST['pass1'])){
	echo "Faltan valores";
	return;
}

$email = base64_decode($_POST['email']);
$pass1 = base64_decode($_POST['pass1']);
	
$query_sql = " SELECT * FROM usuarios 
					WHERE (usuario_email = '$email'
					OR  usuario_username = '$email')
					AND usuario_password = '$pass1' ";
//echo $query_sql;
$resultado = mysql_query($query_sql);
if(intval(mysql_num_rows($resultado))==0){
	echo 'Sin registro';
	mysql_close($db);
	return;
}

$values = mysql_fetch_assoc($resultado);

if(intval($values['usuario_isactive'])==1){
	echo 'Inactivo';
	mysql_close($db);
	return;
}
$e4m=utf8_encode($values['usuario_email']);
$nombre=utf8_encode($values['usuario_nombre']);
$nombre.=' '.utf8_encode($values['usuario_apellido']);

$query_sql = " SELECT * FROM usuarios 
					WHERE usuario_password = '$pass1'
					AND (usuario_username = '$email'
					 OR usuario_email = '$email' )
					AND usuario_fecha_vencimiento > NOW() ";
//echo $query_sql;
$resultado = mysql_query($query_sql);
if(intval(mysql_num_rows($resultado))==0){
	echo 'Vencida';
	mysql_close($db);
	return;
}

session_start();
$_SESSION['e4m']=$e4m; //se le cambio el nombre por seguridad
$_SESSION['nombre']=$nombre; //se le cambio el nombre por seguridad
$_SESSION['secIPSight']=345;

echo "Bien";
mysql_close($db);
?>