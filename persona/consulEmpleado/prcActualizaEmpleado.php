<?php

require_once ('../../includes/load.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Inicializar variables globales
    $iProceso = isset($_POST['proceso']) ? (int)$_POST['proceso'] : 0;
    $iIdEmpleado = isset($_POST['empleado']) ? (int)$_POST['empleado'] : 0;
    $iIdPersona = isset($_POST['iIdPersona']) ? (int)$_POST['iIdPersona'] : 0;
    $iOpcion = isset($_POST['opcion']) ? (int)$_POST['opcion'] : 0;
    $iNoOperacion = isset($_POST['NoOperacion']) ? (int)$_POST['NoOperacion'] : 0;

    $procesosCampos = [
        2 => [
            'NSS',
            'dFechaIngreso',
            'nombre',
            'apellidoMaterno',
            'apellidoPaterno',
            'rfc',
            'curp',
            'dFechaNacimiento',
            'iIdConstanteGenero',
            'iClaveGenero',
            'iIdConstanteNacionalidad',
            'iClaveNacionalidad',
            'regimenFiscal',
            'usoFiscal',
            'codigoFiscal',
            'iIdConstanteSede',
            'iClaveSede',
            'contratante'
        ],
        3 => [
            'fechaBaja'
        ],
        4 => [
            'NSS',
            'fechaReingreso',
            'puesto',
            'contratante',
            'iIdConstanteSede',
            'iClaveSede'
        ],
        5 => [
            'puesto',
            'fechaPromocion',
            'iIdConstanteSede',
            'iClaveSede'
        ]
    ];

    // Definir valores predeterminados para diferentes tipos de datos
    $defaultValues = [
        'NSS' => '',
        'nombre' => '',
        'apellidoMaterno' => '',
        'apellidoPaterno' => '',
        'rfc' => '',
        'curp' => '',
        'dFechaIngreso' => '1900-01-01',
        'dFechaNacimiento' => '1900-01-01',
        'fechaBaja' => '1900-01-01',
        'fechaReingreso' => '1900-01-01',
        'fechaPromocion' => '1900-01-01',
        'iIdConstanteGenero' => 0,
        'iClaveGenero' => 0,
        'iIdConstanteNacionalidad' => 0,
        'iClaveNacionalidad' => 0,
        'regimenFiscal' => 0,
        'usoFiscal' => '',
        'codigoFiscal' => '',
        'iIdConstanteSede' => 0,
        'iClaveSede' => 0,
        'contratante' => 0,
        'puesto' => 0
    ];

    // Inicializar $datosActualizacion con valores predeterminados
    $datosActualizacion = $defaultValues;

    // Asignar valores de $_POST a $datosActualizacion si están presentes
    if (array_key_exists($iProceso, $procesosCampos)) {
        foreach ($procesosCampos[$iProceso] as $campo) {
            if (isset($_POST[$campo])) {
                $datosActualizacion[$campo] = $_POST[$campo];
            }
        }
    } else {
        echo json_encode(['error' => true, 'message' => 'Proceso no reconocido']);
        exit;
    }

    // Asignar valores adicionales
    $datosActualizacion['iProceso'] = $iProceso;
    $datosActualizacion['iIdEmpleado'] = $iIdEmpleado;
    $datosActualizacion['iIdPersona'] = $iIdPersona;
    $datosActualizacion['iOpcion'] = $iOpcion;
    $datosActualizacion['iNoOperacion'] = $iNoOperacion;
    $datosActualizacion['iIdUsuarioUltModificacion'] = $_SESSION['user_id'];
    $datosActualizacion['bResultado'] = 0;
    $datosActualizacion['vchCampoError'] = '';
    $datosActualizacion['vchMensaje'] = '';

    // Definir el nombre del procedimiento almacenado
    $procedureName = "EXEC prcActualizaEmpleado    
                        @iIdPersona                 = ? ,
                        @vchNombre                  = ? ,
                        @vchPrimerApellido          = ? ,
                        @vchSegundoApellido         = ? ,
                        @vchRFC                     = ? ,
                        @vchCURP                    = ? ,
                        @dFechaNacimiento           = ? ,
                        @iIdGenero                  = ? ,
                        @icveGenero                 = ? ,
                        @iAgruGenero                = ? ,
                        @iIdNacionalidad            = ? ,
                        @icveNacionalidad           = ? ,
                        @iAgruNacionalidad          = ? ,
                        @iIdTipoPersona             = ? ,
                        @icvetipoPer                = ? ,
                        @iAgrutipoPer               = ? ,
                        @iRegimen                   = ? ,
                        @vchUsoFiscal               = ? ,
                        @iCodigoPostalFiscal        = ? ,
                        @iIdEmpleado                = ? ,
                        @vchNSS                     = ? ,
                        @iIdPuesto                  = ? ,
                        @dFechaIngreso              = ? ,
                        @dFechaBaja                 = ? ,
                        @dFechaUltPromocion         = ? ,
                        @iIdSede                    = ? ,
                        @iAgrupadorSede             = ? ,
                        @iCveSede                   = ? ,
                        @iIdContratante             = ? ,
                        @dFechaReingreso            = ? ,
                        @iOpcion                    = ? ,
                        @vchObservaciones           = ? ,
                        @iProceso                   = ? ,
                        @iIdUsuarioUltModificacion  = ? ,
                        @iNoOperacion               = ? ,
                        @bResultado                 = ? ,
                        @vchCampoError              = ? ,
                        @vchMensaje                 = ?";


    $params = [
        $datosActualizacion['iIdPersona'],
        $datosActualizacion['nombre'],
        $datosActualizacion['apellidoPaterno'],
        $datosActualizacion['apellidoMaterno'],
        $datosActualizacion['rfc'],
        $datosActualizacion['curp'],
        $datosActualizacion['dFechaNacimiento'],
        $datosActualizacion['iIdConstanteGenero'],
        $datosActualizacion['iClaveGenero'],
        $datosActualizacion['iAgrupadorGenero'] ?? 3,
        $datosActualizacion['iIdConstanteNacionalidad'],
        $datosActualizacion['iClaveNacionalidad'],
        $datosActualizacion['iAgrupadorNacionalidad'] ?? 6,
        $datosActualizacion['iIdConstanteTipoPersona'] ?? 61,
        $datosActualizacion['iClaveTipoPersona'] ?? 1,
        $datosActualizacion['iAgrupadorTipoPersona'] ?? 7,
        $datosActualizacion['regimenFiscal'],
        $datosActualizacion['usoFiscal'],
        $datosActualizacion['codigoFiscal'],
        $datosActualizacion['iIdEmpleado'],
        $datosActualizacion['NSS'],
        $datosActualizacion['puesto'],
        $datosActualizacion['dFechaIngreso'],
        $datosActualizacion['fechaBaja'],
        $datosActualizacion['fechaPromocion'],
        $datosActualizacion['iIdConstanteSede'],
        $datosActualizacion['iAgrupadorSede'] ?? 4,
        $datosActualizacion['iClaveSede'],
        $datosActualizacion['contratante'],
        $datosActualizacion['fechaReingreso'],
        $datosActualizacion['iOpcion'],
        $datosActualizacion['vchObservaciones'] ?? '',
        $datosActualizacion['iProceso'],
        $datosActualizacion['iIdUsuarioUltModificacion'],
        [&$datosActualizacion['iNoOperacion'], SQLSRV_PARAM_OUT],
        [&$datosActualizacion['bResultado'], SQLSRV_PARAM_OUT],
        [&$datosActualizacion['vchCampoError'], SQLSRV_PARAM_OUT],
        [&$datosActualizacion['vchMensaje'], SQLSRV_PARAM_OUT]
    ];


    $result = sqlsrv_query($GLOBALS['conn'], $procedureName, $params);

    if ($result === false) {
        $errorInformacion = sqlsrv_errors();
        $respuesta = [
            'error' => true,
            'sqlError' => $errorInformacion
        ];
        echo json_encode($respuesta);
        exit;
    } else {
        echo json_encode($datosActualizacion);
    }

    sqlsrv_free_stmt($result);
    sqlsrv_close($GLOBALS['conn']);
}
?>
