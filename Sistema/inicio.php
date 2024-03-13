<?php
  ob_start();
 require_once ('includes/pandora.php');




?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    
    <title><?php echo $tituloPagina; ?></title>
    

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


    <!--[if lt IE 9]>
    <script src="assets/js/html5shiv.min.js"></script>
    <script src="assets/js/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Header -->
    <header>
        <nav class="navbar navbar-expand-xl absolute-nav transparent-nav cp-nav navbar-light bg-light fluid-nav">
            <a class="navbar-brand" href="index.php">
                <img src="images/logo.png" class="img-fluid" alt="">
            </a>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto main-nav">
                    <li class="menu-item dropdown">
                        <a title="" href="#" data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true"
                            aria-expanded="false">ADMINISTRACION</a>
                        <ul class="dropdown-menu">
                            <li class="menu-item"><a href="dashboard.php">INVENTARIO</a></li>
                            <li class="menu-item"><a href="job-listing-with-map.html">MORE OPTIONS</a></li>
                            <li class="menu-item"><a href="job-details.html">MORE OPTIONS</a></li>
                            <li class="menu-item"><a href="post-job.html">MORE OPTIONS</a></li>
                        </ul>
                    </li>
                    <li class="menu-item dropdown">
                        <a title="" href="#" data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true"
                            aria-expanded="false">RECURSOS HUMANOS</a>
                        <ul class="dropdown-menu">
                            <li class="button"><a
                                    onclick="window.location.href = 'persona/altaPersona/altaPersona.php'">ALTA DE
                                    PERSONA</a></li>
                            <li class="button"><a
                                    onclick="window.location.href = 'persona/altaPuesto/altaPuesto.php'">ALTA DE
                                    PUESTO</a></li>
                            <li class="button"><a
                                    onclick="window.location.href = 'persona/bajaPersona/bajaPersona.php'">BAJA DE
                                    PERSONA</a></li>
                            <li class="button"><a
                                    onclick="window.location.href = 'persona/consulEmpleado/consultaEmpleado.php'">CONSULTA
                                    DE
                                    EMPLEADO</a></li>
                            <li class="button"><a
                                    onclick="window.location.href = 'persona/modifiPersona/modifiPersona.php'">MODIFICACION
                                    DE
                                    PERSONA</a></li>
                        </ul>
                    </li>
                    <li class="menu-item dropdown">
                        <a title="" href="#" data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true"
                            aria-expanded="false">CAPITAL HUMANO</a>
                        <ul class="dropdown-menu">
                            <li class="menu-item"><a href="candidate.html">MORE OPTIONS</a></li>
                            <li class="menu-item"><a href="candidate-details.html">MORE OPTIONS</a></li>
                            <li class="menu-item"><a href="dashboard.html">MORE OPTIONS</a></li>
                            <li class="menu-item"><a href="dashboard-edit-profile.html">MORE OPTIONS</a></li>
                        </ul>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto account-nav">
                    <li class="dropdown menu-item header-top-notification">
                        <a href="#" class="notification-button"  title="Notificaciones"></a>
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
                                <a href="#">NOTIFICACIONES</a>
                            </div>
                        </div>
                    </li>
                    <li class="menu-item login-popup"><button title="Slir de la aplicación"  type="button" 
                    onclick="window.location.href = 'index.php'">SALIR</button></li>
                </ul>
            </div>
        </nav>
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
    </header>
    <!-- Header End -->


    <!-- Banner -->
    <div class="banner banner-1 banner-1-bg">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="banner-content">
                        <h1>9 Trabajadores en Lista</h1>
                        <p>¡Vamos acrear una aplicación para mejorar empleo y oportunidades profesionales!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner End -->








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