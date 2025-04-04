<?php
include '../../../conexionBBDD/conexion.php';

mysqli_select_db($conexion, 'TenniStats');

function closeConexion($conexion)
{
    mysqli_close($conexion);
}

function getStatsHistoricas($id)
{
    global $conexion;
    $consulta = "SELECT *
                FROM historico_stats
                WHERE ficha_jugador = '$id' ";

    $resultado = mysqli_query($conexion, $consulta);

    if (mysqli_num_rows($resultado) > 0) {
        return $resultado;
    } else {
        echo 'no hay datos';
    }

    cerrarConexion($conexion);
}

function getNombreCompleto($id)
{
    global $conexion;
    $consulta = "SELECT concat(apellidos, ', ',nombre) as nombreCompleto
                FROM jugadores
                WHERE ficha_federativa = '$id'";

    $resultado = mysqli_query($conexion, $consulta);

    if (mysqli_num_rows($resultado) > 0) {
        return $resultado;
    } else {
        echo 'no hay datos';
    }

    cerrarConexion($conexion);
}

function getPartidos ($id) {
    global $conexion;
    $consulta = "SELECT p.fecha, p.lugar, p.categoria,
                    CASE 
                        WHEN p.ficha_jugador1 = '$id' THEN CONCAT(j2.apellidos, ', ', j2.nombre)
                        WHEN p.ficha_jugador2 = '$id' THEN CONCAT(j1.apellidos, ', ', j1.nombre)
                    END AS rival
                FROM partidos p
                JOIN Jugadores j1 ON p.ficha_jugador1 = j1.ficha_federativa
                JOIN Jugadores j2 ON p.ficha_jugador2 = j2.ficha_federativa
                WHERE p.ficha_jugador1 = '$id' 
                    OR p.ficha_jugador2 = '$id'
                ORDER BY p.fecha";

    $resultado = mysqli_query($conexion, $consulta);

    if (mysqli_num_rows($resultado) > 0) {
        return $resultado;
    } else {
        echo 'no hay datos';
    }

    cerrarConexion($conexion);
}
