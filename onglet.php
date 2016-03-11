<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-edepartamentalesv="Content-Type" content="text/html; charset=utf-8" />
    <title>Un syst&egrave;me d'onglet en javascript</title>
    <script type="text/javascript">
        //<!--
                function change_onglet(name)
                {
                        document.getElementById('onglet_'+anc_onglet).className = 'onglet_0 onglet';
                        document.getElementById('onglet_'+name).className = 'onglet_1 onglet';
                        document.getElementById('contenu_onglet_'+anc_onglet).style.display = 'none';
                        document.getElementById('contenu_onglet_'+name).style.display = 'block';
                        anc_onglet = name;
                }
        //-->
        </script>
	<link rel="stylesheet" href="css/base.css">
	<link rel="stylesheet" href="css/skeleton.css">
    <style type="text/css">
        .onglet
        {
                display:inline-block;
                margin-left:3px;
                margin-right:3px;
                padding:3px;
                border:1px solid black;
                cursor:pointer;
        }
        .onglet_0
        {
                background:#bbbbbb;
                border-bottom:1px solid black;
        }
        .onglet_1
        {
                background:#dddddd;
                border-bottom:0px solid black;
                padding-bottom:4px;
        }
        .contenu_onglet
        {
				-moz-box-shadow: 0 0 20px black; -webkit-box-shadow: 0 0 20px black; padding: 20px; background: white; border: 1px solid #ccc; margin: -1px 0 0 0; 
                background-color:#ffffff;
                border:1px solid black;
                margin-top:-1px;
                padding:5px;
                display:none;
        }
        ul
        {
                margin-top:0px;
                margin-bottom:0px;
                margin-left:-10px
        }
        h1
        {
                margin:0px;
                padding:0px;
        }
        </style>
</head>
<body>
	<div class="fullscreen">

		<div class="container clearfix">
	  		<div class="sixteen columns">

        <div class="systeme_onglets">
        <div class="onglets">
            <span class="onglet_0 onglet" id="onglet_autoservicio" onclick="javascript:change_onglet('autoservicio');"><img src="images/botones/autoservicio01.png" class="aligncenter" alt="" /></span>
            <span class="onglet_0 onglet" id="onglet_departamentales" onclick="javascript:change_onglet('departamentales');"><img src="images/botones/departamental01.png" class="aligncenter" alt="" /></span>
            <span class="onglet_0 onglet" id="onglet_especializadas" onclick="javascript:change_onglet('especializadas');"><img src="images/botones/especialidades01.png" class="aligncenter" alt="" /></span>
        </div>
        <div class="contenu_onglets">
            <div class="contenu_onglet" id="contenu_onglet_autoservicio">
			<h3>Tiendas de Autoservicio</h3>
            <p>Sistema de ventas al consumidor que exhibe productos y artículos en forma abierta, clasificandolos por categorías y tipos, 
principalmente abarrotes, perecederos, ropa y mercancías generales.<br>
Ofrecen la mayor atencíon con la menor intervención del personal y un área para el pago, 
con sistenas Punto de Venta a la salida.</p>
            </div>
            <div class="contenu_onglet" id="contenu_onglet_departamentales">
			<h3>Tiendas Departamentales</h3>
            <p>Sistema directo de venta al consumidor.
Exhibe productos que clasifica por áreas o departamentos, principalmente ropa, varios, enseres mayores y menores.
Ofrecen atención personalizada a clientes, cuenta por los menos con un Punto de Venta por departamenteo o área.</p>
            </div>
            <div class="contenu_onglet" id="contenu_onglet_especializadas">
			<a href="#"><img src="images/homepage_image_2.png" class="aligncenter" alt="" /></a>
		  <h3 align="center">Farmacias</h3>
			<div class="content_block">
<p>Cuenta con  mostrador de servicio personalizado para productos farmacéuticos que requieren prescripción médica, además de un área de exhibición de prodcutos y artículos en forma abierta.
Regularmente funciona en horarios amplois. Cuenta en promedio con 2 puntos de venta para pago.</p>
            </div>
        </div>
    </div>
        </div>

    </div>

    <script type="text/javascript">
        //<!--
                var anc_onglet = 'autoservicio';
                change_onglet(anc_onglet);
        //-->
        </script>
</body>
</html>
