<?php

require_once ('../../includes/load.php');
session_start();

$bModificaPersona = isset($_POST['bModificaPersona'])? $_POST['bModificaPersona']:0;
$iIdPersona = isset($_POST['iIdPersona'])? $_POST['iIdPersona']:0;
$vchNombre = isset($_POST['vchNombre'])? $_POST['vchNombre']:'';
$vchPrimerApellido = isset($_POST['vchPrimerApellido'])? $_POST['vchPrimerApellido']:'';
$vchSegundoApellido = isset($_POST['vchSegundoApellido'])? $_POST['vchSegundoApellido']:'';
$vchRFC = isset($_POST['vchRFC'])? $_POST['vchRFC']:'';
$vchCURP = isset($_POST['vchCURP'])? $_POST['vchCURP']:'';
$dFechaNacimiento = isset($_POST['dFechaNacimiento'])? $_POST['dFechaNacimiento']:'';
$iIdGenero = isset($_POST['iIdGenero'])? $_POST['iIdGenero']:0;
$icveGenero = isset($_POST['icveGenero'])? $_POST['icveGenero']:0;
$iAgruGenero = isset($_POST['iAgruGenero'])? $_POST['iAgruGenero']:0;
$iIdNacionalidad = isset($_POST['iIdNacionalidad'])? $_POST['iIdNacionalidad']:0;
$icveNacionalidad = isset($_POST['icveNacionalidad'])? $_POST['icveNacionalidad']:0;
$iAgruNacionalidad = isset($_POST['iAgruNacionalidad'])? $_POST['iAgruNacionalidad']:0;
$iIdTipoPersona = isset($_POST['iIdTipoPersona'])? $_POST['iIdTipoPersona']:0;
$icvetipoPer = isset($_POST['icvetipoPer'])? $_POST['icvetipoPer']:0;
$iAgrutipoPer = isset($_POST['iAgrutipoPer'])? $_POST['iAgrutipoPer']:0;
$iIdUsoFiscal = isset($_POST['iIdUsoFiscal'])? $_POST['iIdUsoFiscal']:0;
$iRegimen = isset($_POST['iRegimen'])? $_POST['iRegimen']:0;
$vchUsoFiscal = isset($_POST['vchUsoFiscal'])? $_POST['vchUsoFiscal']:'';
$iCodigoPostalFiscal = isset($_POST['iCodigoPostalFiscal'])? $_POST['iCodigoPostalFiscal']:0;
$bModificaDom = isset($_POST['bModificaDom'])? $_POST['bModificaDom']:0;
$iIdDomicilio = isset($_POST['iIdDomicilio'])? $_POST['iIdDomicilio']:0;
$vchCalle = isset($_POST['vchCalle'])? $_POST['vchCalle']:'';
$vchNumeroExterior = isset($_POST['vchNumeroExterior'])? $_POST['vchNumeroExterior']:'';
$vchNumeroInterior = isset($_POST['vchNumeroInterior'])? $_POST['vchNumeroInterior']:'';
$vchLetra = isset($_POST['vchLetra'])? $_POST['vchLetra']:'';
$iCodigoPostal = isset($_POST['iCodigoPostal'])? $_POST['iCodigoPostal']:0;
$vchColonia = isset($_POST['vchColonia'])? $_POST['vchColonia']:'';
$vchLocalidad = isset($_POST['vchLocalidad'])? $_POST['vchLocalidad']:'';
$vchMunicipio = isset($_POST['vchMunicipio'])? $_POST['vchMunicipio']:'';
$iIdEntidadFederativa = isset($_POST['iIdEntidadFederativa'])? $_POST['iIdEntidadFederativa']:0;
$iCveEntidad = isset($_POST['iCveEntidad'])? $_POST['iCveEntidad']:0;
$iAgruEntidad = isset($_POST['iAgruEntidad'])? $_POST['iAgruEntidad']:0;
$bModificaCont = isset($_POST['bModificaCont'])? $_POST['bModificaCont']:0;
$iIdContacto = isset($_POST['iIdContacto'])? $_POST['iIdContacto']:0;
$iIdTipoContacto = isset($_POST['iIdTipoContacto'])? $_POST['iIdTipoContacto']:0;
$iAgruContacto = isset($_POST['iAgruContacto'])? $_POST['iAgruContacto']:0;
$iIdContacto = isset($_POST['iIdContacto'])? $_POST['iIdContacto']:0;
$iCveContacto = isset($_POST['iCveContacto'])? $_POST['iCveContacto']:0;
$vchContacto = isset($_POST['vchContacto'])? $_POST['vchContacto']:'';
$iIdEmpleado = isset($_POST['empleado'])? $_POST['empleado']:0;
$vchNSS = isset($_POST['vchNSS'])? $_POST['vchNSS']:'';
$iIdPuesto = isset($_POST['iIdPuesto'])? $_POST['iIdPuesto']:0;
$dFechaIngreso = isset($_POST['dFechaIngreso'])? $_POST['dFechaIngreso']:'';
$dFechaBaja = isset($_POST['fechaBaja'])? $_POST['fechaBaja']:'';
$dFechaUltPromocion = isset($_POST['dFechaUltPromocion'])? $_POST['dFechaUltPromocion']:'';
$iIdSede = isset($_POST['iIdSede'])? $_POST['iIdSede']:0;
$iAgrupadorSede = isset($_POST['iAgrupadorSede'])? $_POST['iAgrupadorSede']:0;
$iCveSede = isset($_POST['iCveSede'])? $_POST['iCveSede']:0;
$iIdEstatusEmpleado = isset($_POST['iIdEstatusEmpleado'])? $_POST['iIdEstatusEmpleado']:0;
$iAgrupadorEmpleado = isset($_POST['iAgrupadorEmpleado'])? $_POST['iAgrupadorEmpleado']:0;
$iCveEmpleado = isset($_POST['iCveEmpleado'])? $_POST['iCveEmpleado']:0;
$vbImagen = isset($_POST['vbImagen'])? $_POST['vbImagen']:0;
$iIdContratante = isset($_POST['iIdContratante'])? $_POST['iIdContratante']:0;
$dFechaReingreso = isset($_POST['dFechaReingreso'])? $_POST['dFechaReingreso']:'';
$iOpcion = isset($_POST['opcion'])? $_POST['opcion']:0;
$vchObservaciones = isset($_POST['vchObservaciones'])? $_POST['vchObservaciones']:'';
$iProceso = isset($_POST['proceso'])? $_POST['proceso']:0;



$datosActualizacion = array(
    'bModificaPersona' => $_POST['bModificaPersona'],
    'iIdPersona' => $_POST['iIdPersona'],
    'vchNombre' => $_POST['vchNombre'],
    'vchPrimerApellido' => $_POST['vchPrimerApellido'],
    'vchSegundoApellido' => $_POST['vchSegundoApellido'],
    'vchRFC' => $_POST['vchRFC'],
    'vchCURP' => $_POST['vchCURP'],
    'dFechaNacimiento' => $_POST['dFechaNacimiento'],
    'iIdGenero' => $_POST['iIdGenero'],
    'icveGenero' => $_POST['icveGenero'],
    'iAgruGenero' => $_POST['iAgruGenero'] ,
    'iIdNacionalidad' => $_POST['iIdNacionalidad'],
    'icveNacionalidad' => $_POST['icveNacionalidad'] ,
    'iAgruNacionalidad' => $_POST['iAgruNacionalidad'],
    'iIdTipoPersona' => $_POST['iIdTipoPersona'],
    'icvetipoPer' => $_POST['icvetipoPer'],
    'iAgrutipoPer' => $_POST['iAgrutipoPer'],
    'iIdUsoFiscal' => $_POST['iIdUsoFiscal'],
    'iRegimen' => $_POST['iRegimen'],
    'vchUsoFiscal' => $_POST['vchUsoFiscal'],
    'iCodigoPostalFiscal' => $_POST['iCodigoPostalFiscal'],
    'bModificaDom' => $_POST['bModificaDom'],
    'iIdDomicilio' => $_POST['iIdDomicilio'],
    'vchCalle' => $_POST['vchCalle'],
    'vchNumeroExterior' => $_POST['vchNumeroExterior'],
    'vchNumeroInterior' => $_POST['vchNumeroInterior'],
    'vchLetra' => $_POST['vchLetra'],
    'iCodigoPostal' => $_POST['iCodigoPostal'],
    'vchColonia' => $_POST['vchColonia'],
    'vchLocalidad' => $_POST['vchLocalidad'],
    'vchMunicipio' => $_POST['vchMunicipio'],
    'iIdEntidadFederativa' => $_POST['iIdEntidadFederativa'],
    'iCveEntidad' => $_POST['iCveEntidad'],
    'iAgruEntidad' => $_POST['iAgruEntidad'],
    'bModificaCont' => $_POST['bModificaCont'],
    'iIdContacto' => $_POST['iIdContacto'],
    'iIdTipoContacto' => $_POST['iIdTipoContacto'],
    'iAgruContacto' => $_POST['iAgruContacto'],
    'iIdContacto' => $_POST['iIdContacto'],
    'iCveContacto' => $_POST['iCveContacto'],
    'vchContacto' => $_POST['vchContacto'],
    'iIdEmpleado' => $_POST['iIdEmpleado'],
    'vchNSS' => $_POST['vchNSS'],
    'iIdPuesto' => $_POST['iIdPuesto'],
    'dFechaIngreso' => $_POST['dFechaIngreso'],
    'dFechaBaja' => $_POST['dFechaBaja'],
    'dFechaUltPromocion' => $_POST['dFechaUltPromocion'],
    'iIdSede' => $_POST['iIdSede'],
    'iAgrupadorSede' => $_POST['iAgrupadorSede'],
    'iCveSede' => $_POST['iCveSede'],
    'iIdEstatusEmpleado' => $_POST['iIdEstatusEmpleado'],
    'iAgrupadorEmpleado' => $_POST['iAgrupadorEmpleado'],
    'iCveEmpleado' => $_POST['iCveEmpleado'],
    'vbImagen' => $_POST['vbImagen'],
    'iIdContratante' => $_POST['iIdContratante'],
    'dFechaReingreso' =>$_POST['dFechaReingreso'] ,
    'iOpcion' => $_POST['iOpcion'],
    'vchObservaciones' => $_POST['vchObservaciones'],
    'iProceso' => $_POST['iProceso'],
    'iIdUsuarioUltModificacion' => $_SESSION['user_id'],
    'iNoOperacion' => 0 ,
    'bResultado' => 0,
    'vchCampoError' => '',
    'vchMensaje' => ''
);


$procedureName = "EXEC prcActualizaEmpleado	    @bModificaPersona			 = ? ,
                                                @iIdPersona					 = ? ,
                                                @vchNombre					 = ? ,
                                                @vchPrimerApellido			 = ? ,
                                                @vchSegundoApellido			 = ? ,
                                                @vchRFC						 = ? ,
                                                @vchCURP					 = ? ,
                                                @dFechaNacimiento			 = ? ,
                                                @iIdGenero					 = ? ,
                                                @icveGenero					 = ? ,
                                                @iAgruGenero				 = ? ,
                                                @iIdNacionalidad			 = ? ,
                                                @icveNacionalidad			 = ? ,
                                                @iAgruNacionalidad			 = ? ,
                                                @iIdTipoPersona				 = ? ,
                                                @icvetipoPer				 = ? ,
                                                @iAgrutipoPer				 = ? ,
                                                @iIdUsoFiscal				 = ? ,
                                                @iRegimen					 = ? ,
                                                @vchUsoFiscal				 = ? ,
                                                @iCodigoPostalFiscal		 = ? ,
                                                @bModificaDom				 = ? ,
                                                @iIdDomicilio				 = ? ,
                                                @vchCalle					 = ? ,
                                                @vchNumeroExterior			 = ? ,
                                                @vchNumeroInterior			 = ? ,
                                                @vchLetra					 = ? ,
                                                @iCodigoPostal				 = ? ,
                                                @vchColonia					 = ? ,
                                                @vchLocalidad				 = ? ,
                                                @vchMunicipio				 = ? ,
                                                @iIdEntidadFederativa		 = ? ,
                                                @iCveEntidad				 = ? ,
                                                @iAgruEntidad				 = ? ,
                                                @bModificaCont				 = ? ,
                                                @iIdContacto				 = ? ,
                                                @iIdTipoContacto			 = ? ,
                                                @iAgruContacto				 = ? ,
                                                @iCveContacto				 = ? ,
                                                @vchContacto				 = ? ,
                                                @iIdEmpleado				 = ? ,
                                                @vchNSS						 = ? ,
                                                @iIdPuesto					 = ? ,
                                                @dFechaIngreso				 = ? ,
                                                @dFechaBaja					 = ? ,
                                                @dFechaUltPromocion			 = ? ,
                                                @iIdSede					 = ? ,
                                                @iAgrupadorSede				 = ? ,
                                                @iCveSede					 = ? ,
                                                @iIdEstatusEmpleado			 = ? ,
                                                @iAgrupadorEmpleado			 = ? ,
                                                @iCveEmpleado				 = ? ,
                                                @vbImagen					 = ? ,
                                                @iIdContratante				 = ? ,
                                                @dFechaReingreso			 = ? ,
                                                @iOpcion					 = ? ,
                                                @vchObservaciones			 = ? ,
                                                @iProceso					 = ? ,
                                                @iIdUsuarioUltModificacion	 = ? ,
                                                @iNoOperacion				 = ? ,
                                                @bResultado					 = ? ,
                                                @vchCampoError				 = ? ,
                                                @vchMensaje					 = ? 				
                                                   ";


$params = array(
    $datosActualizacion['bModificaPersona']			,
    $datosActualizacion['iIdPersona']				,
    $datosActualizacion['vchNombre']				,
    $datosActualizacion['vchPrimerApellido']		,
    $datosActualizacion['vchSegundoApellido']		,
    $datosActualizacion['vchRFC']					,
    $datosActualizacion['vchCURP']					,
    $datosActualizacion['dFechaNacimiento']			,
    $datosActualizacion['iIdGenero']				,
    $datosActualizacion['icveGenero']				,
    $datosActualizacion['iAgruGenero']				,
    $datosActualizacion['iIdNacionalidad']			,
    $datosActualizacion['icveNacionalidad']			,
    $datosActualizacion['iAgruNacionalidad']		,
    $datosActualizacion['iIdTipoPersona']			,
    $datosActualizacion['icvetipoPer']				,
    $datosActualizacion['iAgrutipoPer']				,
    $datosActualizacion['iIdUsoFiscal']				,
    $datosActualizacion['iRegimen']					,
    $datosActualizacion['vchUsoFiscal']				,
    $datosActualizacion['iCodigoPostalFiscal']		,
    $datosActualizacion['bModificaDom']				,
    $datosActualizacion['iIdDomicilio']				,
    $datosActualizacion['vchCalle']					,
    $datosActualizacion['vchNumeroExterior']		,
    $datosActualizacion['vchNumeroInterior']		,
    $datosActualizacion['vchLetra']					,
    $datosActualizacion['iCodigoPostal']			,
    $datosActualizacion['vchColonia']				,
    $datosActualizacion['vchLocalidad']				,
    $datosActualizacion['vchMunicipio']				,
    $datosActualizacion['iIdEntidadFederativa']		,
    $datosActualizacion['iCveEntidad']				,
    $datosActualizacion['iAgruEntidad']				,
    $datosActualizacion['bModificaCont']			,
    $datosActualizacion['iIdContacto']				,
    $datosActualizacion['iIdTipoContacto']			,
    $datosActualizacion['iAgruContacto']			,
    $datosActualizacion['iCveContacto']				,
    $datosActualizacion['vchContacto']				,
    $datosActualizacion['iIdEmpleado']				,
    $datosActualizacion['vchNSS']					,
    $datosActualizacion['iIdPuesto']				,
    $datosActualizacion['dFechaIngreso']			,
    $datosActualizacion['dFechaBaja']				,
    $datosActualizacion['dFechaUltPromocion']		,
    $datosActualizacion['iIdSede']					,
    $datosActualizacion['iAgrupadorSede']			,
    $datosActualizacion['iCveSede']					,
    $datosActualizacion['iIdEstatusEmpleado']		,
    $datosActualizacion['iAgrupadorEmpleado']		,
    $datosActualizacion['iCveEmpleado']				,
    $datosActualizacion['vbImagen']					,
    $datosActualizacion['iIdContratante']			,
    $datosActualizacion['dFechaReingreso']			,
    $datosActualizacion['iOpcion']					,
    $datosActualizacion['vchObservaciones']			,
    $datosActualizacion['iProceso']					,
    $datosActualizacion['iIdUsuarioUltModificacion'],
    array(&$datosActualizacion['iNoOperacion'], SQLSRV_PARAM_OUT),
    array(&$datosActualizacion['bResultado'], SQLSRV_PARAM_OUT),
    array(&$datosActualizacion['vchCampoError'], SQLSRV_PARAM_OUT),
    array(&$datosActualizacion['vchMensaje'], SQLSRV_PARAM_OUT)
);


$result = sqlsrv_query($GLOBALS['conn'], $procedureName, $params);


if ($result === false) {
    $errorInformacion = sqlsrv_errors();
    $respuesta   = array (
        'error' => true,
        'sqlError' => $errorInformacion
    );
    echo json_encode($respuesta);
    exit;

} else {
        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            $DatosActualizacionEmpleado = $row;
        }


    echo json_encode($DatosActualizacionEmpleado);
}

sqlsrv_free_stmt($result);


sqlsrv_close($GLOBALS['conn']);