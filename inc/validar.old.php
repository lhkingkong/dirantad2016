<?php
if(!isset($_SESSION)) session_start();
function conectar()
{
	//definici�n  de elementos de la conexi�n
	$servidor="localhost";
	$usuario="ipsight_antad";
	$password="bto191269";
	$basedatos="ipsight_antad";
	
	//Conexi�n y validaci�n al servidorde base de datos
	$enlace=mysql_connect($servidor,$usuario,$password);
	if(!$enlace)
		die('No se pudo conectar:'.mysql_error());
	//selecci�n y validaci�n de la base de datos
	$dbselect=mysql_select_db($basedatos,$enlace);
	if(!$dbselect)
	{
		die('Error, Contacte al administrador
		     del sistema para solicitar ayuda');
		return FALSE;
	}
	return $enlace;
}
?>