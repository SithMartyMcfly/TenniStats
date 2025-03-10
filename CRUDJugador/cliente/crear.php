<?php
//se incluye el archivo que nos dará conexión
include 'conexion.php';

//seleccionar bbdd
mysqli_select_db($conexion, 'TenniStats');


//variables que va a recibir el script para insertarlo en la bbdd
$fichaFederativa = $_POST['fichaFederativa'];
$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$fechaNacimiento = $_POST['fechaNacimiento'];
$categoria = $_POST['categoria'];
$peso = $_POST['peso'];
$altura = $_POST['altura'];


//sentencia sql
$insertar = "
    INSERT INTO jugadores
    (ficha_federativa, nombre, apellidos, fecha_nacimiento, categoria, peso, altura)
    VALUES ('$fichaFederativa', '$nombre', '$apellidos', '$fechaNacimiento', '$categoria', $peso, $altura)
";


//llamamos al metodo que inserta
mysqli_query($conexion, $insertar);
header('Location:confirm_status/crear_ok.php');
//mysqli_close($conexion);



?>
