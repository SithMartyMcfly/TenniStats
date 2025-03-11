<?php
include '../../header.php';
include '../../conexionBBDD/conexion.php';

//selecciono la bbdd
mysqli_select_db($conexion, 'TenniStats');

//verifico que se haya enviado la id
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    //realizo la consulta
    $consulta = "
            SELECT *
            FROM jugadores
            WHERE ficha_federativa = '$id'
                ";
    //ejecuto la query
    $registros = mysqli_query($conexion, $consulta);
    while($registro = mysqli_fetch_assoc($registros)){
?>
<div class="card-header display-4 bg-light p-2 mx-4 text-center">
    Actualizar Jugador
</div>
<div class="d-flex justify-content-center">

    <div class="col-md-4">
        <div class="d-flex  mt-4 justify-content-center">
    <!--pasamos por el action, la id que hemos recogido, para decir donde tenemos que hacer la modificación-->
            <form action="actualizar1.php?idmodificar=<?php echo $id ?>" class="p-4" method="POST">
                <div class="mb-3">
                    <label for="" class="form-label fw-semibold text-success-emphasis">Ficha Federativa</label>
                    <input type="texto" class="form-control" name="fichaFederativa" id="fichaFederativa" required value="<?php echo $registro['ficha_federativa'] ?>"/>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label fw-semibold text-success-emphasis">Nombre</label>
                    <input type="texto" class="form-control" name="nombre" id="nombre" required value="<?php echo $registro['nombre'] ?>"/>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label fw-semibold text-success-emphasis">Apellidos</label>
                    <input type="texto" class="form-control" name="apellidos" id="apellidos" required value="<?php echo $registro['apellidos'] ?>"/>
                </div>
                <div class="mb-5">
                    <label for="" class="form-label fw-semibold text-success-emphasis">Fecha Nacimiento</label>
                    <input type="date" class="form-control" name="fechaNacimiento" id="fechaNacimiento" required value="<?php echo $registro['fecha_nacimiento'] ?>"/>

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
                    <input type="number" class="form-control" name="peso" id="peso" step="0.01" required value="<?php echo $registro['peso'] ?>"/>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Altura</label>
                    <input type="number" class="form-control" name="altura" id="altura" step="0.01" required value="<?php echo $registro['altura'] ?>"/>
                </div>
                <div class="d-grid">
                    <input type="submit" value="Actualizar" class="btn btn-primary">
                </div>
            </form>
        </div>
        <div class="col text-center py-4">
            <a href="../index.php"><img src="../imagenesCRUD/atras.png" alt="back" height="50px" width="50px"></a>
        </div>
    </div>
</div>
<?php
    }
} else {
    echo 'no se ha enviado ninguna id';
}
//mysqli_select_db($conexion, 'TenniStats');


?>
<?php
include '../../footer.php';
?>