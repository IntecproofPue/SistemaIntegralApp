<?php

require_once ('../../includes/load.php');
session_start();


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $iIdPuesto = isset($_POST['idPuesto']) ? $_POST['idPuesto'] : 0;
    $nombrePuesto = isset($_POST['nombrePuesto']) ? $_POST['nombrePuesto'] : '';
    $iIdConstanteContratacion = isset($_POST['iIdConstanteContratacion']) ? $_POST['iIdConstanteContratacion'] : 0;
    $opcion = isset($_POST['opcion']) ? $_POST['opcion'] : 2;
}


$datosConsulta = array(
    'iIdPuesto' => $_POST['idPuesto'],
    'vchPuesto' => $_POST['nombrePuesto'],
    'iIdTipoContratacion' => $_POST['iIdConstanteContratacion'],
    'iIdUsuarioUltModificacion' => $_SESSION['user_id'],
    'iOpcion' => $_POST['opcion']
);



$procedureName = "EXEC prcConsultaPuesto     @iIdPuesto = ?,
                                             @vchPuesto = ? , 
                                             @iIdTipoContratacion = ?, 
                                             @iIdUsuarioUltModificacion = ?, 
                                             @iOpcion = ?
                                                   ";
$params = array(
    $datosConsulta['iIdPuesto'],
    $datosConsulta['vchPuesto'],
    $datosConsulta['iIdTipoContratacion'],
    $datosConsulta['iIdUsuarioUltModificacion'],
    $datosConsulta['iOpcion']
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
        do {
            $DatosConsultaPuesto = array();

            while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
                $DatosConsultaPuesto[] = $row;
            }
        }while(sqlsrv_next_result($result));

    echo json_encode($DatosConsultaPuesto);
}

var_dump($DatosConsultaPuesto);

sqlsrv_free_stmt($result);


sqlsrv_close($GLOBALS['conn']);
