<?php
if(isset($_GET['tipo'])){
	include_once ("../inc/connect.php");
	$tipo = $_GET['tipo'];
	$where = "";
	
	if($tipo=='a') $tipo = 0;
	
	if(!is_numeric($tipo)){
		echo '<option value="a">TODOS</option>';
		return;
	}
	
	if(intval($tipo)!=0){
		$where .= " WHERE tienda_tipo_id = $tipo";
	}
	$query_sql = " SELECT * FROM tiendas_subtipos
					$where
			        ORDER BY tienda_subtipo ";
    $resultado3 = mysql_query($query_sql);
	//echo $query_sql;
	if(!$resultado3){
		return false;
	}
	echo '<option value="a" selected>TODOS</option>';
	while($values = mysql_fetch_assoc($resultado3)){
		echo '<option value="'.$values['tienda_subtipo_id'].'">'.utf8_encode($values['tienda_subtipo']).'</option>';
	}
}
?>
