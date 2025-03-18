<?php
include '../header.php';
include '../conexionBBDD/conexion.php';

//datos del formulario
$fechaPartido = $_POST['fechaPartido'];
$jugadorA = $_POST['jugadorA'];
$jugadorB = $_POST['jugadorB'];
$lugar = $_POST['lugar'];
$tipoSuperficie = $_POST['tipo_superficie'];
$categoria = $_POST['categoria'];
$tipoTorneo = $_POST['tipo_torneo'];
$numeroSets = $_POST['numero_sets'];
$numeroJuegos = $_POST['numero_juegos'];

//recupero los datos de los jugadores

mysqli_select_db($conexion, 'TenniStats');

?>
<link rel="stylesheet" href="style.css"></link>

<div class="card-header display-4 bg-light p-2 mx-4 text-center">
    ¿Confirma los datos del partido?
</div>
<!--pasamos por un formulario oculto los datos en caso de confirmar-->
<form action="crearPartido1.php" method="POST">
    <input type="hidden" name="fechaPartido" value="<?php echo $fechaPartido; ?>">
    <input type="hidden" name="jugadorA" value="<?php echo $jugadorA; ?>">
    <input type="hidden" name="jugadorB" value="<?php echo $jugadorB; ?>">
    <input type="hidden" name="lugar" value="<?php echo $lugar; ?>">
    <input type="hidden" name="tipo_superficie" value="<?php echo $tipoSuperficie; ?>">
    <input type="hidden" name="categoria" value="<?php echo $categoria; ?>">
    <input type="hidden" name="tipo_torneo" value="<?php echo $tipoTorneo; ?>">
    <input type="hidden" name="numero_sets" value="<?php echo $numeroSets; ?>">
    <input type="hidden" name="numero_juegos" value="<?php echo $numeroJuegos; ?>">

    <div id="confirmación" class="d-flex col mt-4 justify-content-center py-2 bg-light">
        <button class="btn btn-primary me-2" type="submit">Confirmar</button>
        <a href="crearPartido.php" class="btn btn-danger ms-2">Cancelar</a>
    </div>
</form>
<main class="text-center">
    <div class="d-flex row mt-4 justify-content-center">
        <label for="" class="fw-bolder">Fecha partido</label>
        <p><?php echo $fechaPartido ?></p>

    </div>

    <div id="partido">
        <div class="px-2">
            <label for="" class="text-light fw-medium">Jugador al Servicio</label>
            <?php
                $consultaServicio = "SELECT CONCAT(ficha_federativa, ' - ', apellidos, ', ' ,nombre) AS jugadorServicio
                                FROM jugadores
                                WHERE ficha_federativa = '$jugadorA'";

                $datosJugadorServicio = mysqli_query($conexion, $consultaServicio);

                while ($jugadorServicio = mysqli_fetch_assoc($datosJugadorServicio)) { ?>
            <p class="text-warning"><?php echo $jugadorServicio['jugadorServicio'] ?></p>
        <?php } ?>
        </div>
        <p class="fw-bolder">VS</p>
        <div class="px-2">
            <label for="" class="text-light fw-medium">Jugador al Resto</label>
            <?php
            $consultaResto = "SELECT CONCAT(ficha_federativa, ' - ', apellidos, ', ' ,nombre) AS jugadorResto
            FROM jugadores
            WHERE ficha_federativa = '$jugadorB'";

            $datosJugadorResto = mysqli_query($conexion, $consultaResto);
            while ($jugadorResto = mysqli_fetch_assoc($datosJugadorResto)) {
            ?>
            <p class="text-warning"><?php echo $jugadorResto['jugadorResto'] ?></p>

            <?php } ?>
        </div>
    </div>
    <div class="d-flex row mt-4 justity-content-center">
        <label for="" class="fw-bolder">Club</label>
        <p><?php echo $lugar ?></p>

    </div>
    <div class="d-flex row mt-4 justity-content-center">
        <label for="" class="fw-bolder">Tipo Superficie</label>
        <p><?php echo $tipoSuperficie ?></p>

    </div>
    <div class="d-flex row mt-4 justity-content-center">
        <label for="" class="fw-bolder">Categoría</label>
        <p><?php echo $categoria ?></p>

    </div>
    <div class="d-flex row mt-4 justity-content-center">
        <label for="" class="fw-bolder">Tipo de Torneo</label>
        <p><?php echo $tipoTorneo ?></p>

    </div>
    <div class="d-flex row mt-4 justity-content-center">
        <label for="" class="fw-bolder">Número de sets</label>
        <p><?php echo $numeroSets ?></p>

    </div>
    <div class="d-flex row mt-4 justity-content-center">
        <label for="" class="fw-bolder">Número de juegos</label>
        <p><?php echo $numeroJuegos ?></p>

    </div>
</main>

<?php
include '../footer.php';
?>