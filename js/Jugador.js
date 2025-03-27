
class Jugador {
    constructor() {
        this.nombre;
        this.Servicio; //atributo para controlar quien saca
        this.Primero;
        //stats de servicio
        this.aces = 0; //puntos directos de servicio BBDD//
        this.dobleFalta = 0; //cuando el jugador al servicio no consigue meter ninguno de los dos servicios BBDD//
        this.ganadoPrimeroServicio = 0; //puntos ganados con primer servicio DERIVADA
        this.ganadoSegundoServicio = 0; //puntos ganados con segundo servicio DERIVADA
        this.porcentajePrimerServicio = 0; //porcentaje de primer servicio dentro BBDD
        this.porcentajeBreakSalvados = 0; //porcentaje de breaks que gana al servicio BBDD
        this.porcentajePrimerosGanados = 0; //porcentaje de primeros servicios que gana BBDD
        this.porcentajeSegundosGanados = 0; //porcentaje de segundos servicios que gana BBDD
        this.porcentajeServiciosGanados = 0; //porcentaje de servicios ganados BBDD
        this.primerServicio = 0; //totales de primeros dentro DERIVADA
        this.segundoServicio = 0; //totales de segundos dentro DERIVADA
        this.puntoServicio = 0 //puntos disputados sacando el jugador DERIVADA
        this.puntosBreakAfrontados = 0; //cuando yo saco y tengo que defender mi servicio DERIVADA
        this.juegosServicio = 0; //juegos en los que el jugador ha servido
        //stats de resto
        this.puntosBreakJugados = 0; // cuando yo tengo opción de romper el servicio de mi rival
        this.puntosBreakGanados = 0; // cuando consigo romper el servicio de mi rival
        //stats varias
        this.error = 0 //cuando el jugador gana cometiendo un error el contrario
        this.winners = 0; //cuando un jugador gana el punto de un tiro directo
        this.puntosGanados = 0; //puntos totales que ha ganado el jugador
        this.juegosResto = 0; //calculada en marcador.js
        this.juegosJugados = 0; // calculada en marcador.js (calculado en los juegos ganados de cada uno)
        this.setGanados = 0; //sets que ha jugado el jugador
        this.tieBreaksJugados = 0; //calculada en marcador.js (suma tiebreaks ganados de ambos jugadores)
        this.tieBreaksGanados = 0; //tiebreaks que ha ganado el jugador
        this.partidoGanado = 0; //partidos que haganado jugador
        this.partidosJugados = 0; //partidos jugados

    }

    porcentajePrimerServicioIn() {
        if (this.primerServicio + this.segundoServicio === 0) {
            return 0;
        }
        this.porcentajePrimerServicio = (this.primerServicio * 100) / (this.primerServicio + this.segundoServicio);
        return this.porcentajePrimerServicio;
    }

    calcularPorcentajeBreakSalvados(puntosBreakGanadosRival) {
        if (this.puntosBreakAfrontados === 0) {
            this.porcentajeBreakSalvados = 0;
        } else {
            this.porcentajeBreakSalvados =
                ((this.puntosBreakAfrontados - puntosBreakGanadosRival) / this.puntosBreakAfrontados) * 100;
            return this.porcentajeBreakSalvados;
        }
    }

    calcularPorcentajePrimerosGanados () {
        if (this.primerServicio === 0){
            return 0;
        } else {
            this.porcentajePrimerosGanados = (this.ganadoPrimeroServicio*100)/this.primerServicio;
            return this.porcentajePrimerosGanados;
        }
    }
    
    calcularPorcentajeSegundosGanados () {
        if (this.segundoServicio === 0){
            return 0;
        } else {
            this.porcentajePrimerosGanados = (this.ganadoSegundoServicio*100)/this.segundoServicio;
            return this.porcentajeSegundosGanados;
        }
    }

    calcularPorcentajePuntosGanadosServicio () {
        if (this.puntoServicio === 0) {
            return 0;
        }
        this.porcentajeServiciosGanados = ((this.ganadoPrimeroServicio+this.ganadoSegundoServicio)/this.puntoServicio)*100;
    }

    contadorBreaksAfrontados(servicio, puntosJugadorA, puntosJugadorB) {
        if (servicio === true && puntosJugadorA < puntosJugadorB && puntosJugadorB >= 3)
            this.puntosBreakAfrontados++;

    }
    contadorBreaksJugados(servicio, puntosJugadorA, puntosJugadorB) {
        if (servicio === false && puntosJugadorA > puntosJugadorB && puntosJugadorA >= 3) {
            this.puntosBreakJugados++;
        }
    }
    contadorServicios(servicio) {
        if (servicio === true) {
            this.juegosServicio++;
        }
    }

    juegosTotalesResto(juegosTotales, juegosServicioJugadorA) {
        this.juegosResto = juegosTotales - juegosServicioJugadorA;
    }

    incrementaAce() {
        this.aces++;
    }
    incrementarDobleFalta() {
        this.dobleFalta++;
    }
    incrementarError() {
        this.error++;
    }
    incrementaWinner() {
        this.winners++;
    }
    incrementaPrimerServicio() {
        this.primerServicio++;
        this.Primero = true;
    }
    incrementaSegundoServicio() {
        this.segundoServicio++;
        this.Primero = false;
    }
    incrementaSetsGanados() {
        this.setGanados++;
    }
    incrementaTieBreaksGanados() {
        this.tieBreaksGanados++
    }
    //metodo para sumar puntos al servicio
    puntosAlServicio(servicio) {
        if (servicio === true) {
            this.puntosAlServicio++;
        }
    }

    //GETTERS

    get getPorcentajePrimerServicio() {
        return this.porcentajePrimerServicioIn();
    }

    get getPorcentajeBreakSalvados() {
        return this.porcentajeBreakSalvados;
    }

    get getPorcentajePrimerServicioGanados (){
        return this.calcularPorcentajePrimerosGanados();
    }

    get getPorcentajeSegundoServicioGanados () {
        return this.calcularPorcentajeSegundosGanados();
    }

    get getPorcentajePuntoServicioGanados () {
        return this.calcularPorcentajePuntosGanadosServicio();
    }

    toJSON() {
        return {
            aces: this.aces,
            dobleFalta: this.dobleFalta,
            winners: this.winners,
            errores: this.error,
            puntosBreakAfrontados: this.puntosBreakAfrontados,
            porcentajePrimerServicio: this.getPorcentajePrimerServicio,
            porcentajeSegundosGanados: this.getPorcentajeSegundoServicioGanado,
            porcentajePrimerosGanados: this.getPorcentajePrimerServicioGanados,
            porcentajeBreakSalvados: this.getPorcentajeBreakSalvados,
            porcentajePuntoServicioGanados: this.getPorcentajePuntoServicioGanados
        }
    }
}


export default Jugador;