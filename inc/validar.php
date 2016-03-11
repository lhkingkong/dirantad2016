<?php
if(!isset($_SESSION)) session_start();
if(empty($_SESSION['e4m']))
	header("location:php/destruirSesion.php");
?>