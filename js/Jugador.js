
class Jugador {
    constructor() {
        
        this.Servicio=true; //atributo para controlar quien saca
        this.puntosGanados = 0; //puntos totales que ha ganado el jugador
        this.aces=0; //TODO: puntos directos de servicio
        this.dobleFalta=0; //TODO: cuando el jugador al servicio no consigue meter ninguno de los dos servicios
        this.winners=0; //TODO: cuando un jugador gana el punto de un tiro directo
        this.puntosBreakAfrontados=0; //cuando yo saco y tengo que defender mi servicio
        this.puntosBreakJugados=0; // cuando yo tengo opción de romper el servicio de mi rival
        this.puntosBreakGanados=0; // cuando consigo romper el servicio de mi rival
        this.juegosServicio=0; //juegos en los que el jugador ha restado
        this.juegosResto=0; //calculada en marcador.js
        this.juegosJugados=0; // calculada en marcador.js
        this.setJugados=0; 
        this.tieBreaksJugados=0
        
    }
    contadorBreaksAfrontados(servicio, puntosJugadorA, puntosJugadorB) {
        if (servicio===true && puntosJugadorA<puntosJugadorB && puntosJugadorB>=3)
            this.puntosBreakAfrontados++;
        
    }
    contadorBreaksJugados(servicio, puntosJugadorA, puntosJugadorB) {
        if (servicio===false && puntosJugadorA>puntosJugadorB && puntosJugadorA>=3){
            this.puntosBreakJugados++;
        }
    }
    contadorServicios (servicio){
        if (servicio===true){
            this.juegosServicio++;
        }
    }

    juegosTotalesResto (juegosTotales, juegosServicioJugadorA){
        this.juegosResto = juegosTotales - juegosServicioJugadorA;
    }

    
}

export default Jugador;