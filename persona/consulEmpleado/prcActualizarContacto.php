<?php
require_once('../../includes/load.php');

session_start();


$iIdContacto = $_POST['iIdContacto'] ?? 0;
$iIdPersona = $_POST['iIdPersona'] ?? 0;
$iOpcion = $_POST['opcion'] ?? 0;
$iProceso = $_POST['proceso'] ?? 0;
$iNoOperacion = $_POST['operacion'] ?? 0;


$datosBajaContacto = array(
    'iIdContacto' => $iIdContacto,
    'iIdPersona' => $iIdPersona,
    'iIdUsuarioUltModificacion' => $_SESSION['user_id'],
    'iOpcion' => $iOpcion,
    'iProceso' => $iProceso,
    'vchObservaciones' => '',
    'bResultado' => 0,
    'vchCampoError' => '',
    'vchMensaje' => '',
    'iNoOperacion' => $iNoOperacion,
);

$procedureName = "EXEC prcActualizaContacto     @iIdContacto			    = ?,
                                                    @iIdPersona					= ?,
                                                    @iIdUsuarioUltModificacion	= ?, 
                                                    @iOpcion					= ?, 
                                                    @iProceso					= ?, 
                                                    @vchObservaciones			= ?,
                                                    @bResultado					= ?,
                                                    @vchCampoError  			= ?, 
                                                    @vchMensaje					= ? , 
                                                    @iNoOperacion				= ?
                          ";


$params = array(
    $datosBajaContacto['iIdContacto'],
    $datosBajaContacto['iIdPersona'],
    $datosBajaContacto['iIdUsuarioUltModificacion'],
    $datosBajaContacto['iOpcion'],
    $datosBajaContacto['iProceso'],
    $datosBajaContacto['vchObservaciones'],
    array(&$datosBajaContacto['bResultado'], SQLSRV_PARAM_OUT),
    array(&$datosBajaContacto['vchCampoError'], SQLSRV_PARAM_OUT),
    array(&$datosBajaContacto['vchMensaje'], SQLSRV_PARAM_OUT),
    array(&$datosBajaContacto['iNoOperacion'], SQLSRV_PARAM_INOUT)
);

$result = sqlsrv_query($GLOBALS['conn'], $procedureName, $params);

if ($result === false) {
    $errorInformacion = sqlsrv_errors();
    $respuesta = array(
        'error' => true,
        'sqlError' => $errorInformacion
    );
    echo json_encode($datosBajaContacto);
    exit;
} else {
    echo json_encode($datosBajaContacto);
}


sqlsrv_free_stmt($result);

sqlsrv_close($GLOBALS['conn']);

?>