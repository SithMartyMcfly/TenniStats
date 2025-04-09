<?php
error_reporting(0);
session_start();
session_unset();
include '../conexionBBDD/conexion.php';

if(isset($_POST['nickname'])){
    $nickname = $_POST['nickname'];
} else {
    $error = 'no hay nickname';
}


if(isset($_POST['pass'])){
    $pass = $_POST['pass'];
} else {
    $error = 'clave erronea';
}


mysqli_select_db($conexion, 'TenniStats');

$consulta = "SELECT id
            from usuarios
            where nickname = '$nickname'
            and pass = '$pass'";


    $result = mysqli_query($conexion, $consulta);

    if ( mysqli_num_rows($result)==0){
        $error = 'usuario o clave incorrecto';
    } else { 
        $id = mysqli_fetch_assoc($result);
    
     
    $_SESSION['id'] = $id;

        $error = '1';
    }


echo $error;


?>