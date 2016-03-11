<?php
	$result = array();
	
	include 'conn.php';
	
	$rs = mysql_query("select * from estados where estado_id in (select estado_id from asociados_estados)");
	
	$estados = array();
	while($row = mysql_fetch_object($rs)){
		array_push($estados, $row);
	}
	
	echo json_encode($estados);
?>