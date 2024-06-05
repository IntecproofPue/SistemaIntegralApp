<?php
$serverName = "192.168.100.39, 1433";
$connectionInfo = array(
    "Database" => "BDSistemaIntegral_PRETEST",
    "UID" => "Development",
    "PWD" => "Development1234*"
);

$conn = odbc_connect("Driver={SQL Server};Server=$serverName;Database= {$connectionInfo['Database']}", $connectionInfo['UID'], $connectionInfo['PWD']);

if (!$conn) {
    die("Error al conectar: " . odbc_errormsg());
}


$GLOBALS['conArchivo']=$conn;

?>
