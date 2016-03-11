<?php
include ("../inc/connect.php");
include ("../inc/queryAll.php");

date_default_timezone_set('America/Mexico_City');
require '../inc/PHPExcel/Classes/PHPExcel.php';
require_once '../inc/PHPExcel/Classes/PHPExcel/IOFactory.php';

if (PHP_SAPI == 'cli')
	die('This example should only be run from a Web Browser');

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
		$txtreport .= " en la ".obtenerNombreZona($zona);
		$tieneZona = true;
	}
	/*if(intval($estado)!=0){
		$where .= " AND asociados_estados.estado_id = $estado ";
		$txtreport .= " en el estado de ".obtenerNombreEstado($estado);
	}*/
}


$query = " SELECT asociados.*, asociados_zonas.asociado_zona_numtiendas NUMTIENDAS, asociados_zonas.asociado_zona_m2pisoventas M2PISO, asociados_zonas.asociado_id, zonas.zona_nombre 
			FROM asociados_zonas, asociados, zonas
			WHERE asociados.asociado_id = asociados_zonas.asociado_id 
			AND zonas.zona_id = asociados_zonas.zona_id
			$where
			ORDER BY zonas.zona_nombre, asociados.asociado_nombrecomercial ";
$result = mysql_query($query);
//echo $query;

$query_count = "SELECT COUNT(*) NUMERO, SUM(S.NUMTIENDAS) NUMTIENDASF, SUM(S.M2PISO) M2PISOF 
				FROM  (
						SELECT 1, SUM(asociados_zonas.asociado_zona_numtiendas) NUMTIENDAS, SUM(asociados_zonas.asociado_zona_m2pisoventas) M2PISO, asociados_zonas.asociado_id, zonas.zona_nombre 
						FROM asociados_zonas, asociados, zonas
						WHERE asociados.asociado_id = asociados_zonas.asociado_id 
						AND zonas.zona_id = asociados_zonas.zona_id
						$where
						GROUP BY asociados.asociado_id ) as S";
//echo $query_count;
$result_count = mysql_query ($query_count);
$count = mysql_fetch_assoc($result_count);
$total_cadenas = number_format($count['NUMERO'],0);
$total_numtiendas = number_format($count['NUMTIENDASF'], 0);
$total_superficie = number_format($count['M2PISOF']);
//-----------
$tituloExcel="Reporte_x_Zonas";

if($tieneAsociado || $tieneZona)
	$tituloExcel.="_c";
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
	if(!$tieneZona){
		$objPHPExcel->getActiveSheet()->setCellValue($alph[$col].$row,"Zona");
		$col++;
	}
	if(!$tieneAsociado){
		$objPHPExcel->getActiveSheet()->setCellValue($alph[$col].$row,"Nombre Comercial");
		$col++;
	}
		$objPHPExcel->getActiveSheet()->setCellValue($alph[$col].$row,"Número de Tiendas");
		$col++;
		$objPHPExcel->getActiveSheet()->setCellValue($alph[$col].$row,"Superficie de Venta");
	$row++;
	//$tempZona="";
	while ($asociados = mysql_fetch_assoc($result)) {
		$asociado_id = utf8_encode($asociados['asociado_id']);
	$nombrecomercial = utf8_encode($asociados['asociado_nombrecomercial']);
	$razonsocial = utf8_encode($asociados['asociado_razonsocial']);
	$tipotienda = utf8_encode($asociados['asociado_tipo_id']);
	$numtiendas =  utf8_encode($asociados['NUMTIENDAS']);
	$zona_nombre = utf8_encode($asociados['zona_nombre']);
		$m2piso = number_format($asociados['M2PISO'], 2)." m²";
		
		$col=0;
		if(!$tieneZona){
			//if($tempZona!=$zona_nombre){
				$objPHPExcel->getActiveSheet()->setCellValue($alph[$col].$row,$zona_nombre);
				//$tempZona=$zona_nombre;
			//}
			$col++;
		}
		if(!$tieneAsociado){
		$objPHPExcel->getActiveSheet()->setCellValue($alph[$col].$row,$nombrecomercial);
		$col++;
		}
		$objPHPExcel->getActiveSheet()->setCellValue($alph[$col].$row,$numtiendas);
		$col++;
		$objPHPExcel->getActiveSheet()->setCellValue($alph[$col].$row,$m2piso);
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
?>