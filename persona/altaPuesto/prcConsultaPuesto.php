<?php

require_once ('../../includes/load.php');
session_start();



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $opcion = isset($_POST['opcion']) ? $_POST['opcion'] : 1;
}

$opcionesConsulta = [
   1 => [
       'idPuesto',
       'vchPuesto',
       'iIdTipoContratacion'
   ]
];



$defaultValues = [
    'idPuesto' => 0,
    'vchPuesto' => '',
    'iIdTipoContratacion' => 0
];

$datosConsulta = $defaultValues;


if (array_key_exists($opcion, $opcionesConsulta)){
    foreach ($opcionesConsulta[$opcion] as $campo){
        if (isset($_POST[$campo])){
            $datosConsulta[$campo] = $_POST[$campo];
        }
    }
}else {
    echo json_encode(['error' => true, 'message' => 'Proceso no reconocido']);
}

$datosConsulta['iOpcion'] = $opcion;
$datosConsulta['iIdUsuarioUltModificacion'] = $_SESSION['user_id'];



$procedureName = "EXEC prcConsultaPuesto     @iIdPuesto = ?,
                                             @vchPuesto = ? , 
                                             @iIdTipoContratacion = ?, 
                                             @iIdUsuarioUltModificacion = ?, 
                                             @iOpcion = ?
                                                   ";
$params = [
    $datosConsulta['idPuesto'],
    $datosConsulta['vchPuesto'],
    $datosConsulta['iIdTipoContratacion'],
    $datosConsulta['iIdUsuarioUltModificacion'],
    $datosConsulta['iOpcion']
];



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


sqlsrv_free_stmt($result);


sqlsrv_close($GLOBALS['conn']);
