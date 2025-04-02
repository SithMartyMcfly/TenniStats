<?php
include '../../../conexionBBDD/conexion.php';

mysqli_connect($conexion, 'TenniStats');

function closeConexion ($conexion) {
    mysqli_close($conexion);
}

function getStatsHistoricas ($id) {
    global $conexion;
    $consulta = "SELECT *
                FROM historico_stats
                WHERE ficha_jugador = $id";

    $resultado = mysqli_query($conexion, $consulta);

    if (mysqli_num_rows($resultado)>0) {
        return $resultado;
    } else {
        echo 'no hay datos';
    }

    cerrarConexion($conexion);
}
?>