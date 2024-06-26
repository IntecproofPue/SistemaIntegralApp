<?php
require_once('../../includes/pandora.php');
require_once('../../includes/load.php');
require_once ('../altaPersona/FuncionesAltaEmpleado.php');

session_start();

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
    <link rel="stylesheet" href="../../assets/css/themify-icons.css"/>
    <link rel="stylesheet" href="../../assets/css/et-line.css"/>
    <link rel="stylesheet" href="../../assets/css/bootstrap-select.min.css"/>
    <link rel="stylesheet" href="../../assets/css/plyr.css"/>
    <link rel="stylesheet" href="../../assets/css/flag.css"/>
    <link rel="stylesheet" href="../../assets/css/slick.css"/>
    <link rel="stylesheet" href="../../assets/css/owl.carousel.min.css"/>
    <link rel="stylesheet" href="../../assets/css/jquery.nstSlider.min.css"/>

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
        .employer {
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
                <!-- pestañas de navegación-->
                <div class="skill-and-profile">
                    <div class="skill" style="display: flex; justify-content: center;">
                        <label style="align-self: flex-end;"><a href="DatosEmpleado.php">EMPLEADO</a></label>
                        <label style="align-self: flex-end;"><a
                                    href="../altaPuesto/consultaPuestoIndividual.php">PUESTO</a></label>
                        <label style="align-self: flex-end;"><a href="consultaDomicilio.php">DOMICILIO</a></label>
                        <label style="align-self: flex-end;"><a href="consultaContacto.php">CONTACTO</a></label>
                        <label style="align-self: flex-end;" class="selected"><a href="consultaDoctos.php">DOCUMENTOS</a></label>
                    </div>
                </div>
                <!-- fin de pestañas de navegación-->
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
                    <form action="altaDocumentos" method="post" class="dashboard-form">
                        <div id="information" class="row justify-content-center">
                            <div class="col-md-12">

                                <div class="candidate">
                                    <div class="body">
                                        <label class="col-form-label">
                                            <h6><i data-feather="user-check"></i>INFORMACION DE DOCUMENTOS
                                            </h6>
                                        </label>
                                        <div class="row-left">
                                            <a href="#" class="boton-intec" data-toggle="modal"
                                               data-target="#apply-popup-id-2" style="display:none;">AGREGAR</a>
                                        </div>
                                    </div>
                                </div>

                                <!-- INICIO DE TITULOS -->
                                <div class="employer">
                                    <div class="body">
                                        <div class="row">
                                            <div class="body">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label class="col-form-label">TIPO DE
                                                            DOCUMENTO</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label class="col-form-label"> ESTATUS DE DOCUMENTO </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label class="col-form-label">USUARIO ULTIMA
                                                            MODIFICACION</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group ">
                                                        <label class="col-form-label">FECHA ULTIMA
                                                            MODIFICACION</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="employer" id="agregarDocumentos"></div>


                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- inicio de modales -->
<div class="apply-popup">
    <div class="modal fade" id="apply-popup-id-2" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form class="dashboard-form">
                    <input type="hidden" name="iIdConstanteDocumento" id="iIdConstanteDocumento" value="">
                    <input type="hidden" name="iClaveDocumento" id="iClaveDocumento" value="">
                    <input type="hidden" name="iIdPersonaDocumento" id="iIdPersonaDocumento" value="">

                    <div class="modal-header">
                        <h5 class="modal-title"><i data-feather="edit"></i>ALTA DE DOCUMENTOS</h5>
                    </div>
                    <div class="modal-body">
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
                        <button class="boton-intec" id="buttonGuardarDocumento">GUARDAR</button>

                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
<!-- final de modales -->

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
<script src = "ProcesoModificacionDocumentos.js" ></script>

<script> document.getElementById('buttonGuardarDocumento').addEventListener('click', validarDocumento); </script>
<script> document.addEventListener('DOMContentLoaded', consultarDocumentos);</script>
<script> document.addEventListener('DOMContentLoaded', habilitarBotonesDocumentos );</script>

</body>

</html>