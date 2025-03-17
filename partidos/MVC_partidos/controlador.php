<?php
include 'modelo.php';

function tituloPartido() {
    $idPartido = '';
    $datos = getDatosPartidos();
    while($fila = mysqli_fetch_assoc($datos)){
        $idPartido .= $fila['lugar'] .', '. $fila['categoria'] .' - '. $fila['fecha']
                        ;
    }
    return $idPartido;
}

function jugadorServicio () {
    $jugadorServicio = '';
    $datos = getJugadorServicio();
    while ($fila = mysqli_fetch_assoc($datos)){
        $jugadorServicio = $fila['jugador'];
    }
    return $jugadorServicio;
}
function jugadorResto () {
    $jugadorResto = '';
    $datos = getJugadorResto();
    while ($fila = mysqli_fetch_assoc($datos)){
        $jugadorResto = $fila['jugador'];
    }
    return $jugadorResto;
}
?>

