<?php
require_once('../../includes/load.php');
session_start();

var_dump($_FILES);

$noOperacion = 12345;
$iIdEmpleado = 1188;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_FILES['documento'])) {
        echo "Archivo recibido.<br>";
        echo "Nombre del archivo: " . $_FILES['documento']['name'] . "<br>";
        echo "Tipo de archivo: " . $_FILES['documento']['type'] . "<br>";
        echo "Tamaño del archivo: " . $_FILES['documento']['size'] . "<br>";
        echo "Error en el archivo: " . $_FILES['documento']['error'] . "<br>";
        echo "Ruta temporal del archivo: " . $_FILES['documento']['tmp_name'] . "<br>";

        $nombre = basename($_FILES['documento']['name']);
        $carpeta = '\\\\PCSERVIDOR\\DocumentosSIA\\';
        $rutaArchivo = $carpeta . $nombre;

        echo "Esta es la ruta del archivo: $rutaArchivo<br>";
        echo "Esta es la carpeta: $carpeta<br>";

        if (!is_dir($carpeta)) {
            echo "La carpeta no existe.<br>";
            exit;
        }

        if ($_FILES['documento']['error'] == UPLOAD_ERR_OK) {
            if (move_uploaded_file($_FILES['documento']['tmp_name'], $rutaArchivo)) {
                echo "Archivo movido a la carpeta con éxito.<br>";
            } else {
                echo "Hubo un error al mover el archivo.<br>";
                echo "Error: " . error_get_last()['message'] . "<br>";
                exit;
            }
        } else {
            echo "Hubo un error al subir el archivo.<br>";
            exit;
        }

        echo "Nombre final del archivo: $nombre<br>";
        echo "Carpeta de destino: $carpeta<br>";
    } else {
        echo "No se subió ningún archivo.<br>";
        exit;
    }
} else {
    echo "Solicitud inválida.<br>";
    exit;
}

$datosBinarios = file_get_contents($rutaArchivo);

if ($datosBinarios === false) {
    die("Ocurrió un error en la lectura del archivo");
}

// Establecer la conexión a la base de datos SQL Server
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

$query = "INSERT INTO dbo.tempDoctos (vbDocto, iNoOperacion, iIdEmpleado) VALUES (?, ?, ?)";

$stm = odbc_prepare($conn, $query);

if (!$stm) {
    die("Error en la consulta: " . print_r(odbc_errormsg(), true));
}

// Ejecutar la consulta de inserción con los datos binarios del PDF
$result = odbc_execute($stm, array(
    $datosBinarios,
    $noOperacion,
    $iIdEmpleado
));

if ($result === false) {
    die("Error al ejecutar la consulta: " . print_r(odbc_errormsg(), true));
}

echo "El archivo PDF se ha insertado correctamente en la base de datos.";

// Cerrar la conexión a la base de datos
odbc_close($conn);
?>

