<?php
	$result = array();
	
	include 'conn.php';
	
	$rs = mysql_query("	SELECT * FROM asociados WHERE asociado_id in (SELECT asociado_id FROM asociados_estados)");
	
	$zonas = array();
	while($row = mysql_fetch_object($rs)){
		array_push($zonas, $row);
	}
	
	echo json_encode($zonas);
?>