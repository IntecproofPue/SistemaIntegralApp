<?php
require_once('../../includes/pandora.php');
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
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
                                        <li><a href='../../index.php'"><span class=" ti-power-off"></span>SALIR</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
                            <h1>CONSULTA PUESTO</h1>
                        </a>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                                <li class="breadcrumb-item active" aria-current="page">CONSULTA PUESTO&nbsp;&nbsp;</li>
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

                                if ($nombreaBuscar == 'Luis') { ?>

                                    <div style="background-color: #117a8b; text-align: center">
                                        <?php echo "<i><span style='color: #ededee' size='-2'> $busquedaEncontradaTxt</span></i><br />"; ?>
                                    </div>
                                    <br>Aquí la lista de coincidencias


                                <?php } else { ?>
                                    <div style="background-color: #c82333; text-align: center">
                                        <?php echo "<i><span style='color: #ededee' size='-2'> $busquedaNoEncontradaTxt</span></i><br />"; ?>
                                    </div>

                                    <form action="#" method="post" class="dashboard-form">

                                        <div class="dashboard-section basic-info-input">
                                            <h3><i data-feather="user-check"></i>DATOS DE PUESTO</h3>
                                            <div class="dashboard-section basic-info-input">
                                                <h4><i data-feather="user-check"></i>INFORMACION BASICA</h4>
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">*NOMBRE (S)</label>
                                                    <div class="col-sm-9">
                                                        <ul>
                                                            <li>INGRESA info EMPLEADO</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">*DESCRIPCION DE PUESTO:</label>
                                                    <div class="col-sm-9">
                                                        <ul>
                                                            <li>INGRESA info EMPLEADO</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">*TIPO DE CONTARTACION:</label>
                                                    <div class="col-sm-9">
                                                        <ul>
                                                            <li>INGRESA info EMPLEADO</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">*HORAS LAVORALES:</label>
                                                    <div class="col-sm-9">
                                                        <ul>
                                                            <li>INGRESA info EMPLEADO</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">*SALARIO NETO:</label>
                                                    <div class="col-sm-9">
                                                        <ul>
                                                            <li>INGRESA info EMPLEADO</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">*SALARIO FISCAL:</label>
                                                    <div class="col-sm-9">
                                                        <ul>
                                                            <li>INGRESA info EMPLEADO</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">*SALARIO COMPLEMENTARIO:</label>
                                                    <div class="col-sm-9">
                                                        <ul>
                                                            <li>INGRESA info EMPLEADO</li>
                                                        </ul>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label"></label>
                                            <div class="col-sm-9">
                                                <button type="button" class="button"
                                                    id="toggleDomicilioButton">DOMICILIO</button>
                                                <button type="button" class="button"
                                                    onclick="window.location.href = '#'">EDITAR</button>
                                            </div>
                                        </div>

                                    <?php }
                                ?>
                                    <?php
                            } else {
                                ?>
                                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="dashboard-form">

                                        <div id="busquedaDiv" class="dashboard-section basic-info-input">
                                            <h4><i data-feather="user-check"></i>BUSQUEDA</h4>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">SELECCIONAR CAMPO:</label>
                                                <div class="col-sm-9">
                                                    <select class="form-control" id="selectCampos"
                                                        onchange="mostrarCampoSeleccionado()">
                                                        <option value="iDBuscar">ID DE PUESTO</option>
                                                        <option value="nombreaBuscar">NOMBRE</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label"></label>
                                                <div class="col-sm-9">
                                                    <div class="campo-container">
                                                        <div id="iDBuscar" class="campo-busqueda">
                                                            <input type="text" class="form-control"
                                                                placeholder="INGRESA ID DEL PUESTO" name="iDBuscar"
                                                                style="text-transform: uppercase">
                                                        </div>
                                                        <div id="nombreaBuscar" class="campo-busqueda"
                                                            style="display: none;">
                                                            <input type="text" class="form-control"
                                                                placeholder="INGRESA EL NOMBRE DEL PUESTO"
                                                                name="nombreaBuscar" style="text-transform: uppercase">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label"></label>
                                                <div class="job-apply-buttons">
                                                    <a href="#" class="apply" data-toggle="modal"
                                                        data-target="#apply-popup-id">SELECCIONAR</a>
                                                    <button class="button" type="reset">LIMPIAR</button>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- MODAL POPUP -->
                                        <div class="apply-popup">
                                            <div class="modal fade" id="apply-popup-id" tabindex="-1" role="dialog"
                                                aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title"><i data-feather="edit"></i>RESULTADO DE
                                                                LA BUSQUEDA</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="#">
                                                                <ul
                                                                    style="list-style: none; padding: 0; display: flex; flex-direction: row; align-items: center;">
                                                                    <li style="margin-right: 7px;"><span>ID DEL
                                                                            PUESTO:</span> MOSTRAR ID</li>
                                                                    <li style="margin-right: 7px;"><span>NOMBRE DEL
                                                                            PUESTO:</span> MOSTRAR NOMBRE</li>
                                                                </ul>
                                                                <button class="button primary-bg btn-block"
                                                                    name="submitBuscar"
                                                                    onclick="seleccionarEmpleado()">SELECCIONAR</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
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

    <!-- Footer -->
    <footer class="footer-bg">
        <div class="footer-bottom-area">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="footer-bottom border-top">
                            <div class="row">
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

    <script>
        // función para mostrar u ocultar la sección de Domicilio
        function toggleDomicilioSection() {
            var domicilioSection = document.getElementById('domicilioSection');

            // Cambia la visibilidad de la sección
            if (domicilioSection.style.display === 'none') {
                domicilioSection.style.display = 'block';
            } else {
                domicilioSection.style.display = 'none';
            }
        }
        function limpiarCampos(element) {
            // Desactiva todos los campos
            var inputs = document.getElementsByName('iDBuscar').concat(
                document.getElementsByName('RFCBuscar'),
                document.getElementsByName('PUESTOBuscar'),
                document.getElementsByName('SEDEBuscar'),
                document.getElementsByName('nombreaBuscar')
            );

            for (var i = 0; i < inputs.length; i++) {
                inputs[i].disabled = true;
            }
            // Habilita solo el campo correspondiente al input actualmente activo
            element.disabled = false;

            // Habilita solo el campo correspondiente al input actualmente activo
            element.disabled = false;
        }
        element.focus();


        function validarBusqueda() {
            // Agrega tu lógica de validación aquí si es necesario
            return true; // Cambia a 'false' si quieres prevenir el envío del formulario en ciertos casos
        }

        function mostrarCampoSeleccionado() {
            var select = document.getElementById("selectCampos");
            var selectedCampo = select.options[select.selectedIndex].value;

            // Oculta todos los campos de búsqueda
            var campos = document.querySelectorAll('.campo-busqueda');
            campos.forEach(function (campo) {
                campo.style.display = 'none';
            });

            // Muestra solo el campo seleccionado
            var campoSeleccionado = document.getElementById(selectedCampo);
            campoSeleccionado.style.display = 'block';
        }

        function mostrarCampoSeleccionado() {
            var select = document.getElementById("selectCampos");
            var selectedCampo = select.options[select.selectedIndex].value;

            // Oculta todos los campos de búsqueda
            var campos = document.querySelectorAll('.campo-busqueda');
            campos.forEach(function (campo) {
                campo.style.display = 'none';
            });

            // Muestra solo el campo seleccionado
            var campoSeleccionado = document.getElementById(selectedCampo);
            campoSeleccionado.style.display = 'block';
        }

        function realizarBusqueda() {
            // Oculta el primer div (busquedaDiv)
            document.getElementById("busquedaDiv").style.display = 'none';

            // Muestra el segundo div (resultadoDiv)
            document.getElementById("resultadoDiv").style.display = 'block';

            // Aquí puedes realizar cualquier acción adicional relacionada con la búsqueda
        }

    </script>



</body>

</html>