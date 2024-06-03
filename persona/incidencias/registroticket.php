<?php
// Archivo: reporte_tickets.php

require_once ('../../includes/pandora.php');
require_once ('../../includes/load.php');
require_once ('../../tcpdf/tcpdf.php');

session_start();

ob_start(); // Inicia el almacenamiento en búfer de salida

// Obtener los datos de los tickets de incidencias desde la base de datos
// Supongamos que los datos están en una tabla llamada "tickets"
//$query = "SELECT * FROM tickets";
//$result = mysqli_query($conexion, $query);

// Datos de ejemplo para simular la consulta a la base de datos
$tickets = array(
    array('id' => 1, 'asunto' => 'Problema con la red', 'fecha' => '2024-05-30', 'estado' => 'Pendiente'),
    array('id' => 2, 'asunto' => 'Error en la aplicación', 'fecha' => '2024-05-31', 'estado' => 'En proceso'),
    array('id' => 3, 'asunto' => 'Solicitud de soporte técnico', 'fecha' => '2024-06-01', 'estado' => 'Resuelto')
);


// Crear el documento HTML
$html = '<h1>REPORTE DE TICKETS DE INCIDENCIAS</h1>';
$html .= '<table border="1" cellpadding="5">
            <tr>
                <th>ID</th>
                <th>ASUNTO</th>
                <th>FECHA</th>
                <th>ESTADO</th>
            </tr>';

foreach ($tickets as $ticket) {
    $html .= '<tr>
                <td>' . $ticket['id'] . '</td>
                <td>' . $ticket['asunto'] . '</td>
                <td>' . $ticket['fecha'] . '</td>
                <td>' . $ticket['estado'] . '</td>
              </tr>';
}

$html .= '</table>';

// Generar el PDF
$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Roberto y Brenda');
$pdf->SetTitle('Reporte de Tickets de Incidencias');
$pdf->SetSubject('Reporte de Tickets');
$pdf->SetFont('helvetica', '', 12);
$pdf->AddPage();
$pdf->writeHTML($html, true, false, true, false, '');
$pdf->Output('reporte_tickets.pdf', 'I');

?>


<?php

// nuevo documento PDF
$pdf = new TCPDF('P', 'mm', 'Letter', true, 'UTF-8', false);

// información del documento
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Roberto y Brenda');
$pdf->SetTitle('Reporte de Incidencias');
$pdf->SetSubject('Reporte de Incidencias');
$pdf->SetKeywords('TCPDF, PDF, example, test, reporte, incidencias');

// Establecer márgenes
$pdf->SetMargins(10, 10, 10);
$pdf->SetHeaderMargin(0);
$pdf->SetFooterMargin(0);

// Agregar página
$pdf->AddPage();

// Configurar fuente
$pdf->SetFont('helvetica', '', 10);

// Encabezado de la tabla
$header = array('Expediente', 'Nombre', 'Tipo de Incidencia', 'Periodo Vacacional', 'Observaciones');

// Datos de ejemplo para la tabla
$data = array(
    array('123', 'Juan Pérez', 'Vacaciones', '01/07/2024 - 15/07/2024', 'Ninguna'),
    array('456', 'María González', 'Permiso', '10/07/2024', 'Médico'),
    // Agregar más filas según sea necesario
);

// Crear tabla
$pdf->SetFont('helvetica', 'B', 12);
$pdf->Cell(0, 10, 'Reporte de Incidencias', 0, 1, 'C');
$pdf->Ln(5); // Espacio entre título y tabla
$pdf->SetFont('helvetica', '', 10);
$pdf->Table($header, $data);

// Agregar espacio entre la tabla y las firmas
$pdf->Ln(10);

// Agregar nombres de las personas encargadas de autorizar
$pdf->Cell(0, 0, 'Firma del Responsable: FIRMA DE CONFORMIDAD DEL EMPLEADO Y FECHA', 0, 1, 'L'); // Reemplaza Nombre1 con el nombre correspondiente
$pdf->Cell(0, 0, 'Firma del Supervisor: MARIA DOLORES RAMOS APARICIO', 0, 1, 'C'); // Reemplaza Nombre2 con el nombre correspondiente
$pdf->Cell(0, 0, 'Firma del Gerente: ENRIQUE MARTINEZ CORDOBA', 0, 1, 'R'); // Reemplaza Nombre3 con el nombre correspondiente


// Salida del PDF
$pdf->Output('reporte_incidencias.pdf', 'I');

ob_end_clean(); // Limpia el búfer de salida sin enviar contenido al navegador

?>
