<?php
require_once ('vendor/autoload.php');
require_once('tcpdf/examples/tcpdf_include.php');
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

    // Agregar una página con orientación horizontal
    $pdf->AddPage('L');

    // Crear el contenido HTML
    $html = '
    <style>
    table {
        width: 95%;
        border-collapse: collapse;
        table-layout: auto;
    }
    th, td {
        border: 1px solid #000;
        padding: 0px;
        text-align: center;
        font-size: 6px;
    }
    th {
        background-color: #f2f2f2;
    }
    .month-header {
        background-color: #ccc;
    }
    .highlight {
        background-color: yellow;
    }
    </style>
    
    
    <h1 style="font-size: 14px;">SOLICITUD DE VACACIONES</h1>
    <h4 style="font-size: 9px;">Fecha de Elaboración: ' . htmlspecialchars($fechaElaboracion) . '</h4>   
    
    <h6 style="font-size: 8px;">INFORMACIÓN DEL EMPLEADO</h6>
    
    <table border="1" cellspacing="2" cellpadding="3">
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
    <h4 style="font-size: 10px;">CRUCE LOS DÍAS QUE EL TRABAJADOR VA A DISFRUTAR COMO VACACIONES</h4>   
    
<table>
    <thead>
        <tr style="font-size: -1px;" class="month-header">
            <th>Mes</th><th>D</th><th>L</th><th>M</th><th>M</th><th>J</th><th>V</th><th>S</th><th>D</th><th>L</th><th>M</th><th>M</th><th>J</th><th>V</th><th>S</th><th>D</th><th>L</th><th>M</th><th>M</th><th>J</th><th>V</th><th>S</th><th>D</th><th>L</th><th>M</th><th>M</th><th>J</th><th>V</th><th>S</th><th>D</th><th>L</th><th>M</th><th>M</th><th>J</th><th>V</th><th>S</th><th>D</th>
        </tr>
    </thead>
    <tbody>               
        <tr><td>ENE</td><td> </td><td>1</td><td>2</td><td>3</td><td>4</td><td>5</td><td>6</td><td>7</td><td>8</td><td>9</td><td>10</td><td>11</td><td>12</td><td>13</td><td>14</td><td>15</td><td>16</td><td>17</td><td>18</td><td>19</td><td>20</td><td>21</td><td>22</td><td>23</td><td>24</td><td>25</td><td>26</td><td>27</td><td>28</td><td>29</td><td>30</td><td>31</td><td> </td><td> </td><td> </td><td> </td></tr>
        <tr><td>FEB</td><td> </td><td> </td><td> </td><td> </td><td>1</td><td>2</td><td>3</td><td>4</td><td>5</td><td>6</td><td>7</td><td>8</td><td>9</td><td>10</td><td>11</td><td>12</td><td>13</td><td>14</td><td>15</td><td>16</td><td>17</td><td>18</td><td>19</td><td>20</td><td>21</td><td>22</td><td>23</td><td>24</td><td>25</td><td>26</td><td>27</td><td>28</td><td>29</td><td> </td><td> </td><td> </td></tr>         
        <tr><td>MAR</td><td> </td><td> </td><td> </td><td> </td><td> </td><td>1</td><td>2</td><td>3</td><td>4</td><td>5</td><td>6</td><td>7</td><td>8</td><td>9</td><td>10</td><td>11</td><td>12</td><td>13</td><td>14</td><td>15</td><td>16</td><td>17</td><td>18</td><td>19</td><td>20</td><td>21</td><td>22</td><td>23</td><td>24</td><td>25</td><td>26</td><td>27</td><td>28</td><td>29</td><td>30</td><td>31</td></tr>
        <tr><td>ABR</td><td> </td><td>1</td><td>2</td><td>3</td><td>4</td><td>5</td><td>6</td><td>7</td><td>8</td><td>9</td><td>10</td><td>11</td><td>12</td><td>13</td><td>14</td><td>15</td><td>16</td><td>17</td><td>18</td><td>19</td><td>20</td><td>21</td><td>22</td><td>23</td><td>24</td><td>25</td><td>26</td><td>27</td><td>28</td><td>29</td><td>30</td><td> </td><td> </td><td> </td><td> </td><td> </td></tr>
        <tr><td>MAY</td><td> </td><td> </td><td> </td><td>1</td><td>2</td><td>3</td><td>4</td><td>5</td><td>6</td><td>7</td><td>8</td><td>9</td><td>10</td><td>11</td><td>12</td><td>13</td><td>14</td><td>15</td><td>16</td><td>17</td><td>18</td><td>19</td><td>20</td><td>21</td><td>22</td><td>23</td><td>24</td><td>25</td><td>26</td><td>27</td><td>28</td><td>29</td><td>30</td><td>31</td><td> </td><td> </td></tr>
        <tr><td>JUN</td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td><td>1</td><td>2</td><td>3</td><td>4</td><td>5</td><td>6</td><td>7</td><td>8</td><td>9</td><td>10</td><td>11</td><td>12</td><td>13</td><td>14</td><td>15</td><td>16</td><td>17</td><td>18</td><td>19</td><td>20</td><td>21</td><td>22</td><td>23</td><td>24</td><td>25</td><td>26</td><td>27</td><td>28</td><td>29</td><td>30</td></tr>
        <tr><td>JUL</td><td> </td><td>1</td><td>2</td><td>3</td><td>4</td><td>5</td><td>6</td><td>7</td><td>8</td><td>9</td><td>10</td><td>11</td><td>12</td><td>13</td><td>14</td><td>15</td><td>16</td><td>17</td><td>18</td><td>19</td><td>20</td><td>21</td><td>22</td><td>23</td><td>24</td><td>25</td><td>26</td><td>27</td><td>28</td><td>29</td><td>30</td><td>31</td><td> </td><td> </td><td> </td><td> </td></tr>
        <tr><td>AGO</td><td> </td><td> </td><td> </td><td> </td><td>1</td><td>2</td><td>3</td><td>4</td><td>5</td><td>6</td><td>7</td><td>8</td><td>9</td><td>10</td><td>11</td><td>12</td><td>13</td><td>14</td><td>15</td><td>16</td><td>17</td><td>18</td><td>19</td><td>20</td><td>21</td><td>22</td><td>23</td><td>24</td><td>25</td><td>26</td><td>27</td><td>28</td><td>29</td><td>30</td><td>31</td><td> </td></tr>
        <tr><td>SEP</td><td>1</td><td>2</td><td>3</td><td>4</td><td>5</td><td>6</td><td>7</td><td>8</td><td>9</td><td>10</td><td>11</td><td>12</td><td>13</td><td>14</td><td>15</td><td>16</td><td>17</td><td>18</td><td>19</td><td>20</td><td>21</td><td>22</td><td>23</td><td>24</td><td>25</td><td>26</td><td>27</td><td>28</td><td>29</td><td>30</td><td> </td><td> </td><td> </td><td> </td><td> </td><td> </td></tr>
        <tr><td>OCT</td><td> </td><td> </td><td>1</td><td>2</td><td>3</td><td>4</td><td>5</td><td>6</td><td>7</td><td>8</td><td>9</td><td>10</td><td>11</td><td>12</td><td>13</td><td>14</td><td>15</td><td>16</td><td>17</td><td>18</td><td>19</td><td>20</td><td>21</td><td>22</td><td>23</td><td>24</td><td>25</td><td>26</td><td>27</td><td>28</td><td>29</td><td>30</td><td>31</td><td> </td><td> </td><td> </td></tr>
        <tr><td>NOV</td><td> </td><td> </td><td> </td><td> </td><td> </td><td>1</td><td>2</td><td>3</td><td>4</td><td>5</td><td>6</td><td>7</td><td>8</td><td>9</td><td>10</td><td>11</td><td>12</td><td>13</td><td>14</td><td>15</td><td>16</td><td>17</td><td>18</td><td>19</td><td>20</td><td>21</td><td>22</td><td>23</td><td>24</td><td>25</td><td>26</td><td>27</td><td>28</td><td>29</td><td>30</td><td> </td></tr>
        <tr><td>DIC</td><td>1</td><td>2</td><td>3</td><td>4</td><td>5</td><td>6</td><td>7</td><td>8</td><td>9</td><td>10</td><td>11</td><td>12</td><td>13</td><td>14</td><td>15</td><td>16</td><td>17</td><td>18</td><td>19</td><td>20</td><td>21</td><td>22</td><td>23</td><td>24</td><td>25</td><td>26</td><td>27</td><td>28</td><td>29</td><td>30</td><td>31</td><td> </td><td> </td><td> </td><td> </td><td> </td></tr>
    </tbody>
</table>

    <p style="font-size: 10px;">Total de días tomados: ' . htmlspecialchars($diasTomados) . '</p>
    <p style="font-size: 10px;">Días restantes: ' . htmlspecialchars($diasRestantes) . '</p>

    <table>    
        <tbody>               
            <tr><td style="font-size: 4px">PERIODO</td><td>1</td><td>2</td><td>3</td><td>4</td><td>5</td><td>6</td><td>7</td><td>8</td><td>9</td><td>10</td><td>11</td><td>12</td><td>13</td><td>14</td><td>15</td><td>16</td><td>17</td><td>18</td><td>19</td><td>20</td><td>21</td><td>22</td><td>23</td><td>24</td><td>25</td><td>26</td><td>27</td><td>28</td><td>29</td></tr>
            <tr><td>DIAS</td><td>12</td><td>14</td><td>16</td><td>18</td><td>20</td><td>22</td><td>22</td><td>22</td><td>22</td><td>22</td><td>24</td><td>24</td><td>24</td><td>24</td><td>24</td><td>26</td><td>26</td><td>26</td><td>26</td><td>26</td><td>28</td><td>28</td><td>28</td><td>28</td><td>28</td><td>30</td><td>30</td><td>30</td><td>30</td></tr>         
        </tbody>
    </table>

    <h2 style="font-size: 14px;" >Conformidad</h2>
    <p style="font-size: 9px;">Por la firma del presente formulario el empleado solicita se le descuenten de su saldo de vacaciones los días señalados; su saldo vigente tendrá que ser consultado previamente ya que en vacaciones acumuladas se considerarán las fechas de prescripciones así como vacaciones adelantadas.</p>
    
    

    <table style="margin-top: 20px;">
    <tr>
        <td style="text-align: center;">
            <p>____________________________________</p>
            <p>Firma del empleado y fecha</p>
        </td>
        <td style="text-align: center;">
            <p>____________________________________</p>
            <p>Maria Dolores Ramos Aparicio</p>
        </td>
        <td style="text-align: center;">
            <p>____________________________________</p>
            <p>Enrique Martínez Córdoba</p>
        </td>
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