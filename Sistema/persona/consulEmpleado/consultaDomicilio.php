<?php

session_start();
require_once ('../../includes/pandora.php');
require_once ('../../includes/load.php');


if (isset($_SESSION['user_id'])) { ?>
<?php } else {

  ?>
  <script type="text/javascript">
    //Redireccionamiento tras 5 segundos
    setTimeout(function () { window.location.href = "../../index.php"; }, 0);
  </script>
  <?php

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
                      <?php if (isset($nombrePersona) && isset($emailPersona)): ?>
                        <h5><a href="#"><?php echo $nombrePersona; ?></a></h5>
                        <span class="mail"><?php echo $emailPersona; ?></span>
                      <?php endif; ?>
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
              <label style="align-self: flex-end;" class="selected"><a
                  href="consultaDomicilio.php">DOMICILIO</a></label>
              <label style="align-self: flex-end;"><a href="consultaContacto.php">CONTACTO</a></label>
              <label style="align-self: flex-end;"><a href="cunsultaDoctos.php">DOCUMENTOS</a></label>
            </div>
          </div>
          <!-- fin de pestañas de navegación-->
        </div>
      </div>
    </div>
  </header>

  <script>
    document.addEventListener('DOMContentLoaded', function () {

      console.log("Está en los datos del domicilio");

      var DatosEmpleado = localStorage.getItem('datosConsultaIndividual');

      var bResultadoEmpleado = JSON.parse(DatosEmpleado);
      var iIdPersonaDomicilio = bResultadoEmpleado.iIdPersona;

      // console.log(iIdPersonaDomicilio);

      var datosDomicilio = new XMLHttpRequest();

      datosDomicilio.open('POST', 'prcConsultaDomicilio.php', true);

      var formData = new URLSearchParams();
      formData.append('iIdPersonaDomicilio', iIdPersonaDomicilio);

      //console.log(formData);

      // Enviar la solicitud
      datosDomicilio.send(formData);

      // Manejar la respuesta
      datosDomicilio.onload = function () {
        if (datosDomicilio.status === 200) {
          console.log('Respuesta exitosa');
          var respuesta = JSON.parse(datosDomicilio.responseText);
          console.log(respuesta);

          if (respuesta[0].bResultado === 1) {
            //alert(respuesta[0].vchMensaje);
            localStorage.setItem('datosConsultaDomicilio', JSON.stringify(respuesta));

            var datosDomicilioConsulta = localStorage.getItem('datosConsultaDomicilio', JSON.stringify(respuesta))
            //console.log (datosDomicilioConsulta);

            if (datosDomicilioConsulta) {
              var bResultado = JSON.parse(datosDomicilioConsulta);
              console.log('Objeto parseado: ', bResultado);

              for (var i = 0; i < bResultado.length; i++) {
                var vchEntidad = document.getElementById('vchEntidad');
                vchEntidad.value = bResultado[i].vchEntidadFederativa || '';

                var vchMunicipio = document.getElementById('vchMunicipio');
                vchMunicipio.value = bResultado[i].vchMunicipio || '';

                var vchLocalidad = document.getElementById('vchLocalidad');
                vchLocalidad.value = bResultado[i].vchLocalidad || '';

                var iIdCodigoPostal = document.getElementById('iIdCodigoPostal');
                iIdCodigoPostal.value = bResultado[i].iCodigoPostal || '';

                var vchColonia = document.getElementById('vchColonia');
                vchColonia.value = bResultado[i].vchColonia || '';

                var vchCalle = document.getElementById('vchCalle');
                vchCalle.value = bResultado[i].vchCalle || '';

                var vchLetra = document.getElementById('vchLetra');
                vchLetra.value = bResultado[i].vchLetra || '';

                var vchNoExt = document.getElementById('vchNoExt');
                vchNoExt.value = bResultado[i].vchNumeroExterior || '';

                var vchNoInt = document.getElementById('vchNoInt');
                vchNoInt.value = bResultado[i].vchNumeroInterior || '';

                var iIdUsuarioUltModificacion = document.getElementById('vchUsuarioUltModificacion');
                iIdUsuarioUltModificacion.value = bResultado[i].vchUsuarioUltModif || '';


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
                var dFechaModificacion = document.getElementById('dtFechaUltModificacion');
                dFechaModificacion.value = fechaModifFinal || '';

              }
            }

          } else {
            console.error("Mensaje Error: " + respuesta.vchMensaje);
            alert(respuesta.vchMensaje)
          }
        } else {
          console.error("Error en la solicitud al servidor");
        }
      };
    });
  </script>

  <!-- Contenido de la página -->
  <div class="alice-bg section-padding-bottom">
    <div class="container no-gliters">
      <div class="row justify-content-center">
        <div class="col">
          <div class="post-content-wrapper">
            <form action="#" method="post" class="dashboard-form">
            <div id="information" class="row justify-content-center">
                                <div class="col-md-10">
                  <label class="col-form-label">
                    <h6><i data-feather="user-check"></i>INFORMACION DOMICILIO</h6>
                  </label>
                  <div class="row">

                    <div class="col-md-4">
                      <div class="form-group">
                        <label class="col-form-label">ENTIDAD</label>
                        <input id="vchEntidad" type="text" class="form-control" placeholder="ENTIDAD FEDERATIVA"
                          readonly>
                      </div>
                    </div>

                    <div class="col-md-4">
                      <div class="form-group">
                        <label class="col-form-label">MUNICIPIO </label>
                        <input id="vchMunicipio" type="text" class="form-control" placeholder="MUNICIPIO" disabled>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label class="col-form-label">LOCALIDAD </label>
                        <input id="vchLocalidad" type="text" class="form-control" placeholder="LOCALIDAD" disabled>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label class="col-form-label">COLONIA </label>
                        <input id="vchColonia" type="text" class="form-control" placeholder="COLONIA" disabled>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label class="col-form-label">C.P.</label>
                        <input id="iIdCodigoPostal" type="text" class="form-control" placeholder="CÓDIGO POSTAL"
                          disabled>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label class="col-form-label">CALLE </label>
                        <input id="vchCalle" type="text" class="form-control" placeholder="CALLE" disabled>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label class="col-form-label">No. EXTERIOR </label>
                        <input id="vchNoExt" type="text" class="form-control" placeholder="NÚMERO EXTERIOR" disabled>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label class="col-form-label">No. INTERIOR </label>
                        <input id="vchNoInt" type="text" class="form-control" placeholder="NÚMERO INTERIOR" disabled />
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label class="col-form-label">LETRA </label>
                        <input id="vchLetra" class="form-control" placeholder="LETRA" disabled>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label class="col-form-label">USUARIO ULTIMA
                          MODIFICACION</label>
                        <input type="text" class="form-control" placeholder="USUARIO ULTIMA MOD."
                          id="vchUsuarioUltModificacion" disabled />
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group ">
                        <label class="col-form-label">FECHA ULTIMA
                          MODIFICACION</label>
                        <input type="text" class="form-control" placeholder="FECHA ULTIMA MOD."
                          id="dtFechaUltModificacion" disabled />
                      </div>
                    </div>

                  </div>
                  <div class="row-left">
                    <a href="#" class="boton-intec" data-toggle="modal" data-target="#apply-popup-id-1" style="display:none;" >MODIFICAR DOMICILIO</a>
                  </div>
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
    <div class="modal fade" id="apply-popup-id-1" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">

          <div class="modal-header">
            <h5 class="modal-title"><i data-feather="edit"></i>APLICAR CAMBIOS</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="#">

              <div class="form-group">
                <div class="col-sm-9">
                  <select class="form-control" id="iAgruEntidad" name="iAgruEntidad" required>
                    <option value="" selected>SELECCIONE UN ESTADO</option>
                    <?php foreach ($resultadoEstado as $estado): ?>
                      <option value="<?= $estado['iIdConstante'] . '-' . $estado['iClaveCatalogo'] ?>">
                        [<?= $estado['iClaveCatalogo'] ?>] - <?= $estado['vchDescripcion'] ?>
                      </option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="vchMunicipio" name="vchMunicipio" placeholder="MUNICIPIO"
                    style="text-transform: uppercase" pattern="[A-Za-zÁÉÍÓÚáéíóúüÜñÑ\s]+"
                    title="SOLO SE PERMITEN LETRAS">
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="vchLocalidad" name="vchLocalidad" placeholder="LOCALIDAD"
                    min="2" name="apeUnoEsccrito" style="text-transform: uppercase" style="text-transform: uppercase">
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-9">
                  <input type="text" class="form-control" placeholder="CÓDIGO POSTAL" id="iCodigoPostal"
                    name="codigoPostal" onkeypress="return event.charCode">
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-9">
                  <input type="text" class="form-control" placeholder="COLONIA" id="vchColonia" name="vchColonia"
                    style="text-transform: uppercase">
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-9">
                  <input type="text" class="form-control" placeholder="CALLE" id="vchCalle" name="vchCalle"
                    style="text-transform: uppercase">
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-9">
                  <input type="text" class="form-control" placeholder="No EXT" id="vchNumeroExterior"
                    name="vchNumeroExterior" style="text-transform: uppercase">
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-9">
                  <input type="text" class="form-control" placeholder="No INT" id="vchNumeroInterior"
                    name="vchNumeroInterior" style="text-transform: uppercase">
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-9">
                  <input type="text" class="form-control" placeholder="LETRA" id="vchLetra" name="vchLetra"
                    style="text-transform: uppercase">
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-9">
                  <input type="text" class="form-control" placeholder="NOMBRE" id="vchNombre" name="vchNombre"
                    style="text-transform: uppercase">
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-9">
                  <input type="text" class="form-control" placeholder="PRIMER APELLIDO" id="vchPrimerApellido"
                    name="vchPrimerApellido" style="text-transform: uppercase">
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-9">
                  <input type="text" class="form-control" placeholder="SEGUNDO APELLIDO" id="vchSegundoApellido"
                    name="vchSegundoApellido" style="text-transform: uppercase">
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-9">
                  <input type="text" class="form-control" placeholder="RFC" id="vchRFC" name="vchRFC"
                    style="text-transform: uppercase">
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-9">
                  <input type="text" class="form-control" placeholder="CURP" id="vchCURP" name="vchCURP"
                    style="text-transform: uppercase">
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-9">
                  <input type="text" class="form-control" placeholder="FECHA DE NACIMIENTO" id="dFechaNacimiento"
                    name="dFechaNacimiento" style="text-transform: uppercase">
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-9">
                  <input type="text" class="form-control" placeholder="GENERO" id="iIdGenero" name="iIdGenero"
                    style="text-transform: uppercase">
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-9">
                  <input type="text" class="form-control" placeholder="NACIONALIDAD" id="iIdNacionalidad"
                    name="iIdNacionalidad" style="text-transform: uppercase">
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-9">
                  <input type="text" class="form-control" placeholder="REGIMEN FISCAL" id="iIdRegimenFiscal"
                    name="iIdRegimenFiscal" style="text-transform: uppercase">
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-9">
                  <input type="text" class="form-control" placeholder="USO FISCAL" id="iIdUsoFiscal" name="iIdUsoFiscal"
                    style="text-transform: uppercase">
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-9">
                  <input type="text" class="form-control" placeholder="C.P. FISCAL" id="iCodigoPostalFiscal"
                    name="iCodigoPostalFiscal" style="text-transform: uppercase">
                </div>
              </div>
              <button class="button primary-bg btn-block" id="botonAplicar">APLICAR</button>

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