<?php
require_once('../../includes/load.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $iIdPersonaDomicilio = $_POST['iIdPersonaDomicilio'];
}

$iIdPersonaDomicilio = is_numeric($iIdPersonaDomicilio) ? $iIdPersonaDomicilio : 0;

$datosConsulta = array(
    'iIdPersonaDomicilio' => $_POST['iIdPersonaDomicilio'],
    'iIdUsuarioUltModificacion' => $_SESSION['user_id']
);

$procedureName = "EXEC prcConsultaDomicilio @iIdPersona = ?, @iIdUsuarioUltModificacion = ?";

$params = array(
    $datosConsulta['iIdPersonaDomicilio'],
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
    $datosDomicilio = array();
    do {
        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            $datosDomicilio[] = $row;
        }
    } while (sqlsrv_next_result($result));

    // Aquí empieza la conversión y guardado de datos en localStorage
    echo '<script>';
    echo 'var datosDomicilio = ' . json_encode($datosDomicilio) . ';';
    echo 'var datosDomicilioJSON = JSON.stringify(datosDomicilio);';
    echo 'localStorage.setItem("datosDomicilio", datosDomicilioJSON);';
    echo '</script>';
}

sqlsrv_free_stmt($result);
sqlsrv_close($GLOBALS['conn']);
