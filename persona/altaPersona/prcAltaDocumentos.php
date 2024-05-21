<?php

require_once ('../../includes/load.php');
session_start();


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $iIdEmpleado = isset($_POST['empleado'])? $_POST['empleado']: 0;
    $iIdTipoDocumento = isset($_POST['iIdConstanteDocumento'])? $_POST['iIdConstanteDocumento']: 0;
    $iClaveDocumento = isset($_POST['iClaveDocumento'])? $_POST['iClaveDocumento']: 0;
    $urlArchivoBase64 = isset($_POST['url']) ? $_POST['url'] : '';
    $iNoOperacion = isset($_POST['operacion'])? $_POST['operacion']: 0;
}


$serverName = "192.168.100.39, 1433"; //serverName\instanceName, portNumber (por defecto es 1433)
$connectionInfo = array(
            "Database"=>"BDSistemaIntegral_PRETEST",
            "UID"=>"Development",
            "PWD"=>"Development1234*"
            );

$dsn = $serverName.";".http_build_query($connectionInfo);

$conn = odbc_connect($dsn);

$agrupadorDocumento = 10;




//$urlArchivoBase64 = iconv('ISO-8859-1', 'UCS-2BE' ,$urlArchivoBase64);
$urlVarbinary = base64_decode($urlArchivoBase64);


$query = "INSERT INTO dbo.tempDoctos (vbDocto, iNoOperacion, iIdEmpleado) 
            OUTPUT inserted.*, inserted.iIdtempDoctos AS iIdDocumento
            VALUES (?,?,?)";

$params = array(
    $urlVarbinary,
    $iNoOperacion,
    $iIdEmpleado
);

$stm = odbc_prepare($conn, $query);

echo $stm;

if (!$stm) {
    echo "Error en la consulta:\n";
    die(print_r(odbc_error(), true));
}

$result = odbc_execute($stm, $params);

if ($result === false){
    die (print_r(odbc_error(), true));
}

odbc_free_stmt($stm);


odbc_close($conn);


/*


$datosDocumentos = array(
    'iIdEmpleado' => $_POST['empleado'],
    'iIdConstanteDocumento' => $_POST['iIdConstanteDocumento'],
    'iAgrupadorDocumento' => $agrupadorDocumento,
    'iClaveDocumento' => $_POST['iClaveDocumento'],
    'vbArchivo' => $urlVarbinary,
    'iIdUsuarioUltModificacion' => $_SESSION['user_id'],
    'iNoOperacion' => $_POST['operacion'],
    'vchObservaciones' => '',
    'iIdEmpleadoDoctos' => 0,
    'bResultado' => 0,
    'vchCampoError' => '',
    'vchMensaje' => ''
);


var_dump($datosDocumentos);

$procedureName = "EXEC prcAltaEmpleadoDoctos	@iIdEmpleado				= ? ,
                                                @iIdTipoDocto				= ? , 
                                                @iAgruTipDocto				= ? ,
                                                @iCveTipoDocto				= ? ,
                                                @vbArchivo					= ? ,
                                                @iIdUsuarioUltModificacion	= ? ,
                                                @iNoOperacion				= ? ,
                                                @vchObservaciones			= ?, 
                                                @iIdEmpleadoDoctos			= ? ,
                                                @bResultado					= ? ,
                                                @vchCampoError				= ? ,
                                                @vchMensaje					= ?

                                                   ";

$params = array(
    $datosDocumentos['iIdEmpleado'],
    $datosDocumentos['iIdConstanteDocumento'],
    $datosDocumentos['iAgrupadorDocumento'],
    $datosDocumentos['iClaveDocumento'],
    $datosDocumentos['vbArchivo'],
    $datosDocumentos['iIdUsuarioUltModificacion'],
    $datosDocumentos['iNoOperacion'],
    $datosDocumentos['vchObservaciones'],
    array(&$datosDocumentos['iIdEmpleadoDoctos'], SQLSRV_PARAM_OUT),
    array(&$datosDocumentos['bResultado'], SQLSRV_PARAM_OUT),
    array(&$datosDocumentos['vchCampoError'], SQLSRV_PARAM_OUT),
    array(&$datosDocumentos['vchMensaje'], SQLSRV_PARAM_OUT)
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

    echo json_encode($datosDocumentos);
}


var_dump($datosDocumentos);

sqlsrv_free_stmt($result);


sqlsrv_close($GLOBALS['conn']);
*/