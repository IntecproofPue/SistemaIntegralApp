<?php
require_once ('../../includes/pandora.php');
require_once ('../../includes/load.php');

session_start();

function ObtenerTipoDocumento()
{
    if (isset($_SESSION['CatConstante'])) {
        $datosDocumentos = $_SESSION['CatConstante'];
        $documentosEncontrados = array();

        foreach ($datosDocumentos as $valorDocumento) {
            if ($valorDocumento['iAgrupador'] == 10) {
                $documentosEncontrados[] = $valorDocumento;
            }
        }
        return $documentosEncontrados;
    } else {
        echo ("No hay datos del Estado de Procedencia");
    }
}

$resultadoDocumento = ObtenerTipoDocumento();

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

    <style>
        .candidate {
            margin-bottom: -30px;
            padding: 5px 20px;
        }
    </style>

    <!--[if lt IE 9]>
    <script src="assets/js/html5shiv.min.js"></script>
    <script src="assets/js/respond.min.js"></script>
    <![endif]-->


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
                                <a href="#" class="notification-button"><?php echo $notificacionesTxt; ?></a>
                                <div class="notification-card">
                                    <div class="notification-head">
                                        <span>Notificaciones</span>
                                        <a href="#">Marcar todo como leido</a>
                                    </div>
                                    <div class="notification-body">
                                        <a href="../../home-2.html" class="notification-list">
                                            <i class="fas fa-bolt"></i>
                                            <p>Tu CV actualizado</p>
                                            <span class="time">5 hours ago</span>
                                        </a>
                                        <a href="#" class="notification-list">
                                            <i class="fas fa-arrow-circle-down"></i>
                                            <p>Alguien descargo tu CV</p>
                                            <span class="time">11 hours ago</span>
                                        </a>
                                        <a href="#" class="notification-list">
                                            <i class="fas fa-check-square"></i>
                                            <p>solicitaste un puesto de.... <span>@homeland</span></p>
                                            <span class="time">11 hours ago</span>
                                        </a>
                                        <a href="#" class="notification-list">
                                            <i class="fas fa-user"></i>
                                            <p>Cambiaste la contraseña</p>
                                            <span class="time">5 hours ago</span>
                                        </a>
                                        <a href="#" class="notification-list">
                                            <i class="fas fa-arrow-circle-down"></i>
                                            <p>Alguien descargo tu CV</p>
                                            <span class="time">11 hours ago</span>
                                        </a>
                                    </div>
                                    <div class="notification-footer">
                                        <a href="#">Ver Notificaciones</a>
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
                                <a href="#" class="account-button"><?php echo $miCuentaTxt; ?></a>
                                <div class="account-card">
                                    <div class="header-top-account-info">
                                        <a href="#" class="account-thumb">
                                            <img src="../../images/account/thumb-1.jpg" class="img-fluid" alt="">
                                        </a>
                                        <div class="account-body">
                                            <h5><a href="#"><?php echo $nombrePersona; ?></a></h5>
                                            <span class="mail"><?php echo $emailPersona; ?></span>
                                        </div>
                                    </div>
                                    <ul class="account-item-list">
                                        <li><a href="#"><span class="ti-user"></span><?php echo $Perfil; ?></a></li>
                                        <li><a href="#"><span
                                                    class="ti-settings"></span><?php echo $herramientas; ?></a></li>
                                        <li><a href="../../includes/logout.php"><span
                                                    class="ti-power-off"></span><?php echo $logout; ?></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- pestañas de navegación
                <div class="skill-and-profile">
                    <div class="skill" style="display: flex; justify-content: center;">
                        <label style="align-self: flex-end;"><a href="DatosEmpleado.php">EMPLEADO</a></label>
                        <label style="align-self: flex-end;"><a
                                    href="../altaPuesto/consultaPuestoindividual.php ">PUESTO</a></label>
                        <label style="align-self: flex-end;"><a href="consultaDomicilio.php">DOMICILIO</a></label>
                        <label style="align-self: flex-end;"><a href="consultaContacto.php">CONTACTO</a></label>
                        <label style="align-self: flex-end;" class="selected"><a
                                    href="consultaDoctos.php">DOCUMENTOS</a></label>
                    </div>
                </div>
                fin de pestañas de navegación-->
                </div>
            </div>
        </div>
    </header>

    <!-- Contenido de la página -->
    <div class="alice-bg section-padding-bottom">
        <div class="container no-gliters">
            <div class="row justify-content-center">
                <div class="col">
                    <div class="post-content-wrapper">
                        <form action="altaPersona" method="post" class="dashboard-form">

                            <input type="hidden" name="iIdConstanteIncidencia" id="iIdConstanteIncidencia" value="">
                            <input type="hidden" name="iClaveIncidencia" id="iClaveIncidencia" value="">

                            <div id="information" class="row justify-content-center">
                                <div class="col-md-10">
                                    <label class="col-form-label">
                                        <h6><i data-feather="user-check"></i>REGISTRO DE INCIDENCIAS</h6>
                                    </label>
                                    <div class="row">

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="col-form-label">EXPEDIENTE EMPLEADO: </label>
                                                <input id="iIdEmpleado" type="text" class="form-control"
                                                    placeholder="EXPEDIENTE EMPLEADO">
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="col-form-label">NOMBRE DEL EMPLEADO: </label>
                                                <input id="iIdEmpleado" type="text" class="form-control"
                                                    placeholder="NOMBRE DEL EMPLEADO">
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="col-form-label">TIPO DE INCIDENCIA:</label>
                                                <select class="form-control" id="tipoIncidencia"
                                                    aria-placeholder="TIPO DE INCIDENCIA" name="tipoIncidencia">
                                                    <option value="" selected>DIAS ASIGNADOS</option>
                                                    <option value="" selected>DIAS DEVENGADOS</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="col-form-label">FECHA: </label>
                                                <input id="iIdEmpleado" type="date" class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="col-form-label">FECHA DE TERMINO: </label>
                                                <input id="iIdEmpleado" type="date" class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="col-form-label">PERIODO VACACIONAL: </label>
                                                <input id="iIdEmpleado" type="text" class="form-control"
                                                    placeholder="PERIODO VACACIONAL">
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <!--<label class="col-md-4 col-form-label">OBSERVACIONES:</label>-->
                                                <textarea class="form-control" id="vchObservaciones"
                                                    placeholder="OBSERVACIONES"
                                                    onkeypress="this.value = this.value.toUpperCase();return"></textarea>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="col-form-label">
                                                    <input type="checkbox" id="todosEmpleadosCheckbox"
                                                        name="todosEmpleadosCheckbox"> TODOS LOS EMPLEADOS
                                                </label>
                                            </div>
                                        </div>


                                    </div>

                                    <div class="candidate">
                                        <div class="body">

                                            <div class="row-left">
                                                <button type="submit" class="boton-intec"
                                                    id="buttonRegistrar">ALTA</button>
                                                <button type="submit" class="boton-intec"
                                                    id="buttonVolver">CANCELAR</button>
                                                <button type="submit" class="boton-intec" id="buttonVolver">IMPRIMIR
                                                    VOLANTE</button>
                                            </div>



                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- fin de Contenido de página -->



    <!-- Footer -->
    <footer class="footer-bg">
        <div class="footer-bottom-area">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="footer-bottom border-top">
                            <div class="row">
                                <div class="col-lg-6">
                                    <a href="#">
                                        <img src="../../images/footer-logo.png" class="img-fluid" alt="">
                                    </a>
                                    <p class="copyright-text">DERECHOS DE AUTOR <a href="#">INTECPROOF</a> 2024,
                                        RESERVADOS</p>
                                </div>
                                <div class="col-lg-6">
                                    <div class="back-to-top">
                                        <a href="#">SUBIR<i class="fas fa-angle-up"></i></a>
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
    <script src="ProcesosDocumentosEmpleado.js"></script>





</body>

</html>