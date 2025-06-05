<?php
include '../../../header.php';
include '../../../conexionBBDD/conexion.php';
include 'controladoraStats.php';

//recibimos id que viene del listado de jugadores
if (isset($_GET['id_jugador'])) {
    $id_jugador = $_GET['id_jugador'];
}

mysqli_select_db($conexion, 'TenniStats');
if (isset($_GET['id_partido'])) {
    $id_partido = $_GET['id_partido'];
} else {
    $id_partido = null;
}
?>
<link rel="stylesheet" href="../../../css/jugadorStats.css">

<div class="text-center display-6 py-4">
    <?php //hacemos un if/else con php para mostrar un titulo u otro
    if(!$id_partido) {
    ?>
    Estadísticas Históricas
    <?php } else { ?>
    Estadísticas Partido
    <?php } ?>
</div>
<?php



if($id_partido != null){
    //recogida de datos en variables
    //GENERALES
    $winners = statsPartidos($id_jugador, $id_partido, 'winner');
    $errores = statsPartidos($id_partido, $id_jugador,'errores');
    //SERVICIO
    $aces = statsPartidos($id_jugador, $id_partido, 'aces');
    $doble_falta = statsPartidos($id_jugador, $id_partido, 'doble_falta');
    $puntos_break_afrontados = statsPartidos($id_jugador, $id_partido, 'puntos_break_afrontados');
    $porcentaje_primer_servicio = statsPartidos($id_jugador, $id_partido, 'porcentaje_primer_servicio');
    $porcentaje_primeros_ganados = statsPartidos($id_jugador, $id_partido, 'porcentaje_primeros_ganados');
    $porcentaje_segundos_ganados = statsPartidos($id_jugador, $id_partido, 'porcentaje_segundos_ganados');
    $porcentaje_puntos_servicio_ganados = statsPartidos($id_jugador, $id_partido, 'porcentaje_puntos_servicio_ganados');
    $porcentaje_break_salvados = statsPartidos($id_jugador, $id_partido, 'porcentaje_break_salvados');
    //RESTO
    $puntos_break_jugados = statsPartidos($id_jugador, $id_partido, 'puntos_break_jugados');
    $puntos_break_ganados = statsPartidos($id_jugador, $id_partido, 'puntos_break_ganados');
    $porcentaje_break_ganados = statsPartidos($id_jugador, $id_partido, 'porcentaje_break_ganados');
    
} else {
    //recogida de datos en variables
    //GENERALES
    $numero_partidos_jugados = statsHistoricas('numero_partidos_jugados');
    $numero_partidos_ganados = statsHistoricas('numero_partidos_ganados');
    $winners = statsHistoricas('winners');
    $errores = statsHistoricas('errores');
    //SERVICIO
    $aces = statsHistoricas('aces');
    $doble_falta = statsHistoricas('doble_falta');
    $puntos_break_afrontados = statsHistoricas('puntos_break_afrontados');
    $porcentaje_primer_servicio = statsHistoricas('porcentaje_primer_servicio');
    $porcentaje_primeros_ganados = statsHistoricas('porcentaje_primeros_ganados');
    $porcentaje_segundos_ganados = statsHistoricas('porcentaje_segundos_ganados');
    $porcentaje_puntos_servicio_ganados = statsHistoricas('porcentaje_puntos_servicio_ganados');
    $porcentaje_break_salvados = statsHistoricas('porcentaje_break_salvados');
    //RESTO
    $puntos_break_jugados = statsHistoricas('puntos_break_jugados');
    $puntos_break_ganados = statsHistoricas('puntos_break_ganados');
    $porcentaje_break_ganados = statsHistoricas('porcentaje_break_ganados');
}

?>
<!-- HACER IF ELSE PARA DATOS QUE ESTAN FUERA DE PARTIDO -->
<h1 class="mx-3 mb-4 text-white"><?php echo nombreCompleto($id_jugador); ?></h1>
<main class="d-flex justify-content-around">
    <section class="ml-5">

        <h3 class="mb-3 text-decoration-underline">Generales</h3>
        <!-- devuelvo estas dos etiquetas en caso de estar fuera del
        histórico de partidos -->
        <?php if(!$id_partido): ?>
        <label for="partidosJugados" class="form-label fw-semibold text-success-emphasis bg-white px-3 rounded-pill">Partidos Jugados</label>
        <p id="partidosJugados" class="mb-4 bg-white px-4 rounded-2 fst-italic"><?php echo $numero_partidos_jugados ?></p>
        <label for="partidosGanados" class="form-label fw-semibold text-success-emphasis bg-white px-3 rounded-pill">Partidos Ganados</label>
        <p id="partidosGanados" class="mb-4 bg-white px-4 rounded-2 fst-italic"><?php echo $numero_partidos_ganados ?></p>
        <?php endif;?>
        <label for="winners" class="form-label fw-semibold text-success-emphasis bg-white px-3 rounded-pill">Winners</label>
        <p id="winners" class="mb-4 bg-white px-4 rounded-2 fst-italic"><?php echo $winners ?></p>
        <label for="errores" class="form-label fw-semibold text-success-emphasis bg-white px-3 rounded-pill">Errores</label>
        <p id="errores" class="mb-4 bg-white px-4 rounded-2 fst-italic"><?php echo $errores ?></p>

    </section>
    <section class="ml-5">
        <h3 class="mb-3 text-decoration-underline">Servicio</h3>
        <label for="aces" class="form-label fw-semibold text-success-emphasis bg-white px-3 rounded-pill">Aces</label>
        <p id="aces" class="mb-4 bg-white px-4 rounded-2 fst-italic"><?php echo $aces; ?></p>
        <label for="dobleFalta" class="form-label fw-semibold text-success-emphasis bg-white px-3 rounded-pill">Doble Falta</label>
        <p id="dobleFalta" class="mb-4 bg-white px-4 rounded-2 fst-italic"><?php echo $doble_falta ?></p>
        <label for="porcentajePrimerServicio" class="form-label fw-semibold text-success-emphasis bg-white px-3 rounded-pill">Porcentaje Primer Servicio</label>
        <p id="porcentajePrimerServicio" class="mb-4 bg-white px-4 rounded-2 fst-italic"><?php echo $porcentaje_primer_servicio . '%' ?></p>
        <label for="porcentajePrimerosGanados" class="form-label fw-semibold text-success-emphasis bg-white px-3 rounded-pill">Porcentaje Primeros Ganados</label>
        <p id="porcentajePrimerosGanados" class="mb-4 bg-white px-4 rounded-2 fst-italic"><?php echo $porcentaje_primeros_ganados . '%' ?></p>
        <label for="porcentajeSegundosGanados" class="form-label fw-semibold text-success-emphasis bg-white px-3 rounded-pill">Porcentaje Segundos Ganados</label>
        <p id="porcentajeSegundosGanados" class="mb-4 bg-white px-4 rounded-2 fst-italic"><?php echo $porcentaje_segundos_ganados . '%' ?></p>
        <label for="porcentajePuntoServioGanados" class="form-label fw-semibold text-success-emphasis bg-white px-3 rounded-pill">Porcentaje Puntos Servicio Ganados</label>
        <p id="porcentajePuntoServioGanados" class="mb-4 bg-white px-4 rounded-2 fst-italic"><?php echo $porcentaje_puntos_servicio_ganados . '%' ?></p>
        <label for="puntosBreakAfrontados" class="form-label fw-semibold text-success-emphasis bg-white px-3 rounded-pill">Puntos Break Afrontados</label>
        <p id="puntosBreakAfrontados" class="mb-4 bg-white px-4 rounded-2 fst-italic"><?php echo $puntos_break_afrontados ?></p>
        <label for="porcentajeBreakSalvados" class="form-label fw-semibold text-success-emphasis bg-white px-3 rounded-pill">Porcentaje Breaks Salvados</label>
        <p id="porcentajeBreakSalvados" class="mb-4 bg-white px-4 rounded-2 fst-italic"><?php echo $porcentaje_break_salvados . '%' ?></p>
    </section>
    <section class="ml-5">
        <h3 class="mb-3 text-decoration-underline">Resto</h3>
        <label for="porcentajeBreakGanados" class="form-label fw-semibold text-success-emphasis bg-white px-3 rounded-pill">Porcentaje Breaks Ganados</label>
        <p id="porcentajeBreakGanados" class="mb-4 bg-white px-4 rounded-2 fst-italic"><?php echo $porcentaje_break_ganados . '%' ?></p>
        <label for="puntosBreakJugados" class="form-label fw-semibold text-success-emphasis bg-white px-3 rounded-pill">Puntos Break Jugados</label>
        <p id="puntosBreakJugados" class="mb-4 bg-white px-4 rounded-2 fst-italic"><?php echo $puntos_break_jugados ?></p>
        <label for="puntosBreakGanados" class="form-label fw-semibold text-success-emphasis bg-white px-3 rounded-pill">Puntos Break Ganados</label>
        <p id="puntosBreakGanados" class="mb-4 bg-white px-4 rounded-2 fst-italic"><?php echo $puntos_break_ganados ?></p>
    </section>
    <aside>
        <?php echo datosPartido($id_partido)?>
    <script>
        function verEstadisticasPartido (id_partido) {
            window.location.href="?id_partido="+id_partido+"&id_jugador="+ "<?php echo $id_jugador; ?>"
        }
    </script>
    </aside>

</main>
<div class="col text-center py-4">
            <a href="../verJugadores.php"><img src="../../imagenesCRUD/atras.png" alt="back" height="50px" width="50px"></a>
        </div>
<?php
include '../../../footer.php';
?>