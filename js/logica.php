<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marcador</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="shortcut icon" href="logoApp.png" type="image/x-icon">
    <link rel="stylesheet" href="/css/style.css">
</head>

<body>

    <h2 style="background-color: black;">IDpartido<span>FECHA</span></h2>
    <h3 style="background-color: black;">
        <?php  ?>
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
    <h3 style="background-color: black;">Jugador 2</h3>
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
                <th style="background-color: black;">JugadorA</th>
                <td id="juegosA">0</td>
            </tr>
            <tr id="marcadorJuegosB">
                <th style="background-color: black;">JugadorB</th>
                <td id="juegosB">0</td>
            </tr>
        </table>
    </main>
    <h4>Sets</h4>
    <div id="sets">
        <div id="setsA">0</div>
        <div id="setsB">0</div>
    </div>

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
    

    <script type="module" src="/js/Jugador.js"></script>
    <script type="module" src="/js/marcador.js"></script>
</body>

</html>