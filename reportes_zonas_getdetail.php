<?php

	$zona_id = $_REQUEST['zona_id'];

	include 'conn.php';

	$rs = mysql_query("SELECT * FROM asociados_zonas LEFT JOIN zonas ON asociados_zonas.zona_id = zonas.zona_id LEFT JOIN asociados ON asociados_zonas.asociado_id = asociados.asociado_id WHERE asociados_zonas.zona_id='$zona_id'");
	$items = array();
	while($row = mysql_fetch_object($rs)){
		array_push($items, $row);
	}
	echo json_encode($items);


?>
