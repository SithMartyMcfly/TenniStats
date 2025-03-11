<?php
//se incluye el archivo que nos dará conexión
include '../../conexionBBDD/conexion.php';

//compruebo que ha llegado la id y le asigno un nombre a la variable
if (isset($_GET['idmodificar'])){
    $idmodificar = $_GET['idmodificar'];
} else {
    echo 'no ha llegado ninguna id';
}

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
$mano = $_POST['mano'];



//sentencia sql
$actualizar = "
    UPDATE jugadores
    SET 
        ficha_federativa='$fichaFederativa', 
        nombre='$nombre', 
        apellidos='$apellidos', 
        fecha_nacimiento='$fechaNacimiento', 
        categoria='$categoria', 
        peso='$peso', 
        altura='$altura',
        mano = '$mano'
    WHERE ficha_federativa='$idmodificar'
";


//llamamos al metodo que inserta
mysqli_query($conexion, $actualizar);
header('Location:confirm_status/actualizar_ok.php');
//mysqli_close($conexion);



?>