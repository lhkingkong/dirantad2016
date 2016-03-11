<?php
include ("inc/validar.php");
include ("inc/connect.php");
include ("inc/queryAll.php");

$where = "";
$tieneTipo = false;
$tieneSubtipo = false;
$tieneZona = false;
$txtreport = "Reporte de las cadenas ";
if(isset($_GET['subtipo'],$_GET['tipo'],$_GET['zona'])){
	$tipo = $_GET['tipo'];
	$subtipo = $_GET['subtipo'];
	$zona = $_GET['zona'];
	
	if(intval($tipo)!=0){
		$tieneTipo = true;
	}
	switch(intval($tipo)){
	case 1:
				$where .= " AND tiendas_subtipos.tienda_tipo_id = 1 ";
				$txtreport .="de Tiendas de Autoservicio asociadas a ANTAD";
				break;
	case 2:
				$where .= " AND tiendas_subtipos.tienda_tipo_id = 2 ";
				$txtreport .="de Tiendas Departamentales asociadas a ANTAD";
				break;
	case 3:
				$where .= " AND tiendas_subtipos.tienda_tipo_id = 3 ";
				$txtreport .="de Tiendas Especializadas asociadas a ANTAD";
				break;
	default:
				$txtreport .="asociadas a ANTAD";
				break;
	}
	
	if(intval($subtipo)!=0){
		$where .= " AND reportes_subtiposzonas.reporte_subtipozona_subtipo_id = $subtipo ";
		$txtreport .= " del subtipo ".obtenerNombreSubtipo($subtipo);
		$tieneSubtipo = true;

	}
	if(intval($zona)!=0){
		$where .= " AND zonas.zona_id = $zona ";
		$txtreport .= " en la ".obtenerNombreZona($zona);
		$tieneZona = true;
	}
}


$query = " SELECT reportes_subtiposzonas.*, reportes_subtiposzonas.reporte_subtipozona_numtiendas NUMTIENDAS, reportes_subtiposzonas.reporte_subtipozona_m2pisoventas M2PISO, zonas.zona_nombre, tiendas_tipos.tienda_tipo 
, tiendas_subtipos.tienda_subtipo, zonas.zona_nombre
			FROM reportes_subtiposzonas, tiendas_subtipos, zonas, tiendas_tipos
			WHERE reportes_subtiposzonas.reporte_subtipozona_subtipo_id = tiendas_subtipos.tienda_subtipo_id 
			AND zonas.zona_id = reportes_subtiposzonas.reporte_subtipozona_zona_id
			AND tiendas_tipos.tienda_tipo_id = tiendas_subtipos.tienda_tipo_id
			$where
			ORDER BY tiendas_tipos.tienda_tipo ";
$result = mysql_query($query);
//echo $query;

$query_count = "SELECT COUNT(*) NUMERO, SUM(S.NUMTIENDAS) NUMTIENDASF, SUM(S.M2PISO) M2PISOF 
				FROM  (
						SELECT 1, SUM(reportes_subtiposzonas.reporte_subtipozona_numtiendas) NUMTIENDAS, SUM(reportes_subtiposzonas.reporte_subtipozona_m2pisoventas) M2PISO 
			FROM reportes_subtiposzonas, tiendas_subtipos, zonas, tiendas_tipos
			WHERE reportes_subtiposzonas.reporte_subtipozona_subtipo_id = tiendas_subtipos.tienda_subtipo_id 
			AND zonas.zona_id = reportes_subtiposzonas.reporte_subtipozona_zona_id
			AND tiendas_tipos.tienda_tipo_id = tiendas_subtipos.tienda_tipo_id
			$where
			group BY reportes_subtiposzonas.reporte_subtipozona_subtipo_id ) as S";
//echo $query_count;
$result_count = mysql_query ($query_count);
$count = mysql_fetch_assoc($result_count);
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
            <?php /*?><tr>
              <td>Número total de cadenas</td>
              <td><?php echo $total_cadenas; ?></td>
            </tr><?php */?>
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
		  if(!$tieneTipo){
		  ?>
            <th data-class="expand" data-sort-initial="true"> <span title="table sorted by this column on load">Tipo</span> </th>
          <?php } 
		  if(!$tieneSubtipo){
		  ?>
            <th data-class="expand" data-sort-initial="true"> <span title="table sorted by this column on load">Subtipo</span> </th>
          <?php } 
		  if(!$tieneZona){
		  ?>
            <th data-hide="phone"> <span>Zona</span> </th>
          <?php } ?>
            <th data-hide="phone"> Número de Tiendas </th>
            <th data-hide="phone"> Superficie de Ventas </th>
<?php /*?>            <th data-sort-ignore="true"> Logotipo </th><?php */?>
            
          </tr>
        </thead>
        <tbody>
          <?php
		  
		  
while ($asociados = mysql_fetch_assoc($result)) {
	$tienda_tipo = utf8_encode($asociados['tienda_tipo']);
	$tienda_subtipo = utf8_encode($asociados['tienda_subtipo']);
	$numtiendas =  utf8_encode($asociados['NUMTIENDAS']);
	$zona_nombre = utf8_encode($asociados['zona_nombre']);

?>
          <tr>
          <?php 
		  if(!$tieneTipo){
		  ?>
            <td><?php echo $tienda_tipo; ?></td>
          <?php } 
		  if(!$tieneSubtipo){
		  ?>
            <td><?php echo $tienda_subtipo; ?></td>
          <?php }
		  if(!$tieneZona){
		  ?>
            <td><?php echo $zona_nombre; ?></td>
          <?php } ?>
            <td><?php echo $numtiendas; ?></td>
            <td><?php echo number_format($asociados['M2PISO'], 2)." m&sup2;"; ?></td>
          </tr>
          <?php
}	//fin while($asociados = mysql_fetch_row($result))
?>
        </tbody>
      </table>
    </div>
  </div>
</section>