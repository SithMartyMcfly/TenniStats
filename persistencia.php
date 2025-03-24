<?php
include '../ProyectoFinalCiclo/conexionBBDD/conexion.php';

$jugadorA = json_decode($_POST['jugadorA'], true);
$jugadorB = json_decode($_POST['jugadorB'], true);

if ($jugadorA && $jugadorB){
    $acesA = $jugadorA['aces'] ?? null;
    $primerServicioA = $jugadorA['primerServicio'] ?? null;
    $dobleFaltaA = $jugadorA['dobleFalta'] ?? null;

    $acesB = $jugadorB['aces'] ?? null;
    $primerServicioB = $jugadorB['primerServicio'] ?? null;
    $dobleFaltaB = $jugadorB['dobleFalta'] ?? null;
}

mysqli_select_db($conexion, 'TenniStats');

$insertServicio = "INSERT INTO stats
(aces, primer_servicio, doble_falta, id_partido, ficha_federativa)
VALUES  (?, ?, ?,
            (SELECT MAX(id_partido) FROM partidos),
            (SELECT jugador_servicio FROM partidos WHERE id_partido = (SELECT MAX(id_partido) FROM partidos))
        )
";

$insercionA = $conexion -> prepare ($insertServicio);
$insercionA -> bind_param ('iii', $acesA, $primerServicioA, $dobleFaltaA);
$insercionA -> execute();


$insertResto = "INSERT INTO stats
(aces, primer_servicio, doble_falta, id_partido, ficha_federativa)
VALUES (?, ?, ?,
(SELECT MAX(id_partido) FROM partidos),
(SELECT jugador_resto FROM partidos WHERE id_partido = (SELECT MAX(id_partido) FROM partidos)))
";

$insercionA = $conexion -> prepare ($insertResto);
$insercionA -> bind_param ('iii', $acesB, $primerServicioB, $dobleFaltaB);
$insercionA -> execute();

header('Location:index.php');