<?php
    require_once ('../includes/load.php');
    session_start();

    function ObtenerTipoProducto()
    {
        if (isset($_SESSION['CatConstante'])) {
            $datosTipoProducto = $_SESSION['CatConstante'];
            $productoEncontrado = array();

            foreach ($datosTipoProducto as $valorProducto) {
                if ($valorProducto['iAgrupador'] == 12) {
                    $productoEncontrado[] = $valorProducto;
                }
            }
            return $productoEncontrado;
        } else {
            echo("No hay datos del Tipo de producto");
        }
    }

    function ObtenerTipoSubproducto()
    {
        if (isset($_SESSION['CatConstante'])) {
            $datosTipoSubproducto = $_SESSION['CatConstante'];
            $subproductoEncontrado = array();

            foreach ($datosTipoSubproducto as $subproducto) {
                if ($subproducto['iAgrupador'] == 13) {
                    $subproductoEncontrado[] = $subproducto;
                }
            }
            return $subproductoEncontrado;
        } else {
            echo("No hay datos del tipo de subproducto");
        }
    }

    function ObtenerMarca()
    {
        if (isset($_SESSION['CatConstante'])) {
            $datosMarca = $_SESSION['CatConstante'];
            $marcasEncontradas = array();

            foreach ($datosMarca as $marca) {
                if ($marca['iAgrupador'] == 14) {
                    $marcasEncontradas[] = $marca;
                }
            }
            return $marcasEncontradas;
        } else {
            echo("No hay datos de las marcas");
        }
    }

    function ObtenerTipoAsignacion()
    {
        if (isset($_SESSION['CatConstante'])) {
            $datosAsignacion = $_SESSION['CatConstante'];
            $tipoAsignacionEncontrada = array();

            foreach ($datosAsignacion as $asignacion) {
                if ($asignacion['iAgrupador'] == 17) {
                    $tipoAsignacionEncontrada[] = $asignacion;
                }
            }
            return $tipoAsignacionEncontrada;
        } else {
            echo("No hay datos de los tipos de asignación");
        }
    }

    /*
    function consultaPersona()
    {
        $datosPersona = array(
           'iIdPersona' => 0,
           'vchCadena' => '',
           'iIdUsuario' => $_SESSION['user_id'],
           'iOpcion' => 3
        );

        $procedureName = "EXEC prcConsultaPersona     @iIdPersona = ?, 
                                                      @vchCadena = ? ,
                                                      @iIdUsuarioUltModificacion = ? , 
                                                      @iOpcion = ?
                                                        ";

        $params = array(
            $datosPersona['iIdPersona'],
            $datosPersona['vchCadena'],
            $datosPersona['iIdUsuario'],
            $datosPersona['iOpcion']
        );


        $result = sqlsrv_query($GLOBALS['conn'], $procedureName, $params);

        if($result === false){
            $errorInformacion = sqlsrv_errors();
            $respuesta = array(
               'error' => true,
               'sqlError' => $errorInformacion
            );
            echo json_encode($respuesta);
            exit;
        }else{
            $DatosPersona = array();
            do{
                while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)){
                    $DatosPersona[] = $row;
                }
            }while (sqlsrv_next_result($result));

            echo json_encode($DatosPersona);

        }

        sqlsrv_free_stmt($result);

        sqlsrv_close($GLOBALS['conn']);

    }
    */


?>