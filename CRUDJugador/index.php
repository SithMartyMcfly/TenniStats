<?php
include 'header.php';
?>

<div class="col text-center">
    <div class="card-header display-4 bg-light p-2">
        Acciones para gestionar
    </div>
</div>

    <div class="table-responsive p-4">
        <table class="table table-success">
            <thead>
                <tr>
                    <th class="px-4 text-secondary">Crear Jugador</th>
                    <th class="px-4 text-secondary">Modificar Jugador</th>
                    <th class="px-4 text-secondary">Ver Jugadores</th>
                    <th class="px-4 text-secondary">Borrar Jugador</th>
                </tr>
            <tbody>
                <tr>
                    <td class="px-4"><a href="cliente/crearJugador.php"><img src="imagenesCRUD/crear.png" alt="imagenCrear" height="150" width="100"></a></td>
                    <td class="px-4"><a href="cliente/modificarJugador.php"><img src="imagenesCRUD/modificar.png" alt="imagenModificar" height="150" width="100"></a></td>
                    <td class="px-4"><a href="cliente/verJugadores.php"><img src="imagenesCRUD/listar.png" alt="imagenListar" height="150" width="115"></a></td>
                    <td class="px-4"><a href="cliente/borrarJugador.php"><img src="imagenesCRUD/eliminar.png" alt="imagenBorrar" height="150" width="110"></a></td>
                </tr>
            </tbody>
            </thead>
        </table>

    </div>

<?php
include 'footer.php';
?>