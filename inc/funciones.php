<?php

date_default_timezone_set('America/Mexico_City');
$MAYUS = 'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÐÒÓÕÖØÙÚÛÜÝ';
$SUSTMAYUS = 'AAAAAACEEEEIIIIDOOOOOUUUUY';

//$MAYUS = utf8_encode($MAYUS);
function Q_acento($cadena){
        $tofind = "ÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ";
        $replac = "AAAAAAaaaaaaOOOOOOooooooEEEEeeeeCcIIIIiiiiUUUUuuuuyNn";
        return(strtr($cadena,$tofind,$replac));
}
	
function completaString($cadena, $length) {
    $cadena = trim(htmlspecialchars_decode($cadena));
    $cadena = utf8_decode($cadena);

    if (strlen($cadena) > $length)
        $cadena = substr($cadena, 0, $length);

    $cadena = utf8_encode($cadena);
    while (strlen($cadena) < $length) {
        $cadena = $cadena . " ";
    }
    $cadena = str_replace('\'', "''", $cadena);
    //$cadena = strtr($cadena, array("ß" => "B"));
    $cadena = str_replace('ô', "Ô", $cadena);
    return strtoupper(strtr($cadena, "àáâãäåæçèéêëìíîïðñòóõöøùúûüý", "ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÕÖØÙÚÛÜÝ")); //se quito la ô-Ô al dar problemas con el acento sólo
}

function completaStringSinMayus($cadena, $length) {
    $cadena = trim(htmlspecialchars_decode($cadena));
    $cadena = utf8_decode($cadena);
    if (strlen($cadena) > $length)
        $cadena = substr($cadena, 0, $length);

    $cadena = utf8_encode($cadena);
    while (strlen($cadena) < $length) {
        $cadena = $cadena . " ";
    }
    $cadena = str_replace('\'', "''", $cadena);
    $cadena = strtr($cadena, array("ß" => "SS"));
    $cadena = str_replace('ô', "Ô", $cadena);
    return $cadena;
}

function uCWordsPatch($cadena) {
    $cadenaStart = substr($cadena, 0, 2);
    $cadenaStart = strtolower(toUpper($cadenaStart));
    $cadenaEnd = substr($cadena, 2);
    $cadena = $cadenaStart . $cadenaEnd;

    $cadena = str_replace(' à', " À", $cadena);
    $cadena = str_replace(' á', " Á", $cadena);
    $cadena = str_replace(' â', " Â", $cadena);
    $cadena = str_replace(' ã', " Ã", $cadena);
    $cadena = str_replace(' ä', " Ä", $cadena);
    $cadena = str_replace(' å', " Å", $cadena);
    $cadena = str_replace(' æ', " Æ", $cadena);
    $cadena = str_replace(' ç', " Ç", $cadena);
    $cadena = str_replace(' è', " È", $cadena);
    $cadena = str_replace(' é', " É", $cadena);
    $cadena = str_replace(' ê', " Ê", $cadena);
    $cadena = str_replace(' ë', " Ë", $cadena);
    $cadena = str_replace(' ì', " Ì", $cadena);
    $cadena = str_replace(' í', " Í", $cadena);
    $cadena = str_replace(' î', " Î", $cadena);
    $cadena = str_replace(' ï', " Ï", $cadena);
    $cadena = str_replace(' ð', " Ð", $cadena);
    $cadena = str_replace(' ñ', " Ñ", $cadena);
    $cadena = str_replace(' ò', " Ò", $cadena);
    $cadena = str_replace(' ó', " Ó", $cadena);
    $cadena = str_replace(' õ', " Õ", $cadena);
    $cadena = str_replace(' ö', " Ö", $cadena);
    $cadena = str_replace(' ø', " Ø", $cadena);
    $cadena = str_replace(' ù', " Ù", $cadena);
    $cadena = str_replace(' ú', " Ú", $cadena);
    $cadena = str_replace(' û', " Û", $cadena);
    $cadena = str_replace(' ü', " Ü", $cadena);
    $cadena = str_replace(' ý', " Ý", $cadena);
    $cadena = ucwords($cadena);

    return $cadena;
    //echo strtoupper(strtr($cadena, "àáâãäåæçèéêëìíîïðñòóõöøùúûüý", "ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÕÖØÙÚÛÜÝ"));
}

function quitarPreposiciones($clave) {
    $replace = array("|a|", "|ante|", "|al|", "|ante|", "|antes|", "|asi|", "|aunque|", "|bajo|", "|bien|", "|cabe|", "|como|", "|con|", "|contra|", "|cuando|", "|de|", "|del|", "|desde|", "|despues|", "|durante|", "|e|", "|el|", "|empero|", "|en|", "|entre|", "|esta|", "|hacia|", "|hasta|", "|la|", "|las|", "|los|", "|luego|", "|mas|", "|mediante|", "|muy|", "|ni|", "|o|", "|ora|", "|para|", "|pero|", "|por|", "|porque|", "|pues|", "|que|", "|se|", "|sea|", "|segun|", "|si|", "|sin|", "|sino|", "|siquiera|", "|sobre|", "|tal|", "|toda|", "|tras|", "|u|", "|un|", "|una|", "|uno|", "|unos|", "|y|", "|ya|");
    //$replace = array(" a "," ante ", " al ", " ante ", " antes ", " asi ", " aunque ", " bajo ", " bien "," cabe "," como "," con "," contra "," cuando "," de "," del ", " desde ", " despues ", " durante ", " e ", " el ", " empero ", " en ", " entre ", " esta ", " hacia ", " hasta ", " la ", " las ", " los ", " luego ", " mas ", " mediante ", " muy ", " ni ", " o ", " ora ", " para ", " pero ", " por ", " porque ", " pues ", " que ", " se ", " sea ", " segun ", " si ", " sin ", " sino ", " siquiera ", " sobre ", " tal ", " toda ", " tras ", " u ", " un ", " una ", " uno ", " unos ", " y ", " ya ");
    $by = "|";

    $clave2 = "|" . $clave . "|";

    $clave2 = trim(str_replace($replace, $by, strtolower($clave2)));
    $clave2 = substr($clave2, 1);
    $clave2 = substr($clave2, 0, strlen($clave2) - 1);
    $clave3 = str_replace("|", " ", $clave2);
    if (trim($clave3) == "")
        return $clave;
    else
        return $clave2;
}

// * ****************************************************************************************************
// *         FUNCION QUE DEVUELVE LA HR DEL SERVIDOR ORACLE 24
// * parametros: -
// * devuelve: regresa la 'hora24' ej. 1545
// * **************************************************************************************************** 
function ExtraeHora() {
    if (class_exists('ConexionBDO')) {
        unset($ConexionBD);
        $ConexionBD = new ConexionBDO();
    }

    $fecha = "";
    $query_sql = " SELECT to_char(SYSDATE,'HH24MI') AS HORA FROM DUAL ";
    if (isset($ConexionBD)) {
        $resultado = $ConexionBD->query_bd($query_sql);
        if ($row = oci_fetch_assoc($resultado)) {
            $hora = $row["HORA"];
            return $hora;
        }
    } else {
        try {
            $resultado = query_bd($query_sql);
            if ($row = oci_fetch_assoc($resultado)) {
                $hora = $row["HORA"];
                return $hora;
            }
        } catch (Exception $e) {
            $hora2 = ExtraeHoraServidorPHP();
        }
    }
}

// * ****************************************************************************************************
// *         FUNCION QUE DEVUELVE LA HR DEL SERVIDOR ORACLE 24
// * parametros: -
// * devuelve: regresa la 'hora24' ej. 15:45
// * **************************************************************************************************** 
function ExtraeHoraFormato() {
    if (class_exists('ConexionBDO')) {
        unset($ConexionBD);
        $ConexionBD = new ConexionBDO();
    }

    $fecha = "";
    $query_sql = " SELECT to_char(SYSDATE,'HH24:MI') AS HORA FROM DUAL ";
    if (isset($ConexionBD)) {
        $resultado = $ConexionBD->query_bd($query_sql);
        if ($row = oci_fetch_assoc($resultado)) {
            $hora = $row["HORA"];
            return $hora;
        }
    } else {
        try {
            $resultado = query_bd($query_sql);
            if ($row = oci_fetch_assoc($resultado)) {
                $hora = $row["HORA"];
                return $hora;
            }
        } catch (Exception $e) {
            $hora2 = ExtraeHoraServidorPHP();
        }
    }
}

// * ****************************************************************************************************
// *         FUNCION QUE DEVUELVE LA HR DEL SERVIDOR ORACLE 12
// * parametros: -
// * devuelve: regresa la 'hora12' ej. 345
// * **************************************************************************************************** 
function ExtraeHora12() {
    if (class_exists('ConexionBDO')) {
        unset($ConexionBD);
        $ConexionBD = new ConexionBDO();
    }

    $fecha = "";
    $query_sql = " SELECT to_char(SYSDATE,'HHMI') AS HORA FROM DUAL ";
    if (isset($ConexionBD)) {
        $resultado = $ConexionBD->query_bd($query_sql);
        if ($row = oci_fetch_assoc($resultado)) {
            $hora = $row["HORA"];
            return $hora;
        }
    } else {
        try {
            $resultado = query_bd($query_sql);
            if ($row = oci_fetch_assoc($resultado)) {
                $hora = $row["HORA"];
                return $hora;
            }
        } catch (Exception $e) {
            $hora2 = ExtraeHoraServidorPHP();
        }
    }
}

function ExtraeHoraServidorPHP() {
    $date = getdate();
    $hora = $date['hours'] . $date['minutes'];
    return $hora;
}

// * ****************************************************************************************************
// *         FUNCION QUE DEVUELVE LA FECHA DEL SERVIDOR ORACLE
// * parametros: -
// * devuelve: regresa la 'fecha Actual' yyyymmdd
// * **************************************************************************************************** 
function ExtraeFecha() {
    if (class_exists('ConexionBDO')) {
        unset($ConexionBD);
        $ConexionBD = new ConexionBDO();
    }

    $fecha = "";
    $query_sql = " SELECT to_char(SYSDATE,'YYYYMMDD') AS FECHA FROM DUAL ";
    if (isset($ConexionBD)) {
        $resultado = $ConexionBD->query_bd($query_sql);
        if ($row = oci_fetch_assoc($resultado)) {
            $fecha = $row["FECHA"];
            return $fecha;
        }
    } else {
        try {
            $resultado = query_bd($query_sql);
            if ($row = oci_fetch_assoc($resultado)) {
                $fecha = $row["FECHA"];
                return $fecha;
            }
        } catch (Exception $e) {
            $fecha2 = ExtraeFechaServidorPHP();
        }
    }
}

function ExtraeFechaServidorPHP() {
    $date = getdate();
    $dia = $date['mday'];
    $mes = $date['mon'];
    $anio = $date['year'];

    if ($mes <= 9)
        $mes = '0' . $mes;
    else
        $mes = $mes;
    if ($dia <= 9)
        $dia = '0' . $dia;
    else
        $dia = $dia;

    $fecha2 = $anio . $mes . $dia;
    return '22221188';
    return $fecha2;
}

// * ****************************************************************************************************
// *         FUNCION QUE QUITA DÍAS A UNA FECHA
// * parametros: $fecha -> dd/mm/yyyy
// *             $dias -> numero de días a quitar
// * devuelve: regresa la 'fecha' dd/mm/yyyy
// * **************************************************************************************************** 
function quitarDias($fecha, $dias) {
    $fecha = fechaInsertaBD($fecha);
    $fecha = date("Ymd", strtotime("$fecha -$dias day"));
    fechaCajaAdmin($fecha);
    return $fecha;
}

// * ************************************************************************************
// *                  FUNCION QUE DA FORMATO A LA FECHA (dd/mm/aaaa)
// * parametros: $fecha -> fecha a formatear (20071212) aaaammdd
// * devuelve: regresa la fecha formateada como dd/mm/aaaa
// * ************************************************************************************ 

function fechaCajaAdmin($fecha) {
    $anio = substr($fecha, 0, 4);
    $mes = substr($fecha, 4, 2);
    $dia = substr($fecha, 6, 2);

    $fecha_formato = "$dia/$mes/$anio";
    return $fecha_formato;
    // fin de la funcion
}

// * ************************************************************************************
// *                      FUNCION QUE DA FORMATO A LA FECHA (dd/nom mes/aaa)
// * parametros: $fecha -> fecha a formatear (20071212) aaaammdd
// * devuelve: regresa la fecha formateada como dd/nom mes/aaaa
// * ************************************************************************************ 

function impFecha($fecha) {
    // verificamos que la fecha no venga vacia
    if (!empty($fecha)) {
        $anio = substr($fecha, 0, 4);
        $mes = substr($fecha, 4, 2);
        $dia = substr($fecha, 6, 2);

        $NomMes = array(1 => "Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic");
        if (substr($mes, 0, 1) == '0')
            $mes = substr($mes, 1, 1);

        $fecha_completa = "$dia/$NomMes[$mes]/$anio";
    }

    else
        $fecha_completa = "sin fecha";
    return $fecha_completa;
    // fin de la funcion
}

// * ************************************************************************************
// *          FUNCION QUE DA FORMATO A LA FECHA PARA INSERTARLA EN LA BASE DE DATOS
// * parametros: $fecha -> fecha a formatear (03/12/2007) dd/mm/aaaa
// * devuelve: regresa la fecha formateada como aaaammdd
// * ************************************************************************************ 

function fechaInsertaBD($fecha) {
    $dia = substr($fecha, 0, 2);
    $mes = substr($fecha, 3, 2);
    $anio = substr($fecha, 6, 4);

    $fecha_bd = $anio . $mes . $dia;
    return $fecha_bd;
    // fin de la funcion
}

function toLower($cadena) {
    $cadena = str_replace("Ô", 'ô', $cadena);
    $cadena = strtolower(strtr($cadena, "ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÕÖØÙÚÛÜÝ", "àáâãäåæçèéêëìíîïðñòóõöøùúûüý"));
    return $cadena;
}

function toUpper($cadena) {
    $cadena = str_replace('ô', "Ô", $cadena);
    $cadena = strtoupper(strtr($cadena, "àáâãäåæçèéêëìíîïðñòóõöøùúûüý", "ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÕÖØÙÚÛÜÝ"));
    return $cadena;
}

function quitarAcentosBusqueda($cadena) {
    $cadena = trim(htmlspecialchars_decode($cadena));
    $cadena = utf8_decode($cadena);
	$replace = array("à", "á", "â", "ã", "ä", "å", "æ", "ç", "è", "é", "ê", "ë", "ì", "í", "î", "ï", "ð", "ñ", "ò", "ó", "õ", "ô", "ö", "ø", "ù", "ú", "û", "ü", "ý", "À", "Á", "Â", "Ã", "Ä", "Å", "Æ", "Ç", "È", "É", "Ê", "Ë", "Ì", "Í", "Î", "Ï", "Ð", "Ñ", "Ò", "Ó", "Õ", "Ô", "Ö", "Ø", "Ù", "Ú", "Û", "Ü", "Ý", "ÿ");
    $by = "_";
    $cadena = str_replace($replace, $by, $cadena);
	//echo $cadena;
    return $cadena;
}

function quitarUTF8($str) {
    $str = utf8_decode($str);
    return $str;
}

function redondear($numero, $decimales=2) {
    $factor = pow(10, $decimales);
    $float_redondeado = round($numero * $factor) / $factor;
    $float_redondeado = number_format($float_redondeado, $decimales, '.', ',');
    return $float_redondeado;
}

//------------------------------------------------------
function obtenerFechaMinNovedad() {
    if (class_exists('ConexionBDO')) {
        unset($ConexionBD);
        $ConexionBD = new ConexionBDO();
    }

    $fecha = "";
    $diasNovedad = 60;
    $query_sql = " SELECT FP09_DIAS_NOVEDAD FROM ALMACEN.FP09 ";
    if (isset($ConexionBD)) {
        $resultado = $ConexionBD->query_bd($query_sql);
        if ($row = oci_fetch_assoc($resultado)) {
            $diasNovedad = $row["FP09_DIAS_NOVEDAD"];
        }
    } else {
        $resultado = query_bd($query_sql);
        if ($row = oci_fetch_assoc($resultado)) {
            $diasNovedad = $row["FP09_DIAS_NOVEDAD"];
        }
    }

    $fechaActual = ExtraeFecha();
    $fechaActual = FechaCajaAdmin($fechaActual);
    $fechaActual = quitarDias($fechaActual, $diasNovedad);

    return $fechaActual;
}

//------------------------------------------------------
function mail2($correo, $asunto, $mensaje, $header) {

    //------------------------Obtiene valores de la consulta sobre el usuario de correo-----
    $query_sql = " SELECT * FROM   ALMACEN.AL11                
					WHERE  AL11_CIA = '1' ";

    $resultado = query_bd($query_sql);
    if (!$resultado) {
        echo 'Problema al obtener valores de la AL11. (mail2())';
        return false;
    }
    $values = oci_fetch_assoc($resultado);
    $host = trim($values['AL11_SERVIDOR_CORREO']);
    $port = trim($values['AL11_PUERTO_CORREO_AUTH']);
	//$port = trim($values['AL11_PUERTO_CORREO_PUB']);
    $userID = trim($values['AL11_USUARIO_CORREO_PUB']);
    $status_pub = $values['AL11_STATUS_PUB'];
    $username = trim($values['AL11_MAIL_CORREO_PUB']);
    $password = trim($values['AL11_PASSWORD_CORREO_PUB']);

    // echo $host.$port.$usuario_correo.*/$username."-".$password/*$correo.$asunto.$mensaje.$header;
    //------------------------------------------------------------------------------------------
	if($status_pub == 0)
		return false;
		
	//return mail($correo, $asunto, $mensaje, $header);
	
	//con autentificacion	
    
	try {
        $mail = new PHPMailer(true); //New instance, with exceptions enabled

        $mail->IsSMTP();                           // tell the class to use SMTP
        $mail->SMTPAuth = true;//false; //true;                  // enable SMTP authentication
        $mail->Port =  $port;//465;//   $port;                 // set the SMTP server port
        $mail->Host = $host; //"mail.unixhelp.com.mx"; // SMTP server
        $mail->Username = $username; //"peterpedro@unixhelp.com.mx";     // SMTP server username
        $mail->Password = $password; //"ZeN564un1x";            // SMTP server password
        //$mail->IsSendmail();  // tell the class to use Sendmail
        //$mail->AddReplyTo("name@domain.com","First Last");
        $mail->From = "" . $username; //" peterpedro@unixhelp.com.mx";
		$mail->CharSet = 'UTF-8';
        $mail->FromName = "Publicaciones de El Colegio de México";//utf8_decode("El Colegio de México, A.C."); //" peterpedro";

        $mail->AddAddress($correo);
        $mail->Subject = $asunto;
        $mail->AltBody = "Para ver el mensaje, por favor usar un lector compatible de correos electrónicos en HTML."; // optional, comment out and test	
        //$mail->AddCustomHeader($header);
        //$mail->WordWrap   = 80; // set word wrap
        //$mail->MsgHTML($body);
        //$mail->IsHTML(true); // send as HTML
        $body = $mensaje;
        //$body = file_get_contents('contents.html');
        //$body = preg_replace('/\\\\/', '', $body); //Strip backslashes
        $mail->Body = $body;

        $mail->Send();
        return true;
        //echo 'enviado';
    } catch (phpmailerException $e) {
        echo $e->errorMessage();
        return false;
    }
}

function Docto($numero, $maxLength, $direccion, $char) {
    $numero = trim($numero);
    switch ($direccion) {
        case 'left': $numero = StringOfChar($char, $maxLength - strlen($numero)) . $numero;
        case 'right': $numero = $numero . StringOfChar($char, $maxLength - strlen($numero));
        default: $numero = StringOfChar($char, $maxLength - strlen($numero)) . $numero;
    }
    return $numero;
}

function StringOfChar($char, $veces) {
    $cadena = "";
    for ($i = 0; $i < $veces; $i++) {
        $cadena.=$char;
    }
    return $cadena;
}

//---------------------------------------- ESTA FUNCIO DEVUELVE EL VALOR DE LA CONSNTANTE PORCENTAJE WEB
function descuentoWeb() {
    $query_sql = "SELECT FP09_DESC_WEB FROM ALMACEN.FP09";
    $resultado = query_bd($query_sql);

    if ($resultado === false) { //EXCEPCION
        echo $bandError = 1;
        ocilogoff($conexion);
        return;
    }
    $values = oci_fetch_assoc($resultado);
    $descuento = trim($values["FP09_DESC_WEB"]);
    return $descuento;
}

/* //---------------------------------------- OBTENEMOS EL PAIS DE FCATURACION DE UN CLIENTE
  function paisFacturacion($cve) {
  if (class_exists('ConexionBDO')) {
  unset($ConexionBD);
  $ConexionBD = new ConexionBDO();
  }

  $data = array();
  $query_sql = "SELECT CP01_PAIS,CP01_TASA_IVA,CP01_ESTADO FROM ALMACEN.CP01 WHERE CP01_CLAVE='$cve'";
  $resultado = query_bd($query_sql);

  if ($resultado === false) { //EXCEPCION
  echo $bandError = 1;
  ocilogoff($conexion);
  return;
  }
  $values = $ConexionBD->array_db($query_sql);
  $data[0] = trim($values["CP01_PAIS"]);
  $data[1] = trim($values["CP01_TASA_IVA"]);
  $data[2] = trim($values["CP01_ESTADO"]);
  return $data;
  }
 */

//---------------------------------------- ESTA FUNCIO DEVUELVE EL VALOR DE LA CONSNTANTE PORCENTAJE WEB
function gastosEnvio() {
    $query_sql = "SELECT FP09_CVE_GASTOS_ENV FROM ALMACEN.FP09";
    $resultado = query_bd($query_sql);

    if ($resultado === false) { //EXCEPCION
        echo $bandError = 1;
        ocilogoff($conexion);
        return;
    }
    $values = oci_fetch_assoc($resultado);
    $descuento = trim($values["FP09_CVE_GASTOS_ENV"]);
    return $descuento;
}

//---------------------------------------- ESTA FUNCION DEVUELVE EL EMAIL EN BASE DE LA CLAVE
function obtenEmail($user) {
    $query_sql = " SELECT CP01_CORREO_CONT FROM ALMACEN.CP01 WHERE CP01_CLAVE='$user'";
    $resultado = query_bd($query_sql);

    if ($resultado === false) { //EXCEPCION
        echo $bandError = 1;
        ocilogoff($conexion);
        return;
    }
    $values = oci_fetch_assoc($resultado);
    $email = trim($values["CP01_CORREO_CONT"]);
    return $email;
}

//---------------------------------------- ESTA FUNCIO DEVUELVE EL PRECIO DE ENVIO
/*
  function obtener_gastos_envio($peso, $mensajeria, $zona) {
  if (class_exists('ConexionBDO')) {
  unset($ConexionBD);
  $ConexionBD = new ConexionBDO();
  }
  $envio = 0;
  //$num_productos_dif_tot = 0;

  $query_sql = " SELECT CP09_PRECIO FROM ALMACEN.CP09
  WHERE CP09_LIM_SUP_GR > '$peso'
  AND CP09_CVE_MENSAJERIA = '$mensajeria'
  AND CP09_CVE_ZONA = '$zona'
  ORDER BY CP09_LIM_SUP_GR ";
  //echo $query_sql;
  $values = $ConexionBD->array_db($query_sql);
  $envio = $values['CP09_PRECIO'];

  return $envio;
  }
 */
//---------------------------------------- ESTA FUNCIO DEVUELVE EL PRECIO DE ENVIO
function obtenIvaGastosEnv() {
    if (class_exists('ConexionBDO')) {
        unset($ConexionBD);
        $ConexionBD = new ConexionBDO();
    }

    $envio = 0;
    //$num_productos_dif_tot = 0;
    $query_sql = "SELECT AP04_TASA_IVA, AP04_EXENTO FROM ALMACEN.AP02, ALMACEN.AP01, ALMACEN.AP04, ALMACEN.FP09 
								WHERE AP02_CLAVE=FP09_CVE_GASTOS_ENV
								AND AP01_CLAVE=AP02_FAM 
								AND AP01_GRUPO=AP04_GRUPO";
    //echo $query_sql;
    $values = $ConexionBD->array_db($query_sql);
    return $values;
}

//---------------------------------------- ESTA FUNCIO DEVUELVE EL PRECIO DE ENVIO
function obtener_moneda_envio($peso, $mensajeria, $zona) {
    if (class_exists('ConexionBDO')) {
        unset($ConexionBD);
        $ConexionBD = new ConexionBDO();
    }
    $envio = 0;
    //$num_productos_dif_tot = 0;

    $query_sql = " SELECT CP08_MONEDA  FROM ALMACEN.CP09, ALMACEN.CP08 
								WHERE CP09_LIM_SUP_GR > '$peso'
								AND CP09_CVE_MENSAJERIA = '$mensajeria'
								AND CP08_CVE_MENSAJERIA = CP09_CVE_MENSAJERIA 
								AND CP08_CVE_ZONA= CP09_CVE_MENSAJERIA 
								AND CP09_CVE_ZONA = '$zona'
								ORDER BY CP09_LIM_SUP_GR ";
    //echo $query_sql;
    $values = $ConexionBD->array_db($query_sql);
    $moneda = $values['CP08_MONEDA'];

    return $moneda;
}

//---------------------------------------- ESTA FUNCIO DEVUELVE EL EL TIPO DE CAMBIO
/* function obtenTipoCambio() { se cambia por obtenerTipoCambio()
  if(class_exists('ConexionBDO')){
  unset($ConexionBD);
  $ConexionBD = new ConexionBDO();
  }
  $date= date('Ymd');
  $envio = 0;
  //$num_productos_dif_tot = 0;

  $query_sql = " SELECT FP08_TIPO_CAMBIO FROM ALMACEN.FP08 WHERE FP08_FECHA <='$date' ";
  //echo $query_sql;
  $values = $ConexionBD->array_db($query_sql);
  $cambio = $values['FP08_TIPO_CAMBIO'];

  return $cambio;
  } */

//---------------------------------------- OBTINE LA CLAVE DE ZONA INSERTATANDO PAIS Y ESTADO "DEBEN SER NUMERICOS"
function claveZona($mensajeria, $pais, $estado) {
    if (class_exists('ConexionBDO')) {
        unset($ConexionBD);
        $ConexionBD = new ConexionBDO();
    }

    $zona = "";
    $query_sql_zona = " SELECT CP19A_CVE_ZONA FROM ALMACEN.CP19A
							WHERE CP19A_ESTADO='$estado'
							AND CP19A_PAIS='$pais'
							AND CP19A_CVE_MENSAJERIA='$mensajeria' ";
    //echo $query_sql_zona;
    if (isset($ConexionBD)) {
        $values_zona = $ConexionBD->array_db($query_sql_zona);
    } else {
        $values_zona = oci_fetch_assoc(query_bd($query_sql_zona));
    }
    $zona = trim($values_zona['CP19A_CVE_ZONA']);

    if ($zona == "") {
        $query_sql_zona = " SELECT CP12A_CVE_ZONA FROM ALMACEN.CP12A
							WHERE CP12A_PAIS='$pais'
							AND CP12A_CVE_MENSAJERIA='$mensajeria' ";
        //echo $query_sql_zona;
        if (isset($ConexionBD)) {
            $values_zona = $ConexionBD->array_db($query_sql_zona);
        } else {
            $values_zona = oci_fetch_assoc(query_bd($query_sql_zona));
        }
        $zona = trim($values_zona['CP12A_CVE_ZONA']);
    }

    return $zona;
}

function obtenerClaveGastosEnv() {
    if (class_exists('ConexionBDO')) {
        unset($ConexionBD);
        $ConexionBD = new ConexionBDO();
    }

    $query_sql = " SELECT FP09_CVE_GASTOS_ENV FROM ALMACEN.FP09 ";
    if (isset($ConexionBD)) {
        $resultado = $ConexionBD->query_bd($query_sql);
        $row = oci_fetch_assoc($resultado);
        $cve_gastos_env = $row["FP09_CVE_GASTOS_ENV"];
    } else {
        $resultado = query_bd($query_sql);
        $row = oci_fetch_assoc($resultado);
        $cve_gastos_env = $row["FP09_CVE_GASTOS_ENV"];
    }
    return $cve_gastos_env;
}

function obtenerTipoCambio() {
    if (class_exists('ConexionBDO')) {
        unset($ConexionBD);
        $ConexionBD = new ConexionBDO();
    }

    $query_sql = " SELECT FP08_TIPO_CAMBIO FROM ALMACEN.FP08 WHERE FP08_FECHA=(SELECT MAX(FP08_FECHA) FROM ALMACEN.FP08) AND FP08_HORA=(SELECT MAX(FP08_HORA) FROM ALMACEN.FP08 WHERE FP08_FECHA=(SELECT MAX(FP08_FECHA) FROM ALMACEN.FP08))  ";
    if (isset($ConexionBD)) {
        $resultado = $ConexionBD->query_bd($query_sql);
        $row = oci_fetch_assoc($resultado);
        $tipo_cambio = $row["FP08_TIPO_CAMBIO"];
    } else {
        $resultado = query_bd($query_sql);
        $row = oci_fetch_assoc($resultado);
        $tipo_cambio = $row["FP08_TIPO_CAMBIO"];
    }
	
	if($tipo_cambio=="") {
		$query_sql = " SELECT TE06_TIPO_CAMBIO FROM ALMACEN.TE06 WHERE TE06_MONEDA = 'D'  ";
    	if (isset($ConexionBD)) {
    	    $resultado = $ConexionBD->query_bd($query_sql);
    	    $row = oci_fetch_assoc($resultado);
    	    $tipo_cambio = $row["TE06_TIPO_CAMBIO"];
    	} else {
    	    $resultado = query_bd($query_sql);
   		    $row = oci_fetch_assoc($resultado);
        	$tipo_cambio = $row["TE06_TIPO_CAMBIO"];
    	}
	}

    return $tipo_cambio;
}

function convertirADolares($dinero) {
    $tipo_cambio = obtenerTipoCambio();
    if ($tipo_cambio != 0)
        $dinero = $dinero / $tipo_cambio;

    return $dinero;
}

function convertirAPesos($dinero) {
    $tipo_cambio = obtenerTipoCambio();
    if ($tipo_cambio != 0)
        $dinero = $dinero * $tipo_cambio;

    return $dinero;
}

function obtenerAPT($cve_mat) {
    if (class_exists('ConexionBDO')) {
        unset($ConexionBD);
        $ConexionBD = new ConexionBDO();
    }

    $query_sql = " SELECT AP04_APT FROM ALMACEN.AP04, ALMACEN.AP01, ALMACEN.AP02 
					WHERE AP02_CLAVE='$cve_mat'   
					AND AP02_FAM=AP01_CLAVE
					AND AP04_GRUPO=AP01_GRUPO ";
    if (isset($ConexionBD)) {
        $resultado = $ConexionBD->query_bd($query_sql);
        $row = oci_fetch_assoc($resultado);
        $apt = $row["AP04_APT"];
    } else {
        $resultado = query_bd($query_sql);
        $row = oci_fetch_assoc($resultado);
        $apt = $row["AP04_APT"];
    }

    return $apt;
}

function almacenWeb() {
    if (class_exists('ConexionBDO')) {
        unset($ConexionBD);
        $ConexionBD = new ConexionBDO();
    }

    $query_sql = " SELECT AP14_ALMACEN_WEB FROM ALMACEN.AP14
					WHERE AP14_CIA='1' ";
    if (isset($ConexionBD)) {
        $resultado = $ConexionBD->query_bd($query_sql);
        $row = oci_fetch_assoc($resultado);
        $almacenWeb = $row["AP14_ALMACEN_WEB"];
    } else {
        $resultado = query_bd($query_sql);
        $row = oci_fetch_assoc($resultado);
        $almacenWeb = $row["AP14_ALMACEN_WEB"];
    }

    return $almacenWeb;
}

function buscarExistencia($cve_mat) {
    if (class_exists('ConexionBDO')) {
        unset($ConexionBD);
        $ConexionBD = new ConexionBDO();
    }

    $existencia = 0;
    if (obtenerAPT($cve_mat)) {
        $almacenWeb = almacenWeb();
        $query_sql = " SELECT AP03_EXI_VEN FROM ALMACEN.AP03 
							WHERE AP03_CVE_MAT='$cve_mat'
							AND AP03_CIA='1'
							AND AP03_ALMACEN='$almacenWeb' ";
        if (isset($ConexionBD)) {
            $resultado = $ConexionBD->query_bd($query_sql);
            $row = oci_fetch_assoc($resultado);
            $existencia = $row["AP03_EXI_VEN"];
        } else {
            $resultado = query_bd($query_sql);
            $row = oci_fetch_assoc($resultado);
            $existencia = $row["AP03_EXI_VEN"];
        }

        $query_sql = " SELECT FP09_EXI_MIN_WEB FROM ALMACEN.FP09 
							WHERE FP09_CIA='1' ";
        if (isset($ConexionBD)) {
            $resultado = $ConexionBD->query_bd($query_sql);
            $row = oci_fetch_assoc($resultado);
            $existencia = $existencia - $row["FP09_EXI_MIN_WEB"];
        } else {
            $resultado = query_bd($query_sql);
            $row = oci_fetch_assoc($resultado);
            $existencia = $existencia - $row["FP09_EXI_MIN_WEB"];
        }

        return $existencia;
    } else {
        return "infinito";
    }
}

function quitarExistencia($cve_mat, $cantidad) {
    if (class_exists('ConexionBDO')) {
        unset($ConexionBD);
        $ConexionBD = new ConexionBDO();
    }

    $existencia = 0;
    if (obtenerAPT($cve_mat)) {
        $almacenWeb = almacenWeb();
        $query_sql = " SELECT AP03_EXI_VEN FROM ALMACEN.AP03 
							WHERE AP03_CVE_MAT='$cve_mat'
							AND AP03_CIA='1'
							AND AP03_ALMACEN='$almacenWeb' ";
        if (isset($ConexionBD)) {
            $resultado = $ConexionBD->query_bd($query_sql);
            $row = oci_fetch_assoc($resultado);
            $existencia = $row["AP03_EXI_VEN"];
        } else {
            $resultado = query_bd($query_sql);
            $row = oci_fetch_assoc($resultado);
            $existencia = $row["AP03_EXI_VEN"];
        }

        $query_sql = " SELECT FP09_EXI_MIN_WEB FROM ALMACEN.FP09 
							WHERE FP09_CIA='1' ";
        if (isset($ConexionBD)) {
            $resultado = $ConexionBD->query_bd($query_sql);
            $row = oci_fetch_assoc($resultado);
            $existencia = $existencia - $row["FP09_EXI_MIN_WEB"];
        } else {
            $resultado = query_bd($query_sql);
            $row = oci_fetch_assoc($resultado);
            $existencia = $existencia - $row["FP09_EXI_MIN_WEB"];
        }

        return $existencia;
    } else {
        return "infinito";
    }
}

//---------------------------------------- OBTENEMOS EL CORREO DEL ADMINISTRADOR  
function obtenerEmailAdmin() {
    $query_sql = "SELECT FP09_CORREO_ADMIN_PUB FROM ALMACEN.FP09";
    $resultado = query_bd($query_sql);

    $values = oci_fetch_assoc($resultado);
    $correo = trim($values["FP09_CORREO_ADMIN_PUB"]);
    return $correo;
}

//---------------------------------------- OBTENEMOS EL CORREO DEL ADMINISTRADOR  
function obtenerEmailPub() {
    $query_sql = "SELECT FP09_CORREO_PUB FROM ALMACEN.FP09";
    $resultado = query_bd($query_sql);

    $values = oci_fetch_assoc($resultado);
    $correo = trim($values["FP09_CORREO_PUB"]);
    return $correo;
}

//----------------------
//---------------------------------------------------------------------------
function validarRFC($rfc) {
    $rfc = trim($rfc);

    switch (strlen($rfc)) {
        case 12:
            $primergpo = substr($rfc, 0, 3);
            $gponum = substr($rfc, 3, 6);
            $tercergpo = substr($rfc, -3);
            $val = 3;
            break;
        case 13:
            $primergpo = substr($rfc, 0, 4);
            $gponum = substr($rfc, 4, 6);
            $tercergpo = substr($rfc, -3);
            $val = 4;
            break;
        default:
            return false;
            break;
    }
	
    for($cont = 0;$cont < $val;$cont++) {
        $temp = substr($primergpo,$cont,1);
        if (is_numeric($temp)) {
            return false;
        }
    }
    return true;
}

//---------------------------------------------------------------------------
function obtenerDescripcionAP02($cve_mat){
	if (class_exists('ConexionBDO')) {
        unset($ConexionBD);
        $ConexionBD = new ConexionBDO();
    }

    $query_sql = " SELECT AP02_DESC FROM ALMACEN.AP02
					WHERE AP02_CIA = '1'
					AND AP02_CLAVE = '$cve_mat' ";
    if (isset($ConexionBD)) {
        $resultado = $ConexionBD->query_bd($query_sql);
        $row = oci_fetch_assoc($resultado);
		if(trim($row["AP02_DESC"]) != "")
        	return $row["AP02_DESC"];
    } else {
        $resultado = query_bd($query_sql);
        $row = oci_fetch_assoc($resultado);
		if(trim($row["AP02_DESC"]) != "")
        	return $row["AP02_DESC"];
    }

    return "NO ENCONTRADO";
}
//---------------------------------------------------------------------------
?>
