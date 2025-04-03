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
