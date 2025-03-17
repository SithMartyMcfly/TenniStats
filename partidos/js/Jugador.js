
class Jugador {
    constructor() {
        this.Servicio; //atributo para controlar quien saca
        this.primerServicio = 0;//jugador juega con primer servicio
        this.segundoServicio = 0; //jugador juega con segundo servicio
        this.puntosGanados = 0; //puntos totales que ha ganado el jugador
        this.aces=0; //puntos directos de servicio
        this.dobleFalta=0; //cuando el jugador al servicio no consigue meter ninguno de los dos servicios
        this.error=0 //cuando el jugador gana cometiendo un error el contrario
        this.winners=0; //cuando un jugador gana el punto de un tiro directo
        this.puntosBreakAfrontados=0; //cuando yo saco y tengo que defender mi servicio
        this.puntosBreakJugados=0; // cuando yo tengo opción de romper el servicio de mi rival
        this.puntosBreakGanados=0; // cuando consigo romper el servicio de mi rival
        this.juegosServicio=0; //juegos en los que el jugador ha servido
        this.juegosResto=0; //calculada en marcador.js
        this.juegosJugados=0; // calculada en marcador.js (calculado en los juegos ganados de cada uno)
        this.setGanados=0; //sets que ha jugado el jugador
        this.tieBreaksJugados = 0; //calculada en marcador.js (suma tiebreaks ganados de ambos jugadores)
        this.tieBreaksGanados = 0; //tiebreaks que ha ganado el jugador
        this.partidoGanado = 0; //partidos que haganado jugador
        this.partidosJugados= 0; //partidos jugados
        
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

    incremantaAce(){
        this.aces++;
    }
    incrementarDobleFalta(){
        this.dobleFalta++;
    }
    incrementarError(){
        this.error++;
    }
    incrementaWinner (){
        this.winners++;
    }
    incremantaPrimerServicio (){
        this.primerServicio++;
    }
    incremantaSegundoServicio (){
        this.segundoServicio++;
    }
    incrementaSetsGanados (){
        this.setGanados++;
    }
    incrementaTieBreaksGanados (){
        this.tieBreaksGanados++
    }
    
}

export default Jugador;