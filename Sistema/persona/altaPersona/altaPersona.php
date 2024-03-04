<?php
    require_once ('../../includes/pandora.php');

    session_start();

    function EjecutarConstante()
    {
        $serverName = "192.168.100.39, 1433";
        $connectionInfo = array("Database" => "BDSistemaIntegral_PRETEST",
            "UID" => "Development",
            "PWD" => "Development123*",
            'CharacterSet' => 'UTF-8');

        $conn = sqlsrv_connect($serverName, $connectionInfo);

        if ($conn === false) {
            die( print_r( sqlsrv_errors(), true));
        }

        $datosCatConstante = array (
            'iOpcion' => 4 ,
            'iAgrupador' => 0,
            'iClaveCatalogo' => 0,
            'iIdConstante' => 0
        );

        $procedureName = "EXEC prcConsultaCatConstante  @iOpcion = ?,
                                                        @iAgrupador = ?, 
                                                        @iClave = ?, 
                                                        @iIdConstante = ? 
                                                    ";

        $params = array(
            $datosCatConstante['iOpcion'],
            $datosCatConstante['iAgrupador'],
            $datosCatConstante['iClaveCatalogo'],
            $datosCatConstante['iIdConstante']
        );

        $result = sqlsrv_query($conn, $procedureName, $params);

        $CatConstante = array();

        if ($result === false){
            die(print_r(sqlsrv_errors(), true));

        } else{
            do{
                while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
                    $CatConstante[] = $row;
                }
            }while (sqlsrv_next_result($result));
        }
        return $CatConstante;

        sqlsrv_close($conn);
    }

    $_SESSION['CatConstante'] = EjecutarConstante();

    function ObtenerNombre(){
        $serverName = "192.168.100.39, 1433";
        $connectionInfo = array("Database" => "BDSistemaIntegral_PRETEST",
            "UID" => "Development",
            "PWD" => "Development123*",
            'CharacterSet' => 'UTF-8');

        $conn = sqlsrv_connect($serverName, $connectionInfo);

        if ($conn === false) {
            die( print_r( sqlsrv_errors(), true));
        }

        $datosPersona = array (
            'iIdPersona' => 0 ,
            'vchCadena' => ''
        );

        $procedureName = "EXEC prcConsultaPersona    @iIdPersona = ?,
                                                     @vchCadena = ?
                                                    ";

        $params = array(
            $datosPersona['iIdPersona'],
            $datosPersona['vchCadena']
        );

        $DatosPersona = array();
        $result = sqlsrv_query($conn, $procedureName, $params);


        if ($result === false){
            die(print_r(sqlsrv_errors(), true));

        } else{
            do{
                while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
                    $DatosPersona[] = $row;
                }
            }while (sqlsrv_next_result($result));
        }

        if ($DatosPersona[0]['bResultado' == 1]){
            return true;
        }
        return false;

        sqlsrv_close($conn);

    }
    function EjecutarRegimenUso()
    {
        $serverName = "192.168.100.39, 1433";
        $connectionInfo = array("Database" => "BDSistemaIntegral_PRETEST",
            "UID" => "Development",
            "PWD" => "Development123*",
            'CharacterSet' => 'UTF-8');

        $conn = sqlsrv_connect($serverName, $connectionInfo);

        if ($conn === false) {
            die( print_r( sqlsrv_errors(), true));
        }

        $datosRegimenUso = array (
            'iOpcion' => 1 ,
            'iIdTipoPersona' => 61
        );

        $procedureName = "EXEC prcConsultaRegimenUso    @iOpcion = ?,
                                                        @iIdTipoPersona = ?
                                                    ";

        $params = array(
            $datosRegimenUso['iOpcion'],
            $datosRegimenUso['iIdTipoPersona']
        );

        $result = sqlsrv_query($conn, $procedureName, $params);

        $RegimenUso = array();

        if ($result === false){
            die(print_r(sqlsrv_errors(), true));

        } else{
            do{
                while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
                    $RegimenUso[] = $row;
                }
            }while (sqlsrv_next_result($result));
        }

        return $RegimenUso;

        sqlsrv_close($conn);
    }


    function validaDatosPersona(){
        $serverName = "192.168.100.39, 1433";
        $connectionInfo = array("Database" => "BDSistemaIntegral_PRETEST",
            "UID" => "Development",
            "PWD" => "Development123*",
            'CharacterSet' => 'UTF-8');

        $conn = sqlsrv_connect($serverName, $connectionInfo);

        if ($conn === false) {
            die( print_r( sqlsrv_errors(), true));
        }

        $nombre = $_POST['nombre'];
        $vchPrimerApellido = $_POST['PrimerApellido'];
        $vchSegundoApellido = $_POST['SegundoApellido'];
        $dFechaNacimiento = $_POST['FechaNacimiento'];
        $idGenero = $_POST['genero'];
        $idNacionalidad = $_POST['nacionalidad'];
        $CURP = $_POST['CURP'];
        $codigoFiscal = $_POST['CodigoFiscal'];
        $UsoFiscal   = $_POST['usoFiscal'];
        $RegimenFiscal  = $_POST['regimenFiscal'];


        $datosPersona = array (
            'vchNombre' => $nombre,
            'vchPrimerApellido' => $vchPrimerApellido,
            'vchSegundoApellido' => $vchSegundoApellido,
            'dFechaNacimiento' => $dFechaNacimiento,
            'iIdGenero' => $idGenero,
            'iIdNacionalidad' => $idNacionalidad,
            'iIdTipoPersona' => 61,
            'RegimenFiscal' => $RegimenFiscal,
            'UsoFiscal' => $UsoFiscal,
            'CURP' => $CURP,
            'CodigoFiscal' => $codigoFiscal,
            'iEstatus' => 0,
            'iOpcion' => 1,
            'iProceso' => 1,
            'iIdPersona' => 0,
            'iIdUsoFiscal' => 0,
            'bResultado' => 0,
            'vchCampoError' => '',
            'vchMensaje' => ''

        );

        $procedureName = "EXEC prcRN_Persona        @vchNombre = ?,
                                                    @vchPrimerApellido = ?
                                                    @vchSegundoApellido = ?
                                                    @vchRFC = ?
                                                    @vchCURP = ?
                                                    @dFechaNacimiento = ?
                                                    @iIdGenero = ?
                                                    @iIdNacionalidad = ?
                                                    @iIdTipoPersona = ?
                                                    @iRegimen = ?
                                                    @vchUsoFiscal = ?
                                                    @iCodigoFiscal = ?
                                                    @iEstatus = ?
                                                    @iOpcion = ? 
                                                    @iProceso = ? 
                                                    @iIdPersona = ? 
                                                    @iIdUsoFiscal = ?
                                                    @bResultado = ?
                                                    @vchCampoError = ? 
                                                    @vchMensaje = ?
                                                    ";

        $params = array(
            $datosPersona['vchNombre'],
            $datosPersona['vchPrimerApellido'],
            $datosPersona['vchSegundoApellido'],
            $datosPersona['RFC'],
            $datosPersona['CURP'],
            $datosPersona['dFechaNacimiento'],
            $datosPersona['iIdGenero'],
            $datosPersona['iIdNacionalidad'],
            $datosPersona['iIdTipoPersona'],
            $datosPersona['RegimenFiscal'],
            $datosPersona['UsoFiscal'],
            $datosPersona['CodigoFiscal'],
            $datosPersona['iEstatus'],
            $datosPersona['iOpcion'],
            $datosPersona['iProceso'],
            array(&$datosPersona['iIdPersona'], SQLSRV_PARAM_OUT),
            array(&$datosPersona['iIdUsoFiscal'], SQLSRV_PARAM_OUT),
            array(&$datosPersona['bResultado'], SQLSRV_PARAM_OUT),
            array(&$datosPersona['vchCampoError'], SQLSRV_PARAM_OUT),
            array(&$datosPersona['vchMensaje'], SQLSRV_PARAM_OUT)
        );

        $result = sqlsrv_query($conn, $procedureName, $params);

        if ($result === false){
            die(print_r(sqlsrv_errors(), true));

        } else{
            if ($datosPersona['bResultado'] == 1){
                header ("Location: altaDomicilio.php ");
                exit;
            } else {
                echo "Mensaje Error: ". $datosPersona["vchMensaje"]."<br>";
            }
        }

        sqlsrv_close($conn);
    }


    function ObtenerIdGenero() {
        if (isset ($_SESSION['CatConstante'])){
            $datosGenero = $_SESSION['CatConstante'];
            $generoEncontrado = array();

            foreach ($datosGenero as $valorGenero) {
                if ($valorGenero['iAgrupador'] == 3) {
                    $generoEncontrado [] = $valorGenero;
                }
            }
            return $generoEncontrado;
        } else {
            echo ("No hay datos del género");
        }
    }
    $resultadoGenero = ObtenerIdGenero();


    function obtenerIdNacionalidad() {
        if (isset ($_SESSION['CatConstante'])){
            $datosNacionalidad = $_SESSION['CatConstante'];
            $nacionalidadEncontrada = array();

            foreach ($datosNacionalidad as $valorNacionalidad) {
                if ($valorNacionalidad['iAgrupador'] == 6) {
                    $nacionalidadEncontrada [] = $valorNacionalidad;
                }
            }
            return $nacionalidadEncontrada;
        } else {
            echo ("No hay datos de la nacionalidad");
        }
    }
    $resultadoNacionalidad = ObtenerIdNacionalidad();


    function ObtenerIdRegimen() {
        $datosRegimen = $_SESSION['RegimenUso'];
        $RegimenEncontrado = array();

        foreach ($datosRegimen as $valorRegimen) {
            $idRegimen = $valorRegimen['iIdRegimenFiscal'];
            $RegimenEncontrado[$idRegimen] = $valorRegimen;
        }


        return array_values($RegimenEncontrado);
    }

    $resultadoRegimen = ObtenerIdRegimen();

    function ObtenerUsoFiscal($iIdRegimen)
    {
        $datosUsoFiscal = $_SESSION['RegimenUso'];
        $UsoFiscalEncontrado = array();

        foreach ($datosUsoFiscal as $valorUsoFiscal){
            if ($valorUsoFiscal['iIdRegimenFiscal'] == $iIdRegimen){
                $UsoFiscalEncontrado[] = $valorUsoFiscal;
            }
        }
        return $UsoFiscalEncontrado;
    }


    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['regimenFiscal'])){
        $regimenSeleccionado = $_POST['regimenFiscal'];
        $resultadoUsoFiscal = ObtenerUsoFiscal($regimenSeleccionado);

    }

?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title><?php echo $tituloPagina; ?></title>

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
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                            <li class="menu-item active"><a title="Home" href="../../home-1.html">Home</a></li>
                            <li class="menu-item dropdown">
                                <a href="#" data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true" aria-expanded="false">Jobs</a>
                                <ul  class="dropdown-menu">
                                    <li class="menu-item"><a  href="../../job-listing.html">Job Listing</a></li>
                                    <li class="menu-item"><a  href="../../job-listing-with-map.html">Job Listing With Map</a></li>
                                    <li class="menu-item"><a  href="../../job-details.html">Job Details</a></li>
                                    <!-- <li class="menu-item"><a  href="post-job.html">Post Job</a></li> -->
                                </ul>
                            </li>
                            <li class="menu-item dropdown">
                                <a title="" href="#" data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true" aria-expanded="false">Candidates</a>
                                <ul  class="dropdown-menu">
                                    <li class="menu-item"><a  href="../../candidate.html">Candidate Listing</a></li>
                                    <li class="menu-item"><a  href="../../candidate-details.html">Candidate Details</a></li>
                                    <li class="menu-item"><a  href="../../add-resume.html">Add Resume</a></li>
                                </ul>
                            </li>
                            <li class="menu-item dropdown">
                                <a title="" href="#" data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true" aria-expanded="false">Employers</a>
                                <ul  class="dropdown-menu">
                                    <li class="menu-item"><a  href="../../employer-listing.html">Employer Listing</a></li>
                                    <li class="menu-item"><a  href="../../employer-details.html">Employer Details</a></li>
                                    <li class="menu-item"><a  href="../../employer-dashboard-post-job.html">Post a Job</a></li>
                                </ul>
                            </li>
                            <li class="menu-item dropdown">
                                <a href="#" data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true" aria-expanded="false">Dashboard</a>
                                <ul  class="dropdown-menu">
                                    <li class="menu-item dropdown">
                                        <a href="#" data-toggle="dropdown"  class="dropdown-toggle" aria-haspopup="true" aria-expanded="false">Candidate Dashboard</a>
                                        <ul class="dropdown-menu">
                                            <li class="menu-item"><a  href="../../dashboard.html">Dashboard</a></li>
                                            <li class="menu-item"><a  href="../../dashboard-edit-profile.html">Edit Profile</a></li>
                                            <li class="menu-item"><a  href="../../add-resume.html">Add Resume</a></li>
                                            <li class="menu-item"><a  href="../../resume.html">Resume</a></li>
                                            <li class="menu-item"><a  href="../../edit-resume.html">Edit Resume</a></li>
                                            <li class="menu-item"><a  href="../../dashboard-bookmark.html">Bookmarked</a></li>
                                            <li class="menu-item"><a  href="../../dashboard-applied.html">Applied</a></li>
                                            <li class="menu-item"><a  href="../../dashboard-pricing.html">Pricing</a></li>
                                            <li class="menu-item"><a  href="../../dashboard-message.html">Message</a></li>
                                            <li class="menu-item"><a  href="../../dashboard-alert.html">Alert</a></li>
                                        </ul>
                                    </li>
                                    <li class="menu-item dropdown">
                                        <a href="#" data-toggle="dropdown"  class="dropdown-toggle" aria-haspopup="true" aria-expanded="false">Employer Dashboard</a>
                                        <ul class="dropdown-menu">
                                            <li class="menu-item"><a href="../../employer-dashboard.html">Employer Dashboard</a></li>
                                            <li class="menu-item"><a href="../../employer-dashboard-edit-profile.html">Edit Profile</a></li>
                                            <li class="menu-item"><a href="../../employer-dashboard-manage-candidate.html">Manage Candidate</a></li>
                                            <li class="menu-item"><a href="../../employer-dashboard-manage-job.html">Manage Job</a></li>
                                            <li class="menu-item"><a href="../../employer-dashboard-message.html">Dashboard Message</a></li>
                                            <li class="menu-item"><a href="../../employer-dashboard-pricing.html">Dashboard Pricing</a></li>
                                            <li class="menu-item"><a href="../../employer-dashboard-post-job.html">Post Job</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="menu-item dropdown">
                                <a title="" href="#" data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true" aria-expanded="false">Pages</a>
                                <ul  class="dropdown-menu">
                                    <li class="menu-item"><a href="../../about-us.html">About Us</a></li>
                                    <li class="menu-item"><a href="../../how-it-work.html">How It Works</a></li>
                                    <li class="menu-item"><a href="../../pricing.html">Pricing Plan</a></li>
                                    <li class="menu-item"><a href="../../faq.html">FAQ</a></li>
                                    <li class="menu-item dropdown">
                                        <a href="#" data-toggle="dropdown"  class="dropdown-toggle" aria-haspopup="true" aria-expanded="false">News &amp; Advices</a>
                                        <ul class="dropdown-menu">
                                            <li class="menu-item"><a href="../../blog.html">News</a></li>
                                            <li class="menu-item"><a href="../../blog-grid.html">News Grid</a></li>
                                            <li class="menu-item"><a href="../../blog-details.html">News Details</a></li>
                                        </ul>
                                    </li>
                                    <li class="menu-item"><a href="../../checkout.html">Checkout</a></li>
                                    <li class="menu-item"><a href="../../payment-complete.html">Payment Complete</a></li>
                                    <li class="menu-item"><a href="../../invoice.html">Invoice</a></li>
                                    <li class="menu-item"><a href="../../terms-and-condition.html">Terms And Condition</a></li>
                                    <li class="menu-item"><a href="../../404.html">404 Page</a></li>
                                    <li class="menu-item"><a href="../../login.html">Login</a></li>
                                    <li class="menu-item"><a href="../../register.html">Register</a></li>
                                </ul>
                            </li>
                            <li class="menu-item"><a href="../../contact.html">Contact Us</a></li>

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
                    <h1>Alta Persona</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Alta Persona&nbsp;&nbsp;</li>
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

                        <?php
                        if(isset($_POST['submitBuscar']))

                        {
                            $nombreaBuscar = $_POST['nombreaBuscar'];
                            echo"<br>El nombre a buscar es <b>$nombreaBuscar</b>";
                            //Mandar el prc de consulta de persona
                            if($nombreaBuscar == 'Luis'){ ?>

                                <div style="background-color: #117a8b; text-align: center"><?php echo "<i><span style='color: #ededee' size='-2'> $busquedaEncontradaTxt</span></i><br />"; ?></div>
                                <br>Aquí la lista de coincidencias


                            <?php	}else{ ?>




                                <div style="background-color: #c82333; text-align: center"><?php echo "<i><span style='color: #ededee' size='-2'> $busquedaNoEncontradaTxt</span></i><br />"; ?></div>

                                <form action="altaPersona" method="post" class="dashboard-form">

                                    <div class="dashboard-section basic-info-input">
                                        <h4><i data-feather="user-check"></i>Basic Infos</h4>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Nombre (s)</label>
                                            <div class="col-sm-9">
                                                <input type="text" id="nombre" class="form-control" placeholder="Nombre" min="2" maxlength="150" onkeypress="this.value = this.value.toUpperCase();return soloNombre(event)" required>

                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Primer Apellido:</label>
                                            <div class="col-sm-9">
                                                <input type="text" id="PrimerApellido" class="form-control" placeholder="Primer Apellido" min="2" name="nombreEscrito" maxlength="50" onkeypress="this.value = this.value.toUpperCase();return soloNombre(event)" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Segundo Apellido:</label>
                                            <div class="col-sm-9">
                                                <input type="text" id = "SegundoApellido" class="form-control" placeholder="Segundo Apellido" min="2" name="apeUnoEsccrito" maxlength="50" onkeypress="this.value = this.value.toUpperCase();return soloNombre(event)" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Fecha de Nacimiento:</label>
                                            <div class="col-sm-9">
                                                <input type="date" id="FechaNacimiento" class="form-control" placeholder="Apellido Materno" name="apeDosEscrito">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">CURP:</label>
                                            <div class="col-sm-9">
                                                <input type="text" id="CURP" class="form-control" placeholder="Ingresa CURP" name="curpEscrito" maxlength="18">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Género:</label>
                                            <div class="col-sm-9">
                                                <select class="form-control" name = "genero" >
                                                    <option value="" selected>Selecciona un género</option>
                                                    <?php foreach ($resultadoGenero as $genero): ?>
                                                        <option value="<?= $genero['iIdConstante'] ?>">
                                                            [<?= $genero['iClaveCatalogo'] ?>] - <?= $genero['vchDescripcion'] ?>
                                                        </option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>

                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">NACIONALIDAD</label>
                                            <div class="col-sm-9">
                                                <select class="form-control" name ="nacionalidad" >
                                                    <option value="" selected>Selecciona una nacionalidad</option>
                                                    <?php foreach ($resultadoNacionalidad as $nacionalidad): ?>
                                                        <option value="<?= $nacionalidad['iIdConstante'] ?>">
                                                            [<?= $nacionalidad['iClaveCatalogo'] ?>] - <?= $nacionalidad['vchDescripcion'] ?>
                                                        </option>
                                                    <?php endforeach; ?>

                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">REGIMEN FISCAL</label>
                                            <div class="col-sm-9">
                                                <select class="form-control" name = "regimenFiscal">
                                                    <option value="" selected class="form-control">Selecciona un regimen fiscal</option>
                                                    <?php foreach ($resultadoRegimen as $regimen): ?>
                                                        <option value="<?= $regimen['iIdRegimenFiscal'] ?>">
                                                            [<?= $regimen['iRegimen'] ?>] - <?= $regimen['vchDescripcionRegimen'] ?>
                                                        </option>
                                                    <?php endforeach; ?>

                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">USO FISCAL</label>
                                            <div class="col-sm-9">
                                                <select class="form-control" name = "usoFiscal" onclick="ObtenerUsoFiscal(event)">
                                                    <option value="" selected class="form-control">Selecciona un uso fiscal</option>
                                                        <script>
                                                            window.onload = function ();{
                                                                actualizarUsoFiscal ();
                                                            }
                                                            function actualizarUsoFiscal(){
                                                                var selectUsoFiscal = document.getElementsByName('usoFiscal')[0];

                                                                <?php foreach ($resultadoUsoFiscal as $usoFiscal): ?>
                                                                    var option = document.createElement('option');
                                                                    option.value = '<?= $usoFiscal['iIdCatUsoFiscal'] ?>';
                                                                    option.text = '[<?=$usoFiscal['vchClaveUso']?>] - <?=$usoFiscal['vchDescripcionUso']?>';
                                                                    selectUsoFiscal.add(option);
                                                                <?php endforeach;?>
                                                            }
                                                        </script>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">CÓDIGO POSTAL:</label>
                                            <div class="col-sm-9">
                                                <input type="text" id="CodigoPostal" class="form-control" placeholder="Código postal fiscal" name="rfcEscrito" maxlength="5" onkeypress="return soloNumeros(event)">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">CÓDIGO POSTAL FISCAL:</label>
                                            <div class="col-sm-9">
                                                <input type="text" id="CodigoFiscal" class="form-control" placeholder="Código postal fiscal" name="rfcEscrito" maxlength="5" onkeypress="return soloNumeros(event)">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">R.F.C:</label>
                                            <div class="col-sm-9">
                                                <input type="text" id="RFC" class="form-control" placeholder="Escribe tu RFC" name="rfcEscrito" maxlength="13" onkeypress="this.value = this.value.toUpperCase();return soloRfc(event)">
                                                <input type="text" onkeyup="this.value = this.value.toUpperCase();">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="dashboard-section basic-info-input">

                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label"></label>
                                            <div class="col-sm-9">
                                                <button class="button">Siguiente</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>


                            <?php	}


                            ?>







                            <?php
                        }else{





                            ?>
                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="dashboard-form">

                                <div class="dashboard-section basic-info-input">
                                    <h4><i data-feather="user-check"></i>búsqueda</h4>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Nombre:</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" placeholder="Ingresa el nombre completo" name="nombreaBuscar">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label"></label>
                                        <div class="col-sm-9">
                                            <button class="button" type="submit" name="submitBuscar">Buscar</button>
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

<!-- Call to Action -->
<div class="call-to-action-bg padding-top-90 padding-bottom-90">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="call-to-action-2">
                    <div class="call-to-action-content">
                        <h2>Buscar empleado:</h2>








                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Call to Action End -->

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