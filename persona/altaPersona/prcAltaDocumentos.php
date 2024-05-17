<?php

require_once ('../../includes/load.php');
session_start();

$agrupadorDocumento = 10;


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $iIdEmpleado = isset($_POST['empleado'])? $_POST['empleado']: 0;
    $iIdTipoDocumento = isset($_POST['iIdConstanteDocumento'])? $_POST['iIdConstanteDocumento']: 0;
    $iClaveDocumento = isset($_POST['iClaveDocumento'])? $_POST['iClaveDocumento']: 0;
    $urlArchivoBase64 = isset($_POST['url']) ? $_POST['url'] : '';
    $iNoOperacion = isset($_POST['operacion'])? $_POST['operacion']: 0;
}

$urlArchivoBase64 = iconv('ISO-8859-1', 'UCS-2BE' ,$urlArchivoBase64);
//$urlVarbinary = base64_decode($urlArchivoBase64);


$query = "DECLARE @archivoBinario VARBINARY(MAX); 
                SET @archivoBinario = (SELECT CONVERT(VARBINARY(MAX), Value) FROM #TempSessionVariables FOR XML PATH(''), TYPE).value('.', 'VARBINARY(MAX)'); 
                INSERT INTO dbo.tempDoctos (vbDocto, iNoOperacion, iIdEmpleado) 
                OUTPUT inserted.*, inserted.iIdtempDoctos AS iIdDocumento
                VALUES (?,?,?)";

$paramsConvert = array(
    $urlArchivoBase64,
    $iNoOperacion,
    $iIdEmpleado
);

$stm = sqlsrv_query($GLOBALS['conn'], $query, $paramsConvert);

if (!$stm) {
    echo "Error en la consulta:\n";
    die(print_r(sqlsrv_errors(), true));
} else {
    while ($row = sqlsrv_fetch_array($stm, SQLSRV_FETCH_ASSOC)) {
        $idInsertado = $row['iIdDocumento'];
        echo "ID insertado: $idInsertado\n";
    }
}

sqlsrv_free_stmt($stm);



sqlsrv_close($GLOBALS['conn']);


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