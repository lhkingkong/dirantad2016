<?php
function crearBoton($texto, $accion, $url, $img_path){
	$boton = '<button class="botonB" ';
	if(trim($accion)!="")
		$boton .= 'onclick="'.$accion.'; return false;"';
	else
		if(trim($url)!="")
			$boton .= 'onclick="javascript:location.href=\''.$url.'\'; return false;"';
	$boton .= '>'.$texto.'&nbsp;';
	if(trim($img_path)!="")
		$boton .= '<img src="'.$img_path.'">';
	$boton .= '</button>';
	echo $boton;
}
?>