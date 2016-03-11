<?php
if(isset($_GET['zona'])){
	include_once ("../inc/connect.php");
	$zona = $_GET['zona'];
	$where = "";
	
	if($zona=='a') $zona =0;
	
	if(!is_numeric($zona)){
		echo '<option value="a">TODOS</option>';
		return;
	}
	
	if(intval($zona)!=0){
		$where .= " WHERE zona_id = $zona";
	}
	$query_sql3 = " SELECT * FROM estados
					$where
			        ORDER BY estado ";
    $resultado3 = mysql_query($query_sql3);
	if(!$resultado3){
		return false;
	}
	echo '<option value="a" selected>TODOS</option>';
	while($values = mysql_fetch_assoc($resultado3)){
		echo '<option value="'.$values['estado_id'].'">'.utf8_encode($values['estado']).'</option>';
	}
}
?>
