function MostrarDatosEmpleado(bResultado) {
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


function MostrarDatosReactivacion(bResultado) {

    //NSS
    var vchNSSReactivacion = document.getElementById('vchNSSReactivacion');
    vchNSSReactivacion.value = bResultado.vchNSS;

    //Fecha ingreso
    var dFechaIngresModif = bResultado.dFechaIngreso.date;
    var fechaIngresoModif = new Date(dFechaIngresModif);
    var fechaIngresoFinalModif = fechaIngresoModif.toISOString().slice(0, 10);

    var dFechaIngresoModificacion = document.getElementById('dFechaIngresoReactivacion');
    dFechaIngresoModificacion.value = fechaIngresoFinalModif || '';

    //Puesto

    var iIdPuestoModificacion = bResultado.iIdPuesto;
    var selectElementPuesto = document.getElementById('iIdPuestoReactivacion');

    for (var i = 0; i < selectElementPuesto.options.length; i++) {
        var optionPuesto = selectElementPuesto.options[i];
        if (optionPuesto.value === iIdPuestoModificacion.toString()) {
            optionPuesto.selected = true;
            break;
        }
    }


    //Contratado por
    var iIdContratanteModificacion = bResultado.iIdContratadoPor;
    var selectElementSede = document.getElementById('iIdPersonaContratanteReactivacion');

    for (var i = 0; i < selectElementSede.options.length; i++) {
        var optionContratado = selectElementSede.options[i];
        if (optionContratado.value == iIdContratanteModificacion.toString()) {
            optionContratado.selected = true;
            break;
        }
    }
}


function MostrarDatosPromocion(bResultado) {

    //Puesto
    var iIdPuestoModificacion = bResultado.iIdPuesto;
    var selectElementPuesto = document.getElementById('iIdPuestoPromocion');

    for (var i = 0; i < selectElementPuesto.options.length; i++) {
        var optionPuesto = selectElementPuesto.options[i];
        if (optionPuesto.value === iIdPuestoModificacion.toString()) {
            optionPuesto.selected = true;
            break;
        }
    }

    //NSS
    var vchNSSPromocion = document.getElementById('vchNSSPromocion');
    vchNSSPromocion.value = bResultado.vchNSS;

    //Sede
    var iIdSedeModificacion = bResultado.iIdSede;
    var selectElementSede = document.getElementById('vchSedePromocion');

    for (var i = 0; i < selectElementSede.options.length; i++) {
        var optionSede = selectElementSede.options[i];
        var optionIdSede = parseInt(optionSede.value.split('-')[0]);

        if (optionIdSede === iIdSedeModificacion) {
            optionSede.selected = true;
            break;
        }
    }

}


function MostrarDatos(bResultado) {
    var idInput = document.getElementById('idInput');
    idInput.value = bResultado.iIdEmpleado || '';

    var nombreInput = document.getElementById('vchNombre');
    nombreInput.value = bResultado.vchNombre || '';

    var vchPrimerApellido = document.getElementById('vchPrimerApellido');
    vchPrimerApellido.value = bResultado.vchPrimerApellido || '';

    var vchSegundoApellido = document.getElementById('vchSegundoApellido');
    vchSegundoApellido.value = bResultado.vchSegundoApellido || '';

    var vchPuesto = document.getElementById('vchPuesto');
    vchPuesto.value = bResultado.vchPuesto || '';

    var dFechaIngresoOriginal = bResultado.dFechaIngreso.date;
    var fechaIngreso = new Date(dFechaIngresoOriginal);
    var fechaIngresoFinal = fechaIngreso.toLocaleDateString('es-ES', {
        day: '2-digit',
        month: '2-digit',
        year: 'numeric'
    });
    var dFechaIngresoUlt = document.getElementById('dtFechaIngreso');
    dFechaIngresoUlt.value = fechaIngresoFinal;

    var vchEstatusEmpleado = document.getElementById('iIdEstatusEmpleado');
    vchEstatusEmpleado.value = bResultado.vchEstatusEmpleado || '';

    var vchNSS = document.getElementById('vchNSS');
    vchNSS.value = bResultado.vchNSS || '';

    var dFechaPromocionOriginal = bResultado.dtFechaUltPromocion.date;
    var fechaPromocion = new Date(dFechaPromocionOriginal);
    var fechaIPromocionFinal = fechaPromocion.toLocaleDateString('es-ES', {
        day: '2-digit',
        month: '2-digit',
        year: 'numeric'
    });
    var dFechaPromocion = document.getElementById('dtFechaUltPromocion');
    dFechaPromocion.value = fechaIPromocionFinal || '';

    var vchSede = document.getElementById('iIdSedeForm');
    vchSede.value = bResultado.vchSede || '';

    var dFechaBajaOriginal = bResultado.dtFechaBaja.date;
    var fechaBaja = new Date(dFechaBajaOriginal);
    var fechaBajaFinal = fechaBaja.toLocaleDateString('es-ES', {
        day: '2-digit',
        month: '2-digit',
        year: 'numeric'
    });
    var dFechBaja = document.getElementById('dtFechaBaja');
    dFechBaja.value = fechaBajaFinal === '01/01/1900' ? '' : fechaBajaFinal;

    var vchUsuario = document.getElementById('vchUsuarioUltModificacion');
    vchUsuario.value = bResultado.vchUsuarioUltModificacion || '';

    var dFechaUltModifOriginal = bResultado.dtFechaUltModificacion.date;
    var fechaModif = new Date(dFechaUltModifOriginal);
    var fechaModifFinal = fechaModif.toLocaleString('es-ES', {
        day: '2-digit',
        month: '2-digit',
        year: 'numeric',
        hour: '2-digit',
        minute: '2-digit',
        second: '2-digit',
        hour12: false
    });
    var dFechaModificacion = document.getElementById('dtFechaUltModificacion');
    dFechaModificacion.value = fechaModifFinal === '01/01/1900' ? '' : fechaModifFinal;

    //Datos Persona
    var vchRFC = document.getElementById('vchRFC');
    vchRFC.value = bResultado.vchRFC || '';

    var vchCURP = document.getElementById('vchCURP');
    vchCURP.value = bResultado.vchCURP || '';

    var dFechaNacimientoOriginal = bResultado.dFechaNacimiento.date;
    var fechaNacimiento = new Date(dFechaNacimientoOriginal);
    var fechaNacimientoFinal = fechaNacimiento.toLocaleDateString('es-ES', {
        day: '2-digit',
        month: '2-digit',
        year: 'numeric'
    });
    var dFechaNacimiento = document.getElementById('dFechaNacimiento');
    dFechaNacimiento.value = fechaNacimientoFinal === '01/01/1900' ? '' : fechaNacimientoFinal;

    var vchGenero = document.getElementById('iIdGenero');
    vchGenero.value = bResultado.vchGenero || '';

    var vchNacionalidad = document.getElementById('iIdNacionalidad');
    vchNacionalidad.value = bResultado.vchNacionalidad || '';

    //Datos Fiscales
    var vchRegimen = document.getElementById('vchRegimen');
    vchRegimen.value = bResultado.vchDescripcionRegimen;

    var vchUsoFiscal = document.getElementById('vchUsoFiscal');
    vchUsoFiscal.value = bResultado.vchDescripcionUso;

    var iCodigoPostalFiscal = document.getElementById('iCodigoPostalFiscal');
    iCodigoPostalFiscal.value = bResultado.iCodigoPostalFiscal;

}

