function ValidarBaja() {
    var datosBajaEmpleado = {
        fechaBaja: document.getElementById('dtFechaBajaModificacion').value,
        empleado: window.iIdEmpleadoGlobal,
        proceso: 3, //baja de empleado
        opcion: 2
    };


    try{
        localStorage.setItem('datosBaja', JSON.stringify(datosBajaEmpleado));
    }catch (error){
        console.error("Error para almacenar información en LocalStorage");
        return;
    }


    var datosBajaRequest = new  XMLHttpRequest();

    datosBajaRequest.open('POST', 'prcActualizaEmpleado.php', true);
    datosBajaRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    var formData =  new URLSearchParams(datosBajaEmpleado).toString();

    datosBajaRequest.send(formData);

    datosBajaRequest.onload = function () {
        if (datosBajaRequest.status == 200) {
            try {
                console.log(datosBajaRequest.responseText);

                var respuesta = JSON.parse(datosBajaRequest.responseText);
                if (respuesta.bResultado == 1) {
                    console.log(respuesta);
                    alert(respuesta.vchMensaje);

                    window.location.href = "consultaEmpleado.php";
                } else {
                    console.error("bResultado: "+ respuesta.bResultado);
                    console.error("Campo error: " + respuesta.vchCampoError);
                    console.error("Mensaje de error: " + respuesta.vchMensaje);
                    alert(respuesta.vchMensaje);
                }
            } catch (error) {
                console.error("Error parsing JSON response", error);
                alert("Error processing the server response. Please try again.");
            }
        } else {
            console.error("Error en la solicitud al servidor: " + datosBajaRequest.status);
            alert("Server request failed with status: " + datosBajaRequest.status);
        }
    };
}


function ValidarReactivacion() {
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

function ValidarPromocion() {

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

