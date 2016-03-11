<?php
include ("../inc/connect.php");

date_default_timezone_set('America/Mexico_City');
require '../inc/PHPExcel/Classes/PHPExcel.php';
require_once '../inc/PHPExcel/Classes/PHPExcel/IOFactory.php';

if (PHP_SAPI == 'cli')
	die('This example should only be run from a Web Browser');


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

$tituloExcel="Asociados";

//header("Content-Transfer-Encoding: binary");

$query = " SELECT asociados.*, CASE asociados.asociado_tipo_id
       WHEN 1 THEN 'Autoservicio'
       WHEN 2 THEN 'Departamental'
	   WHEN 3 THEN 'Especializada'
       ELSE 'No tiene' 
    END AS case_tipo_tienda, SUM(asociados_estados.asociado_estado_numtiendas) NUMTIENDAS, SUM(asociados_estados.asociado_estado_m2pisoventas) M2PISO, asociados_estados.asociado_id 
			FROM asociados_estados, asociados
			WHERE asociados.asociado_id = asociados_estados.asociado_id 
			$where
			GROUP BY asociados_estados.asociado_id
			ORDER BY asociados.asociado_razonsocial ";


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

//-----------
/** Set Memory Limit 1.0 */
    ini_set("memory_limit","500M"); // set your memory limit in the case of memory problem

/** Caching to discISAM 1.0*/
//$cacheMethod = PHPExcel_CachedObjectStorageFactory:: cache_to_discISAM;
//$cacheSettings = array( 'dir'  => '/usr/local/tmp' // If you have a large file you can cache it optional
//);
//PHPExcel_Settings::setCacheStorageMethod($cacheMethod, $cacheSettings);


    if ($result = mysql_query($query) or die(mysql_error())) {
/** Create a new PHPExcel object 1.0 */
   $objPHPExcel = new PHPExcel();
   $objPHPExcel->setActiveSheetIndex(0);
   $objPHPExcel->getActiveSheet()->setTitle('Asociados');
   $objPHPExcel->getProperties()->setCreator("Maarten Balliauw")
							 ->setLastModifiedBy("Maarten Balliauw")
							 ->setTitle("PHPExcel Test Document")
							 ->setSubject("PHPExcel Test Document")
							 ->setDescription("Test document for PHPExcel, generated using PHP classes.")
							 ->setKeywords("office PHPExcel php")
							 ->setCategory("Test result file");
   }  
  
/** Loop through the result set 1.0 */
    $row = 1; //start in row 1
	$alph = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
	
	$col=0;
	$objPHPExcel->getActiveSheet()->setCellValue($alph[$col].$row,$txtreport);
	$row++;
	$col=0;
		$objPHPExcel->getActiveSheet()->setCellValue($alph[$col].$row,"Número total de cadenas");
		$col++;
		$objPHPExcel->getActiveSheet()->setCellValue($alph[$col].$row,$total_cadenas);
	$row++;
	$col=0;
	$objPHPExcel->getActiveSheet()->setCellValue($alph[$col].$row,"Número total de tiendas");
		$col++;
		$objPHPExcel->getActiveSheet()->setCellValue($alph[$col].$row,$total_numtiendas);
	$row++;
	$col=0;
	$objPHPExcel->getActiveSheet()->setCellValue($alph[$col].$row,"Superficie total de Piso de Ventas");
		$col++;
		$objPHPExcel->getActiveSheet()->setCellValue($alph[$col].$row,$total_superficie);
	$row++;
	$row++;
	
	$col=0;
		$objPHPExcel->getActiveSheet()->setCellValue($alph[$col].$row,"Nombre Comercial");
		$col++;
		$objPHPExcel->getActiveSheet()->setCellValue($alph[$col].$row,"Razón Social");
		$col++;
		$objPHPExcel->getActiveSheet()->setCellValue($alph[$col].$row,"Tipo de Tienda");
		$col++;
		$objPHPExcel->getActiveSheet()->setCellValue($alph[$col].$row,"Número de Tiendas");
		$col++;
		$objPHPExcel->getActiveSheet()->setCellValue($alph[$col].$row,"Superficie de Venta");
		$col++;
		$objPHPExcel->getActiveSheet()->setCellValue($alph[$col].$row,"Dirección");
		$col++;
		$objPHPExcel->getActiveSheet()->setCellValue($alph[$col].$row,"Teléfono");
		$col++;
		$objPHPExcel->getActiveSheet()->setCellValue($alph[$col].$row,"Fax");
		$col++;
		$objPHPExcel->getActiveSheet()->setCellValue($alph[$col].$row,"Sitio Web");
	$row++;
	
	while ($asociados = mysql_fetch_assoc($result)) {
		$nombrecomercial = utf8_encode($asociados['asociado_nombrecomercial']);
		$razonsocial = utf8_encode($asociados['asociado_razonsocial']);
		$tipotienda = utf8_encode($asociados['case_tipo_tienda']);
		$numtiendas =  utf8_encode($asociados['NUMTIENDAS']);//0;//utf8_encode($asociados[14]);
		$m2piso = number_format($asociados['M2PISO'], 2)." m²";
	
		$direccion = utf8_encode($asociados['asociado_calle']).", ".utf8_encode($asociados['asociado_colonia']).", C.P. ".utf8_encode($asociados['asociado_cp']).", ".utf8_encode($asociados['asociado_ciudad']).", ".utf8_encode($asociados['asociado_estado']) ;
		
		$col=0;
		$objPHPExcel->getActiveSheet()->setCellValue($alph[$col].$row,$nombrecomercial);
		$col++;
		$objPHPExcel->getActiveSheet()->setCellValue($alph[$col].$row,$razonsocial);
		$col++;
		$objPHPExcel->getActiveSheet()->setCellValue($alph[$col].$row,$tipotienda);
		$col++;
		$objPHPExcel->getActiveSheet()->setCellValue($alph[$col].$row,$numtiendas);
		$col++;
		$objPHPExcel->getActiveSheet()->setCellValue($alph[$col].$row,$m2piso);
		$col++;
		$objPHPExcel->getActiveSheet()->setCellValue($alph[$col].$row,$direccion);
		$col++;
		$objPHPExcel->getActiveSheet()->setCellValue($alph[$col].$row,$asociados['asociado_telefono']);
		$col++;
		$objPHPExcel->getActiveSheet()->setCellValue($alph[$col].$row,$asociados['asociado_fax']);
		$col++;
		$objPHPExcel->getActiveSheet()->setCellValue($alph[$col].$row,$asociados['asociado_website']);
		//$col++;
		//$objPHPExcel->getActiveSheet()->setCellValue($alph[$col].$row,"A especificar");
		$row++;
}	//fin while($asociados = mysql_fetch_row($result))
	
$objPHPExcel->setActiveSheetIndex(0);

// Redirect output to a client’s web browser (Excel5)
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="'.$tituloExcel.'.xls"');
header('Cache-Control: max-age=0');

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');
exit;

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