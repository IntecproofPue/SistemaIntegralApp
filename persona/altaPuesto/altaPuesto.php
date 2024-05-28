<?php
require_once('../../includes/pandora.php');
require_once('../../includes/load.php');
require_once('../../includes/sql.php');
require_once ('FuncionesPuesto.php');

session_start();

$resultadoContratacion = ObtenerTipoContratacion();
$resultadoHorasLaborales = ObtenerHorasLaborales();
$resultadoNiveles = ObtenerNivel();

if (isset($_SESSION['user_id'])) { ?>
<?php } else {

    ?>
    <script type="text/javascript">
        //Redireccionamiento tras 5 segundos
        setTimeout(function () {
            window.location.href = "index.php";
        }, 0);
    </script>
    <?php

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
                                    <li><a href="#"><span class="ti-settings"></span><?php echo $herramientas; ?></a>
                                    </li>
                                    <li><a href="../../includes/logout.php"><span
                                                    class="ti-power-off"></span><?php echo $logout; ?></a></li>
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
                </nav>
            </div>
        </div>
    </div>
</header>

<!-- Breadcrumb -->
<div class="alice-bg padding-top-20 padding-bottom-20">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="breadcrumb-area">
                    <h1>ALTA PUESTO</h1>
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

                        <form class="dashboard-form">

                            <input type="hidden" name="iIdConstanteContratacion" id="iIdConstanteContratacion" value="">
                            <input type="hidden" name="iClaveContratacion" id="iClaveContratacion" value="">

                            <input type="hidden" name="iIdConstanteHoras" id="iIdConstanteHoras" value="">
                            <input type="hidden" name="iClaveHoras" id="iClaveHoras" value="">


                            <input type="hidden" name="iIdConstanteNivel" id="iIdConstanteNivel" value="">
                            <input type="hidden" name="iClaveNivel" id="iClaveNivel" value="">

                            <div class="dashboard-section basic-info-input">
                                <h4><i data-feather="user-check"></i>INFORMACIÓN DEL PUESTO</h4>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">*NOMBRE DEL PUESTO</label>
                                    <div class="col-sm-9">
                                        <input type="text" id="nombrePuesto" name="nombrePuesto" class="form-control"
                                               placeholder="NOMBRE DEL PUESTO"
                                               min="2" maxlength="150"
                                               onkeypress="this.value = this.value.toUpperCase();return soloNombre(event)"
                                               required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">*DESCRIPCION DE PUESTO:</label>
                                    <div class="col-sm-9">
                                        <input type="text" id="descripcionPuesto" name="descripcionPuesto"
                                               class="form-control" placeholder="DESCRIPCION DE PUESTO"
                                               style="text-transform: uppercase" pattern="[A-Za-zÁÉÍÓÚáéíóúüÜñÑ\s]+"
                                               title="SOLO SE PERMITEN LETRAS" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">*NIVEL ORGANIZACIONAL:</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" id="nivelOrganizacional"
                                                name="nivelOrganizacional">
                                            <option value="" selected>SELECCIONE UN NIVEL ORGANIZACIONAL</option>
                                            <?php foreach ($resultadoNiveles as $nivel): ?>
                                                <option value="<?= $nivel['iIdConstante'] . '-' . $nivel['iClaveCatalogo'] ?>">
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
                                                <option value="<?= $contratacion['iIdConstante'] . '-' . $contratacion['iClaveCatalogo'] ?>">
                                                    [<?= $contratacion['iClaveCatalogo'] ?>]
                                                    - <?= $contratacion['vchDescripcion'] ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">*HORAS LABORALES:</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" id="horasLaborales" name="horasLaborales">
                                            <option value="" selected>SELECCIONE LAS HORALES LABORALES</option>
                                            <?php foreach ($resultadoHorasLaborales as $horas): ?>
                                                <option value="<?= $horas['iIdConstante'] . '-' . $horas['iClaveCatalogo'] ?>">
                                                    [<?= $horas['iClaveCatalogo'] ?>] - <?= $horas['vchDescripcion'] ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">*SALARIO NETO:</label>
                                    <div class="col-sm-9">
                                        <input type="number" id="salarioNeto" name="salarioNeto" class="form-control"
                                               placeholder="SALARIO NETO"
                                               required step="any" pattern="\d+(\.\d{1,2})?"
                                               title="INGRESA UN NUMERO VALIDO (HASTA 2 DECIMALES)">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">*SALARIO FISCAL:</label>
                                    <div class="col-sm-9">
                                        <input type="number" id="salarioFiscal" name="salarioFiscal"
                                               class="form-control" placeholder="SALARIO FISCAL"
                                               step="any" pattern="\d+(\.\d{1,2})?"
                                               title="INGRESA UN NUMERO VALIDO (HASTA 2 DECIMALES)" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">*SALARIO COMPLEMENTARIO:</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" id="salarioComplementario"
                                               name="salarioComplementario"
                                               placeholder="SALARIO COMPLEMENTARIO" step="any"
                                               pattern="\d+(\.\d{1,2})?"
                                               title="INGRESA UN NUMERO VALIDO (HASTA 2 DECIMALES)" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label"></label>
                                    <div class="col-sm-9">
                                        <button type="button" class="button" id="botonSiguiente">GUARDAR</button>
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
<script src="ProcedimientosPuesto.js"></script>

<script>  document.getElementById('botonSiguiente').addEventListener('click', ValidarDatosPuesto); </script>
</body>

</html>