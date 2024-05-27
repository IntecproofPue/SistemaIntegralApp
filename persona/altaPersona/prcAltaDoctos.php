<?php
require_once('../../includes/load.php');
session_start();


var_dump($_FILES);

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

        $rutaArchivo = $carpeta.$_FILES['documento']['name']; 
        echo ("Esta es la ruta del archivo: ".$rutaArchivo); 


        echo $carpeta;

        if (!is_dir($carpeta)) {
            echo "La carpeta ya existe.<br>";
        }

        if ($_FILES['documento']['error'] == UPLOAD_ERR_OK) {
            $destino = $carpeta . DIRECTORY_SEPARATOR . $nombre;
            // Intentar mover el archivo a la carpeta de destino
            if (move_uploaded_file($_FILES['documento']['tmp_name'], $destino)) {
                echo "Archivo movido a la carpeta con éxito.<br>";
            } else {
                echo "Hubo un error al mover el archivo.<br>";

                echo "Error: " . error_get_last()['message'] . "<br>";
            }
        } else {
            echo "Hubo un error al subir el archivo.<br>";
        }

        echo "Nombre final del archivo: $nombre<br>";
        echo "Carpeta de destino: $carpeta<br>";
    } else {
        echo "No se subió ningún archivo.<br>";
    }
} else {
    echo "Solicitud inválida.<br>";
}

$datosBinarios = file_get_contents($rutaArchivo); 



if ($datosBinarios === false){
    die ("Ocurrió un error en la decodificación"); 
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

// Preparar la consulta SQL de inserción
$query = "INSERT INTO dbo.tempDoctos (vbDocto) VALUES (?)";
$stm = odbc_prepare($conn, $query);

if (!$stm) {
    echo "Error en la consulta:\n";
    die(print_r(odbc_error(), true));
}

// Ejecutar la consulta de inserción con los datos binarios del PDF
$result = odbc_execute($stm, array($datosBinarios));

if ($result === false) {
    die("Error al ejecutar la consulta: " . print_r(odbc_error(), true));
}

echo "El archivo PDF se ha insertado correctamente en la base de datos.";

// Cerrar la conexión a la base de datos
odbc_close($conn);






?>
