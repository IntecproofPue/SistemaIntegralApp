<?php
    require_once('../../includes/pandora.php');
    require_once ('../../includes/load.php');

    session_start();


    if ( isset( $_SESSION['user_id'] ) ) {?>
    <?php }else{

        ?>
        <script type="text/javascript">
            //Redireccionamiento tras 5 segundos
            setTimeout( function() { window.location.href = "../../index.php"; }, 0 );
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
              <a href="../../inicio.php"><img src="../../images/logo-2.png" alt=""></a>
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

                <?php

                $user = obtenerUsuario($_SESSION['user_id']);
                $row =$GLOBALS['rowObtenerNombre'];
                $nombrePersona = $row['nombrePersona'];
                $emailPersona = $row['contacto'];

                ?>

              <div class="dropdown header-top-account">
                <a href="#" class="account-button">My Account</a>
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
                    <li><a href="#"><span class="ti-user"></span>Account</a></li>
                    <li><a href="#"><span class="ti-settings"></span>Settings</a></li>
                    <li><a href="../../includes/logout.php"><span class="ti-power-off"></span>Log Out</a></li>
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
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
              aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav">
                <li class="menu-item active"><a title="PERSONA" href="altaPersona.php">PERSONA</a></li>
                <li class="menu-item active"><a title="DOMICILIO" href="altaDomicilio.php">DOMICILIO</a>
                </li>
                <li class="menu-item active"><a title="CONTACTO" href="consultaContacto.php">CONTACTO</a>
                </li>
                <li class="menu-item active"><a title="CONTACTO" href="altaEmpleado.php">EMPLEADO</a>
                </li>
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
            <a>
              <h1>CONSULTA EMPLEADO</h1>
            </a>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                <li class="breadcrumb-item active" aria-current="page">CONSULTA EMPLEADO&nbsp;&nbsp;</li>
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

  <div class="alice-bg section-padding-bottom" id="dashboardSection">
    <div class="container no-gliters">
      <div class="row no-gliters">
        <div class="col">
          <div class="dashboard-container">
            <div class="dashboard-content-wrapper">
              <?php
              if (isset($_POST['submitBuscar'])) {
                $nombreaBuscar = $_POST['nombreaBuscar'];
                echo "<br>El nombre a buscar es <b>$nombreaBuscar</b>";

                if ($nombreaBuscar == 'LUIS') { ?>

                  <div style="background-color: #117a8b; text-align: center">
                    <?php echo "<i><span style='color: #ededee' size='-2'> $busquedaEncontradaTxt</span></i><br />"; ?>
                  </div>
                  <br>Aquí la lista de coincidencias


                <?php } else { ?>

                  <div style="background-color: #c82333; text-align: center">
                    <?php echo "<i><span style='color: #ededee' size='-2'> $busquedaNoEncontradaTxt</span></i><br />"; ?>
                  </div>

                  <form action="#" method="post" class="dashboard-form">

                    <div class="dashboard-section basic-info-input">
                      <h3><i data-feather="user-check"></i>DATOS DE EMPLEADO</h3>
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">ID</label>
                        <div class="col-sm-9">
                          <input id="idInput" type="text" class="form-control" placeholder="ID"
                            value="<?php echo $datos[0]; ?>" readonly />
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">NOMBRES (s)</label>
                        <div class="col-sm-9">
                          <li class="campo-item" id="mostrarnombre">mostrar nombres</li>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Primer Apellido:</label>
                        <div class="col-sm-9">
                          <li class="campo-item" id="mostrarprimerApellido">mostrar prim apellido</li>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Segundo Apellido:</label>
                        <div class="col-sm-9">
                          <li class="campo-item" id="mostrarsegApellido">mostrar seg apellido</li>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">PUESTO</label>
                        <div class="col-sm-9">
                          <li class="campo-item" id="mostrarPuesto">mostrar puesto</li>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">FECHA DE INGRESO:</label>
                        <div class="col-sm-9">
                          <li class="campo-item" id="mostrarfechaingreso">mostrar fecha de ingreso</li>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">ESTATUS:</label>
                        <div class="col-sm-9">
                          <li class="campo-item" id="mostrarEstatus">mostrar Estatus</li>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">NSS</label>
                        <div class="col-sm-9">
                          <li class="campo-item" id="mostrarNSS">mostrar NSS</li>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">FECHA ULTIMA PROMOCION:</label>
                        <div class="col-sm-9">
                          <li class="campo-item" id="mostrarfechUltimaPromocion">mostrar ultima promo</li>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">SEDE</label>
                        <div class="col-sm-9">
                          <li class="campo-item" id="mostrarSede">mostrar SEDE</li>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">FECHA BAJA:</label>
                        <div class="col-sm-9">
                          <li class="campo-item" id="mostrarfechaBaja">mostrar fecha de baja</li>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">USUARIO ULTIMA MODIFICACION:</label>
                        <div class="col-sm-9">
                          <li class="campo-item" id="mostrarUsuariUltimaModificacion">mostrar usuario de ultima modificacion
                          </li>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">FECHA ULTIMA MODIFICACION:</label>
                        <div class="col-sm-9">
                          <li class="campo-item" id="mostrarfechUltimaModificacion">mostrar fecha de ultima</li>
                        </div>
                      </div>
                      <h3><i data-feather="user-check"></i>DATOS DE LA PERSONA</h3>
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">RFC:</label>
                        <div class="col-sm-9">
                          <li class="campo-item" id="mostrarRFC">mostrar RFC</li>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">CURP:</label>
                        <div class="col-sm-9">
                          <li class="campo-item" id="mostrarCURP">mostrar CURP</li>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">FECHA NACIMIENTO:</label>
                        <div class="col-sm-9">
                          <li class="campo-item" id="mostrarFechNacimineto">mostrar fecha de nacimiento</li>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">GENERO:</label>
                        <div class="col-sm-9">
                          <li class="campo-item" id="mostraGenero">mostrar genero</li>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">NACIONALIDAD:</label>
                        <div class="col-sm-9">
                          <li class="campo-item" id="mostraNacionalidad">mostrar nacionalidad</li>
                        </div>
                      </div>
                      <h3><i data-feather="user-check"></i>DATOS FISCALES</h3>
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">TIPO DE PERSONA:</label>
                        <div class="col-sm-9">
                          <li class="campo-item" id="mostradatosTipoPersona">mostrar tipo de persona</li>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">REGIMEN FISCAL:</label>
                        <div class="col-sm-9">
                          <li class="campo-item" id="mostrarRegimen">mostrar regimen fiscal</li>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">USO FISCAL:</label>
                        <div class="col-sm-9">
                          <li class="campo-item" id="mostraUsoFiscal">mostrar uso fiscal</li>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">C.P. FISCAL:</label>
                        <div class="col-sm-9">
                          <li class="campo-item" id="mosrtarCPFiscal">mostrar C.P. fiscal</li>
                        </div>
                      </div>
                    </div>
                    <div class="dashboard-section basic-info-input">
                      <div class="row">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label"></label>
                          <div class="col-sm-9">
                            <button class="button" href="../consultaDomicilio.php">DOMICILIO</button>
                          </div>
                        </div>
                      </div>
                    <?php }
                ?>
                    <?php
              } else {
                ?>
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="dashboard-form">

                      <div class="dashboard-section basic-info-input">
                        <h4><i data-feather="user-check"></i>BUSQUEDA</h4>
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">SELECCIONAR CAMPO:</label>
                          <div class="col-sm-9">
                            <ul class="campo-list">
                              <input type="radio" class="campo-item" id="iDBuscar" value="iDBuscar"
                                name="campoSeleccionado" onclick="mostrarCampo('campoIDEmpleado')" />
                              <label for="iDBuscar">ID DE EMPLEADO</label>

                              <input type="radio" class="campo-item" id="RFCBuscar" value="RFCBuscar"
                                name="campoSeleccionado" onclick="mostrarCampo('campoRFC')" />
                              <label for="RFCBuscar">RFC</label>

                              <input type="radio" class="campo-item" id="PUESTOBuscar" value="PUESTOBuscar"
                                name="campoSeleccionado" onclick="mostrarCampo('campoPuesto')" />
                              <label for="PUESTOBuscar">PUESTO</label>

                              <input type="radio" class="campo-item" id="SEDE" value="SEDE" name="campoSeleccionado"
                                onclick="mostrarCampo('campoSede')" />
                              <label for="SEDE">SEDE</label>

                              <input type="radio" class="campo-item" id="nombreaBuscar" value="nombreaBuscar"
                                name="campoSeleccionado" onclick="mostrarCampo('campoNombre')" />
                              <label for="nombreaBuscar">NOMBRE</label>
                            </ul>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label"></label>
                          <div class="col-sm-9 campo-container" style="display: flex;">
                            <div id="campoIDEmpleado" class="campo-busqueda" style="display: none; flex: 1;">
                              <input type="text" class="form-control" placeholder="INGRESA ID DEL EMPLEADO"
                                name="iDBuscar" style="text-transform: uppercase">
                            </div>
                            <div id="campoRFC" class="campo-busqueda" style="display: none; flex: 1;">
                              <input type="text" class="form-control" placeholder="INGRESA RFC CORRECTO" name="RFCBuscar"
                                style="text-transform: uppercase">
                            </div>
                            <div id="campoPuesto" class="campo-busqueda" style="display: none; flex: 1;">
                              <input type="text" class="form-control" placeholder="INGRESA EL PUESTO" name="PUESTOBuscar"
                                style="text-transform: uppercase">
                            </div>
                            <div id="campoSede" class="campo-busqueda" style="display: none; flex: 1;">
                              <select class="form-control" placeholder="SEDE" name="SEDE">
                                <option value="PUEBLA">PUEBLA</option>
                                <option value="GUADALAJARA">GUADALAJARA</option>
                              </select>
                            </div>
                            <div id="campoNombre" class="campo-busqueda" style="display: none; flex: 1;">
                              <input type="text" class="form-control" placeholder="INGRESA EL NOMBRE" name="nombreaBuscar"
                                style="text-transform: uppercase">
                            </div>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label"></label>
                          <div class="col-sm-9">
                            <button class="button" type="submit" name="submitBuscar">BUSCAR</button>
                            <button class="button" type="reset" name="submitBuscar">LIMPIAR</button>
                          </div>
                        </div>
                      </div>

                      <style>
                        .campo-list {
                          list-style-type: none;
                          padding: 0;
                          margin: 0;
                          display: flex;
                        }

                        .campo-item {
                          margin-right: 10px;
                          cursor: pointer;
                        }
                      </style>

                      <script>
                        function mostrarCampo(idCampo) {
                          // Oculta todos los campos de búsqueda
                          var campos = document.querySelectorAll('.campo-busqueda');
                          campos.forEach(function (campo) {
                            campo.style.display = 'none';
                          });

                          // Obtiene el campo correspondiente al ID pasado como argumento
                          var campoMostrar = document.getElementById(idCampo);

                          // Si el campo está oculto, lo muestra; de lo contrario, lo oculta
                          if (campoMostrar.style.display === 'none') {
                            campoMostrar.style.display = 'flex';
                          } else {
                            campoMostrar.style.display = 'none';
                          }
                        }
                      </script>




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
    // función para mostrar u ocultar la sección de Domicilio
    function toggleDomicilioSection() {
      var domicilioSection = document.getElementById('domicilioSection');

      // Cambia la visibilidad de la sección
      if (domicilioSection.style.display === 'none') {
        domicilioSection.style.display = 'block';
      } else {
        domicilioSection.style.display = 'none';
      }
    }

    <script>
      function limpiarCampos(element) {
        // Desactiva todos los campos
        var inputs = document.getElementsByName('iDBuscar').concat(
      document.getElementsByName('RFCBuscar'),
      document.getElementsByName('PUESTOBuscar'),
      document.getElementsByName('SEDEBuscar'),
      document.getElementsByName('nombreaBuscar')
      );

      for (var i = 0; i < inputs.length; i++) {
        inputs[i].disabled = true;
        }
      // Habilita solo el campo correspondiente al input actualmente activo
      element.disabled = false;

      // Habilita solo el campo correspondiente al input actualmente activo
      element.disabled = false;
    }
      element.focus();
  }

      function validarBusqueda() {
        // Agrega tu lógica de validación aquí si es necesario
        return true; // Cambia a 'false' si quieres prevenir el envío del formulario en ciertos casos
    }
  </script>
  <script>
      function mostrarCampoSeleccionado() {
        // Obtén el valor seleccionado del menú desplegable
        var selectedCampo = document.getElementById("selectCampos").value;

      // Oculta todos los campos
      var campos = document.getElementsByClassName("campo-busqueda");
      for (var i = 0; i < campos.length; i++) {
        campos[i].style.display = "none";
        }

      // Muestra el campo seleccionado
      document.getElementById(selectedCampo).style.display = "block";
    }
  </script>



</body>

</html>