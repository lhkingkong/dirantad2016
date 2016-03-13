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
  var blockSort = false;
  var ascDescSort = [];

  function sortTable(column, isNumber) {
    if (blockSort) return;
    blockSort = true;
    if (typeof isNumber === 'undefined') isNumber = false;
    var rows = $('#reportes-table tbody tr.btouleau-row-content').get();
    if (ascDescSort['col' + column]) {
      ascDescSort['col' + column] = false;
    } else {
      ascDescSort['col' + column] = true;
    }
    rows.sort(function (a, b) {
      var A, B;
      if (isNumber) {
        A = parseInt($(a).children('td').eq(column).text().replace(/,/g, ''));
        B = parseInt($(b).children('td').eq(column).text().replace(/,/g, ''));
      } else {
        A = $(a).children('td').eq(column).text().toUpperCase();
        B = $(b).children('td').eq(column).text().toUpperCase();
      }

      if (ascDescSort['col' + column]) {
        if (A > B) {
          return -1;
        }
        if (A < B) {
          return 1;
        }
      } else {
        if (A < B) {
          return -1;
        }
        if (A > B) {
          return 1;
        }
      }
      return 0;
    });

    var allRows = $('#reportes-table tbody tr').get();

    $('#reportes-table').children('tbody').empty();
    $.each(rows, function (index, row) {
      for (var i = 0, len = allRows.length; i < len; i++) {
        if (allRows[i].innerHTML === row.innerHTML) {
          $('#reportes-table').children('tbody').append(allRows[i]);
          $('#reportes-table').children('tbody').append(allRows[i + 1]);
        }
      }
    });
    blockSort = false;
  }
</script>
<!-- START CONTENT -->
<div>
  <table class="table table-striped table-bordered table-hover btouleau-table">
    <thead>
      <tr>
        <th colspan="2">
          <?php echo $txtreport; ?>
        </th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Número total de tiendas</td>
        <td>
          <?php echo $total_numtiendas; ?>
        </td>
      </tr>
      <tr>
        <td>Superficie total de Piso de Ventas</td>
        <td>
          <?php echo $total_superficie; ?> m&sup2;</td>
      </tr>
    </tbody>
  </table>
  
  <table id="reportes-table" class="table table-hover btouleau-table">
    <thead>
      <tr>
        <?php
        $noColumna = 0;
        if(!$tieneTipo){
        ?>
        <th onclick="sortTable(<?php echo $noColumna; $noColumna++; ?>)" class="btouleau-sortable-header"> Tipo </th>
        <?php 
        } 
        if(!$tieneSubtipo){
        ?>
        <th onclick="sortTable(<?php echo $noColumna; $noColumna++; ?>)" class="btouleau-sortable-header"> Subtipo </th>
        <?php } 
        if(!$tieneZona){
        ?>
        <th onclick="sortTable(<?php echo $noColumna; $noColumna++; ?>)" class="btouleau-sortable-header"> Zona </th>
        <?php } ?>
        <th onclick="sortTable(<?php echo $noColumna; $noColumna++; ?>,true)" class="btouleau-sortable-header hidden-xs hidden-sm"> N&uacute;mero de Tiendas </th>
        <th onclick="sortTable(<?php echo $noColumna; $noColumna++; ?>,true)" class="btouleau-sortable-header hidden-xs hidden-sm"> Superficie de Ventas </th>
      </tr>
    </thead>
        <tbody>
          <?php
		  
          $rowId = 0;
while ($asociados = mysql_fetch_assoc($result)) {
  $rowId++;
	$tienda_tipo = utf8_encode($asociados['tienda_tipo']);
	$tienda_subtipo = utf8_encode($asociados['tienda_subtipo']);
	$numtiendas =  utf8_encode($asociados['NUMTIENDAS']);
	$zona_nombre = utf8_encode($asociados['zona_nombre']);

?>
          <tr onclick="$('#btouleau-row-<?php echo $rowId; ?> .btouleau-hidden').slideToggle();" class="btouleau-row-content btouleau-reduce-size">
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
            <td class="btouleau-sortable-header hidden-xs hidden-sm"><?php echo $numtiendas; ?></td>
            <td class="btouleau-sortable-header hidden-xs hidden-sm"><?php echo number_format($asociados['M2PISO'], 2)." m&sup2;"; ?></td>
          </tr>
          
          <tr id="btouleau-row-<?php echo $rowId; ?>" class="hidden-lg btouleau-reponsive-row">
            <td class="btouleau-hidden" colspan="20">
              <ul>
                <?php 
  if(!$tieneTipo){
                ?>
                <li>Tipo
                  <label>
                    <?php echo $tienda_tipo; ?>
                  </label>
                </li>
                <?php } 
  if(!$tieneSubtipo){
                ?>
                <li>Subtipo
                  <label>
                    <?php echo $tienda_subtipo; ?>
                  </label>
                </li>
                <?php } 
  if(!$tieneZona){
                ?>
                <li>Zona
                  <label>
                    <?php echo $zona_nombre; ?>
                  </label>
                </li>
                <?php } ?>

                <li>N&uacute;mero de Tiendas
                  <label>
                    <?php echo $numtiendas; ?>
                  </label>
                </li>
                <li>Superficie de Ventas
                  <label>
                    <?php echo number_format($asociados['M2PISO'], 2)." m&sup2;"; ?>
                  </label>
                </li>
              </ul>
            </td>
          </tr>
          <?php
}	//fin while($asociados = mysql_fetch_row($result))
?>
        </tbody>
      </table>
    </div>