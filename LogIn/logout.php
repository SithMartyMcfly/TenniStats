<?php

session_start();

session_unset();
$url = 'http://'.$_SERVER['HTTP_HOST'].'/cursoOpenWebinars/ProyectoFinalCiclo/LogIn/log.php';

header('Location: '.$url);

?>