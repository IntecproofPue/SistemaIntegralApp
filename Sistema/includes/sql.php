<?php
require_once('load.php');

function authenticate_v2($username='', $password='') {
    $sql = "EXEC prcAutenticacionUsuario @vchUsuario='$username', 
                                         @vbPass ='$password'";
    $stmt = sqlsrv_query($GLOBALS['conn'], $sql);

    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    $GLOBALS['rolesUser'] = array();

    // Fetch the output
    do {
        while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
            $GLOBALS['rolesUser'][] = $row;
        }
    } while (sqlsrv_next_result($stmt));

    sqlsrv_free_stmt($stmt);
    sqlsrv_close($GLOBALS['conn']);

    return false;
}

function obtenerUsuario($idUsuario='') {
    $sql = "SELECT per.vchNombre AS nombrePersona, cont.vchContacto contacto
            FROM CatGralUsuario us
            JOIN Persona per ON us.iIdPersona = per.iIdPersona
            JOIN PersonaContacto cont ON per.iIdPersona = cont.iIdPersona
            WHERE per.iIdPersona = $idUsuario AND cont.iIdTipoContacto = 63";

    $stmt = sqlsrv_query($GLOBALS['conn'], $sql);

    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        $GLOBALS['rowObtenerNombre'] = $row;
    }

    sqlsrv_free_stmt($stmt);

    return false;
}

function searchPersona($vchCadena='') {
    $sql = "EXEC prcConsultaPersona @iIdPersona = -1,   
                                    @vchCadena = '$vchCadena', 
                                    @iIdUsuarioUltModificacion = '" . $_SESSION['user_id'] . "'";
    $stmt = sqlsrv_query($GLOBALS['conn'], $sql);

    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    // Ejecutar el procedimiento almacenado prcConsultaContactos
    $sqlEjecutar = "EXEC prcConsultaContactos @iIdPersona = 1, @iIdUsuarioUltModificacion = 1";
    $stmtEjecutar = sqlsrv_query($GLOBALS['conn'], $sqlEjecutar);

    if ($stmtEjecutar === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    $contador = 0;

    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        $contador = $contador + 1;
        $GLOBALS['row' . $contador] = $row;
        $GLOBALS['contador'] = $contador;
    }

    sqlsrv_free_stmt($stmt);
    sqlsrv_free_stmt($stmtEjecutar);

    return false;
}

?>
