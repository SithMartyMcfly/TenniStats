<?php
include '../conexionBBDD/conexion.php';

mysqli_select_db($conexion, 'TenniStats');
var_dump($_POST);
$fechaPartido = $_POST['fechaPartido'];
$jugadorA = $_POST['jugadorA']; //esto es la id del jugadorA
$jugadorB = $_POST['jugadorB']; //esto es la id del jugadorB
$lugar = $_POST['lugar'];
$tipoSuperficie = $_POST['tipo_superficie'];
$categoria = $_POST['categoria'];
$tipoTorneo = $_POST['tipo_torneo'];


$insertar =     "INSERT INTO partidos
                (fecha, jugador_servicio, jugador_resto, lugar, tipo_superficie, categoria, tipo_torneo) 
                VALUES ('$fechaPartido', '$jugadorA', '$jugadorB', '$lugar', '$tipoSuperficie', '$categoria', '$tipoTorneo')
                ";

mysqli_query($conexion, $insertar);
header('Location: ../partidos/MVC_partidos/vista.php');
?>

