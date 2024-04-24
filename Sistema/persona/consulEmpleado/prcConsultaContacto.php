<?php

require_once ('../../includes/load.php');
session_start();

$datosContacto = json_decode(isset($_POST['datosConsultaIndividual'])? $_POST['datosConsultaIndividual']:'', true);


$datosConsulta = array(
    'vchNombre' => $datosContacto['iIdPersona'],
    'iIdUsuarioUltModificacion' => $_SESSION['user_id']
);


$procedureName = "EXEC prcConsultaContactos     @iIdPersona = ?,
                                                @iIdUsuarioUltModificacion = ?
                                                   ";

$params = array(
    $datosConsulta['iIdPersona'],
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
    $DatosContactoConsulta = array();
    do{
        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            $DatosContactoConsulta[] = $row;
        }

    }while (sqlsrv_next_result($result));

    echo json_encode($DatosContactoConsulta);
}

sqlsrv_free_stmt($result);


sqlsrv_close($GLOBALS['conn']);
