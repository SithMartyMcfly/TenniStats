<?php
session_start();
if (!isset($_SESSION['id']) || ($_SESSION['id']) == '') {
    $url = 'http://' . $_SERVER['HTTP_HOST'] . '/cursoOpenWebinars/ProyectoFinalCiclo/LogIn/log.php';
    header('Location:' . $url);
}

include '../conexionBBDD/conexion.php';
include 'controlador.php';


mysqli_select_db($conexion, 'TenniStats');

$idPartido = idPartido();

$consulta = "SELECT id_partido
            from stats_partidos
            where id_partido = $idPartido";

$resultado = mysqli_query($conexion, $consulta);

if (mysqli_num_rows($resultado) > 0) {
    //header('Location: '.'http://'.$_SERVER['HTTP_HOST'].'/cursoOpenWebinars/ProyectoFinalCiclo/crearPartido/crearPartido.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marcador</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="shortcut icon" href="../../logoApp.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/partido.css">
</head>

<body>
    <div style='float:right; margin-top:-1%; margin-right:1%'><button class="btn btn-dark" onclick="document.location= '/cursoOpenWebinars/ProyectoFinalCiclo/LogIn/logout.php'">LogOut</button></div>
    <h2 class="text-center my-5"><?php echo tituloPartido(); ?></h2>
    <h3 id="jugadorServicio"><?php echo jugadorServicio() ?>
    </h3>
    <div class="contenedorPuntuacion">
        <div class="servicio"></div>
        <div class="container bg-success">
            <p id="marcadorA">0</p>
        </div>
        <aside class="botones-servicio">
            <button type="button" class="btn btn-primary btn-servicio" id="primerServicioA">Primer servicio</button>
            <button type="button" class="btn btn-secondary btn-servicio" id="segundoServicioA">Segundo servicio</button>
        </aside>
    </div>
    <h3 id="jugadoResto"><?php echo jugadorResto(); ?></h3>
    <div class="contenedorPuntuacion">
        <div class="servicio"></div>
        <div class="container bg-success">
            <p id="marcadorB">0</p>
        </div>
        <aside class="botones-serviciob">
            <button type="button" class="btn btn-primary btn-serviciob" id="primerServicioB">Primer servicio</button>
            <button type="button" class="btn btn-secondary btn-serviciob" id="segundoServicioB">Segundo servicio</button>
        </aside>
    </div>

    <h4>Juegos</h4>
    <main>
        <table id="juegos">
            <tr id="marcadorJuegosA">
                <th class="text-secondary-emphasis"><?php echo jugadorServicio() ?></th>
                <td id="juegosA">0</td>
            </tr>
            <tr id="marcadorJuegosB">
                <th class="text-secondary-emphasis"><?php echo jugadorResto(); ?></th>
                <td id="juegosB">0</td>
            </tr>
        </table>
        <h4>Sets</h4>
        <div id="sets">
            <div id="setsA">0</div>
            <div id="setsB">0</div>
        </div>
    </main>
    </div>
    <!--Modales para interactuar como se ha producido el punto-->
    <section class="modal-finPunto">
        <div class="modal-container">
            <h3 class="modal-titulo">¿Como ganó el punto?</h3>
            <button type="button" class="btn btn-primary ace">Ace</button>
            <button type="button" class="btn btn-danger df">Doble Falta</button>
            <button type="button" class="btn btn-success winner">Winner</button>
            <button type="button" class="btn btn-warning error">Error</button>
        </div>
    </section>
    <section class="modal-finPuntob">
        <div class="modal-containerb">
            <h3 class="modal-titulob">¿Como ganó el punto?</h3>
            <button type="button" class="btn btn-primary aceb btnb">Ace</button>
            <button type="button" class="btn btn-danger dfb btnb">Doble Falta</button>
            <button type="button" class="btn btn-success winnerb btnb">Winner</button>
            <button type="button" class="btn btn-warning errorb btnb">Error</button>
        </div>
    </section>

    <script>
        /*aprovechando el modelo vista controlador, pasamos dinámincamente el número de sets
        a la lógica de nuestra aplicación*/
        let numeroSets = <?php echo numeroSets(); ?>,
            numeroJuegos = <?php echo numeroJuegos() ?>
    </script>
    <script type="module" src="../js/Jugador.js"></script>
    <script type="module" src="../js/marcador.js"></script>
    <script>
        window.addEventListener("keypress", function(event) {
            if (event.keyCode == 13) {
                event.preventDefault();
            }
        }, false);
    </script>

</body>

</html>