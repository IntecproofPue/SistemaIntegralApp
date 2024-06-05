<?php
require_once('../../includes/load.php');
session_start();

var_dump($_FILES);


$iIdEmpleado = 5328;
$iIdTipoDocumento = 75;
$categoria = 81;
$bActivo = 1;
$iIdUsuarioUltModificacion = $_SESSION['user_id'];
$fechaActual = date('Y-m-d H:i:s');
$noOperacion = 10000203;


/*
$iIdEmpleado = isset($_POST['empleado']) ? $_POST['empleado'] : 5328;
$iIdTipoDocumento = isset ($_POST['iIdConstanteDocumento']) ? $_POST['iIdConstanteDocumento'] : 74;
$iAgrupadorTipoDocto = 10;
$iCveTipoDocto = isset ($_POST['iClaveDocumento']) ? $_POST['iClaveDocumento'] : 3;
$iIdUsuarioUltModificacion = $_SESSION['user_id'];
$noOperacion = isset ($_POST['operacion']) ? $_POST['operacion'] : 10000203;
$vchObservaciones = '';
$iIdEmpleadoDoctos = 0;
$bResultado = 0;
$vchCampoError = '';
$vchMensaje = '';
$categoria = 81;
$fechaActual = date('Y-m-d H:i:s');
$bActivo = 1;*/

/*
$iIdEmpleado = is_numeric($_POST['empleado'])? $_POST['empleado']: 0;
$iIdTipoDocumento = is_numeric($_POST['iIdConstanteDocumento']) ? $_POST['iIdConstanteDocumento'] : 0;
$iCveTipoDocto = is_numeric($_POST['iClaveDocumento']) ? $_POST['iClaveDocumento'] : 0;
$noOperacion = is_numeric($_POST['operacion']) ? $_POST['operacion'] : 0;*/




$documento = $_FILES['documento'];
echo "Archivo recibido.<br>";
echo "Nombre del archivo: " . $documento['name'] . "<br>";
echo "Tipo de archivo: " . $documento['type'] . "<br>";
echo "Tamaño del archivo: " . $documento['size'] . "<br>";
echo "Error en el archivo: " . $documento['error'] . "<br>";
echo "Ruta temporal del archivo: " . $documento['tmp_name'] . "<br>";

$nombre = basename($documento['name']);
$carpeta = '\\\\PCSERVIDOR\\DocumentosSIA\\';
$rutaArchivo = $carpeta . $nombre;

echo "Esta es la ruta del archivo: $rutaArchivo<br>";
echo "Esta es la carpeta: $carpeta<br>";



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

$datosBinarios = file_get_contents($rutaArchivo);

if ($datosBinarios === false) {
    die("Ocurrió un error en la lectura del archivo");
}else{
   // echo $datosBinarios;
}

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

/*$query = "EXEC prcAltaEmpleadoDoctos
                                        @iIdEmpleado = ?,
                                        @iIdTipoDocto = ?,
                                        @iAgruTipDocto = ?,
                                        @iCveTipoDocto = ?,
                                        @vbArchivo = ?
                                        @iIdUsuarioUltModificacion = ?,
                                        @iNoOperacion = ?,
                                        @vchObservaciones = ?,
                                        @iIdEmpleadoDoctos = ?,
                                        @bResultado = ?,
                                        @vchCampoError = ?,
                                        @vchMensaje = ?
                                        ";*/

$query = "INSERT INTO dbo.EmpleadoDocto (iIdEmpleado,iIdTipoDocto, iIdCategoria, bActivo, iIdUsuarioUltModificacion, dtFechaUltModificacion, vbArchivo, iNoOperacion ) 
                VALUES (?, ?, ?, ?, ?, ?, ?,?)";


$stm = odbc_prepare($conn, $query);


if (!$stm) {
    die("Error en la consulta: " . print_r(odbc_errormsg(), true));
}

/*$params = array(
    $iIdEmpleado,
    $iIdTipoDocumento,
    $iAgrupadorTipoDocto,
    $iCveTipoDocto,
    $datosBinarios,
    $iIdUsuarioUltModificacion,
    $noOperacion,
    $vchObservaciones,
    $iIdEmpleadoDoctos,
    $bResultado,
    $vchCampoError,
    $vchMensaje
);*/

$params = array(
    $iIdEmpleado,
    $iIdTipoDocumento,
    $categoria,
    $bActivo,
    $iIdUsuarioUltModificacion,
    $fechaActual,
    $datosBinarios,
    $noOperacion
);



var_dump($params);

$result = odbc_execute($stm, $params);

var_dump($result);

if ($result === false) {
    $errorInformacion = odbc_errormsg();
    $respuesta   = array (
        'error' => true,
        'sqlError' => $errorInformacion
    );
    echo json_encode($respuesta);
    exit;

} else {
    while ($row = odbc_fetch_array($stm)) {
        foreach ($row as $valor) {
            echo $valor . "<br>";
        }
    }

    echo "El archivo PDF se ha insertado correctamente en la base de datos.";
    echo json_encode(array('success' => true));
}

odbc_close($conn);
?>


/*
$result = odbc_execute($stm, $params);

var_dump($result);

if ($result === false) {
    $errorInformacion = odbc_errormsg();
    $respuesta   = array (
        'error' => true,
        'sqlError' => $errorInformacion
    );
    echo json_encode($respuesta);
    exit;

} else {
    while ($row = odbc_fetch_array($stm)) {
        foreach ($row as $valor) {
            echo $valor . "<br>";
        }
    }

    echo "El archivo PDF se ha insertado correctamente en la base de datos.";
    echo json_encode(array('success' => true));
}

odbc_close($conn);
?>*/
