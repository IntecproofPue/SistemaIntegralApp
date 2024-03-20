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

$nombrePuesto = isset($_POST['nombrePuesto'])? $_POST['nombrePuesto']:'';
$descripcionPuesto = isset($_POST['descripcionPuesto'])?$_POST['descripcionPuesto']: '';
$iIdConstanteContratacion = isset($_POST['iIdConstanteContratacion'])?$_POST['iIdConstanteContratacion']:0;
$iClaveContratacion = isset($_POST['iClaveContratacion'])? $_POST['iClaveContratacion']:0;
$iIdConstanteHoras = isset($_POST['iIdConstanteHoras'])? $_POST['iIdConstanteHoras']:0;
$iClaveHoras = isset($_POST['iClaveHoras'])? $_POST['iClaveHoras']:0;
$salarioNeto = isset($_POST['salarioNeto'])? $_POST['salarioNeto']:'';
$salarioFiscal = isset($_POST['salarioFiscal'])? $_POST['salarioFiscal']:'';
$salarioComplementario = isset($_POST['salarioComplementario'])? $_POST['salarioComplementario']:'';



$datosPuesto = array(
    'vchPuesto' => $nombrePuesto,
    'vchDescripcion' => $descripcionPuesto,
    'iIdTipoContratacion' => $iIdConstanteContratacion,
    'iAgrupadorContratacion' => 1,
    'iCveContratacion' => $iClaveContratacion,
    'iIdHorasLaborales' => $iIdConstanteHoras,
    'iAgrupadorHoras' => 2,
    'iCveHoras' => $iClaveHoras,
    'mSalarioFiscal' => $salarioFiscal,
    'mSalarioComplemento' => $salarioComplementario,
    'mSalarioNeto' => $salarioNeto,
    'iIdUsuarioUltModif' => 2,
    'iIdPuesto' => 0,
    'bResultado' => 0,
    'vchCampoError' =>  'ALGO',
    'vchMensaje' => ''
);

$procedureName = "EXEC prcAltaPuesto_prueba    @vchPuesto = ?,
                                               @vchDescripcion = ?, 
                                               @iIdTipoContratacion = ?, 
                                               @iAgrupadorContratacion = ?, 
                                               @iCveContratacion = ? ,
                                               @iIdHorasLaborales = ?, 
                                               @iAgrupadorHoras = ?,
                                               @iCveHoras = ?, 
                                               @mSalarioFiscal = ?,
                                               @mSalarioComplemento = ?,
                                               @mSalarioNeto = ?,
                                               @iIdUsuarioUltModif = ? ,
                                               @iIdPuesto = ?, 
                                               @bResultado = ?,
                                               @vchCampoError = ?,
                                               @vchMensaje = ?
                                                       ";

$params = array(
    $datosPuesto['vchPuesto'],
    $datosPuesto['vchDescripcion'],
    $datosPuesto['iIdTipoContratacion'],
    $datosPuesto['iAgrupadorContratacion'],
    $datosPuesto['iCveContratacion'],
    $datosPuesto['iIdHorasLaborales'],
    $datosPuesto['iAgrupadorHoras'],
    $datosPuesto['iCveHoras'],
    $datosPuesto['mSalarioFiscal'],
    $datosPuesto['mSalarioComplemento'],
    $datosPuesto['mSalarioNeto'],
    $datosPuesto['iIdUsuarioUltModif'],
    array(&$datosPuesto['iIdPuesto'], SQLSRV_PARAM_OUT),
    array(&$datosPuesto['bResultado'], SQLSRV_PARAM_OUT),
    array(&$datosPuesto['vchCampoError'], SQLSRV_PARAM_OUT),
    array(&$datosPuesto['vchMensaje'], SQLSRV_PARAM_OUT)
);

var_dump($params);


echo ("==============================");
echo ("Esto es el vchCampoError: ".$datosPuesto['vchCampoError']);
echo ("Esto es el vchMensaje:" .$datosPuesto['vchMensaje']);
echo ("==============================");


$sql = "EXEC prcAltaPuesto     @vchPuesto = '{$datosPuesto['vchPuesto']}' ,
                               @vchDescripcion = '{$datosPuesto['vchDescripcion']}', 
                               @iIdTipoContratacion = '{$datosPuesto['iIdTipoContratacion']}', 
                               @iAgrupadorContratacion = '{$datosPuesto['iAgrupadorContratacion']}', 
                               @iCveContratacion = '{$datosPuesto['iCveContratacion']}',
                               @iIdHorasLaborales =  '{$datosPuesto['iIdHorasLaborales']}', 
                               @iAgrupadorHoras = '{$datosPuesto['iAgrupadorHoras']}',
                               @iCveHoras = '{$datosPuesto['iCveHoras']}', 
                               @mSalarioFiscal = '{$datosPuesto['mSalarioFiscal']}',
                               @mSalarioComplemento = '{$datosPuesto['mSalarioComplemento']}',
                               @mSalarioNeto = '{$datosPuesto['mSalarioNeto']}',
                               @iIdUsuarioUltModif = '{$datosPuesto['iIdUsuarioUltModif']}' ,
                               @iIdPuesto = '{$datosPuesto['iIdPuesto']}', 
                               @bResultado = '{$datosPuesto['bResultado']}',
                               @vchCampoError = '{$datosPuesto['vchCampoError']}',
                               @vchMensaje = '{$datosPuesto['vchMensaje']}'
                               ";


echo ("Voy a ejecutar esta consulta: ".$sql);

$result = sqlsrv_query($conn, $procedureName, $params);

var_dump($result);

if ($result === false) {
    echo("No se está ejecutando el proceso");
    $errorInformacion = sqlsrv_errors();
    $respuesta   = array (
        'error' => true,
        'campoError' => mb_convert_encoding($datosPuesto['vchCampoError'], "UTF-8", "ISO-8859-1"),
        'mensaje' => mb_convert_encoding($datosPuesto['vchMensaje'], "UTF-8", "ISO-8859-1"),
        'sqlError' => $errorInformacion
    );
    echo json_encode($respuesta);

} else {
    echo ("Proceso correcto");
    echo ("==================================");
    echo ($datosPuesto['vchCampoError']);
    echo ($datosPuesto['vchMensaje']);
    echo ($datosPuesto['bResultado']);
    echo json_encode($datosPuesto);
}

var_dump($datosPuesto);

sqlsrv_close($conn);