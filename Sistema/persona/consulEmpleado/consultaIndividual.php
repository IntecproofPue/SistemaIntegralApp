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

$iIdEmpleado = isset($_POST['iIdEmpleado'])? $_POST['iIdEmpleado']:0;



$datosEmpleado = array(
    'iIdEmpleado' => $iIdEmpleado
);
$procedureName = "EXEC prcConsultaEmpleado @iIdEmpleado = ?
                                                   ";

$params = array(
    $datosEmpleado['iIdEmpleado']
);

var_dump($params);

$result = sqlsrv_query($conn, $procedureName, $params);

var_dump($result);

if ($result === false) {
    echo("No se está ejecutando el proceso");
    $errorInformacion = sqlsrv_errors();
    $respuesta   = array (
        'error' => true,
        'campoError' => $datosEmpleado['vchCampoError'],
        'mensaje' => $datosEmpleado['vchMensaje'],
        'sqlError' => $errorInformacion
    );
    echo json_encode($respuesta);

} else {
    echo json_encode($datosEmpleado);
}

var_dump($datosEmpleado);

sqlsrv_close($conn);