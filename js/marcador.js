import Jugador from './Jugador.js';
import { enviarDatos } from './enviarDatos.js';

//dejar la instanciación con let cuando termine las pruebas
//window para acceder en tiempo de ejecución
const jugadorA = new Jugador();
const jugadorB = new Jugador();

console.log(jugadorA);
console.log(jugadorB);


//MANEJO DEL DOM
const marcadorA = document.getElementById('marcadorA');
const marcadorB = document.getElementById('marcadorB');
const juegosA = document.getElementById('juegosA');
const juegosB = document.getElementById('juegosB');
const setsA = document.getElementById('setsA');
const setsB = document.getElementById('setsB');
const marcadorJuegosA = document.getElementById('marcadorJuegosA');
const marcadorJuegosB = document.getElementById('marcadorJuegosB');
const modalfinPunto = document.querySelector('.modal-finPunto');
const cerrarModal = document.querySelectorAll('.modal-finPunto .btn');
const modalfinPuntoB = document.querySelector('.modal-finPuntob');
const cerrarModalB = document.querySelectorAll('.modal-finPuntob .btnb');
const botonesServicioA = document.querySelectorAll('.botones-servicio');
const botonesServicioB = document.querySelectorAll('.botones-serviciob');
const primerServicioA = document.getElementById('primerServicioA');
const segundoServicioA = document.getElementById('segundoServicioA');
const segundoServicioB = document.getElementById('segundoServicioB');
const primerServicioB = document.getElementById('primerServicioB');



//VARIABLES GLOBALES
let contadorA = 0;
let contadorB = 0;
let contadorPuntosTotalesTieBreak = 0
let contadorJuegosA = 0;
let contadorJuegosB = 0;
let contadorJuegosTotales = 0;
let contadorSetsA = 0;
let contadorSetsB = 0;
let enTieBreak = false; ///cambiar tiebreak en juegos y en puntos


/*el numero de sets y juegos viene de forma dinámica desde PHP*/
if (typeof numeroSets != 'undefined') {
    numeroSets = parseInt(numeroSets, 10);
};
if (typeof numeroJuegos != 'undefined') {
    numeroJuegos = parseInt(numeroJuegos, 10);
} else {
    console.log ('No entran los juegos');
}; 




//FUNCIONES PARA MANEJAR EL RESULTADO

//función para colorear de verde cuando gana el jugador A
function ganadorSetA() {
    marcadorJuegosA.lastElementChild.style.background = 'grey';
}
//función para colorear de verde cuando gana el jugador A
function ganadorSetB() {
    marcadorJuegosB.lastElementChild.style.background = 'grey';
    marcadorJuegosB.lastElementChild.style.background = 'grey';
}

/*añadimos una condicion dentro de la activación de tie-break ya que, cuando jugamos
sets a 4 juegos el tie-break se inicia un juego antes del límite para apuntarse el set
y cuando es un set normal a 6 se inicia cuando ambos jugadores llegan a 6 juegos*/
function activarTieBreak() {
    if (numeroJuegos === 6){
        if (enTieBreak = contadorJuegosA === numeroJuegos && contadorJuegosB === numeroJuegos) {
            enTieBreak = true;
            //stat de TB jugados por ambos jugadores
            jugadorA.tieBreaksJugados++;
            jugadorB.tieBreaksJugados++;
        } else {
            enTieBreak = false;
        }
    } else {
        if (enTieBreak = contadorJuegosA === (numeroJuegos-1) && contadorJuegosB === (numeroJuegos-1)) {
            enTieBreak = true;
            //stat de TB jugados por ambos jugadores
            jugadorA.tieBreaksJugados++;
            jugadorB.tieBreaksJugados++;
        } else {
            enTieBreak = false;
        }
    }
}

function actualizarServicio() {
    let servicioA = document.getElementsByTagName('div')[2];
    let servicioB = document.getElementsByTagName('div')[5];
    if (!enTieBreak) {
        if ((contadorJuegosTotales) % 2 != 0) {
            servicioA.style.visibility = "hidden";
            botonesServicioA.forEach(
                boton => boton.style.visibility = "hidden"
            );
            jugadorB.Servicio = true;
            servicioB.style.visibility = "visible";
            botonesServicioB.forEach(
                boton => boton.style.visibility = "visible"
            );
            jugadorA.Servicio = false;
        } else {
            servicioB.style.visibility = "hidden";
            botonesServicioB.forEach(
                boton => boton.style.visibility = "hidden"
            );
            jugadorB.Servicio = false;
            servicioA.style.visibility = "visible";
            botonesServicioA.forEach(
                boton => boton.style.visibility = "visible"
            );
            jugadorA.Servicio = true;
        }
    } else {
        if (contadorPuntosTotalesTieBreak === 0) {
            servicioB.style.visibility = "hidden";
            botonesServicioB.forEach(
                boton => boton.style.visibility = "hidden"
            );
            jugadorB.Servicio = false;
            servicioA.style.visibility = "visible";
            botonesServicioA.forEach(
                boton => boton.style.visibility = "visible"
            );
            jugadorA.Servicio = true;

            //cambio del primer punto del tiebreak
        } else if ((contadorPuntosTotalesTieBreak - 1) % 4 < 2) {
            servicioA.style.visibility = "hidden";
            botonesServicioA.forEach(
                boton => boton.style.visibility = "hidden"
            );
            jugadorA.Servicio = false;
            servicioB.style.visibility = "visible";
            botonesServicioB.forEach(
                boton => boton.style.visibility = "visible"
            );
            jugadorB.Servicio = true;


        } else {
            servicioB.style.visibility = "hidden";
            botonesServicioB.forEach(
                boton => boton.style.visibility = "hidden"
            );
            jugadorB.Servicio = false;
            servicioA.style.visibility = "visible";
            botonesServicioA.forEach(
                boton => boton.style.visibility = "visible"
            );
            jugadorA.Servicio = true;
        }

    }
}

//función que dirime quien ha ganado el partido
function ganadorPartido() {
    if (contadorSetsA === numeroSets) {
        //stat partido ganado jugador A
        finPartido();
        jugadorA.ganadorPartido();
        console.log('Gana jugador A')
        marcadorJuegosA.style.background = 'green';
        marcadorA.innerHTML = "0";
        marcadorB.innerHTML = "0";

    }
    if (contadorSetsB === numeroSets) {
        //stat partido ganado jugador B
        finPartido();
        jugadorB.ganadorPartido();
        console.log('Gana jugador B');
        marcadorA.innerHTML = "0";
        marcadorB.innerHTML = "0";
        marcadorJuegosB.style.background = 'green';
    }
}

function finPartido() {
    primerServicioA.disabled = true;
    segundoServicioA.disabled = true;
    primerServicioB.disabled = true;
    segundoServicioB.disabled = true;
    jugadorA.calcularPorcentajeBreakSalvados(jugadorB.puntosBreakGanados);
    jugadorB.calcularPorcentajeBreakSalvados(jugadorA.puntosBreakGanados);
    deshabilitarEventos();
    enviarDatos(jugadorA, jugadorB, '../persistencia.php')
    //window.location.href="../index.php";
    alert('PARTIDO TERMINADO');
}

//MANEJADORES DE EVENTOS

//usamos para poder deshabilitar opciones y poder llevar orden en el marcador
function habilitarEventos() {
    marcadorA.addEventListener('click', resultadoA);
    marcadorB.addEventListener('click', resultadoB);
}
function deshabilitarEventos() {
    marcadorA.removeEventListener('click', resultadoA);
    marcadorB.removeEventListener('click', resultadoB);
}

deshabilitarEventos();

primerServicioA.addEventListener('click', () => {
    jugadorA.incrementaPrimerServicio();
    habilitarEventos();
    primerServicioA.disabled = true;
    segundoServicioA.disabled = true;
});
segundoServicioA.addEventListener('click', () => {
    jugadorA.incrementaSegundoServicio();
    habilitarEventos();
    primerServicioA.disabled = true;
    segundoServicioA.disabled = true;
});
primerServicioB.addEventListener('click', () => {
    jugadorB.incrementaPrimerServicio();
    habilitarEventos();
    primerServicioB.disabled = true;
    segundoServicioB.disabled = true;
});
segundoServicioB.addEventListener('click', () => {
    jugadorB.incrementaSegundoServicio()
    //marcadorB.addEventListener('click', resultadoB);
    habilitarEventos();
    primerServicioB.disabled = true;
    segundoServicioB.disabled = true;
});


//FUNCIONES PARA MANEJAR RESULTADO
function resultadoA() {
    mostrarModalA();
}

function actualizarMarcadorA() {
    activarTieBreak();
    if (!enTieBreak) {
        let resultado;
        contadorA++;
        if(jugadorA.Servicio===true){
            jugadorA.puntoServicio++;
        } else {
            jugadorB.puntoServicio++;
        }
        //puntos que gana el jugador A
        jugadorA.puntosGanados++;
        jugadorA.contadorBreaksAfrontados(jugadorA.Servicio, contadorA, contadorB);
        jugadorB.contadorBreaksAfrontados(jugadorB.Servicio, contadorB, contadorA);
        jugadorA.contadorBreaksJugados(jugadorA.Servicio, contadorA, contadorB);
        jugadorB.contadorBreaksJugados(jugadorB.Servicio, contadorB, contadorA);
        if (contadorA > 3 && contadorA === contadorB) {
            resultado = "40";
            marcadorA.innerHTML = "40";
            marcadorB.innerHTML = "40";
        } else if (contadorA > 3 && contadorA > contadorB) {
            resultado = "A";
        } else {

            switch (contadorA) {

                case 0:
                    resultado = "0";
                    break;
                case 1:
                    resultado = "15";
                    break;
                case 2:
                    resultado = "30";
                    break;
                case 3:
                    resultado = "40";
                    break;
            }
        }
        marcadorA.innerHTML = resultado;
        resultadoJuegosA();
    } else {
        contadorA++;
        contadorPuntosTotalesTieBreak++;
        marcadorA.innerHTML = contadorA;
        resultadoJuegosA();
    }
    actualizarServicio();
}


//LLeva el resultado de los Juegos B
function resultadoB() {
    mostrarModalB();
}

function actualizarMarcadorB() {
    activarTieBreak();
    if (!enTieBreak) {
        let resultado;
        contadorB++;
        if(jugadorA.Servicio===true){
            jugadorA.puntoServicio++;
        } else {
            jugadorB.puntoServicio++;
        }
        jugadorB.puntosGanados++;
        /*hay que llamar aqui tambien los afrontados del jugador contrario ya que cuando sumamos
        break points en ventaja, este se produce clicando en el marcador del jugadorB, igual haremos
        con las estadísticas de B*/
        jugadorA.contadorBreaksAfrontados(jugadorA.Servicio, contadorA, contadorB);
        jugadorB.contadorBreaksAfrontados(jugadorB.Servicio, contadorB, contadorA);
        jugadorA.contadorBreaksJugados(jugadorA.Servicio, contadorA, contadorB);
        jugadorB.contadorBreaksJugados(jugadorB.Servicio, contadorB, contadorA);
        if (contadorB > 3 && contadorB === contadorA) {
            resultado = "40";
            marcadorA.innerHTML = "40";
            marcadorB.innerHTML = "40";
        } else if (contadorB > 3 && contadorB > contadorA) {
            resultado = "A";
        } else {

            switch (contadorB) {
                case 0:
                    resultado = "0";
                    break;
                case 1:
                    resultado = "15";
                    break;
                case 2:
                    resultado = "30";
                    break;
                case 3:
                    resultado = "40";
                    break;
            }
        }
        marcadorB.innerHTML = resultado;
        resultadoJuegosB();
    } else {
        contadorB++;
        contadorPuntosTotalesTieBreak++;
        marcadorB.innerHTML = contadorB;
        resultadoJuegosB();
    }
    actualizarServicio();
}


//MODAL JUGADOR A

function mostrarModalA() {
    modalfinPunto.classList.add('modal-finPunto-show')
    if (jugadorA.Servicio === false) {
        //botones que quitamos cuando el jugador gana al resto
        document.querySelector('.ace').style.display = 'none';
        document.querySelector('.df').style.display = 'inline-block';
    } else {
        document.querySelector('.df').style.display = 'none';
        document.querySelector('.ace').style.display = 'inline-block';
    }
}

cerrarModal.forEach(boton => {
    boton.addEventListener('click', (event) => {
        event.preventDefault();
        //capturamos con el switch case la clase del botón donde pulsamos
        switch (true) {
            case event.target.classList.contains('ace'):
                jugadorA.incrementaAce();
                if (jugadorA.Primero === true && jugadorA.Servicio === true) {
                    jugadorA.ganadoPrimeroServicio++;
                } else if (jugadorA.Primero=== false && jugadorA.Servicio === true) {
                    jugadorA.ganadoSegundoServicio++;
                }
                break;
            case event.target.classList.contains('df'):
                jugadorB.incrementarDobleFalta();
                break;
            case event.target.classList.contains('winner'):
                jugadorA.incrementaWinner();
                if (jugadorA.Primero === true && jugadorA.Servicio === true) {
                    jugadorA.ganadoPrimeroServicio++;
                } else if (jugadorA.Primero=== false && jugadorA.Servicio === true) {
                    jugadorA.ganadoSegundoServicio++;
                }
                break;
            case event.target.classList.contains('error'):
                jugadorB.incrementarError();
                if (jugadorA.Primero === true && jugadorA.Servicio === true) {
                    jugadorA.ganadoPrimeroServicio++;
                } else if (jugadorA.Primero=== false && jugadorA.Servicio === true) {
                    jugadorA.ganadoSegundoServicio++;
                }
                break;
            default:
                break;
        }
        primerServicioA.disabled = false;
        segundoServicioA.disabled = false;
        primerServicioB.disabled = false;
        segundoServicioB.disabled = false;
        actualizarMarcadorA();
        deshabilitarEventos();
        modalfinPunto.classList.remove('modal-finPunto-show');
    });
});



//MODAL JUGADOR B

function mostrarModalB() {
    modalfinPuntoB.classList.add('modal-finPunto-showb')
    if (jugadorB.Servicio === false) {
        //botones que quitamos cuando el jugador gana al resto
        document.querySelector('.aceb').style.display = 'none';
        document.querySelector('.dfb').style.display = 'inline-block';
    } else {
        document.querySelector('.dfb').style.display = 'none';
        document.querySelector('.aceb').style.display = 'inline-block';
    }
}

cerrarModalB.forEach(boton => {
    boton.addEventListener('click', (event) => {
        event.preventDefault();
        //capturamos con el switch case la clase del botón donde pulsamos
        switch (true) {
            case event.target.classList.contains('aceb'):
                jugadorB.incrementaAce();
                if (jugadorB.Primero === true && jugadorB.Servicio === true) {
                    jugadorB.ganadoPrimeroServicio++;
                } else if (jugadorB.Primero=== false && jugadorB.Servicio === true) {
                    jugadorB.ganadoSegundoServicio++;
                }
                break;
            case event.target.classList.contains('dfb'):
                jugadorA.incrementarDobleFalta();
                break;
            case event.target.classList.contains('winnerb'):
                jugadorB.incrementaWinner();
                if (jugadorB.Primero === true && jugadorB.Servicio === true) {
                    jugadorB.ganadoPrimeroServicio++;
                } else if (jugadorB.Primero=== false && jugadorB.Servicio === true) {
                    jugadorB.ganadoSegundoServicio++;
                }
                break;
            case event.target.classList.contains('errorb'):
                jugadorA.incrementarError();  
                if (jugadorB.Primero === true && jugadorB.Servicio === true) {
                    jugadorB.ganadoPrimeroServicio++;
                } else if (jugadorB.Primero=== false && jugadorB.Servicio === true) {
                    jugadorB.ganadoSegundoServicio++;
                }
                break;
            default:
                break;
        }
        primerServicioB.disabled = false;
        segundoServicioB.disabled = false;
        primerServicioA.disabled = false;
        segundoServicioA.disabled = false;
        actualizarMarcadorB();
        deshabilitarEventos();
        modalfinPuntoB.classList.remove('modal-finPunto-showb');
    });
});


//Lleva la puntuación, del jugador A, en el set actual

function resultadoJuegosA() {
    ganadorPartido();
    if (!enTieBreak) {
        if (contadorA >= 4 && contadorA > contadorB + 1) {
            contadorJuegosA++;
            contadorJuegosTotales++;
            contadorA = 0;
            contadorB = 0;
            marcadorA.innerHTML = "0";
            marcadorB.innerHTML = "0";
            //condición para sumar puntos de break jugadorA
            if (jugadorA.Servicio === false) {
                jugadorA.puntosBreakGanados++;
            }
            jugadorA.contadorServicios(jugadorA.Servicio);
            jugadorB.contadorServicios(jugadorB.Servicio);
        }

        juegosA.innerHTML = contadorJuegosA;
        setsTotalesA();
    } else {
        if (contadorA >= 7 && contadorA > contadorB + 1) {
            contadorJuegosA++;
            jugadorA.incrementaTieBreaksGanados(); //stat tiebreak
            contadorJuegosTotales++;
            //jugadorA.juegosJugados++; //stat juegos jugados
            contadorA = 0;
            contadorB = 0;
            marcadorA.innerHTML = "0";
            marcadorB.innerHTML = "0";
            juegosA.innerHTML = contadorJuegosA;
            setsTotalesA();
        }
    }
}

//Lleva la puntuación, del jugador B, en el set actual
function resultadoJuegosB() {
    ganadorPartido();
    if (!enTieBreak) {
        if (contadorB >= 4 && contadorB > contadorA + 1) {
            contadorJuegosB++;
            contadorJuegosTotales++;
            contadorB = 0;
            contadorA = 0;
            marcadorA.innerHTML = "0";
            marcadorB.innerHTML = "0";
            //condición para sumar puntos de break jugadorB
            if (jugadorB.Servicio === false) {
                jugadorB.puntosBreakGanados++;
            }
            jugadorB.contadorServicios(jugadorB.Servicio);
            jugadorA.contadorServicios(jugadorA.Servicio);

        }
        juegosB.innerHTML = contadorJuegosB;
        setsTotalesB();
    } else {
        if (contadorB >= 7 && contadorB > contadorA + 1) {
            contadorJuegosB++;
            jugadorB.incrementaTieBreaksGanados();
            contadorJuegosTotales++;
            //stats de ambos jugadores de TB jugados
            contadorB = 0;
            contadorA = 0;
            marcadorA.innerHTML = "0";
            marcadorB.innerHTML = "0";
            juegosB.innerHTML = contadorJuegosB;
            setsTotalesB();
        }
    }
}



//PUNTUACIÓN SETS
//puntuación set jugador A
function setsTotalesA() {

    if (!enTieBreak) {
        //TODO: añadir juegostotales - 1
        if (contadorJuegosA >= numeroJuegos && contadorJuegosA > contadorJuegosB + 1) {
            contadorSetsA++;
            jugadorA.incrementaSetsGanados(); //stat set ganados jugador A

            marcadorJuegosA.insertAdjacentHTML("beforeend",
                `
             <td>${contadorJuegosA}</td>
            `);
            marcadorJuegosB.insertAdjacentHTML("beforeend",
                `
             <td>${contadorJuegosB}</td>
             `
            )
            ganadorSetA();
            contadorJuegosA = 0;
            contadorJuegosB = 0;
            juegosA.innerHTML = "0";
            juegosB.innerHTML = "0";

        }
        setsA.innerHTML = contadorSetsA;
    } else {
        if (contadorJuegosA > contadorJuegosB) {
            contadorSetsA++;
            jugadorA.incrementaSetsGanados(); //stat set ganados jugador A
            marcadorJuegosA.insertAdjacentHTML("beforeend",
                `
            <td>${contadorJuegosA}</td>
           `);
            marcadorJuegosB.insertAdjacentHTML("beforeend",
                `
            <td>${contadorJuegosB}</td>
            `
            )
            ganadorSetA();
            contadorJuegosA = 0;
            contadorJuegosB = 0;
            juegosA.innerHTML = "0";
            juegosB.innerHTML = "0";
            enTieBreak = false;
        }
    }

}

//puntuación set jugador B
function setsTotalesB() {

    if (!enTieBreak) {
        if (contadorJuegosB >= numeroJuegos && contadorJuegosB > contadorJuegosA + 1) {
            contadorSetsB++;
            jugadorB.incrementaSetsGanados(); //stat set ganados jugador B
            marcadorJuegosA.insertAdjacentHTML("beforeend",
                `
                <td>${contadorJuegosA}</td>
                `);
            marcadorJuegosB.insertAdjacentHTML("beforeend",
                `
                    <td>${contadorJuegosB}</td>
                    `
            )
            ganadorSetB();
            contadorJuegosB = 0;
            contadorJuegosA = 0;
            juegosA.innerHTML = "0";
            juegosB.innerHTML = "0";
        }
        setsB.innerHTML = contadorSetsB;
    } else {
        if (contadorJuegosB > contadorJuegosA) {
            contadorSetsB++;
            jugadorB.incrementaSetsGanados(); //stat jugador B sets ganados
            marcadorJuegosA.insertAdjacentHTML("beforeend",
                `
                 <td>${contadorJuegosA}</td>
                `);
            marcadorJuegosB.insertAdjacentHTML("beforeend",
                `
                 <td>${contadorJuegosB}</td>
                 `
            )
            ganadorSetB();
            contadorJuegosB = 0;
            contadorJuegosA = 0;
            juegosA.innerHTML = "0";
            juegosB.innerHTML = "0";
            enTieBreak = false;
        }
    }
}

//ESTADISTICAS DERIVADAS
//stats servicio
//una interfaz para los métodos que hay que añadir
jugadorA.juegosTotalesResto(contadorJuegosTotales, jugadorA.juegosServicio);
jugadorB.juegosTotalesResto(contadorJuegosTotales, jugadorB.juegosServicio);
jugadorA.juegosJugados = contadorJuegosTotales;
jugadorB.juegosJugados = contadorJuegosTotales;

document.addEventListener("DOMContentLoaded", () => {
    actualizarServicio();
});