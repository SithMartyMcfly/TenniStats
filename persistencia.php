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
    $winnersA = $jugadorA['winners'] ?? null;
    $errorA = $jugadorA['error'] ?? null;
    $puntosBreakAfrontadosA = $jugadorA['puntosBreakAfrontados'] ?? null;
    $porcentajePrimerServicioA = $jugadorA['porcentajePrimerServicio'] ?? null;
    $porcentajePrimerosGanadosA = $jugadorA['porcentajePrimerosGanados'] ?? null;
    $porcentajeSegundosGanadoA = $jugadorA['porcentajeSegundoGanados'] ?? null;
    $porcentajePuntoServicioGanadosA = $jugadorA['porcentajePuntoServicioGanados'] ?? null;
    $porcentajeBreakSalvadosA = $jugadorA['porcentajeBreakSalvados'] ?? null;
    //TODO: MODIFICAR TABLA STATS CON CAMPOS NUEVOS
    //jugador B
    $acesB = $jugadorB['aces'] ?? null;
    $dobleFaltaB = $jugadorB['dobleFalta'] ?? null;
    $winnersB = $jugadorB['winners'] ?? null;
    $errorB = $jugadorB['error'] ?? null;
    $puntosBreakAfrontadosB = $jugadorB['puntosBreakAfrontados'] ?? null;
    $porcentajePrimerServicioB = $jugadorB['porcentajePrimerServicio'] ?? null;
    $porcentajePrimerosGanadosB = $jugadorB['porcentajePrimerosGanados'] ?? null;
    $porcentajeSegundosGanadoB = $jugadorB['porcentajeSegundosGanados'] ?? null;
    $porcentajeBreakSalvadosB = $jugadorB['porcentajeBreakSalvados'] ?? null;
    $porcentajePuntoServicioGanadosB = $jugadorB['porcentajePuntoServicioGanados'] ?? null;
    //TODO: MODIFICAR TABLA STATS CON CAMPOS NUEVOS
}

mysqli_select_db($conexion, 'TenniStats');

                $idJugadorA =   "SELECT jugador_servicio 
                                FROM partidos 
                                WHERE id_partido = (SELECT MAX(id_partido) FROM partidos";


                $idPartido =  "SELECT MAX(id_partido) FROM partidos";


                $insertServicio = "INSERT INTO stats
                (id_partido, ficha_federativa, aces, doble_falta, winner, errores, puntos_break_afrontados, porcentaje_primer_servicio, porcentaje_primeros_ganados, 
                porcentaje_segundos_ganados, porcentaje_puntos_servicio_ganados, porcentaje_break_salvados)
                VALUES  (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?                
                        )";


$insercionA = $conexion->prepare($insertServicio);
$insercionA->bind_param(
    'iiiiiiiiiiis',
    $acesA, $dobleFaltaA, $winnersA, $errorA, $puntosBreakAfrontadosA,
    $porcentajePrimerServicioA, $porcentajePrimerosGanadosA, $porcentajeSegundosGanadoA,
    $porcentajePuntoServicioGanadosA, $porcentajeBreakSalvadosA, $idJugadorA, $idPartido
);
$insercionA->execute();

                $idJugadorB =   "SELECT jugador_servicio 
                                FROM partidos 
                                WHERE id_partido = (SELECT MAX(id_partido) FROM partidos";


                $insertResto = "INSERT INTO stats
                (aces, doble_falta, winner, errores, puntos_break_afrontados, porcentaje_primer_servicio, porcentaje_primeros_ganados, 
                porcentaje_segundos_ganados, porcentaje_puntos_servicio_ganados, porcentaje_breaks_salvados, id_partido, ficha_federativa)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?
                           

                        )";

$insercionB = $conexion->prepare($insertResto);
$insercionB->bind_param(
    'iiiiiiiiiiis',
    $acesB, $dobleFaltaB, $winnersB, $errorB, $puntosBreakAfrontadosB,
    $porcentajePrimerServicioB, $porcentajePrimerosGanadosB, $porcentajeSegundosGanadoB,
    $porcentajePuntoServicioGanadosB, $porcentajeBreakSalvadosB, $idPartido, $idJugadorB
);
$insercionB->execute();


header('Location:index.php');

$insercionA->close();
$insercionB->close();
$conexion->close();
