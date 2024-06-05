<?php

ini_set('display_errors',1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once ('../../includes/load.php');

session_start();

var_dump($_POST);

$iIdPersona = $_POST['persona'] ?? 0;
$iIdTipoContacto = $_POST['iIdConstanteContacto'] ?? 0;
$iClaveContacto = $_POST['iClaveContacto'] ?? 0;
$vchContacto = $_POST['contacto'] ?? '';
$iProceso = $_POST['proceso'] ?? 0;
$iNoOperacion = $_POST['operacion'] ?? 0;




$datosActualizacionContacto = array (
    'iIdPersona' => $iIdPersona,
    'iIdTipoContacto' => $iIdTipoContacto,
    'iAgrupadorContacto' => 8,
    'iClaveContacto' => $iClaveContacto,
    'vchContacto' => $vchContacto,
    'iIdUsuarioUltModificacion' => $_SESSION['user_id'],
    'vchObservaciones' => '',
    'iProceso' => $iProceso,
    'iNoOperacion' => $iNoOperacion,
    'iIdContacto' => 0,
    'bResultado' => 0,
    'vchCampoError' => '',
    'vchMensaje' => ''
);

$procedureName = "EXEC prcAltaContacto
                                        @iIdPersona						= ? ,
                                        @iIdTipoContacto				= ? ,
                                        @iAgruContacto					= ? ,
                                        @iCveContacto					= ? ,
                                        @vchContacto					= ? ,
                                        @iIdUsuarioUltModificacion		= ? ,
                                        @vchObservaciones				= ? ,
                                        @iProceso						= ? ,
                                        @iNoOperacion					= ? ,
                                        @iidContacto					= ? ,
                                        @bResultado						= ? ,
                                        @vchCampoError					= ? ,
                                        @vchMensaje						= ?  ";


$params = array(
    $datosActualizacionContacto['iIdPersona'],
    $datosActualizacionContacto['iIdTipoContacto'],
    $datosActualizacionContacto['iAgrupadorContacto'],
    $datosActualizacionContacto['iClaveContacto'],
    $datosActualizacionContacto['vchContacto'],
    $datosActualizacionContacto['iIdUsuarioUltModificacion'],
    $datosActualizacionContacto['vchObservaciones'],
    $datosActualizacionContacto['iProceso'],
    array(&$datosActualizacionContacto['iNoOperacion'], SQLSRV_PARAM_INOUT),
    array(&$datosActualizacionContacto['iIdContacto'], SQLSRV_PARAM_OUT),
    array(&$datosActualizacionContacto['bResultado'], SQLSRV_PARAM_OUT),
    array(&$datosActualizacionContacto['vchCampoError'], SQLSRV_PARAM_OUT),
    array(&$datosActualizacionContacto['vchMensaje'], SQLSRV_PARAM_OUT),
);

var_dump($params);

$result = sqlsrv_query($GLOBALS['conn'], $procedureName, $params);

if ($result === false){
    $errorInformacion = sqlsrv_errors();
    $respuesta = array(
        'error' => true,
        'sqlError' => $errorInformacion
    );
    echo json_encode($datosActualizacionContacto);
    exit;
}else {
    echo json_encode($datosActualizacionContacto);
}

var_dump($_POST);


sqlsrv_free_stmt($result);

sqlsrv_close($GLOBALS['conn']);

?>

