<?php
require_once ('../../includes/pandora.php');
require_once ('../../includes/load.php');




if (isset($_SESSION['user_id'])) {
    // Si el usuario está autenticado, no se hace nada
} else {
    // Si el usuario no está autenticado, redireccionarlo a la página de inicio después de 0 segundos
    echo '<script type="text/javascript">';
    echo 'setTimeout(function () { window.location.href = "../../index.php"; }, 0);';
    echo '</script>';
}
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
</head>

<body>

    <header class="header-2">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="header-top">
                        <div class="logo-area">
                            <a href="../../inicio.php"><img src="../../images/logo-2.png" alt=""></a>
                        </div>
                        <div class="header-top-toggler">
                            <div class="header-top-toggler-button"></div>
                        </div>
                        <div class="top-nav">
                            <div class="dropdown header-top-notification">
                                <a href="#" class="notification-button">
                                    <?php echo $notificacionesTxt; ?>
                                </a>
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

                            <?php

                            $user = obtenerUsuario($_SESSION['user_id']);
                            $row = $GLOBALS['rowObtenerNombre'];
                            $nombrePersona = $row['nombrePersona'];
                            $emailPersona = $row['contacto'];

                            ?>

                            <div class="dropdown header-top-account">
                                <a href="#" class="account-button">
                                    <?php echo $miCuentaTxt; ?>
                                </a>
                                <div class="account-card">
                                    <div class="header-top-account-info">
                                        <a href="#" class="account-thumb">
                                            <img src="../../images/account/thumb-1.jpg" class="img-fluid" alt="">
                                        </a>
                                        <div class="account-body">
                                            <h5><a href="#">
                                                    <?php echo $nombrePersona; ?>
                                                </a></h5>
                                            <span class="mail">
                                                <?php echo $emailPersona; ?>
                                            </span>
                                        </div>
                                    </div>
                                    <ul class="account-item-list">
                                        <li><a href="#"><span class="ti-user"></span>
                                                <?php echo $Perfil; ?>
                                            </a></li>
                                        <li><a href="#"><span class="ti-settings"></span>
                                                <?php echo $herramientas; ?>
                                            </a></li>
                                        <li><a href="../../includes/logout.php"><span class="ti-power-off"></span>
                                                <?php echo $logout; ?>
                                            </a></li>
                                    </ul>
                                </div>
                            </div>
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
                                <li class="menu-item active"><a title="PERSONA"
                                        href="../consulEmpleado/consultaPuesto.php ">PUESTO</a></li>
                                <li class="menu-item active"><a title="DOMICILIO"
                                        href="consultaDomicilio.php">DOMICILIO</a>
                                </li>
                                <li class="menu-item active"><a title="CONTACTO"
                                        href="consultaContacto.php">CONTACTO</a>
                                </li>
                                <li class="menu-item active"><a title="CONTACTO"
                                        href="consultaEmpleado.php">EMPLEADO</a>
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
                        <a>
                            <h1>CONSULTA EMPLEADO</h1>
                        </a>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                                <li class="breadcrumb-item active" aria-current="page">CONSULTA EMPLEADO&nbsp;&nbsp;
                                </li>
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

    <!-- Contenido de la página -->
    <div class="alice-bg section-padding-bottom" id="dashboardSection">
        <div class="container no-gliters">
            <div class="row no-gliters">
                <div class="col">
                    <div class="dashboard-container">
                        <div class="dashboard-content-wrapper">
                            <?php
                            if (isset($_POST['submitBuscar'])) {
                                $nombreaBuscar = $_POST['nombreaBuscar'];
                                echo "<br>El nombre a buscar es <b>$nombreaBuscar</b>";

                                if ($nombreaBuscar == 'LUIS') { ?>

                                    <div style="background-color: #117a8b; text-align: center">
                                        <?php echo "<i><span style='color: #ededee' size='-2'> $busquedaEncontradaTxt</span></i><br />"; ?>
                                    </div>
                                    <br>Aquí la lista de coincidencias


                                <?php } else { ?>

                                    <div style="background-color: #c82333; text-align: center">
                                        <?php echo "<i><span style='color: #ededee' size='-2'> $busquedaNoEncontradaTxt</span></i><br />"; ?>
                                    </div>
                                <?php }
                                ?>
                                <?php
                            } else {
                                ?>
                                <script>
<<<<<<< HEAD
                                    // depurar y verificar los valores en cada paso
                                    document.addEventListener('DOMContentLoaded', function () {
                                        var consultaIndivual = localStorage.getItem('datosConsultaIndividual');
                                        console.log('Datos almacenados en localStorage:', consultaIndivual); // verificar los datos almacenados
                                        if (consultaIndivual) {
                                            var bResultado = JSON.parse(consultaIndivual);
                                            console.log('Objeto parseado:', bResultado); // verificar el objeto parseado
                                            var idInput = document.getElementById('idInput');
                                            idInput.value = bResultado.iIdEmpleado || '';
                                            var nombreInput = document.getElementById('vchNombre');
                                            nombreInput.value = bResultado.vchNombre || '';
                                            console.log('Valor asignado al input:', nombreInput.value); // verificar el valor asignado
                                            var vchPrimerApellido = document.getElementById('vchPrimerApellido');
                                            vchPrimerApellido.value = bResultado.vchPrimerApellido || '';
                                        }
                                    });

=======
                                    // Función para consultar empleado
                                    function consultarEmpleado() {
                                        // Obtener los valores del formulario
                                        var iIdConstanteSede = 0;
                                        var iClaveSede = 0;
                                        var SedeSeleccionada = document.getElementById('iIdSede');

                                        // Verificar si se ha seleccionado una sede
                                        if (SedeSeleccionada) {
                                            var SedePartes = SedeSeleccionada.value.split('-');
                                            var iIdConstanteSede = SedePartes[0];
                                            var iClaveSede = SedePartes[1];
                                        } else {
                                            console.error('El elemento con ID "iIdSede" no se encontró en el DOM.');
                                        }

                                        // Crear objeto con los datos del formulario
                                        var FormularioConsultaEmpleado = {
                                            idEmpleado: document.getElementById('iDBuscar').value,
                                            rfc: document.getElementById('RFCBuscar').value,
                                            iIdPuesto: document.getElementById('PUESTOBuscar').value,
                                            iIdConstanteSede: iIdConstanteSede,
                                            iClaveSede: iClaveSede,
                                            nombre: document.getElementById('nombreaBuscar').value
                                        };

                                        console.log("FormularioConsultaEmpleado: ", FormularioConsultaEmpleado);

                                        // Realizar consulta dependiendo del tipo de búsqueda
                                        if (FormularioConsultaEmpleado.idEmpleado != 0) {
                                            consultaIndivual();
                                        } else {
                                            consultaMasiva();
                                        }

                                        // Función para consulta individual
                                        function consultaIndivual() {
                                            var datosConsultaEmpleado = new XMLHttpRequest();
                                            datosConsultaEmpleado.open('POST', 'consultaIndividual.php', true);
                                            datosConsultaEmpleado.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

                                            var formDataIndividual = new URLSearchParams(FormularioConsultaEmpleado).toString();
                                            datosConsultaEmpleado.send(formDataIndividual);

                                            datosConsultaEmpleado.onload = function () {
                                                if (datosConsultaEmpleado.status === 200) {
                                                    var respuestaIndividual = JSON.parse(datosConsultaEmpleado.responseText);
                                                    if (respuestaIndividual.bResultado == 1) {
                                                        alert(respuestaIndividual.vchMensaje);
                                                        local
                                                        document.getElementById('mostrarnombre').innerHTML = respuestaIndividual.vchNombre;
                                                    } else {
                                                        console.error("Mensaje Error: " + respuestaIndividual.vchMensaje);
                                                        alert(respuestaIndividual.vchMensaje);
                                                        respuestaFinal = respuestaIndividual.vchMensaje;
                                                    }
                                                } else {
                                                    console.error("Error en la solicitud al servidor");
                                                }
                                            };
                                        }

                                        // Función para consulta masiva
                                        function consultaMasiva() {
                                            var datosConsultaEmpleado = new XMLHttpRequest();
                                            datosConsultaEmpleado.open('POST', 'consultaMasiva.php', true);
                                            datosConsultaEmpleado.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

                                            var formDataMasiva = new URLSearchParams(FormularioConsultaEmpleado).toString();
                                            datosConsultaEmpleado.send(formDataMasiva);

                                            datosConsultaEmpleado.onload = function () {
                                                if (datosConsultaEmpleado.status === 200) {
                                                    var respuestaMasiva = JSON.parse(datosConsultaEmpleado.responseText);
                                                    if (respuestaMasiva.bResultado == 1) {
                                                        alert(respuestaMasiva.vchMensaje);
                                                        localStorage.setItem('datosConsulta', JSON.stringify(respuestaMasiva));
                                                    } else {
                                                        console.error("Mensaje Error: " + respuestaMasiva.vchMensaje);
                                                        alert(respuestaMasiva.vchMensaje);
                                                        respuestaFinal = respuestaMasiva.vchMensaje;
                                                    }
                                                } else {
                                                    console.error("Error en la solicitud al servidor");
                                                }
                                            };
                                        }
                                    }

                                    // Esperar a que se cargue el contenido DOM antes de agregar el evento click al botón
                                    document.addEventListener('DOMContentLoaded', function () {
                                        document.getElementById('buttonBuscar').addEventListener('click', consultarEmpleado);
                                    });
>>>>>>> job
                                </script>

                                <form action="#" method="post" class="dashboard-form">
                                    <script>
<<<<<<< HEAD
                                        document.addEventListener('DOMContentLoaded', function () {
                                            var consultaIndivual = localStorage.getItem('consultaIndivual');
                                            //Console.log('Datos almacenados en localStorage:', consultaIndivual); // Verificar los datos almacenados
                                            if (consultaIndivual) {
                                                var bResultado = JSON.parse(consultaIndivual);
                                                console.log('Objeto parseado:', bResultado); // Verificar el objeto parseado
                                                var vchNombreInput = document.getElementById('vchNombre');
                                                vchNombreInput.value = bResultado.vchNombreInput || '';
                                                console.log('Valor asignado al input:', vchNombreInput.value); // Verificar el valor asignado
                                            }
                                        });

=======
                                        let datosEmpleado = JSON.parse(localStorage.getItem('datosConsultaIndividual'));
                                        console.log(datosEmpleado);

                                        const Empleados = new Array();

                                        if (datosEmpleado[0].bResultado == 1) {

                                            for (var i = 0; i < datosEmpleado.length; i++) {
                                                Empleados.push(datosEmpleado[i]);
                                            }
                                        }
>>>>>>> job
                                    </script>

                                    <div class="dashboard-section basic-info-input">
                                        <h3><i data-feather="user-check"></i>DATOS DE EMPLEADO</h3>
                                        <div class="form-group row">
<<<<<<< HEAD
                                            <label class="col-sm-3 col-form-label">ID EMPLEADO</label>
=======
                                            <label class="col-sm-3 col-form-label">ID</label>
>>>>>>> job
                                            <div class="col-sm-9">
                                                <input id="idInput" type="text" class="form-control" placeholder="ID"
                                                    readonly />
                                                <script>
                                                    var empleado = {
                                                        bResultado: 1,
                                                        vchMensaje: "CONSULTA EXITOSA",
<<<<<<< HEAD
                                                        iIdEmpleado: document.getElementById('idInput').value = empleado.iIdEmpleado;
                                                    };
                                                    document.getElementById('idInput').value = empleado.iIdEmpleado;
=======
                                                        iIdEmpleado:document.getElementById('idInput').value =empleado.iIdEmpleado;
                                                    };

                                                        document.getElementById('idInput').value = empleado.iIdEmpleado;
>>>>>>> job
                                                </script>
                                            </div>
                                        </div>

<<<<<<< HEAD

                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">NOMBRE (S)</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" placeholder="NOMBRE" id="vchNombre"
                                                    readonly />
                                            </div>
                                        </div>
                                        <script>
                                            document.addEventListener('DOMContentLoaded', function () {
                                                var consultaIndivual = localStorage.getItem('consultaIndivual');
                                                if (consultaIndivual) {
                                                    var nombreInput = document.getElementById('vchNombre');
                                                    nombreInput.value = bResultado.vchNombre || '';
                                                }
                                            });
                                        </script>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Primer Apellido:</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" placeholder="PRIMER APELLIDO"
                                                    id="vchPrimerApellido" readonly />
                                            </div>
                                        </div>
                                        <script>
                                            document.addEventListener('DOMContentLoaded', function () {
                                                if (consultaIndivual) {
                                                    console.log(bResultado);
                                                    var nombreInput = document.getElementById('vchPrimerApellido');
                                                    nombreInput.value = bResultado.vchPrimerApellido || '';
                                                }
                                            });
                                        </script>
=======
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">NOMBRE (S)</label>
                                            <div class="col-sm-9">
                                                <input id="vchNombre" type="text" class="form-control" placeholder="NOMBRE"
                                                    readonly />
                                                <script>
                                                        var idEmpleado = Empleados.iIdEmpleado;
                                                        document.getElementById('vchNombre').value = empleado.vchNombre;
                                                </script>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Primer Apellido:</label>
                                            <div class="col-sm-9">
                                                <li class="campo-item" id="vchPrimerApellido">mostrar prim apellido</li>
                                            </div>
                                        </div>
>>>>>>> job

                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Segundo Apellido:</label>
                                            <div class="col-sm-9">
<<<<<<< HEAD
                                                <input type="text" class="form-control" placeholder="SEGUNDO APELLIDO"
                                                    id="vchSegundoApellido" readonly />
                                            </div>
                                        </div>
                                        <script>
                                            document.addEventListener('DOMContentLoaded', function () {
                                                if (consultaIndivual) {
                                                    console.log(bResultado);
                                                    var nombreInput = document.getElementById('vchSegundoApellido');
                                                    nombreInput.value = bResultado.vchSegundoApellido || '';
                                                }
                                            });
                                        </script>
=======
                                                <li class="campo-item" id="mostrarsegApellido">mostrar seg apellido</li>
                                            </div>
                                        </div>
>>>>>>> job

                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">PUESTO</label>
                                            <div class="col-sm-9">
<<<<<<< HEAD
                                                <input type="text" class="form-control" placeholder="PUESTO" id="vchPuesto"
                                                    readonly />
                                            </div>
                                        </div>
                                        <script>
                                            document.addEventListener('DOMContentLoaded', function () {
                                                if (consultaIndivual) {
                                                    console.log(bResultado);
                                                    var nombreInput = document.getElementById('vchPuesto');
                                                    nombreInput.value = bResultado.vchPuesto || '';
                                                }
                                            });
                                        </script>
=======
                                                <li class="campo-item" id="mostrarPuesto">mostrar puesto</li>
                                            </div>
                                        </div>
>>>>>>> job

                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">FECHA DE INGRESO:</label>
                                            <div class="col-sm-9">
<<<<<<< HEAD
                                                <input type="text" class="form-control" placeholder="FECHA DE INGRESO"
                                                    id="dFechaIngreso" readonly />
                                            </div>
                                        </div>
                                        <script>
                                            document.addEventListener('DOMContentLoaded', function () {
                                                if (consultaIndivual) {
                                                    console.log(bResultado);
                                                    var nombreInput = document.getElementById('dFechaIngreso');
                                                    nombreInput.value = bResultado.dFechaIngreso || '';
                                                }
                                            });
                                        </script>
=======
                                                <li class="campo-item" id="mostrarfechaingreso">mostrar fecha de ingreso
                                                </li>
                                            </div>
                                        </div>
>>>>>>> job

                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">ESTATUS:</label>
                                            <div class="col-sm-9">
<<<<<<< HEAD
                                                <input type="text" class="form-control" placeholder="ESTATUS"
                                                    id="iIdEstatusEmpleado" readonly />
                                            </div>
                                        </div>
                                        <script>
                                            document.addEventListener('DOMContentLoaded', function () {
                                                if (consultaIndivual) {
                                                    console.log(bResultado);
                                                    var nombreInput = document.getElementById('iIdEstatusEmpleado');
                                                    nombreInput.value = bResultado.iIdEstatusEmpleado || '';
                                                }
                                            });
                                        </script>
=======
                                                <li class="campo-item" id="mostrarEstatus">mostrar Estatus</li>
                                            </div>
                                        </div>
>>>>>>> job

                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">NSS</label>
                                            <div class="col-sm-9">
<<<<<<< HEAD
                                                <input type="text" class="form-control" placeholder="NSS" id="vchNSS"
                                                    readonly />
                                            </div>
                                        </div>
                                        <script>
                                            document.addEventListener('DOMContentLoaded', function () {
                                                if (consultaIndivual) {
                                                    console.log(bResultado);
                                                    var nombreInput = document.getElementById('vchNSS');
                                                    nombreInput.value = bResultado.vchNSS || '';
                                                }
                                            });
                                        </script>
=======
                                                <li class="campo-item" id="mostrarNSS">mostrar NSS</li>
                                            </div>
                                        </div>
>>>>>>> job

                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">FECHA ULTIMA PROMOCION:</label>
                                            <div class="col-sm-9">
<<<<<<< HEAD
                                                <input type="text" class="form-control"
                                                    placeholder="FECHA DE ULTIMA PROMOCION" id="dtFechaUltPromocion"
                                                    readonly />
                                            </div>
                                        </div>
                                        <script>
                                            document.addEventListener('DOMContentLoaded', function () {
                                                if (consultaIndivual) {
                                                    console.log(bResultado);
                                                    var nombreInput = document.getElementById('dtFechaUltPromocion');
                                                    nombreInput.value = bResultado.dtFechaUltPromocion || '';
                                                }
                                            });
                                        </script>
=======
                                                <li class="campo-item" id="mostrarfechUltimaPromocion">mostrar ultima promo
                                                </li>
                                            </div>
                                        </div>
>>>>>>> job

                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">SEDE</label>
                                            <div class="col-sm-9">
<<<<<<< HEAD
                                                <input type="text" class="form-control" placeholder="SEDE" id="iIdSede"
                                                    readonly />
                                            </div>
                                        </div>
                                        <script>
                                            document.addEventListener('DOMContentLoaded', function () {
                                                if (consultaIndivual) {
                                                    console.log(bResultado);
                                                    var nombreInput = document.getElementById('vchPiIdSedeuesto');
                                                    nombreInput.value = bResultado.iIdSede || '';
                                                }
                                            });
                                        </script>
=======
                                                <li class="campo-item" id="mostrarSede">mostrar SEDE</li>
                                            </div>
                                        </div>
>>>>>>> job

                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">FECHA BAJA:</label>
                                            <div class="col-sm-9">
<<<<<<< HEAD
                                                <input type="text" class="form-control" placeholder="FECHA DE BAJA"
                                                    id="dtFechaBaja" readonly />
                                            </div>
                                        </div>
                                        <script>
                                            document.addEventListener('DOMContentLoaded', function () {
                                                if (consultaIndivual) {
                                                    console.log(bResultado);
                                                    var nombreInput = document.getElementById('dtFechaBaja');
                                                    nombreInput.value = bResultado.dtFechaBaja || '';
                                                }
                                            });
                                        </script>
=======
                                                <li class="campo-item" id="mostrarfechaBaja">mostrar fecha de baja</li>
                                            </div>
                                        </div>
>>>>>>> job

                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">USUARIO ULTIMA MODIFICACION:</label>
                                            <div class="col-sm-9">
<<<<<<< HEAD
                                                <input type="text" class="form-control"
                                                    placeholder="USUARIO DE ULTIMA MODIFICACION"
                                                    id="vchUsuarioUltModificacion" readonly />
                                            </div>
                                        </div>
                                        <script>
                                            document.addEventListener('DOMContentLoaded', function () {
                                                if (consultaIndivual) {
                                                    console.log(bResultado);
                                                    var nombreInput = document.getElementById('vchUsuarioUltModificacion');
                                                    nombreInput.value = bResultado.vchUsuarioUltModificacion || '';
                                                }
                                            });
                                        </script>
=======
                                                <li class="campo-item" id="mostrarUsuariUltimaModificacion">mostrar usuario
                                                    de ultima modificacion
                                                </li>
                                            </div>
                                        </div>
>>>>>>> job

                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">FECHA ULTIMA MODIFICACION:</label>
                                            <div class="col-sm-9">
<<<<<<< HEAD
                                                <input type="text" class="form-control"
                                                    placeholder="FECHA DE ULTIMA MODIFICACION" id="dtFechaUltModificacion"
                                                    readonly />
                                            </div>
                                        </div>
                                        <script>
                                            document.addEventListener('DOMContentLoaded', function () {
                                                if (consultaIndivual) {
                                                    console.log(bResultado);
                                                    var nombreInput = document.getElementById('dtFechaUltModificacion');
                                                    nombreInput.value = bResultado.dtFechaUltModificacion || '';
                                                }
                                            });
                                        </script>
=======
                                                <li class="campo-item" id="mostrarfechUltimaModificacion">mostrar fecha de
                                                    ultima</li>
                                            </div>
                                        </div>
>>>>>>> job

                                        <h3><i data-feather="user-check"></i>DATOS DE LA PERSONA</h3>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">RFC:</label>
                                            <div class="col-sm-9">
<<<<<<< HEAD
                                                <input type="text" class="form-control" placeholder="RFC" id="vchRFC"
                                                    readonly />
                                            </div>
                                        </div>
                                        <script>
                                            document.addEventListener('DOMContentLoaded', function () {
                                                if (consultaIndivual) {
                                                    console.log(bResultado);
                                                    var nombreInput = document.getElementById('vchRFC');
                                                    nombreInput.value = bResultado.vchRFC || '';
                                                }
                                            });
                                        </script>
=======
                                                <li class="campo-item" id="mostrarRFC">mostrar RFC</li>
                                            </div>
                                        </div>
>>>>>>> job

                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">CURP:</label>
                                            <div class="col-sm-9">
<<<<<<< HEAD
                                                <input type="text" class="form-control" placeholder="CURP" id="vchCURP"
                                                    readonly />
                                            </div>
                                        </div>
                                        <script>
                                            document.addEventListener('DOMContentLoaded', function () {
                                                if (consultaIndivual) {
                                                    console.log(bResultado);
                                                    var nombreInput = document.getElementById('vchCURP');
                                                    nombreInput.value = bResultado.vchCURP || '';
                                                }
                                            });
                                        </script>
=======
                                                <li class="campo-item" id="mostrarCURP">mostrar CURP</li>
                                            </div>
                                        </div>
>>>>>>> job

                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">FECHA NACIMIENTO:</label>
                                            <div class="col-sm-9">
<<<<<<< HEAD
                                                <input type="text" class="form-control" placeholder="FECHA DE NACIMIENTO"
                                                    id="dFechaNacimiento" readonly />
                                            </div>
                                        </div>
                                        <script>
                                            document.addEventListener('DOMContentLoaded', function () {
                                                if (consultaIndivual) {
                                                    console.log(bResultado);
                                                    var nombreInput = document.getElementById('dFechaNacimiento');
                                                    nombreInput.value = bResultado.dFechaNacimiento || '';
                                                }
                                            });
                                        </script>
=======
                                                <li class="campo-item" id="mostrarFechNacimineto">mostrar fecha de
                                                    nacimiento</li>
                                            </div>
                                        </div>
>>>>>>> job

                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">GENERO:</label>
                                            <div class="col-sm-9">
<<<<<<< HEAD
                                                <input type="text" class="form-control" placeholder="GENERO" id="iIdGenero"
                                                    readonly />
                                            </div>
                                        </div>
                                        <script>
                                            document.addEventListener('DOMContentLoaded', function () {
                                                if (consultaIndivual) {
                                                    console.log(bResultado);
                                                    var nombreInput = document.getElementById('iIdGenero');
                                                    nombreInput.value = bResultado.iIdGenero || '';
                                                }
                                            });
                                        </script>
=======
                                                <li class="campo-item" id="mostraGenero">mostrar genero</li>
                                            </div>
                                        </div>
>>>>>>> job

                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">NACIONALIDAD:</label>
                                            <div class="col-sm-9">
<<<<<<< HEAD
                                                <input type="text" class="form-control" placeholder="NACIONALIDAD"
                                                    id="iIdNacionalidad" readonly />
                                            </div>
                                        </div>
                                        <script>
                                            document.addEventListener('DOMContentLoaded', function () {
                                                if (consultaIndivual) {
                                                    console.log(bResultado);
                                                    var nombreInput = document.getElementById('iIdNacionalidad');
                                                    nombreInput.value = bResultado.iIdNacionalidad || '';
                                                }
                                            });
                                        </script>
=======
                                                <li class="campo-item" id="mostraNacionalidad">mostrar nacionalidad</li>
                                            </div>
                                        </div>
>>>>>>> job

                                        <h3><i data-feather="user-check"></i>DATOS FISCALES</h3>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">TIPO DE PERSONA:</label>
                                            <div class="col-sm-9">
<<<<<<< HEAD
                                                <input type="text" class="form-control" placeholder="TIPO DE PERSONA"
                                                    id="iIdTipoPersona" readonly />
                                            </div>
                                        </div>
                                        <script>
                                            document.addEventListener('DOMContentLoaded', function () {
                                                if (consultaIndivual) {
                                                    console.log(bResultado);
                                                    var nombreInput = document.getElementById('iIdTipoPersona');
                                                    nombreInput.value = bResultado.iIdTipoPersona || '';
                                                }
                                            });
                                        </script>
=======
                                                <li class="campo-item" id="mostradatosTipoPersona">mostrar tipo de persona
                                                </li>
                                            </div>
                                        </div>
>>>>>>> job

                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">REGIMEN FISCAL:</label>
                                            <div class="col-sm-9">
<<<<<<< HEAD
                                                <input type="text" class="form-control" placeholder="REGIMEN FISCAL"
                                                    id="vchRegimen" readonly />
                                            </div>
                                        </div>
                                        <script>
                                            document.addEventListener('DOMContentLoaded', function () {
                                                if (consultaIndivual) {
                                                    console.log(bResultado);
                                                    var nombreInput = document.getElementById('vchRegimen');
                                                    nombreInput.value = bResultado.vchRegimen || '';
                                                }
                                            });
                                        </script>
=======
                                                <li class="campo-item" id="mostrarRegimen">mostrar regimen fiscal</li>
                                            </div>
                                        </div>
>>>>>>> job

                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">USO FISCAL:</label>
                                            <div class="col-sm-9">
<<<<<<< HEAD
                                                <input type="text" class="form-control" placeholder="USO FISCAL"
                                                    id="vchUsoFiscal" readonly />
                                            </div>
                                        </div>
                                        <script>
                                            document.addEventListener('DOMContentLoaded', function () {
                                                if (consultaIndivual) {
                                                    console.log(bResultado);
                                                    var nombreInput = document.getElementById('vchUsoFiscal');
                                                    nombreInput.value = bResultado.vchUsoFiscal || '';
                                                }
                                            });
                                        </script>
=======
                                                <li class="campo-item" id="mostraUsoFiscal">mostrar uso fiscal</li>
                                            </div>
                                        </div>
>>>>>>> job

                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">C.P. FISCAL:</label>
                                            <div class="col-sm-9">
<<<<<<< HEAD
                                                <input type="text" class="form-control" placeholder="C. P. FISCAL"
                                                    id="iCodigoPostalFiscal" readonly />
                                            </div>
                                        </div>
                                        <script>
                                            document.addEventListener('DOMContentLoaded', function () {
                                                if (consultaIndivual) {
                                                    console.log(bResultado);
                                                    var nombreInput = document.getElementById('iCodigoPostalFiscal');
                                                    nombreInput.value = bResultado.iCodigoPostalFiscal || '';
                                                }
                                            });
                                        </script>
                                        
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label"></label>
                                            <div class="col-sm-9">
                                            <button class="button"
                                                            href="../consultaDomicilio.php">DOMICILIO</button>
                                                <button class="button"
                                                            href="../consultaContacto.php">CONTACTO</button>
=======
                                                <li class="campo-item" id="mosrtarCPFiscal">mostrar C.P. fiscal</li>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="dashboard-section basic-info-input">
                                        <div class="row">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label"></label>
                                                <div class="col-sm-9">
                                                    <button class="button"
                                                        href="../consultaDomicilio.php">DOMICILIO</button>
                                                </div>
>>>>>>> job
                                            </div>
                                        </div>
                                    </div>
                                </form>

                                <?php
                            }

                            ?>
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
<<<<<<< HEAD
                                <div class="col-lg-6">
                                    <a href="#">
                                        <img src="images/footer-logo.png" class="img-fluid" alt="">
                                    </a>
                                    <p class="copyright-text">Copyright <a href="#">Oficiona</a> 2020, All right
                                        reserved</p>
                                </div>
                                <div class="col-lg-6">
                                    <div class="back-to-top">
                                        <a href="#">Back to top<i class="fas fa-angle-up"></i></a>
                                    </div>
                                </div>
                                <div class="footer-social">
                                    <ul class="social-icons">
                                        <li><a href="#"><i data-feather="facebook"></i></a></li>
                                        <li><a href="#"><i data-feather="twitter"></i></a></li>
                                        <li><a href="#"><i data-feather="linkedin"></i></a></li>
                                        <li><a href="#"><i data-feather="instagram"></i></a></li>
                                        <li><a href="#"><i data-feather="youtube"></i></a></li>
                                    </ul>
=======
                                <div class="col-xl-4 col-lg-5 order-lg-2">
                                </div>
                                <div class="col-xl-4 col-lg-4 order-lg-1">
                                    <a href="#">
                                        <img src="images/footer-logo.png" class="img-fluid" alt="">
                                    </a>
                                    <p class="copyright-text">Copyright <a href="#">Intecproof</a> 2024, All right
                                        reserved</p>
                                </div>
                                <div class="col-xl-4 col-lg-3 order-lg-3">
                                    <div class="back-to-top">
                                        <a href="#">Back to top<i class="fas fa-angle-up"></i></a>
                                    </div>
>>>>>>> job
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