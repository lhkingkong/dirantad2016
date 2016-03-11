<?php
    	session_start();
function conectar()
{
	//definición  de elementos de la conexión
	$servidor="localhost";
	$usuario="ipsight_antad";
	$password="bto191269";
	$basedatos="ipsight_antad";
	
	//Conexión y validación al servidorde base de datos
	$enlace=mysql_connect($servidor,$usuario,$password);
	if(!$enlace)
		die('No se pudo conectar:'.mysql_error());
	//selección y validación de la base de datos
	$dbselect=mysql_select_db($basedatos,$enlace);
	if(!$dbselect)
	{
		die('Error, Con tacte al administrador
		     del sistema para solicitar ayuda');
		return FALSE;
	}
	return $enlace;
}		 


?>