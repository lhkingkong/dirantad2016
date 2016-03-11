<?php
include ("inc/connect.php");
global $total_cadenas, $total_superficie, $total_numtiendas;
	$mycondition = "1";
	$txtreport ="Listado general de las cadenas asociadas a ANTAD";

$query = "SELECT * FROM asociados WHERE ".$mycondition." ORDER BY asociado_razonsocial";
$result = mysql_query($query);

$query_count = "SELECT COUNT(*) AS counter FROM asociados WHERE ".$mycondition." ORDER BY asociado_razonsocial";
$result_count = mysql_query ($query_count);
$count = mysql_fetch_assoc($result_count);

$query_count_numtiendas = "SELECT sum(asociado_numtiendas) AS numtiendas FROM asociados WHERE ".$mycondition." ORDER BY asociado_razonsocial";
$result_count_numtiendas = mysql_query ($query_count_numtiendas);
$count_numtiendas = mysql_fetch_assoc($result_count_numtiendas);

$query_count_superficie = "SELECT sum(asociado_m2pisoventas) AS m2pisoventas FROM asociados WHERE ".$mycondition." ORDER BY asociado_razonsocial";
$result_count_superficie = mysql_query ($query_count_superficie);
$count_superficie = mysql_fetch_assoc($result_count_superficie);

$total_cadenas = number_format($count['counter']);
$total_superficie = number_format($count_superficie['m2pisoventas'], 2);
$total_numtiendas = number_format($count_numtiendas['numtiendas']);

echo "$total_cadenas $total_superficie $total_numtiendas ";
?>    
			<h3><?php echo $txtreport; ?></h3>
            <h4>Numéro total de cadenas: <?php echo $total_cadenas; ?><br>
            Numéro total de tiendas: <?php echo $total_numtiendas; ?><br>
            Superficie total de Piso de Ventas: <?php echo $total_superficie; ?> m2</h4>  

    <table class="footable">
      <thead>
        <tr>
          <th data-class="expand" data-sort-initial="true">
            <span title="table sorted by this column on load">Nombre Comercial</span>
          </th>
          <th data-sort-ignore="true">
            Razon Social
          </th>            
          <th data-hide="all">
            Nombre Comercial
          </th>           
          <th data-hide="all">
            Razon Social
          </th> 
          <th data-hide="all">
            Tipo de Tienda
          </th>  
          <th data-hide="all">
            Número de Tiendas
          </th>                    
          <th data-hide="all">
            Superficie de Ventas
          </th> 
          <th data-hide="all">
            Direccion
          </th>
          <th data-hide="all">
            Telefono
          </th> 
          <th data-hide="all">
            Fax
          </th>   
          <th data-hide="all">
            Sitio Web
          </th>                                                                         
          <th data-hide="all">
            Correo Electronico
          </th>
          <th data-sort-ignore="true">
            Logotipo
          </th>                           
        </tr>
      </thead>
		<tbody>
<?php  
while ($asociados = mysql_fetch_row($result)) {
	$nombrecomercial = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".utf8_encode($asociados[3]);
	$razonsocial = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".utf8_encode($asociados[4]);
	$tipotienda = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".utf8_encode($asociados[1]);
	$numtiendas = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".utf8_encode($asociados[14]);
	
	$direccion = "&nbsp;".utf8_encode($asociados[5])."<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".utf8_encode($asociados[6])."<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".utf8_encode($asociados[7])." ".utf8_encode($asociados[8])."<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".utf8_encode($asociados[10]) ;
	$ciudad = utf8_encode($asociados[4]);
	$estado = utf8_encode($asociados[4]);
	
//echo $asociados[1];
//echo $asociados[4];
//echo"<br>";
?>         
                  <tr>
                      <td><?php echo $nombrecomercial; ?> </td>
                      <td><?php echo $razonsocial; ?> </td>   
                      
                      <td><?php echo $nombrecomercial; ?> </td>
                      <td><?php echo $razonsocial; ?> </td>   
                      <td><?php echo $tipotienda; ?> </td>                      
                      <td><?php echo $numtiendas; ?> </td>                      
                      <td><?php echo number_format($asociados['15'], 2)." m2"; ?> </td>                                          
                      <td><?php echo $direccion; ?> </td>
                      <td><?php echo $asociados[11]; ?> </td>
                      <td><?php echo $asociados[12]; ?> </td>
                      <td><?php echo $asociados[13]; ?> </td>
                      <td><?php echo "A especificar"; ?> </td>
                      <td><img title="active" src="images/directorio/logo-sams.png" /> </td>              
                  </tr>
<?php
}      		
?>  


      </tbody>	  
    </table>