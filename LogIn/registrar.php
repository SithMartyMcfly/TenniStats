<?php
include '../conexionBBDD/conexion.php';
var_dump($_POST);

mysqli_select_db($conexion, 'TenniStats');

$nickname = $_POST['nickname'];
$pass = $_POST['pass'];
$mail = $_POST['mail'];

if (empty($nickname) || empty($pass) || empty($mail)){
    echo 'Ningún campo puede estar vacío';
} else {
$insertar = "INSERT INTO usuarios
            (nickname, pass, email)
            VALUES ('$nickname', '$pass', '$mail')
            ";
}


            mysqli_query($conexion, $insertar);
header('Location: log.php');

?>