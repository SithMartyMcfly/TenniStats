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
$numeroSets = $_POST['numero_sets'];
$numeroJuegos = $_POST['numero_juegos'];


$insertar =     "INSERT INTO partidos
                (fecha, ficha_jugador1, ficha_jugador2, lugar, tipo_superficie, categoria, tipo_torneo, numero_sets, numero_juegos) 
                VALUES ('$fechaPartido', '$jugadorA', '$jugadorB', '$lugar', '$tipoSuperficie', '$categoria', '$tipoTorneo', '$numeroSets', '$numeroJuegos')
                ";

mysqli_query($conexion, $insertar);
header('Location: ../MVC_partidos/vista.php');
?>

