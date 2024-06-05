function consultarDomicilio() {
    var DatosEmpleado = localStorage.getItem('datosConsultaIndividual');

    var bResultadoEmpleado = JSON.parse(DatosEmpleado);
    var iIdPersonaDomicilio = bResultadoEmpleado.iIdPersona;

    // console.log(iIdPersonaDomicilio);

    var datosDomicilio = new XMLHttpRequest();

    datosDomicilio.open('POST', 'prcConsultaDomicilio.php', true);

    var formData = new URLSearchParams();
    formData.append('iIdPersonaDomicilio', iIdPersonaDomicilio);

    datosDomicilio.send(formData);

    // Manejar la respuesta
    datosDomicilio.onload = function () {
        if (datosDomicilio.status === 200) {
            var respuesta = JSON.parse(datosDomicilio.responseText);

            if (respuesta[0].bResultado === 1) {
                localStorage.setItem('datosConsultaDomicilio', JSON.stringify(respuesta));

                var datosDomicilioConsulta = localStorage.getItem('datosConsultaDomicilio', JSON.stringify(respuesta))

                if (datosDomicilioConsulta) {
                    var bResultado = JSON.parse(datosDomicilioConsulta);

                    for (var i = 0; i < bResultado.length; i++) {
                        var vchEntidad = document.getElementById('vchEntidadC');
                        vchEntidad.value = bResultado[i].vchEntidadFederativa || '';

                        var vchMunicipioConsulta = document.getElementById('vchMunicipioC');
                        vchMunicipioConsulta.value = bResultado[i].vchMunicipio || '';

                        var vchLocalidadConsulta = document.getElementById('vchLocalidadC');
                        vchLocalidadConsulta.value = bResultado[i].vchLocalidad || '';

                        var iIdCodigoPostalConsulta = document.getElementById('iIdCodigoPostalC');
                        iIdCodigoPostalConsulta.value = bResultado[i].iCodigoPostal || '';

                        var vchColoniaConsulta = document.getElementById('vchColoniaC');
                        vchColoniaConsulta.value = bResultado[i].vchColonia || '';

                        var vchCalleConsulta = document.getElementById('vchCalleC');
                        vchCalleConsulta.value = bResultado[i].vchCalle || '';

                        var vchLetraConsulta = document.getElementById('vchLetraC');
                        vchLetraConsulta.value = bResultado[i].vchLetra || '';

                        var vchNoExtConsulta = document.getElementById('vchNoExtC');
                        vchNoExtConsulta.value = bResultado[i].vchNumeroExterior || '';

                        var vchNoIntConsulta = document.getElementById('vchNoIntC');
                        vchNoIntConsulta.value = bResultado[i].vchNumeroInterior || '';

                        var iIdUsuarioUltModificacionConsulta = document.getElementById('vchUsuarioUltModificacionC');
                        iIdUsuarioUltModificacionConsulta.value = bResultado[i].vchUsuarioUltModif || '';


                        var dFechaUltModifOriginal = bResultado[i].dtFechaUltModificacion.date;
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
                        var dFechaModificacionConsulta = document.getElementById('dtFechaUltModificacionC');
                        dFechaModificacionConsulta.value = fechaModifFinal || '';

                    }
                }

            } else {
                console.error("Mensaje Error: " + respuesta.vchMensaje);
                alert(respuesta.vchMensaje)
            }
        } else {
            console.error("Error en la solicitud al servidor");
        }
    };
}


function habilitarBotonesDomicilio() {
    if (localStorage.getItem('habilitarBotones') === 'true') {
        const habilitarBotonDomicilio = document.querySelectorAll('.boton-intec');
        habilitarBotonDomicilio.forEach(boton => {
            boton.disabled = false;
            boton.style.display = 'block';
        });
    }
}


function MostrarDatosDomicilio(bResultadoDomicilio) {
    //Entidad Federativa

    for (var i = 0; i < bResultadoDomicilio.length; i++) {

        var iIdEntidadModificacion = bResultadoDomicilio[i].iIdEntidadFederativa;
        var selectElementEntidad = document.getElementById('iIdEntidadFederativaModif');

        for (var k = 0; k < selectElementEntidad.options.length; k++) {
            var optionEntidad = selectElementEntidad.options[k];
            var optionIdEntidad = parseInt(optionEntidad.value.split('-')[0]);

            if (optionIdEntidad === iIdEntidadModificacion) {
                optionEntidad.selected = true;
                break;
            }
        }

        //Municipio

        var vchMunicipioEditar = document.getElementById('vchMunicipioModif');
        vchMunicipioEditar.value = bResultadoDomicilio[i].vchMunicipio


        //Localidad
        var vchLocalidadModif = document.getElementById('vchLocalidadModif');
        vchLocalidadModif.value = bResultadoDomicilio[i].vchLocalidad;

        //Colonia
        var vchColoniaModif = document.getElementById('vchColoniaModif');
        vchColoniaModif.value = bResultadoDomicilio[i].vchColonia;

        //Código postal
        var iCodigoPostalModif = document.getElementById('iCodigoPostalModif');
        iCodigoPostalModif.value = bResultadoDomicilio[i].iCodigoPostal;

        //Calle
        var vchCalleModif = document.getElementById('vchCalleModif');
        vchCalleModif.value = bResultadoDomicilio[i].vchCalle;

        //No. Ext
        var vchNoExtModif = document.getElementById('vchNoExtModif');
        vchNoExtModif.value = bResultadoDomicilio[i].vchNumeroExterior;

        //No. Int
        var vchNoIntModif = document.getElementById('vchNoIntModif');
        vchNoIntModif.value = bResultadoDomicilio[i].vchNumeroInterior;

        //Letra
        var vchLetraModif = document.getElementById('vchLetraModif');
        vchLetraModif.value = bResultadoDomicilio[i].vchLetra;

    }
}


function obtenerDatosDomicilio() {
    var datosDomicilio = localStorage.getItem('datosConsultaDomicilio');

    if (datosDomicilio) {
        var bResultadoDomicilio = JSON.parse(datosDomicilio);
        MostrarDatosDomicilio(bResultadoDomicilio);
    }
}

function ModificacionDomicilio() {
    var EntidadFederativaSeleccionada = document.getElementById('iIdEntidadFederativaModif');
    var EntidadFederativaPartes = EntidadFederativaSeleccionada.value.split('-');
    var iIdEntidadFederativa = EntidadFederativaPartes[0];
    var iClaveEntidad = EntidadFederativaPartes[1];

    document.getElementById('iIdConstanteSedeModificar').value = iIdEntidadFederativa;
    document.getElementById('iClaveSedeModificar').value = iClaveEntidad;

    var datosDomicilioModificacion = localStorage.getItem('datosConsultaDomicilio');
    var bResultadoDomicilioModificacion = JSON.parse(datosDomicilioModificacion);
    var iIdDomicilio = bResultadoDomicilioModificacion[0].iIdPersonasDomicilios;
    var iIdPersona = bResultadoDomicilioModificacion[0].iIdPersona;

    document.getElementById('iIdDomicilioModificar').value = iIdDomicilio;

    var iNoOperacion = localStorage.getItem('iNoOperacion') !== null ? parseInt(localStorage.getItem('iNoOperacion')) : 0;

    var datosDomicilioFormulario = {
        iIdConstanteEstado: iIdEntidadFederativa,
        iClaveEstado: iClaveEntidad,
        vchMunicipio: document.getElementById('vchMunicipioModif').value,
        vchLocalidad: document.getElementById('vchLocalidadModif').value,
        codigoPostal: document.getElementById('iCodigoPostalModif').value,
        vchColonia: document.getElementById('vchColoniaModif').value,
        vchCalle: document.getElementById('vchCalleModif').value,
        vchLetra: document.getElementById('vchLetraModif').value,
        vchNoExt: document.getElementById('vchNoExtModif').value,
        vchNoInt: document.getElementById('vchNoIntModif').value,
        persona: iIdPersona,
        operacion: iNoOperacion,
        domicilio: iIdDomicilio,
        opcion: 2,
        proceso: 2
    };


    var datosDomicilioRequest = new XMLHttpRequest();
    datosDomicilioRequest.open('POST', 'prcActualizaDomicilio.php', true);
    datosDomicilioRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    var formData = new URLSearchParams(datosDomicilioFormulario).toString();

    datosDomicilioRequest.send(formData);

    datosDomicilioRequest.onload = function () {
        if (datosDomicilioRequest.status === 200) {
            try {
                var respuesta = JSON.parse(datosDomicilioRequest.responseText);

                if (respuesta.bResultado === 1) {
                    localStorage.setItem('iNoOperacion', JSON.stringify(respuesta.iNoOperacion)); //Se almacena el número de operación para futuros cambios

                    console.log(respuesta);
                    alert(respuesta.vchMensaje);
                    window.location.href = "DatosEmpleado.php";
                } else {
                    console.error("Mensaje de error: " + respuesta.vchMensaje);
                    alert(respuesta.vchMensaje);
                }
            } catch (error) {
                console.error("Error parsing JSON response", error);
                alert("Error procesando la información del servidor, favor de reintentar");
            }
        } else {
            console.error("Error en la solicitud al servidor: " + datosDomicilioRequest.status);
            alert("Falló la respuesta del servidor con status: " + datosDomicilioRequest.status);
        }
    };

}