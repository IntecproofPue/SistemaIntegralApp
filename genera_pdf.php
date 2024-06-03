<?php
require_once('vendor/autoload.php');
use TCPDF;

// Verificar si el formulario fue enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener los datos del formulario
    $nombreEmpleado = $_POST['nombreEmpleado'];
    $numEmpleado = $_POST['numEmpleado'];
    $jefeInmediato = $_POST['jefeInmediato'];
    $fechaIngreso = $_POST['fechaIngreso'];
    $periodoVacaciones = $_POST['periodoVacaciones'];
    $antiguedad = $_POST['antiguedad'];
    $diasTomados = $_POST['diasTomados'];
    $diasRestantes = $_POST['diasRestantes'];
    $firmaEmpleado = $_POST['firmaEmpleado'];
    $fechaElaboracion = $_POST['fechaElaboracion'];

    // Crear una instancia de TCPDF
    $pdf = new TCPDF();

    // Configurar el documento PDF
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Sistema Integral');
    $pdf->SetTitle('Solicitud de Vacaciones');
    $pdf->SetSubject('Solicitud de Vacaciones');
    $pdf->SetKeywords('TCPDF, PDF, solicitud, vacaciones');

    // Agregar una página
    $pdf->AddPage();

    // Crear el contenido HTML
    $html = '
    <h1>SOLICITUD DE VACACIONES</h1>
    <h3>Fecha de Elaboración: ' . htmlspecialchars($fechaElaboracion) . '</h3>
    <h2>INFORMACIÓN DEL EMPLEADO</h2>
    <table border="1" cellspacing="3" cellpadding="4">
        <tr>
            <td>Nombre del Empleado</td>
            <td>' . htmlspecialchars($nombreEmpleado) . '</td>
        </tr>
        <tr>
            <td>Núm. De Empleado</td>
            <td>' . htmlspecialchars($numEmpleado) . '</td>
        </tr>
        <tr>
            <td>Jefe Inmediato</td>
            <td>' . htmlspecialchars($jefeInmediato) . '</td>
        </tr>
        <tr>
            <td>Fecha de Ingreso</td>
            <td>' . htmlspecialchars($fechaIngreso) . '</td>
        </tr>
        <tr>
            <td>Periodo de Vacaciones</td>
            <td>' . htmlspecialchars($periodoVacaciones) . '</td>
        </tr>
        <tr>
            <td>Antigüedad (años)</td>
            <td>' . htmlspecialchars($antiguedad) . '</td>
        </tr>
    </table>
    <h2>Detalles de las Vacaciones</h2>
    <p>Total de días tomados: ' . htmlspecialchars($diasTomados) . '</p>
    <p>Días restantes: ' . htmlspecialchars($diasRestantes) . '</p>
    <h2>Conformidad</h2>
    <p>Por la firma del presente formulario el empleado solicita se le descuenten de su saldo de vacaciones los días señalados; su saldo vigente tendrá que ser consultado previamente ya que en vacaciones acumuladas se considerarán las fechas de prescripciones así como vacaciones adelantadas.</p>
    <p>Firma de conformidad del empleado y Fecha: ' . htmlspecialchars($firmaEmpleado) . '</p>
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
