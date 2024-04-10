<?php
require_once('../../includes/pandora.php');
require_once('../../includes/load.php');

session_start();


function ObtenerPuesto(){
    $datosPuesto = array (
        'iOpcion' => 4,
        'iIdPuesto' => 0 ,
        'vchPuesto' => '',
        'iIdTipoContratacion' => 0,
        'iCveContratacion' => 0,
        'iAgruContratacion' => 0
    );

    $procedureName = "EXEC prcConsultaPuesto    @iOpcion = ?,
                                                        @iIdPuesto = ?, 
                                                        @vchPuesto = ?, 
                                                        @iIdTipoContratacion = ?,
                                                        @iCveContratacion = ? ,
                                                        @iAgruContratacion = ? 
                                                    ";

    $params = array(
        $datosPuesto['iOpcion'],
        $datosPuesto['iIdPuesto'],
        $datosPuesto['vchPuesto'],
        $datosPuesto['iIdTipoContratacion'],
        $datosPuesto['iCveContratacion'],
        $datosPuesto['iAgruContratacion']
    );

    $result = sqlsrv_query($GLOBALS['conn'], $procedureName, $params);

    $CatPuestos = array();

    if ($result === false){
        die(print_r(sqlsrv_errors(), true));

    } else{
        do{
            while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
                $CatPuestos[] = $row;
            }
        }while (sqlsrv_next_result($result));
    }
    return $CatPuestos;

    sqlsrv_close($GLOBALS['conn']);

}
$resultadoPuesto = ObtenerPuesto();


function ObtenerSede(){
    if (isset ($_SESSION['CatConstante'])){
        $datosSede = $_SESSION['CatConstante'];
        $sedeEncontrado = array();

        foreach ($datosSede as $valorSede) {
            if ($valorSede['iAgrupador'] == 4) {
                $sedeEncontrado [] = $valorSede;
            }
        }
        return $sedeEncontrado;
    } else {
        echo ("No hay datos del Estado de Procedencia");
    }
}
$resultadoSede = ObtenerSede();



if (isset($_SESSION['user_id'])) { ?>
<?php } else {

  ?>
  <script type="text/javascript">
    //Redireccionamiento tras 5 segundos
    setTimeout(function () { window.location.href = "../../index.php"; }, 0);
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
                      <h5><a href="#">
                          <?php echo $nombrePersona; ?>
                        </a></h5>
                      <span class="mail">
                        <?php echo $emailPersona; ?>
                      </span>
                    </div>
                  </div>
                  <ul class="account-item-list">
                    <li><a href="#"><span class="ti-user"></span><?php echo $Perfil; ?></a></li>
                    <li><a href="#"><span class="ti-settings"></span><?php echo $herramientas; ?></a></li>
                    <li><a href="../../includes/logout.php"><span class="ti-power-off"></span><?php echo $logout; ?></a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <nav class="navbar navbar-expand-lg cp-nav-2">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
              aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav">
                <li class="menu-item active"><a title="PERSONA" href="../consulEmpleado/consultaPuesto.php ">PUESTO</a></li>
                <li class="menu-item active"><a title="DOMICILIO" href="consultaDomicilio.php">DOMICILIO</a>
                </li>
                <li class="menu-item active"><a title="CONTACTO" href="consultaContacto.php">CONTACTO</a>
                </li>
                <li class="menu-item active"><a title="CONTACTO" href="consultaEmpleado.php">EMPLEADO</a>
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

                  <!--
                  <form class="dashboard-form" id="FormResultadoConsulta">

                      <div class="dashboard-section basic-info-input">
                      <h3><i data-feather="user-check"></i>DATOS DE EMPLEADO</h3>
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">ID</label>
                        <div class="col-sm-9">
                          <input id="idInput" type="text" class="form-control" placeholder="ID" "/>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">NOMBRES (s)</label>
                        <div class="col-sm-9">
                          <li class="campo-item" id="mostrarnombre"></li>
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
                  </form>-->
                <?php }
                ?>
                <?php
              } else {
                ?>
                  <script>
                      console.log ("A punto de entrar al proceso");
                      function consultarEmpleado (){
                          //Obtener los valores de los elementos en el formulario para sede
                          var iIdConstanteSede = 0;
                          var iClaveSede = 0;

                          console.log('Esta es una prueba de funcionalidad');
                          var SedeSeleccionada = document.getElementById('iIdSede');

                          if (SedeSeleccionada){
                              var SedePartes = SedeSeleccionada.value.split('-');
                              var iIdConstanteSede = SedePartes[0];
                              var iClaveSede = SedePartes[1];

                          } else {
                              console.error('El elemento con ID "iIdSede" no se encontró en el DOM.');
                          }

                          //Asignar los valores a los campos ocultos
                          document.getElementById('iIdConstanteSede').value = iIdConstanteSede;
                          document.getElementById('iClaveSede').value = iClaveSede;


                          var FormularioConsultaEmpleado = {
                              idEmpleado : document.getElementById('iDBuscar').value,
                              rfc: document.getElementById('RFCBuscar').value,
                              iIdPuesto: document.getElementById('PUESTOBuscar').value,
                              iIdConstanteSede: iIdConstanteSede,
                              iClaveSede: iClaveSede,
                              nombre: document.getElementById('nombreaBuscar').value
                          };

                          console.log("Console.log de FormularioConsultaEmpleado"+FormularioConsultaEmpleado);

                          var datosConsultaEmpleado = new XMLHttpRequest();

                          if (FormularioConsultaEmpleado.idEmpleado != 0){
                              consultaIndivual();
                              console.log("ID del empleado: "+FormularioConsultaEmpleado.idEmpleado);
                          }else{
                              consultaMasiva();
                              console.log("Está entrando en las pruebas masivas del proceso");
                          }
                          function consultaIndivual(){
                              datosConsultaEmpleado.open('POST', 'consultaIndividual.php',true);
                              datosConsultaEmpleado.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

                              var formDataIndividual = new URLSearchParams(FormularioConsultaEmpleado).toString();

                              datosConsultaEmpleado.send(formDataIndividual);

                              console.log("FormDataIndividual: "+formDataIndividual);


                              datosConsultaEmpleado.onload = function (){
                                  if (datosConsultaEmpleado.status === 200){
                                      //localStorage.clear();
                                      var empleadoIndividual = JSON.parse(datosConsultaEmpleado.responseText);
                                      if (empleadoIndividual.bResultado == 1){
                                          console.log(empleadoIndividual.bResultado);
                                          alert(empleadoIndividual.vchMensaje);
                                          console.log(empleadoIndividual);

                                          localStorage.setItem('datosConsultaIndividual',JSON.stringify(empleadoIndividual));

                                          window.location.href = "DatosEmpleado.php";


                                      }else{
                                          console.error("Mensaje Error: " + empleadoIndividual.vchMensaje);
                                          alert(empleadoIndividual.vchMensaje);
                                          respuestaFinal = empleadoIndividual.vchMensaje;
                                      }
                                  }else {
                                      console.error("Error en la solicitud al servidor");
                                  }
                              };
                          }

                          function consultaMasiva(){
                              datosConsultaEmpleado.open('POST', 'consultaMasiva.php', true);
                              datosConsultaEmpleado.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

                              var formDataMasiva = new URLSearchParams(FormularioConsultaEmpleado).toString();
                              datosConsultaEmpleado.send(formDataMasiva);

                              console.log("Console.log de formDataMasiva"+formDataMasiva);


                              datosConsultaEmpleado.onload = function (){
                                  if (datosConsultaEmpleado.status === 200){
                                      var respuestaMasiva = JSON.parse(datosConsultaEmpleado.responseText);

                                      console.log(respuestaMasiva);

                                      if (respuestaMasiva[0].bResultado === 1){
                                          console.log(respuestaMasiva[0].bResultado);
                                          alert(respuestaMasiva[0].vchMensaje);
                                          console.log(respuestaMasiva);
                                          localStorage.setItem('datosConsultaMasiva',JSON.stringify(respuestaMasiva));
                                          window.location.href = "consultaMasivaEmpleado.php";
                                      }else{
                                          console.error("Mensaje Error: " + respuestaMasiva[0].vchMensaje);
                                          alert(respuestaMasiva[0].vchMensaje);
                                          respuestaFinal = respuestaMasiva[0].vchMensaje;
                                      }
                                  }else {
                                      console.error("Error en la solicitud al servidor");
                                  }
                              };

                          }
                          document.addEventListener('DOMContentLoaded', function (){
                              document.getElementById('buttonBuscar').addEventListener('click', consultarEmpleado);
                              console.log("Se está ejecutando el proceso en el DOMContentLoaded");
                          });
                      }
                  </script>
                <form class="dashboard-form" id="FormConsulta">
                  <div class="dashboard-section basic-info-input">
                    <h4><i data-feather="user-check"></i>BUSQUEDA</h4>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">SELECCIONAR CAMPO:</label>
                      <div class="col-sm-9">
                        <ul class="campo-list">

                        <input type="hidden" name = "iIdConstanteSede" id="iIdConstanteSede" value="" >
                        <input type="hidden" name = "iClaveSede" id="iClaveSede" value="" >

                          <input type="radio" class="campo-item" id="idEmpleado" value="" name="campoSeleccionado"
                            onclick="mostrarCampo('campoIDEmpleado')" />
                          <label for="iDBuscar">ID DE EMPLEADO</label>

                          <input type="radio" class="campo-item" id="rfc" value="" name="campoSeleccionado"
                            onclick="mostrarCampo('campoRFC')" />
                          <label for="RFCBuscar">RFC</label>

                          <input type="radio" class="campo-item" id="iIdPuesto" value=""
                            name="campoSeleccionado" onclick="mostrarCampo('campoPuesto')" />
                          <label for="PUESTOBuscar">PUESTO</label>

                          <input type="radio" class="campo-item" id="SEDE" value="" name="campoSeleccionado"
                            onclick="mostrarCampo('campoSede')" />
                          <label for="SEDE">SEDE</label>

                          <input type="radio" class="campo-item" id="nombre" value=""
                            name="campoSeleccionado" onclick="mostrarCampo('campoNombre')" />
                          <label for="nombreaBuscar">NOMBRE</label>
                        </ul>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label"></label>
                      <div class="col-sm-9 campo-container" style="display: flex;">
                        <div id="campoIDEmpleado" class="campo-busqueda" style="display: none; flex: 1;">
                          <input type="text" class="form-control" placeholder="INGRESA ID DEL EMPLEADO" name="iDBuscar" id="iDBuscar"
                            style="text-transform: uppercase">
                        </div>
                        <div id="campoRFC" class="campo-busqueda" style="display: none; flex: 1;">
                          <input type="text" class="form-control" placeholder="INGRESA RFC CORRECTO" name="RFCBuscar" id = "RFCBuscar"
                            style="text-transform: uppercase">
                        </div>
                        <div id="campoPuesto" class="campo-busqueda" style="display: none; flex: 1;">
                          <!--<input type="text" class="form-control" placeholder="INGRESA EL PUESTO" name="PUESTOBuscar"
                            style="text-transform: uppercase">-->
                            <select class="form-control" name="iIdPuesto" id="PUESTOBuscar" >
                                <option value="" selected>SELECCIONE UN PUESTO</option>
                                <?php foreach ($resultadoPuesto as $puesto): ?>
                                    <option value="<?= $puesto['iIdPuesto'] ?>">
                                        <?= $puesto['vchPuesto'] ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div id="campoSede" class="campo-busqueda" style="display: none; flex: 1;">
                          <select class="form-control" placeholder="iIdSede" name="iIdSede" id="iIdSede">
                              <option value = "" selected> SELECCIONE UNA SEDE</option>
                              <?php foreach ($resultadoSede as $sede): ?>
                                <option value ="<?=$sede['iIdConstante'].'-'.$sede['iClaveCatalogo']?>">
                                    [<?=$sede['iClaveCatalogo']?>] - <?=$sede['vchDescripcion']?>
                                </option>
                              <?php endforeach;?>
                          </select>
                        </div>
                        <div id="campoNombre" class="campo-busqueda" style="display: none; flex: 1;">
                          <input type="text" class="form-control" placeholder="INGRESA EL NOMBRE" name="nombreaBuscar" id = "nombreaBuscar"
                            style="text-transform: uppercase">
                        </div>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label"></label>
                      <div class="col-sm-9">
                        <button type="button" class="button" id="buttonBuscar">BUSCAR</button>
                          <script>
                              document.getElementById('buttonBuscar').addEventListener('click', consultarEmpleado);
                              console.log ('Se está ejecutando el proceso');
                          </script>
                        <button class="button" type="reset" name="buttonLimpiar" id="buttonLimpiar">LIMPIAR</button>
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

      function validarBusqueda() {

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