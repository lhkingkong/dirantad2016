<?php
include ("../inc/connect.php");



if(!isset($_GET['condition']))
$condition = 0;
else
$condition = $_GET['condition'];

$where = "";

switch(intval($condition)){
	case 1:
				$where = "AND asociados.asociado_tipo_id = 1 ";
				$txtreport ="Listado General de las cadenas de Tiendas de Autoservicio asociadas a ANTAD";
				break;
	case 2:
				$where = "AND asociados.asociado_tipo_id = 2 ";
				$txtreport ="Listado General de las cadenas de Tiendas Departamentales asociadas a ANTAD";
				break;
	case 3:
				$where = "AND asociados.asociado_tipo_id = 3 ";
				$txtreport ="Listado General de las cadenas de Tiendas Especializadas asociadas a ANTAD";
				break;
	default:
				$txtreport ="Listado General de las cadenas asociadas a ANTAD";
				break;
}

$tituloExcel="reportePrueba";

//header("Content-Type:   application/vnd.ms-excel; charset=utf-8");
//header("Content-type:   text/csv;");
//header("Content-Type: application/force-download");
header("Pragma: public");
//header('Content-type: application/vnd.ms-excel');
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="'.$tituloExcel.'.xls"');
     header("Pragma: no-cache");
     header("Expires: 0");
//header("Content-Type: application/force-download");

//header("Content-Transfer-Encoding: binary");

$query = " SELECT asociados.*, SUM(asociados_estados.asociado_estado_numtiendas) NUMTIENDAS, SUM(asociados_estados.asociado_estado_m2pisoventas) M2PISO, asociados_estados.asociado_id 
			FROM asociados_estados, asociados
			WHERE asociados.asociado_id = asociados_estados.asociado_id 
			$where
			GROUP BY asociados_estados.asociado_id
			ORDER BY asociados.asociado_razonsocial ";
$result = mysql_query($query);

$query_count = "SELECT COUNT(*) NUMERO, SUM(S.NUMTIENDAS) NUMTIENDASF, SUM(S.M2PISO) M2PISOF 
				FROM  (
						SELECT SUM(asociados_estados.asociado_estado_numtiendas) NUMTIENDAS, SUM(asociados_estados.asociado_estado_m2pisoventas) M2PISO, asociados_estados.asociado_id 
							FROM asociados_estados, asociados 
							WHERE asociados.asociado_id = asociados_estados.asociado_id 
							$where 
							GROUP BY asociados_estados.asociado_id ) as S";
//echo $query_count;
$result_count = mysql_query ($query_count);
$count = mysql_fetch_assoc($result_count);
$total_cadenas = number_format($count['NUMERO'],0);
$total_numtiendas = number_format($count['NUMTIENDASF'], 0);
$total_superficie = number_format($count['M2PISOF']);
?>
<meta http-equiv="content-type" content="application/xhtml+xml; charset=UTF-8" />
<table>
  <tr>
    <th colspan="5"><h1><?php echo $txtreport; ?></h1></th>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>N&uacute;mero total de cadenas</strong></td>
    <td><?php echo $total_cadenas; ?></td>
  </tr>
  <tr>
    <td><strong>N&uacute;mero total de tiendas</strong></td>
    <td><?php echo $total_numtiendas; ?></td>
  </tr>
  <tr>
    <td><strong>Superficie total de Piso de Ventas</strong></td>
    <td><?php echo $total_superficie; ?> m&sup2;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <th> Nombre Comercial </th>
    <th> Raz&oacute;n Social </th>
    <th> Tipo de Tienda </th>
    <th> N&uacute;mero de Tiendas </th>
    <th> Superficie de Ventas </th>
    <th> Direcci&oacute;n </th>
    <th> Tel&eacute;fono </th>
    <th> Fax </th>
    <th> Sitio Web </th>
    <th> Correo Electr&oacute;nico </th>
  </tr>
  <?php
while ($asociados = mysql_fetch_assoc($result)) {
	$nombrecomercial = utf8_encode($asociados['asociado_nombrecomercial']);
	$razonsocial = utf8_encode($asociados['asociado_razonsocial']);
	$tipotienda = utf8_encode($asociados['asociado_tipo_id']);
	$numtiendas =  utf8_encode($asociados['NUMTIENDAS']);//0;//utf8_encode($asociados[14]);
	
	$direccion = utf8_encode($asociados['asociado_calle']).", ".utf8_encode($asociados['asociado_colonia']).", C.P. ".utf8_encode($asociados['asociado_cp']).", ".utf8_encode($asociados['asociado_ciudad']).", ".utf8_encode($asociados['asociado_estado']) ;
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
    <td><?php echo $nombrecomercial; ?></td>
    <td><?php echo $razonsocial; ?></td>
    <td><?php echo $tipotienda; ?></td>
    <td><?php echo $numtiendas; ?></td>
    <td><?php echo number_format($asociados['M2PISO'], 2)." m&sup2;"; ?></td>
    <td><?php echo $direccion; ?></td>
    <td><?php echo $asociados['asociado_telefono']; ?></td>
    <td><?php echo $asociados['asociado_fax']; ?></td>
    <td><a href="<?php echo $asociados['asociado_website']; ?>" target="_blank"><?php echo $asociados['asociado_website']; ?></a></td>
    <td><?php echo "A especificar"; ?></td>
  </tr>
  <?php
}	//fin while($asociados = mysql_fetch_row($result))
?>
</table>
<?php
function obtenerNombreEstado($estado){
	$query = " SELECT estado 
				FROM estados
				WHERE estado_id = $estado ";
	$result = mysql_query($query);
	if($result){
		$values = mysql_fetch_assoc($result);
		return $values['estado'];
	}
}

function obtenerNombreZona($zona){
	$query = " SELECT zona_nombre 
				FROM zonas
				WHERE zona_id = $zona ";
	$result = mysql_query($query);
	if($result){
		$values = mysql_fetch_assoc($result);
		return $values['zona_nombre'];
	}
}

function obtenerNombreAsociado($asociado){
	$query = " SELECT asociado_nombrecomercial 
				FROM asociados
				WHERE asociado_id = $asociado ";
	$result = mysql_query($query);
	if($result){
		$values = mysql_fetch_assoc($result);
		return $values['asociado_nombrecomercial'];
	}
}
?>