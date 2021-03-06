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
<!DOCTYPE html>
<html>
    <head>
        <title>Directorio ANTAD 2016</title>
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta charset="utf-8">
        <meta name="author" content="Admin" >
        <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
        
        <!-- Favicons -->
        <link rel="shortcut icon" href="images/favicon.png">
        <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
        <link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">		
						          

<link href="css/footable.standalone.css" rel="stylesheet" type="text/css" />
<link href="css/footable.sorting.css" rel="stylesheet" type="text/css" />
<link href="css/footable.paging.css" rel="stylesheet" type="text/css" />
<link href="css/footable.filtering.css" rel="stylesheet" type="text/css" />

<!-- Add in any FooTable dependencies we may need -->
<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.3/moment.min.js"></script>
<!-- Add in FooTable itself -->
<script src="js/footable.js" type="text/javascript"></script>
<script src="js/footable.paging.js" type="text/javascript"></script> 
<script src="js/footable.sorting.js" type="text/javascript"></script> 
<script src="js/footable.filtering.js" type="text/javascript"></script> 

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
             				
			
    </head>
    <body class="appear-animate">
    
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

<table id="latabla" class="table-bordered table-hover latabla" data-show-toggle="true" data-expand-first="false" data-paging="true" data-paging-size="20">
          <thead>
            <tr>
              <th data-class="expand" data-sort-initial="true"> <span title="table sorted by this column on load">Nombre Comercial</span> </th>
              <th data-hide="all"> Nombre Comercial </th>
              <th data-sort-ignore="true"> Logotipo </th>
              <th data-hide="phone,tablet"> Raz&oacute;n Social </th>
              <th data-hide="all"> Tipo de Tienda </th>
              <th data-hide="all"> N&uacute;mero de Tiendas </th>
              <th data-hide="all"> Superficie de Ventas </th>
              <th data-hide="all"> Direcci&oacute;n </th>
              <th data-hide="all"> Colonia </th>
              <th data-hide="all"> CP Ciudad </th>
              <th data-hide="all"> Estado </th>              
              <th data-hide="all"> Tel&eacute;fono </th>
              <th data-hide="all"> Fax </th>
              <th data-hide="all"> Sitio Web </th>
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
	else
		$logo = "SinLogo";

	$pathlogo = "images/logos/100x100/".$logo.".jpg";
//	echo $pathlogo."<br />"; 	
?>
            <tr>
              <td><?php echo $nombrecomercial; ?></td>

              <td style= "width:220px"><div class="tablaFoo"><?php echo $nombrecomercial; ?></div></td>
              <td style= "width:220px"><img title="active" src="<?php echo $pathlogo; ?>" style="height: 80px; width: 80px" />
<?php 
					if ($logo2){
?>
						<img title="active" width="80" height="80" src="images/logos/100x100/<?php echo $logo2; ?>.jpg" style="height: 80px; width: 80px" />
<?php
}
?>
				  </td>              
              <td><div class="tablaFoo"><?php echo $razonsocial; ?></div></td>


              <td><div class="tablaFoo"><?php echo $tipotienda; ?></div></td>
              <td><div class="tablaFoo"><?php echo $numtiendas; ?></div></td>
              <td><div class="tablaFoo"><?php echo number_format($asociados['M2PISO'], 2)." m&sup2;"; ?></div></td>
              <td><div class="tablaFoo"><?php echo $direccion; ?></div></td>
              <td><div class="tablaFoo"><?php echo $colonia; ?></div></td>
              <td><div class="tablaFoo"><?php echo $cp." ".$ciudad; ?></div></td>
              <td><div class="tablaFoo"><?php echo $estado; ?></div></td>
              <td><div class="tablaFoo"><?php echo $asociados['asociado_telefono']; ?></div></td>
              <td><div class="tablaFoo"><?php echo $asociados['asociado_fax']; ?></div></td>
              <td><div class="tablaFoo url"><a href="<?php echo $asociados['asociado_website']; ?>" target="_blank"><?php echo $asociados['asociado_website']; ?></a></div></td>

            </tr>
<?php
}	//fin while($asociados = mysql_fetch_row($result))
?>
          </tbody>
        </table>
 
 
 <table>
          <thead>
            <tr>
              <th data-class="expand" data-sort-initial="true"> <span title="table sorted by this column on load">Nombre Comercial</span> </th>
              <th data-hide="all"> Nombre Comercial </th>
              <th data-sort-ignore="true"> Logotipo </th>
              <th data-hide="phone,tablet"> Raz&oacute;n Social </th>
              <th data-hide="all"> Tipo de Tienda </th>
              <th data-hide="all"> N&uacute;mero de Tiendas </th>
              <th data-hide="all"> Superficie de Ventas </th>
              <th data-hide="all"> Direcci&oacute;n </th>
              <th data-hide="all"> Colonia </th>
              <th data-hide="all"> CP Ciudad </th>
              <th data-hide="all"> Estado </th>              
              <th data-hide="all"> Tel&eacute;fono </th>
              <th data-hide="all"> Fax </th>
              <th data-hide="all"> Sitio Web </th>
            </tr>
          </thead>
          <tbody>


       <tr>
              <td><?php echo 1; ?></td>            
              <td align="center"><?php echo 2; ?></td>
              <?php /*?><td><?php echo $razonsocial; ?></div></td><?php */?>
              <td align="center"><?php echo 3; ?></td>
              <td align="center"><?php echo 4; ?></td>
              <td align="center"><?php echo 5; ?></td>
              <td align="center"><?php echo $tipotienda; ?></td>
              <td align="center"><?php echo $numtiendas; ?></td>
              <td align="center"><?php echo number_format($asociados['M2PISO'], 2)." m&sup2;"; ?></td>
              <td align="center"><?php echo $direccion; ?></td>
              <td align="center"><?php echo $asociados['asociado_telefono']; ?></td>
              <td align="center"><?php echo $asociados['asociado_fax']; ?></td>
              <td align="center"><div class="tablaFoo url"><a href="<?php echo $asociados['asociado_website']; ?>" target="_blank"><?php echo $asociados['asociado_website']; ?></a></td>
              <td width="200px" align="center"><?php echo $ellogo; ?></td>

              <td width="200px" align="center"><img src="./images/logos/100x100/zara.jpg" alt="" width="100" height="100"></img></td>
            </tr> 
 
 
 </table>                     
                     </div>
                    <!-- End Row -->                                     
                    
                </div>
            </section>
            <!-- End Section -->
        
        </div>
        <!-- End Page Wrap -->

        <!-- JS -->
        <script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
        <script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>        
        <script type="text/javascript" src="js/SmoothScroll.js"></script>
        <script type="text/javascript" src="js/jquery.scrollTo.min.js"></script>
        <script type="text/javascript" src="js/jquery.localScroll.min.js"></script>
        <script type="text/javascript" src="js/jquery.viewport.mini.js"></script>
        <script type="text/javascript" src="js/jquery.countTo.js"></script>
        <script type="text/javascript" src="js/jquery.appear.js"></script>
        <script type="text/javascript" src="js/jquery.sticky.js"></script>
        <script type="text/javascript" src="js/jquery.parallax-1.1.3.js"></script>
        <script type="text/javascript" src="js/jquery.fitvids.js"></script>
        <script type="text/javascript" src="js/owl.carousel.min.js"></script>
        <script type="text/javascript" src="js/isotope.pkgd.min.js"></script>
        <script type="text/javascript" src="js/imagesloaded.pkgd.min.js"></script>
        <script type="text/javascript" src="js/jquery.magnific-popup.min.js"></script>
        <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&amp;language=en"></script>
        <script type="text/javascript" src="js/gmap3.min.js"></script>
        <script type="text/javascript" src="js/wow.min.js"></script>
        <script type="text/javascript" src="js/masonry.pkgd.min.js"></script>
        <script type="text/javascript" src="js/jquery.simple-text-rotator.min.js"></script>
        <script type="text/javascript" src="js/all.js"></script>
        <script type="text/javascript" src="js/contact-form.js"></script>
        <script type="text/javascript" src="js/jquery.ajaxchimp.min.js"></script>        
        <!--[if lt IE 10]><script type="text/javascript" src="js/placeholder.js"></script><![endif]-->

			<!-- Placed at the end of the document so the pages load faster -->
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
			<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>



        
    </body>
</html>
