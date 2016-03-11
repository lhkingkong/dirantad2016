<?php
require("../inc/connect.php");
$bandError = 0;
//  INICIALIZACION DE VARIABLES 
$pass0 = "";
$pass1 = "";

if(!isset($_POST['pass0'],$_POST['pass1'])){
	echo "Faltan valores";
	return;
}

//Variables POST
    session_start();
	$email = $_SESSION['e4m'];
    $pass0 = utf8_decode(trim(base64_decode($_POST['pass0'])));
    $pass1 = utf8_decode(trim(base64_decode($_POST['pass1'])));
	
$query_sql = " SELECT * FROM usuarios 
					WHERE usuario_email = '$email'";
//echo $query_sql;
$resultado = mysql_query($query_sql);
if(intval(mysql_num_rows($resultado))!=1){
	echo 'Sin cuenta';
	mysql_close($db);
	return;
}

$values = mysql_fetch_assoc($resultado);
if($pass0!= $values['usuario_password']){
	echo 'Password incorrecto';
	mysql_close($db);
	return;
}

//'$usuario_id',
$query_sql = " UPDATE usuarios SET usuario_password = '$pass1' WHERE usuario_email = '$email' ";
//echo $query_sql;
$resultado = mysql_query($query_sql);
if ($resultado === false) { //EXCEPCION
	echo "Sin cambio";
    mysql_close($db);
    return;
}
echo "Bien";
mysql_close($db);
?>