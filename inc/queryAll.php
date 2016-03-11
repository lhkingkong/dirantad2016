<?php
function obtenerNombreEstado($estado){
	$query = " SELECT estado 
				FROM estados
				WHERE estado_id = $estado ";
	$result = mysql_query($query);
	if($result){
		$values = mysql_fetch_assoc($result);
		return utf8_encode($values['estado']);
	}
}

function obtenerNombreZona($zona){
	$query = " SELECT zona_nombre 
				FROM zonas
				WHERE zona_id = $zona ";
	$result = mysql_query($query);
	if($result){
		$values = mysql_fetch_assoc($result);
		return utf8_encode($values['zona_nombre']);
	}
}

function obtenerNombreAsociado($asociado){
	$query = " SELECT asociado_nombrecomercial 
				FROM asociados
				WHERE asociado_id = $asociado ";
	$result = mysql_query($query);
	if($result){
		$values = mysql_fetch_assoc($result);
		return utf8_encode($values['asociado_nombrecomercial']);
	}
}

function obtenerNombreSubtipo($subtipo){
	$query = " SELECT tienda_subtipo 
				FROM tiendas_subtipos
				WHERE tienda_subtipo_id = $subtipo ";
	$result = mysql_query($query);
	if($result){
		$values = mysql_fetch_assoc($result);
		return utf8_encode($values['tienda_subtipo']);
	}
}
?>