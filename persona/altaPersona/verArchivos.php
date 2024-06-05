<?php

require_once('../../includes/load.php');

session_start();


$id = 5328;//Valor de pruebas, se espera un GET
$iIdUsuario = $_SESSION['user_id'];

/*$sql = "SELECT vbArchivo FROM dbo.EmpleadoDocto WHERE iIdEmpleadoDoctos = ?";*/

$sql = "EXEC prcConsultaDocumentos	@iIdEmpleado = ?,
							        @iIdUsuarioUltModificacion	= ?";


$params = array(
    $id,
    $iIdUsuario
);

$stmt = sqlsrv_query($GLOBALS['conn'], $sql, $params);

if ($stmt === false) {
    die("Ocurrió un error en la obtención de datos: " . print_r(sqlsrv_errors(), true));
} else {
     do {
         while( $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
   // $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
            $nombreArchivoPdf = $row['vbArchivo'];

            header('Content-type: application/pdf');


            // Envía los datos del PDF como respuesta HTTP
            echo $row['vbArchivo'];

            // Finaliza la respuesta HTTP para cada archivo PDF
            flush();
            ob_flush();
            sleep(5); // Espera un poco antes de enviar la próxima respuesta
        }
    }while(sqlsrv_next_result($stmt));
}

sqlsrv_free_stmt($stmt);
sqlsrv_close($GLOBALS['conn']);
?>



