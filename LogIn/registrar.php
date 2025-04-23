<?php
include '../conexionBBDD/conexion.php';

mysqli_select_db($conexion, 'TenniStats');

$nickname = $_POST['nickname'];
$pass = $_POST['pass'];
$mail = $_POST['mail'];

$insertar = "INSERT INTO usuarios "


?>