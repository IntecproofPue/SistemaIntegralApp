<?php

require_once ('../../includes/load.php');


$id = 1023;//Valor de pruebas, se espera un GET

$sql = "SELECT vbDocto FROM dbo.tempDoctos WHERE iidTemDoctos = ?";

$params = array($id);

$stmt = sqlsrv_query($GLOBALS['conn'], $sql, $params);

$row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);

$datosDocumento = $row['vbDocto'];


sqlsrv_free_stmt($stmt);
sqlsrv_close($GLOBALS['conn']);

header("Content-type: application/pdf");

echo $datosDocumento;


?>

