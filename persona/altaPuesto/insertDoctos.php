<?php
require_once('../../includes/load.php');
session_start();
$agrupadorDocumento = 10;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $iIdEmpleado = isset($_POST['empleado']) ? $_POST['empleado'] : 0;
    $iIdTipoDocumento = isset($_POST['iIdConstanteDocumento']) ? $_POST['iIdConstanteDocumento'] : 0;
    $iClaveDocumento = isset($_POST['iClaveDocumento']) ? $_POST['iClaveDocumento'] : 0;
    $urlArchivoBase64 = isset($_POST['url']) ? $_POST['url'] : '';

    // decodificar el archivo pdf de base64
    $urlVarbinary = base64_decode($urlArchivoBase64);

    // establece la conexion a la base de datos SQL server
    $serverName = "192.168.100.39, 1433";
    $connectionInfo = array(
        "Database" => "BDSistemaIntegral_PRETEST",
        "UID" => "Development",
        "PWD" => "Development1234*"
    );

    $conn = odbc_connect("Driver={SQL Server};Server=$serverName;Database={$connectionInfo['Database']}", $connectionInfo['UID'], $connectionInfo['PWD']);

    if (!$conn) {
        die("Error al conectar: " . odbc_errormsg());
    }

    // preparar la consulta SQL de insercion
    $query = "INSERT INTO dbo.tempDoctos (vbDocto, iNoOperacion, iIdEmpleado) VALUES (?,?,?)";
    $stm = odbc_prepare($conn, $query);

    if (!$stm) {
        echo "Error en la consulta:\n";
        die(print_r(odbc_error(), true));
    }

    // EEjecuta la consulta de insercion con los parametros
    $result = odbc_execute($stm, array($urlVarbinary, &$iNoOperacion, &$iIdEmpleado));

    if ($result === false) {
        die("Error al ejecutar la consulta: " . print_r(odbc_error(), true));
    }

    echo "El archivo PDF se ha insertado correctamente en la base de datos.";
    
    odbc_close($conn);
}
?>
