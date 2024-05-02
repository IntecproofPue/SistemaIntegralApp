<?php
session_start();
require_once ('../../includes/pandora.php');
require_once ('../../includes/load.php');

// Inicializa las variables para almacenar mensajes de error
$errors = [];

// Inicializa las variables para almacenar datos del formulario
$tipoContacto = '';
$contacto = '';

// Verifica si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Obtiene los valores del formulario y los convierte a mayúsculas
  $tipoContacto = strtoupper($_POST["tipoContacto"]);
  $contacto = strtoupper($_POST["contacto"]);

  // Realiza las validaciones necesarias
  if (empty($tipoContacto)) {
    $errors[] = "Selecciona el tipo de contacto";
  }

  if (empty($contacto)) {
    $errors[] = "Ingresa el contacto";
  }

  // Si no hay errores, puedes continuar con el procesamiento de los datos
  if (empty($errors)) {
    // Aquí puedes realizar acciones adicionales con los datos del formulario, como guardarlos en la base de datos, etc.
    // Redirecciona a alguna página de éxito o realiza otras acciones según tus necesidades
    header("Location: tu_pagina_de_exito.php");
    exit();
  }
}

// Verifica si el usuario está autenticado
if (!isset($_SESSION['user_id'])) {
  // Si no está autenticado, redirecciona a la página de inicio de sesión
  header("Location: ../../index.php");
  exit();
}

function ObtenerEstadoProcedencia()
{
  $agrupadorEstado = 4;
  if (isset($_SESSION['CatConstante'])) {
    $datosEdoProcedencia = $_SESSION['CatConstante'];
    $estadoEncontrado = array();

    foreach ($datosEdoProcedencia as $valorEstado) {
      if ($valorEstado['iAgrupador'] == $agrupadorEstado) {
        $estadoEncontrado[] = $valorEstado;
      }
    }
    return $estadoEncontrado;
  } else {
    echo ("No hay datos del Estado de Procedencia");
  }
}

$resultadoContacto = ObtenerEstadoProcedencia();
$resultadoEstado = ObtenerEstadoProcedencia();
$estadoProcedencia = json_encode($resultadoEstado);

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
    .selected {
      color: #007bff;
      /* Cambia este color por el que desees */
      font-weight: bold;
      /* O cualquier otro estilo que desees */

    }

    .row .col-md-4 {
      margin-top: -13px;
      margin-bottom: -13px;

    }

    .boton-intec {
      /* border: none;
            color: black;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 7px;*/
      padding: 10px 20px;
      background-color: #007bff;
      color: white;
      text-decoration: solid;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    .boton-intec:hover {
      background-color: #0b7dda;
    }

    .boton-intec:active {
      background-color: #3e8e41;
    }

    /* width: 10%;
            background-color: navy;
            padding: 3px ;
            border-radius: 7px;
            color: navy;
            text-decoration: none;
            color: white;*/
    .update-photo {
      float: center;

    }

    .update-photo {
      position: relative;
      display: inline-block;
    }

    .edit-text {
      position: absolute;
      top: 5px;
      left: 5px;
      background-color: rgba(255, 255, 255, 0.7);
      padding: 5px;
      border-radius: 5px;
      cursor: pointer;
      z-index: 1;
      /* asegura que el texto esté sobre la imagen */

    }

    .image {
      display: block;
      max-width: 100%;
    }

    input[type="file"] {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      opacity: 0;
      cursor: pointer;
    }

    .employer {
      margin-bottom: -30px;
      padding: 5px 20px;
    }

    .body {
      margin-bottom: -30px;
      padding: 5px 20px;
      margin-bottom: -10px;
    /*transform: scale(0.8); */
}

    .candidate {
      padding: 5px;
  
    }

    .filtered-employer-wrapper .employer {
      margin-bottom: -5px;
    }
  </style>

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
              <a href="../../index.html"><img src="../../images/logo-2.png" alt=""></a>
            </div>
            <div class="header-top-toggler">
              <div class="header-top-toggler-button"></div>
            </div>
            <?php

            $user = obtenerUsuario($_SESSION['user_id']);
            $row = $GLOBALS['rowObtenerNombre'];
            $nombrePersona = $row['nombrePersona'];
            $emailPersona = $row['contacto'];

            ?>

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
                    <li><a href="#"><span class="ti-settings"></span><?php echo $herramientas; ?></a></li>
                    <li><a href="../../includes/logout.php"><span class="ti-power-off"></span><?php echo $logout; ?></a>
                    </li>

                  </ul>
                </div>
              </div>
            </div>
          </div>
          <!-- pestañas de navegación-->
          <div class="skill-and-profile">
            <div class="skill" style="display: flex; justify-content: center;">
              <label style="align-self: flex-end;"><a href="DatosEmpleado.php">EMPLEADO</a></label>
              <label style="align-self: flex-end;"><a href="../consulEmpleado/consultaPuesto.php ">PUESTO</a></label>
              <label style="align-self: flex-end;"><a href="consultaDomicilio.php">DOMICILIO</a></label>
              <label style="align-self: flex-end;" class="selected"><a href="consultaContacto.php">CONTACTO</a></label>
              <label style="align-self: flex-end;"><a href="../consulEmpleado/cunsultaDoctos.php">DOCUMENTOS</a></label>
            </div>
          </div>
          <!-- fin de pestañas de navegación-->
        </div>
      </div>
    </div>
  </header>

  <script>
    document.addEventListener('DOMContentLoaded', function () {

    });

  </script>

  <!-- Contenido de la página -->
  <div class="alice-bg section-padding-bottom">
    <div class="container no-gliters">
      <div class="row justify-content-center">
        <div class="col">
          <div class="post-content-wrapper">
            <form action="consultaContacto" method="post" class="dashboard-form">
              <div id="information" class="row justify-content-center">
                <div class="col-md-12">

                  <div class="candidate">
                    <div class="body">
                      <label class="col-form-label">
                        <h6><i data-feather="user-check"></i>INFORMACION DE CONTACTO</h6>
                      </label>
                      <div class="row-left">
                        <a href="#" class="boton-intec" data-toggle="modal" data-target="#" style="display:none;" >AGREGAR</a>
                      </div>
                    </div>
                  </div>
                  
                        <div class="filtered-employer-wrapper" id="agregaContacto"></div>
                      

                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- inicio de modales -->
  <div class="apply-popup">
    <div class="modal fade" id="apply-popup-id-1" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content" style="width: 800px; height: auto; padding: 50px;">
          <div class="modal-header">
            <h5 class="modal-title"><i data-feather="edit"></i>INFORMACION DE CONTACTO</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="#">
              <div class="row">

                <div class="col-md-4">
                  <div class="form-group">
                    <label class="col-form-label">TIPO CONTACTO</label>
                    <input id="tipoContacto" type="text" class="form-control" placeholder="TIPO CONTACTO" disabled>
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                    <label class="col-form-label">CONTACTO</label>
                    <input id="tipoContacto" class="form-control" name="tipoContacto" placeholder="CONTACTO" disabled>
                  </div>
                </div>
              </div>
              <button class="boton-intec">BAJA</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- fianal de modales -->

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

    document.addEventListener('DOMContentLoaded', function () {
      console.log("Esta en los datos del contacto");

      var datosContacto = localStorage.getItem('datosConsultaIndividual');
      var bResultadoContacto = JSON.parse(datosContacto);
      var iIdPersonaContacto = bResultadoContacto.iIdPersona;

      var datosContactos = new XMLHttpRequest();

      datosContactos.open('POST', 'prcConsultaContacto.php', true);

      var formData = new URLSearchParams();
      formData.append('iIdPersonaContacto', iIdPersonaContacto);

      datosContactos.send(formData);

      datosContactos.onload = function () {
        if (datosContactos.status === 200) {
          console.log("Respuesta exitosa");
          var respuesta = JSON.parse(datosContactos.responseText);
          console.log(respuesta);

          if (respuesta[0].bResultado === 1) {
            localStorage.setItem('datosConsultaContacto', JSON.stringify(respuesta));

            var datosContactoConsulta = localStorage.getItem('datosConsultaContacto');

            if (datosContactoConsulta) {
              var bResultado = JSON.parse(datosContactoConsulta);
              console.log('Objeto parseado: ', bResultado);

              let longitudContacto = bResultado.length;

              insertarContactos(longitudContacto);

              for (var i = 0; i < bResultado.length; i++) {
                var iIdTipoContacto = 'vchTipoContacto' + i;
                var iIdContacto = 'vchContacto' + i;
                var iIdUsuarioUlt = 'ilUsuarioUltModificacion' + i;
                var fechaUltModif = 'dtFechaUltModificacion' + i;

                var vchTipoContactoForm = document.getElementById(iIdTipoContacto);
                vchTipoContactoForm.value = bResultado[i].vchTipoContacto || '';

                var vchContactoForm = document.getElementById(iIdContacto);
                vchContactoForm.value = bResultado[i].vchContacto;

                var vchUsuarioForm = document.getElementById(iIdUsuarioUlt);
                vchUsuarioForm.value = bResultado[i].vchUsuarioUltModif;


                var dFechaUltModifOriginal = bResultado[i].dtFechaUltModificacion.date;
                var fechaModif = new Date(dFechaUltModifOriginal);
                var fechaModifFinal = fechaModif.toLocaleString('es-ES', {
                  day: '2-digit',
                  month: '2-digit',
                  year: 'numeric',
                  hour: '2-digit',
                  minute: '2-digit',
                  second: '2-digit',
                  hour12: false
                });
                var dFechaModificacion = document.getElementById(fechaUltModif);
                dFechaModificacion.value = fechaModifFinal

              }
            }
          }
        }
      }
    });

    function insertarContactos(longitudContacto) {
      var contenedor = document.getElementById('agregaContacto');
      contenedor.innerHTML = agregarListaContactos(longitudContacto);
    }

    function agregarListaContactos(longitudContacto) {
      var contacto = '';
      for (var i = 0; i < longitudContacto; i++) {
        contacto += `
        <div class="candidate">
          <div class="employer">
              <div class="body">              

              <div class="col-md-3">
                <div class="form-group">
                  <label class="col-form-label">TIPO DE CONTACTO</label>
                  <input id="vchTipoContacto${i}" type="text" class="form-control" placeholder="TIPO CONTACTO" disabled>
                </div>
              </div>

              <div class="col-md-3">
                <div class="form-group">
                  <label class="col-form-label">CONTACTO</label>
                  <input id="vchContacto${i}" class="form-control" name="tipoContacto" placeholder="CONTACTO" disabled>
                </div>
              </div>

                <div class="col-md-4">
                  <div class="form-group">
                    <label class="col-form-label">USUARIO MODIFICACION</label>
                    <input type="text" class="form-control" id="ilUsuarioUltModificacion${i}"
                      name="ilUsuarioUltModificacion" placeholder="USER ULT MODIF." style="text-transform: uppercase"
                      disabled>
                  </div>
                </div>

                <div class="col-md-3">
                  <div class="form-group">
                    <label class="col-form-label">ULTIMA MODIFICACION</label>
                    <input type="text" class="form-control" placeholder="##/##/####" id="dtFechaUltModificacion${i}"
                      name="dtFechaUltModificacion" style="text-transform: uppercase" disabled>
                  </div>
                </div>

          <div class="boton-intec">
            <a href="#" data-toggle="modal" data-target="#apply-popup-id-${i + 1}" style="width: 40px; height: 25px; padding: 2px; display:none;">BAJA</a>
          </div>

        
      </div>
    </div>
  </div>
                                 `;
      }
      return contacto;
    }


  </script>

  <script>
      document.addEventListener('DOMContentLoaded', function (){
          console.log(localStorage.getItem('habilitarBotones'));
          if (localStorage.getItem('habilitarBotones') === 'true'){
              const habilitarBotonDomicilio = document.querySelectorAll('.boton-intec');
              habilitarBotonDomicilio.forEach(boton => {
                  boton.disabled = false;
                  boton.style.display = 'block';
              } );
          }
      });
  </script>




</body>


</html>