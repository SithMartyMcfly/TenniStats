<?php
include '../../../conexionBBDD/conexion.php';
include '../statsPaginas/modeloStats.php';

if (isset($_GET['id_jugador'])) {
    $id_jugador = $_GET['id_jugador'];
}

if (isset($_GET['id_partido'])) {
    $id_partido = $_GET['id_partido'];
}

function statsHistoricas($campo)
{
    global $id_jugador;
    $statsHistoricas = '';
    $datos = getStatsHistoricas($id_jugador);
    while ($fila = mysqli_fetch_assoc($datos)) {

        switch ($campo) {
            case 'aces':
                $statsHistoricas .= $fila['aces'];
                break;
            case 'doble_falta':
                $statsHistoricas .= $fila['doble_falta'];
                break;
            case 'winners':
                $statsHistoricas .= $fila['winners'];
                break;
            case 'errores':
                $statsHistoricas .= $fila['errores'];
                break;
            case 'puntos_break_afrontados':
                $statsHistoricas .= $fila['puntos_break_afrontados'];
                break;
            case 'porcentaje_primer_servicio':
                $statsHistoricas .= $fila['porcentaje_primer_servicio'];
                break;
            case 'porcentaje_primeros_ganados':
                $statsHistoricas .= $fila['porcentaje_primeros_ganados'];
                break;
            case 'porcentaje_segundos_ganados':
                $statsHistoricas .= $fila['porcentaje_segundos_ganados'];
                break;
            case 'porcentaje_puntos_servicio_ganados':
                $statsHistoricas .= $fila['porcentaje_puntos_servicio_ganados'];
                break;
            case 'porcentaje_break_salvados':
                $statsHistoricas .= $fila['porcentaje_break_salvados'];
                break;
            case 'puntos_break_ganados':
                $statsHistoricas .= $fila['puntos_break_ganados'];
                break;
            case 'puntos_break_jugados':
                $statsHistoricas .= $fila['puntos_break_jugados'];
                break;
            case 'porcentaje_break_ganados':
                $statsHistoricas .= $fila['porcentaje_break_ganados'];
                break;
            case 'numero_partidos_jugados':
                $statsHistoricas .= $fila['numero_partidos_jugados'];
                break;
            case 'numero_partidos_ganados':
                $statsHistoricas .= $fila['numero_partidos_ganados'];
                break;
            default:
                var_dump($fila);
                break;
        }
    }
    return $statsHistoricas;
}

function statsPartidos($id_partido, $id_jugador, $campo)
{
    global $id_jugador;
    global $id_partido;

    $statsPartido = '';
    $datos = getStatsPartido($id_jugador, $id_partido);
    if ($datos && mysqli_num_rows($datos) > 0) {

        while ($fila = mysqli_fetch_assoc($datos)) {
            switch ($campo) {
                case 'aces':
                    $statsPartido .= $fila['aces'];
                    break;
                case 'doble_falta':
                    $statsPartido .= $fila['doble_falta'];
                    break;
                case 'winner':
                    $statsPartido .= $fila['winner'];
                    break;
                case 'errores':
                    $statsPartido .= $fila['errores'];
                    break;
                case 'puntos_break_afrontados':
                    $statsPartido .= $fila['puntos_break_afrontados'];
                    break;
                case 'porcentaje_primer_servicio':
                    $statsPartido .= $fila['porcentaje_primer_servicio'];
                    break;
                case 'porcentaje_primeros_ganados':
                    $statsPartido .= $fila['porcentaje_primeros_ganados'];
                    break;
                case 'porcentaje_segundos_ganados':
                    $statsPartido .= $fila['porcentaje_segundos_ganados'];
                    break;
                case 'porcentaje_puntos_servicio_ganados':
                    $statsPartido .= $fila['porcentaje_puntos_servicio_ganados'];
                    break;
                case 'porcentaje_break_salvados':
                    $statsPartido .= $fila['porcentaje_break_salvados'];
                    break;
                case 'puntos_break_ganados':
                    $statsPartido .= $fila['puntos_break_ganados'];
                    break;
                case 'puntos_break_jugados':
                    $statsPartido .= $fila['puntos_break_jugados'];
                    break;
                case 'porcentaje_break_ganados':
                    $statsPartido .= $fila['porcentaje_break_ganados'];
                    break;
                case 'numero_partidos_jugados':
                    $statsPartido .= $fila['numero_partidos_jugados'];
                    break;
                case 'numero_partidos_ganados':
                    $statsPartido .= $fila['numero_partidos_ganados'];
                    break;
                default:
                    return 'campo no válido';
                    break;
            }
        }
        return $statsPartido;
    } else {
        return "El partido fue agendado, pero no jugado";
    }
}



function nombreCompleto()
{
    global $id_jugador;
    $nombreCompleto = '';
    $datos = getNombreCompleto($id_jugador);
    while ($fila = mysqli_fetch_assoc($datos)) {
        $nombreCompleto .= $fila['nombreCompleto'];
    }
    return $nombreCompleto;
}

function datosPartido()
{
    global $id_jugador;
    $HTMLdatosPartido = '';
    $datos = getPartidos($id_jugador);
    while ($fila = mysqli_fetch_assoc($datos)) {
        $HTMLdatosPartido .= "<div>
                                <label>Fecha</label>
                                <p>" . $fila['fecha'] . "</p>
                                <label>Lugar</label>
                                <p>" . $fila['lugar'] . "</p>
                                <label>Categoría</label>
                                <p>" . $fila['categoria'] . "</p>
                                <label>VS</label>
                                <p>" . $fila['rival'] . "</p>
                                <button onclick=\"verEstadisticasPartido(" . $fila['id_partido'] . ")\">Ver Partido</button>
                            </div>";
    }
    return $HTMLdatosPartido;
}
