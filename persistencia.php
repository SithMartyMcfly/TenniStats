<?php
include '../ProyectoFinalCiclo/conexionBBDD/conexion.php';

$jugadorA = isset($_POST['jugadorA']) ? json_decode($_POST['jugadorA'], true) : null;
$jugadorB = isset($_POST['jugadorB']) ? json_decode($_POST['jugadorB'], true) : null;

if (!$jugadorA || !$jugadorB) {
    die("Error: Datos de jugadores no válidos.");
}
if ($jugadorA && $jugadorB) {
    //jugador A
    $acesA = $jugadorA['aces'] ?? null;
    $dobleFaltaA = $jugadorA['dobleFalta'] ?? null;
    $partidoGanadoA = $jugadorA['partidoGanado'] ?? null;
    $winnersA = $jugadorA['winners'] ?? null;
    $errorA = $jugadorA['errores'] ?? null;
    $puntosBreakAfrontadosA = $jugadorA['puntosBreakAfrontados'] ?? null;
    $porcentajePrimerServicioA = $jugadorA['porcentajePrimerServicio'] ?? null;
    $porcentajePrimerosGanadosA = $jugadorA['porcentajePrimerosGanados'] ?? null;
    $porcentajeSegundosGanadoA = $jugadorA['porcentajeSegundosGanados'] ?? null;
    $porcentajePuntoServicioGanadosA = $jugadorA['porcentajePuntoServicioGanados'] ?? null;
    $porcentajeBreakSalvadosA = $jugadorA['porcentajeBreakSalvados'] ?? null;
    $puntosBreakGanadosA = $jugadorA['puntosBreakGanados'] ?? null;
    $puntosBreakJugadosA = $jugadorA['puntosBreakJugados'] ?? null;
    $porcentajeBreaksGanadosA = $jugadorA['porcentajeBreaksGanados'] ?? null;
    
    //jugador B
    $acesB = $jugadorB['aces'] ?? null;
    $dobleFaltaB = $jugadorB['dobleFalta'] ?? null;
    $partidoGanadoB = $jugadorB['partidoGanado'] ?? null;
    $winnersB = $jugadorB['winners'] ?? null;
    $errorB = $jugadorB['errores'] ?? null;
    $puntosBreakAfrontadosB = $jugadorB['puntosBreakAfrontados'] ?? null;
    $porcentajePrimerServicioB = $jugadorB['porcentajePrimerServicio'] ?? null;
    $porcentajePrimerosGanadosB = $jugadorB['porcentajePrimerosGanados'] ?? null;
    $porcentajeSegundosGanadoB = $jugadorB['porcentajeSegundosGanados'] ?? null;
    $porcentajePuntoServicioGanadosB = $jugadorB['porcentajePuntoServicioGanados'] ?? null;
    $porcentajeBreakSalvadosB = $jugadorB['porcentajeBreakSalvados'] ?? null;
    $puntosBreakGanadosB = $jugadorB['puntosBreakGanados'] ?? null;
    $puntosBreakJugadosB = $jugadorB['puntosBreakJugados'] ?? null;
    $porcentajeBreaksGanadosB = $jugadorB['porcentajeBreaksGanados'] ?? null;
    //TODO: MODIFICAR TABLA STATS CON CAMPOS NUEVOS
}

mysqli_select_db($conexion, 'TenniStats');
                //ficha_jugadorA
                $idJugadorA =   "SELECT ficha_jugador1 
                                FROM partidos 
                                WHERE id_partido = (SELECT MAX(id_partido) FROM partidos)";

                //obtengo la id del partido
                $idPartido =  "SELECT MAX(id_partido) FROM partidos";
                //obtengo la fecha del partido
                $fechaPartido = "SELECT fecha
                                FROM partidos
                                WHERE id_partido = (SELECT MAX(id_partido)
                                                    FROM partidos)";

                $idPartido = $conexion->query("SELECT MAX(id_partido) FROM partidos")->fetch_assoc()['MAX(id_partido)'];
                $fechaPartido = $conexion ->query($fechaPartido)->fetch_assoc()['fecha'];

                //PERSISTENCIA JUGADOR_A

                $insertServicio = "INSERT INTO stats_partidos
                (ficha_federativa, id_partido, fecha_partido, aces, doble_falta, partidoGanado, winner, errores, puntos_break_afrontados, porcentaje_primer_servicio, 
                porcentaje_primeros_ganados, porcentaje_segundos_ganados, porcentaje_puntos_servicio_ganados, porcentaje_break_salvados, 
                puntos_break_ganados, puntos_break_jugados, porcentaje_break_ganados)
                VALUES  (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";


$insercionA = $conexion->prepare($insertServicio);
$idJugadorA = $conexion->query("SELECT ficha_jugador1 
                                FROM partidos 
                                WHERE id_partido = $idPartido")->fetch_assoc()['ficha_jugador1'];

$insercionA->bind_param(
    'sisiiiiiidddddiid',
    $idJugadorA, $idPartido, $fechaPartido,
    $acesA, $dobleFaltaA, $partidoGanadoA, $winnersA, $errorA, $puntosBreakAfrontadosA,
    $porcentajePrimerServicioA, $porcentajePrimerosGanadosA, $porcentajeSegundosGanadoA,
    $porcentajePuntoServicioGanadosA, $porcentajeBreakSalvadosA, $puntosBreakGanadosA,
    $puntosBreakJugadosA, $porcentajeBreaksGanadosA
);
$insercionA->execute();

                //PERSISTENCIA JUGADOR_B

                $idJugadorB =   "SELECT ficha_jugador2 
                                FROM partidos 
                                WHERE id_partido = (SELECT MAX(id_partido) FROM partidos)";


                $insertResto = "INSERT INTO stats_partidos
                (ficha_federativa, id_partido, fecha_partido, aces, doble_falta, partidoGanado, winner, errores, puntos_break_afrontados, 
                porcentaje_primer_servicio, porcentaje_primeros_ganados, porcentaje_segundos_ganados, 
                porcentaje_puntos_servicio_ganados, porcentaje_break_salvados,
                puntos_break_ganados, puntos_break_jugados, porcentaje_break_ganados)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$insercionB = $conexion->prepare($insertResto);
$idJugadorB = $conexion->query("SELECT ficha_jugador2 
                                FROM partidos 
                                WHERE id_partido = $idPartido")->fetch_assoc()['ficha_jugador2'];
$insercionB->bind_param(
    'sisiiiiiidddddiid',
    $idJugadorB, $idPartido, $fechaPartido,
    $acesB, $dobleFaltaB, $partidoGanadoB, $winnersB, $errorB, $puntosBreakAfrontadosB,
    $porcentajePrimerServicioB, $porcentajePrimerosGanadosB, $porcentajeSegundosGanadoB,
    $porcentajePuntoServicioGanadosB, $porcentajeBreakSalvadosB, $puntosBreakGanadosB,
    $puntosBreakJugadosB, $porcentajeBreaksGanadosB
);
$insercionB->execute();


$insercionA->close();
$insercionB->close();
$conexion->close();
