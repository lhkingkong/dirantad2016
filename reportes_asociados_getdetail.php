<?php

	$asociado_id = $_REQUEST['asociado_id'];
	
	include 'conn.php';

	$rs = mysql_query("SELECT * FROM asociados_estados LEFT JOIN estados ON asociados_estados.estado_id  = estados.estado_id WHERE asociados_estados.asociado_id='$asociado_id'");
	$items = array();
	while($row = mysql_fetch_object($rs)){
		array_push($items, $row);
	}
	echo json_encode($items);


?>
