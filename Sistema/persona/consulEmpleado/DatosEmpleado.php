<?php
require_once ('../../includes/pandora.php');
require_once ('../../includes/load.php');

session_start();


if (isset($_SESSION['user_id'])) {
    // Si el usuario está autenticado, no se hace nada
} else {
    // Si el usuario no está autenticado, redireccionarlo a la página de inicio después de 0 segundos
    echo '<script type="text/javascript">';
    echo 'setTimeout(function () { window.location.href = "../../index.php"; }, 0);';
    echo '</script>';
}

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

function ObtenerPuesto(){
    $datosPuesto = array (
        'iIdPuesto' => 0 ,
        'vchPuesto' => '',
        'iIdTipoContratacion' => 0,
        'iIdUsuarioUltModificacion' => $_SESSION['user_id'],
        'iOpcion' => 2
    );

    $procedureName = "EXEC prcConsultaPuesto    @iIdPuesto = ?, 
                                                        @vchPuesto = ?, 
                                                        @iIdTipoContratacion = ?,
                                                        @iIdUsuarioUltModificacion  = ?,
                                                        @iOpcion = ?                                                       
                                                    ";

    $params = array(

        $datosPuesto['iIdPuesto'],
        $datosPuesto['vchPuesto'],
        $datosPuesto['iIdTipoContratacion'],
        $datosPuesto['iIdUsuarioUltModificacion'],
        $datosPuesto['iOpcion']
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

function ObtenerAutorizacionContratante(){
    $datosConsulta = array (
        'iIdEmpleado' => 0,
        'iIdUsuarioUltModificacion' => $_SESSION['user_id'],
        'iOpcion' => 2
    );

    $procedureName = "EXEC prcConsultaEmpleado      @iIdEmpleado = ?,
                                                        @iIdUsuarioUltModificacion = ?,
                                                        @iOpcion = ? 
                                                        ";
    $params = array(
        $datosConsulta['iIdEmpleado'],
        $datosConsulta['iIdUsuarioUltModificacion'],
        $datosConsulta['iOpcion']
    );
    $result = sqlsrv_query($GLOBALS['conn'], $procedureName, $params);

    $Contratantes = array();

    if ($result === false){
        die(print_r(sqlsrv_errors(), true));

    } else{
        do{
            while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
                $Contratantes[] = $row;
            }
        }while (sqlsrv_next_result($result));
    }
    return $Contratantes;

    sqlsrv_close($GLOBALS['conn']);

}
$resultadoContratantes = ObtenerAutorizacionContratante();



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

    <style>
        .selected {
            color: #007bff;             /* Cambia este color por el que desees */
            font-weight: bold;          /* O cualquier otro estilo que desees */
            
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
            z-index: 1;                             /* asegura que el texto esté sobre la imagen */
            
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
                                        <span>Notificaciones</span>
                                        <a href="#">Marcar todo como leido</a>
                                    </div>
                                    <div class="notification-body">
                                        <a href="../../home-2.html" class="notification-list">
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
                                        <li><a href="../../includes/logout.php"><span
                                                    class="ti-power-off"></span><?php echo $logout; ?></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- pestañas de navegación-->
                    <div class="skill-and-profile">
                        <div class="skill" style="display: flex; justify-content: center;">
                            <label style="align-self: flex-end;" class="selected"><a href="DatosEmpleado.php">EMPLEADO</a></label>
                            <label style="align-self: flex-end;"><a href="../consulEmpleado/consultaPuesto.php ">PUESTO</a></label>
                            <label style="align-self: flex-end;"><a href="consultaDomicilio.php">DOMICILIO</a></label>
                            <label style="align-self: flex-end;"><a href="consultaContacto.php">CONTACTO</a></label>
                            <label style="align-self: flex-end;"><a href="../consulEmpleado/cunsultaDoctos.php">DOCUMENTOS</a></label>
                        </div>
                    </div>
                    <!-- fin de pestañas de navegación-->
                </div>
            </div>
        </div>
    </header>

    <!-- Contenido de la página -->
    <div class="alice-bg section-padding-bottom">
        <div class="container no-gliters">
            <div class="row justify-content-center">
                <div class="col">
                    <div class="post-content-wrapper">
                        <?php
                        if (isset($_POST['submitBuscar'])) {
                            $nombreaBuscar = $_POST['nombreaBuscar'];
                            echo "<br>El nombre a buscar es <b>$nombreaBuscar</b>";

                            if ($nombreaBuscar == '#') { ?>

                                <div style="background-color: #117a8b; text-align: center">
                                    <?php echo "<i><span style='color: #ededee' size='-2'> $busquedaEncontradaTxt</span></i><br />"; ?>
                                </div>
                                <br>Aquí la lista de coincidencias


                            <?php } else { ?>

                                <div style="background-color: #c82333; text-align: center">
                                    <?php echo "<i><span style='color: #ededee' size='-2'> $busquedaNoEncontradaTxt</span></i><br />"; ?>
                                </div>
                            <?php }
                            ?>
                            <?php
                        } else {
                            ?>
                            <script>
                                // depurar y verificar los valores en cada paso
                                document.addEventListener('DOMContentLoaded', function () {
                                    var consultaIndivual = localStorage.getItem('datosConsultaIndividual');
                                    //console.log(consultaIndivual);
                                    var consultaMasiva = localStorage.getItem('empleadoSeleccionado');
                                    console.log(consultaMasiva);

                                    if (consultaIndivual) {
                                        var bResultado = JSON.parse(consultaIndivual);
                                        MostrarDatos(bResultado);

                                    } else if (consultaMasiva) {

                                        bResultadoMasivo = JSON.parse(consultaMasiva);
                                        var iIdEmpleado = bResultadoMasivo.iIdEmpleado;

                                        console.log(iIdEmpleado);

                                        var datosEmpleadoMasivo = new XMLHttpRequest();
                                        datosEmpleadoMasivo.open('POST', 'prcConsultaIndividual.php', true);

                                        var formEmpleado = new URLSearchParams();
                                        formEmpleado.append('idEmpleado', iIdEmpleado);

                                        datosEmpleadoMasivo.send(formEmpleado);

                                        datosEmpleadoMasivo.onload = function () {
                                            if (datosEmpleadoMasivo.status === 200) {
                                                var respuesta = JSON.parse(datosEmpleadoMasivo.responseText);

                                                if (respuesta.bResultado === 1) {
                                                    localStorage.clear();

                                                    localStorage.setItem('datosConsultaIndividual', JSON.stringify(respuesta));

                                                    var datosEmpleadoFinal = localStorage.getItem('datosConsultaIndividual', JSON.stringify(respuesta));

                                                    var bResultado = JSON.parse(datosEmpleadoFinal);
                                                    MostrarDatos(bResultado);
                                                }

                                            }
                                        }
                                    }
                                    return bResultado;

                                    function MostrarDatos(bResultado) {
                                        var idInput = document.getElementById('idInput');
                                        idInput.value = bResultado.iIdEmpleado || '';

                                        var nombreInput = document.getElementById('vchNombre');
                                        nombreInput.value = bResultado.vchNombre || '';

                                        var vchPrimerApellido = document.getElementById('vchPrimerApellido');
                                        vchPrimerApellido.value = bResultado.vchPrimerApellido || '';

                                        var vchSegundoApellido = document.getElementById('vchSegundoApellido');
                                        vchSegundoApellido.value = bResultado.vchSegundoApellido || '';

                                        var vchPuesto = document.getElementById('vchPuesto');
                                        vchPuesto.value = bResultado.vchPuesto || '';

                                        var dFechaIngresoOriginal = bResultado.dFechaIngreso.date;
                                        var fechaIngreso = new Date(dFechaIngresoOriginal);
                                        var fechaIngresoFinal = fechaIngreso.toLocaleDateString('es-ES', {
                                            day: '2-digit',
                                            month: '2-digit',
                                            year: 'numeric'
                                        });
                                        var dFechaIngresoUlt = document.getElementById('dtFechaIngreso');
                                        dFechaIngresoUlt.value = fechaIngresoFinal;

                                        var vchEstatusEmpleado = document.getElementById('iIdEstatusEmpleado');
                                        vchEstatusEmpleado.value = bResultado.vchEstatusEmpleado || '';

                                        var vchNSS = document.getElementById('vchNSS');
                                        vchNSS.value = bResultado.vchNSS || '';

                                        var dFechaPromocionOriginal = bResultado.dtFechaUltPromocion.date;
                                        var fechaPromocion = new Date(dFechaPromocionOriginal);
                                        var fechaIPromocionFinal = fechaPromocion.toLocaleDateString('es-ES', {
                                            day: '2-digit',
                                            month: '2-digit',
                                            year: 'numeric'
                                        });
                                        var dFechaPromocion = document.getElementById('dtFechaUltPromocion');
                                        dFechaPromocion.value = fechaIPromocionFinal || '';

                                        var vchSede = document.getElementById('iIdSedeForm');
                                        vchSede.value = bResultado.vchSede || '';

                                        var dFechaBajaOriginal = bResultado.dtFechaBaja.date;
                                        var fechaBaja = new Date(dFechaBajaOriginal);
                                        var fechaBajaFinal = fechaBaja.toLocaleDateString('es-ES', {
                                            day: '2-digit',
                                            month: '2-digit',
                                            year: 'numeric'
                                        });
                                        var dFechBaja = document.getElementById('dtFechaBaja');
                                        dFechBaja.value = fechaBajaFinal === '01/01/1900' ? '' : fechaBajaFinal;

                                        var vchUsuario = document.getElementById('vchUsuarioUltModificacion');
                                        vchUsuario.value = bResultado.vchUsuarioUltModificacion || '';

                                        var dFechaUltModifOriginal = bResultado.dtFechaUltModificacion.date;
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
                                        dFechaModificacion.value = fechaModifFinal === '01/01/1900' ? '' : fechaModifFinal;

                                        //Datos Persona
                                        var vchRFC = document.getElementById('vchRFC');
                                        vchRFC.value = bResultado.vchRFC || '';

                                        var vchCURP = document.getElementById('vchCURP');
                                        vchCURP.value = bResultado.vchCURP || '';

                                        var dFechaNacimientoOriginal = bResultado.dFechaNacimiento.date;
                                        var fechaNacimiento = new Date(dFechaNacimientoOriginal);
                                        var fechaNacimientoFinal = fechaNacimiento.toLocaleDateString('es-ES', {
                                            day: '2-digit',
                                            month: '2-digit',
                                            year: 'numeric'
                                        });
                                        var dFechaNacimiento = document.getElementById('dFechaNacimiento');
                                        dFechaNacimiento.value = fechaNacimientoFinal === '01/01/1900' ? '' : fechaNacimientoFinal;

                                        var vchGenero = document.getElementById('iIdGenero');
                                        vchGenero.value = bResultado.vchGenero || '';

                                        var vchNacionalidad = document.getElementById('iIdNacionalidad');
                                        vchNacionalidad.value = bResultado.vchNacionalidad || '';

                                        //Datos Fiscales
                                        var vchRegimen = document.getElementById('vchRegimen');
                                        vchRegimen.value = bResultado.vchDescripcionRegimen;

                                        var vchUsoFiscal = document.getElementById('vchUsoFiscal');
                                        vchUsoFiscal.value = bResultado.vchDescripcionUso;

                                        var iCodigoPostalFiscal = document.getElementById('iCodigoPostalFiscal');
                                        iCodigoPostalFiscal.value = bResultado.iCodigoPostalFiscal;

                                    }

                                });

                                function MostrarDatosPromocion(bResultado) {

                                    var vchPuestoPromocion = document.getElementById('vchPuestoPromocion');
                                    vchPuestoPromocion.value = bResultado.vcPuesto;

                                    console.log(vchPuestoPromocion);

                                    console.log(bResultado);



                                    var vchNSSPromocion = document.getElementById('vchNSSPromocion');
                                    vchNSSPromocion.value = bResultado.vchNSS;

                                    var vchSedePromocion = document.getElementById('vchSedePromocion');
                                    vchSedePromocion.value = bResultado.vchSede;

                                }

                            </script>

                            <form action="#" method="post" class="dashboard-form">
                                <div id="information" class="row justify-content-center">
                                    <div class="col-md-10">
                                        <label class="col-form-label"><i ></i>
                                        
                                        <div class="update-photo">
                                            <img class="image" src="../../user-1.jpg" alt="">
                                        </div>
                                            <h6><i data-feather="user-check"></i>DATOS DE EMPLEADO</h6>
                                        </label>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="col-form-label"> EXPEDIENTE EMPLEADO </label>
                                                    <input id="idInput" type="text" class="form-control" placeholder="ID"
                                                        disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="col-form-label"> NOMBRE (S) </label>
                                                    <input type="text" class="form-control" placeholder="NOMBRE"
                                                        id="vchNombre" disabled />
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="col-form-label"> PRIMER APELLIDO </label>
                                                    <input type="text" class="form-control" placeholder="PRIMER APELLIDO"
                                                        id="vchPrimerApellido" disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="col-form-label"> SEGUNDO APELLIDO </label>
                                                    <input type="text" class="form-control" placeholder="SEGUNDO APELLIDO"
                                                        id="vchSegundoApellido" disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class=" col-form-label">CURP
                                                    </label>
                                                    <input type="text" class="form-control" placeholder="CURP" id="vchCURP"
                                                        disabled />
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="col-form-label">RFC</label>
                                                    <input type="text" class="form-control" placeholder="RFC" id="vchRFC"
                                                        disabled />
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="col-form-label">FECHA
                                                        NACIMIENTO </label>
                                                    <input type="text" class="form-control"
                                                        placeholder="FECHA DE NACIMIENTO" id="dFechaNacimiento" disabled />
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="col-form-label">GENERO
                                                    </label>
                                                    <input type="text" class="form-control" placeholder="GENERO"
                                                        id="iIdGenero" disabled />
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="col-form-label">NACIONALIDAD
                                                    </label>
                                                    <input type="text" class="form-control" placeholder="NACIONALIDAD"
                                                        id="iIdNacionalidad" disabled />
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="col-form-label">REGIMEN
                                                        FISCAL </label>
                                                    <input type="text" class="form-control" placeholder=""
                                                        id="vchRegimen" disabled />
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class=" col-form-label">USO
                                                        FISCAL </label>
                                                    <input type="text" class="form-control" placeholder=""
                                                        id="vchUsoFiscal" disabled />
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="col-form-label">C.P.
                                                        FISCAL </label>
                                                    <input type="text" class="form-control" placeholder=""
                                                        id="iCodigoPostalFiscal" disabled />
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="col-form-label"> PUESTO </label>
                                                    <input type="text" class="form-control" placeholder="PUESTO"
                                                        id="vchPuesto" disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="col-form-label"> FECHA DE INGRESO </label>
                                                    <input type="text" class="form-control" placeholder="FECHA DE INGRESO"
                                                        id="dtFechaIngreso" disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="col-form-label"> ESTATUS DE EMPLEADO </label>
                                                    <input type="text" class="form-control" placeholder="ESTATUS"
                                                        id="iIdEstatusEmpleado" disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group ">
                                                    <label class="col-form-label"> NSS </label>
                                                    <input type="text" class="form-control" placeholder="NSS" id="vchNSS"
                                                        disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group ">
                                                    <label class="col-form-label">FECHA ULTIMA PROMOCION
                                                    </label>
                                                    <input type="text" class="form-control" placeholder="FECHA ULTIMA PROM."
                                                        id="dtFechaUltPromocion" disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="col-form-label">SEDE </label>
                                                    <input type="text" class="form-control" placeholder="SEDE" id="iIdSedeForm"
                                                        disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group ">
                                                    <label class="col-form-label">FECHA BAJA </label>
                                                    <input type="text" class="form-control" id="dtFechaBaja" disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="col-form-label">USUARIO ULTIMA
                                                        MODIFICACION</label>
                                                    <input type="text" class="form-control"
                                                        placeholder="USUARIO ULTIMA MOD." id="vchUsuarioUltModificacion"
                                                        disabled />
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

                                        <div class="candidate">
                                        <div class="body">
                                          <div class="row">
                                            <div class="row-left">
                                                <a href="#" class="boton-intec" data-toggle="modal" data-target="#apply-popup-id-1" id = "buttonModificarEmpleado">MODIFICAR</a>
                                                <a href="#" class="boton-intec" data-toggle="modal" data-target="#apply-popup-id-2">BAJA</a>
                                                <a href="#" class="boton-intec" data-toggle="modal" data-target="#apply-popup-id-3">REACTIVACION</a>
                                                <a href="#" class="boton-intec" data-toggle="modal" data-target="#apply-popup-id-4" id="buttonPromocion">PROMOCION</a>
                                            </div>
                                          </div>
                                            <script>

                                                document.getElementById('buttonPromocion').addEventListener('click', function (){
                                                    var datosPromocion = localStorage.getItem('datosConsultaIndividual');
                                                    if (datosPromocion){
                                                        var bResultadoPromocion = JSON.parse(datosPromocion);
                                                        MostrarDatosPromocion(bResultadoPromocion);
                                                    }
                                                });
                                            </script>

                                          <a href="#" class="boton-intec" class="thumb">GUARDAR</a>
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

<script>
    document.getElementById('buttonModificarEmpleado').addEventListener('click', function (){
        const habilitarBotones = document.querySelectorAll('.boton-intec');
        habilitarBotones.forEach(boton => boton.disabled = false);

        localStorage.setItem('habilitarBotones', 'true');
    });
</script>



<script>
    function deshabilitarBotones(){
        const botonesEmpleado = document.querySelectorAll('.boton-intec');

        botonesEmpleado.forEach(boton => boton.disabled = true);

        $('$apply-popup-id-2').on('hidden.bs.modal', function (){
            deshabilitarBotones();
        });
    }
</script>




    <!-- inicio de modales -->
    <div class="apply-popup">
        <div class="modal fade" id="apply-popup-id-1" tabindex="-1" role="dialog" aria-hidden="true" >
            <div class="modal-dialog" role="document">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title"><i data-feather="edit"></i>CAMBIOS DATOS GENERALES DE EMPLEADO</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="#">
                            <div class="form-group">
                                <input type="tel" class="form-control" name="vchNSS" id="vchNSS" maxlength="10"
                                    pattern="^[0-9]{10,}$" title="NSS INCORRECTO" style="text-transform: uppercase"
                                    placeholder="Ingrese su NSS" >
                            </div>
                            <?php
                            // Calcular la fecha actual
                            $fechaActual = date('Y-m-d');

                            // Restar 18 años a la fecha actual
                            $fechaMinima = date('Y-m-d', strtotime('-18 years', strtotime($fechaActual)));

                            // Establecer la fecha máxima como la fecha actual  
                            $fechaMaxima = $fechaActual;

                            // Establecer la fecha mínima como 1900-01-01 (opcional)
                            $fechaLimiteInferior = '1900-01-01';
                            ?>
                            <div class="form-group">
                                <option value="">FECHA DE INGRESO</option>
                                <input type="date" class="form-control" placeholder="FECHA DE INGRESO"
                                    name="fechaIngreso" id="dFechaIngreso" pattern="\d{4}-\d{2}-\d{2}"
                                    title="FORMATO DE FECHA INCORRECTA (AAAA-MM-DD)" 
                                    min="<?php echo $fechaMinima; ?>" max="<?php echo $fechaMaxima; ?>" maxlength="10">
                            </div>
                            <div class="form-group">
                                <select class="form-control" Name="iIdSede" id="iIdSede" >
                                    <option value="">SELECCIONE UNA SEDE</option>
                                    <?php foreach ($resultadoSede as $sede): ?>
                                        <option value="<?= $sede['iIdConstante'] . '-' . $sede['iClaveCatalogo'] ?>">
                                            [<?= $sede['iClaveCatalogo'] ?>] - <?= $sede['vchDescripcion'] ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="vchNSS" id="vchNSS" title="CONTRATADO POR"
                                    style="text-transform: uppercase" placeholder="CONTRATADO POR">
                            </div>
                            <div class="form-group">
                <div class="col-sm-9">
                  <input type="text" class="form-control" placeholder="NOMBRE" id="vchNombre" name="vchNombre"
                    style="text-transform: uppercase" >
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-9">
                  <input type="text" class="form-control" placeholder="PRIMER APELLIDO" id="vchPrimerApellido" name="vchPrimerApellido"
                    style="text-transform: uppercase" >
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-9">
                  <input type="text" class="form-control" placeholder="SEGUNDO APELLIDO" id="vchSegundoApellido" name="vchSegundoApellido"
                    style="text-transform: uppercase" >
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-9">
                  <input type="text" class="form-control" placeholder="RFC" id="vchRFC" name="vchRFC"
                    style="text-transform: uppercase" >
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-9">
                  <input type="text" class="form-control" placeholder="CURP" id="vchCURP" name="vchCURP"
                    style="text-transform: uppercase" >
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-9">
                  <input type="text" class="form-control" placeholder="FECHA DE NACIMIENTO" id="dFechaNacimiento" name="dFechaNacimiento"
                    style="text-transform: uppercase" >
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-9">
                  <input type="text" class="form-control" placeholder="GENERO" id="iIdGenero" name="iIdGenero"
                    style="text-transform: uppercase" >
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-9">
                  <input type="text" class="form-control" placeholder="NACIONALIDAD" id="iIdNacionalidad" name="iIdNacionalidad"
                    style="text-transform: uppercase" >
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-9">
                  <input type="text" class="form-control" placeholder="REGIMEN FISCAL" id="iIdRegimenFiscal" name="iIdRegimenFiscal"
                    style="text-transform: uppercase" >
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-9">
                  <input type="text" class="form-control" placeholder="USO FISCAL" id="iIdUsoFiscal" name="iIdUsoFiscal"
                    style="text-transform: uppercase" >
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-9">
                  <input type="text" class="form-control" placeholder="C.P. FISCAL" id="iCodigoPostalFiscal" name="iCodigoPostalFiscal"
                    style="text-transform: uppercase" >
                </div>
              </div>
              <div class="update-photo" style="position: relative;">
                            <label><img class="image" src="../../user-1.jpg" alt="">
                                <span class="edit-text">EDITAR IMAGEN</span>
                                <input for="up-cv" type="file" class="upload-input" id="up-cv" accept="image/*" style="display: none;" onchange="updateImage(this)">
                                </label>
                            </div>
                            <button class="boton-intec">APLICAR</button>
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
                        <form class="dashboard-form" id="BajaEmpleado">
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
                                    title="FORMATO DE FECHA INCORRECTA (AAAA-MM-DD)" required
                                    min="<?php echo $fechaMinima; ?>" max="<?php echo $fechaMaxima; ?>" maxlength="10"
                                       value = "<?php echo date ('Y-m-d');?>">
                            </div>

                            <script>
                                function ValidarBaja(){
                                    localStorage.clear();

                                    var datosBajaEmpleado = {
                                        fechaBaja : document.getElementById('dtFechaBajaModificacion'),
                                        proceso : 3 //baja de empleado
                                    };

                                    var datosBaja = new XMLHttpRequest();

                                    datosBaja.open('POST', 'prcActualizaEmpleado.php', true);
                                    datosBaja.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

                                    var formData = new URLSearchParams(datosBajaEmpleado).toString();

                                    datosBaja.send(formData);

                                    datosBaja.onload = function(){
                                        if (datosBaja.status === 200){
                                            var respuesta = JSON.parse(datosBaja.responseText);
                                            if (respuesta.bResultado === 1){
                                                console.log(respuesta);
                                                localStorage.setItem('datosBaja', JSON.stringify(datosBajaEmpleado));
                                                window.location.href = "consultaEmpleado.php";
                                            }else {
                                                console.error("Mensaje de error: "+respuesta.vchMensaje);
                                                alert(respuesta.vchMensaje);
                                            }
                                        }else {
                                            console.error("Error en la solicitud al servidor");
                                        }
                                    }
                                }
                            </script>
                            <button class="button primary-bg btn-block" id = "botonAplicarBaja" >APLICAR</button>
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

<!--Modal de reactivación-->
    <div class="apply-popup">
        <div class="modal fade" id="apply-popup-id-3" tabindex="-1" role="dialog" aria-hidden="true" >
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
                                <input type="tel" class="form-control" name="vchNSS" id="vchNSSReactivacion" maxlength="10"
                                    pattern="^[0-9]{10,}$" title="NSS INCORRECTO" style="text-transform: uppercase"
                                    placeholder="Ingrese su NSS" >
                            </div>

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
                                <option value="">FECHA DE INGRESO</option>
                                <input type="date" class="form-control" placeholder="FECHA DE BAJA" name="fechaIngreso"
                                    id="dFechaIngreso" pattern="\d{4}-\d{2}-\d{2}"
                                    title="FORMATO DE FECHA INCORRECTA (AAAA-MM-DD)"
                                    min="<?php echo $fechaMinima; ?>" max="<?php echo $fechaMaxima; ?>"  maxlength="10" value = "<?php echo date ('Y-m-d');?>">
                            </div>


                            <div class="form-group">
                                <select id="iIdPuesto" name="iIdPuesto" class="form-control"
                                    placeholder="INGRESE SU PUESTO" style="text-transform: uppercase">
                                    <option value="">SELECCIONE UN PUESTO</option>
                                    <?php foreach ($resultadoPuesto as $puesto): ?>
                                        <option value="<?= $puesto['iIdPuesto'] ?>">
                                            <?= $puesto['vchPuesto'] ?>
                                        </option>
                                    <?php endforeach; ?>

                                </select>
                            </div>
                             <div class="form-group">
                                <select class="form-control" Name="iIdPersonaContratante"  id = "iIdPersonaContratante" >
                                    <option value="" selected>PERSONA QUE AUTORIZA CONTRATACIÓN </option>
                                    <?php foreach ($resultadoContratantes as $contratante): ?>
                                        <option value="<?= $contratante['iIdPersona'] ?>">
                                            [<?= $contratante['iIdPersona']?>] - <?= $contratante['vchPrimerApellido'].' '. $contratante['vchSegundoApellido'].' '.$contratante['vchNombre'] ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <button class="button primary-bg btn-block">APLICAR</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


<!--Modal de promoción--->
    <div class="apply-popup">
        <div class="modal fade" id="apply-popup-id-4" tabindex="-1" role="dialog" aria-hidden="true" >
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
                            <div class="form-group row">
                                <div class="col-sm-9">
                                    <select class="form-control" Name="iIdPuesto" >
                                        <option value="" id="vchPuestoPromocion" selected>SELECCIONE NUEVO PUESTO</option>
                                        <?php foreach ($resultadoPuesto as $puesto): ?>
                                            <option value="<?= $puesto['iIdPuesto'] ?>">
                                                <?= $puesto['vchPuesto'] ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="tel" class="form-control" name="vchNSS" id="vchNSSPromocion" maxlength="10"
                                    pattern="^[0-9]{10,}$" title="NSS INCORRECTO" style="text-transform: uppercase"
                                    placeholder="Ingrese su NSS">
                            </div>
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
                                <option value="">FECHA DE REINGRESO</option>
                                <input type="date" class="form-control" placeholder="FECHA DE INGRESO"
                                    name="fechaIngreso" id="dFechaIngreso" pattern="\d{4}-\d{2}-\d{2}"
                                    title="FORMATO DE FECHA INCORRECTA (AAAA-MM-DD)"
                                    min="<?php echo $fechaMinima; ?>" max="<?php echo $fechaMaxima; ?>" maxlength="10" value = "<?php echo date ('Y-m-d');?>">
                            </div>
                            <div class="form-group">
                                <select class="form-control" Name="iIdSede" id="vchSedePromocion" >
                                    <option value="">SELECCIONE UNA SEDE</option>
                                    <?php foreach ($resultadoSede as $sede): ?>
                                        <option value="<?= $sede['iIdConstante'] . '-' . $sede['iClaveCatalogo'] ?>">
                                            [<?= $sede['iClaveCatalogo'] ?>] - <?= $sede['vchDescripcion'] ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <button class="button primary-bg btn-block" id="aplicarPromocion"  >APLICAR</button>
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
                                        <img src="images/footer-logo.png" class="img-fluid" alt="">
                                    </a>
                                    <p class="copyright-text">Copyright <a href="#">Oficina</a> 2020, All right
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