<?php
ob_start();
require_once('includes/pandora.php');




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
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <!-- External Css -->
    <link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css" />
    <link rel="stylesheet" href="assets/css/et-line.css" />
    <link rel="stylesheet" href="assets/css/bootstrap-select.min.css" />
    <link rel="stylesheet" href="assets/css/plyr.css" />
    <link rel="stylesheet" href="assets/css/flag.css" />
    <link rel="stylesheet" href="assets/css/slick.css" />
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css" />
    <link rel="stylesheet" href="assets/css/jquery.nstSlider.min.css" />

    <!-- Custom Css -->
    <link rel="stylesheet" type="text/css" href="css/main.css">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600%7CRoboto:300i,400,500" rel="stylesheet">

    <!-- Favicon -->
    <link rel="icon" href="images/favicon.png">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="images/icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="images/icon-114x114.png">


</head>

<body>

    <header class="header-2">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="header-top">
                        <div class="logo-area">
                            <a href="index.php"><img src="images/logo-2.png" alt=""></a>
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
                                        <a href="home-2.html" class="notification-list">
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
                            <div class="dropdown header-top-account login-modals">
                                <li><a href="includes/logout.php"><span class="ti-power-off"></span>Log Out</a></li>
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

                                <li class="menu-item dropdown">
                                    <a href="#" data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true" aria-expanded="false">ADMINISTRACION DEL SISTEMA</a>
                                    <ul class="dropdown-menu">
                                        <li class="menu-item dropdown">
                                            <a href="#" data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true" aria-expanded="false">PERSONA</a>
                                            <ul class="dropdown-menu">
                                                <li class="menu-item"><a href="persona/altaPersona/altaUsuario.php">ALTA DE USUARIO</a></li>
                                                <li class="menu-item"><a href="persona/consulEmpleado/consultaUsuario.php">CONSULTA DE USUARIO</a></li>
                                                <li class="menu-item"><a href="persona/modifiPersona/modificaUsuario.php">MODIFICACION DE USUARIO</a></li>
                                            </ul>
                                        </li>

                                        <li class="menu-item dropdown">
                                            <a href="#" data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true" aria-expanded="false">ROLES</a>
                                            <ul class="dropdown-menu">
                                                <li class="menu-item"><a href="persona/altaPersona/altaRol.php">ALTA DE ROLES</a></li>
                                                <li class="menu-item"><a href="persona/consulEmpleado/consultaRol.php">CONSULTA DE ROLES</a></li>
                                                <li class="menu-item"><a href="persona/modifiPersona/modificaRol.php">MODIFICACION DE ROLES</a></li>
                                            </ul>
                                        </li>

                                        <li class="menu-item dropdown">
                                            <a href="#" data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true" aria-expanded="false">FUNCIONALIDADES</a>
                                            <ul class="dropdown-menu">
                                                <li class="menu-item"><a href="persona/altaPersona/altaFuncionalidad.php">ALTA DE FUNCIONALIDAD</a></li>
                                                <li class="menu-item"><a href="persona/consulEmpleado/consultaFuncionalidad.php">CONSULTA DE FUNCIONALIDAD</a></li>
                                                <li class="menu-item"><a href="persona/modifiPersona/modificaFuncionalidad.php">MODIFICACION DE FUNCIONALIDAD</a></li>
                                            </ul>
                                        </li>

                                        <li class="menu-item dropdown">
                                            <a href="#" data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true" aria-expanded="false">ROLES-FUNCIONALIDAD</a>
                                            <ul class="dropdown-menu">
                                                <li class="menu-item"><a href="persona/altaPersona/altaUsuario.php">ALTA DE ROL-FUNCIONALIDAD</a></li>
                                                <li class="menu-item"><a href="persona/consulEmpleado/consultaUsuario.php">CONSULTA DE ROL-FUNCIONALIDAD</a></li>
                                                <li class="menu-item"><a href="persona/modifiPersona/modificaUsuario.php">MODIFICACION DE ROL-FUNCIONALIDAD</a></li>
                                            </ul>
                                        </li>

                                        <li class="menu-item dropdown">
                                            <a href="#" data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true" aria-expanded="false">USUARIOS-ROLES</a>
                                            <ul class="dropdown-menu">
                                                <li class="menu-item"><a href="persona/altaPersona/altaUsuario.php">ALTA DE USUARIO-ROL</a></li>
                                                <li class="menu-item"><a href="persona/consulEmpleado/consultaUsuario.php">CONSULTA DE USUARIO-ROL</a></li>
                                                <li class="menu-item"><a href="persona/modifiPersona/modificaUsuario.php">MODIFICACION DE USUARIO-ROL</a></li>
                                            </ul>
                                        </li>

                                    </ul>
                                </li>

                                <li class="menu-item dropdown">
                                    <a href="#" data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true" aria-expanded="false">RECURSOS HUMANOS</a>
                                    <ul class="dropdown-menu">
                                        <li class="menu-item dropdown">
                                            <a href="#" data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true" aria-expanded="false">PERSONA</a>
                                            <ul class="dropdown-menu">
                                                <li class="menu-item"><a href="persona/altaPersona/altaPersona.php">ALTA DE PERSONA</a></li>
                                                <li class="menu-item"><a href="persona/consulEmpleado/consultaPersona.php">CONSULTA DE PERSONA</a></li>
                                                <li class="menu-item"><a href="persona/modifiPersona/modificaPersona.php">MODIFICACION DE PERSONA</a></li>
                                            </ul>
                                        </li>

                                        <li class="menu-item dropdown">
                                            <a href="#" data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true" aria-expanded="false">EMPLEADO</a>
                                            <ul class="dropdown-menu">
                                                <li class="menu-item"><a href="persona/altaPersona/altaEmpleado.php">ALTA DE EMPLEADO</a></li>
                                                <li class="menu-item"><a href="persona/consulEmpleado/consultaEmpleado.php">CONSULTA DE EMPLEADO</a></li>
                                                <li class="menu-item"><a href="persona/modifiPersona/modificaEmpleado.php">MODIFICACION DE EMPLEADO</a></li>
                                            </ul>
                                        </li>

                                        <li class="menu-item dropdown">
                                            <a href="#" data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true" aria-expanded="false">PUESTOS</a>
                                            <ul class="dropdown-menu">
                                                <li class="menu-item"><a href="persona/altaPersona/altaPuesto.php">ALTA DE PUESTO</a></li>
                                                <li class="menu-item"><a href="persona/consulEmpleado/consultaPuesto.php">CONSULTA DE PUESTO</a></li>
                                                <li class="menu-item"><a href="persona/modifiPersona/modificaPuesto.php">MODIFICACION DE PUESTO</a></li>
                                            </ul>
                                        </li>

                                        <li class="menu-item dropdown">
                                            <a href="#" data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true" aria-expanded="false">INCIDENCIAS</a>
                                            <ul class="dropdown-menu">
                                                <li class="menu-item"><a href="persona/altaPersona/altaIncidencia.php">REGISTRO DE INCIDENCIA</a></li>
                                                <li class="menu-item"><a href="persona/consulEmpleado/consultaIncidencia.php">SEGUIMIENTO DE INCIDENCIA</a></li>
                                            </ul>
                                        </li>

                                        <li class="menu-item dropdown">
                                            <a href="#" data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true" aria-expanded="false">PERMISOS</a>
                                            <ul class="dropdown-menu">
                                                <li class="menu-item"><a href="persona/altaPersona/altaUsuario.php">SOLICITUD DE PERMISO</a></li>
                                                <li class="menu-item"><a href="persona/consulEmpleado/consultaUsuario.php">SEGUIMIENTO DE PERMISO</a></li>
                                            </ul>
                                        </li>

                                        <li class="menu-item dropdown">
                                            <a href="#" data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true" aria-expanded="false">VACACIONES</a>
                                            <ul class="dropdown-menu">
                                                <li class="menu-item"><a href="persona/altaPersona/altaUsuario.php">SOLICITUD DE VACACIONES</a></li>
                                                <li class="menu-item"><a href="persona/consulEmpleado/consultaUsuario.php">SEGUIMIENTO DE VACACIONES</a></li>
                                                <li class="menu-item"><a href="persona/consulEmpleado/consultaUsuario.php">GESTION DE VACACIONES</a></li>
                                            </ul>
                                        </li>

                                    </ul>
                                </li>

                                <li class="menu-item dropdown">
                                    <a href="#" data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true" aria-expanded="false">NOMINA</a>
                                    <ul class="dropdown-menu">
                                        <li class="menu-item dropdown">
                                            <a href="#" data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true" aria-expanded="false">MORE INFO</a>
                                            <ul class="dropdown-menu">
                                                <li class="menu-item"><a href="#">MORE INFO</a></li>
                                                <li class="menu-item"><a href="#">MORE INFO</a></li>
                                                <li class="menu-item"><a href="#">MORE INFO</a></li>
                                            </ul>
                                        </li>

                                    </ul>
                                </li>

                                <li class="menu-item dropdown">
                                    <a href="#" data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true" aria-expanded="false">INGRESOS</a>
                                    <ul class="dropdown-menu">
                                        <li class="menu-item dropdown">
                                            <a href="#" data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true" aria-expanded="false">MORE INFO</a>
                                            <ul class="dropdown-menu">
                                                <li class="menu-item"><a href="#">MORE INFO</a></li>
                                                <li class="menu-item"><a href="#">MORE INFO</a></li>
                                                <li class="menu-item"><a href="#">MORE INFO</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>

                                <li class="menu-item dropdown">
                                    <a href="#" data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true" aria-expanded="false">EGRESOS</a>
                                    <ul class="dropdown-menu">
                                        <li class="menu-item dropdown">
                                            <a href="#" data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true" aria-expanded="false">MORE INFO</a>
                                            <ul class="dropdown-menu">
                                                <li class="menu-item"><a href="#">MORE INFO</a></li>
                                                <li class="menu-item"><a href="#">MORE INFO</a></li>
                                                <li class="menu-item"><a href="#">MORE INFO</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>

                                <li class="menu-item dropdown">
                                    <a href="#" data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true" aria-expanded="false">CONTROL DE OFICIOS</a>
                                    <ul class="dropdown-menu">
                                        <li class="menu-item dropdown">
                                            <a href="#" data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true" aria-expanded="false">MORE INFO</a>
                                            <ul class="dropdown-menu">
                                                <li class="menu-item"><a href="#">MORE INFO</a></li>
                                                <li class="menu-item"><a href="#">MORE INFO</a></li>
                                                <li class="menu-item"><a href="#">MORE INFO</a></li>
                                            </ul>
                                        </li>
                                        </ul>
                                </li>

                                <li class="menu-item dropdown">
                                    <a href="#" data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true" aria-expanded="false">INVENTARIO</a>
                                    <ul class="dropdown-menu">
                                        <li class="menu-item dropdown">
                                            <a href="#" data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true" aria-expanded="false">REGISTRO DE INVENTARIO</a>
                                            <ul class="dropdown-menu">
                                                <li class="menu-item"><a href="#">MORE INFO</a></li>
                                                <li class="menu-item"><a href="#">MORE INFO</a></li>
                                                <li class="menu-item"><a href="#">MORE INFO</a></li>
                                            </ul>
                                        </li>

                                        <li class="menu-item dropdown">
                                            <a href="#" data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true" aria-expanded="false">CONSULTA DE INVENTARIO</a>
                                            <ul class="dropdown-menu">
                                                <li class="menu-item"><a href="#">MORE INFO</a></li>
                                                <li class="menu-item"><a href="#">MORE INFO</a></li>
                                                <li class="menu-item"><a href="#">MORE INFO</a></li>
                                            </ul>
                                        </li>

                                        <li class="menu-item dropdown">
                                            <a href="#" data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true" aria-expanded="false">ACTUALIZACION DE INVENTARIO</a>
                                            <ul class="dropdown-menu">
                                                <li class="menu-item"><a href="#">MORE INFO</a></li>
                                                <li class="menu-item"><a href="#">MORE INFO</a></li>
                                                <li class="menu-item"><a href="#">MORE INFO</a></li>
                                            </ul>
                                        </li>
                                        </ul>
                                </li>

                                <li class="menu-item dropdown">
                                    <a href="#" data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true" aria-expanded="false">PROYECTOS</a>
                                    <ul class="dropdown-menu">
                                        <li class="menu-item dropdown">
                                            <a href="#" data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true" aria-expanded="false">ALTA DE PROYECTOS</a>
                                            <ul class="dropdown-menu">
                                                <li class="menu-item"><a href="#">MORE INFO</a></li>
                                                <li class="menu-item"><a href="#">MORE INFO</a></li>
                                                <li class="menu-item"><a href="#">MORE INFO</a></li>
                                            </ul>
                                        </li>

                                        <li class="menu-item dropdown">
                                            <a href="#" data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true" aria-expanded="false">CONSULTA DE PROYECTOS</a>
                                            <ul class="dropdown-menu">
                                                <li class="menu-item"><a href="#">MORE INFO</a></li>
                                                <li class="menu-item"><a href="#">MORE INFO</a></li>
                                                <li class="menu-item"><a href="#">MORE INFO</a></li>
                                            </ul>
                                        </li>

                                        <li class="menu-item dropdown">
                                            <a href="#" data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true" aria-expanded="false">ACTUALIZACION DE PROYECTOS</a>
                                            <ul class="dropdown-menu">
                                                <li class="menu-item"><a href="#">MORE INFO</a></li>
                                                <li class="menu-item"><a href="#">MORE INFO</a></li>
                                                <li class="menu-item"><a href="#">MORE INFO</a></li>
                                            </ul>
                                        </li>
                                        </ul>
                                </li>

                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>

    <!-- Modal -->
    <div class="account-entry">
        <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"><i data-feather="user"></i>Login</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="#">
                            <div class="form-group">
                                <input type="email" placeholder="Email Address" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="password" placeholder="Password" class="form-control">
                            </div>
                            <div class="more-option">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                    <label class="form-check-label" for="defaultCheck1">
                                        Remember Me
                                    </label>
                                </div>
                                <a href="#">Forget Password?</a>
                            </div>
                            <button class="button primary-bg btn-block">Login</button>
                        </form>
                        <div class="shortcut-login">
                            <span>Or connect with</span>
                            <div class="buttons">
                                <a href="#" class="facebook"><i class="fab fa-facebook-f"></i>Facebook</a>
                                <a href="#" class="google"><i class="fab fa-google"></i>Google</a>
                            </div>
                            <p>Don't have an account? <a href="#">Register</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="exampleModalLong2" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"><i data-feather="edit"></i>Registration</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="account-type">
                            <label for="idRegisterCan">
                                <input id="idRegisterCan" type="radio" name="register">
                                <span>Candidate</span>
                            </label>
                            <label for="idRegisterEmp">
                                <input id="idRegisterEmp" type="radio" name="register">
                                <span>Employer</span>
                            </label>
                        </div>
                        <form action="#">
                            <div class="form-group">
                                <input type="text" placeholder="Username" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="email" placeholder="Email Address" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="password" placeholder="Password" class="form-control">
                            </div>
                            <div class="more-option terms">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck2">
                                    <label class="form-check-label" for="defaultCheck2">
                                        I accept the <a href="#">terms & conditions</a>
                                    </label>
                                </div>
                            </div>
                            <button class="button primary-bg btn-block">Register</button>
                        </form>
                        <div class="shortcut-login">
                            <span>Or connect with</span>
                            <div class="buttons">
                                <a href="#" class="facebook"><i class="fab fa-facebook-f"></i>Facebook</a>
                                <a href="#" class="google"><i class="fab fa-google"></i>Google</a>
                            </div>
                            <p>Already have an account? <a href="#">Login</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Banner -->
    <div class="banner banner-2 banner-2-bg">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="banner-content">
                        <h1>9 Trabajadores en Lista</h1>
                        <p>¡Vamos acrear una aplicación para mejorar empleo y oportunidades profesionales!</p>
                        <div class="short-infos">
                            <div class="info">
                                <h4>5,862</h4>
                                <span>Jobs Posted</span>
                            </div>
                            <div class="info">
                                <h4>240</h4>
                                <span>Companies</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner End -->

    <!-- Footer -->
    <footer class="footer-bg">
        <div class="footer-top border-bottom section-padding-top padding-bottom-40">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="footer-logo">
                            
                        </div>
                    </div>
                    <div class="col-md-6">
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-widget-wrapper padding-bottom-60 padding-top-80">
            <div class="container">
                <div class="row">
                </div>
            </div>
        </div>
        <div class="footer-bottom-area">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="footer-bottom border-top">
                            <div class="row">
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
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/feather.min.js"></script>
    <script src="assets/js/bootstrap-select.min.js"></script>
    <script src="assets/js/jquery.nstSlider.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/visible.js"></script>
    <script src="assets/js/jquery.countTo.js"></script>
    <script src="assets/js/chart.js"></script>
    <script src="assets/js/plyr.js"></script>
    <script src="assets/js/tinymce.min.js"></script>
    <script src="assets/js/slick.min.js"></script>
    <script src="assets/js/jquery.ajaxchimp.min.js"></script>

    <script src="js/custom.js"></script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC87gjXWLqrHuLKR0CTV5jNLdP4pEHMhmg"></script>
    <script src="js/map.js"></script>
</body>

</html>