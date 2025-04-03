<?php
include '../../../conexionBBDD/conexion.php';
include '../statsPaginas/modeloStats.php';

/*if (isset($_GET['id'])){
    $id = $_GET['id'];
}*/

function statsHistoricas ($campo) {
    global $id;
    $statsHistoricas = '';
    $datos = getStatsHistoricas($id);
    while ($fila = mysqli_fetch_assoc($datos)) {
      
        switch ($campo) {
            case 'aces':
                return $statsHistoricas .= $fila['aces'];
                break;
            case 'doble_falta':
                return $statsHistoricas .= $fila['doble_falta'];
                break;
            case 'winners':
                return $statsHistoricas .= $fila['winners'];
                break;
            case 'errores':
                return $statsHistoricas .= $fila['errores'];
                break;
            case 'puntos_break_afrontados':
                return $statsHistoricas .= $fila['puntos_break_afrontados'];
                break;
            case 'porcentaje_primer_servicio':
                return $statsHistoricas .= $fila['porcentaje_primer_servicio'];
                break;
            case 'porcentaje_primeros_ganados':
                return $statsHistoricas .= $fila['porcentaje_primeros_ganados'];
                break;
            case 'porcentaje_segundos_ganados':
                return $statsHistoricas .= $fila['porcentaje_segundos_ganados'];
                break;
            case 'porcentaje_puntos_servicio_ganados':
                return $statsHistoricas .= $fila['porcentaje_puntos_servicio_ganados'];
                break;
            case 'porcentaje_break_salvados':
                return $statsHistoricas .= $fila['porcentaje_break_salvados'];
                break;
            case 'puntos_break_ganados':
                return $statsHistoricas .= $fila['puntos_break_ganados'];
                break;
            case 'puntos_break_jugados':
                return $statsHistoricas .= $fila['puntos_break_jugados'];
                break;
            case 'porcentaje_break_ganados':
                return $statsHistoricas .= $fila['porcentaje_break_ganados'];
                break;
            case 'numero_partidos_jugados':
                return $statsHistoricas .= $fila['numero_partidos_jugados'];
                break;
            case 'numero_partidos_ganados':
                return $statsHistoricas .= $fila['numero_partidos_ganados'];
                break;
            default:
                var_dump($fila);
                break;

        }

    }
    return $statsHistoricas;
}

function nombreCompleto ($id){
    global $id;
    $nombreCompleto = '';
    $datos = getNombreCompleto($id);
    while ($fila = mysqli_fetch_assoc($datos)){
        $nombreCompleto .= $fila['nombreCompleto'];
    }
    return $nombreCompleto;
}


?>

