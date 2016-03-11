<?php
/* Conecta a la Base de Datos MySQL */

$host="localhost";
$login="dirantad2016";
$password="bto191269";
$dbname="dirantad2016";

static $db;
if (!$db=mysql_connect($host, $login, $password))
    {
        mysql_error();
        exit();
    }

//Seleccionando la base a conectarse
mysql_select_db("$dbname") or die("error la base de datos $dbname no existe o no tiene permisos");

?>
