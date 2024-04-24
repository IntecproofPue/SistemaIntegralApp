<?php

    require_once('../../includes/load.php');
    session_start();

    $iIdConstanteEstado = isset($_POST['iIdConstanteEstado'])? $_POST['iIdConstanteEstado']:'';
    $iClaveEstado = isset($_POST['iClaveEstado'])?$_POST['iClaveEstado']: 0;
    $vchMunicipio = isset($_POST['vchMunicipio'])?$_POST['vchMunicipio']:'';
    $vchLocalidad = isset($_POST['vchLocalidad'])?$_POST['vchLocalidad']:'';
    $iCodigoPostal = isset($_POST['codigoPostal'])?$_POST['codigoPostal']:'';
    $vchColonia = isset($_POST['vchColonia'])?$_POST['vchColonia']:'';
    $vchCalle = isset($_POST['vchCalle'])?$_POST['vchCalle']:'';
    $vchLetra = isset($_POST['vchLetra'])?$_POST['vchLetra']:'';
    $vchNoExt = isset($_POST['vchNoExt'])?$_POST['vchNoExt']:'';
    $vchNoInt = isset($_POST['vchNoInt'])?$_POST['vchNoInt']:'';



    $datosDomicilio = array(
                        'iIdPersona' => 0,
                        'vchCalle' => $vchCalle,
                        'vchNoExt' => $vchNoExt,
                        'vchNoInt' => $vchNoInt,
                        'vchLetra' => $vchLetra,
                        'codigoPostal' => $iCodigoPostal,
                        'vchColonia' => $vchColonia,
                        'vchLocalidad' => $vchLocalidad,
                        'vchMunicipio' => $vchMunicipio,
                        'estado' => $iIdConstanteEstado,
                        'iAgruEntidad' => 4,
                        'iCveEntidad' => $iClaveEstado,
                        'iIdUsuarioUltModificacion' => $_SESSION['user_id'],
                        'iIdDomicilio' => 0,
                        'bEstatus' => 1,
                        'iOpcion' => 1,
                        'iProceso' => 2,
                        'bResultado' => 0,
                        'vchCampoError' => '',
                        'vchMensaje' => ''
    );


    $procedureName = "EXEC prcRN_Domicilio     @iIdPersona = ?,
                                               @vchCalle = ?,
                                               @vchNumeroExterior = ?,
                                               @vchNumeroInterior = ?,
                                               @vchLetra = ?,
                                               @iCodigoPostal = ?,
                                               @vchColonia = ?,
                                               @vchLocalidad = ?,
                                               @vchMunicipio = ?,
                                               @iIdEntidadFederativa = ?,
                                               @iAgruEntidad = ?,
                                               @iCveEntidad = ?,
                                               @iIdUsuarioUltModificacion = ?,
                                               @iIdDomicilio = ?,
                                               @bEstatus = ?,
                                               @iOpcion = ?,
                                               @iProceso = ?,
                                               @bResultado = ?,
                                               @vchCampoError = ? ,
                                               @vchMensaje = ?
                                                       ";

    $params = array(
        $datosDomicilio['iIdPersona'],
        $datosDomicilio['vchCalle'],
        $datosDomicilio['vchNoExt'],
        $datosDomicilio['vchNoInt'],
        $datosDomicilio['vchLetra'],
        $datosDomicilio['codigoPostal'],
        $datosDomicilio['vchColonia'],
        $datosDomicilio['vchLocalidad'],
        $datosDomicilio['vchMunicipio'],
        $datosDomicilio['estado'],
        $datosDomicilio['iAgruEntidad'],
        $datosDomicilio['iCveEntidad'],
        $datosDomicilio['iIdUsuarioUltModificacion'],
        $datosDomicilio['iIdDomicilio'],
        $datosDomicilio['bEstatus'],
        $datosDomicilio['iOpcion'],
        $datosDomicilio['iProceso'],
        array(&$datosDomicilio['bResultado'], SQLSRV_PARAM_OUT),
        array(&$datosDomicilio['vchCampoError'], SQLSRV_PARAM_OUT),
        array(&$datosDomicilio['vchMensaje'], SQLSRV_PARAM_OUT)
    );

    $result = sqlsrv_query($GLOBALS['conn'], $procedureName, $params);

    if ($result === false) {
        $errorInformacion = sqlsrv_errors();
        $respuesta = array (
            'error' => true,
            'sqlError' => $errorInformacion
        );
        echo json_encode($respuesta);
        exit;
    } else {
        $datosDomicilio = array();
        do {
            while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
                $datosDomicilio[] = $row;
            }
        } while (sqlsrv_next_result($result));
    
        // Aquí empieza la conversión y guardado de datos en localStorage
        echo '<script>';
        echo 'var datosDomicilio = ' . json_encode($datosDomicilio) . ';';
        echo 'var datosDomicilioJSON = JSON.stringify(datosDomicilio);';
        echo 'localStorage.setItem("datosDomicilio", datosDomicilioJSON);';
        echo '</script>';
    }
    
    sqlsrv_free_stmt($result);
    sqlsrv_close($GLOBALS['conn']);
    
