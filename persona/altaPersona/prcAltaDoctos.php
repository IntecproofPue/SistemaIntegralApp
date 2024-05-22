<?php
require_once('../../includes/load.php');
session_start();
$agrupadorDocumento = 10;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $iIdEmpleado = isset($_POST['empleado']) ? $_POST['empleado'] : 0;
    $iIdTipoDocumento = isset($_POST['iIdConstanteDocumento']) ? $_POST['iIdConstanteDocumento'] : 0;
    $iClaveDocumento = isset($_POST['iClaveDocumento']) ? $_POST['iClaveDocumento'] : 0;
    $urlArchivoBase64 = isset($_POST['url']) ? $_POST['url'] : '';
    $iNoOperacion = isset($_POST['operacion']) ? $_POST['operacion'] : 0;
}




$urlVarbinary = base64_decode($urlArchivoBase64);

var_dump($urlVarbinary);

$serverName = "192.168.100.39, 1433"; // Cambia esta dirección IP y puerto según tu configuración
$connectionInfo = array(
    "Database" => "BDSistemaIntegral_PRETEST",
    "UID" => "Development",
    "PWD" => "Development1234*"
);

$conn = odbc_connect("Driver={SQL Server};Server=$serverName;Database={$connectionInfo['Database']}", $connectionInfo['UID'], $connectionInfo['PWD']);

if (!$conn) {
    die("Error al conectar: " . odbc_errormsg());
}

$query = "INSERT INTO dbo.tempDoctos (vbDocto, iNoOperacion, iIdEmpleado) VALUES (?,?,?)";


$stm = odbc_prepare($conn, $query);

if (!$stm) {
    echo "Error en la consulta:\n";
    die(print_r(odbc_error(), true));
}


$paramTypes = array(
    array($urlVarbinary),
    &$iNoOperacion,
    &$iIdEmpleado
);

echo "Longitud de los datos binarios: " . strlen($urlVarbinary) . "\n";


$result = odbc_execute($stm,
            array(  $urlVarbinary, SQL_VARBINARY,
                    $iNoOperacion,
                    $iIdEmpleado
                    )
);

if ($result === false) {
    die("Error al ejecutar la consulta: ". print_r(odbc_error(), true));
}


var_dump($result);

odbc_close($stm);