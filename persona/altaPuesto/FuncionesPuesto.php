<?php

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