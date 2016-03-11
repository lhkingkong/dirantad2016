<?php
include ("inc/connect.php");
include "inc/jsAll.php"; 

$base_dir  = __DIR__;

$server = "http://$_SERVER[HTTP_HOST]";
$pathurl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    var_dump(parse_url($pathurl));

echo $base_dir."<br />";
echo $base_dir."<br />";
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

        <!-- CSS -->
          <link rel="stylesheet" href="bootstrap-3.3.6-dist/css/bootstrap.css">     
       
        

        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/style-responsive.css">






<link href="css/footable.bootstrap.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="css/footable.filtering.css">    
        <link rel="stylesheet" href="css/footable.sorting.css">  
                <link rel="stylesheet" href="css/footable.paging.css">    
</head>
	    
<body>
       <!-- Page Wrap -->
        <div class="page" id="top">
            
           <?php include "menu.php" ?>
                           
            <!-- Head Section -->
            <section class="small-section bg-dark-alfa-30 parallax-2" data-background="images/background-red.png">
                <div class="relative container align-left">
                    
                    <div class="row">
                        
                        <div class="col-md-12">
                            <h1 class="font-alt mb-20 mb-xs-0">Directorio ANTAD 2016</h1>
                            <h1 class="font-alt" align="center">Asociados</h1>
                        </div>
                        
                    </div>
                    
                </div>
            </section>
            <!-- End Head Section -->                                              
            
            <!-- Section Asociados -->
            <section class="page-section" id="asociacion">
                <div class="relative container">
                    
                    <div class="section-text">

          					<div>Tipo de tienda</div>
                    
                    <!-- Row -->
                    <div class="row">
                            <h1 class="font-alt" align="center">Asociados</h1>

<table id="latabla" class="table-bordered table-hover latabla" data-show-toggle="true" data-paging="true" data-paging-size="15">
          <thead>
            <tr>
              <th data-toggle="true"> Nombre Comercial </th>
              <th data-breakpoints="all"> Nombre Comercial </th>
              <th data-breakpoints="xs sm"> Raz&oacute;n Social </th>
              <th> Logotipo </th>                          
              <th data-breakpoints="all"> Tipo de Tienda </th>
              <th data-breakpoints="all"> N&uacute;mero de Tiendas </th>
              <th data-breakpoints="all"> Superficie de Ventas </th>
              <th data-breakpoints="all"> Direcci&oacute;n </th>
              <th data-breakpoints="all"></th>
              <th data-breakpoints="all"></th>
              <th data-breakpoints="all"></th>              
              <th data-breakpoints="all"> Tel&eacute;fono </th>
              <th data-breakpoints="all"> Fax </th>
              <th data-breakpoints="xs sm"> Sitio Web </th>

            </tr>
          </thead>
          <tbody>
<?php
while ($asociados = mysql_fetch_assoc($result)) {
	$nombrecomercial = utf8_encode($asociados['asociado_nombrecomercial']);
	$razonsocial = utf8_encode($asociados['asociado_razonsocial']);
	$tipotienda = utf8_encode($asociados['case_tipo_tienda']);
	$numtiendas =  utf8_encode($asociados['NUMTIENDAS']);//0;//utf8_encode($asociados[14]);
	
	$direccioncompleta = "<br>".utf8_encode($asociados['asociado_calle'])."<br>".utf8_encode($asociados['asociado_colonia'])."<br>".utf8_encode($asociados['asociado_cp'])." ".utf8_encode($asociados['asociado_ciudad'])."<br>".utf8_encode($asociados['asociado_estado']) ;
	$direccion = utf8_encode($asociados['asociado_calle']);
	$colonia = utf8_encode($asociados['asociado_colonia']);
	$cp = utf8_encode($asociados['asociado_cp']);
	$ciudad = utf8_encode($asociados['asociado_ciudad']);
	$estado = utf8_encode($asociados['asociado_estado']);
	$estado = utf8_encode($asociados['asociado_estado']);
	
	$query_logo = "SELECT ASOCIADO_PATH_IMG, ASOCIADO_PATH_IMG2 FROM asociados_logo WHERE asociado_id = ".utf8_encode($asociados['asociado_id']);
	$result_logo = mysql_query($query_logo);
	if ($values = mysql_fetch_assoc($result_logo)) {
		$logo = trim(utf8_encode($values['ASOCIADO_PATH_IMG']));
		$logo2 = trim(utf8_encode($values['ASOCIADO_PATH_IMG2']));
		if ($logo2){
			$pathlogo2 = "images/logos/100x100/".$logo2.".jpg";	
		}				
	}
	else
		$logo = "SinLogo";

	$pathlogo = "images/logos/100x100/".$logo.".jpg";
	
	$img = "images/logos/100x100/zara.jpg";
//	echo "LOGO:".$pathlogo."<br />"; 

?>
            <tr>
              <td align="center"><?php echo $nombrecomercial; ?></td>
              <td align="center"><?php echo $nombrecomercial; ?></td>
              <td align="center"><?php echo $razonsocial; ?></td>
              <td style= "width:220px"><img src="<?php echo $pathlogo; ?>" style="height: 80px; width: 80px" />
<?php 
					if ($logo2){
?>
						<img width="80" height="80" src="<?php echo $pathlogo2; ?>" style="height: 80px; width: 80px" />
<?php
					}
?>              
              <td align="center"><?php echo $tipotienda; ?></td>
              <td align="center"><?php echo $numtiendas; ?></td>
              <td align="center"><?php echo number_format($asociados['M2PISO'], 2)." m&sup2;"; ?></td>
              <td align="center"><?php echo $direccion; ?></td>
              <td><div class="tablaFoo"><?php echo $colonia; ?></div></td>
              <td><div class="tablaFoo"><?php echo $cp." ".$ciudad; ?></div></td>
              <td><div class="tablaFoo"><?php echo $estado; ?></div></td>
              <td align="center"><?php echo $asociados['asociado_telefono']; ?></td>
              <td align="center"><?php echo $asociados['asociado_fax']; ?></td>
              <td align="center"><div class="tablaFoo url"><a href="<?php echo $asociados['asociado_website']; ?>" target="_blank"><?php echo $asociados['asociado_website']; ?></a></td>

            </tr>
<?php
}	//fin while($asociados = mysql_fetch_row($result))
?>                 
            
          </tbody>
          
        </table>
                     </div>
                    <!-- End Row -->                                     
                    
                </div>
            </section>
            <!-- End Section -->
        
        </div>
        <!-- End Page Wrap -->     
          
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>


<!-- Add in any FooTable dependencies we may need -->
<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.3/moment.min.js"></script>
<!-- Add in FooTable itself -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-footable/3.0.4/js/footable.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-footable/3.0.4/js/footable.filtering.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-footable/3.0.4/js/footable.paging.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-footable/3.0.4/js/footable.sorting.js" type="text/javascript"></script>

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
