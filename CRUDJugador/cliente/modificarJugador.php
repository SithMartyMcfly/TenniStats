<?php
include '../../header.php';
include '../../conexionBBDD/conexion.php';

?>
<div class="text-center display-6 py-2">
    Listado de Jugadores
</div>
<?php
mysqli_select_db($conexion, 'TenniStats');
//hacemos la consulta para mostrar datos de jugadores y ejecutamos la consulta
$consultar = "
            SELECT * 
            FROM jugadores
            ORDER BY apellidos
            ";

$registros = mysqli_query($conexion, $consultar);
?>

<div>
    <table class="table table-hover text-center">
        <thead>
            <tr>
                <th>Ficha Federativa</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Fecha Nacimiento</th>
                <th>Categoría</th>
                <th>Peso</th>
                <th>Altura</th>
                <th>Mano</th>
                <th class="text-center">Modificar</th>
            </tr>
        </thead>
        <tbody>
            <?php
            //devolvemos mediante un array asociativo los registros
            while ($registro = mysqli_fetch_assoc($registros)) {
            ?>
                <tr>
                    <td><?php echo $registro['ficha_federativa']; ?></td>
                    <td><?php echo $registro['nombre']; ?></td>
                    <td><?php echo $registro['apellidos']; ?></td>
                    <td><?php echo $registro['fecha_nacimiento']; ?></td>
                    <td><?php echo $registro['categoria']; ?></td>
                    <td><?php echo $registro['peso']; ?></td>
                    <td><?php echo $registro['altura']; ?></td>
                    <td><?php
                switch ($registro['mano']){
                    case 'diestro 1':
                        echo 'Diestro, Una Mano Revés';
                        break;
                    case 'diestro 2':
                        echo 'Diestro, Dos Manos Revés';
                        break;
                    case 'zurdo 1':
                        echo 'Zurdo, Una Mano Revés';
                        break;
                    case 'zurdo 2':
                        echo 'Zurdo, Dos Manos Revés';
                        break;
                }
                ?></td>
                    <td class="text-center"><a href="actualizar.php?id=<?php echo $registro['ficha_federativa'] ?>"><img src="../imagenesCRUD/actualizar.png" alt="iconoModificar" height="30" width="30"></a></td>
                </tr>
            <?php
            };
            ?>
        </tbody>
    </table>
    <div class="col text-center py-4">
        <a href="../../index.php"><img src="../imagenesCRUD/atras.png" alt="back" height="50px" width="50px"></a>
    </div>
</div>
<?php
include '../../footer.php'
?>