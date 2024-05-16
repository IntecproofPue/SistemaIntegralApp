function MostrarDatosModificacion(bResultado) {
    var vchNSSEmpleado = document.getElementById('vchNSSModificar');
    vchNSSEmpleado.value = bResultado.vchNSS;

    //Fecha ingreso
    var dFechaIngresModif = bResultado.dFechaIngreso.date;
    var fechaIngresoModif = new Date(dFechaIngresModif);
    var fechaIngresoFinalModif = fechaIngresoModif.toISOString().slice(0, 10);

    var dFechaIngresoModificacion = document.getElementById('dtFechaIngresoModificacion');
    dFechaIngresoModificacion.value = fechaIngresoFinalModif || '';

    //Sede
    var iIdSedeModificacion = bResultado.iIdSede;
    var selectElementSede = document.getElementById('iIdSedeModificar');

    for (var i = 0; i < selectElementSede.options.length; i++) {
        var optionSede = selectElementSede.options[i];
        var optionIdSede = parseInt(optionSede.value.split('-')[0]);

        if (optionIdSede === iIdSedeModificacion) {
            optionSede.selected = true;
            break;
        }
    }

    //Contratado por
    var iIdContratanteModificacion = bResultado.iIdContratadoPor;
    var selectElementContratante = document.getElementById('iIdPersonaContratanteModificar');

    for (var i = 0; i < selectElementContratante.options.length; i++) {
        var optionContratado = selectElementContratante.options[i];
        console.log(optionContratado.value);
        console.log(iIdContratanteModificacion);
        if (optionContratado.value == iIdContratanteModificacion.toString()) {
            console.log("entra en este if");
            optionContratado.selected = true;
            break;
        }
    }

    var vchNombreEmpleado = document.getElementById('vchNombreEmpleadoModificar');
    vchNombreEmpleado.value = bResultado.vchNombre

    var vchPrimerApellidoEmpleado = document.getElementById('vchPrimerApellidoModificar');
    vchPrimerApellidoEmpleado.value = bResultado.vchPrimerApellido;

    var vchSegundoApellidoEmpleado = document.getElementById('vchSegundoApellidoModificar');
    vchSegundoApellidoEmpleado.value = bResultado.vchSegundoApellido;

    var vchRFCEmpleado = document.getElementById('vchRFCModificar');
    vchRFCEmpleado.value = bResultado.vchRFC;

    var vchCURPEmpleado = document.getElementById('vchCURPModificar');
    vchCURPEmpleado.value = bResultado.vchCURP;

    //Fecha de nacimiento
    var dFechaNacimientoModif = bResultado.dFechaNacimiento.date;
    var dFechaNacimiento = new Date(dFechaNacimientoModif);
    var fechaNacimientoFinalModif = dFechaNacimiento.toISOString().slice(0, 10);

    var dFechaNacimientoModificacion = document.getElementById('dtFechaNacimientoModificacion');
    dFechaNacimientoModificacion.value = fechaNacimientoFinalModif || '';

    //Genero
    var iIdGeneroModificacion = bResultado.iIdGenero;
    var selectElementGenero = document.getElementById('iIdGeneroModificar');

    for (var i = 0; i < selectElementGenero.options.length; i++) {
        var optionGenero = selectElementGenero.options[i];

        var optionIdGenero = parseInt(optionGenero.value.split('-')[0]);

        if (optionIdGenero == iIdGeneroModificacion) {
            optionGenero.selected = true;
            break;
        }
    }

    //Nacionalidad
    var iIdNacionalidadModificacion = bResultado.iIdNacionalidad;
    var selectElementNacionalidad = document.getElementById('iIdNacionalidadModificar');

    for (var i = 0; i < selectElementNacionalidad.options.length; i++) {
        var optionNacionalidad = selectElementNacionalidad.options[i];

        var optionIdNacionalidad = parseInt(optionNacionalidad.value.split('-')[0]);

        if (optionIdNacionalidad === iIdNacionalidadModificacion) {
            optionNacionalidad.selected = true;
            break;
        }
    }

    //Regimen fiscal
    var iIdRegimenModificacion = bResultado.iIdRegimen;
    var selectElementRegimen = document.getElementById('regimenFiscalModificar');

    for (var i = 0; i < selectElementRegimen.options.length; i++) {
        var optionRegimen = selectElementRegimen.options[i];
        if (optionRegimen === iIdRegimenModificacion) {
            optionRegimen.selected = true;
            break;
        }
    }

    //Uso fiscal
    var vchUsoFiscalModificacion = bResultado.vchUsoFiscal;
    console.log(vchUsoFiscalModificacion);
    var selectElementUsoFiscal = document.getElementById('usoFiscalModificar');

    for (var i = 0; i < selectElementUsoFiscal.options.length; i++) {
        var optionUsoFiscal = selectElementUsoFiscal.options[i];

        if (optionUsoFiscal === vchUsoFiscalModificacion) {
            optionUsoFiscal.selected = true;
            break;
        }
    }

    //Codigo Fiscal
    var iIdCodigoFiscalEmpleado = document.getElementById('iIdCodigoPostalModificar');
    iIdCodigoFiscalEmpleado.value = bResultado.iCodigoPostalFiscal;

}


