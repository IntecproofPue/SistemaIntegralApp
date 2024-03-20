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


    $datosEmpleadoConsulta= array(
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
        'vchNSS' => $datosEmpleado['vchNSS'],
        'iIdPuesto' => $datosEmpleado['iIdPuesto'],
        'dFechaIngreso' => $datosEmpleado['fechaIngreso'],
        'iIdSede' => $datosEmpleado['iIdConstanteSede'],
        'iAgrupadorSede' => 4,
        'iClaveSede' =>$datosEmpleado['iClaveSede'],
        'iIdUsuario' => 3,
        'iIdEmpleado' => 0,
        'bResultado' => 0,
        'vchCampoError' => '',
        'vchMensaje' => ''
    );


    var_dump($datosEmpleadoConsulta);

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
                                                @vchLetra				= ? ,
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
                                                @vchNSS                 = ? ,
                                                @iIdPuesto				= ? ,
                                                @dFechaIngreso			= ? , 
                                                @iIdSede				= ? ,
                                                @iAgrupadorSede			= ? ,
                                                @iClaveSede				= ? , 
                                                @iIdUsuario				= ? , 
                                                @iIdEmpleado			= ? , 
                                                @bResultado				= ? , 
                                                @vchCampoError			= ? , 
                                                @vchMensaje				= ?
                                                       ";

    echo $procedureName;

    $params = array(
        $datosEmpleadoConsulta['iIdPersona'],
        $datosEmpleadoConsulta['vchNombre'],
        $datosEmpleadoConsulta['vchPrimerApellido'],
        $datosEmpleadoConsulta['vchSegundoApellido'],
        $datosEmpleadoConsulta['vchRFC'],
        $datosEmpleadoConsulta['vchCURP'],
        $datosEmpleadoConsulta['dFechaNacimiento'],
        $datosEmpleadoConsulta['iIdGenero'],
        $datosEmpleadoConsulta['iAgrupadorGenero'],
        $datosEmpleadoConsulta['iClaveGenero'],
        $datosEmpleadoConsulta['iIdNacionalidad'],
        $datosEmpleadoConsulta['iAgrupadorNacionalidad'],
        $datosEmpleadoConsulta['iClaveNacionalidad'],
        $datosEmpleadoConsulta['iIdTipoPersona'],
        $datosEmpleadoConsulta['iAgrupadorTipoPersona'],
        $datosEmpleadoConsulta['iClaveTipoPersona'],
        $datosEmpleadoConsulta['iRegimen'],
        $datosEmpleadoConsulta['vchUsoFiscal'],
        $datosEmpleadoConsulta['iCodigoPostalFiscal'],
        $datosEmpleadoConsulta['vchCalle'],
        $datosEmpleadoConsulta['vchNumeroInterior'],
        $datosEmpleadoConsulta['vchNumeroExterior'],
        $datosEmpleadoConsulta['vchLetra'],
        $datosEmpleadoConsulta['iCodigoPostal'],
        $datosEmpleadoConsulta['vchColonia'],
        $datosEmpleadoConsulta['vchLocalidad'],
        $datosEmpleadoConsulta['vchMunicipio'],
        $datosEmpleadoConsulta['iIdEntidadFederativa'],
        $datosEmpleadoConsulta['iAgrupadorEntidad'],
        $datosEmpleadoConsulta['iClaveEntidad'],
        $datosEmpleadoConsulta['iIdTipoContacto'],
        $datosEmpleadoConsulta['iAgrupadorContacto'],
        $datosEmpleadoConsulta['iClaveContacto'],
        $datosEmpleadoConsulta['vchContacto'],
        $datosEmpleadoConsulta['vchNSS'],
        $datosEmpleadoConsulta['iIdPuesto'],
        $datosEmpleadoConsulta['dFechaIngreso'],
        $datosEmpleadoConsulta['iIdSede'],
        $datosEmpleadoConsulta['iAgrupadorSede'],
        $datosEmpleadoConsulta['iClaveSede'],
        $datosEmpleadoConsulta['iIdUsuario'],
        array(&$datosEmpleadoConsulta['iIdEmpleado'], SQLSRV_PARAM_OUT),
        array(&$datosEmpleadoConsulta['bResultado'], SQLSRV_PARAM_OUT),
        array(&$datosEmpleadoConsulta['vchCampoError'], SQLSRV_PARAM_OUT),
        array(&$datosEmpleadoConsulta['vchMensaje'], SQLSRV_PARAM_OUT)
    );

    var_dump($params);


    $result = sqlsrv_query($conn, $procedureName, $params);

    var_dump($result);

$sql = "EXEC prcAltaEmpleado    @iIdPersona				= '{$datosEmpleadoConsulta['iIdPersona']}' ,
                                @vchNombre				= '{$datosEmpleadoConsulta['vchNombre']}' ,
                                @vchPrimerApellido		= '{$datosEmpleadoConsulta['vchPrimerApellido']}',
                                @vchSegundoApellido		= '{$datosEmpleadoConsulta['vchSegundoApellido']}' ,
                                @vchRFC					= '{$datosEmpleadoConsulta['vchRFC']}' ,
                                @vchCURP				= '{$datosEmpleadoConsulta['vchCURP']}' ,
                                @dFechaNacimiento		= '{$datosEmpleadoConsulta['dFechaNacimiento']}' ,
                                @iIdGenero				= '{$datosEmpleadoConsulta['iIdGenero']}' ,
                                @iAgrupadorGenero		= '{$datosEmpleadoConsulta['iAgrupadorGenero']}' ,
                                @iClaveGenero			= '{$datosEmpleadoConsulta['iClaveGenero']}' ,
                                @iIdNacionalidad		= '{$datosEmpleadoConsulta['iIdNacionalidad']}' ,
                                @iAgrupadorNacionalidad	= '{$datosEmpleadoConsulta['iAgrupadorNacionalidad']}' ,
                                @iClaveNacionalidad		= '{$datosEmpleadoConsulta['iClaveNacionalidad']}',
                                @iIdTipoPersona			= '{$datosEmpleadoConsulta['iIdTipoPersona']}' ,
                                @iAgrupadorTipoPersona	= '{$datosEmpleadoConsulta['iAgrupadorTipoPersona']}' ,
                                @iClaveTipoPersona		= '{$datosEmpleadoConsulta['iClaveTipoPersona']}' ,
                                @iRegimen				= '{$datosEmpleadoConsulta['iRegimen']}' ,
                                @vchUsoFiscal			= '{$datosEmpleadoConsulta['vchUsoFiscal']}' ,
                                @iCodigoPostalFiscal	= '{$datosEmpleadoConsulta['iCodigoPostalFiscal']}' ,
                                @vchCalle				= '{$datosEmpleadoConsulta['vchCalle']}' ,
                                @vchNumeroInterior		= '{$datosEmpleadoConsulta['vchNumeroInterior']}' ,
                                @vchNumeroExterior		= '{$datosEmpleadoConsulta['vchNumeroExterior']}' ,
                                @vchLetra				= '{$datosEmpleadoConsulta['vchLetra']}' ,
                                @iCodigoPostal			= '{$datosEmpleadoConsulta['iCodigoPostal']}' ,
                                @vchColonia				= '{$datosEmpleadoConsulta['vchColonia']}' ,
                                @vchLocalidad			= '{$datosEmpleadoConsulta['vchLocalidad']}' ,
                                @vchMunicipio			= '{$datosEmpleadoConsulta['vchMunicipio']}' ,
                                @iIdEntidadFederativa	= '{$datosEmpleadoConsulta['iIdEntidadFederativa']}' ,
                                @iAgrupadorEntidad		= '{$datosEmpleadoConsulta['iAgrupadorEntidad']}' ,
                                @iClaveEntidad			= '{$datosEmpleadoConsulta['iClaveEntidad']}' ,
                                @iIdTipoContacto		= '{$datosEmpleadoConsulta['iIdTipoContacto']}' ,
                                @iAgrupadorContacto		= '{$datosEmpleadoConsulta['iAgrupadorContacto']}' ,
                                @iClaveContacto			= '{$datosEmpleadoConsulta['iClaveContacto']}' ,
                                @vchContacto			= '{$datosEmpleadoConsulta['vchContacto']}' ,
                                @vchNSS                 = '{$datosEmpleadoConsulta['vchNSS']}' ,
                                @iIdPuesto				= '{$datosEmpleadoConsulta['iIdPuesto']}' ,
                                @dFechaIngreso			= '{$datosEmpleadoConsulta['dFechaIngreso']}' ,
                                @iIdSede				= '{$datosEmpleadoConsulta['iIdSede']}' ,
                                @iAgrupadorSede			= '{$datosEmpleadoConsulta['iAgrupadorSede']}' ,
                                @iClaveSede				= '{$datosEmpleadoConsulta['iClaveSede']}' ,
                                @iIdUsuario				= '{$datosEmpleadoConsulta['iIdUsuario']}' ,
                                @iIdEmpleado			= '{$datosEmpleadoConsulta['iIdEmpleado']}' ,
                                @bResultado				= '{$datosEmpleadoConsulta['bResultado']}' ,
                                @vchCampoError			= '{$datosEmpleadoConsulta['vchCampoError']}' ,
                                @vchMensaje				= '{$datosEmpleadoConsulta['vchMensaje']}' ";


echo "<br>Voy a ejecutar la consulta: <b>$sql</b>";

    if ($result === false) {
        echo ("No se está ejecutando el query");
        $errorInformacion = sqlsrv_errors();
        $respuesta   = array (
            'error' => true,
            'mensaje' => $datosEmpleadoConsulta['vchMensaje'],
            'campoError' => $datosEmpleadoConsulta['vchCampoError'],
            'sqlError' => $errorInformacion
        );
        echo json_encode($respuesta);

    } else {
        echo ("Si se está ejecutando el query");
        $vchMensaje = mb_convert_encoding($datosEmpleadoConsulta['vchMensaje'],'ISO-8859-1', 'UTF-8' );

        echo ("=========================================");

        echo $vchMensaje;

        var_dump($datosEmpleadoConsulta);
        echo json_encode($datosEmpleadoConsulta);
    }

    sqlsrv_close($conn);