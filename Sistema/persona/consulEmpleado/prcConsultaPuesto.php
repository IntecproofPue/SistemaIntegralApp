<?php

require_once ('../../includes/load.php');
session_start();

var_dump($_POST);

$datos = json_decode('datosPuesto', true);
function limpiarCaracteresEspeciales($datos) {
    if (is_array($datos)) {
        foreach ($datos as $key => $value) {
            $datos[$key] = limpiarCaracteresEspeciales($value);
        }
    } elseif (is_string($datos)) {
        // Aquí puedes aplicar cualquier lógica para limpiar los caracteres especiales
        // Por ejemplo, utilizando una expresión regular para eliminar las secuencias de escape
        $datos = preg_replace('/\\\\([\'"\\/bfnrt])/', '', $datos);
    }
    return $datos;
}

$datosLimpio = limpiarCaracteresEspeciales($datos);

$jsonLimpio = json_encode($datosLimpio);

var_dump($jsonLimpio);

$datosConsulta = array(
    'iIdPuesto' => $jsonLimpio['iIdPuesto'],
    'vchPuesto' => '',
    'iIdTipoContratacion' => 0,
    'iIdUsuarioUltModificacion' => $_SESSION['user_id']
);


$procedureName = "EXEC prcConsultaPuesto     @iIdPuesto = ?,
                                             @vchPuesto = ? , 
                                             @iIdTipoContratacion = ?, 
                                             @iIdUsuarioUltModificacion = ?
                                                   ";

$params = array(
    $datosConsulta['iIdPuesto'],
    $datosConsulta['vchPuesto'],
    $datosConsulta['iIdTipoContratacion'],
    $datosConsulta['iIdUsuarioUltModificacion']
);


$result = sqlsrv_query($GLOBALS['conn'], $procedureName, $params);


if ($result === false) {
    $errorInformacion = sqlsrv_errors();
    $respuesta   = array (
        'error' => true,
        'sqlError' => $errorInformacion
    );
    echo json_encode($respuesta);
    exit;

} else {
    $DatosDomicilioPuesto = array();
    do{
        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            $DatosDomicilioPuesto[] = $row;
        }

    }while (sqlsrv_next_result($result));

    echo json_encode($DatosDomicilioPuesto);
}

sqlsrv_free_stmt($result);


sqlsrv_close($GLOBALS['conn']);