<?php
include ("inc/validar.php");
include ("inc/connect.php");
include ("inc/queryAll.php");

$where = "";
$tieneAsociado = false;
$tieneZona = false;
$txtreport = "Reporte de las cadenas ";
if(isset($_GET['zona'],$_GET['tipo'],$_GET['asociado'])){
	$zona = $_GET['zona'];
	//$estado = $_GET['estado'];
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
				$txtreport .="asociadas a ANTAD";
				break;
	}
	
	if(intval($asociado)!=0){
		$where .= " AND asociados_zonas.asociado_id = $asociado ";
		$txtreport .= " del asociado ".obtenerNombreAsociado($asociado);
		$tieneAsociado = true;

	}
	if(intval($zona)!=0){
		$where .= " AND zonas.zona_id = $zona ";
		$txtreport .= "<br />en la zona ".obtenerNombreZona($zona);
		$tieneZona = true;
	}
}

$query = " SELECT asociados.*, asociados_zonas.asociado_zona_numtiendas NUMTIENDAS, asociados_zonas.asociado_zona_m2pisoventas M2PISO, asociados_zonas.asociado_id, zonas.zona_nombre 
			FROM asociados_zonas, asociados, zonas
			WHERE asociados.asociado_id = asociados_zonas.asociado_id 
			AND zonas.zona_id = asociados_zonas.zona_id
			$where
			ORDER BY asociados.asociado_razonsocial ";
$result = mysql_query($query);

$query_count = "SELECT COUNT(*) NUMERO, SUM(S.NUMTIENDAS) NUMTIENDASF, SUM(S.M2PISO) M2PISOF 
				FROM  (
						SELECT 1, SUM(asociados_zonas.asociado_zona_numtiendas) NUMTIENDAS, SUM(asociados_zonas.asociado_zona_m2pisoventas) M2PISO, asociados_zonas.asociado_id, zonas.zona_nombre 
						FROM asociados_zonas, asociados, zonas
						WHERE asociados.asociado_id = asociados_zonas.asociado_id 
						AND zonas.zona_id = asociados_zonas.zona_id
						$where
						GROUP BY asociados.asociado_id ) as S";
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
            <tr>
              <td>Número total de cadenas</td>
              <td><?php echo $total_cadenas; ?></td>
            </tr>
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
		  if(!$tieneZona){
		  ?>
            <th data-class="expand" data-sort-initial="true"> <span title="table sorted by this column on load">Zona</span> </th>
          <?php } 
		  if(!$tieneAsociado){
		  ?>
            <th data-class="expand" data-sort-initial="true"> <span title="table sorted by this column on load">Nombre Comercial</span> </th>
          <?php } ?>
            <th data-hide="phone"> Número de Tiendas </th>
            <th data-hide="phone"> Superficie de Ventas </th>
            <th data-sort-ignore="true"> Logotipo </th>
            
          </tr>
        </thead>
        <tbody>
<?php 		  
		while ($asociados = mysql_fetch_assoc($result)) {
			$asociado_id = utf8_encode($asociados['asociado_id']);
			$nombrecomercial = utf8_encode($asociados['asociado_nombrecomercial']);
			$razonsocial = utf8_encode($asociados['asociado_razonsocial']);
			$tipotienda = utf8_encode($asociados['asociado_tipo_id']);
			$numtiendas =  utf8_encode($asociados['NUMTIENDAS']);
			$zona_nombre = utf8_encode($asociados['zona_nombre']);
			
			$query_logo = "SELECT ASOCIADO_PATH_IMG FROM asociados_logo WHERE asociado_id = $asociado_id";
			$result_logo = mysql_query($query_logo);
			if ($values = mysql_fetch_assoc($result_logo))
				$logo = trim(utf8_encode($values['ASOCIADO_PATH_IMG']));
			else
				$logo = "SinLogo";
?>
          <tr>
          <?php 
		  if(!$tieneZona){
		  ?>
            <td><?php echo $zona_nombre; ?></td>
          <?php } 
		  if(!$tieneAsociado){
		  ?>
            <td><?php echo $nombrecomercial; ?></td>
          <?php } ?>
            
            <td><?php echo $numtiendas; ?></td>
            <td><?php echo number_format($asociados['M2PISO'], 2)." m&sup2;"; ?></td>
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