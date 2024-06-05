function enviarFormularios() {
    // Obtener los valores de los elementos del formulario para sede
    var SedeSeleccionada = document.getElementById('iIdSede');
    var SedePartes = SedeSeleccionada.value.split('-');
    var iIdConstanteSede = SedePartes[0];
    var iClaveSede = SedePartes[1];


    // Asignar los valores a los campos ocultos
    document.getElementById('iIdConstanteSede').value = iIdConstanteSede;
    document.getElementById('iClaveSede').value = iClaveSede;


    function obtenerDatosFormulario(iIdFormulario) {
        var formData = $('#' + iIdFormulario).serializeArray();
        var formDataObj = {};
        $(formData).each(function (i, field) {
            formDataObj[field.name] = field.value;
        });
        return formDataObj;
    }

    var datosPersona = getFormulario('datosPersona');
    var datosDomicilio = getFormulario('datosDomicilio');
    var datosContacto = getFormulario('datosContacto');
    var datosEmpleado = obtenerDatosFormulario('FormEmpleadoAlta');


    let data = {
        datosPersona: JSON.stringify(datosPersona),
        datosDomicilio: JSON.stringify(datosDomicilio),
        datosContacto: JSON.stringify(datosContacto),
        datosEmpleado: JSON.stringify(datosEmpleado)
    };

    console.log(data);

    // Crear una instancia de XMLHttpRequest
    var request = new XMLHttpRequest();

    // Configurar la solicitud
    request.open('POST', 'validarDatosEmpleado.php', true);
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    function getFormulario(key) {
        let result = localStorage.getItem(key)
        return JSON.parse(result);
    }

    // Enviar la solicitud
    let json = data;
    request.send(new URLSearchParams(json).toString());
    console.log(json);

    //Obtener la respuesta
    request.onload = function () {
        if (request.status === 200) {
            var respuesta = JSON.parse(request.responseText);
            if (respuesta.bResultado === 1) {
                alert(respuesta.vchMensaje);
                localStorage.setItem('datosEmpleado', JSON.stringify(respuesta));
                console.log("Este es el número de operación: ", respuesta.iNoOperacion);

                var buttonEmpleado = document.getElementById('registrarEmpleado');
                buttonEmpleado.disabled = true;
                document.getElementById('registrarEmpleado').style.display = 'none';
                document.getElementById('registrarEmpleado').style.visibility = 'hidden';


                var buttonCancelar = document.getElementById('Cancelar');
                buttonCancelar.disabled = true;
                document.getElementById('Cancelar').style.display = 'none';
                document.getElementById('Cancelar').style.visibility = 'hidden';

                var buttonLimpiar = document.getElementById('limpiar');
                buttonLimpiar.disabled = true;
                document.getElementById('limpiar').style.display = 'none';
                document.getElementById('limpiar').style.visibility = 'hidden';


                function deshabilitarFormulario() {
                    var inputs = document.getElementsByTagName('input');
                    for (var i = 0; i < inputs.length; i++) {
                        inputs[i].disabled = true;
                    }

                    var selects = document.getElementsByTagName('select');
                    for (var i = 0; i < selects.length; i++) {
                        selects[i].disabled = true;
                    }
                }

                deshabilitarFormulario();


                var botonAgregar = document.createElement('button');
                botonAgregar.type = 'button';
                botonAgregar.className = 'button';
                botonAgregar.id = 'botonAgregaDocumento';
                botonAgregar.textContent = 'AGREGAR DOCUMENTO';
                document.getElementById('botonAgregarDocumentos').appendChild(botonAgregar);

                botonAgregar.addEventListener('click', function () {
                    function habilitarFormulario() {
                        var inputs = document.getElementsByTagName('input');
                        for (var i = 0; i < inputs.length; i++) {
                            inputs[i].disabled = false;
                        }

                        var selects = document.getElementsByTagName('select');
                        for (var i = 0; i < selects.length; i++) {
                            selects[i].disabled = false;
                        }
                    }
                    habilitarFormulario();
                    /*


                    var documentos = [];
                    var nuevoDocumentoContainer = document.createElement('div');
                    nuevoDocumentoContainer.className = 'col-md-12';

                    var nuevoTipoDocumento = document.createElement('div');
                    nuevoTipoDocumento.innerHTML = `
                        <div class="form-group">
                            <select class="form-control" id="iIdDocumentoAgregar" name="iIdDocumentoAgregar">
                                <option value="">TIPO DE DOCUMENTO:</option>
                                <?php foreach ($resultadoDocumento as $documento): ?>
                                    <option value="<?= $documento['iIdConstante'] . '-' . $documento['iClaveCatalogo'] ?>">
                                        [<?= $documento['iClaveCatalogo'] ?>] - <?= $documento['vchDescripcion'] ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group file-input-wrap">
                            <option value="">CARGAR DOCUMENTO:</option>
                            <label for="up-cv">
                                <input id="up-cv" type="file" onchange="cargarDocumento(event)">
                                <i data-feather="upload-cloud"></i>
                                <p id="nombreArchivo">NOMBRE DEL ARCHIVO
                                <p>(pdf,zip,doc,docx)</p></p>
                            </label>
                        </div>
                        `;*/


                });

                var botonFinalizar = document.createElement('button');
                botonFinalizar.type = 'button';
                botonFinalizar.className = 'button';
                botonFinalizar.id = 'botonFinalizar';
                botonFinalizar.textContent = 'FINALIZAR';

                document.getElementById('botonAgregarDocumentos').appendChild(botonFinalizar);
                
                botonFinalizar.addEventListener('click', function () {
                    window.location.href = ('../consulEmpleado/consultaEmpleado.php');
                });

            } else {
                console.error("Mensaje Error: " + respuesta.vchMensaje);
                alert(respuesta.vchMensaje)
            }
        } else {
            console.error("Error en la solicitud al servidor");
        }
    };
}




function RegresarInicio(){
    localStorage.clear(); //Limpiar el localStorage para no almacenar basura
    window.location.href = ("altaPersona.php");
}

function registrarDocumentos() {
    console.log("Si está entrando al botón");

    try {
        var datosRegistroEmpleado = localStorage.getItem('datosEmpleado');
        var bDatosRegistroEmpleado = JSON.parse(datosRegistroEmpleado);

        var TipoDocumentoSeleccionado = document.getElementById('iIdDocumentoAgregar');
        var TipoDocumentoPartes = TipoDocumentoSeleccionado.value.split('-');
        var iIdConstanteDocumento = TipoDocumentoPartes[0];
        var iClaveDocumento = TipoDocumentoPartes[1];

        document.getElementById('iIdConstanteDocumento').value = iIdConstanteDocumento;
        document.getElementById('iClaveDocumento').value = iClaveDocumento;

        console.log(bDatosRegistroEmpleado);

    } catch (error) {
        console.error("Ocurrió un error en la asignación de variables");
    }

    try {
        var datosDocumentosEmpleado = {
            empleado: bDatosRegistroEmpleado.iIdEmpleado,
            iIdConstanteDocumento: iIdConstanteDocumento,
            iClaveDocumento: iClaveDocumento,
            operacion: bDatosRegistroEmpleado.iNoOperacion
        };

        console.log(datosDocumentosEmpleado);
        localStorage.setItem('datosEnviarDocumentos', JSON.stringify(datosDocumentosEmpleado));

    } catch (error) {
        console.error("Ocurrió un error en el llenado del formulario datosDocumentosEmpleado");
    }


    // Crear un FormData object
    var formData = new FormData();
    formData.append('empleado',datosDocumentosEmpleado.empleado);
    formData.append('iIdConstanteDocumento',datosDocumentosEmpleado.iIdConstanteDocumento);
    formData.append('iClaveDocumento',datosDocumentosEmpleado.iClaveDocumento);
    formData.append('operacion',datosDocumentosEmpleado.operacion);

    var fileInput = document.querySelector('#up-cv');
    formData.append('documento', fileInput.files[0]);

    var datosDocumentos = new XMLHttpRequest();
    datosDocumentos.open('POST', 'prcAltaDoctos.php', true);
    datosDocumentos.send(formData);

    datosDocumentos.onload = function () {
        if (datosDocumentos.status === 200) {
            console.log("Hubo una respuesta con status 200");
            try {
                var respuesta = JSON.parse(datosDocumentos.responseText);
                if (respuesta.bResultado === 1) {
                    console.log(respuesta);
                    alert(respuesta.vchMensaje);
                    window.location.href = '../consulEmpleado/consultaEmpleado.php';
                } else {
                    console.error("Mensaje de error: ", respuesta.vchMensaje);
                    alert(respuesta.vchMensaje);
                }
            } catch (error) {
                console.error('Error al parsear la información del formato JSON', error);
                alert('Error, procesando la información del servidor. Por favor reintente');
            }
        } else {
            console.error("Error en la solicitud del servidor", datosDocumentos.status);
            alert("Falló la respuesta del servidor con el estatus: ", datosDocumentos.status);
        }
    };
}

function ValidarDatosDomicilio() {
    // Obtener los valores de los elementos del formulario
    var EstadoSeleccionado = document.getElementById('estadoLista');
    var EstadoPartes = EstadoSeleccionado.value.split('-');
    var iIdConstanteEstado = EstadoPartes[0];
    var iClaveEstado = EstadoPartes[1];

    // Asignar los valores a los campos ocultos
    document.getElementById('iIdConstanteEstado').value = iIdConstanteEstado;
    document.getElementById('iClaveEstado').value = iClaveEstado;

    // Crear un objeto con los datos del formulario
    var datosFormulario = {
        estadoLista: EstadoSeleccionado.value,
        vchMunicipio: document.getElementById('vchMunicipio').value,
        vchLocalidad: document.getElementById('vchLocalidad').value,
        codigoPostal: document.getElementById('codigoPostal').value,
        vchColonia: document.getElementById('vchColonia').value,
        vchCalle: document.getElementById('vchCalle').value,
        vchLetra: document.getElementById('vchLetra').value,
        vchNoExt: document.getElementById('vchNoExt').value,
        vchNoInt: document.getElementById('vchNoInt').value,
        iIdConstanteEstado: iIdConstanteEstado,
        iClaveEstado: iClaveEstado
    };

    // Crear una instancia de XMLHttpRequest
    var datosDomicilio = new XMLHttpRequest();

    // Configurar la solicitud
    datosDomicilio.open('POST', 'validarDatosDomicilio.php', true);
    datosDomicilio.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    // Convertir el objeto de datos a una cadena de consulta URL
    var formData = new URLSearchParams(datosFormulario).toString();

    // Enviar la solicitud
    datosDomicilio.send(formData);

    // Manejar la respuesta
    datosDomicilio.onload = function() {
        if (datosDomicilio.status === 200) {
            var respuesta = JSON.parse(datosDomicilio.responseText);
            if (respuesta.bResultado === 1) {
                console.log(respuesta);
                localStorage.setItem('datosDomicilio',JSON.stringify(datosFormulario));
                window.location.href = "altaContacto.php";
            } else {
                console.error("Mensaje Error: " + respuesta.vchMensaje);
                alert(respuesta.vchMensaje)
            }
        } else {
            console.error("Error en la solicitud al servidor");
        }
    };
}

