<?php
session_start();
if (!isset($_SESSION['id_user']) || ($_SESSION['id_user'])==''){
    $url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'].'LogIn/log.php';
    header('Location:'.$url);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestor de Jugadores</title>
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
    <link rel="stylesheet" href="../ProyectoFinalCiclo/css/principal.css">
</head>
<body>
    
    <header class="card-header bg-success display-2 col text-center p-2">
        TenniStats
        <div class="float-end">
            <button class="btn btn-dark" onclick="document.location= '/cursoOpenWebinars/ProyectoFinalCiclo/LogIn/logout.php'">LogOut</button>
        </div>
    </header>
    <main class="bg-success">
        