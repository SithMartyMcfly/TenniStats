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
                    <td class="px-4"><a href="CRUDJugador/cliente/crearJugador.php"><img src="CRUDJugador/imagenesCRUD/crear.png" alt="imagenCrear" height="150" width="100"></a></td>
                    <td class="px-4"><a href="CRUDJugador/cliente/modificarJugador.php"><img src="CRUDJugador/imagenesCRUD/modificar.png" alt="imagenModificar" height="150" width="100"></a></td>
                    <td class="px-4"><a href="CRUDJugador/cliente/verJugadores.php"><img src="CRUDJugador/imagenesCRUD/listar.png" alt="imagenListar" height="150" width="115"></a></td>
                    <td class="px-4"><a href="CRUDJugador/cliente/borrarJugador.php"><img src="CRUDJugador/imagenesCRUD/eliminar.png" alt="imagenBorrar" height="150" width="110"></a></td>
                </tr>
            </tbody>
            </thead>
        </table>
    </div>
    <div class="col text-center">
        <p class="text-secondary bg-white fw-bolder">Jugar Partido</p>
        <a class="icon-link icon-link-hover" href="CRUDJugador/opcionesPartido"><img class="bg-white m-3 p-1 rounded-3" src="CRUDJugador/imagenesCRUD/corte.png" alt="inicioPartido" height="150" width="150"></a>
        
    </div>

<?php
include 'footer.php';
?>