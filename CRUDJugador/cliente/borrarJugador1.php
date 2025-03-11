<?php
include 'conexion.php';

if(isset($_GET['id'])){
    $borrarJugador = $_GET['id'];
} else {
    echo 'Ficha federativa no encontrada';
}

mysqli_select_db($conexion, 'TenniStats');

$borrar =   "
            DELETE FROM jugadores
            WHERE ficha_federativa = '$borrarJugador'
            ";

mysqli_query($conexion, $borrar);

header('Location:confirm_status/borrar_ok.php');
?>