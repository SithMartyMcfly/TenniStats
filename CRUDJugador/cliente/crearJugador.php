<?php
include '../../header.php';
?>
<div class="card-header display-4 bg-light p-2 mx-4 text-center">
    Crear Jugador
</div>
<div class="d-flex justify-content-center">

    <div class="col-md-4">
        <div class="d-flex  mt-4 justify-content-center">
            <form action="crear.php" class="p-4" method="POST">
                <div class="mb-3">
                    <label for="" class="form-label fw-semibold text-success-emphasis">Ficha Federativa</label>
                    <input type="texto" class="form-control" name="fichaFederativa" id="fichaFederativa" required />
                </div>
                <div class="mb-3">
                    <label for="" class="form-label fw-semibold text-success-emphasis">Nombre</label>
                    <input type="texto" class="form-control" name="nombre" id="nombre" required />
                </div>
                <div class="mb-3">
                    <label for="" class="form-label fw-semibold text-success-emphasis">Apellidos</label>
                    <input type="texto" class="form-control" name="apellidos" id="apellidos" required />
                </div>
                <div class="mb-5">
                    <label for="" class="form-label fw-semibold text-success-emphasis">Fecha Nacimiento</label>
                    <input type="date" class="form-control" name="fechaNacimiento" id="fechaNacimiento" required />
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
                    <label for="" class="form-label">Peso</label>
                    <input type="number" class="form-control" name="peso" id="peso" step="0.05" min="0" required />
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Altura</label>
                    <input type="number" class="form-control" name="altura" id="altura" step="0.01" min="0" required />
                </div>
                <div class="mb-3">
                    <label for="" class="form-label fw-semibold text-success-emphasis">Mano</label>
                    <select name="mano">
                        <option value="diestro 1">Diestro, Una Mano Revés</option>
                        <option value="diestro 2" selected>Diestro, Dos Manos Revés</option>
                        <option value="zurdo 2">Zurdo, Dos Manos Revés</option>
                        <option value="zurdo 1">Zurdo, Una Mano Revés</option>
                    </select>
                </div>
                <div class="d-grid">
                    <input type="submit" value="Dar de Alta" class="btn btn-primary">
                </div>
            </form>
        </div>
        <div class="col text-center py-4">
            <a href="../../index.php"><img src="../imagenesCRUD/atras.png" alt="back" height="50px" width="50px"></a>
        </div>
    </div>
</div>
<?php
include '../../footer.php';
?>