<?php
require_once('../../includes/pandora.php');
require_once ('../../includes/load.php');

session_start();
function ObtenerTipoContratacion()
{
    if (isset($_SESSION['CatConstante'])) {
        $datosTipoContratacion = $_SESSION['CatConstante'];
        $contratacionEncontrada = array();

        foreach ($datosTipoContratacion as $valorContratacion) {
            if ($valorContratacion['iAgrupador'] == 1) {
                $contratacionEncontrada[] = $valorContratacion;
            }
        }
        return $contratacionEncontrada;
    } else {
        echo ("No hay datos del Tipo de Contratación");
    }
}

$resultadoContratacion = ObtenerTipoContratacion();


function ObtenerHorasLaborales()
{
    if (isset($_SESSION['CatConstante'])) {
        $datosHorasLaborales = $_SESSION['CatConstante'];
        $horasLaboralesEncontradas = array();

        foreach ($datosHorasLaborales as $valorHorasLaborales) {
            if ($valorHorasLaborales['iAgrupador'] == 2) {
                $horasLaboralesEncontradas[] = $valorHorasLaborales;
            }
        }
        return $horasLaboralesEncontradas;
    } else {
        echo ("No hay datos de las horas laborales");
    }
}

$resultadoHorasLaborales = ObtenerHorasLaborales();


function ObtenerNivel()
{
    if (isset($_SESSION['CatConstante'])) {
        $datosNivel = $_SESSION['CatConstante'];
        $nivelesEncontrados = array();

        foreach ($datosNivel as $valorNivel) {
            if ($valorNivel['iAgrupador'] == 22) {
                $nivelesEncontrados[] = $valorNivel;
            }
        }
        return $nivelesEncontrados;
    } else {
        echo ("No hay datos de las horas laborales");
    }
}

$resultadoNiveles = ObtenerNivel();


?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>
        <?php echo $tituloPagina; ?>
    </title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">

    <!-- External Css -->
    <link rel="stylesheet" href="../../assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="../../assets/css/themify-icons.css" />
    <link rel="stylesheet" href="../../assets/css/et-line.css" />
    <link rel="stylesheet" href="../../assets/css/bootstrap-select.min.css" />
    <link rel="stylesheet" href="../../assets/css/plyr.css" />
    <link rel="stylesheet" href="../../assets/css/flag.css" />
    <link rel="stylesheet" href="../../assets/css/slick.css" />
    <link rel="stylesheet" href="../../assets/css/owl.carousel.min.css" />
    <link rel="stylesheet" href="../../assets/css/jquery.nstSlider.min.css" />

    <!-- Custom Css -->
    <link rel="stylesheet" type="text/css" href="../../css/main.css">
    <link rel="stylesheet" type="text/css" href="../../dashboard/css/dashboard.css">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600%7CRoboto:300i,400,500" rel="stylesheet">

    <!-- Favicon -->
    <link rel="icon" href="../../images/favicon.png">
    <link rel="apple-touch-icon" href="../../images/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="../../images/icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="../../images/icon-114x114.png">


    <!--[if lt IE 9]>
    <script src="assets/js/html5shiv.min.js"></script>
    <script src="assets/js/respond.min.js"></script>
    <![endif]-->


    <script>
        function soloLetras(e) {
            tecla = (document.all) ? e.keyCode : e.which;


            if (tecla == 8) {
                return true;
            }


            patronAceptado = /[A-Z]/;
            tecla_final = String.fromCharCode(tecla);
            return patronAceptado.test(tecla_final);
        }

        function soloNumeros(e) {
            tecla = (document.all) ? e.keyCode : e.which;


            if (tecla == 8) {
                return true;
            }


            patronAceptado = /[0-9]/;
            tecla_final = String.fromCharCode(tecla);
            return patronAceptado.test(tecla_final);
        }

        function soloRfc(e) {

            tecla = (document.all) ? e.keyCode : e.which;


            if (tecla == 8) {
                return true;
            }


            patronAceptado = /[A-Za-z0-9]/;
            tecla_final = String.fromCharCode(tecla);
            return patronAceptado.test(tecla_final);
        }


        function soloNombre(e) {

            tecla = (document.all) ? e.keyCode : e.which;


            if (tecla == 8) {
                return true;
            }


            patronAceptado = /[a-zA-Z áéíóúñÁÉÍÓÚÑ]+/;
            tecla_final = String.fromCharCode(tecla);
            return patronAceptado.test(tecla_final);
        }
    </script>
    <!--<input class="tf w-input" id="txtCurp" name="txtCurp" maxlength="150" onkeypress="return quitarEspeciales(event)" placeholder="No. de CURP" type="text">-->

</head>

<body>

    <header class="header-2">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="header-top">
                        <div class="logo-area">
                            <a href="../../index.html"><img src="../../images/logo-2.png" alt=""></a>
                        </div>
                        <div class="header-top-toggler">
                            <div class="header-top-toggler-button"></div>
                        </div>
                        <div class="top-nav">
                            <div class="dropdown header-top-notification">
                                <a href="#" class="notification-button">Notification</a>
                                <div class="notification-card">
                                    <div class="notification-head">
                                        <span>Notifications</span>
                                        <a href="#">Mark all as read</a>
                                    </div>
                                    <div class="notification-body">
                                        <a href="../../home-2.html" class="notification-list">
                                            <i class="fas fa-bolt"></i>
                                            <p>Your Resume Updated!</p>
                                            <span class="time">5 hours ago</span>
                                        </a>
                                        <a href="#" class="notification-list">
                                            <i class="fas fa-arrow-circle-down"></i>
                                            <p>Someone downloaded resume</p>
                                            <span class="time">11 hours ago</span>
                                        </a>
                                        <a href="#" class="notification-list">
                                            <i class="fas fa-check-square"></i>
                                            <p>You applied for Project Manager <span>@homeland</span></p>
                                            <span class="time">11 hours ago</span>
                                        </a>
                                        <a href="#" class="notification-list">
                                            <i class="fas fa-user"></i>
                                            <p>You changed password</p>
                                            <span class="time">5 hours ago</span>
                                        </a>
                                        <a href="#" class="notification-list">
                                            <i class="fas fa-arrow-circle-down"></i>
                                            <p>Someone downloaded resume</p>
                                            <span class="time">11 hours ago</span>
                                        </a>
                                    </div>
                                    <div class="notification-footer">
                                        <a href="#">See all notification</a>
                                    </div>
                                </div>
                            </div>
                            <div class="dropdown header-top-account">
                                <a href="#" class="account-button">My Account</a>
                                <div class="account-card">
                                    <div class="header-top-account-info">
                                        <a href="#" class="account-thumb">
                                            <img src="../../images/account/thumb-1.jpg" class="img-fluid" alt="">
                                        </a>
                                        <div class="account-body">
                                            <h5><a href="#">Robert Chavez</a></h5>
                                            <span class="mail">chavez@domain.com</span>
                                        </div>
                                    </div>
                                    <ul class="account-item-list">
                                        <li><a href="#"><span class="ti-user"></span>Account</a></li>
                                        <li><a href="#"><span class="ti-settings"></span>Settings</a></li>
                                        <li><a href="#"><span class="ti-power-off"></span>Log Out</a></li>
                                    </ul>
                                </div>
                            </div>
                            <!--<select class="selectpicker select-language" data-width="fit">
                  <option data-content='<span class="flag-icon flag-icon-us"></span> English'>English</option>
                  <option  data-content='<span class="flag-icon flag-icon-mx"></span> Español'>Español</option>
                </select>-->
                        </div>
                    </div>
                    <nav class="navbar navbar-expand-lg cp-nav-2">
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav">
                                <li class="menu-item active"><a title="PERSONA" href="altaPersona.php">PERSONA</a></li>
                                <li class="menu-item active"><a title="DOMICILIO" href="altaDomicilio.php">DOMICILIO</a>
                                </li>
                                <li class="menu-item active"><a title="CONTACTO" href="altaContacto.php">CONTACTO</a>
                                </li>
                                <li class="menu-item active"><a title="CONTACTO" href="altaEmpleado.php">EMPLEADO</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>

    <!-- Breadcrumb -->
    <div class="alice-bg padding-top-60 padding-bottom-60">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="breadcrumb-area">
                        <h1>ALTA PUESTO</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">INICIO</a></li>
                                <li class="breadcrumb-item active" aria-current="page">ALTA PUESTO&nbsp;&nbsp;</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="breadcrumb-form">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <div class="alice-bg section-padding-bottom">
        <div class="container no-gliters">
            <div class="row no-gliters">
                <div class="col">
                    <div class="dashboard-container">
                        <div class="dashboard-content-wrapper">

                            <form  class="dashboard-form">

                                <input type="hidden" name = "iIdConstanteContratacion" id="iIdConstanteContratacion" value="" >
                                <input type="hidden" name = "iClaveContratacion" id="iClaveContratacion" value="" >

                                <input type="hidden" name = "iIdConstanteHoras" id="iIdConstanteHoras" value="" >
                                <input type="hidden" name = "iClaveHoras" id="iClaveHoras" value="" >


                                <input type="hidden" name = "iIdConstanteNivel" id="iIdConstanteNivel" value="" >
                                <input type="hidden" name = "iClaveNivel" id="iClaveNivel" value="" >

                                <div class="dashboard-section basic-info-input">
                                    <h4><i data-feather="user-check"></i>INFORMACIÓN DEL PUESTO</h4>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">*NOMBRE DEL PUESTO</label>
                                        <div class="col-sm-9">
                                            <input type="text" id="nombrePuesto" name = "nombrePuesto" class="form-control" placeholder="NOMBRE DEL PUESTO"
                                                min="2" maxlength="150"
                                                onkeypress="this.value = this.value.toUpperCase();return soloNombre(event)"
                                                required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">*DESCRIPCION DE PUESTO:</label>
                                        <div class="col-sm-9">
                                            <input type="text" id = "descripcionPuesto" name = "descripcionPuesto" class="form-control" placeholder="DESCRIPCION DE PUESTO"
                                                style="text-transform: uppercase" pattern="[A-Za-zÁÉÍÓÚáéíóúüÜñÑ\s]+"
                                                title="SOLO SE PERMITEN LETRAS" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">*NIVEL ORGANIZACIONAL:</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" id="nivelOrganizacional" name="nivelOrganizacional">
                                                <option value="" selected>SELECCIONE UN NIVEL ORGANIZACIONAL</option>
                                                <?php foreach ($resultadoNiveles as $nivel): ?>
                                                    <option value="<?= $nivel['iIdConstante'].'-'.$nivel['iClaveCatalogo'] ?>">
                                                        [<?= $nivel['iClaveCatalogo'] ?>] - <?= $nivel['vchDescripcion'] ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">*TIPO DE CONTRATACIÓN:</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" id="tipoContratacion" name="tipoContratacion">
                                                <option value="" selected>SELECCIONE UN TIPO DE CONTRATACIÓN</option>
                                                <?php foreach ($resultadoContratacion as $contratacion): ?>
                                                    <option value="<?= $contratacion['iIdConstante'].'-'.$contratacion['iClaveCatalogo'] ?>">
                                                        [<?= $contratacion['iClaveCatalogo'] ?>] - <?= $contratacion['vchDescripcion'] ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">*HORAS LABORALES:</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" id = "horasLaborales" name="horasLaborales">
                                                <option value="" selected>SELECCIONE LAS HORALES LABORALES </option>
                                                <?php foreach ($resultadoHorasLaborales as $horas): ?>
                                                    <option value="<?= $horas['iIdConstante'].'-'.$horas['iClaveCatalogo'] ?>">
                                                        [<?= $horas['iClaveCatalogo'] ?>] - <?= $horas['vchDescripcion'] ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">*SALARIO NETO:</label>
                                        <div class="col-sm-9">
                                            <input type="number" id = "salarioNeto" name="salarioNeto" class="form-control" placeholder="SALARIO NETO"
                                                required step="any" pattern="\d+(\.\d{1,2})?"
                                                title="INGRESA UN NUMERO VALIDO (HASTA 2 DECIMALES)">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">*SALARIO FISCAL:</label>
                                        <div class="col-sm-9">
                                            <input type="number"  id = "salarioFiscal" name="salarioFiscal" class="form-control" placeholder="SALARIO FISCAL"
                                                step="any" pattern="\d+(\.\d{1,2})?"
                                                title="INGRESA UN NUMERO VALIDO (HASTA 2 DECIMALES)" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">*SALARIO COMPLEMENTARIO:</label>
                                        <div class="col-sm-9">
                                            <input type="number" class="form-control" id = "salarioComplementario" name="salarioComplementario"
                                                placeholder="SALARIO COMPLEMENTARIO" step="any"
                                                pattern="\d+(\.\d{1,2})?"
                                                title="INGRESA UN NUMERO VALIDO (HASTA 2 DECIMALES)" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label"></label>
                                        <div class="col-sm-9">
                                            <script>
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
                                                    var iClaveHoras= HorasPartes[1];

                                                    // Asignar los valores a los campos ocultos
                                                    document.getElementById('iIdConstanteHoras').value = iIdConstanteHoras;
                                                    document.getElementById('iClaveHoras').value = iClaveHoras;


                                                    // Obtener los valores de los elementos del formulario
                                                    var NivelSeleccionado = document.getElementById('nivelOrganizacional');
                                                    var NivelPartes = NivelSeleccionado.value.split('-');
                                                    var iIdConstanteNivel = NivelPartes[0];
                                                    var iClaveNivel= NivelPartes[1];

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
                                                    datosPuesto.onload = function() {
                                                        if (datosPuesto.status === 200) {
                                                            var respuesta = JSON.parse(datosPuesto.responseText);
                                                            if (respuesta.bResultado == 1) {
                                                                console.log("Exito");
                                                                alert(respuesta.vchMensaje);
                                                                //window.location.href = "";
                                                            } else {
                                                                console.error("Mensaje Error: " + respuesta.vchMensaje);
                                                                alert(respuesta.vchMensaje)
                                                            }
                                                        } else {
                                                            console.error("Error en la solicitud al servidor");
                                                        }
                                                    };
                                                }
                                            </script>
                                            <button type="button" class="button" id = "botonSiguiente" >SIGUIENTE</button>
                                            <script>
                                                document.getElementById('botonSiguiente').addEventListener('click', ValidarDatosPuesto);
                                            </script>
                                            <button type="reset" class="button">LIMPIAR</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <footer class="footer-bg">


        <div class="footer-bottom-area">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="footer-bottom border-top">
                            <div class="row">
                                <div class="col-xl-4 col-lg-5 order-lg-2">
                                    <div class="footer-app-download">
                                        <!--<a href="#" class="apple-app">Apple Store</a>
                  <a href="#" class="android-app">Google Play</a>-->
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 order-lg-1">
                                    <!-- <p class="copyright-text">Copyright <a href="#">Oficiona</a> 2020, All right reserved</p> -->
                                </div>
                                <div class="col-xl-4 col-lg-3 order-lg-3">
                                    <div class="back-to-top">
                                        <a href="#">Subir<i class="fas fa-angle-up"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer End -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../../assets/js/jquery.min.js"></script>
    <script src="../../assets/js/popper.min.js"></script>
    <script src="../../assets/js/bootstrap.min.js"></script>
    <script src="../../assets/js/feather.min.js"></script>
    <script src="../../assets/js/bootstrap-select.min.js"></script>
    <script src="../../assets/js/jquery.nstSlider.min.js"></script>
    <script src="../../assets/js/owl.carousel.min.js"></script>
    <script src="../../assets/js/visible.js"></script>
    <script src="../../assets/js/jquery.countTo.js"></script>
    <script src="../../assets/js/chart.js"></script>
    <script src="../../assets/js/plyr.js"></script>
    <script src="../../assets/js/tinymce.min.js"></script>
    <script src="../../assets/js/slick.min.js"></script>
    <script src="../../assets/js/jquery.ajaxchimp.min.js"></script>

    <script src="../../js/custom.js"></script>
    <script src="../../dashboard/js/dashboard.js"></script>
    <script src="../../dashboard/js/datePicker.js"></script>
    <script src="../../dashboard/js/upload-input.js"></script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC87gjXWLqrHuLKR0CTV5jNLdP4pEHMhmg"></script>
    <script src="../../js/map.js"></script>
</body>

</html>