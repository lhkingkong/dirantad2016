<?php
include ("inc/connect.php");
?>
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
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js" type="text/javascript"></script>
  <script src="js/footable-0.1.js" type="text/javascript"></script>
  <script src="js/footable.sortable.js" type="text/javascript"></script>
  <script type="text/javascript">
    $(function() {
      $('table').footable();
    });
  </script>
	<link rel="stylesheet" href="css/base.css">
	<link rel="stylesheet" href="css/skeleton.css">
    <link href="css/footable-0.1.css" rel="stylesheet" type="text/css" />
	<link href="css/footable.sortable-0.1.css" rel="stylesheet" type="text/css" />  
    <style type="text/css">
        .onglet
        {
                display:inline-block;
                margin-left:3px;
                margin-right:3px;
                padding:3px;
                border:1px solid black;
                cursor:pointer;
				position: relative;
        }
        .onglet_0
        {
                background:#ffffff;
                border-bottom:0px solid black;
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
				position: relative;			
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

        <div class="systeme_onglets">
        <div class="onglets">
            <span class="onglet_0 onglet" id="onglet_general" onclick="javascript:change_onglet('general');"><img src="images/botones/general01.png" class="aligncenter" alt="" /></span>       
            <span class="onglet_0 onglet" id="onglet_autoservicio" onclick="javascript:change_onglet('autoservicio');"><img src="images/botones/autoservicio01.png" class="aligncenter" alt="" /></span>
            <span class="onglet_0 onglet" id="onglet_departamentales" onclick="javascript:change_onglet('departamentales');"><img src="images/botones/departamental01.png" class="aligncenter" alt="" /></span>
            <span class="onglet_0 onglet" id="onglet_especializadas" onclick="javascript:change_onglet('especializadas');"><img src="images/botones/especialidades01.png" class="aligncenter" alt="" /></span>
        </div>
        <div class="contenu_onglets sixteen columns">

            </div>	
            <div class="contenu_onglet" id="contenu_onglet_autoservicio">
	<? require "asociados_lista.php" ?>        
</div>
            <div class="contenu_onglet" id="contenu_onglet_departamentales">
<?php include "asociados_consulta.php?condition=2" ?>
DEPARTAMENTALES
            </div>
            <div class="contenu_onglet" id="contenu_onglet_especializadas">
            ESPECIALIZADAS
        </div>
    </div>
        </div>
	<div class="clear"></div>	
	
	<div class="clear padding40"></div>
    </div>

    <script type="text/javascript">
        //<!--
                var anc_onglet = 'general';
                change_onglet(anc_onglet);
        //-->
        </script>
</body>
</html>
