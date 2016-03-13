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
        if(!($tieneAsociado && $tieneEstado)){
          if($tieneAsociado || !$tieneEstado){
        ?>
        <th onclick="sortTable(<?php echo $noColumna; $noColumna++; ?>)" class="btouleau-sortable-header">Estado</th>
        <?php
          }//fin if($tieneAsociado || !$tieneEstado)
          if(!$tieneAsociado){
        ?>
        <th onclick="sortTable(<?php echo $noColumna; $noColumna++; ?>)" class="btouleau-sortable-header">Nombre Comercial</th>
        <?php
          }//fin if(!$tieneAsociado)
        }//fin if(!($tieneAsociado && $tieneEstado))
        ?>
        <th onclick="sortTable(<?php echo $noColumna; $noColumna++; ?>)" class="btouleau-sortable-header <?php if(!($tieneAsociado && $tieneEstado)){ echo "hidden-xs hidden-sm"; }?>"> Número de Tiendas </th>
        <th onclick="sortTable(<?php echo $noColumna; $noColumna++; ?>)" class="btouleau-sortable-header <?php if(!($tieneAsociado && $tieneEstado)){ echo "hidden-xs hidden-sm"; }?>"> Superficie de Ventas </th>
        <th> Logotipo </th>
       
      </tr>
    </thead>
    <tbody>
          <?php
		  
      $rowId = 0;
while ($asociados = mysql_fetch_assoc($result)) {
  $rowId++;
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
      <tr onclick="$('#btouleau-row-<?php echo $rowId; ?> .btouleau-hidden').slideToggle();" class="btouleau-row-content">
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
            
        <td class="<?php if(!($tieneAsociado && $tieneEstado)){ echo "hidden-xs hidden-sm"; }?>"><?php echo $numtiendas; ?></td>
        <td class="<?php if(!($tieneAsociado && $tieneEstado)){ echo "hidden-xs hidden-sm"; }?>"><?php echo number_format($asociados['M2PISO'], 2)." m&sup2;"; ?></td>
            <td><img title="active" width="50" height="50" src="images/logos/50x50/<?php echo $logo; ?>.jpg" /></td>
          </tr>
          
      <tr id="btouleau-row-<?php echo $rowId; ?>" class="hidden-lg btouleau-reponsive-row">
        <td class="btouleau-hidden" colspan="20">
          <ul>
            <?php
  if(!($tieneAsociado && $tieneEstado)){
    if($tieneAsociado || !$tieneEstado){
            ?>
            <li>Estado
              <label>
                <?php echo $asociados['estado']; ?>
              </label>
            </li>
            <?php
    }//fin if($tieneAsociado || !$tieneEstado)
    if(!$tieneAsociado){
            ?>
            <li>Nombre Comercial
              <label>
                <?php echo $nombrecomercial; ?>
              </label>
            </li>
            <?php
    }//fin if(!$tieneAsociado)
  }//fin if(!($tieneAsociado && $tieneEstado))
            ?>
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