function ValidarBaja() {
    var datosBajaEmpleado = {
        fechaBaja: document.getElementById('dtFechaBajaModificacion').value,
        empleado: window.iIdEmpleadoGlobal,
        proceso: 3, //baja de empleado
        opcion: 2
    };

    localStorage.setItem('datosBaja', JSON.stringify(datosBajaEmpleado));
    console.log('ValidarBaja llamada');
}

function ValidarReactivacion(){
    var datosReactivacionEmpleado = {
        NSS: document.getElementById('vchNSSReactivacion').value,
        fechaReingreso: document.getElementById('dFechaReIngresoReactivacion').value,
        puesto: document.getElementById('iIdPuestoReactivacion').value,
        contratante: document.getElementById('iIdPersonaContratanteReactivacion').value,
        empleado: window.iIdEmpleadoGlobal,
        proceso: 4, //reactivación de empleado
        opcion: 2
    }
}

function ValidarPromocion (){

    var SedePromocionSeleccionada = document.getElementById('idSedePromocion').value;
    var SedePromocionPartes = SedePromocionSeleccionada.value.split('-');
    var iIdConstanteSedePromocion = SedePromocionPartes[0];
    var iClaveSedePromocion = SedePromocionPartes[1];

    document.getElementById('iIdConstanteSedePromocion').value = iIdConstanteSedePromocion;
    document.getElementById('iClaveSedePromocion').value = iClaveSedePromocion;



    var datosPromocion = {
        puesto: document.getElementById('iIdPuestoPromocion').value,
        NSS: document.getElementById('vchNSSPromocion').value,
        fechaPromocion: document.getElementById('dtFechaUltPromocionPr').value,
        iIdConstanteSede: iIdConstanteSedePromocion,
        iClaveSede: iClaveSedePromocion,
        empleado: window.iIdEmpleadoGlobal,
        proceso: 5, //promoción de empleado
        opcion: 2
    }
}

