<?php
include '../../../conexionBBDD/conexion.php';
include '../statsPaginas/modeloStats.php';

if (isset($_GET['id'])){
    $id = $_GET['id'];
}

function statsHistoricas () {
    global $id;
    $statsHistoricas = '';
    $datos = getStatsHistoricas($id);
    while ($fila = mysqli_fetch_assoc($datos)) {
        $statsHistoricas .= $fila['aces']; 
    }
}

?>

