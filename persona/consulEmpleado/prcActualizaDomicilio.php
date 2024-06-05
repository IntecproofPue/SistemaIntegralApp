<?php

ini_set('display_errors',1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once ('../../includes/load.php');

session_start();



$iIdConstanteEstado = $_POST['iIdConstanteEstado'] ?? 0;
$iClaveEstado = $_POST['iClaveEstado'] ?? 0;
$vchMunicipio = $_POST['vchMunicipio'] ?? '';
$vchLocalidad = $_POST['vchLocalidad'] ?? '';
$codigoPostal = $_POST['codigoPostal'] ?? 0;
$vchColonia = $_POST['vchColonia'] ?? '';
$vchCalle = $_POST['vchCalle'] ?? '';
$vchLetra = $_POST['vchLetra'] ?? '';
$vchNoExt = $_POST['vchNoExt'] ?? '';
$vchNoInt = $_POST['vchNoInt'] ?? '';
$iIdPersona = $_POST['persona'] ?? 0;
$opcion = $_POST['opcion'] ?? 0;
$proceso = $_POST['proceso'] ?? 0;
$iIdPersonaDomicilio = $_POST['domicilio'] ?? 0;
$iNoOperacion = $_POST['operacion'] ?? 0;



$datosActualizacionDomicilio = array (
    'iIdPersona' => $iIdPersona,
    'iIdDomicilio' => $iIdPersonaDomicilio,
    'vchCalle' => $vchCalle,
    'vchNumeroExterior' => $vchNoExt,
    'vchNumeroInterior' => $vchNoInt,
    'vchLetra' => $vchLetra,
    'iCodigoPostal' => $codigoPostal,
    'vchColonia' => $vchColonia,
    'vchLocalidad' =>  $vchLocalidad,
    'vchMunicipio' => $vchMunicipio,
    'iIdEntidadFederativa' => $iIdConstanteEstado,
    'iCveEntidad' => $iClaveEstado,
    'iAgrupadorEntidad' => 4,
    'iIdUsuarioUltModificacion' => $_SESSION['user_id'],
    'iOpcion' => $opcion,
    'iProceso' => $proceso,
    'vchObservaciones' => '',
    'iNoOperacion' => $iNoOperacion,
    'bResultado' => 0,
    'vchCampoError' => '',
    'vchMensaje' => ''
);

$procedureName = "EXEC prcActualizaDomicilio	
                                                @iIdPersona					= ? ,
                                                @iIdDomicilio				= ? ,
                                                @vchCalle					= ? ,
                                                @vchNumeroExterior			= ? ,
                                                @vchNumeroInterior			= ? ,
                                                @vchLetra					= ? ,
                                                @iCodigoPostal				= ? ,
                                                @vchColonia					= ? ,
                                                @vchLocalidad				= ? ,
                                                @vchMunicipio				= ? ,
                                                @iIdEntidadFederativa		= ? ,
                                                @iCveEntidad				= ? ,
                                                @iAgruEntidad				= ? ,
                                                @iIdUsuarioUltModificacion	= ? ,
                                                @iOpcion					= ? ,
                                                @iProceso					= ? ,
                                                @vchObservaciones			= ? ,
                                                @iNoOperacion				= ? ,
                                                @bResultado					= ? ,
                                                @vchCampoError				= ? ,
                                                @vchMensaje					= ? ";


$params = array(
    $datosActualizacionDomicilio['iIdPersona'],
    $datosActualizacionDomicilio['iIdDomicilio'],
    $datosActualizacionDomicilio['vchCalle'],
    $datosActualizacionDomicilio['vchNumeroExterior'],
    $datosActualizacionDomicilio['vchNumeroInterior'],
    $datosActualizacionDomicilio['vchLetra'],
    $datosActualizacionDomicilio['iCodigoPostal'],
    $datosActualizacionDomicilio['vchColonia'],
    $datosActualizacionDomicilio['vchLocalidad'],
    $datosActualizacionDomicilio['vchMunicipio'],
    $datosActualizacionDomicilio['iIdEntidadFederativa'],
    $datosActualizacionDomicilio['iCveEntidad'],
    $datosActualizacionDomicilio['iAgrupadorEntidad'],
    $datosActualizacionDomicilio['iIdUsuarioUltModificacion'],
    $datosActualizacionDomicilio['iOpcion'],
    $datosActualizacionDomicilio['iProceso'],
    $datosActualizacionDomicilio['vchObservaciones'],
    array(&$datosActualizacionDomicilio['iNoOperacion'], SQLSRV_PARAM_INOUT),
    array(&$datosActualizacionDomicilio['bResultado'], SQLSRV_PARAM_OUT),
    array(&$datosActualizacionDomicilio['vchCampoError'], SQLSRV_PARAM_OUT),
    array(&$datosActualizacionDomicilio['vchMensaje'], SQLSRV_PARAM_OUT),
);

$result = sqlsrv_query($GLOBALS['conn'], $procedureName, $params);

if ($result === false){
    $errorInformacion = sqlsrv_errors();
    $respuesta = array(
        'error' => true,
        'sqlError' => $errorInformacion
    );
    echo json_encode($datosActualizacionDomicilio);
    exit;
}else {
    echo json_encode($datosActualizacionDomicilio);
}


sqlsrv_free_stmt($result);

sqlsrv_close($GLOBALS['conn']);

?>
