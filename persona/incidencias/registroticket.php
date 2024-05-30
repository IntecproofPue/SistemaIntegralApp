<?php
// Archivo: reporte_tickets.php

require_once ('../../includes/pandora.php');
require_once ('../../includes/load.php');
require_once('tcpdf/tcpdf.php');

session_start();

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
$html = '<h1>Reporte de Tickets de Incidencias</h1>';
$html .= '<table border="1" cellpadding="5">
            <tr>
                <th>ID</th>
                <th>Asunto</th>
                <th>Fecha</th>
                <th>Estado</th>
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
$pdf->SetAuthor('Nombre del Autor');
$pdf->SetTitle('Reporte de Tickets de Incidencias');
$pdf->SetSubject('Reporte de Tickets');
$pdf->SetFont('helvetica', '', 12);
$pdf->AddPage();
$pdf->writeHTML($html, true, false, true, false, '');
$pdf->Output('reporte_tickets.pdf', 'I');

?>
