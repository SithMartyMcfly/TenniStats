<?php
include '../../../conexionBBDD/conexion.php';

mysqli_select_db($conexion, 'TenniStats');

function cerrarConexion($conexion)
{
    mysqli_close($conexion);
}

//stats históricas del jugador
function getStatsHistoricas($id_jugador)
{
    global $conexion;
    $consulta = "SELECT *
                FROM historico_stats
                WHERE ficha_jugador = '$id_jugador' ";

    $resultado = mysqli_query($conexion, $consulta);

    if (mysqli_num_rows($resultado) > 0) {
        return $resultado;
    } else {
        echo 'no hay datos';
    }

    cerrarConexion($conexion);
}

//stats de cada partido
function getStatsPartido($id_jugador, $id_partido)
{
    global $conexion;
    $consulta = "SELECT *
                FROM stats_partidos
                WHERE id_partido = '$id_partido' 
                AND ficha_federativa = '$id_jugador'";
    $resultado = mysqli_query($conexion, $consulta);
    if (mysqli_num_rows($resultado) > 0) {
        return $resultado;
    } else {
        error_log("El partido fue agendado pero no fué jugado");
}
}

//obtener nombre del jugador
function getNombreCompleto($id_jugador)
{
    global $conexion;
    $consulta = "SELECT concat(apellidos, ', ',nombre) as nombreCompleto
                FROM jugadores
                WHERE ficha_federativa = '$id_jugador'";

    $resultado = mysqli_query($conexion, $consulta);

    if (mysqli_num_rows($resultado) > 0) {
        return $resultado;
    } else {
        echo 'no hay datos';
    }

    cerrarConexion($conexion);
}

//obtener partidos de un jugador y rival
function getPartidos($id_jugador)
{
    global $conexion;
    $consulta = "SELECT p.fecha, p.lugar, p.categoria, p.id_partido, tipo_superficie,
                    CASE 
                        WHEN p.ficha_jugador1 = '$id_jugador' THEN CONCAT(j2.apellidos, ', ', j2.nombre)
                        WHEN p.ficha_jugador2 = '$id_jugador' THEN CONCAT(j1.apellidos, ', ', j1.nombre)
                    END AS rival
                FROM partidos p
                JOIN Jugadores j1 ON p.ficha_jugador1 = j1.ficha_federativa
                JOIN Jugadores j2 ON p.ficha_jugador2 = j2.ficha_federativa
                WHERE p.ficha_jugador1 = '$id_jugador' 
                    OR p.ficha_jugador2 = '$id_jugador'
                ORDER BY p.fecha";

    $resultado = mysqli_query($conexion, $consulta);

    if (mysqli_num_rows($resultado) > 0) {
        return $resultado;
    } else {
        echo 'no hay datos';
    }

    cerrarConexion($conexion);
}
