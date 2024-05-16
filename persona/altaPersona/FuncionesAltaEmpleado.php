<?php
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

    function ObtenerTipoDocumento(){
        if (isset ($_SESSION['CatConstante'])){
            $datosDocumentos = $_SESSION['CatConstante'];
            $documentosEncontrados= array();

            foreach ($datosDocumentos as $valorDocumento) {
                if ($valorDocumento['iAgrupador'] == 10) {
                    $documentosEncontrados [] = $valorDocumento;
                }
            }
            return $documentosEncontrados;
        } else {
            echo ("No hay datos del Estado de Procedencia");
        }
    }

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

?>