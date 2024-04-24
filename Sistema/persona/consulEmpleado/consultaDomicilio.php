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
      /* Otros estilos de resaltado */
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
            </div>
          </div>
          <!-- fin de pestañas de navegación-->
        </div>
      </div>
    </div>
  </header>

  <script>
    document.addEventListener('DOMContentLoaded', function () {
      var datosDomicilio = localStorage.getItem('datosDomicilio');
      if (datosDomicilio) {
        var respuesta = JSON.parse(datosDomicilio);
        var iIdPersonaDomicilio = datosEmpleado.iIdPersona;
        var datosDomicilioRequest = new XMLHttpRequest();
        datosDomicilioRequest.open('POST', 'prcConsultaDomicilio.php', true);
        var formData = new FormData();
        formData.append('iIdPersonaDomicilio', iIdPersonaDomicilio);
        datosDomicilioRequest.onload = function () {
          if (datosDomicilioRequest.status === 200) {
            var respuesta = JSON.parse(datosDomicilioRequest.responseText);
            if (respuesta.length > 0 && respuesta[0].bResultado === 1) {
              localStorage.setItem('datosDomicilio', JSON.stringify(respuesta));
              mostrarDatos(respuesta);
            } else {
              console.error("Mensaje Error: " + respuesta[0].vchMensaje);
              alert(respuesta[0].vchMensaje);
            }
          } else {
            console.error("Error en la solicitud al servidor");
          }
        };
        datosDomicilioRequest.send(formData);
      } else {
        console.error("No se encontraron datos en localStorage");
      }
    });

    function mostrarDatos(datos) {
      for (var i = 0; i < datos.length; i++) {
        var domicilio = datos[i];
        document.getElementById('vchEntidad').value = domicilio.vchEntidadFederativa || '';
        document.getElementById('vchMunicipio').value = domicilio.vchMunicipio || '';
        document.getElementById('vchLocalidad').value = domicilio.vchLocalidad || '';
        document.getElementById('iIdCodigoPostal').value = domicilio.iCodigoPostal || '';
        document.getElementById('vchColonia').value = domicilio.vchColonia || '';
        document.getElementById('vchCalle').value = domicilio.vchCalle || '';
        document.getElementById('vchLetra').value = domicilio.vchLetra || '';
        document.getElementById('vchNoExt').value = domicilio.vchNumeroExterior || '';
        document.getElementById('vchNoInt').value = domicilio.vchNumeroInterior || '';
      }
    }
  </script>




  <!-- Contenido de la página -->
  <div class="alice-bg section-padding-bottom">
    <div class="container no-gliters">
      <div class="row jsutify-content-center">
        <div class="col">
          <div class="post-content-wrapper">
          <form action="#" method="post" class="dashboard-form">
              <div id="information" class="row -justify-content-center">
                <div class="col-md-10">
                  <label class="col-form-label">
                    <h6><i data-feather="user-check"></i>INFORMACION DOMICILIO</h6>
                  </label>
                  <div class="row">

                    <div class="col-md-4">
                      <div class="form-group">
                        <label class="col-form-label">ENTIDAD:</label>
                        <input id="iAgruEntidad" type="text" class="form-control" placeholder="ENTIDAD FEDERATIVA"
                          readonly>
                      </div>
                    </div>

                    <div class="col-sm-4">
                      <div class="form-group">
                        <label class="col-form-label">MUNICIPIO: </label>
                        <input id="vchMunicipio" type="text" class="form-control" placeholder="MUNICIPIO" readonly>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label class="col-form-label">LOCALIDAD: </label>
                        <input id="vchLocalidad" type="text" class="form-control" placeholder="LOCALIDAD" readonly>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label class="col-form-label">C.P.: </label>
                        <input id="iCodigoPostal" type="text" class="form-control" placeholder="CÓDIGO POSTAL" readonly>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label class="col-form-label">COLONIA: </label>
                        <input id="vchColonia" type="text" class="form-control" placeholder="COLONIA" readonly>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label class="col-form-label">CALLE: </label>
                        <input id="vchCalle" type="text" class="form-control" placeholder="CALLE" readonly>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label class="col-form-label">LETRA: </label>
                        <input id="vchLetra" class="form-control" placeholder="LETRA" readonly>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label class="col-form-label">No. EXTERIOR: </label>
                        <input id="vchNumeroExterior" type="text" class="form-control" placeholder="NÚMERO EXTERIOR"
                          readonly>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label class="col-form-label">No. INTERIOR: </label>
                        <input id="vchNumeroInterior" type="text" class="form-control" placeholder="NÚMERO INTERIOR"
                          readonly />
                      </div>
                    </div>
                    <script>

                      document.getElementById('buttonEditar').addEventListener('click', function () {
                        var inputs = document.getElementById('datosDomicilio').getElementsByTagName('input');
                        for (var i = 0; i < inputs.length; i++) {
                          inputs[i].disabled = false;
                        }
                        var inputElement = document.getElementById('vchEntidad');
                        var selectElement = document.createElement('select');
                        selectElement.id = 'vchEntidad';
                        selectElement.className = 'form-control';
                        selectElement.setAttribute('placeholder', 'SELECCIONE UNA ENTIDAD FEDERATIVA');
                        var defaultOption = document.createElement('option');
                        defaultOption.value = "";
                        defaultOption.text = "SELECCIONE UN ESTADO";
                        defaultOption.selected = true;
                        selectElement.appendChild(defaultOption);
                        console.log(parseEstadoProcedencia);
                        // Iterar sobre los resultados y agregar opciones al select
                        for (var i = 0; i < parseEstadoProcedencia.length; i++) {
                          var option = document.createElement('option');
                          option.value = parseEstadoProcedencia[i].iIdConstante + '-' + parseEstadoProcedencia[i].iClaveCatalogo;
                          option.text = '[' + parseEstadoProcedencia[i].iClaveCatalogo + '] - ' + parseEstadoProcedencia[i].vchDescripcion;
                          selectElement.appendChild(option);
                        }
                        inputElement.parentNode.replaceChild(selectElement, inputElement);
                        // verifica si la variable datosActualizaDomicilio está definida
                        if (typeof datosActualizaDomicilio !== 'undefined') {
                          // Actualizar la variable datosConsultaDomicilio
                          var datosDomicilio = datosActualizaDomicilio;
                          console.log("Datos actualizados:", datosDomicilio);
                        } else {
                          console.log("La variable datosDomicilio no está definida.");
                        }
                      });
                      document.addEventListener("DOMContentLoaded", function () {
                        // Agrega el event listener después de que el DOM esté completamente cargado
                        var modificarButton = document.querySelector('.apply[data-target="#apply-popup-id-1"]');
                        if (modificarButton) {
                          modificarButton.addEventListener('click', function (event) {
                            // Tu lógica aquí
                            console.log("Se hizo clic en el botón 'MODIFICAR'");
                          });
                        }
                      });

                    </script>
                  </div>
                </div>
              </div>
            </form>
            <form action="#" method="post" class="dashboard-form">
              <div class="dashboard-section basic-info-input">
                <div class="row">
                  <div class="job-apply-buttons">
                    <a href="#" class="apply" data-toggle="modal" data-target="#apply-popup-id-1">MODIFICAR</a>
                  </div>
                  <div class="job-apply-buttons">
                    <a href="#" class="apply" data-toggle="modal" data-target="#apply-popup-id-2">BAJA</a>
                  </div>
                  <div class="job-apply-buttons">
                    <a href="#" class="apply" data-toggle="modal" data-target="#apply-popup-id-3">REACTIVACION</a>
                  </div>
                  <div class="job-apply-buttons">
                    <a href="#" class="apply" data-toggle="modal" data-target="#apply-popup-id-4">PROMOCION</a>
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
                <select class="form-control" id="iAgruEntidad" name="iAgruEntidad" required>
                  <option value="" selected>SELECCIONE UN ESTADO</option>
                  <?php foreach ($resultadoEstado as $estado): ?>
                    <option value="<?= $estado['iIdConstante'] . '-' . $estado['iClaveCatalogo'] ?>">
                      [<?= $estado['iClaveCatalogo'] ?>] - <?= $estado['vchDescripcion'] ?>
                    </option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="form-group">
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="vchMunicipio" name="vchMunicipio" placeholder="MUNICIPIO"
                    style="text-transform: uppercase" pattern="[A-Za-zÁÉÍÓÚáéíóúüÜñÑ\s]+"
                    title="SOLO SE PERMITEN LETRAS" required>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="vchLocalidad" name="vchLocalidad" placeholder="LOCALIDAD"
                    min="2" name="apeUnoEsccrito" style="text-transform: uppercase" style="text-transform: uppercase"
                    required>
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
                    style="text-transform: uppercase" required>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-9">
                  <input type="text" class="form-control" placeholder="CALLE" id="vchCalle" name="vchCalle"
                    style="text-transform: uppercase" required>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-9">
                  <input type="text" class="form-control" placeholder="No EXT" id="vchNumeroExterior"
                    name="vchNumeroExterior" style="text-transform: uppercase" required>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-9">
                  <input type="text" class="form-control" placeholder="No INT" id="vchNumeroInterior"
                    name="vchNumeroInterior" style="text-transform: uppercase" required>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-9">
                  <input type="text" class="form-control" placeholder="LETRA" id="vchLetra" name="vchLetra"
                    style="text-transform: uppercase" required>
                </div>
              </div>
              <button class="button primary-bg btn-block" id="botonAplicar">APLICAR</button>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="apply-popup">
    <div class="modal fade" id="apply-popup-id-2" tabindex="-1" role="dialog" aria-hidden="true">
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
                <select class="form-control" id="estadoLista" name="estadoLista" required>
                  <option value="" selected>SELECCIONE UN ESTADO</option>
                  <?php foreach ($resultadoEstado as $estado): ?>
                    <option value="<?= $estado['iIdConstante'] . '-' . $estado['iClaveCatalogo'] ?>">
                      [<?= $estado['iClaveCatalogo'] ?>] - <?= $estado['vchDescripcion'] ?>
                    </option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="form-group">
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="vchMunicipio" name="vchMunicipio" placeholder="MUNICIPIO"
                    style="text-transform: uppercase" pattern="[A-Za-zÁÉÍÓÚáéíóúüÜñÑ\s]+"
                    title="SOLO SE PERMITEN LETRAS" required>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="vchLocalidad" name="vchLocalidad" placeholder="LOCALIDAD"
                    min="2" name="apeUnoEsccrito" style="text-transform: uppercase" style="text-transform: uppercase"
                    required>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-9">
                  <input type="text" class="form-control" placeholder="CODIGO POSTAL" id="codigoPostal"
                    name="codigoPostal" onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="5">
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-9">
                  <input type="text" class="form-control" placeholder="COLONIA" id="vchColonia" name="vchColonia"
                    style="text-transform: uppercase" required>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-9">
                  <input type="text" class="form-control" placeholder="CALLE" id="vchCalle" name="vchCalle"
                    style="text-transform: uppercase" required>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-9">
                  <input type="text" class="form-control" placeholder="No EXT" id="vchNoExt" name="vchNoExt"
                    style="text-transform: uppercase" required>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-9">
                  <input type="text" class="form-control" placeholder="No INT" id="vchNoInt" name="vchNoInt"
                    style="text-transform: uppercase" required>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-9">
                  <input type="text" class="form-control" placeholder="LETRA" id="vchLetra" name="vchLetra"
                    style="text-transform: uppercase" required>
                </div>
              </div>
              <button class="button primary-bg btn-block">APLICAR</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="apply-popup">
    <div class="modal fade" id="apply-popup-id-3" tabindex="-1" role="dialog" aria-hidden="true">
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
                <select class="form-control" id="estadoLista" name="estadoLista" required>
                  <option value="" selected>SELECCIONE UN ESTADO</option>
                  <?php foreach ($resultadoEstado as $estado): ?>
                    <option value="<?= $estado['iIdConstante'] . '-' . $estado['iClaveCatalogo'] ?>">
                      [<?= $estado['iClaveCatalogo'] ?>] - <?= $estado['vchDescripcion'] ?>
                    </option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="form-group">
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="vchMunicipio" name="vchMunicipio" placeholder="MUNICIPIO"
                    style="text-transform: uppercase" pattern="[A-Za-zÁÉÍÓÚáéíóúüÜñÑ\s]+"
                    title="SOLO SE PERMITEN LETRAS" required>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="vchLocalidad" name="vchLocalidad" placeholder="LOCALIDAD"
                    min="2" name="apeUnoEsccrito" style="text-transform: uppercase" style="text-transform: uppercase"
                    required>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-9">
                  <input type="text" class="form-control" placeholder="CODIGO POSTAL" id="codigoPostal"
                    name="codigoPostal" onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="5">
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-9">
                  <input type="text" class="form-control" placeholder="COLONIA" id="vchColonia" name="vchColonia"
                    style="text-transform: uppercase" required>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-9">
                  <input type="text" class="form-control" placeholder="CALLE" id="vchCalle" name="vchCalle"
                    style="text-transform: uppercase" required>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-9">
                  <input type="text" class="form-control" placeholder="No EXT" id="vchNoExt" name="vchNoExt"
                    style="text-transform: uppercase" required>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-9">
                  <input type="text" class="form-control" placeholder="No INT" id="vchNoInt" name="vchNoInt"
                    style="text-transform: uppercase" required>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-9">
                  <input type="text" class="form-control" placeholder="LETRA" id="vchLetra" name="vchLetra"
                    style="text-transform: uppercase" required>
                </div>
              </div>
              <button class="button primary-bg btn-block">APLICAR</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="apply-popup">
    <div class="modal fade" id="apply-popup-id-4" tabindex="-1" role="dialog" aria-hidden="true">
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
                <select class="form-control" id="estadoLista" name="estadoLista" required>
                  <option value="" selected>SELECCIONE UN ESTADO</option>
                  <?php foreach ($resultadoEstado as $estado): ?>
                    <option value="<?= $estado['iIdConstante'] . '-' . $estado['iClaveCatalogo'] ?>">
                      [<?= $estado['iClaveCatalogo'] ?>] - <?= $estado['vchDescripcion'] ?>
                    </option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="form-group">
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="vchMunicipio" name="vchMunicipio" placeholder="MUNICIPIO"
                    style="text-transform: uppercase" pattern="[A-Za-zÁÉÍÓÚáéíóúüÜñÑ\s]+"
                    title="SOLO SE PERMITEN LETRAS" required>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="vchLocalidad" name="vchLocalidad" placeholder="LOCALIDAD"
                    min="2" name="apeUnoEsccrito" style="text-transform: uppercase" style="text-transform: uppercase"
                    required>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-9">
                  <input type="text" class="form-control" placeholder="CODIGO POSTAL" id="codigoPostal"
                    name="codigoPostal" onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="5">
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-9">
                  <input type="text" class="form-control" placeholder="COLONIA" id="vchColonia" name="vchColonia"
                    style="text-transform: uppercase" required>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-9">
                  <input type="text" class="form-control" placeholder="CALLE" id="vchCalle" name="vchCalle"
                    style="text-transform: uppercase" required>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-9">
                  <input type="text" class="form-control" placeholder="No EXT" id="vchNoExt" name="vchNoExt"
                    style="text-transform: uppercase" required>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-9">
                  <input type="text" class="form-control" placeholder="No INT" id="vchNoInt" name="vchNoInt"
                    style="text-transform: uppercase" required>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-9">
                  <input type="text" class="form-control" placeholder="LETRA" id="vchLetra" name="vchLetra"
                    style="text-transform: uppercase" required>
                </div>
              </div>
              <button class="button primary-bg btn-block">APLICAR</button>
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
    // Llamada AJAX para obtener los datos del domicilio
    var datosDomicilioRequest = new XMLHttpRequest();
    datosDomicilioRequest.open('POST', 'prcConsultaDomicilio.php', true);
    var formData = new FormData();
    formData.append('iIdPersonaDomicilio', iIdPersonaDomicilio);
    datosDomicilioRequest.onload = function () {
        if (datosDomicilioRequest.status === 200) {
            // Parsea la respuesta JSON y almacénala en el localStorage
            <?php echo $codigo_php_para_almacenar_localstorage; ?>
        } else {
            console.error("Error en la solicitud al servidor");
        }
    };
    datosDomicilioRequest.send(formData);
</script>
  <script>
    document.addEventListener("DOMContentLoaded", function () {
      // Obtener los datos del localStorage
      var datosDomicilioJSON = localStorage.getItem("datosDomicilio");
      if (datosDomicilioJSON) {
        // Convertir los datos de JSON a un objeto JavaScript
        var datosDomicilio = JSON.parse(datosDomicilioJSON);
        // Mostrar los datos en la interfaz de usuario
        mostrarDatos(datosDomicilio);
      } else {
        // Si no hay datos en el localStorage, mostrar un mensaje
        document.getElementById("datosDomicilioContainer").innerText = "No hay datos de domicilio almacenados.";
      }
    });

    function mostrarDatos(bResultado) {
      var iIdConstanteEstado = document.getElementById('iIdConstanteEstado');
      idInput.value = dResultado.iIdConstanteEstado || '';
      var iClaveEstado = document.getElementById('iClaveEstado');
      iClaveEstado.value = bResultado.iClaveEstado || '';
      var vchMunicipio = document.getElementById('vchMunicipio');
      vchMunicipio.value = bResultado.vchMunicipio || '';
      var vchLocalidad = document.getElementById('vchLocalidad');
      vchLocalidad.value = bResultado.vchLocalidad || '';
      var codigoPostal = document.getElementById('codigoPostal');
      codigoPostal.value = bResultado.codigoPostal || '';
      var vchColonia = document.getElementById('vchColonia');
      vchColonia.value = bResultado.vchColonia || '';
      var vchCalle = document.getElementById('vchCalle');
      vchCalle.value = bResultado.vchCalle || '';
      var vchLetra = document.getElementById('vchLetra');
      vchLetra.value = bResultado.vchLetra || '';
      var vchNoExt = document.getElementById('vchNoExt');
      vchNoExt.value = bResultado.vchNoExt || '';
      var vchNoInt = document.getElementById('vchNoInt');
      vchNoInt.value = bResultado.vchNoInt || '';
    };
      // Crear un elemento para mostrar cada dato
      for (var clave in datosDomicilio) {
        if (datosDomicilio.hasOwnProperty(clave)) {
          var datoElement = document.createElement("p");
          datoElement.innerText = clave + ": " + datosDomicilio[clave];
          // Agregar el elemento al contenedor
          document.getElementById("datosDomicilioContainer").appendChild(datoElement);
        }
      }
    }
  </script>


</body>

</html>