function consultarDocumentos() {
    var datosDocumentos = localStorage.getItem('datosConsultaIndividual');
    var bResultadoDocumentos = JSON.parse(datosDocumentos);

    var iIdEmpleadoDoctos = bResultadoDocumentos.iIdEmpleado;

    var datosDocumentos = new XMLHttpRequest();
    datosDocumentos.open('POST', 'prcConsultaDocumentos.php', true);

    var formData = new URLSearchParams();
    formData.append('iIdEmpleadoDocumento', iIdEmpleadoDoctos);

    datosDocumentos.send(formData);

    datosDocumentos.onload = function () {
        if (datosDocumentos.status === 200) {

            var respuesta = JSON.parse(datosDocumentos.responseText);

            if (respuesta[0].bResultado === 1) {
                localStorage.setItem('datosConsultaDocumentos', JSON.stringify(respuesta));

                var datosDocumentosConsulta = localStorage.getItem('datosConsultaDocumentos');

                if (datosDocumentosConsulta) {
                    var bResultado = JSON.parse(datosDocumentosConsulta);

                    let longitudDocumentos = bResultado.length;

                    insertarDocumentos(longitudDocumentos);

                    for (var i = 0; i < longitudDocumentos; i++) {
                        var iIdTipoDocumento = 'vchTipoDocumento' + i;
                        var iIdEstatusDocumento = 'vchEstatusDocumento' + i;
                        var iIdUsuarioUltModificacion = 'iIdUsuarioUltModificacion' + i;
                        var dFechaModificacion = 'dtFechaUltModificacion' + i;


                        var vchTipoDocumentoForm = document.getElementById(iIdTipoDocumento);
                        vchTipoDocumentoForm.value = bResultado[i].vchTipoDocto;

                        var vchEstatusForm = document.getElementById(iIdEstatusDocumento);
                        vchEstatusForm.value = bResultado[i].vchActivo;

                        var vchUsuarioForm = document.getElementById(iIdUsuarioUltModificacion);
                        vchUsuarioForm.value = bResultado[i].vchUsuarioUltModificacion;

                        var dFechaUltModifForm = bResultado[i].dtFechaUltModificacion.date;
                        var fechaModif = new Date(dFechaUltModifForm);

                        var fechaModifFinal = fechaModif.toLocaleString('es-ES', {
                            day: '2-digit',
                            month: '2-digit',
                            year: 'numeric',
                            hour: '2-digit',
                            minute: '2-digit',
                            second: '2-digit',
                            hour12: false
                        });

                        var dFechaModificacionForm = document.getElementById(dFechaModificacion);
                        dFechaModificacionForm.value = fechaModifFinal
                    }
                }
            }
        }
    }
}

function insertarDocumentos(longitudDocumentos) {
    var contenedor = document.getElementById('agregarDocumentos');
    contenedor.innerHTML = agregarListaDocumentos(longitudDocumentos);
}

function agregarListaDocumentos(longitudDocumentos) {
    var documento = '';

    for (var i = 0; i < longitudDocumentos; i++) {
        documento += `
    <div class="employer">
        <div class="body">
            <div class="row">
                <div class="body">
                    <div class="col-md-3">
                        <div class="form-group">
                            <input id="vchTipoDocumento${i}" type="text" class="form-control"
                                placeholder="TIPO CONTACTO" disabled>
                        </div>
                    </div>
    
                    <div class="col-md-3">
                        <div class="form-group">
                            <input type="text" class="form-control"
                                placeholder="ESTATUS" id="vchEstatusDocumento${i}" disabled>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <input type="text" class="form-control"
                                placeholder="USUARIO ULTIMA MOD."
                                id="iIdUsuarioUltModificacion${i}" disabled />
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group ">
                            <input type="text" class="form-control"
                                placeholder="FECHA ULTIMA MOD."
                                id="dtFechaUltModificacion${i}" disabled />
                        </div>
                    </div>
    
                    <ul>
                <a href="Sistema/pngwing.com.png" target="_blank">
                    <img src="../../pngwing.com.png" id="iconoPDF${i}" style="width: 70px; height: auto;">
                </a>
                    </ul>
    
            <ul>
                <a href="#apply-popup-id-1" data-toggle="modal">
                    <img id="iconoModificar${i}" src="../../trash-can_38501.png" style="width: 50px; height: auto; display: none;" >
                </a>
            </ul>
    
                </div>
            </div>
    
        </div>
    </div>
                `;
    }
    return documento;
}

function habilitarBotonesDocumentos() {

    if (localStorage.getItem('habilitarBotones') === 'true') {
        const habilitarBotonDomicilio = document.querySelectorAll('.boton-intec');
        habilitarBotonDomicilio.forEach(boton => {
            boton.disabled = false;
            boton.style.display = 'block';
        });
    }
    const container = document.getElementById('agregarDocumentos');

    const observerCallback = (mutationsList, observer) => {

        mutationsList.forEach((mutation) => {
            if (mutation.type === 'childList') {

                var bTamanioDocumentos = localStorage.getItem('datosConsultaDocumentos');
                var tamanioFinal = bTamanioDocumentos ? bTamanioDocumentos.length : 0;

                for (var i = 0; i < tamanioFinal; i++) {
                    const habilitarIconoModificar = document.getElementById(`iconoModificar${i}`);

                    if (habilitarIconoModificar !== null && localStorage.getItem('habilitarBotones') === 'true') {
                        habilitarIconoModificar.style.display = 'block';
                    }
                }

            }
        });
    };
    const observer = new MutationObserver((observerCallback));
    observer.observe(document.documentElement, {childList: true, subtree: true});
}

