<?php
	$result = array();
	
	include 'conn.php';
	
	$rs = mysql_query("SELECT * FROM asociados WHERE asociado_id in (SELECT asociado_id FROM asociados_estados) ORDER BY asociado_nombrecomercial");
	
	$asociados = array();
	while($row = mysql_fetch_object($rs)){
		array_push($asociados, $row);
	}
	
	echo json_encode($asociados);
?>