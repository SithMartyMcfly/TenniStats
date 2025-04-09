
<?php
require '../conexionBBDD/conexion.php';


mysqli_select_db($conexion, 'TenniStats');

function cerrarConexion ($conexion){
    mysqli_close($conexion);
}

function getDatosPartidos() {
    //hacemos conexión una variable global
    global $conexion;
    $consulta = "SELECT id_partido, lugar, fecha, categoria
    FROM partidos
    WHERE id_partido = (SELECT MAX(id_partido) 
                        FROM partidos)
    ";

    $resultado = mysqli_query($conexion, $consulta);

    if (mysqli_num_rows($resultado)>0){
        return $resultado;
    } else {
        echo 'No hay datos';
    }

    cerrarConexion($conexion); 
}

function getJugadorServicio (){
    global $conexion;
    $consulta = $consulta = "SELECT CONCAT (apellidos, ', ' ,nombre) AS jugador
                            FROM jugadores
                            WHERE ficha_federativa = (SELECT ficha_jugador1 
                                                    FROM partidos 
                                                    WHERE id_partido = (SELECT MAX(id_partido) 
                                                    FROM partidos))
                            ";

    $resultado = mysqli_query($conexion, $consulta);

    if (mysqli_num_rows($resultado)>0){
        return $resultado;
    } else {
        echo 'No hay datos';
    }

    cerrarConexion($conexion); 
}

function getJugadorResto(){
    global $conexion;
    $consulta = "SELECT CONCAT (apellidos, ', ' ,nombre) AS jugador
                FROM jugadores
                WHERE ficha_federativa = (SELECT ficha_jugador2 
						                FROM partidos 
                                        WHERE id_partido = (SELECT MAX(id_partido) 
										FROM partidos))
    ";

    $resultado = mysqli_query($conexion, $consulta);

    if (mysqli_num_rows($resultado)>0){
        return $resultado;
    } else {
        echo 'No hay datos';
    }

    cerrarConexion($conexion); 
}

function getNumeroSets () {
    global $conexion;

    $consulta = "SELECT numero_sets
                FROM partidos
                WHERE id_partido = (SELECT MAX(id_partido) 
                                    FROM partidos)";
    
    $resultado = mysqli_query($conexion, $consulta);

    if (mysqli_num_rows($resultado)>0){
        return $resultado;
    } else {
        echo 'No hay datos';
    }

    cerrarConexion($conexion); 
}

function getNumeroJuegos () {
    global $conexion;

    $consulta = "SELECT numero_juegos
                FROM partidos
                WHERE id_partido = (SELECT MAX(id_partido)
                                    FROM partidos)";
                                    
                $resultado = mysqli_query($conexion, $consulta);

                if (mysqli_num_rows($resultado)>0){
                    return $resultado;
                } else {
                    echo 'No hay datos';
                }
                                
                cerrarConexion($conexion); 
}
?>