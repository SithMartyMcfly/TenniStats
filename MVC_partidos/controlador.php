<?php
include 'modelo.php';

function idPartido (){
    $id = '';
    $datos = getDatosPartidos();
    while($fila = mysqli_fetch_assoc($datos)){
        $id = $fila['id_partido'];
    }
    return $id;
}

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

function numeroSets (){
    $numeroSets = '';
    $datos = getNumeroSets();
    while($fila = mysqli_fetch_assoc($datos)){
        $numeroSets = $fila ['numero_sets'];
    }
    return $numeroSets;
}

function numeroJuegos (){
    $juegos= '';
    $datos = getNumeroJuegos();
    while ($fila = mysqli_fetch_assoc($datos)){
        $juegos = $fila ['numero_juegos'];
    }
    return $juegos;
}
?>

