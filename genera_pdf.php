<?php
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
use TCPDF;

// Verificar si el formulario fue enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener los datos del formulario
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $departamento = $_POST['departamento'];
    $cargo = $_POST['cargo'];
    $fecha_inicio = $_POST['fecha_inicio'];
    $fecha_fin = $_POST['fecha_fin'];
    $dias_totales = $_POST['dias_totales'];
    $aprobado_por = $_POST['aprobado_por'];
    $comentarios = $_POST['comentarios'];

    // Crear una instancia de TCPDF
    $pdf = new TCPDF();

    // Configurar el documento PDF
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Tu Nombre');
    $pdf->SetTitle('Solicitud de Vacaciones');
    $pdf->SetSubject('Solicitud de Vacaciones');
    $pdf->SetKeywords('TCPDF, PDF, solicitud, vacaciones');

    // Agregar una página
    $pdf->AddPage();

    // Crear el contenido HTML
    $html = '
    <h1>Solicitud de Vacaciones</h1>
    <h2>Información del Empleado</h2>
    <table border="1" cellspacing="3" cellpadding="4">
        <tr>
            <td>Nombre</td>
            <td>' . htmlspecialchars($nombre) . '</td>
        </tr>
        <tr>
            <td>Apellido</td>
            <td>' . htmlspecialchars($apellido) . '</td>
        </tr>
        <tr>
            <td>Departamento</td>
            <td>' . htmlspecialchars($departamento) . '</td>
        </tr>
        <tr>
            <td>Cargo</td>
            <td>' . htmlspecialchars($cargo) . '</td>
        </tr>
    </table>
    
    <h2>Detalles de las Vacaciones</h2>
    <table border="1" cellspacing="3" cellpadding="4">
        <tr>
            <td>Fecha de Inicio</td>
            <td>' . htmlspecialchars($fecha_inicio) . '</td>
        </tr>
        <tr>
            <td>Fecha de Fin</td>
            <td>' . htmlspecialchars($fecha_fin) . '</td>
        </tr>
        <tr>
            <td>Días Totales</td>
            <td>' . htmlspecialchars($dias_totales) . '</td>
        </tr>
    </table>
    
    <h2>Aprobaciones</h2>
    <table border="1" cellspacing="3" cellpadding="4">
        <tr>
            <td>Aprobado por</td>
            <td>' . htmlspecialchars($aprobado_por) . '</td>
        </tr>
        <tr>
            <td>Comentarios</td>
            <td>' . htmlspecialchars($comentarios) . '</td>
        </tr>
    </table>
    ';

    // Escribir el contenido HTML en el PDF
    $pdf->writeHTML($html, true, false, true, false, '');

    // Cerrar y generar el PDF
    $pdf->lastPage();
    $pdf->Output('solicitud_vacaciones.pdf', 'I');
} else {
    echo "No se recibieron datos del formulario.";
}
?>
