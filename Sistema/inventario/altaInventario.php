<?php
require_once ('../includes/pandora.php');
require_once ('../includes/load.php');
require_once ('../includes/functions.php');

session_start();
function ObtenerTipoContratacion()
{
  if (isset($_SESSION['CatConstante'])) {
    $datosTipoContratacion = $_SESSION['CatConstante'];
    $contratacionEncontrada = array();

    foreach ($datosTipoContratacion as $valorContratacion) {
      if ($valorContratacion['iAgrupador'] == 1) {
        $contratacionEncontrada[] = $valorContratacion;
      }
    }
    return $contratacionEncontrada;
  } else {
    echo ("No hay datos del Tipo de Contratación");
  }
}

$resultadoContratacion = ObtenerTipoContratacion();


function ObtenerHorasLaborales()
{
  if (isset($_SESSION['CatConstante'])) {
    $datosHorasLaborales = $_SESSION['CatConstante'];
    $horasLaboralesEncontradas = array();

    foreach ($datosHorasLaborales as $valorHorasLaborales) {
      if ($valorHorasLaborales['iAgrupador'] == 2) {
        $horasLaboralesEncontradas[] = $valorHorasLaborales;
      }
    }
    return $horasLaboralesEncontradas;
  } else {
    echo ("No hay datos de las horas laborales");
  }
}

$resultadoHorasLaborales = ObtenerHorasLaborales();


function ObtenerNivel()
{
  if (isset($_SESSION['CatConstante'])) {
    $datosNivel = $_SESSION['CatConstante'];
    $nivelesEncontrados = array();

    foreach ($datosNivel as $valorNivel) {
      if ($valorNivel['iAgrupador'] == 22) {
        $nivelesEncontrados[] = $valorNivel;
      }
    }
    return $nivelesEncontrados;
  } else {
    echo ("No hay datos de las horas laborales");
  }
}

$resultadoNiveles = ObtenerNivel();


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
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">

  <!-- External Css -->
  <link rel="stylesheet" href="../assets/css/fontawesome-all.min.css">
  <link rel="stylesheet" href="../assets/css/themify-icons.css" />
  <link rel="stylesheet" href="../assets/css/et-line.css" />
  <link rel="stylesheet" href="../assets/css/bootstrap-select.min.css" />
  <link rel="stylesheet" href="../assets/css/plyr.css" />
  <link rel="stylesheet" href="../assets/css/flag.css" />
  <link rel="stylesheet" href="../assets/css/slick.css" />
  <link rel="stylesheet" href="../assets/css/owl.carousel.min.css" />
  <link rel="stylesheet" href="../assets/css/jquery.nstSlider.min.css" />

  <!-- Custom Css -->
  <link rel="stylesheet" type="text/css" href="../css/main.css">
  <link rel="stylesheet" type="text/css" href="../dashboard/css/dashboard.css">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600%7CRoboto:300i,400,500" rel="stylesheet">

  <!-- Favicon -->
  <link rel="icon" href="../images/favicon.png">
  <link rel="apple-touch-icon" href="../images/apple-touch-icon.png">
  <link rel="apple-touch-icon" sizes="72x72" href="../images/icon-72x72.png">
  <link rel="apple-touch-icon" sizes="114x114" href="../images/icon-114x114.png">

  <script type="text/JavaScript" src="../includes/pandora.js"></script>
  <script type="text/JavaScript" src="../inventario/localstorageInventario.js"></script>

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
  </style>

</head>

<body>

  <header class="header-2">
    <div class="container">
      <div class="row">
        <div class="col">
          <div class="header-top">
            <div class="logo-area">
              <a href="../inicio.php"><img src="../images/logo-2.png" alt=""></a>
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
                    <a href="../home-2.html" class="notification-list">
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
                    <li><a href="#"><span class="ti-settings"></span><?php echo $herramientas; ?></a></li>
                    <li><a href="../includes/load.php"><span class="ti-power-off"></span><?php echo $logout; ?></a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <!-- pestañas de navegación
                    <div class="skill-and-profile">
                        <div class="skill" style="display: flex; justify-content: center;">
                            <label style="align-self: flex-end;" class="selected"><a href="#">ALTA INVENTARIO</a></label>
                            <label style="align-self: flex-end;"><a href="../consulEmpleado/consultaPuesto.php ">PUESTO</a></label>
                            <label style="align-self: flex-end;"><a href="consultaDomicilio.php">DOMICILIO</a></label>
                            <label style="align-self: flex-end;"><a href="consultaContacto.php">CONTACTO</a></label>
                            <label style="align-self: flex-end;"><a href="../consulEmpleado/cunsultaDoctos.php">DOCUMENTOS</a></label>
                        </div>
                    </div>
                     fin de pestañas de navegación-->
        </div>
      </div>
    </div>
  </header>

  <!-- Breadcrumb-->
  <div class="alice-bg padding-top-30 padding-bottom-30">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="breadcrumb-area">
            <label class="col-form-label"><i></i>
              <h4><i data-feather="plus-circle"></i>REGISTRO DE INVENTARIO</h4>
            </label>
          </div>
        </div>
        <!--<div class="col-md-6">
          <div class="breadcrumb-form">
            <form action="#">
              <input type="text" placeholder="BUSCAR">
              <button><i data-feather="search"></i></button>
            </form>
          </div>
        </div>-->
      </div>
    </div>
  </div>
  <!--Breadcrumb End -->

  <!-- Contenido de la página -->
  <div class="alice-bg section-padding-bottom">
    <div class="container no-gliters">
      <div class="row no-gliters">
        <div class="col">
          <div class="post-content-wrapper">
            <form action="#" method="post" class="job-post-form">
              <div id="information" class="row justify-content-center">
                <input type="hidden" name="iIdConstanteContacto" id="iIdConstanteContacto" value="">
                <input type="hidden" name="iClaveContacto" id="iClaveContacto" value="">

                <div class="col-md-10">
                  <div class="row">

                    <div class="col-md-4">
                      <div class="form-group">
                        <label class="col-md-4 col-form-label">TIPO DE PRODUCTO:</label>
                        <select class="form-control" Name="iIdtipoProducto" id="iIdtipoProducto" required>
                          <option value="">SELECCIONE UN PRODUCTO</option>
                          <?php foreach ($resultadoContacto as $contacto): ?>
                            <option value="<?= $contacto['iIdConstante'] . '-' . $contacto['iClaveCatalogo'] ?>">
                              [<?= $contacto['iClaveCatalogo'] ?>] -
                              <?= $contacto['vchDescripcion'] ?>
                            </option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                    </div>

                    <div class="col-md-4">
                      <div class="form-group">
                        <label class="col-md-4 col-form-label">TIPO DE SUBPRODUCTO:</label>
                        <select class="form-control" Name="iIdTipoSubproducto" id="iIdTipoSubproducto" required>
                          <option value="">SELECCIONE UN SUBPRODUCTO</option>
                          <?php foreach ($resultadoContacto as $contacto): ?>
                            <option value="<?= $contacto['iIdConstante'] . '-' . $contacto['iClaveCatalogo'] ?>">
                              [<?= $contacto['iClaveCatalogo'] ?>] -
                              <?= $contacto['vchDescripcion'] ?>
                            </option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                    </div>

                    <div class="col-md-4">
                      <div class="form-group">
                        <label class="col-md-4 col-form-label">MODELO:</label>
                        <input type="text" id="vchModelo" class="form-control" placeholder="MODELO" maxlength="150"
                          onkeypress="this.value = this.value.toUpperCase();return">
                      </div>
                    </div>

                    <div class="col-md-4">
                      <div class="form-group">
                        <label class="col-md-4 col-form-label">MARCA:</label>
                        <input type="text" id="iIdMarca" class="form-control" placeholder="MARCA" maxlength="150"
                          onkeypress="this.value = this.value.toUpperCase();return">
                      </div>
                    </div>

                    <div class="col-md-4">
                      <div class="form-group">
                        <label class="col-md-4 col-form-label">SERIE:</label>
                        <input type="text" id="vchSerie" class="form-control" placeholder="SERIE" maxlength="150"
                          onkeypress="this.value = this.value.toUpperCase();return">
                      </div>
                    </div>

                    <div class="col-md-4">
                      <div class="form-group">
                        <label class="col-md-4 col-form-label">ESTATUS:</label>
                        <input type="text" id="iIdEstatus" class="form-control" placeholder="ESTATUS" maxlength="150"
                          onkeypress="this.value = this.value.toUpperCase();return">
                      </div>
                    </div>

                    <div class="col-md-4">
                      <div class="form-group">
                        <label class="col-md-4 col-form-label">TIPO DE ASIGNACION:</label>
                        <input type="text" id="iIdTipoAsignacion" class="form-control" placeholder="TIPO DE ASIGNACION"
                          maxlength="150" onkeypress="this.value = this.value.toUpperCase();return">
                      </div>
                    </div>

                    <div class="col-md-4">
                      <div class="form-group">
                        <label class="col-md-4 col-form-label">ASIGNADO A:</label>
                        <input type="text" id="iIdAsignadoA" class="form-control" placeholder="ASIGNADO A"
                          maxlength="150" onkeypress="this.value = this.value.toUpperCase();return">
                          <a href="#" class="boton-intec" data-toggle="modal" data-target="apply-popup-id-1">NUEVO</a>
                      </div>
                    </div>

                    <div class="col-md-4">
                      <div class="form-group">
                        <label class="col-md-4 col-form-label">PROYECTO ASIGNADO:</label>
                        <input type="text" id="iIdProyectoAsignado" class="form-control" placeholder="PROYECTO ASIGNADO"
                          maxlength="150" onkeypress="this.value = this.value.toUpperCase();return">
                      </div>
                    </div>

                    <div class="COL-MD-6">
                      <div class="form-group">
                        <label class="col-md-4 col-form-label">FECHA DE INGRESO:</label>
                        <div class="col-sm-9">
                          <input type="date" id="dFechaIngreso" class="form-control" placeholder="FECHA DE NACIMIENTO"
                            name="FechaIngreso" pattern="\d{4}-\d{2}-\d{2}"
                            title="FORMATO DE FECHA INCORRECTA (AAAA-MM-DD)" required
                            min="<?php echo $fechaMinima = "1950-01-01"; ?>"
                            max="<?php echo $fechaMaxima = "2024-01-01"; ?>" maxlength="10">
                          <?php
                          $fechaActual = date('Y-m-d');
                          $fechaMinima = date('Y-m-d', strtotime('-18 years', strtotime($fechaActual)));
                          $fechaMaxima = $fechaActual;
                          $fechaLimiteInferior = '1950-01-01';
                          ?>
                        </div>
                      </div>
                    </div>


                  </div>
                </div>
              </div>
              <div class="signin-option">
                <div class="buttons">
                  <button type="submit" class="boton-intec">REGISTRAR</button>
                  <a href="#" class="boton-intec">VOLVER</a>
                </div>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- INICIO DE MODAL -->
  <div class="apply-popup">
    <div class="modal fade" id="apply-popup-id-2" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">

          <div class="modal-header">
            <h5 class="modal-title"><i data-feather="edit"></i>ALTA PERSONA</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form class="dashboard-form" id="AltaPersona">
              <?php
              // Calcular la fecha actual
              $fechaActual = date('Y-m-d');

              // Restar 18 años a la fecha actual
              $fechaMinima = date('Y-m-d', strtotime('-2 years', strtotime($fechaActual)));

              // Establecer la fecha máxima como la fecha actual
              $fechaMaxima = $fechaActual;

              // Establecer la fecha mínima como 1900-01-01 (opcional)
              $fechaLimiteInferior = '1900-01-01';
              ?>
              <div class="form-group">
                <option value="">FECHA DE BAJA</option>
                <input type="date" class="form-control" placeholder="FECHA DE BAJA" name="fechaIngreso"
                  id="dtFechaBajaModificacion" pattern="\d{4}-\d{2}-\d{2}"
                  title="FORMATO DE FECHA INCORRECTA (AAAA-MM-DD)" required min="<?php echo $fechaMinima; ?>"
                  max="<?php echo $fechaMaxima; ?>" maxlength="10" value="<?php echo date('Y-m-d'); ?>">
              </div>
              <button class="button primary-bg btn-block" id="botonAplicarBaja">APLICAR</button>
              <!--
                            <script>
                                document.getElementById('botonAplicarBaja').addEventListener('click', ValidarBaja)
                            </script> -->
            </form>
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
                    <img src="../images/footer-logo.png" class="img-fluid" alt="">
                  </a>
                  <p class="copyright-text">DERECHOS DE AUTOR <a href="#">INTECPROOF</a> 2024, RESERVADOS</p>
                </div>
                <div class="col-lg-6">
                  <div class="back-to-top">
                    <a href="#">SUBIR<i class="fas fa-angle-up"></i></a>
                  </div>
                </div>
                <!--<div class="footer-social">
                        <ul class="social-icons">
                            <li><a href="#"><i data-feather="facebook"></i></a></li>
                            <li><a href="#"><i data-feather="twitter"></i></a></li>
                            <li><a href="#"><i data-feather="linkedin"></i></a></li>
                            <li><a href="#"><i data-feather="instagram"></i></a></li>
                            <li><a href="#"><i data-feather="youtube"></i></a></li>
                        </ul>
                    </div>-->
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
  <script src="assets/js/html5-simple-date-input-polyfill.min.js"></script>

  <script src="js/custom.js"></script>

  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC87gjXWLqrHuLKR0CTV5jNLdP4pEHMhmg"></script>
  <script src="js/map.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script>
    function ValidarDatosContacto() {
      // Obtener los valores de los elementos del formulario ocultos
      var ContactoSeleccionado = document.getElementById('iIdtipoProducto');
      var ContactoPartes = ContactoSeleccionado.value.split('-');
      var iIdConstanteContacto = ContactoPartes[0];
      var iClaveContacto = ContactoPartes[1];

      // Asignar los valores a los campos ocultos
      document.getElementById('iIdConstanteContacto').value = iIdConstanteContacto;
      document.getElementById('iClaveContacto').value = iClaveContacto;

      // Crear un objeto con los datos del formulario
      var datosFormulario = {
        vchTipoContacto: document.getElementById('iIdtipoProducto').value,
        iIdConstanteContacto: iIdConstanteContacto,
        iClaveContacto: iClaveContacto,
        contacto: document.getElementById('Producto').value  // ADECUAR CON DATOS EXTRAS
      };

      // Crear una instancia de XMLHttpRequest
      var datosContacto = new XMLHttpRequest();

      // Configurar la solicitud
      datosContacto.open('POST', 'validarDatosContacto.php', true);
      datosContacto.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

      // Convertir el objeto de datos a una cadena de consulta URL
      var formData = new URLSearchParams(datosFormulario).toString();

      // Enviar la solicitud
      datosContacto.send(formData);

      // Manejar la respuesta
      datosContacto.onload = function () {
        if (datosContacto.status === 200) {
          var respuesta = JSON.parse(datosContacto.responseText);
          if (respuesta.bResultado === 1) {
            console.log(respuesta);
            // Guardar solo los datos necesarios en localStorage
            localStorage.setItem('datosContacto', JSON.stringify());
          } else {
            console.error("Mensaje Error: " + respuesta.vchMensaje);
            alert(respuesta.vchMensaje);
          }
        } else {
          console.error("Error en la solicitud al servidor");
        }
      };
    }
  </script>


</body>

</html>