<?php
include '../header.php';
include '../conexionBBDD/conexion.php';
?>
<div class="card-header display-4 bg-light p-2 mx-4 text-center">
    Crear Partido
</div>
<div class="d-flex justify-content-center">

    <div class="col-md-4">
        <div class="d-flex  mt-4 justify-content-center">
            <form action="confirmarPartido.php" class="p-4" method="POST">
                <div class="mb-5">
                    <label for="" class="form-label fw-semibold text-success-emphasis">Fecha Partido</label>
                    <input type="date" class="form-control" name="fechaPartido" id="fechaPartido" required />
                </div>
                <div class="mb-3 d-flex row text-center">
                    <label for="" class="form-label fw-bold text-success-emphasis">Selecciona Jugador</label>
                    <cite class="text-warning">que inicia al servicio</cite>
                    <select name="jugadorA" required>
                        <?php
                        mysqli_select_db($conexion, 'TenniStats');
                        $consulta =    "SELECT ficha_federativa, CONCAT(ficha_federativa, ' - ' ,apellidos, ', ' ,nombre) as datosJugadorA
                                        FROM jugadores
                                        ORDER BY apellidos 
                                        ";

                        $resultado = mysqli_query($conexion, $consulta);
                        while ($jugadores = mysqli_fetch_assoc($resultado)) {
                        ?>
                            <option value="<?php echo $jugadores['ficha_federativa']; ?>"><?php echo $jugadores['datosJugadorA'] ?></option>
                        <?php
                        };
                        ?>

                    </select>
                </div>
                <div class="mb-3 d-flex row text-center">
                    <label for="" class="form-label fw-bold text-success-emphasis">Selecciona Jugador</label>
                    <cite class="text-warning">que inicia al resto</cite>
                    <select name="jugadorB" required>
                        <?php
                        mysqli_select_db($conexion, 'TenniStats');
                        $consulta =    "SELECT ficha_federativa, CONCAT(ficha_federativa, ' - ' ,apellidos, ', ' ,nombre) as datosJugadorB
                                        FROM jugadores
                                        ORDER BY apellidos 
                                        ";

                        $resultado = mysqli_query($conexion, $consulta);
                        while ($jugadores = mysqli_fetch_assoc($resultado)) {
                        ?>
                            <option value="<?php echo $jugadores['ficha_federativa']; ?>"><?php echo $jugadores['datosJugadorB'] ?></option>
                        <?php
                        };
                        ?>

                    </select>
                </div>
                

                <div class="mb-3">
                    <label for="" class="form-label fw-semibold text-success-emphasis">Club</label>
                    <input type="texto" class="form-control" name="lugar" id="lugar" required />
                </div>
                <div class="mb-3">
                    <label for="" class="form-label fw-semibold text-success-emphasis">Tipo Superficie</label>
                    <input type="texto" class="form-control" name="tipo_superficie" id="tipo_superficie" required />
                </div>
                <div class="mb-3">
                    <label for="" class="form-label fw-semibold text-success-emphasis">Categoría</label>
                    <select name="categoria">
                        <option value="BENJAMIN">Benjamín</option>
                        <option value="ALEVIN" selected>Alevín</option>
                        <option value="INFANTIL">Infantil</option>
                        <option value="CADETE">Cadete</option>
                        <option value="ABSOLUTO">Absoluto</option>
                        <option value="SENIOR++">Senior +35</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Tipo de Torneo</label>
                    <input type="text" class="form-control" name="tipo_torneo" id="tipo_torneo" required />
                </div>

                <div class="d-grid">
                    <input type="submit" value="Crear Partido" class="btn btn-primary">
                </div>
                
            </form>
        </div>
        <div class="col text-center py-4">
            <a href="../index.php"><img src="../CRUDJugador/imagenesCRUD/atras.png" alt="back" height="50px" width="50px"></a>
        </div>
    </div>
</div>

<?php
include '../footer.php';
?>