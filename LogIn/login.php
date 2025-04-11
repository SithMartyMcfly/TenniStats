<?php
error_reporting(0);
session_start();
session_unset();
include '../conexionBBDD/conexion.php';

mysqli_select_db($conexion, 'TenniStats');

if(isset($_POST['nickname'])){
    $nickname = $_POST['nickname'];
} 

if (empty($_POST['nickname'])){
    echo 'Debes introducir un usuario';
    exit;
}

if(isset($_POST['pass'])){
  $pass = $_POST['pass'];
}


/*usuario no registrado, hacemos consulta a la bbdd
para saber si el nick que se ha introducido existe*/
$consultaNickname = "SELECT nickname
                    FROM usuarios
                    WHERE nickname = '$nickname'";

$resultNick = mysqli_query($conexion, $consultaNickname);

if (mysqli_num_rows($resultNick)<=0){
    echo 'Usuario no registrado';
    exit;
}


/*en caso de no encontrar una id en la bbdd que coincida
con el nick y el pass introducidos dara un error de contraseña*/
$consulta = "SELECT id
            from usuarios
            where nickname = '$nickname'
            and pass = '$pass'";


    $result = mysqli_query($conexion, $consulta);

    if ( mysqli_num_rows($result)<=0){
        echo 'Contraseña Incorrecta';
        /*en caso de encontrar un id coincidente con los datos
        procederá a iniciar la sesión*/
    } else { 
        $id = mysqli_fetch_assoc($result);
    
     
    $_SESSION['id'] = $id;

        echo 'ok';
    }

    /*usando la ruptura del flujo con exit nos aseguramos, que en caso
    de no encontrar el usuario, nos dé el error con el usuario y no devuelva
    el error de contraseña*/

?>