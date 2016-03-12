<?php
include ("inc/connect.php");

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
  <script type="text/javascript">
    var blockSort = false;
    var ascDescSort = [];
    function sortTable(column,isNumber){
      if(blockSort) return;
      blockSort = true;
      if(typeof isNumber === 'undefined') isNumber=false;
      var rows = $('#asociados-table tbody tr.btouleau-asociados-row-content').get();
      if(ascDescSort['col'+column]){
        ascDescSort['col'+column]=false;
      }else{
        ascDescSort['col'+column]=true;
      }
      rows.sort(function(a, b) {
        var A,B;
        if(isNumber){
          A = parseInt($(a).children('td').eq(column).text().replace(/,/g,''));
          B = parseInt($(b).children('td').eq(column).text().replace(/,/g,''));
        }else{
          A = $(a).children('td').eq(column).text().toUpperCase();
          B = $(b).children('td').eq(column).text().toUpperCase();
        }
        
        if(ascDescSort['col'+column]){
          if(A > B) {
            return -1;
          }
          if(A < B) {
            return 1;
          }
        }else{
          if(A < B) {
            return -1;
          }
          if(A > B) {
            return 1;
          }
        }
        return 0;
      });
      
      var allRows = $('#asociados-table tbody tr').get();

      $('#asociados-table').children('tbody').empty();
      $.each(rows, function(index, row) {
        for(var i =0, len = allRows.length;i<len;i++){
          if(allRows[i].innerHTML === row.innerHTML){
            $('#asociados-table').children('tbody').append(allRows[i]);
            $('#asociados-table').children('tbody').append(allRows[i+1]);
          }
        }
      });
      blockSort = false;
    }
  </script>
  <!-- START CONTENT -->


  <div>
    
    <header>
      <?php echo $txtreport; ?>
    </header>

    <table class="table demo table-bordered" data-filter="#filter" data-page-size="5" data-page-previous-text="prev" data-page-next-text="next">
      <tbody>
        <tr>
          <td>Número total de cadenas</td>
          <td>
            <?php echo $total_cadenas; ?>
          </td>
        </tr>
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
      <tfoot class="hide-if-no-paging">
        <tr>
          <td colspan="5">
            <div class="pagination pagination-centered"></div>
          </td>
        </tr>
      </tfoot>
    </table>
  </div>
  <div>
    <div class="table-responsive">
      <table id="asociados-table" class="table">
        <thead>
          <tr>
            <th onclick="sortTable(0)" class="btouleau-sortable-header"> Nombre Comercial </th>
            <th onclick="sortTable(1)" class="btouleau-sortable-header hidden-xs hidden-sm hidden-md"> Nombre Comercial </th>
            <th onclick="sortTable(2)" class="btouleau-sortable-header hidden-xs hidden-sm hidden-md"> Raz&oacute;n Social </th>
            <th onclick="sortTable(3)" class="btouleau-sortable-header hidden-xs hidden-sm hidden-md"> Tipo de Tienda </th>
            <th onclick="sortTable(4,true)" class="btouleau-sortable-header hidden-xs hidden-sm hidden-md"> N&uacute;mero de Tiendas </th>
            <th onclick="sortTable(5,true)" class="btouleau-sortable-header hidden-xs hidden-sm hidden-md"> Superficie de Ventas </th>
            <th onclick="sortTable(6)" class="btouleau-sortable-header hidden-xs hidden-sm hidden-md"> Direcci&oacute;n </th>
            <th onclick="sortTable(7)" class="btouleau-sortable-header hidden-xs hidden-sm hidden-md"> Colonia </th>
            <th onclick="sortTable(8)" class="btouleau-sortable-header hidden-xs hidden-sm hidden-md"> CP Ciudad </th>
            <th onclick="sortTable(9)" class="btouleau-sortable-header hidden-xs hidden-sm hidden-md"> Estado </th>
            <th onclick="sortTable(10,true)" class="btouleau-sortable-header hidden-xs hidden-sm hidden-md"> Tel&eacute;fono </th>
            <th onclick="sortTable(11,true)" class="btouleau-sortable-header hidden-xs hidden-sm hidden-md"> Fax </th>
            <th class="hidden-xs hidden-sm hidden-md"> Sitio Web </th>
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
	$tipotienda = utf8_encode($asociados['case_tipo_tienda']);
	$numtiendas =  utf8_encode($asociados['NUMTIENDAS']);//0;//utf8_encode($asociados[14]);
	
	$direccioncompleta = "<br>".utf8_encode($asociados['asociado_calle'])."<br>".utf8_encode($asociados['asociado_colonia'])."<br>".utf8_encode($asociados['asociado_cp'])." ".utf8_encode($asociados['asociado_ciudad'])."<br>".utf8_encode($asociados['asociado_estado']) ;
	$direccion = utf8_encode($asociados['asociado_calle']);
	$colonia = utf8_encode($asociados['asociado_colonia']);
	$cp = utf8_encode($asociados['asociado_cp']);
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
//echo $nombrecomercial; 

?>
          <tr onclick="$('#btouleau-asociados-row-<?php echo $rowId; ?> .btouleau-hidden').slideToggle();" class="btouleau-asociados-row-content">
              <td>
                <?php echo $nombrecomercial; ?>
              </td>
              <td style="width:220px" class="hidden-xs hidden-sm hidden-md">
                <div class="tablaFoo">
                  <?php echo $nombrecomercial; ?>
                </div>
              </td>
              <td class="hidden-xs hidden-sm hidden-md">
                <div class="tablaFoo">
                  <?php echo $razonsocial; ?>
                </div>
              </td>
              <td class="hidden-xs hidden-sm hidden-md">
                <div class="tablaFoo">
                  <?php echo $tipotienda; ?>
                </div>
              </td>
              <td class="hidden-xs hidden-sm hidden-md">
                <div class="tablaFoo">
                  <?php echo $numtiendas; ?>
                </div>
              </td>
              <td class="hidden-xs hidden-sm hidden-md">
                <div class="tablaFoo">
                  <?php echo number_format($asociados['M2PISO'], 2)." m&sup2;"; ?>
                </div>
              </td>
              <td class="hidden-xs hidden-sm hidden-md">
                <div class="tablaFoo">
                  <?php echo $direccion; ?>
                </div>
              </td>
              <td class="hidden-xs hidden-sm hidden-md">
                <div class="tablaFoo">
                  <?php echo $colonia; ?>
                </div>
              </td>
              <td class="hidden-xs hidden-sm hidden-md">
                <div class="tablaFoo">
                  <?php echo $cp." ".$ciudad; ?>
                </div>
              </td>
              <td class="hidden-xs hidden-sm hidden-md">
                <div class="tablaFoo">
                  <?php echo $estado; ?>
                </div>
              </td>
              <td class="hidden-xs hidden-sm hidden-md">
                <div class="tablaFoo">
                  <?php echo $asociados['asociado_telefono']; ?>
                </div>
              </td>
              <td class="hidden-xs hidden-sm hidden-md">
                <div class="tablaFoo">
                  <?php echo $asociados['asociado_fax']; ?>
                </div>
              </td>
              <td class="hidden-xs hidden-sm hidden-md">
                <div class="url">
                  <a href="<?php echo $asociados['asociado_website']; ?>" target="_blank">
                    <?php echo $asociados['asociado_website']; ?>
                  </a>
                </div>
              </td>
              <td style="width:220px"><img title="active" src="images/logos/100x100/<?php echo $logo; ?>.jpg" style="height: 80px; width: 80px" />
                <?php if ($logo2){ ?>
                  <img title="active" width="80" height="80" src="images/logos/100x100/<?php echo $logo2; ?>.jpg" style="height: 80px; width: 80px" />
                <?php } ?>
              </td>
            </tr>
            
            
          <tr id="btouleau-asociados-row-<?php echo $rowId; ?>" class="hidden-lg">
            <td class="btouleau-hidden" colspan="20">
             <ul>
               <li><?php echo $nombrecomercial; ?></li>
               <li><?php echo $razonsocial; ?></li>
               <li><?php echo $tipotienda; ?></li>
               <li><?php echo $numtiendas; ?></li>
               <li><?php echo number_format($asociados['M2PISO'], 2)." m&sup2;"; ?></li>
               <li><?php echo $direccion; ?></li>
               <li><?php echo $colonia; ?></li>
               <li><?php echo $cp." ".$ciudad; ?></li>
               <li><?php echo $estado; ?></li>
               <li><?php echo $asociados['asociado_telefono']; ?></li>
               <li><?php echo $asociados['asociado_fax']; ?></li>
               <li><a href="<?php echo $asociados['asociado_website']; ?>" target="_blank">
                 <?php echo $asociados['asociado_website']; ?>
                 </a></li>
             </ul>
            </td>
          </tr>
            <?php
}	//fin while($asociados = mysql_fetch_row($result))
?>
        </tbody>
      </table>
    </div>
    <div class="clear"></div>
  </div>
  </div>

  <!-- END CONTENT -->
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



				$estado = utf8_encode($asociados['asociado_estado']);