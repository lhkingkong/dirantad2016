<?php
include ("inc/connect.php");
include "inc/jsAll.php"; 

if(!isset($_GET['condition']))
	$condition = 0;
else
	$condition = $_GET['condition'];

$where = "";

switch(intval($condition)){
	case 1:
				$where = "AND asociados.asociado_tipo_id = 1 ";
				$txtreport ="Listado de las cadenas de Tiendas de Autoservicio asociadas a ANTAD";
				break;
	case 2:
				$where = "AND asociados.asociado_tipo_id = 2 ";
				$txtreport ="Listado general de las cadenas de Tiendas Departamentales asociadas a ANTAD";
				break;
	case 3:
				$where = "AND asociados.asociado_tipo_id = 3 ";
				$txtreport ="Listado general de las cadenas de Tiendas Especializadas asociadas a ANTAD";
				break;
	default:
				$txtreport ="Listado general de las cadenas asociadas a ANTAD";
				break;
}

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


if(!isset($_GET['condition']))
	$condition = 0;
else
	$condition = $_GET['condition'];

$where = "";

switch(intval($condition)){
	case 1:
				$where = "AND asociados.asociado_tipo_id = 1 ";
				$txtreport ="Listado de las cadenas de Tiendas de Autoservicio asociadas a ANTAD";
				break;
	case 2:
				$where = "AND asociados.asociado_tipo_id = 2 ";
				$txtreport ="Listado general de las cadenas de Tiendas Departamentales asociadas a ANTAD";
				break;
	case 3:
				$where = "AND asociados.asociado_tipo_id = 3 ";
				$txtreport ="Listado general de las cadenas de Tiendas Especializadas asociadas a ANTAD";
				break;
	default:
				$txtreport ="Listado general de las cadenas asociadas a ANTAD";
				break;
}

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
<html>
<head>

<!-- Bootstrap core CSS -->
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css" rel="stylesheet">

<link href="css/footable.bootstrap.css" rel="stylesheet" type="text/css" />
<link href="css/footable-0.1.css" rel="stylesheet" type="text/css" />                  


</head>
	    
<body>

<table id="latabla" class="table-bordered table-hover latabla" data-show-toggle="true" data-paging="true" data-paging-size="20">
          <thead>
            <tr>
              <th data-visible="false"> ID </th>            
              <th data-toggle="true"> Nombre Comercial </th>
              <th data-breakpoints="all"> Nombre Comercial </th>
              <th data-breakpoints="xs"> Raz&oacute;n Social </th>
              <th data-breakpoints="all"> Raz&oacute;n Social </th>              
              <th data-breakpoints="all"> Tipo de Tienda </th>
              <th data-breakpoints="all"> N&uacute;mero de Tiendas </th>
              <th data-breakpoints="all"> Superficie de Ventas </th>
              <th data-breakpoints="all"> Direcci&oacute;n </th>
              <th data-breakpoints="all"> Tel&eacute;fono </th>
              <th data-breakpoints="all"> Fax </th>
              <th data-breakpoints="xs sm"> Sitio Web </th>
              <th> Logotipo </th>
            </tr>
          </thead>
          <tbody>
<?php
while ($asociados = mysql_fetch_assoc($result)) {
	$nombrecomercial = utf8_encode($asociados['asociado_nombrecomercial']);
	$razonsocial = utf8_encode($asociados['asociado_razonsocial']);
	$tipotienda = utf8_encode($asociados['case_tipo_tienda']);
	$numtiendas =  utf8_encode($asociados['NUMTIENDAS']);//0;//utf8_encode($asociados[14]);
	
	$direccion = utf8_encode($asociados['asociado_calle'])."\r\n\r".utf8_encode($asociados['asociado_colonia'])."<br />".utf8_encode($asociados['asociado_cp'])." ".utf8_encode($asociados['asociado_ciudad'])."<br />".utf8_encode($asociados['asociado_estado']) ;
	$ciudad = utf8_encode($asociados['asociado_ciudad']);
	$estado = utf8_encode($asociados['asociado_estado']);
	
	$query_logo = "SELECT ASOCIADO_PATH_IMG, ASOCIADO_PATH_IMG2 FROM asociados_logo WHERE asociado_id = ".utf8_encode($asociados['asociado_id']);
	$result_logo = mysql_query($query_logo);
	if ($values = mysql_fetch_assoc($result_logo)) {
		$logo = trim(utf8_encode($values['ASOCIADO_PATH_IMG']));
		$logo2 = trim(utf8_encode($values['ASOCIADO_PATH_IMG2']));
	}
	else {
		$logo = "SinLogo";
		$logo2 = "SinLogo";
	}		
	$ellogo = "images/logos/100x100/".$logo.".jpg";		
?>
            <tr>
              <td><?php echo $nombrecomercial; ?></td>            
              <td align="center"><?php echo $nombrecomercial; ?></td>
              <?php /*?><td><?php echo $razonsocial; ?></div></td><?php */?>
              <td align="center"><?php echo $nombrecomercial; ?></td>
              <td align="center"><?php echo $razonsocial; ?></td>
              <td align="center"><?php echo $razonsocial; ?></td>
              <td align="center"><?php echo $tipotienda; ?></td>
              <td align="center"><?php echo $numtiendas; ?></td>
              <td align="center"><?php echo number_format($asociados['M2PISO'], 2)." m&sup2;"; ?></td>
              <td align="center"><?php echo $direccion; ?></td>
              <td align="center"><?php echo $asociados['asociado_telefono']; ?></td>
              <td align="center"><?php echo $asociados['asociado_fax']; ?></td>
              <td align="center"><div class="tablaFoo url"><a href="<?php echo $asociados['asociado_website']; ?>" target="_blank"><?php echo $asociados['asociado_website']; ?></a></td>
              <td align="center"><img title="active" width="80" height="80" src="<?php echo $ellogo; ?>" /></td>

            </tr>
<?php
}	//fin while($asociados = mysql_fetch_row($result))
?>
                        
            
          </tbody>
          
      
        </table>
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<!-- Add in any FooTable dependencies we may need -->
<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.3/moment.min.js"></script>
<!-- Add in FooTable itself -->
<script src="compiled/footable.js"></script>

<script src="js/footable.js" type="text/javascript"></script>
<script src="js/footable.paginate.js?v=2-0-1" type="text/javascript"></script> 

<!-- Initialize FooTable -->
<script>
        jQuery(function($){
                $('.latabla').footable({
                        "paging": {
                                "enabled": true
                        },
                        "filtering": {
                                "enabled": true
                        },
                        "sorting": {
                                "enabled": true
                        }
                });
        });
</script>

</body>
</html>
