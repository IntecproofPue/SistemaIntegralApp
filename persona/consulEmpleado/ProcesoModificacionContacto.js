function validarTipoContacto() {
    var tipoContacto = document.getElementById("tipoContactoAgregar").value;
    var contactoInput = document.getElementById("vchContactoAgregar");

    // Reinicia el valor del campo de contacto al cambiar el tipo de contacto
    contactoInput.value = "";
    contactoInput.disabled = false;

    // Limpia clases de estilo relacionadas con errores
    contactoInput.classList.remove("invalid");

    // Desvincula el evento input para evitar interferencias
    contactoInput.removeEventListener("input", validarCampo);

    // Agrega el evento input para validar el nuevo campo
    if (tipoContacto === "email" || tipoContacto === "Telefono") {
        contactoInput.addEventListener("input", validarCampo);
    }
}

function validarCampo(event) {
    var tipoContacto = document.getElementById("tipoContactoAgregar").value;
    var contactoInput = event.target;

    if (tipoContacto === "email") {
        var emailValue = contactoInput.value.trim();
        if (!validarEmail(emailValue)) {
            contactoInput.classList.add("invalid");
        } else {
            contactoInput.classList.remove("invalid");
        }
    } else if (tipoContacto === "Telefono") {
        var telefonoValue = contactoInput.value.trim();
        contactoInput.value = telefonoValue.replace(/[^0-9]/g, ''); // Solo permite números

        if (telefonoValue.length > 10 || !(/^\d+$/.test(telefonoValue))) {
            contactoInput.classList.add("invalid");
        } else {
            contactoInput.classList.remove("invalid");
        }
    }
}


function mostrarDatosContacto() {

    var datosContacto = localStorage.getItem('datosConsultaIndividual');
    var bResultadoContacto = JSON.parse(datosContacto);
    var iIdPersonaContacto = bResultadoContacto.iIdPersona;

    var datosContactos = new XMLHttpRequest();

    datosContactos.open('POST', 'prcConsultaContacto.php', true);

    var formData = new URLSearchParams();
    formData.append('iIdPersonaContacto', iIdPersonaContacto);

    datosContactos.send(formData);

    datosContactos.onload = function () {
        if (datosContactos.status === 200) {
            var respuesta = JSON.parse(datosContactos.responseText);

            if (respuesta[0].bResultado === 1) {
                localStorage.setItem('datosConsultaContacto', JSON.stringify(respuesta));

                var datosContactoConsulta = localStorage.getItem('datosConsultaContacto');

                if (datosContactoConsulta) {
                    var bResultado = JSON.parse(datosContactoConsulta);

                    let longitudContacto = bResultado.length;

                    insertarContactos(longitudContacto);

                    for (var i = 0; i < bResultado.length; i++) {
                        var iIdContacto = 'iIdContacto' + i;
                        var iIdTipoContacto = 'vchTipoContacto' + i;
                        var vchContacto = 'vchContacto' + i;
                        var iIdUsuarioUlt = 'ilUsuarioUltModificacion' + i;
                        var fechaUltModif = 'dtFechaUltModificacion' + i;

                        var iIdContacto = document.getElementById(iIdContacto);
                        iIdContacto.value = bResultado[i].iIdPersonasContactos || 0;

                        var vchTipoContactoForm = document.getElementById(iIdTipoContacto);
                        vchTipoContactoForm.value = bResultado[i].vchTipoContacto || '';

                        var vchContactoForm = document.getElementById(vchContacto);
                        vchContactoForm.value = bResultado[i].vchContacto;

                        var vchUsuarioForm = document.getElementById(iIdUsuarioUlt);
                        vchUsuarioForm.value = bResultado[i].vchUsuarioUltModif;


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
                        var dFechaModificacion = document.getElementById(fechaUltModif);
                        dFechaModificacion.value = fechaModifFinal

                    }
                }
            }
        }
    }
}


function insertarContactos(longitudContacto) {
    var contenedor = document.getElementById('agregaContacto');
    contenedor.innerHTML = agregarListaContactos(longitudContacto);


    var selector = `[id^='buttonBaja']`;

    var selectorAgregar = '#buttonAgregar';

    var contactoSeleccionado = [];

    document.querySelectorAll(selector).forEach((button) => {
        button.addEventListener('click', function (event) {
            event.preventDefault();

            var indexStr = this.id.replace('buttonBaja', '');
            var indexInt = parseInt(indexStr, 10);


            if (isNaN(indexInt)) {
                console.error('Índice inválido', indexInt);
                return;
            }

            var registro = document.querySelector(`.candidate:nth-child(${indexInt + 1})`);

            if (!registro){
                console.error ("No hay ningún registro");
                return;
            }

            var iIdContactoSeleccionado = registro.querySelector('#iIdContacto' + indexInt).value;

            contactoSeleccionado.push({
                idContacto: iIdContactoSeleccionado
            });


            console.log("Esto es el id del contacto: ", iIdContactoSeleccionado);

            console.log(contactoSeleccionado);

            localStorage.setItem('modificarContacto', 'true');

            registro.style.display = 'none';

            var botonAgregar = document.querySelector(selectorAgregar);
            if (botonAgregar) {
                botonAgregar.style.display = 'block';
            }

            try {
                console.log("Array de objetos: ", contactoSeleccionado);
                localStorage.setItem('contactosSeleccionados', JSON.stringify(contactoSeleccionado));
                console.log("Todos los contactos seleccionados almacenados en localStorage:", contactoSeleccionado);
            } catch (error) {
                console.error("Error al guardar en localStorage:", error);
            }

        });
    });

}


function agregarNuevoContacto(){

    var bDatosPersona = localStorage.getItem('datosConsultaIndividual');
    var iIdPersonaPreliminar = JSON.parse(bDatosPersona);

    var iIdPersonaContacto = iIdPersonaPreliminar.iIdPersona;


    var iNoOperacion = localStorage.getItem('iNoOperacion') !== null ? parseInt(localStorage.getItem('iNoOperacion')) : 0;

    var TipoContactoSeleccionado = document.getElementById('tipoContactoAgregar');
    var TipoContactoPartes = TipoContactoSeleccionado.value.split('-');
    var iIdTipoContacto = TipoContactoPartes[0];
    var iClaveContacto = TipoContactoPartes[1];



    console.log(iIdTipoContacto);
    console.log(iClaveContacto);


    document.getElementById('iIdConstanteContacto').value = iIdTipoContacto;
    document.getElementById('iClaveContactoAgregar').value = iClaveContacto;




    var datosContactoNuevo = {
        iIdConstanteContacto: iIdTipoContacto,
        iClaveContacto: iClaveContacto,
        contacto: document.getElementById('vchContactoAgregar').value,
        operacion: iNoOperacion,
        persona: iIdPersonaContacto,
        proceso: 2
    };


    var datosContactoRequest = new XMLHttpRequest();
    datosContactoRequest.open('POST', '/SisAdmonIntecproof/persona/altaPersona/prcAltaContacto.php', true);
    datosContactoRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    var formData = new URLSearchParams(datosContactoNuevo).toString();

    datosContactoRequest.send(formData);

    datosContactoRequest.onload = function () {
        if (datosContactoRequest.status === 200){
            try{
                console.log(datosContactoRequest.responseText);
                var respuesta = JSON.parse(datosContactoRequest.responseText);

                if (respuesta.bResultado === 1){
                    var iNoOperacionResult = respuesta.iNoOperacion.toString(); //Se pasa con .toString para almacenarse como int

                    localStorage.setItem('iNoOperacion', iNoOperacionResult);

                    console.log(respuesta);
                    alert(respuesta.vchMensaje);
                    window.location.href = "DatosEmpleado.php";
                }else{
                    console.error("Mensaje de error: ", +respuesta.vchMensaje);
                    alert(respuesta.vchMensaje);
                }
            }catch(error){
                console.error("Error al parsear la información en formato JSON", error);
                alert("Error procesando la información del servidor, favor de reintentar");
            }
        } else {
            console.error("Error en la solicitud al servidor: " + datosContactoRequest.status);
            alert("Falló la respuesta del servidor con status: " + datosContactoRequest.status);
        }

    }

}



function actualizarContacto(iIdContactoSeleccionado){

    var bDatosContacto = localStorage.getItem('datosConsultaIndividual');
    var datosPersonaContacto = JSON.parse(bDatosContacto);
    var iIdPersonaContacto = datosPersonaContacto.iIdPersona;
    
    console.log("iIdPersona: ", iIdPersonaContacto); 
    
    var iIdContacto = iIdContactoSeleccionado;
    
    console.log("Esto es iIdContacto", iIdContacto);


    var iNoOperacion = localStorage.getItem('iNoOperacion') !== null ? parseInt(localStorage.getItem('iNoOperacion'), 10) : 0;

    console.log(iNoOperacion);


    var datosActualizarContacto = {
        iIdContacto:  iIdContacto,
        iIdPersona: iIdPersonaContacto,
        opcion: 2,
        proceso: 2,
        operacion: iNoOperacion
    };
    
    console.log(datosActualizarContacto); 
    
    var datosActualizarContactoRequest = new XMLHttpRequest();
    datosActualizarContactoRequest.open('POST', 'prcActualizarContacto.php',true);
    datosActualizarContactoRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    var formData = new URLSearchParams(datosActualizarContacto).toString();

    datosActualizarContactoRequest.send(formData);

    datosActualizarContactoRequest.onload = function (){
        if (datosActualizarContactoRequest.status === 200){
            try{
                console.log(datosActualizarContactoRequest.responseText);

                var respuesta = JSON.parse(datosActualizarContactoRequest.responseText);

                if (respuesta.bResultado === 1){

                    var iNoOperacionResult = respuesta.iNoOperacion.toString();

                    localStorage.setItem('iNoOperacion', iNoOperacionResult);
                    console.log(respuesta.iNoOperacion);
                    console.log(respuesta.bResultado);
                    console.log(respuesta.vchMensaje);


                    alert(respuesta.vchMensaje);
                    window.location.href = "consultaContacto.php";
                }else{
                    console.error("Mensaje de error: ", respuesta.vchMensaje);
                    alert(respuesta.vchMensaje);
                }
            }catch(error){
                console.error("Error al parsear la información en formato JSON", error);
                alert("Error, procesando la información del servidor, favor de reintentar");
            }
        }else{
            console.error("error en la solicitud del servidor: " + datosActualizarContactoRequest.status);
            alert("Falló la respuesta del servidor con status: "+datosActualizarContactoRequest.status);
        }
    }

}


