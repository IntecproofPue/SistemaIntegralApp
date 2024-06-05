function ValidarDatosPuesto() {
    // Obtener los valores de los elementos del formulario
    var TipoContratacionSeleccionado = document.getElementById('tipoContratacion');
    var ContratacionPartes = TipoContratacionSeleccionado.value.split('-');
    var iIdConstanteContratacion = ContratacionPartes[0];
    var iClaveContratacion = ContratacionPartes[1];

    // Asignar los valores a los campos ocultos
    document.getElementById('iIdConstanteContratacion').value = iIdConstanteContratacion;
    document.getElementById('iClaveContratacion').value = iClaveContratacion;


    // Obtener los valores de los elementos del formulario
    var HorasSeleccionadas = document.getElementById('horasLaborales');
    var HorasPartes = HorasSeleccionadas.value.split('-');
    var iIdConstanteHoras = HorasPartes[0];
    var iClaveHoras = HorasPartes[1];

    // Asignar los valores a los campos ocultos
    document.getElementById('iIdConstanteHoras').value = iIdConstanteHoras;
    document.getElementById('iClaveHoras').value = iClaveHoras;


    // Obtener los valores de los elementos del formulario
    var NivelSeleccionado = document.getElementById('nivelOrganizacional');
    var NivelPartes = NivelSeleccionado.value.split('-');
    var iIdConstanteNivel = NivelPartes[0];
    var iClaveNivel = NivelPartes[1];

    // Asignar los valores a los campos ocultos
    document.getElementById('iIdConstanteNivel').value = iIdConstanteNivel;
    document.getElementById('iClaveNivel').value = iClaveNivel;

    // Crear un objeto con los datos del formulario
    var datosFormularioPuesto = {
        nombrePuesto: document.getElementById('nombrePuesto').value,
        descripcionPuesto: document.getElementById('descripcionPuesto').value,
        iIdConstanteNivel: iIdConstanteNivel,
        iClaveNivel: iClaveNivel,
        iIdConstanteContratacion: iIdConstanteContratacion,
        iClaveContratacion: iClaveContratacion,
        iIdConstanteHoras: iIdConstanteHoras,
        iClaveHoras: iClaveHoras,
        salarioNeto: document.getElementById('salarioNeto').value,
        salarioFiscal: document.getElementById('salarioFiscal').value,
        salarioComplementario: document.getElementById('salarioComplementario').value
    };

    // Crear una instancia de XMLHttpRequest
    var datosPuesto = new XMLHttpRequest();

    // Configurar la solicitud
    datosPuesto.open('POST', 'validarDatosPuesto.php', true);
    datosPuesto.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    // Convertir el objeto de datos a una cadena de consulta URL
    var formData = new URLSearchParams(datosFormularioPuesto).toString();

    // Enviar la solicitud
    datosPuesto.send(formData);

    // Manejar la respuesta
    datosPuesto.onload = function () {
        if (datosPuesto.status === 200) {
            var respuesta = JSON.parse(datosPuesto.responseText);
            if (respuesta.bResultado == 1) {
                localStorage.clear();
                console.log("Exito");
                alert(respuesta.vchMensaje);
                localStorage.setItem('datosPuesto', JSON.stringify(respuesta));
                window.location.href = "../consulEmpleado/consultaPuesto.php";
            } else {
                console.error("Mensaje Error: " + respuesta.vchMensaje);
                alert(respuesta.vchMensaje)
            }
        } else {
            console.error("Error en la solicitud al servidor");
        }
    };
}

function consultaIndividualPuesto() {

    var DatosPuesto = localStorage.getItem('datosConsultaIndividual');

    var bResultadoPuesto = JSON.parse(DatosPuesto);
    var iIdEmpleadoPuesto = bResultadoPuesto.iIdPuesto;


    var datosPuesto = new XMLHttpRequest();

    datosPuesto.open('POST', 'prcConsultaPuesto.php', true);

    var formData = new URLSearchParams();
    formData.append('idPuesto', iIdEmpleadoPuesto);

    datosPuesto.send(formData);

    datosPuesto.onload = function () {
        if (datosPuesto.status === 200) {
            var respuesta = JSON.parse(datosPuesto.responseText);

            if (respuesta[0].bResultado === 1) {

                localStorage.setItem('datosConsultaPuesto', JSON.stringify(respuesta));

                var datosPuestoConsulta = localStorage.getItem('datosConsultaPuesto', JSON.stringify(respuesta))

                if (datosPuestoConsulta) {
                    var bResultado = JSON.parse(datosPuestoConsulta);


                    for (var i = 0; i < bResultado.length; i++) {
                        var iIdPuesto = document.getElementById('iIdPuesto');
                        iIdPuesto.value = bResultado[i].iIdPuesto || 0;

                        var vchPuesto = document.getElementById('vchPuesto');
                        vchPuesto.value = bResultado[i].vchPuesto || '';

                        var vchDescripcionPuesto = document.getElementById('vchDescripcionPuesto');
                        vchDescripcionPuesto.value = bResultado[i].vchDescripcion || '';

                        var vchTipoContratacion = document.getElementById('vchTipoContratacion');
                        vchTipoContratacion.value = bResultado[i].vchTipoContratacion || '';

                        var vchHorasLaborales = document.getElementById('vchHorasLaborales');
                        vchHorasLaborales.value = bResultado[i].vchHorasLaborales || '';


                        const pesoFinal = new Intl.NumberFormat('es-MX', {
                            style: 'currency',
                            currency: 'MXN',
                            minimumFractionDigits: 2
                        });

                        var mSalarioNeto = document.getElementById('mSalarioNeto');
                        mSalarioNeto.value = pesoFinal.format(bResultado[i].mSalarioNeto) || 0;

                        var mSalarioFiscal = document.getElementById('mSalarioFiscal');
                        mSalarioFiscal.value = pesoFinal.format(bResultado[i].mSalarioFiscal) || 0;

                        var mSalarioComplementario = document.getElementById('mSalarioComplementario');
                        mSalarioComplementario.value = pesoFinal.format(bResultado[i].mSalarioComplemento) || 0;
                    }
                } else {
                    console.error("No existe información en datosPuestoConsulta");
                }
            } else {
                console.error("Mensaje de error: ", respuesta.vchMensaje);
            }

        } else {
            console.error("Error en la solicitud al servidor");
        }
    };
}

function consultarDatosPuesto() {

    var datosConsultaPuesto = {
        idPuesto: document.getElementById('iIdPuesto').value,
        nombrePuesto: document.getElementById('vchPuesto').value,
        iIdConstanteContratacion: document.getElementById('iIdTipoContratacion').value,
        opcion: 1
    };

    localStorage.setItem('datosRequestPuesto', JSON.stringify(datosConsultaPuesto));

    var datosPuestoRequest = new XMLHttpRequest();

    datosPuestoRequest.open('POST', 'prcConsultaPuesto.php', true);


    datosPuestoRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    var formData = new URLSearchParams(datosConsultaPuesto).toString();
    datosPuestoRequest.send(formData);

    console.log(formData);

    datosPuestoRequest.onload = function () {
        if (datosPuestoRequest.status === 200) {
            console.log(datosPuestoRequest.responseText);
            var puestoIndividual = JSON.parse(datosPuestoRequest.responseText);

            if (puestoIndividual.bResultado === 1) {
                if (puestoIndividual.length === 1) {
                    localStorage.setItem('datosPuestoInvdividual', JSON.stringify(puestoIndividual));
                    window.location.href = 'consultaIndividual.php';

                } else {

                }
            } else {
                console.error("Mensaje Error: " + puestoIndividual.vchMensaje);
                alert(puestoIndividual.vchMensaje);
                respuestaFinal = puestoIndividual.vchMensaje;
            }
        }
    };

}




