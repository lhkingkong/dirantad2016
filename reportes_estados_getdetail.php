<?php

	$estado_id = $_REQUEST['estado_id'];

	include 'conn.php';

	$rs = mysql_query("SELECT * FROM asociados_estados LEFT JOIN asociados ON asociados_estados.asociado_id = asociados.asociado_id WHERE asociados_estados.estado_id='$estado_id'");
	$items = array();
	while($row = mysql_fetch_object($rs)){
		array_push($items, $row);
	}
	echo json_encode($items);


?>
