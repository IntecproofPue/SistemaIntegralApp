<?php
require_once('../../includes/pandora.php');

session_start();

function EjecutarConstante()
{
  $serverName = "192.168.100.39, 1433";
  $connectionInfo = array(
    "Database" => "BDSistemaIntegral_PRETEST",
    "UID" => "Development",
    "PWD" => "Development123*",
    'CharacterSet' => 'UTF-8'
  );

  $conn = sqlsrv_connect($serverName, $connectionInfo);

  if ($conn === false) {
    die(print_r(sqlsrv_errors(), true));
  }

  $datosCatConstante = array(
    'iOpcion' => 4,
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

  if ($result === false) {
    die(print_r(sqlsrv_errors(), true));

  } else {
    do {
      while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
        $CatConstante[] = $row;
      }
    } while (sqlsrv_next_result($result));
  }
  return $CatConstante;

  sqlsrv_close($conn);
}

$_SESSION['CatConstante'] = EjecutarConstante();

function ObtenerNombre($nombreaBuscar)
{
  $serverName = "192.168.100.39, 1433";
  $connectionInfo = array(
    "Database" => "BDSistemaIntegral_PRETEST",
    "UID" => "Development",
    "PWD" => "Development123*",
    'CharacterSet' => 'UTF-8'
  );

  $conn = sqlsrv_connect($serverName, $connectionInfo);

  if ($conn === false) {
    die(print_r(sqlsrv_errors(), true));
  }

  $datosPersona = array(
    'iIdPersona' => 0,
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


  if ($result === false) {
    die(print_r(sqlsrv_errors(), true));

  } else {
    do {
      while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
        $DatosPersona[] = $row;
      }
    } while (sqlsrv_next_result($result));
  }

  if ($DatosPersona[0]['bResultado' == 1]) {
    return true;
  }
  return false;

  sqlsrv_close($conn);
}
function EjecutarRegimenUso()
{
  $serverName = "192.168.100.39, 1433";
  $connectionInfo = array(
    "Database" => "BDSistemaIntegral_PRETEST",
    "UID" => "Development",
    "PWD" => "Development123*",
    'CharacterSet' => 'UTF-8'
  );

  $conn = sqlsrv_connect($serverName, $connectionInfo);

  if ($conn === false) {
    die(print_r(sqlsrv_errors(), true));
  }

  $datosRegimenUso = array(
    'iOpcion' => 1,
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

  if ($result === false) {
    die(print_r(sqlsrv_errors(), true));

  } else {
    do {
      while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
        $RegimenUso[] = $row;
      }
    } while (sqlsrv_next_result($result));
  }

  return $RegimenUso;

  sqlsrv_close($conn);
}

$_SESSION['RegimenUso'] = EjecutarRegimenUso();

function validaDatosPersona()
{
  $serverName = "192.168.100.39, 1433";
  $connectionInfo = array(
    "Database" => "BDSistemaIntegral_PRETEST",
    "UID" => "Development",
    "PWD" => "Development123*",
    'CharacterSet' => 'UTF-8'
  );

  $conn = sqlsrv_connect($serverName, $connectionInfo);

  if ($conn === false) {
    die(print_r(sqlsrv_errors(), true));
  }

  $nombre = $_POST['nombre'];
  $vchPrimerApellido = $_POST['PrimerApellido'];
  $vchSegundoApellido = $_POST['SegundoApellido'];
  $dFechaNacimiento = $_POST['FechaNacimiento'];
  $idGenero = $_POST['genero'];
  $idNacionalidad = $_POST['nacionalidad'];
  $CURP = $_POST['CURP'];
  $codigoFiscal = $_POST['CodigoFiscal'];
  $UsoFiscal = $_POST['usoFiscal'];
  $RegimenFiscal = $_POST['regimenFiscal'];


  $datosPersona = array(
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

  if ($result === false) {
    die(print_r(sqlsrv_errors(), true));

  } else {
    if ($datosPersona['bResultado'] == 1) {
      header("Location: altaDomicilio.php ");
      exit;
    } else {
      echo "Mensaje Error: " . $datosPersona["vchMensaje"] . "<br>";
    }
  }

  sqlsrv_close($conn);
}


function ObtenerIdGenero()
{
  if (isset($_SESSION['CatConstante'])) {
    $datosGenero = $_SESSION['CatConstante'];
    $generoEncontrado = array();

    foreach ($datosGenero as $valorGenero) {
      if ($valorGenero['iAgrupador'] == 3) {
        $generoEncontrado[] = $valorGenero;
      }
    }
    return $generoEncontrado;
  } else {
    echo ("No hay datos del género");
  }
}
$resultadoGenero = ObtenerIdGenero();


function obtenerIdNacionalidad()
{
  if (isset($_SESSION['CatConstante'])) {
    $datosNacionalidad = $_SESSION['CatConstante'];
    $nacionalidadEncontrada = array();

    foreach ($datosNacionalidad as $valorNacionalidad) {
      if ($valorNacionalidad['iAgrupador'] == 6) {
        $nacionalidadEncontrada[] = $valorNacionalidad;
      }
    }
    return $nacionalidadEncontrada;
  } else {
    echo ("No hay datos de la nacionalidad");
  }
}
$resultadoNacionalidad = ObtenerIdNacionalidad();


function ObtenerIdRegimen()
{
  $datosRegimen = $_SESSION['RegimenUso'];
  $RegimenEncontrado = array();

  foreach ($datosRegimen as $valorRegimen) {
    $idRegimen = $valorRegimen['iIdRegimenFiscal'];
    $RegimenEncontrado[$idRegimen] = $valorRegimen;
  }


  return array_values($RegimenEncontrado);
}

$resultadoRegimen = ObtenerIdRegimen();

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


      function cargarUsosFiscales() {


        window.alert("Hola");



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
              <a href="../../index.php"><img src="../../images/logo-2.png" alt=""></a>
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
                    <li><a href="../../includes/logout.php"><span class="ti-power-off"></span>Log Out</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        </nav>
      </div>
    </div>
    </div>
  </header>

  <!-- titulo -->
  <div class="alice-bg padding-top-60 padding-bottom-60">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="breadcrumb-area">
            <h1>CONSULTA CONTACTO</h1>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">INICIO</a></li>
                <li class="breadcrumb-item active" aria-current="page">CONSULTA CONTACTO&nbsp;&nbsp;</li>
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
  <!-- titulo End -->

  <div class="alice-bg section-padding-bottom">
    <div class="container no-gliters">
      <div class="row no-gliters">
        <div class="col">
          <div class="dashboard-container">
            <div class="dashboard-content-wrapper">

              <form action="altaPersona" method="post" class="dashboard-form">
                <div class="dashboard-section basic-info-input">
                  <h4><i data-feather="user-check"></i>INFORMACION BASICA</h4>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">TIPO DE CONTACTO</label>
                    <div class="col-sm-9">
                      <ul>
                        <li>INGRESA CONTACTO EMPLEADO</li>
                      </ul>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">CONTACTO:</label>
                    <div class="col-sm-9">
                      <ul>
                        <li>INGRESA CONTACTO EMPLEADO</li>
                      </ul>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">ESTATUS:</label>
                    <div class="col-sm-9">
                      <ul>
                        <li>INGRESA ESTATUS EMPLEADO</li>
                      </ul>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">USUARIO:</label>
                    <div class="col-sm-9">
                      <ul>
                        <li>INGRESA USUARIO EMPLEADO</li>
                      </ul>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">FECHA DE MODIFICACION:</label>
                    <div class="col-sm-9">
                      <ul>
                        <li>INGRESA FECH EMPLEADO</li>
                      </ul>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label"></label>
                    <div class="col-sm-9">
                      <button type="button" class="button" onclick="window.location.href = '#'">EDITAR</button>
                      <button type="button" class="button" onclick="window.location.href = '#'">CONTINUAR</button>
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
</body>

</html>