<?php

$serverName = "192.168.100.39, 1433";
$connectionInfo = array("Database" => "BDSistemaIntegral_PRETEST",
    "UID" => "Development",
    "PWD" => "Development123*",
    'CharacterSet' => 'UTF-8');

$conn = sqlsrv_connect($serverName, $connectionInfo);

if ($conn === false) {
    die(print_r(sqlsrv_errors(), true));
}

$iIdConstanteContacto = isset($_POST['iIdConstanteContacto'])? $_POST['iIdConstanteContacto']:0;
$iClaveContacto = isset($_POST['iClaveContacto'])?$_POST['iClaveContacto']: 0;
$vchContacto = isset($_POST['contacto'])?$_POST['contacto']:'';



$datosContacto = array(
    'iIdPersona' => 0,
    'iIdTipoContacto' => $iIdConstanteContacto,
    'iAgruContacto' => 8,
    'iCveContacto' => $iClaveContacto,
    'vchContacto' => $vchContacto,
    'bEstatus' => 1,
    'iIdContacto' => 0,
    'iIdUsuarioUltModificacion' => 2,
    'iOpcion' => 1,
    'iProceso' => 2,
    'bResultado' => 0,
    'vchCampoError' => '',
    'vchMensaje' => ''
);
$procedureName = "EXEC prcRN_Contacto          @iIdPersona = ?,
                                               @iIdTipoContacto = ?, 
                                               @iAgruContacto = ?, 
                                               @iCveContacto = ?, 
                                               @vchContacto = ? ,
                                               @bEstatus = ?, 
                                               @iIdContacto = ?,
                                               @iIdUsuarioUltModificacion = ?, 
                                               @iOpcion = ?,
                                               @iProceso = ?,
                                               @bResultado = ?,
                                               @vchCampoError = ? ,
                                               @vchMensaje = ?
                                                       ";

$params = array(
    $datosContacto['iIdPersona'],
    $datosContacto['iIdTipoContacto'],
    $datosContacto['iAgruContacto'],
    $datosContacto['iCveContacto'],
    $datosContacto['vchContacto'],
    $datosContacto['bEstatus'],
    $datosContacto['iIdContacto'],
    $datosContacto['iIdUsuarioUltModificacion'],
    $datosContacto['iOpcion'],
    $datosContacto['iProceso'],
    array(&$datosContacto['bResultado'], SQLSRV_PARAM_OUT),
    array(&$datosContacto['vchCampoError'], SQLSRV_PARAM_OUT),
    array(&$datosContacto['vchMensaje'], SQLSRV_PARAM_OUT)
);


$result = sqlsrv_query($conn, $procedureName, $params);

if ($result === false) {
    $errorInformacion = sqlsrv_errors();
    $respuesta   = array (
        'error' => true,
        'mensaje' => $datosContacto['vchMensaje'],
        'campoError' => $datosContacto['vchCampoError'],
        'sqlError' => $errorInformacion
    );
    echo json_encode($respuesta);

} else {
    echo json_encode($datosContacto);
}

sqlsrv_close($conn);
