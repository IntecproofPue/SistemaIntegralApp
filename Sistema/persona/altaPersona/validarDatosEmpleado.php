<?php

    $datosPersona = json_decode(isset($_POST['datosPersona'])? $_POST['datosPersona']:'', true);
    $datosDomicilio = json_decode(isset($_POST['datosDomicilio'])? $_POST['datosDomicilio']:'', true);
    $datosContacto = json_decode(isset($_POST['datosContacto'])? $_POST['datosContacto']:'', true);
    $datosEmpleado = json_decode(isset($_POST['datosEmpleado'])? $_POST['datosEmpleado']:'', true);


    $serverName = "192.168.100.39, 1433";
    $connectionInfo = array("Database" => "BDSistemaIntegral_PRETEST",
        "UID" => "Development",
        "PWD" => "Development123*",
        'CharacterSet' => 'UTF-8');

    $conn = sqlsrv_connect($serverName, $connectionInfo);

    if ($conn === false) {
        die(print_r(sqlsrv_errors(), true));
    }


    $datosEmpleado= array(
        'iIdPersona' => 0,
        'vchNombre' => $datosPersona['nombre'],
        'vchPrimerApellido' => $datosPersona['primerApellido'],
        'vchSegundoApellido' => $datosPersona['segundoApellido'],
        'vchRFC' => $datosPersona['rfc'],
        'vchCURP' => $datosPersona['curp'],
        'dFechaNacimiento' => $datosPersona['fechaNacimiento'],
        'iIdGenero' => $datosPersona['iIdConstanteGenero'],
        'iAgrupadorGenero' => 3,
        'iClaveGenero' => $datosPersona['iClaveGenero'],
        'iIdNacionalidad' => $datosPersona['iIdConstanteNacionalidad'],
        'iAgrupadorNacionalidad' => 6,
        'iClaveNacionalidad' => $datosPersona['iClaveNacionalidad'],
        'iIdTipoPersona' => 61,
        'iAgrupadorTipoPersona' => 7,
        'iClaveTipoPersona' => 1,
        'iRegimen' => $datosPersona['regimenFiscal'],
        'vchUsoFiscal' => $datosPersona['usoFiscal'],
        'iCodigoPostalFiscal' => $datosPersona['codigoPostal'],
        'vchCalle' => $datosDomicilio['vchCalle'],
        'vchNumeroInterior' => $datosDomicilio['vchNoInt'],
        'vchNumeroExterior' => $datosDomicilio['vchNoExt'],
        'vchLetra' => $datosDomicilio['vchLetra'],
        'iCodigoPostal' => $datosDomicilio['codigoPostal'],
        'vchColonia' => $datosDomicilio['vchColonia'],
        'vchLocalidad' => $datosDomicilio['vchLocalidad'],
        'vchMunicipio' => $datosDomicilio['vchMunicipio'],
        'iIdEntidadFederativa' => $datosDomicilio['iIdConstanteEstado'],
        'iAgrupadorEntidad' => 4,
        'iClaveEntidad' => $datosDomicilio['iClaveEstado'],
        'iIdTipoContacto' => $datosContacto['iIdConstanteContacto'],
        'iAgrupadorContacto' => 8,
        'iClaveContacto' => $datosContacto['iClaveContacto'],
        'vchContacto' => $datosContacto['contacto'],
        'iIdPuesto' => $datosEmpleado['iIdPuesto'],
        'dFechaIngreso' => $datosEmpleado['fechaIngreso'],
        'vchNSS' => $datosEmpleado['vchNSS'],
        'iIdSede' => $datosEmpleado['iIdConstanteSede'],
        'iAgrupadorSede' => 4,
        'iClaveSede' =>$datosEmpleado['iClaveSede'],
        'iIdUsuario' => 3,
        'iIdEmpleado' => 0,
        'bResultado' => 0,
        'vchCampoError' => '',
        'vchMensaje' => ''
    );
    $procedureName = "EXEC prcAltaEmpleado      @iIdPersona				= ? ,
                                                @vchNombre				= ? ,
                                                @vchPrimerApellido		= ? ,
                                                @vchSegundoApellido		= ? ,
                                                @vchRFC					= ? ,
                                                @vchCURP				= ? ,
                                                @dFechaNacimiento		= ? ,
                                                @iIdGenero				= ? ,
                                                @iAgrupadorGenero		= ? , 
                                                @iClaveGenero			= ? , 
                                                @iIdNacionalidad		= ? ,
                                                @iAgrupadorNacionalidad	= ? , 
                                                @iClaveNacionalidad		= ? , 
                                                @iIdTipoPersona			= ? ,
                                                @iAgrupadorTipoPersona	= ? , 
                                                @iClaveTipoPersona		= ? , 
                                                @iRegimen				= ? , 
                                                @vchUsoFiscal			= ? , 
                                                @iCodigoPostalFiscal	= ? ,
                                                @vchCalle				= ? ,
                                                @vchNumeroInterior		= ? ,
                                                @vchNumeroExterior		= ? ,
                                                @vchLetra				= ? 
                                                @iCodigoPostal			= ? ,
                                                @vchColonia				= ? ,
                                                @vchLocalidad			= ? ,
                                                @vchMunicipio			= ? ,
                                                @iIdEntidadFederativa	= ? ,
                                                @iAgrupadorEntidad		= ? , 
                                                @iClaveEntidad			= ? ,
                                                @iIdTipoContacto		= ? ,
                                                @iAgrupadorContacto		= ? , 
                                                @iClaveContacto			= ? , 
                                                @vchContacto			= ? ,
                                                @iIdPuesto				= ? ,
                                                @dFechaIngreso			= ? , 
                                                @vchNSS					= ? ,
                                                @iIdSede				= ? ,
                                                @iAgrupadorSede			= ? ,
                                                @iClaveSede				= ? , 
                                                @iIdTipoDocumento		= ? , 
                                                @iIdUsuario				= ? , 
                                                @iIdEmpleado			= ? , 
                                                @bResultado				= ? , 
                                                @vchCampoError			= ? , 
                                                @vchMensaje				= ?
                                                       ";

    $params = array(
        $datosEmpleado['iIdPersona'],
        $datosEmpleado['vchNombre'],
        $datosEmpleado['vchPrimerApellido'],
        $datosEmpleado['vchSegundoApellido'],
        $datosEmpleado['vchRFC'],
        $datosEmpleado['vchCURP'],
        $datosEmpleado['dFechaNacimiento'],
        $datosEmpleado['iIdGenero'],
        $datosEmpleado['iAgrupadorGenero'],
        $datosEmpleado['iClaveGenero'],
        $datosEmpleado['iIdNacionalidad'],
        $datosEmpleado['iAgrupadorNacionalidad'],
        $datosEmpleado['iClaveNacionalidad'],
        $datosEmpleado['iIdTipoPersona'],
        $datosEmpleado['iAgrupadorTipoPersona'],
        $datosEmpleado['iClaveTipoPersona'],
        $datosEmpleado['iRegimen'],
        $datosEmpleado['vchUsoFiscal'],
        $datosEmpleado['iCodigoPostalFiscal'],
        $datosEmpleado['vchCalle'],
        $datosEmpleado['vchNumeroInterior'],
        $datosEmpleado['vchNumeroExterior'],
        $datosEmpleado['vchLetra'],
        $datosEmpleado['iCodigoPostal'],
        $datosEmpleado['vchColonia'],
        $datosEmpleado['vchLocalidad'],
        $datosEmpleado['vchMunicipio'],
        $datosEmpleado['iIdEntidadFederativa'],
        $datosEmpleado['iAgrupadorEntidad'],
        $datosEmpleado['iClaveEntidad'],
        $datosEmpleado['iIdTipoContacto'],
        $datosEmpleado['iAgrupadorContacto'],
        $datosEmpleado['iClaveContacto'],
        $datosEmpleado['vchContacto'],
        $datosEmpleado['iIdPuesto'],
        $datosEmpleado['dFechaIngreso'],
        $datosEmpleado['vchNSS'],
        $datosEmpleado['iIdSede'],
        $datosEmpleado['iAgrupadorSede'],
        $datosEmpleado['iClaveSede'],
        $datosEmpleado['iIdUsuario'],
        array(&$datosEmpleado['iIdEmpleado'], SQLSRV_PARAM_OUT),
        array(&$datosEmpleado['bResultado'], SQLSRV_PARAM_OUT),
        array(&$datosEmpleado['vchCampoError'], SQLSRV_PARAM_OUT),
        array(&$datosEmpleado['vchMensaje'], SQLSRV_PARAM_OUT)
    );

    $result = sqlsrv_query($conn, $procedureName, $params);

    if ($result === false) {
        $errorInformacion = sqlsrv_errors();
        $respuesta   = array (
            'error' => true,
            'mensaje' => $datosEmpleado['vchMensaje'],
            'campoError' => $datosEmpleado['vchCampoError'],
            'sqlError' => $errorInformacion
        );
        echo json_encode($respuesta);

    } else {
        echo json_encode($datosEmpleado);
    }

    sqlsrv_close($conn);