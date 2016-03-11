<?php
require("../inc/connect.php");
$bandError = 0;
//  INICIALIZACION DE VARIABLES 
$username = "";
$email = "";
$pass1 = "";
$nombre = "";
$apellidos = "";
$empresa = "";
$calle = "";
$no_ext = "";
$no_int = " ";
$colonia = " ";
$cp = "";
$ap = "";
$pais = "";
$estado = "";
$estado_text = " ";
$ciudad = "";
$rfc = "";
$tel = "";
$fax = "";
$localidad = " ";

if(!isset($_POST['username'],$_POST['nombre'],$_POST['email'],$_POST['pass1'],$_POST['empresa'],$_POST['calle'],$_POST['no_ext'],$_POST['lada'],$_POST['telefono'],$_POST['pais'],$_POST['estado'],$_POST['ciudad'])){
	echo "Faltan valores";
	return;
}

//Variables POST
    $username = utf8_decode(trim(base64_decode($_POST['username'])));
    $email = utf8_decode(trim(base64_decode($_POST['email'])));
    $pass1 = utf8_decode(trim(base64_decode($_POST['pass1'])));
    $nombre = utf8_decode(trim(base64_decode($_POST['nombre'])));
	$apellido = utf8_decode(trim(base64_decode($_POST['apellido'])));
    $empresa = utf8_decode(trim(base64_decode($_POST['empresa'])));
    $calle = utf8_decode(trim(base64_decode($_POST['calle'])));
    $no_ext = utf8_decode(trim(base64_decode($_POST['no_ext'])));
    $no_int = utf8_decode(trim(base64_decode($_POST['no_int'])));
    $lada = trim(base64_decode($_POST['lada']));
    $tel = trim(base64_decode($_POST['telefono']));
	$fax = trim(base64_decode($_POST['fax']));
    $colonia = utf8_decode(trim(base64_decode($_POST['colonia'])));
    $localidad = utf8_decode(trim(base64_decode($_POST['localidad'])));
    $cp = trim(base64_decode($_POST['cp']));
    $ap = trim(base64_decode($_POST['ap']));
    $pais = trim(base64_decode($_POST['pais']));
    $estado = trim(base64_decode($_POST['estado']));
    $estado_text = utf8_decode(trim(base64_decode($_POST['estado_text'])));
    $ciudad = utf8_decode(trim(base64_decode($_POST['ciudad'])));
    $rfc = utf8_decode(trim(base64_decode($_POST['rfc'])));

/*$query_sql = " SELECT * FROM usuarios 
					WHERE usuario_username = '$username'";
//echo $query_sql;
$resultado = mysql_query($query_sql);
if(intval(mysql_num_rows($resultado))>0){
	echo 'Ya usuario';
	mysql_close($db);
	return;
}*/

$query_sql = " SELECT * FROM usuarios 
					WHERE usuario_email = '$email'";
//echo $query_sql;
$resultado = mysql_query($query_sql);
if(intval(mysql_num_rows($resultado))>0){
	echo 'Ya existe';
	mysql_close($db);
	return;
}

//$fecha_inscripcion = ExtraeFecha();

if ($estado == 'a') {
    $estado = 0;
}

//'$usuario_id',
$query_sql = " INSERT INTO usuarios VALUES (
					'',						'$nombre',			'$apellido',
					'$empresa',				'$calle',			'$no_ext',
					'$no_int',				'$colonia',			'$localidad',		
					'$rfc', 				'$cp',				'$ap',	
					'$ciudad',				'$estado',			'$estado_text',		
					'$pais', 				'$lada', 			'$tel',
					'$fax',
					'$email',				'$username', 		'$pass1',
					NOW(),	'',					'', 			1)";
//echo $query_sql;
$resultado = mysql_query($query_sql);
if ($resultado === false) { //EXCEPCION
    mysql_close($db);
    return;
}
echo "Bien";
mysql_close($db);
?>