<?php
include ("inc/validar.php");
include ("inc/connect.php");
include ("inc/queryAll.php");

$where = "";
$campoExtra ="";
$tieneAsociado = false;
$tieneEstado = false;
$txtreport = "Reporte de las cadenas ";
if(isset($_GET['estado'],$_GET['tipo'],$_GET['asociado'])){
	//$zona = $_GET['zona'];
	$estado = $_GET['estado'];
	$tipo = $_GET['tipo'];
	$asociado = $_GET['asociado'];
	
	
	
	switch(intval($tipo)){
	case 1:
				$where .= " AND asociados.asociado_tipo_id = 1 ";
				$txtreport .="de Tiendas de Autoservicio asociadas a ANTAD";
				break;
	case 2:
				$where .= " AND asociados.asociado_tipo_id = 2 ";
				$txtreport .="de Tiendas Departamentales asociadas a ANTAD";
				break;
	case 3:
				$where .= " AND asociados.asociado_tipo_id = 3 ";
				$txtreport .="de Tiendas Especializadas asociadas a ANTAD";
				break;
	default:
				$txtreport .="asociadas a ANTAD por estados";
				break;
	}
	
	if(intval($asociado)!=0){
		$where .= " AND asociados_estados.asociado_id = $asociado ";
		$txtreport .= " del asociado ".obtenerNombreAsociado($asociado);
		$tieneAsociado = true;
	}
	/*if(intval($zona)!=0){
		$where .= " AND estados.zona_id = $zona ";
		$txtreport .= " en la ".obtenerNombreZona($zona);
	}*/
	if(intval($estado)!=0){
		$where .= " AND asociados_estados.estado_id = $estado ";
		$txtreport .= " en el estado de ".obtenerNombreEstado($estado);
		$tieneEstado = true;
	}else{
		$campoExtra .=", estados.estado";
	}
}

if($campoExtra!=""){
	$query = " SELECT asociados.*, asociados_estados.asociado_estado_numtiendas NUMTIENDAS, asociados_estados.asociado_estado_m2pisoventas M2PISO, asociados_estados.asociado_id  $campoExtra
			FROM asociados_estados, asociados, estados
			WHERE asociados.asociado_id = asociados_estados.asociado_id 
			AND estados.estado_id = asociados_estados.estado_id
			$where
			ORDER BY estados.estado, asociados.asociado_nombrecomercial ";
}else{
$query = " SELECT asociados.*, SUM(asociados_estados.asociado_estado_numtiendas) NUMTIENDAS, SUM(asociados_estados.asociado_estado_m2pisoventas) M2PISO, asociados_estados.asociado_id  
			FROM asociados_estados, asociados, estados
			WHERE asociados.asociado_id = asociados_estados.asociado_id 
			AND estados.estado_id = asociados_estados.estado_id
			$where
			GROUP BY asociados_estados.asociado_id
			ORDER BY asociados.asociado_nombrecomercial ";
}
$result = mysql_query($query);
//echo $query;

if($tieneAsociado){
	$query_count = "SELECT COUNT(*) NUMERO 
				FROM  (
						SELECT asociados_estados.asociado_estado_numtiendas NUMTIENDAS, 				asociados_estados.asociado_estado_m2pisoventas M2PISO, asociados_estados.asociado_id 
							FROM asociados_estados, asociados , estados
							WHERE asociados.asociado_id = asociados_estados.asociado_id 
							AND estados.estado_id = asociados_estados.estado_id
							$where 
							 ) as S";

$result_count = mysql_query ($query_count);
$values = mysql_fetch_assoc($result_count);
$total_presencia = number_format($values['NUMERO'],0);
}
//else{*/
$query_count2 = "SELECT COUNT(*) NUMERO, SUM(S.NUMTIENDAS) NUMTIENDASF, SUM(S.M2PISO) M2PISOF 
				FROM  (
						SELECT SUM(asociados_estados.asociado_estado_numtiendas) NUMTIENDAS, SUM(asociados_estados.asociado_estado_m2pisoventas) M2PISO, asociados_estados.asociado_id 
							FROM asociados_estados, asociados , estados
							WHERE asociados.asociado_id = asociados_estados.asociado_id 
							AND estados.estado_id = asociados_estados.estado_id
							$where 
							GROUP BY asociados_estados.asociado_id ) as S";
//}
//echo $query_count;
$result_count2 = mysql_query ($query_count2);
$count = mysql_fetch_assoc($result_count2);
$total_cadenas = number_format($count['NUMERO'],0);
$total_numtiendas = number_format($count['NUMTIENDASF'], 0);
$total_superficie = number_format($count['M2PISOF']);
?>
<script type="text/javascript">

    $(function() {
      $('#tabla').footable();
    });
	</script>
<!-- START CONTENT -->

<section class="contenidoA container clearfix">
  <div class="col_1_1 ">
    <div class="caja1">
      <header> <?php echo $txtreport; ?> </header>
      <section>
        <table>
          <tbody>
            <?php if($tieneAsociado){; ?>
            <tr>
              <td>Estados donde hay presencia de la cadena</td>
              <td><?php echo $total_presencia; ?></td>
            </tr>
            <?php }else{ ?>
            <tr>
              <td>Número total de cadenas</td>
              <td><?php echo $total_cadenas; ?></td>
            </tr>
            <?php } ?>
            <tr>
              <td>Número total de tiendas</td>
              <td><?php echo $total_numtiendas; ?></td>
            </tr>
            <tr>
              <td>Superficie total de Piso de Ventas</td>
              <td><?php echo $total_superficie; ?> m&sup2;</td>
            </tr>
          </tbody>
        </table>
      </section>
    </div>
  </div>
  <div class="col_1_1">
    <div style="margin:auto; overflow:auto; overflow-y: auto; height: 400px; width:97%; ">
      <table id="tabla" class="footable">
        <thead>
          <tr>
            <?php
if(!($tieneAsociado && $tieneEstado)){
if($tieneAsociado || !$tieneEstado){
?>
            <th data-class="expand" data-sort-initial="true"> <span>Estado</span> </th>
            <?php
}//fin if($tieneAsociado || !$tieneEstado)
if(!$tieneAsociado){
?>
            <th data-class="expand" data-sort-initial="true"> <span title="table sorted by this column on load">Nombre Comercial</span> </th>
            <?php
}//fin if(!$tieneAsociado)
}//fin if(!($tieneAsociado && $tieneEstado))
?>
            <?php /*?><th data-hide="all"> Razon Social </th>
            <th data-hide="all"> Nombre Comercial </th>
            <th data-hide="all"> Razon Social </th>
            <th data-hide="all"> Tipo de Tienda </th><?php */?>
            <th <?php if(!($tieneAsociado && $tieneEstado)){ ?> data-hide="phone" <?php } ?>> Número de Tiendas </th>
            <th <?php if(!($tieneAsociado && $tieneEstado)){ ?> data-hide="phone" <?php } ?>> Superficie de Ventas </th>
            <th data-sort-ignore="true"> Logotipo </th>
            <?php /*?><th data-hide="all"> Direccion </th>
            <th data-hide="all"> Telefono </th>
            <th data-hide="all"> Fax </th>
            <th data-hide="all"> Sitio Web </th>
            <th data-hide="all"> Correo Electronico </th>
            <?php */?>
          </tr>
        </thead>
        <tbody>
          <?php
		  
		  
while ($asociados = mysql_fetch_assoc($result)) {
	$nombrecomercial = utf8_encode($asociados['asociado_nombrecomercial']);
	$razonsocial = utf8_encode($asociados['asociado_razonsocial']);
	$tipotienda = utf8_encode($asociados['asociado_tipo_id']);
	$numtiendas =  utf8_encode($asociados['NUMTIENDAS']);//0;//utf8_encode($asociados[14]);
	
	$direccion = utf8_encode($asociados['asociado_calle'])."<br>".utf8_encode($asociados['asociado_colonia'])."<br>".utf8_encode($asociados['asociado_cp'])." ".utf8_encode($asociados['asociado_ciudad'])."<br>".utf8_encode($asociados['asociado_estado']) ;
	$ciudad = utf8_encode($asociados['asociado_ciudad']);
	$estado = utf8_encode($asociados['asociado_estado']);
	
	$query_logo = "SELECT ASOCIADO_PATH_IMG FROM asociados_logo WHERE asociado_id = ".utf8_encode($asociados['asociado_id']);
	$result_logo = mysql_query($query_logo);
	if ($values = mysql_fetch_assoc($result_logo))
		$logo = trim(utf8_encode($values['ASOCIADO_PATH_IMG']));
	else
		$logo = "SinLogo";
?>
          <tr>
            <?php
if(!($tieneAsociado && $tieneEstado)){
if($tieneAsociado || !$tieneEstado){
?>
            <td><?php echo $asociados['estado']; ?></td>
            <?php
}//fin if($tieneAsociado || !$tieneEstado)
if(!$tieneAsociado){
?>
            <td><?php echo $nombrecomercial; ?></td>
            <?php
}//fin if(!$tieneAsociado)
}//fin if(!($tieneAsociado && $tieneEstado))
?>
            <?php /*?><td><?php echo $razonsocial; ?></td>
            <td><?php echo $nombrecomercial; ?></td>
            <td><?php echo $razonsocial; ?></td>
            <td><?php echo $tipotienda; ?></td><?php */?>
            <td><?php echo $numtiendas; ?></td>
            <td><?php echo number_format($asociados['M2PISO'], 2)." m&sup2;"; ?></td>
            <?php /*?><td><?php echo $direccion; ?></td>
            <td><?php echo $asociados['asociado_telefono']; ?></td>
            <td><?php echo $asociados['asociado_fax']; ?></td>
            <td><?php echo $asociados['asociado_website']; ?></td>
            <td><?php echo "A especificar"; ?></td><?php */?>
            <td><img title="active" width="50" height="50" src="images/logos/50x50/<?php echo $logo; ?>.jpg" /></td>
          </tr>
          <?php
}	//fin while($asociados = mysql_fetch_row($result))
?>
        </tbody>
      </table>
    </div>
  </div>
</section>